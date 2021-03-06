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


  <title>Login</title>

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
  // define variables and set to empty values
  $emailErr = $passwordErr = "";
  $email = $password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["inputEmail"])||empty($_POST["inputPassword"])||!filter_var($_POST["inputEmail"], FILTER_VALIDATE_EMAIL)){
      if(!filter_var($_POST["inputEmail"], FILTER_VALIDATE_EMAIL)||empty($_POST["inputEmail"])){
        if (!filter_var($_POST["inputEmail"], FILTER_VALIDATE_EMAIL)) {
          //check that email has @ and .com
          $emailErr = "Invalid email format";
        }
        //checks input entered for email
        if (empty($_POST["inputEmail"])) {
          $emailErr = "Email is required";
        }

      }
      //checks input entered for password
      if (empty($_POST["inputPassword"])) {
        $passwordErr = "Password is required";
      }
    }
    else {
      //set php values to user input and create a cookie for email
      $email = checker($_POST["inputEmail"]);
      $password = checker($_POST["inputPassword"]);
      setcookie('user',"$email",time()+3600);
      //redirect to profile page
      header('Location: profile.php');

    }
  }

  function checker($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <section class="container">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
      <div class="form-group">
        <label for="inputEmail">Email address</label>
        <input type="username" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter email">
        <span class="redtext" id="email-note"><?php echo $emailErr;?></span>
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
        <span class="redtext" id="password-note"><?php echo $passwordErr;?></span>
      </div>
      <!--<div class="form-check">
        <input type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>-->

      <button type="submit" class="btn btn-primary" >Login</button>

    </form>
  </section>
  <!--<a href="profile.html" </a>-->

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

  <!--<script>
    function validatePassword() {
      if (document.getElementById("inputPassword").value == '' || document.getElementById("inputEmail").value == '') {
        if (document.getElementById("inputPassword").value == '') {
          // if user needs to fix this element, put cursor to it (reduce excise task)
          // and tell user how to fix it
          document.getElementById("inputPassword").focus();
          document.getElementById("password-note").innerHTML = "Please enter password";
        }
        if (document.getElementById("inputEmail").value == '') {
          // if user needs to fix this element, put cursor to it (reduce excise task)
          // and tell user how to fix it
          document.getElementById("inputEmail").focus();
          document.getElementById("email-note").innerHTML = "Please enter email";
        }
      } else {
        window.location = "profile.html";
      }
    }
  </script>-->
</body>

</html>
