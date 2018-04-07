<html><body>
    
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
      <div class='core-home'>
        <h2>Ottawa Resturaunts</h2>
        
        <div class='core-home-topRated'>
          <p id='core-home-subheader'>Top Rated Resturaunts</p>
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
              echo "<div class='featResturaunt'><a href=''><img src='img/$row[type].jpg'>$row[name]</a></div>";
            }
            ?>

          </div>
          
        </div>
        
        <br><br><br><br>
        
        <div class='core-home-types'>
          <p id='core-home-subheader'>Resturaunts By Cuisine</p>
          <div class='row'>
          <?php
          $result = pg_query($conn, "SELECT DISTINCT R.type FROM Restaurant R");
          
          while ($row = pg_fetch_assoc($result)) {
            echo "<div class='col-md-2' style='background-image: url(img/$row[type].jpg)'>
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

</body></html>