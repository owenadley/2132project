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
      <div class='core-userResturaunts.php'>
        <h2>Browse Resturaunts</h2>

      <form id='filterType' role="form" method="post" action="" autocomplete="off">
 				<label>Sort By Type</label>
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
 				</select>
 				<input type='submit'></input>
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
    </div>
  </div>
</div>

</body></html>