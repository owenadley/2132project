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
        <h2>My Resturaunts</h2>
        
        <?php 
        if ($_SESSION['userid']) { ?>
          <p>Submit or alter information regarding Resturaunts, Menu Items and Resturaunt Raters</p>
          <br>
          
          <p>Submit New</p>
          <div class='row'>
            <div class='col-md-4'>
              <div class='selectEntry'>
                <p class='nopad' onclick='popAddResturaunt();'>Resturaunt</p>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='selectEntry'>
                <p class='nopad'>Menu Item</p>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='selectEntry'>
                <p class='nopad'>Rater</p>
              </div>
            </div>
          </div>
          
          <hr>
          <br>
          
          <p>Delete Record</p>
          <div class='row'>
            <div class='col-md-4'>
              <div class='selectEntry'>
                <p class='nopad'>Resturaunt</p>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='selectEntry'>
                <p class='nopad'>Menu Item</p>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='selectEntry'>
                <p class='nopad'>Rater</p>
              </div>
            </div>
          </div>
          
          <div id='modal1' class='popupContainer' style='display:none;'>
 				<header class='popupHeader'>
 						<span class='header_title'>Login</span>
 						<span class='modal_close' onclick='unpop();'><i class='fa fa-times'></i></span>
 				</header>
 
 
 						<div class='addEntry' id='addEntryResturaunt'>
								<form id='addResturaunt' role="form" method="post" action="addResturaunt.php" autocomplete="off">
 										<label>Resturaunt Name</label>
										<input name='name' type='text' required />
 										<br />
 										
 										<label>Resturaunt Type</label>
 										<select name='type' required>
 										  <option value='blog'>Blog</option>
 										  <option value='online'>Online</option>
 										  <option value='critic'>Food Critic</option>
 										</select>
 										<br />
 
 										<label>Resturaunt URL</label>
										<input name='url' type='text' required/>
										<br />
 
 										<div class='action_btns'>
 												<div class='one_half last'><input type='submit' class='btn btn_red' value='Register'></input></div>
 										</div>
 								</form>
 						</div>
 					</div>
          
          
          
          
          
          
        <?php } else {
          echo "You must be logged in to submit your own entries!";
        }
        ?>
        


      </div>
    </div>
  </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="frontend/js.js"></script>

</body></html>