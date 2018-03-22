<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that emitted to the Output tab of the console

echo 'Hello world from Cloud9!';

function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://xhgocwtwpvuyuh:1c568d1c618b10132266a428b65cc08dcb75ea25e71697aaada2da222231dae5@ec2-54-243-210-70.compute-1.amazonaws.com:5432/d88e4kacmh5m8a
"]));
  return "user=xhgocwtwpvuyuh password=1c568d1c618b10132266a428b65cc08dcb75ea25e71697aaada2da222231dae5 host=ec2-54-243-210-70.compute-1.amazonaws.com dbname=d88e4kacmh5m8a" . substr($path, 1); # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$conn = pg_connect(pg_connection_string_from_database_url());


if (!$conn) {
  echo "An error occurred.\n";
  exit;
} else {
    echo 'Connected';
}

# Now let's use the connection for something silly just to prove it works:
$result = pg_query($conn, "SELECT relname FROM pg_stat_user_tables WHERE schemaname='public'");
print "<pre>\n";
if (!pg_num_rows($result)) {
  print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
  print "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}


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