<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that emitted to the Output tab of the console

echo 'Hello world from Cloud9!';

$conn = pg_connect("host=ec2-54-243-210-70.compute-1.amazonaws.com dbname=d88e4kacmh5m8a user=xhgocwtwpvuyuh password=1c568d1c618b10132266a428b65cc08dcb75ea25e71697aaada2da222231dae5");

$test = pg_query($conn, "CREATE TABLE food (name varchar(255))");
$test2 = pg_query($conn, "INSERT INTO food (name) VALUES (pizza)");

$result = pg_query($conn, "SELECT name FROM food");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
  echo "Food: $row[0]";
  echo "<br />\n";
}

?>
</body>
</html>