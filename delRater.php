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

     

    
$email = $_POST['email'];
$id = $_POST['id'];

$email = pg_escape_string($conn, $email);
$id = pg_escape_string($conn, $id);

$sqlDelRater = pg_query($conn, "DELETE FROM Rater R WHERE R.userID='$email'");

if (!$sqlDelRater) {
    echo "An error occurred.\n";
    $_SESSION['delFail'] = true;
  header('Location: ./userResturaunts.php');
  exit;
} else {
  echo "Rater has been deleted.";
  echo "<br />\n";
  $_SESSION['delSuccess'] = true;
  header('Location: ./userResturaunts.php');
  exit;

}

    