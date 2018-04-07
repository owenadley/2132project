<?php
    session_start();

$conn = pg_connect(pg_connection_string_from_database_url());

if (!$conn) {
  echo "An error occurred.\n";
  exit;
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

    
    $userID = $_POST['username'];
    $pass = $_POST['password'];
    
    $userID = pg_escape_string($conn, $userID);
    $pass = pg_escape_string($conn, $pass);
    
    $sqlLogin = pg_query($conn, "SELECT * FROM Rater WHERE UserID=$userID AND password=$pass");
    
    if (!$sqlLogin) {
    echo "An error occurred.\n";
    exit;
    }

    while ($row = pg_fetch_assoc($sqlLogin)) {
    
        $checkUserID = $row['UserID'];
        $checkPassword = $row['password'];
        
            if ($checkUserID==$userID && $checkPassword==$pass){
                $_SESSION['authorized'] = true;
                $_SESSION['success'] = 'Login Successful';
                header('Location: ./index.php');
                exit;
            }
    
    
    }
    
    
            

?>