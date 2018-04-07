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
                    <input name="email" id="email" placeholder="Enter email" required 
                    autocomplete="off"/>
                </div>
                <div class="form-group">
                    <input name="password" id="password" placeholder="Enter password" required 
                    autocomplete="off"/>
                </div>
                <div class="form-group">
                    <input name="repassword" id="repassword" placeholder="Re-enter password" required 
                    autocomplete="off"/>
                </div>
                
                <div class="row">
                    <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
                </div>
            </form>
            
</body></html> */       

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];

    if ($pass == $repass){
        $name = pg_escape_string($conn, $name);
        $email = pg_escape_string($conn, $email);
        $pass = pg_escape_string($conn, $pass);
        $repass = pg_escape_string($conn, $repass);

        $sqlRegister = pg_query($conn, "INSERT INTO Rater(userID, email, name, password) VALUES ('$email', '$email', '$name', '$pass')");
    
        if (!$sqlLogin) {
        echo "An error occurred.\n";
        exit;
        }

        $sqlCheckReg = pg_query($conn, "SELECT name FROM Rater WHERE name='Owen Adley'");
    
        if (!$sqlCheckReg) {
          echo "An error occurred in reg.\n";
          exit;
        }
        if ($row = pg_fetch_row($sqlCheckReg)) {
          echo "registration done: $row[name]";
        
          echo "<br />\n";
        } else {
          echo 'Could not complete registration';
        }


    }
    
    
            
?>