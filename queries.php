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
?>

<html><body>
    
<head>
  <meta charset="UTF-8">
  <meta author="Anushka Paliwal, Owen Adley">
  <title>db2132 Project</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

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
          <?php 
            $resturauntselect = "Canal Ritz";
            $result = pg_query($conn, "SELECT * FROM restaurant R,Location L 
                                       WHERE R.name = '$resturauntselect' AND L.RestaurantID = R.RestaurantID");
            
            if (!$result) {
            echo "An error occurred.\n";
            exit;
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
          <?php 
            $resturauntselect = "Host";
            $result = pg_query($conn, "SELECT M.* FROM MenuItem M, Restaurant R WHERE R.name = '$resturauntselect' AND M.restaurantID = R.RestaurantID");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
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
                  <th class='trD'>Price</th>
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
<?php 
            $categoryselect = "American";
            $result = pg_query($conn, "SELECT L.managerName, L.firstOpenDate FROM Location L, Restaurant R WHERE R.type = '$categoryselect' AND L.restaurantID = R.RestaurantID");
              
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>Manager Name/th>
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
          <?php 
            $resturauntselect = "House of Greek";
            $result = pg_query($conn, 
              "SELECT R.URL, L.managerName, L.hourOpen, M.name, MAX(M.Price) 
              FROM Restaurant R, Location L, MenuItem M 
              WHERE R.name = '$resturauntselect' AND L.RestaurantID = R.RestaurantID AND M.RestaurantID = R.RestaurantID
              GROUP BY R.URL, L.ManagerName, L.hourOpen, M.name");
            
            if (!$result) {
            echo "An error occurred.\n";
            exit;
            }
          ?>
            
            <div class="container">
              <br/>
              <table class='tableD'>
                <tr>
                  <th class='trD'>URL</th>
                  <th class='trD'>Manager Name</th>
                  <th class='trD'>Opening time</th>
                  <th class='trD'>Menu Item</th>
                  <th class='trD'>Price</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr class='trD'>
                  <td class='trD'><?php echo $row['url']; ?></td>
                  <td class='trD'><?php echo $row['managername']; ?></td>
                  <td class='trD'><?php echo $row['houropen']; ?></td>
                  <td class='trD'><?php echo $row['name']; ?></td>
                  <td class='trD'><?php echo $row['price']; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>
        </div>
      
      <div id='queryDisplay1e' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery1e()'></i></div>
        e : For each type of restaurant (e.g. Indian or Irish) and the category of menu item (appetiser, main
or desert), list the average prices of menu items for each category.
      </div>
      
      
      <div id='queryDisplay2f' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2f()'></i></div>
        f : Find the total number of rating for each restaurant, for each rater. That is, the data should be
grouped by the restaurant, the specific raters and the numeric ratings they have received.
      </div>
      
      <div id='queryDisplay2g' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2g()'></i></div>
        g : Display the details of the restaurants that have not been rated in January 2015. That is, you should display the name of the restaurant together with the phone number and the type of
food.
      </div> 
      
      <div id='queryDisplay2h' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2h()'></i></div>
        h : Find the names and opening dates of the restaurants that obtained Staff rating that is lower
than any rating given by rater X. Order your results by the dates of the ratings. (Here, X refers to
any rater of your choice.)
      </div>
      
      <div id='queryDisplay2i' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2i()'></i></div>
        i : List the details of the Type Y restaurants that obtained the highest Food rating. Display the
restaurant name together with the name(s) of the rater(s) who gave these ratings. (Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.)
      </div>
      
      <div id='queryDisplay2j' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery2j()'></i></div>
        j : Provide a query to determine whether Type Y restaurants are “more popular” than other restaurants. (Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.) Yes, this query is open to your own interpretation!
      </div>
      
      
      <div id='queryDisplay3k' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3k()'></i></div>
        k : Find the names, join‐date and reputations of the raters that give the highest overall rating, in
terms of the Food and the Mood of restaurants. Display this information together with the
names of the restaurant and the dates the ratings were done.
      </div>
      
      <div id='queryDisplay3l' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3l()'></i></div>
        l : Find the names and reputations of the raters that give the highest overall rating, in terms of the
Food or the Mood of restaurants. Display this information together with the names of the
restaurant and the dates the ratings were done.
      </div> 
      
      <div id='queryDisplay3m' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3m()'></i></div>
        m : Find the names and reputations of the raters that rated a specific restaurant (say Restaurant Z)
the most frequently. Display this information together with their comments and the names and prices of the menu items they discuss. (Here Restaurant Z refers to a restaurant of your own choice, e.g. Ma Cuisine).
      </div>
      
      <div id='queryDisplay3n' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3n()'></i></div>
        n : Find the names and emails of all raters who gave ratings that are lower than that of a rater with a name called John, in terms of the combined rating of Price, Food, Mood and Staff. (Note that there may be more than one rater with this name).
      </div>
      
      <div id='queryDisplay3o' class='queryDisplay'>
        <div class='queryExitIcon'><i class="fas fa-times exitQuery" onclick='hideQuery3o()'></i></div> 
        o : Find the names, types and emails of the raters that provide the most diverse ratings. Display this information together with the restaurants names and the ratings. For example, Jane Doe may have rated the Food at the Imperial Palace restaurant as a 1 on 1 January 2015, as a 5 on 15 January 2015, and a 3 on 4 February 2015. Clearly, she changes her mind quite often.
      </div>
    </div>
  </div>

  
</div>
    
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="frontend/js.js"></script>
    
    
</body></html>