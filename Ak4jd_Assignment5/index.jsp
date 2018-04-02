<!-- 1. create HTML5 doctype -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- required to handle IE -->

  <!-- 2. include meta tag to ensure proper rendering and touch zooming
         (bootstrap is designed to be responsive to mobile.
         Mobile-first styles are part of the core framework.)
    -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- the width=device-width part sets the width of the page to follow
         the screen-width of the device (which will vary depending on the device)
         the initial-scale=1 part sets the initialize zoom level when the page
         is first loaded by the browser.
    -->

  <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- to use bootstrap:
         option1: download the files (from http://getbootstrap.com) and put them in
                  your working directory
         option2: make a link to the files from a CDN (Content Delivery Network)
    -->

  <!-- 3. link bootstrap pages (let's use CDN here)
         Two basic bootstrap pages are
             https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css (style, link here)
             https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js (js, link at the bottom)
    -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> if you downloaded bootstrap to your computer -->


  <!-- 13. link to customized styles (mystyle.css) -->
  <link rel="stylesheet" href="styles/mystyle.css" />

  <!-- required scripts for IE -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  <!-- you may add styles here (document-level) or as an external file (external level) -->
  <style>
    body {
      padding-top: 75px;
    } // this is to leave space between navbar and heading
    // when navbar-fixed-top is used
  </style>

  <title>Home</title>

</head>

<body>
<% String user; %>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
			</button>
          <a class="navbar-brand" href="index.html">Website Name </a>
          <% if(session.getAttribute("user") == null){
        	  user = "";
        	  }
        	  %>
          <a class="navbar-brand" href="index.html">User: ${user} </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="faq.html">FAQ</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li>
              <form class="navbar-form" action="/action_page.php">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
              </form>
            </li>
            <li><a href="post.php" <button type="submit" class="btn btn-default">Make Post</button></a></li>
            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login.jsp"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <div class="row rowz">
      <nav class="col-md-2 sidenav">

        <h4>Filters</h4>
        <ul class="nav nav-pills nav-stacked">
          <li class="nav-item">
            <a class="nav-link active" href="#">Hot</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">New</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Top</a>
          </li>
        </ul><br>

        <h4>Categories</h4>
        <ul class="nav nav-pills nav-stacked">
          <li class="checkbox">
            <label><input type="checkbox" value="">Professional</label>
          </li>
          <li class="checkbox">
            <label><input type="checkbox" value="">Casual</label>
          </li>
          <li class="checkbox">
            <label><input type="checkbox" value="">Romantic</label>
          </li>
        </ul><br>
      </nav>




      <div class="col-md-10">
        <div id="todo">
          <table id="todoTable" class="table">
            <thead>

            </thead>

            <!-- JS will dynamically create add new row upon form submission -->

          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  <footer class="footer">
    <div class="container">
      <p class="text-muted">Place footer content here.</p>
    </div>
  </footer>


  <!-- 8. To use bootstrap.min.js, need jquery
         https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js
         note: js bootstrap allows menu interaction such as dropdown
         (if only use css bootstrap, only link to the css)
    -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <script src="js/bootstrap.min.js"></script> if you downloaded bootstrap to your computer -->

</body>

</html>
