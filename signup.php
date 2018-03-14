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

  <title>Signup</title>

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
 $emailErr = $userErr = $passErr = $pass2Err = "";
 $email = $user = $pass = $pass2 = "";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(empty($_POST["email"])||empty($_POST["user"])||empty($_POST["pass"])||($_POST["pass2"])!=($_POST["pass"])){
   if (empty($_POST["email"])) {
     $emailErr = "email is required";
   } else {
     $email = checker($_POST["email"]);
   }
   if (empty($_POST["user"])) {
     $userErr = "username is required";
   } else {
     $user = checker($_POST["user"]);
   }
   if (empty($_POST["pass"])) {
     $passErr = "password is required";
   } else if(pass_length($_POST["pass"])){
     $passErr = "password must be atleast 8 characters";
   } else {
     $pass = checker($_POST["pass"]);
   }
   //check if password and re-entered password match
   if (($_POST["pass2"])!=($_POST["pass"])) {
     $pass2Err = "Does not match password";
   }
  }
  else{
    echo "Signup complete!";
  }
 }
//make inputs valid and prevent html coding
 function checker($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
// make sure password is atleast 8 characters
 function pass_length($data){
   if(strlen($data) < 8){
     return true;
   }
   return false;
 }
 ?>

  <section class="container">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-group">
        <label for="inputEmail">Email address</label> <span class="redtext">* <?php echo $emailErr;?></span>
        <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email;?>">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="inputUsername">Username</label> <span class="redtext">* <?php echo $userErr;?></span>
        <input type="username" class="form-control" id="inputUsername" name="user" placeholder="Enter username" value="<?php echo $user;?>">
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label> <span class="redtext">* <?php echo $passErr;?></span>
        <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Password" value="<?php echo $pass;?>">

      </div>
      <div class="form-group">
        <label for="reInputPassword">Confirm Password</label> <span class="redtext">* <?php echo $pass2Err;?></span>
        <input type="password" class="form-control" id="reInputPassword" name="pass2" placeholder="Password">

      </div>
      <!--<div class="form-check">
        <input type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>-->
      <button type="submit" class="btn btn-primary" onclick="ValidateSignup()">Sign Up</button>
    </form>
  </section>
  <div id="items"></div>
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
  <script>
    /*function ValidateSignup() {
      var a = document.getElementById("inputUsername").value;
      var b = document.getElementById("inputEmail").value;
      var c = document.getElementById("inputPassword").value;
      var d = document.getElementById("reInputPassword").value;
      if (a == '' || b == '' || c == '' || d != c) {
        if (a == '') {
          document.getElementById("user-mess").innerHTML = "Please input Username";
        } else {
          document.getElementById("user-mess").innerHTML = "";
        }
        if (b == '') {
          document.getElementById("email-mess").innerHTML = "Please input Email";
        } else {
          document.getElementById("email-mess").innerHTML = "";
        }
        if (c == '') {
          document.getElementById("pass-mess").innerHTML = "Please input Password";
        } else {
          document.getElementById("pass-mess").innerHTML = "";
        }
        if (d != c) {
          document.getElementById("pass2-mess").innerHTML = "Does not much password";
        } else {
          document.getElementById("pass2-mess").innerHTML = "";

        }
      } else {

        document.getElementById("user-mess").innerHTML = "";
        document.getElementById("email-mess").innerHTML = "";
        document.getElementById("pass-mess").innerHTML = "";
        document.getElementById("pass2-mess").innerHTML = "";
        var para = document.createElement("p");
        var node = document.createTextNode("Account Created!");
        para.appendChild(node);
        var element = document.getElementById("items");
        element.appendChild(para);
      }

    }*/
  </script>
</body>

</html>
