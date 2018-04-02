<html><body>
<?php

#==================== CONNECTION =========================
# Extract connection from db URL
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://xhgocwtwpvuyuh:1c568d1c618b10132266a428b65cc08dcb75ea25e71697aaada2da222231dae5@ec2-54-243-210-70.compute-1.amazonaws.com:5432/d88e4kacmh5m8a
"]));
  return "user=xhgocwtwpvuyuh password=1c568d1c618b10132266a428b65cc08dcb75ea25e71697aaada2da222231dae5 host=ec2-54-243-210-70.compute-1.amazonaws.com dbname=d88e4kacmh5m8a" . substr($path, 1);
}

# Establish connection
$conn = pg_connect(pg_connection_string_from_database_url());

if (!$conn) {
  echo "An error occurred.\n";
  exit;
} else {
    echo 'Connected';
}

# Testing connection
$result = pg_query($conn, "SELECT relname FROM pg_stat_user_tables WHERE schemaname='public'");
print "<pre>\n";
if (!pg_num_rows($result)) {
  print("Connection is working, but database is empty.\n");
} else {
  print "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
#==================== / CONNECTION =======================


#==================== TEST QUERIES AND RETRIEVAL =========
$test = pg_query($conn, "CREATE TABLE IF NOT EXISTS food (name varchar(255))");
$test2 = pg_query($conn, "INSERT INTO food (name) VALUES ('pizza')");

$result = pg_query($conn, "SELECT name FROM food");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

if ($row = pg_fetch_row($result)) {
  echo "Food: $row[0]";
  echo "<br />\n";
} else {
  echo 'No records in food';
}
#==================== / TEST QUERIES AND RETRIEVAL =======


#==================== CREATE TABLES ======================

# Rater Table:
# The join‐date is used to show when this rater first joined the website. The name field corresponds to
# an alias such as SuperSizeMe. Type refers to the type of rater (blog, online, food critic) and
# reputation takes a value between 1 and 5. The value of this field is based on the number of people
# who found this rater’s opinion helpful, and the default value is 1 (lowest).

$raterTable = pg_query($conn, 
"CREATE TABLE IF NOT EXISTS Rater (
UserID varchar(255) NOT NULL PRIMARY KEY,
email varchar(255),
name varchar(255),
joindate DATE,
type varchar(255) CHECK (type IN ('blog', 'online', 'food critic')),
reputation int CHECK (reputation BETWEEN 1 AND 5) DEFAULT 1
)");
print "<pre>\n";
if (!$raterTable) {
  echo "Creating raterTable is not working. \n";
  exit;
}
else{
  echo 'Rater Table exists';
}

# Rating: (UserID, Date, Price, Food, Mood, Staff, Comments, …., RestaurantID)
# The Price, Food, Mood and Staff attributes may take a value between 1 (low) to 5 (high). The
# comments field is reserved for free text and will be used, in future, for sentiment analysis. Note
# that UserID and RestaurantID are foreign keys.

$ratingTable = pg_query($conn, 
"CREATE TABLE IF NOT EXISTS Rating (
UserID varchar(255) NOT NULL,
Date DATE NOT NULL,
Price int CHECK (Price BETWEEN 1 AND 5),
Food int CHECK (Food BETWEEN 1 AND 5),
Mood int CHECK (Mood BETWEEN 1 AND 5),
Staff int CHECK (Staff BETWEEN 1 AND 5),
Comments text,
RestaurantID varchar(255),
PRIMARY KEY (UserID, Date), 
FOREIGN KEY (UserID, RestaurantID)
)");
print "<pre>\n";
if (!$ratingTable) {
  echo "Creating ratingTable is not working. \n";
  exit;
}
else{
  echo 'Rating Table exists';
}


# Restaurant: (RestaurantID, Name, Type, URL, …)
# This relation contains general information about a restaurant and is useful in the case where a
# restaurant chain has many locations. The type attribute contains details about the cuisine, such as
# Italian, Indian, Middle Eastern, and so on.

$restaurantTable = pg_query($conn, 
"CREATE TABLE IF NOT EXISTS Restaurant (
RestaurantID varchar(255) PRIMARY KEY,
Name varchar(255),
Type varchar(255).
URL varchar
)");
print "<pre>\n";
if (!$restaurantTable) {
  echo "Creating restaurantTable is not working. \n";
  exit;
}
else{
  echo 'Restaurant Table exists';
}

# Location: (LocationID, first‐open‐date, manager‐name, phone‐number, street‐address,
# hour‐open, hour‐close , …, RestaurantID)
# This relation contains the location‐specific data, such as the manager’s details, the phone number,
# the address, and so on. Note that RestaurantID is the foreign key. This design assumes that the
# restaurant opens and closes at the same time every day; you may modify this design if you wish.

$locationTable = pg_query($conn, 
"CREATE TABLE IF NOT EXISTS Location (
LocationID varchar(255) PRIMARY KEY,
first-open-date DATE, 
manager-name varchar(255),
phone-number varchar(15),
street-address varchar(255),
hour-open TIME, 
hour-close TIME,
RestaurantID varchar(255),
FOREIGN KEY (RestaurantID)
)");
print "<pre>\n";
if (!$locationTable) {
  echo "Creating locationTable is not working. \n";
  exit;
}
else{
  echo 'Location Table exists';
}

# MenuItem(ItemID, name, type, category, description, price, …, RestaurantID)_
# Here we include the item name, as on the menu, the category (starter, main, desert) as well as the
# type (food or beverage). RestaurantID is the foreign key.

$menuItemTable = pg_query($conn, 
"CREATE TABLE IF NOT EXISTS MenuItem (
ItemID varchar(255) PRIMARY KEY,
name varchar(255),
type varchar(8) CHECK (type IN ('starter', 'menu', 'desert')),
category varchar(7) CHECK (category IN ('food', 'beverage')),
description text,
price decimal(12,2),
RestaurantID varchar(255),
FOREIGN KEY (RestaurantID)
)");
print "<pre>\n";
if (!$menuItemTable) {
  echo "Creating menuItemTable is not working. \n";
  exit;
}
else{
  echo 'MenuItem Table exists';
}

# RatingItem(UserID, Date, ItemID, rating, comment, ….)
# A rater may explicitly select the menu item, and add a specific rating between 1 (low) to 5 (high)
# and a free text comment. All menu items should be selected from a list.

$ratingItemTable = pg_query($conn, 
"CREATE TABLE IF NOT EXISTS RatingItem (
UserID varchar(255) NOT NULL,
Date DATE NOT NULL,
ItemID varchar(255),
rating int CHECK (rating >= 1 AND rating =< 5), 
comment text,
PRIMARY KEY (UserID, Date, ItemID)
)");
print "<pre>\n";
if (!$ratingItemTable) {
  echo "Creating ratingItemTable is not working. \n";
  exit;
}
else{
  echo 'RatingItem Table exists';
}

#==================== / CREATE TABLES =====================

#==================== INSERT INTO TABLES =====================

if (($handle = fopen("/app/Rater.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO Rater (UserID, email, name, join-date, type, reputation) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."'
                )
            ");
        }
    }
  fclose($handle);

#$insertRaterTable = pg_query($conn, 
#"\copy Rater(UserID,email,name,join-date,type,reputation)
#FROM '/Rater.csv' DELIMITER ',' CSV HEADER");

#$insertValueRaterTable = pg_query($conn, 
#"INSERT INTO Rater(UserID,email,name,join-date,type,reputation)
#VALUES (JD!,jd@email.com,Jane Doe,3/30/2018,blog)
#");

# Testing insertion of values from csv file
$result = pg_query($conn, "SELECT * FROM Rater");
print "<pre>\n";
if (!$result) {
  echo "It's not working! \n";
  exit;
}

$arr = pg_fetch_all($result);
print_r($arr);


#==================== / INSERT INTO TABLES =====================


?>
</body>
</html>