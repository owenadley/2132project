<?php
session_start();
    
header("Location: index.php");
exit;

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
    $email = $_POST['email'];
    $type = $_POST['type'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];

    if ($pass == $repass){
        $name = pg_escape_string($conn, $name);
        $email = pg_escape_string($conn, $email);
        $type = pg_escape_string($conn, $type);
        $pass = pg_escape_string($conn, $pass);
        $repass = pg_escape_string($conn, $repass);

        $sqlRegister = pg_query($conn, "INSERT INTO Rater(userID, email, name, type, password) VALUES ('$email', '$email', '$name', '$type', '$pass')");
    
        if (!$sqlRegister) {
            echo "An error occurred.\n";
            exit;
        }

        $sqlCheckReg = pg_query($conn, "SELECT name FROM Rater WHERE name='Owen Adley'");
    
        if (!$sqlCheckReg) {
          echo "An error occurred in reg.\n";
          exit;
        }

        if ($row = pg_fetch_row($sqlCheckReg)) {
          echo "$row[name]";
        
          echo "<br />\n";
        } else {
          echo 'Could not complete registration';
        }


    }
    
    
            
?>