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
$id = $_POST['id'];

$name = pg_escape_string($conn, $name);
$id = pg_escape_string($conn, $id);

$id = $name . $id;
$sqlDelMenuItem = pg_query($conn, "DELETE FROM MenuItem M WHERE M.ItemID='$id'");

if (!$sqlDelMenuItem) {
    echo "An error occurred.\n";
    exit;
} else {
  echo "Menu Item has been deleted.";
  echo "<br />\n";
  $_SESSION['delSuccess'] = true;
  header('Location: ./userResturaunts.php');
  exit;

}

    