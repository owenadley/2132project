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




    $returnAddr = $_POST['returnAddr'];
    $userID = $_POST['email'];
    $pass = $_POST['password'];
    
    $userID = pg_escape_string($conn, $userID);
    $pass = pg_escape_string($conn, $pass);
    
    $sqlLogin = pg_query($conn, "SELECT * FROM Rater WHERE UserID='$userID' AND password='$pass'");
    
    if (!$sqlLogin) {
    echo "An error occurred.\n";
    exit;
    }

    if ($row = pg_fetch_assoc($sqlLogin)) {
    
        $checkUserID = $row['userid'];
        $checkPassword = $row['password'];

        
        if ($checkUserID==$userID && $checkPassword==$pass) {
            $_SESSION['authorized'] = true;
            $_SESSION['success'] = 'Login Successful';
            $_SESSION['userid'] = $checkUserID;
            echo $_SESSION['userid'];
            
            echo $returnAddr;
            #header('Location: ./'.$returnAddr);
            #exit;
        }
    
    
    }
    
    
            

?>