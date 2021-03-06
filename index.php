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

#==================== CREATE TABLES ======================
include 'createTables.php';
#==================== / CREATE TABLES =====================


#=================== FRONT END ===============================
?>
<head>
  <meta charset="UTF-8">
  <meta author="Anushka Paliwal, Owen Adley">
  <title>db2132 Project</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="frontend/style.css">  
  <link rel="stylesheet" href="frontend/popup.css">  

</head>

<div class='header'>
  <h3 id='headerTitle'>Welp</h3>
  
  
  <?php
  #echo $_SESSION['userid'];
  if ($_SESSION['userid']) {
    echo "<div class='userStatus'><div class='loggedIn'><span id='subtext'>Signed is as:</span><br><span id='sub2text'>".$_SESSION['userid']."</span><br>
    <form method='post' action='logout.php'><input type='hidden' name='returnAddr' value='index.php' required/><input id='logout' type='submit' value='Logout' name='logout'/></form></div></div>";
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
 
                     <input type='hidden' name='returnAddr' value='index.php' required/>
 
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
 
                     <input type='hidden' value='index.php' name='returnAddr'/>
                     
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
      <div class='core-home'>
        <h2>Ottawa Resturaunts</h2>
        
        <div class='core-home-topRated'>
          <p id='core-home-subheader'>Top Rated Resturaunts</p>
          <hr>
          <div class="autoplay" id='slider'>
            
            <!--Script to retrieve and populate popular resturaunts on home page display-->       
            <?php
            $result = pg_query($conn,
            "SELECT R.Name, R.Type, AVG(Ra.mood + Ra.food + Ra.staff + Ra.price)/4
            FROM Restaurant R, Rating Ra
            WHERE Ra.RestaurantID = R.RestaurantID 
            GROUP By R.name, R.type
            HAVING AVG(Ra.mood + Ra.food + Ra.staff + Ra.price)/4 > 3
            ");

            if (!$result) {
              echo "An error occurred.\n";
              exit;
            }
            while ($row = pg_fetch_assoc($result)) {
              echo "<div class='featResturaunt'><a href=''><img src='img/$row[type].jpg'><span id='core-home-slideTitle'>$row[name]</span></a></div>";
            }
            ?>

          </div>
          
        </div>
        
        <br><br><br>
        
        <div class='core-home-types'>
          <p id='core-home-subheader'>Resturaunts By Cuisine</p>
          <hr>
          <div class='core-home-typeWrap'>
            <div class='row'>
  
            <?php
            $result = pg_query($conn, "SELECT DISTINCT R.type FROM Restaurant R WHERE R.type != 'Type'");
            
            while ($row = pg_fetch_assoc($result)) {
              echo "<div class='col-md-4 featCuisineWrap' style='background-image: url(img/$row[type].jpg);background-repeat: no-repeat;'>
                      <p class='featCuisinep'>$row[type]</p>
                    </div>";
            }
            ?>
            </div>
          </div>
        </div>
        
      </div>
    </div>


  </div>
</div>

<hr>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="frontend/js.js"></script>

<?php
#=================== / FRONT END =============================




#==================== TEST QUERIES AND RETRIEVAL =========
$test = pg_query($conn, "SELECT * FROM Rater");
$test2 = pg_query($conn, "INSERT INTO food (name) VALUES ('pizza')");

/*$result = pg_query($conn, "SELECT * FROM Rater");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

if ($row = pg_fetch_row($result)) {
  $arr = pg_fetch_all($result);
  print_r($arr);
} else {
  echo 'No records in food';
}*/


#==================== / TEST QUERIES AND RETRIEVAL =======



#==================== INSERT INTO TABLES =====================

#Rater 
if (($handle = fopen("/app/Rater.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO Rater (UserID, email, name, joindate, type, reputation, password) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    '".addslashes($data[6])."'
                )
            ");
        }
    }

  fclose($handle);

#Restaurants
if (($handle = fopen("/app/Restaurants.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO Restaurant (RestaurantID, Name, Type, URL) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."'
                )
            ");
        }
    }

    
  fclose($handle);

#Location
if (($handle = fopen("/app/Location.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO Location (LocationID, firstOpenDate, managerName, phoneNumber, streetAddress, hourOpen, hourClose, RestaurantID) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    '".addslashes($data[6])."',
                    '".addslashes($data[7])."'
                )
            ");
        }
    }
    
    if (!$sql) {
     # echo "cannot input location entries";
    } else {
      #echo "query is valid for locations";
    }
  fclose($handle);
  
#Rating
if (($handle = fopen("/app/Rating.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO Rating (UserID,	Date,	Price,	Food,	Mood,	Staff,	Comments, RestaurantID) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    '".addslashes($data[6])."',
                    '".addslashes($data[7])."'
                )
            ");
        }
    }
    if (!$sql) {
      #echo "cannot input rating entries";
    } else {
      #echo "query is valid for rating";
    }
  fclose($handle);


  
#MenuItems
if (($handle = fopen("/app/MenuItems.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO MenuItem (ItemID,	name,	category,	type,	description,	price, RestaurantID) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    '".addslashes($data[6])."'
                )
            ");
        }
    }
    if (!$sql) {
      #echo "cannot input menuitems entries";
    } else {
      #echo "query is valid for menuitems";
    }
  fclose($handle);
  
  #RatingItem
if (($handle = fopen("/app/RatingItem.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql = pg_query("INSERT INTO RatingItem (UserID,	Date, ItemID,	rating,	comment) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."'
                )
            ");
        }
    }
    if (!$sql) {
      #echo "cannot input ratingitem entries";
    } else {
      #echo "query is valid for ratingitem";
    }
  fclose($handle);


#$insertRaterTable = pg_query($conn, 
#"\copy Rater(UserID,email,name,join-date,type,reputation)
#FROM '/Rater.csv' DELIMITER ',' CSV HEADER");

#$insertValueRaterTable = pg_query($conn, 
#"INSERT INTO Rater(UserID,email,name,join-date,type,reputation)
#VALUES (JD!,jd@email.com,Jane Doe,3/30/2018,blog)
#");

# Testing insertion of values from csv file
/*$result = pg_query($conn, "SELECT * FROM Restaurant");
print "<pre>\n";
if (!$result) {
  echo "It's not working! \n";
  exit;
}

$arr = pg_fetch_all($result);
print_r($arr);*/

#==================== / INSERT INTO TABLES =====================



#==================== / QUERIES =====================
#Resturaunts and Menus

#Some test entries used for queries
/*
$test3 = pg_query($conn, "INSERT INTO restaurant (restaurantID, name, type, URL) VALUES ('1', 'Wendys', 'American', 'www.wendys.com')");
$test6 = pg_query($conn, "INSERT INTO restaurant (restaurantID, name, type, URL) VALUES ('2', 'Milestones', 'American', 'www.milestones.com')");

$test4 = pg_query($conn, "INSERT INTO Location (locationID, firstOpenDate, managerName, phoneNumber, streetAddress, hourOpen, hourClose, RestaurantID) VALUES ('1', '2001-04-25', 'owen', '289-613-2432', '123 road', '3:40', '3:40', '1')");
$test5 = pg_query($conn, "INSERT INTO MenuItem (ItemID, name, type, category, description, price, RestaurantID) VALUES ('1', 'Burger', 'menu', 'food', 'AAA Beef Burger', 20, '1')");
$test5 = pg_query($conn, "INSERT INTO Rating (userID, date, price, food, mood, staff, comments, RestaurantID) VALUES ('js', '2018-03-31', 4, 4, 3, 4, 'great resturaunt!', '1')");
$test7 = pg_query($conn, "INSERT INTO Rating (userID, date, price, food, mood, staff, comments, RestaurantID) VALUES ('js', '2018-04-25', 4, 4, 3, 4, 'great resturaunt!', '2')");
*/
/*$result = pg_query($conn, "SELECT * FROM Restaurant");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
echo "<br><br>";
if ($row = pg_fetch_row($result)) {

} else {
  echo 'No records in restaurant';
}
echo "<br><br>";*/

#Display all the information about a user‐specified restaurant. That is, the user should select the
#name of the restaurant from a list, and the information as contained in the restaurant and
#location tables should then displayed on the screen.

#user defined restraunt chosen from UI



#Display the full menu of a specific restaurant. That is, the user should select the name of the
#restaurant from a list, and all menu items, together with their prices, should be displayed on the
#screen. The menu should be displayed based on menu item categories.

#user defined restraunt chosen from UI







#For each user‐specified category of restaurant, list the manager names together with the date
#that the locations have opened. The user should be able to select the category (e.g. Italian or
#Thai) from a list.








#Given a user‐specified restaurant, find the name of the most expensive menu item. List this
#information together with the name of manager, the opening hours, and the URL of the
#restaurant. The user should be able to select the restaurant name (e.g. El Camino) from a list.








#For each type of restaurant (e.g. Indian or Irish) and the category of menu item (appetiser, main
#or desert), list the average prices of menu items for each category.





#Ratings of Resturaunts
#Find the total number of rating for each restaurant, for each rater. That is, the data should be
#grouped by the restaurant, the specific raters and the numeric ratings they have received.




# need to verify date comparison in this next query

#Display the details of the restaurants that have not been rated in January 2015. That is, you should display the name of the restaurant together with the phone number and the type of
#food.

#Find the names and opening dates of the restaurants that obtained Staff rating that is lower
#than any rating given by rater X. Order your results by the dates of the ratings. (Here, X refers to
#any rater of your choice.)



#List the details of the Type Y restaurants that obtained the highest Food rating. 
#Display the restaurant name together with the name(s) of the rater(s) who gave these ratings. 
#(Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.)

#Provide a query to determine whether Type Y restaurants are “more popular” than other
#restaurants. (Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.)
#Yes, this query is open to your own interpretation!
# Which way do you think we can do it: Based on how many ratings they have in total? OR Based on how many good rating they have in total?  

# names of resturaunts of type Y whos average rating is greater than the average of other types "

#Raters and their ratings

#Find the names, join‐date and reputations of the raters that give the highest overall rating, in
#terms of the Food and the Mood of restaurants. Display this information together with the
#names of the restaurant and the dates the ratings were done.

#Assuming that the highest overall ratings for both means anything equal and more than 8 out of 10


#Find the names and reputations of the raters that give the highest overall rating, in terms of the
#Food or the Mood of restaurants. Display this information together with the names of the
#restaurant and the dates the ratings were done.

#Assuming that the highest overall ratings for each means anything equal and more than 4 out of 5


#Find the names and reputations of the raters that rated a specific restaurant (say Restaurant Z)
#the most frequently. Display this information together with their comments and the names and prices of                                         
#the menu items they discuss. (Here Restaurant Z refers to a restaurant of your own choice, e.g. Ma Cuisine).


#Find the names and emails of all raters who gave ratings that are lower than that of a rater with a name
#called John, in terms of the combined rating of Price, Food, Mood and Staff. (Note that there may be more 
#than one rater with this name).






?>
</body>
</html>