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
    }
  </style>

  <title>Profile</title>

</head>

<body>
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
          <a class="navbar-brand" href="index.html">Your logo / company name</a>
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
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>

        </div>
      </div>
    </nav>
  </header>


  <?php
  //retrieve user cookie
  $user = "name";
  if (isset($_COOKIE['user']))
  {
     $user = trim($_COOKIE['user']);
  }
  ?>


  <section class="highlight">
    <!-- 14. add section surrounding the grid, center it -->
    <div class="col-md-12">
      <div class="container">
        <div class="row">
          <div class="w3-container w3-red">
            <div class="col-md-3 box" style="border-style: solid;">
              <div class="pfp">
                <img src="https://vignette.wikia.nocookie.net/animal-jam-clans-1/images/b/b3/Kawaii_bunny.jpg/revision/latest?cb=20160424023659" alt="image1">
              </div>
              <h3 id = "namebox" style="text-align: center; font-size: 15px; "></h3>
            </div>

            <div class="col-md-3 box " style="border-style: solid; ">

              <h3>Posts</h3>
              <p style="text-align: center; "> Number of followers
              </p>
            </div>

            <div class="col-md-3 box " style="border-style: solid; ">

              <h3>Upvotes Recieved</h3>
              <p style="text-align: center; "> Number of Upvotes
              </p>
            </div>

            <div class="col-md-3 box " style="border-style: solid; ">

              <h3>Comment Upvotes</h3>
              <p style="text-align: center; "> Number of comment upvotes
              </p>
            </div>
          </div>
        </div>
        <div class="row marg ">

          <div class="col-md-3 bordermin">
            <div class="square">
              <img src="https://cdn.shopify.com/s/files/1/0888/8294/products/1_40204a2d-ce7e-4dcb-af58-955cd8d2493c.png?v=1508919287 " alt="image1 ">
            </div>
            <h3 class="centeredtext">Should I buy this?</h3>
          </div>

          <div class="col-md-3 bordermin">
            <div class="square">
              <img src="http://images6.fanpop.com/image/photos/35200000/kfashion-kfashion-35246066-424-500.png" alt="image1 ">
            </div>
            <h3 class="centeredtext">What I wore today</h3>
          </div>

          <div class="col-md-3 bordermin">
            <div class="square">
              <img src="http://24.media.tumblr.com/c47980431a44a0f9d089c4c130c84e19/tumblr_n123aw7B7d1s99i81o1_500.png " alt="image1 ">
            </div>
            <h3 class="centeredtext">Date outfit?</h3>
          </div>

          <div class="col-md-3 bordermin">
            <div class="square">
              <img src="https://i.pinimg.com/736x/bb/e8/a7/bbe8a7a33fbfb1c10afd1f7d7073578b--summer-looks-korean-fashion.jpg" alt="image1 ">
            </div>
            <h3 class="centeredtext">Beach day outfit?</h3>
          </div>


        </div>
      </div>
    </div>



    </div>
    </div>

  </section>
  <footer class="footer ">
    <div class="container ">
      <p class="text-muted ">Place footer content here.</p>
    </div>
  </footer>

  <script>
  //set username value to email of user
  document.getElementById("namebox").innerHTML = "<?php echo $user;?>";
  </script>
  <!-- 8. To use bootstrap.min.js, need jquery
  https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js
  note: js bootstrap allows menu interaction such as dropdown
  (if only use css bootstrap, only link to the css)
-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
  <!-- <script src="js/bootstrap.min.js "></script> if you downloaded bootstrap to your computer -->

</body>

</html>
