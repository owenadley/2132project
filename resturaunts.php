<html><body>
<?php

session_start();

#==================== CONNECTION =========================
# Extract connection from db URL
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
    #echo 'Connected';
}

# Testing connection
/*$result = pg_query($conn, "SELECT relname FROM pg_stat_user_tables WHERE schemaname='public'");
print "<pre>\n";
if (!pg_num_rows($result)) {
  print("Connection is working, but database is empty.\n");
} else {
  print "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}*/
#==================== / CONNECTION =======================

?>

<head>
  <meta charset="UTF-8">
  <meta author="Anushka Paliwal, Owen Adley">
  <title>db2132 Project</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="frontend/style.css"> 
  <link rel="stylesheet" href="frontend/popup.css">
</head>
    
<div class='header'>
  <h3 id='headerTitle'>2132 Foods</h3>
  
  <?php
  #echo $_SESSION['userid'];
  if ($_SESSION['userid']) {
    echo "<div class='userStatus'><div class='loggedIn'><span id='subtext'>Signed is as:</span><br><span id='sub2text'>".$_SESSION['userid']."</span><br>
    <form method='post' action='logout.php'><input type='hidden' name='returnAddr' value='resturaunts.php' required/><input id='logout' type='submit' value='Logout' name='logout'/></form></div></div>";
  } else { 
    echo "  <div class='container'>
              <a class='button' id='modal_trigger' onclick='pop();'>LOGIN | REGISTER</a>
            </div>";
  }?>  
  
</div>

<!-- LOGIN AND REGISTER POPUP -->
   <div id='modal' class='popupContainer' style='display:none;'>
 				<header class='popupHeader'>
 						<span class='header_title'>Login</span>
 						<span class='modal_close' onclick='unpop();'><i class='fa fa-times'></i></span>
 				</header>
 
 				<section class='popupBody'>
 						<!-- Social Login -->
 						<div class='social_login'>
 								<div class=''>
 										<a href='#' class='social_box fb'>
 												<span class='icon'><i class='fa fa-facebook'></i></span>
 												<span class='icon_title'>Connect with Facebook</span>
 
 										</a>
 
 										<a href='#' class='social_box google'>
 												<span class='icon'><i class='fa fa-google-plus'></i></span>
 												<span class='icon_title'>Connect with Google</span>
 										</a>
 								</div>
 
 								<div class='centeredText'>
 										<span>Or use your Email address</span>
 								</div>
 
 								<div class='action_btns'>
 										<div class='one_half'><a onclick='log();' id='login_form' class='btn'>Login</a></div>
 										<div class='one_half last'><a onclick='reg();' id='register_form' class='btn'>Sign up</a></div>
 								</div>
 						</div>
 
 						<!-- Username & Password Login form -->
 						<div class='user_login' id='ulogin'>
								<form id='login' role='form' method='post' action='login.php' autocomplete='off'>
										<label>Email</label>
										<input name='email' type='text' required/>
 										<br />
 
 										<label>Password</label>
										<input name='password' type='password'required/>
 										<br />
 
 										<div class='checkbox'>
 												<input id='remember' type='checkbox' />
 												<label for='remember'>Remember me on this computer</label>
 										</div>
 
                    <input type='hidden' name='returnAddr' value='resturaunts.php' required/> 
 
 										<div class='action_btns'>
 												<div class='one_half'><a onclick='back();' class='btn back_btn'><i class='fa fa-angle-double-left'></i> Back</a></div>
 												<div class='one_half last'><input type='submit' class='btn btn_red' value='Login'></input></div>
 										</div>
 								</form>
 
 								<a href='#' class='forgot_password'>Forgot password?</a>
 						</div>
 
 						<!-- Register Form -->
 						<div class='user_register' id='uregister'>
								<form id='register' role="form" method="post" action="Register.php" autocomplete="off">
 										<label>Full Name</label>
										<input name='name' type='text' required />
 										<br />
 
 										<label>Email Address</label>
										<input name ='email' type='email' required/>
 										<br />
 										
 										<label>Type</label>
 										<select name='type' required>
 										  <option value='blog'>Blog</option>
 										  <option value='online'>Online</option>
 										  <option value='critic'>Food Critic</option>
 										</select>
 										<br />
 
 										<label>Password</label>
										<input name='password' type='password' required/>
										<br />
										
										<label>Re-enter Password</label>
										<input name='repassword' type='password' required/>
 										<br />
 
 
 										<div class='checkbox'>
 												<input id='send_updates' type='checkbox' />
 												<label for='send_updates'>Send me occasional email updates</label>
 										</div>
 
                    <input type='hidden' name='returnAddr' value='resturaunts.php' required/>
                     
 										<div class='action_btns'>
 												<div class='one_half'><a onclick='back();' class='btn back_btn'><i class='fa fa-angle-double-left'></i> Back</a></div>
 												<div class='one_half last'><input type='submit' class='btn btn_red' value='Register'></input></div>
 										</div>
 								</form>
 						</div>
 				</section>
		</div>

<div class='core-content'>
  
  <br>
  
  <div class='row'>
   
    <div class='col-md-3'>
      
      <div class='sidemenu'>
        <div class='sidemenu-option'>
          <a href='index.php'><p class='nopad sidemenup'>Home</p></a>
        </div>
        <div class='sidemenu-option'>
          <a href='resturaunts.php'><p class='nopad sidemenup'>Browse Resturaunts</p></a>
        </div>
        <div class='sidemenu-option'>
          <a href='userResturaunts.php'><p class='nopad sidemenup'>My Resturaunts</p></a>
        </div>
        <div class='sidemenu-option'>
          <a href='queries.php'><p class='nopad sidemenup'>Resturaunt Queries</p></a>
        </div>
      </div>
      
    </div>
    <div class='col-md-9'>
      <div class='core-userResturaunts'>
        <h2>Browse Restaurants</h2><br>
      <div class='row'>
        <div class='col-md-6'>
          <form id='filterType' role="form" method="post" action="" autocomplete="off">
     				<label>Browse By Type</label><hr>
     				<select name='type' required>
     				  <option selected>
     				  <?php 
     				  if ($_POST['type'] != null) {
    				    echo $_POST['type'];
     				  } ?>
    			 </option>
     				  <option value='American'>American</option>
     				  <option value='Chinese'>Chinese</option>
     				  <option value='Fast Food'>Fast Food</option>
     				  <option value='Greek'>Greek</option>
     				  <option value='Indian'>Indian</option>
     				  <option value='Italian'>Italian</option>
     				  <option value='Korean'>Korean</option>
     				  <option value='Mediterranean'>Mediterranean</option>
     				  <option value='Mexican'>Mexican</option>
     				  <option value='Sushi'>Sushi</option>
     				</select><br><br>
     				<input class='submitBrowse' type='submit'></input>
     			</form>
				<br />
				
  				<?php 
  				if ($_POST['type'] != null) {
  				  $type = $_POST['type'];
  				  
  				  $filterType = pg_query($conn, "SELECT * FROM Restaurant WHERE Type='$type'");
  				  if (!$filterType) {
  				    echo "err";
  				  }
  				  
            while($row = pg_fetch_assoc($filterType)) {
              echo "Name: ".$row['name']." \n <br>";
              echo "URL: ".$row['url']." \n <br><br>";
            }
  				} else {
  				  #echo "not posted";
  				}
  				?>
  			</div>        
        <div class='col-md-6'>
          
          
        </div>
        
      </div>
    </div>
  </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="frontend/js.js"></script>

</body></html>