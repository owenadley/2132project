<?php
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
reputation int CHECK (reputation BETWEEN 1 AND 5) DEFAULT 1,
password varchar(255)
)");
#print "<pre>\n";

if (!$raterTable) {
  #echo "Creating raterTable is not working. \n";
  exit;
}
else{
  #echo 'Rater Table exists';
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
RestaurantID varchar(255) NOT NULL,
PRIMARY KEY (UserID, Date), 
FOREIGN KEY (UserID) references Rater, 
FOREIGN KEY (RestaurantID) references Restaurant
)");
#print "<pre>\n";
if (!$ratingTable) {
  #echo "Creating ratingTable is not working. \n";
  exit;
}
else{
  #echo 'Rating Table exists';
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
#print "<pre>\n";
if (!$restaurantTable) {
  #echo "Creating restaurantTable is not working. \n";
  exit;
}
else{
  #echo 'Restaurant Table exists';
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
#print "<pre>\n";
if (!$locationTable) {
  #echo "Creating locationTable is not working. \n";
  exit;
}
else{
  #echo 'Location Table exists';
}

# MenuItem(ItemID, name, type, category, category, price, …, RestaurantID)_
# Here we include the item name, as on the menu, the category (starter, main, desert) as well as the
# type (food or beverage). RestaurantID is the foreign key.
#$drop = pg_query($conn, "DROP TABLE MenuItem");

$menuItemTable = pg_query($conn, 
"CREATE TABLE IF NOT EXISTS MenuItem (
ItemID varchar(255) PRIMARY KEY NOT NULL,
name varchar(255),
category varchar(10) CHECK (category IN ('food', 'beverage')),
type varchar(8) CHECK (type IN ('starter', 'main', 'desert')),
description text,
price decimal(12,2),
RestaurantID varchar(255) NOT NULL,
FOREIGN KEY (RestaurantID) references Restaurant
)");
#print "<pre>\n";

if (!$menuItemTable) {
  #echo "Creating menuItemTable is not working. \n";
  exit;
}
else{
  #echo 'MenuItem Table exists';
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
#print "<pre>\n";
if (!$ratingItemTable) {
  #echo "Creating ratingItemTable is not working. \n";
  exit;
}
else{
  #echo 'RatingItem Table exists';
}

#==================== / CREATE TABLES =====================
?>