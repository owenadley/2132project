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
$url = $_POST['url'];

$name = pg_escape_string($conn, $name);
$type = pg_escape_string($conn, $type);
$url = pg_escape_string($conn, $url);

$sqlAddResturaunt = pg_query($conn, "INSERT INTO Restaurant(RestaurantID, name, type, url) VALUES ('$url', '$name', '$type', '$url')");

if (!$sqlAddResturaunt) {
    echo "An error occurred.\n";
    exit;
}

$sqlCheckAddResturaunt = pg_query($conn, "SELECT name FROM Resturaunt WHERE url='$url'");

if (!$sqlCheckAddResturaunt) {
  echo "An error occurred in reg.\n";
  exit;
}

if ($row = pg_fetch_row($sqlCheckAddResturaunt)) {
  echo "$row[name]";
  echo "Resturaunt has been added.";
  echo "<br />\n";

} else {
  echo 'Could not complete registration';
}


    
    
    
            
?>