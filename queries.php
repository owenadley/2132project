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
    <div class='col-md-offset-1 col-md-9'>
      <div class='core-panels'>
          <h3>Resturaunts and Menus</h3>
        <div class='row'>
          <div class='col-md-2'>
            <div class='panel' onclick='showQuery1a();'>
              <p>Query aa</p>
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
        a : Display all the information about a user‐specified restaurant. That is, the user should select the
name of the restaurant from a list, and the information as contained in the restaurant and
location tables should then displayed on the screen.
      </div>
      <div id='queryDisplay1b' class='queryDisplay'>
        b : Display all the information about a user‐specified restaurant. That is, the user should select the
name of the restaurant from a list, and the information as contained in the restaurant and
location tables should then displayed on the screen.
      </div> 
      <div id='queryDisplay1c' class='queryDisplay'>
        c : For each user‐specified category of restaurant, list the manager names together with the date
that the locations have opened. The user should be able to select the category (e.g. Italian or
Thai) from a list.
      </div>
      <div id='queryDisplay1d' class='queryDisplay'>
        d : Given a user‐specified restaurant, find the name of the most expensive menu item. List this
information together with the name of manager, the opening hours, and the URL of the
restaurant. The user should be able to select the restaurant name (e.g. El Camino) from a list.
      </div>
      <div id='queryDisplay1e' class='queryDisplay'>
        e : For each type of restaurant (e.g. Indian or Irish) and the category of menu item (appetiser, main
or desert), list the average prices of menu items for each category.
      </div>
      
      <div id='queryDisplay2f' class='queryDisplay'>
        test
      </div>
      <div id='queryDisplay2g' class='queryDisplay'>
        test
      </div> 
      <div id='queryDisplay2h' class='queryDisplay'>
        test
      </div>
      <div id='queryDisplay2i' class='queryDisplay'>
        test
      </div>
      <div id='queryDisplay2j' class='queryDisplay'>
        test
      </div>
      
      
      <div id='queryDisplay3k' class='queryDisplay'>
        test
      </div>
      <div id='queryDisplay3l' class='queryDisplay'>
        test
      </div> 
      <div id='queryDisplay3m' class='queryDisplay'>
        test
      </div>
      <div id='queryDisplay3n' class='queryDisplay'>
        test
      </div>
      <div id='queryDisplay3o' class='queryDisplay'>
        test
      </div>
    </div>
  </div>

  
</div>
    
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="frontend/js.js"></script>
    
    
</body></html>