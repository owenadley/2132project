<?php
    session_start();



function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://xhgocwtwpvuyuh:1c568d1c618b10132266a428b65cc08dcb75ea25e71697aaada2da222231dae5@ec2-54-243-210-70.compute-1.amazonaws.com:5432/d88e4kacmh5m8a
"]));
  return "user=xhgocwtwpvuyuh password=1c568d1c618b10132266a428b65cc08dcb75ea25e71697aaada2da222231dae5 host=ec2-54-243-210-70.compute-1.amazonaws.com dbname=d88e4kacmh5m8a" . substr($path, 1);
}

# Establish connection
$conn = pg_connect(pg_connection_string_from_database_url());


?>

<html><body>
    
<head>
  <meta charset="UTF-8">
  <meta author="Anushka Paliwal, Owen Adley">
  <title>db2132 Project</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="frontend/js.js"></script>
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
    <div class='col-md-offset-1 col-md-9'>
      <div class='core-panels'>
          <h3>Resturaunts and Menus</h3>
        <div class='row'>
          <div class='col-md-2'>
            <div class='panel' onclick='showQuery1a();'>
              <p>Query 1a</p>
            </div>
          </div>
          <div class='col-md-2' onclick='showQuery1b();'>
            <div class='panel'>
              <p>Query 1b</p>
            </div>
          </div> 
          <div class='col-md-2' onclick='showQuery1c();'>
            <div class='panel'>
              <p>Query 1c</p>
            </div>
          </div> 
          <div class='col-md-2' onclick='showQuery1d();'>
            <div class='panel'>
              <p>Query 1d</p>
            </div>
          </div> 
          <div class='col-md-2' onclick='showQuery1e();'>
            <div class='panel'>
              <p>Query 1e</p>
            </div>
          </div> 
        </div>
        <br>
         <h3>Ratings Of Resturaunts</h3>
        <div class='row'>
          <div class='col-md-2' onclick='showQuery2f();'>
            <div class='panel'>
              <p>Query 2f</p>
            </div>
          </div> 
          <div class='col-md-2' onclick='showQuery2g();'>
            <div class='panel'>
              <p>Query 2g</p>
            </div>
          </div> 
          <div class='col-md-2' onclick='showQuery2h();'>
            <div class='panel'>
              <p>Query 2h</p>
            </div>
          </div> 
          <div class='col-md-2' onclick='showQuery2i();'>
            <div class='panel'>
              <p>Query 2i</p>
            </div>
          </div>
          <div class='col-md-2' onclick='showQuery2j();'>
            <div class='panel'>
              <p>Query 2j</p>
            </div>
          </div>
        </div>
        <br>
          <h3>Raters and Their Ratings</h3>        
        <div class='row'>
          <div class='col-md-2' onclick='showQuery3k();'>
            <div class='panel'>
              <p>Query 3k</p>
            </div>
          </div>
          <div class='col-md-2' onclick='showQuery3l();'>
            <div class='panel'>
              <p>Query 3l</p>
            </div>
          </div>
          <div class='col-md-2' onclick='showQuery3m();'>
            <div class='panel'>
              <p>Query 3m</p>
            </div>
          </div>
          <div class='col-md-2' onclick='showQuery3n();'>
            <div class='panel'>
              <p>Query 3n</p>
            </div>
          </div>
          <div class='col-md-2' onclick='showQuery3o();'>
            <div class='panel'>
              <p>Query 3o</p>
            </div>
          </div>
        </div>
      </div>
      
      <div id='queryDisplay1a' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery1a()'></i></div>
        a : Display all the information about a user‐specified restaurant. That is, the user should select the
name of the restaurant from a list, and the information as contained in the restaurant and
location tables should then displayed on the screen.
         
          <form id='filterType' role="form" method="post" action="" autocomplete="off">
     				<label>Select Resturaunt:</label>
     				<select name='restaurant' required>
     				  <option selected>
       				  <?php 
       				  if ($_POST['restaurant'] != null) {
      				    echo $_POST['restaurant'];
       				  } ?>
    			     </option>
    			   <?php 
    			   $sql = pg_query($conn, "SELECT DISTINCT R.name FROM Restaurant R");
    			   while ($row = pg_fetch_assoc($sql)) {
    			     $res = $row['name'];
    			     echo "<option value='$res'>$res</option>";
    			   }
    			   ?>
     				</select>
     				<input type='submit' onclick='showQuery1a();'></input>
     			</form>
     			
          <?php
          if ($_POST['restaurant'] != null) {
            $resturauntselect = $_POST['restaurant'];
            $_POST['restaurant'] = null;
            
            $result = pg_query($conn, "SELECT * FROM restaurant R,Location L 
                                       WHERE R.name = '$resturauntselect' AND L.RestaurantID = R.RestaurantID");
            
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          }
          ?>
          
          <div class="container">
            <br/>
            <table class='tableD'>
              <tr class='trD'>
                <th class='trD'>Restaurant ID</th>
                <th class='trD'>Name</th>
                <th class='trD'>Type</th>
                <th class='trD'>URL</th>
                <th class='trD'>Location ID</th>
                <th class='trD'>Opening Date</th>
                <th class='trD'>Manager Name</th>
                <th class='trD'>Phone Number</th>
                <th class='trD'>Street Address</th>
                <th class='trD'>Opening time</th>
                <th class='trD'>Closing time</th>
              </tr>
              <?php while ($row = pg_fetch_assoc($result)): ?>
              <tr class='trD'>
                <td class='trD'><?php echo $row['restaurantid']; ?></td>
                <td class='trD'><?php echo $row['name']; ?></td>
                <td class='trD'><?php echo $row['type']; ?></td>
                <td class='trD'><?php echo $row['url']; ?></td>
                <td class='trD'><?php echo $row['locationid']; ?></td>
                <td class='trD'><?php echo $row['firstopendate']; ?></td>
                <td class='trD'><?php echo $row['managername']; ?></td>
                <td class='trD'><?php echo $row['phonenumber']; ?></td>
                <td class='trD'><?php echo $row['streetaddress']; ?></td>
                <td class='trD'><?php echo $row['houropen']; ?></td>
                <td class='trD'><?php echo $row['hourclose']; ?></td>
              </tr>
              <?php endwhile; ?>
            </table>
          </div>
      </div>
      
      <div id='queryDisplay1b' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery1b()'></i></div>
        b : Display the full menu of a specific restaurant. That is, the user should select the name of the
restaurant from a list, and all menu items, together with their prices, should be displayed on the
screen. The menu should be displayed based on menu item categories.
          
          
          <form id='filterType' role="form" method="post" action="" autocomplete="off">
     				<label>Select Resturaunt:</label>
     				<select name='restaurant1' required>
     				  <option selected>
       				  <?php 
       				  if ($_POST['restaurant1'] != null) {
      				    echo $_POST['restaurant1'];
       				  } ?>
    			     </option>
    			   <?php 
    			   $sql = pg_query($conn, "SELECT DISTINCT R.name FROM Restaurant R");
    			   while ($row = pg_fetch_assoc($sql)) {
    			     $res = $row['name'];
    			     echo "<option value='$res'>$res</option>";
    			   }
    			   ?>
     				</select>
     				<input type='submit'></input>
     			</form>
     			
          <?php
          if ($_POST['restaurant1'] != null) {
            $resturauntselect = $_POST['restaurant1'];
            $_POST['restaurant1'] = null;
            
            $result = pg_query($conn, "SELECT M.* FROM MenuItem M, Restaurant R 
              WHERE R.name = '$resturauntselect' AND M.restaurantID = R.RestaurantID
              ORDER BY M.category ASC");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Item ID</th>
                  <th class='trD'>Name</th>
                  <th class='trD'>Type</th>
                  <th class='trD'>Category</th>
                  <th class='trD'>Description</th>
                  <th class='trD'>Price  ($)</th>
                  <th class='trD'>Restaurant ID</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['itemid']; ?></td>
                  <td class='trD'><?php echo $row['name']; ?></td>
                  <td class='trD'><?php echo $row['type']; ?></td>
                  <td class='trD'><?php echo $row['category']; ?></td>
                  <td class='trD'><?php echo $row['description']; ?></td>
                  <td class='trD'><?php echo $row['price']; ?></td>
                  <td class='trD'><?php echo $row['restaurantid']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
      </div> 
      
      <div id='queryDisplay1c' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery1c()'></i></div>
        c : For each user‐specified category of restaurant, list the manager names together with the date
that the locations have opened. The user should be able to select the category (e.g. Italian or
Thai) from a list.

          <form id='filterType' role="form" method="post" action="" autocomplete="off">
     				<label>Select Resturaunt:</label>
     				<select name='restaurant2' required>
     				  <option selected>
       				  <?php 
       				  if ($_POST['restaurant2'] != null) {
      				    echo $_POST['restaurant2'];
       				  } ?>
    			     </option>
    			   <?php 
    			   $sql = pg_query($conn, "SELECT DISTINCT R.type FROM Restaurant R");
    			   while ($row = pg_fetch_assoc($sql)) {
    			     $res = $row['type'];
    			     echo "<option value='$res'>$res</option>";
    			   }
    			   ?>
     				</select>
     				<input type='submit'></input>
     			</form>
     			
          <?php
          if ($_POST['restaurant2'] != null) {
            $categoryselect = $_POST['restaurant2'];
            $_POST['restaurant2'] = null;

            $result = pg_query($conn, "SELECT L.managerName, L.firstOpenDate FROM Location L, Restaurant R 
            WHERE R.type = '$categoryselect' AND L.restaurantID = R.RestaurantID");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Manager Name</th>
                  <th class='trD'>Opening Date</th>
                  
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['managername']; ?></td>
                  <td class='trD'><?php echo $row['firstopendate']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
      </div>
      
      <div id='queryDisplay1d' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery1d()'></i></div>
        d : Given a user‐specified restaurant, find the name of the most expensive menu item. List this
information together with the name of manager, the opening hours, and the URL of the
restaurant. The user should be able to select the restaurant name (e.g. El Camino) from a list.
          
          <form id='filterType' role="form" method="post" action="" autocomplete="off">
     				<label>Select Resturaunt:</label>
     				<select name='restaurant3' required>
     				  <option selected>
       				  <?php 
       				  if ($_POST['restaurant3'] != null) {
      				    echo $_POST['restaurant3'];
       				  } ?>
    			     </option>
    			     
    			   <?php 
    			   $sql = pg_query($conn, "SELECT DISTINCT R.name FROM Restaurant R");
    			   while ($row = pg_fetch_assoc($sql)) {
    			     $res = $row['name'];
    			     echo "<option value='$res'>$res</option>";
    			   }
    			   ?>
     				</select>
     				<input type='submit'></input>
     			</form>
     			
          <?php
          if ($_POST['restaurant3'] != null) {
            $resturauntselect = $_POST['restaurant3'];
            $_POST['restaurant3'] = null; 

            $result = pg_query($conn, 
              "SELECT L.managerName, L.hourOpen, M.name, R.URL, MAX(M.Price) AS price
              FROM Restaurant R, Location L, MenuItem M 
              WHERE R.name = '$resturauntselect' AND L.RestaurantID = R.RestaurantID 
                AND M.RestaurantID = R.RestaurantID
                AND M.price >= ALL(SELECT Mm.price FROM MenuItem Mm WHERE Mm.restaurantID = R.restaurantID)
              GROUP BY R.URL, L.ManagerName, L.hourOpen, M.name");
            
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Manager Name</th>
                  <th class='trD'>Opening time</th>
                  <th class='trD'>Menu Item</th>
                  <th class='trD'>Price ($)</th>
                  <th class='trD'>URL</th>

                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['managername']; ?></td>
                  <td class='trD'><?php echo $row['houropen']; ?></td>
                  <td class='trD'><?php echo $row['name']; ?></td>
                  <td class='trD'><?php echo $row['price']; ?></td>
                  <td class='trD'><?php echo $row['url']; ?></td>

                </tr>
                <?php endwhile; ?>
              </table>
            </div>
        </div>
      
      <div id='queryDisplay1e' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery1e()'></i></div>
        e : For each type of restaurant (e.g. Indian or Irish) and the category of menu item (appetiser, main
or desert), list the average prices of menu items for each category.
        <?php
            $result = pg_query($conn, 
              "SELECT AVG(M.Price) AS avgprice, R.type AS resttype, M.category AS foodcat  
              FROM Restaurant R
              LEFT JOIN MenuItem M ON R.restaurantID=M.restaurantID
              WHERE M.restaurantID IN (SELECT Res.restaurantID FROM Restaurant Res WHERE Res.type=R.type)
              GROUP BY R.type, M.category 
              ORDER BY R.type, M.category");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Type of Restaurant</th>
                  <th class='trD'>Category of Menu Item</th>
                  <th class='trD'>Average Price ($)</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['resttype']; ?></td>
                  <td class='trD'><?php echo $row['foodcat']; ?></td>
                  <td class='trD'><?php echo $row['avgprice']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>  
      </div>
      
      
      <div id='queryDisplay2f' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2f()'></i></div>
        f : Find the total number of rating for each restaurant, for each rater. That is, the data should be
grouped by the restaurant, the specific raters and the numeric ratings they have received.
          <?php
            $result = pg_query($conn, 
              "SELECT Res.Name AS resname, R.name AS rname, (Rat.Price + Rat.Food + Rat.Mood + Rat.Staff) AS total
              FROM restaurant Res, Rater R, Rating Rat
              WHERE Res.RestaurantID = Rat.RestaurantID AND R.UserID = Rat.UserID
              GROUP By Res.Name, R.name, total");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Rater Name</th>
                  <th class='trD'>Total number of rating</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['rname']; ?></td>
                  <td class='trD'><?php echo $row['total']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
      </div>
      
      <div id='queryDisplay2g' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2g()'></i></div>
        g : Display the details of the restaurants that have not been rated in January 2015. That is, you should display the name of the restaurant together with the phone number and the type of
        food.
        <?php
            $result = pg_query($conn, 
              "SELECT R.Name AS resname, R.Type AS restype, L.phoneNumber AS resnumber
              FROM Restaurant R, Location L
              WHERE L.RestaurantID = R.RestaurantID 
              AND R.RestaurantID NOT IN (SELECT Ra.restaurantID FROM Rating Ra WHERE (Ra.Date BETWEEN '2015-01-01'  AND '2015-01-31'))
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Phone Number</th>
                  <th class='trD'>Restaurant Type</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['resnumber']; ?></td>
                  <td class='trD'><?php echo $row['restype']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
      </div> 
      
      <div id='queryDisplay2h' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2h()'></i></div>
        h : Find the names and opening dates of the restaurants that obtained Staff rating that is lower
        than any rating given by rater X. Order your results by the dates of the ratings. (Here, X refers to
        any rater of your choice.)
        <?php
            $userIDSelect = "voldy";
            $result = pg_query($conn, 
              "SELECT Rest.Name AS resname, RL.firstOpenDate AS date
              FROM Rating Rat
              LEFT JOIN Restaurant Rest ON Rat.RestaurantID=Rest.RestaurantID
              LEFT JOIN Location RL ON RL.RestaurantID=Rat.RestaurantID
              WHERE Rat.UserID = '$userIDSelect'
                    AND ((Rat.Price>( SELECT AVG(Rat.Staff)
                      FROM Rating Rat, Restaurant Rest
                      WHERE Rat.RestaurantID=Rest.RestaurantID))
                    OR (Rat.Mood>( SELECT AVG(Rat.Staff)
                      FROM Rating Rat, Restaurant Rest
                      WHERE Rat.RestaurantID=Rest.RestaurantID))
                    OR (Rat.Food>( SELECT AVG(Rat.Staff)
                      FROM Rating Rat, Restaurant Rest
                      WHERE Rat.RestaurantID=Rest.RestaurantID))
                    OR (Rat.Staff>( SELECT AVG(Rat.Staff)
                      FROM Rating Rat, Restaurant Rest
                      WHERE Rat.RestaurantID=Rest.RestaurantID)))
              GROUP BY RL.firstOpenDate, Rest.name
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>
            <br/>
            X refers to userID: <?php echo $userIDSelect; ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Opening Date</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['date']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
        
      </div>
      
      <div id='queryDisplay2i' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2i()'></i></div>
        i : List the details of the Type Y restaurants that obtained the highest Food rating. Display the
        restaurant name together with the name(s) of the rater(s) who gave these ratings. (Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.)
          <?php
            $typeSelect = "American";
            $result = pg_query($conn, 
              "SELECT R.Name As resname, Ra.name AS raname, MAX(Rating.food) AS max
              FROM Restaurant R, Rater Ra, Rating
              WHERE R.type = '$typeSelect' 
              AND Rating.food = (SELECT MAX (Rating.food) FROM Rating) 
              AND Rating.userID = Ra.userID
              GROUP BY R.name, Ra.name
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>
          <br/>
          Y refers to restaurant type: <?php echo $typeSelect; ?>

            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Rater Name</th>
                  <th class='trD'>Highest Food Rating</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['raname']; ?></td>
                  <td class='trD'><?php echo $row['max']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
      </div>
      
      <div id='queryDisplay2j' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2j()'></i></div>
        j : Provide a query to determine whether Type Y restaurants are “more popular” than other restaurants. (Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.) Yes, this query is open to your own interpretation!
        <?php
            $typeSelect = "American";
            $result = pg_query($conn, 
              "SELECT DISTINCT R.name AS resname, AVG(Ra.price + Ra.food + Ra.mood + Ra.staff)/4
               FROM Restaurant R, Rating Ra
               WHERE R.type = '$typeSelect' AND Ra.RestaurantID = R.RestaurantID
               AND (Ra.price + Ra.food + Ra.mood + Ra.staff) > (SELECT AVG(Ra.price + Ra.food + Ra.mood + Ra.staff) FROM Rating Ra, Restaurant R WHERE R.type != '$typeSelect')
               GROUP By R.name              
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
  $arr = pg_fetch_all($result);
  print_r($arr);
          ?>
          
          <br/>
          Y refers to restaurant type: <?php echo $typeSelect; ?>

            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Restaurant ID</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['resid']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>      
      </div>
      
      
      <div id='queryDisplay3k' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3k()'></i></div>
        k : Find the names, join‐date and reputations of the raters that give the highest overall rating, in
terms of the Food and the Mood of restaurants. Display this information together with the
names of the restaurant and the dates the ratings were done.
        <?php
        #Assuming that the highest overall ratings for both means anything equal and more than 8 out of 10

            $result = pg_query($conn, 
              "SELECT DISTINCT  Ra.name AS uname, Ra.joindate AS jdate, Ra.reputation AS rep, R.Name AS resname, Rat.Date AS date
              FROM Rater Ra, Restaurant R, Rating Rat
              WHERE R.RestaurantID = Rat.restaurantID
                    AND Ra.userID = Rat.userID
                    AND Ra.userID = Rat.userID
                    GROUP By Ra.userID, R.Name, Rat.Date
                    HAVING AVG(Rat.Mood + Rat.Food)/2 >= 4
                    LIMIT 10
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>

            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Rater Name</th>
                  <th class='trD'>Rater join date</th>
                  <th class='trD'>Reputation</th>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Rating date</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['uname']; ?></td>
                  <td class='trD'><?php echo $row['jdate']; ?></td>
                  <td class='trD'><?php echo $row['rep']; ?></td>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['date']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>      
      </div>
      
      <div id='queryDisplay3l' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3l()'></i></div>
        l : Find the names and reputations of the raters that give the highest overall rating, in terms of the
Food or the Mood of restaurants. Display this information together with the names of the
restaurant and the dates the ratings were done.
        <?php
            $result = pg_query($conn, 
              "SELECT DISTINCT Ra.name AS uname, Ra.reputation AS rep, R.Name AS resname, Rat.Date AS date
              FROM Rater Ra, Restaurant R, Rating Rat
              WHERE Ra.userID = Rat.userID AND R.restaurantID = Rat.restaurantID
                     GROUP By Ra.userID, R.Name, Rat.Date, Rat.Mood, Rat.Food 
                     HAVING (Rat.Mood >= 4) OR (Rat.Food >=4)
                     LIMIT 10
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>

            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Rater Name</th>
                  <th class='trD'>Reputation</th>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Rating date</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['uname']; ?></td>
                  <td class='trD'><?php echo $row['rep']; ?></td>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['date']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
      </div> 
      
      <div id='queryDisplay3m' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3m()'></i></div>
        m : Find the names and reputations of the raters that rated a specific restaurant (say Restaurant Z)
the most frequently. Display this information together with their comments and the names and prices of the menu items they discuss. (Here Restaurant Z refers to a restaurant of your own choice, e.g. Ma Cuisine).
        <?php
            $result = pg_query($conn, 
              "SELECT DISTINCT Ra.name AS uname, Ra.reputation AS rep, R.Name AS resname, Rat.Date AS date
              FROM Rater Ra, Restaurant R, Rating Rat
              WHERE Ra.userID = Rat.userID AND R.restaurantID = Rat.restaurantID
                     GROUP By Ra.userID, R.Name, Rat.Date, Rat.Mood, Rat.Food 
                     HAVING (Rat.Mood >= 4) OR (Rat.Food >=4)
                     LIMIT 10
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>

            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Rater Name</th>
                  <th class='trD'>Reputation</th>
                  <th class='trD'>Restaurant Name</th>
                  <th class='trD'>Rating date</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['uname']; ?></td>
                  <td class='trD'><?php echo $row['rep']; ?></td>
                  <td class='trD'><?php echo $row['resname']; ?></td>
                  <td class='trD'><?php echo $row['date']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>      
      
      </div>
      
      <div id='queryDisplay3n' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3n()'></i></div>
        n : Find the names and emails of all raters who gave ratings that are lower than that of a rater with a name called John, in terms of the combined rating of Price, Food, Mood and Staff. (Note that there may be more than one rater with this name).
        <?php
            $result = pg_query($conn, 
              "SELECT R.name, R.email FROM Rater 
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>

            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Rater Name</th>
                  <th class='trD'>Rater Type</th>
                  <th class='trD'>Email</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['name']; ?></td>
                  <td class='trD'><?php echo $row['type']; ?></td>
                  <td class='trD'><?php echo $row['email']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
      </div>
      
      <div id='queryDisplay3o' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3o()'></i></div> 
        o : Find the names, types and emails of the raters that provide the most diverse ratings. Display this information together with the restaurants names and the ratings. For example, Jane Doe may have rated the Food at the Imperial Palace restaurant as a 1 on 1 January 2015, as a 5 on 15 January 2015, and a 3 on 4 February 2015. Clearly, she changes her mind quite often.
        
        <?php
            $result = pg_query($conn, 
              "SELECT DISTINCT R.*
              FROM Rater R, Rating Rat
              WHERE R.userid = Rat.userid
              ORDER BY @(Rat.Food - Rat.Mood) ASC
              LIMIT 10;
              ");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>

            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Rater Name</th>
                  <th class='trD'>Rater Type</th>
                  <th class='trD'>Email</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['name']; ?></td>
                  <td class='trD'><?php echo $row['type']; ?></td>
                  <td class='trD'><?php echo $row['email']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
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