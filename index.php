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
Comments varchar(255),
RestaurantID varchar(255) NOT NULL,
PRIMARY KEY (UserID, Date), 
FOREIGN KEY (UserID) references Rater, 
FOREIGN KEY (RestaurantID) references Restaurant
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
RestaurantID varchar(255) PRIMARY KEY NOT NULL,
Name varchar(255),
Type varchar(255),
URL varchar(255)
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
LocationID varchar(255) PRIMARY KEY NOT NULL,
firstOpenDate DATE, 
managerName varchar(255),
phoneNumber varchar(15),
streetAddress varchar(255),
hourOpen TIME, 
hourClose TIME,
RestaurantID varchar(255) NOT NULL,
FOREIGN KEY (RestaurantID) references Restaurant
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
ItemID varchar(255) PRIMARY KEY NOT NULL,
name varchar(255),
type varchar(8) CHECK (type IN ('starter', 'menu', 'desert')),
category varchar(7) CHECK (category IN ('food', 'beverage')),
description text,
price decimal(12,2),
RestaurantID varchar(255) NOT NULL,
FOREIGN KEY (RestaurantID) references Restaurant
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
ItemID varchar(255) NOT NULL,
rating int CHECK (rating BETWEEN 1 AND 5), 
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

#Rater 
if (($handle = fopen("/app/Rater.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO Rater (UserID, email, name, joindate, type, reputation) VALUES
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


#Restaurants
if (($handle = fopen("/app/Restaurants.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO Restaurant (RestaurantID, Name, Type, URL) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."'
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
$result = pg_query($conn, "SELECT * FROM Restaurant");
print "<pre>\n";
if (!$result) {
  echo "It's not working! \n";
  exit;
}

$arr = pg_fetch_all($result);
print_r($arr);


#==================== / INSERT INTO TABLES =====================



#==================== / QUERIES =====================

#Resturaunts and Menus

#Some test entries used for queries
$test3 = pg_query($conn, "INSERT INTO restaurant (restaurantID, name, type, URL) VALUES ('1', 'Wendys', 'American', 'www.wendys.com')");
$test6 = pg_query($conn, "INSERT INTO restaurant (restaurantID, name, type, URL) VALUES ('2', 'Milestones', 'American', 'www.milestones.com')");

$test4 = pg_query($conn, "INSERT INTO Location (locationID, firstOpenDdate, managerName, phoneNumber, streetAddress, hourOpen, hourClose, RestaurantID) VALUES ('1', '2001-04-25', 'owen', '289-613-2432', '123 road', '3:40', '3:40', '1')");
$test5 = pg_query($conn, "INSERT INTO MenuItem (ItemID, name, type, category, description, price, RestaurantID) VALUES ('1', 'Burger', 'menu', 'food', 'AAA Beef Burger', 20, '1')");
$test5 = pg_query($conn, "INSERT INTO Rating (userID, date, price, food, mood, staff, comments, RestaurantID) VALUES ('js', '2018-03-31', 4, 4, 3, 4, 'great resturaunt!', '1')");
$test7 = pg_query($conn, "INSERT INTO Rating (userID, date, price, food, mood, staff, comments, RestaurantID) VALUES ('js', '2018-04-25', 4, 4, 3, 4, 'great resturaunt!', '2')");



#Display all the information about a user‐specified restaurant. That is, the user should select the
#name of the restaurant from a list, and the information as contained in the restaurant and
#location tables should then displayed on the screen.

#user defined restraunt chosen from UI
$resturauntselect = "Wendys";

$result = pg_query($conn, "SELECT * FROM restaurant R, Location L WHERE R.name = '$resturauntselect' AND L.RestaurantID = R.RestaurantID");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
if ($row = pg_fetch_row($result)) {
  echo "resturaunt: \n";
  
  echo "Restaurant Id: $row[0] \n";
  echo "Name: $row[1] \n";
  echo "Type: $row[2] \n";
  echo "URL: $row[3] \n";
  echo "Location ID: $row[4] \n";
  echo "Open Date: $row[5] \n";  
  echo "Manager Name: $row[6] \n";  
  echo "Phone Number: $row[7] \n";  
  echo "Street Address: $row[8] \n";  
  echo "Opens: $row[9] \n";  
  echo "Closes: $row[10] \n";  
  
  echo "<br />\n";
} else {
  echo 'No records in resturaunts';
}





#Display the full menu of a specific restaurant. That is, the user should select the name of the
#restaurant from a list, and all menu items, together with their prices, should be displayed on the
#screen. The menu should be displayed based on menu item categories.

#user defined restraunt chosen from UI
$resturauntselect = "Wendys";

$result = pg_query($conn, "SELECT M.* FROM MenuItem M, Restaurant R WHERE R.name = '$resturauntselect' AND M.restaurantID = R.RestaurantID");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
if ($row = pg_fetch_row($result)) {
  echo "resturaunt: \n";
  
  echo "Item Id: $row[0] \n";
  echo "Name: $row[1] \n";
  echo "Type: $row[2] \n";
  echo "Category: $row[3] \n";
  echo "Description: $row[4] \n";
  echo "Price: $row[5] \n";  
  echo "Resturaunt ID: $row[6] \n";  
 
  
  echo "<br />\n";
} else {
  echo 'No records in menu items';
}






#For each user‐specified category of restaurant, list the manager names together with the date
#that the locations have opened. The user should be able to select the category (e.g. Italian or
#Thai) from a list.

$categoryselect = "American";

$result = pg_query($conn, "SELECT L.managerName, L.firstOpenDdate FROM Location L, Restaurant R WHERE R.type = '$categoryselect' AND L.restaurantID = R.RestaurantID");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
if ($row = pg_fetch_row($result)) {
  echo "resturaunt: \n";
  
  echo "Manager: $row[0] \n";
  echo "Open Date: $row[1] \n";
 
  
  echo "<br />\n";
} else {
  echo 'No records in menu items';
}






#Given a user‐specified restaurant, find the name of the most expensive menu item. List this
#information together with the name of manager, the opening hours, and the URL of the
#restaurant. The user should be able to select the restaurant name (e.g. El Camino) from a list.

$resturauntselect = "Wendys";

$result = pg_query($conn, 
"SELECT R.URL, L.managerName, L.hourOpen, M.name, MAX(M.Price) 
FROM Restaurant R, Location L, MenuItem M 
WHERE R.name = '$resturauntselect' AND L.RestaurantID = R.RestaurantID AND M.RestaurantID = R.RestaurantID
GROUP BY R.URL, L.ManagerName, L.hourOpen, M.name");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
if ($row = pg_fetch_row($result)) {
  echo "resturaunt: \n";
  
  echo "URL: $row[0] \n";
  echo "Manager Name: $row[1] \n";
  echo "Open Hour: $row[2] \n";
  echo "Menu Item: $row[3] \n";
  echo "Price: $row[4] \n";
  echo "<br />\n";
} else {
  echo 'No records in menu items';
}







#For each type of restaurant (e.g. Indian or Irish) and the category of menu item (appetiser, main
#or desert), list the average prices of menu items for each category.
$typeSelect = "American";
$categorySelect = "main";

$result = pg_query($conn, 
"SELECT AVG(M.Price) 
FROM MenuItem M, Restaurant R
WHERE R.type = '$typeSelect' AND M.Category = '$categorySelect'");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
if ($row = pg_fetch_row($result)) {
  echo "resturaunt: \n";
  
  echo "Average Price: $row[0] \n";

  echo "<br />\n";
} else {
  echo 'No records in menu items';
}





#Ratings of Resturaunts
#Find the total number of rating for each restaurant, for each rater. That is, the data should be
#grouped by the restaurant, the specific raters and the numeric ratings they have received.
$userID= "js";

$result = pg_query($conn,"SELECT name FROM restaurant");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
if ($row = pg_fetch_row($result)) {
  echo "resturaunt: \n";
  
  echo "Restaurant Name: $row[0] \n";
  echo "# of Ratings: $row[1] \n";
  
  echo "Restaurant Name: $row[2] \n";
  echo "# of Ratings: $row[3] \n";
  
  echo "<br />\n";
} else {
  echo 'No records in menu items';
}

?>
</body>
</html>