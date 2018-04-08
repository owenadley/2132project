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


/*<html><body>
    
<head>
  <meta charset="UTF-8">
  <meta author="Anushka Paliwal, Owen Adley">
  <title>db2132 Project</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="frontend/style.css">  
</head>
    
<div class='header'>
  <h3 id='headerTitle'>2132 Foods</h3>
</div>



            <form id='login' role="form" method="post" action="" autocomplete="off">
                <div class="form-group">
                    <input name="username" id="username" placeholder="Enter user ID" required 
                    autocomplete="off"/>
                </div>
                <div class="form-group">
                    <input name="password" id="password" placeholder="Enter password" required 
                    autocomplete="off"/>
                </div>
                
<               div class="form-section btn-container">
					<input type="submit" value="Login">
				</div>           
			</form>
            
</body></html>        */

    
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
        echo "here";
        echo "<br>";
        echo $checkUserID;
        echo "<br>";
        echo $userID;
        echo "<br>";
        echo $checkPassword;
        echo "<br>";
        echo $pass;
        
        if ($checkUserID==$userID && $checkPassword==$pass) {
            $_SESSION['authorized'] = true;
            $_SESSION['success'] = 'Login Successful';
            $_SESSION['userID'] = $checkUserID;
            echo $_SESSION['userid'];
            echo "lol";
            
            #header('Location: ./index.php');
            #exit;
        }
    
    
    }
    
    
            

?>