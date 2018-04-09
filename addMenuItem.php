<?php
session_start();


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
    echo "connected";
}

     

    
$name = $_POST['name'];
$type = $_POST['type'];
$cat = $_POST['cat'];
$description = $_POST['description'];
$price = $_POST['price'];
$restauraunt = $_POST['restauraunt'];

$name = pg_escape_string($conn, $name);
$type = pg_escape_string($conn, $type);
$cat = pg_escape_string($conn, $cat);
$description = pg_escape_string($conn, $description);
$price = pg_escape_string($conn, $price);
$restauraunt = pg_escape_string($conn, $restauraunt);

$itemid = $name . $restauraunt;
$sqlAddMenuItem= pg_query($conn, "
INSERT INTO MenuItem(ItemID, name, category, type, description, price, restaurantID) 
VALUES ('$itemid', '$name', '$cat', '$type', '$description', '$price', '$restauraunt')");

if (!$sqlAddMenuItem) {
    echo "An error occurred.\n";
    echo error;
    exit;
}

$sqlCheckAddMenuItem= pg_query($conn, "SELECT name FROM MenuItem WHERE ItemID='$itemid'");

if (!$sqlCheckAddMenuItem) {
  echo "An error occurred in reg.\n";
  exit;
}

if ($row = pg_fetch_row($sqlCheckAddMenuItem)) {
  echo "$row[name]";
  echo "MenuItem has been added.";
  echo "<br />\n";
  $_SESSION['addSuccess'] = true;
  header('Location: ./userResturaunts.php');
  exit;

} else {
  echo 'Could not complete registration';
}


    
    
    
            
?>