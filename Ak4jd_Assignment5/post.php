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

  <title>Post</title>

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
                  <a class="navbar-brand" href="index.jsp">Website Name </a>
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

  <?php
 // define variables and set to empty values
 $titleErr = $fileErr = $descErr = "";
 $title = $file = $desc = "";
 $allowed =  array('png' ,'jpg');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["title"])) {
     $titleErr = "Title is required";
   } else {
     $title = checker($_POST["title"]);
   }
   $ext = pathinfo($_POST["file"], PATHINFO_EXTENSION);
   if(!in_array($ext,$allowed) ) {
     $fileErr = "Only .png or .jpg files allowed";
   }
   if (empty($_POST["file"])) {
     $fileErr = "Image file is required";
   }
   if (empty($_POST["desc"])) {
     $descErr = "Description is required";
   } else {
     $desc = checker($_POST["title"]);
   }
 }

 function checker($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
 ?>

  <section class="container" >
    <form id="postform" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-group">
        <label for="title">Title</label> <span class="redtext">* <?php echo $titleErr;?></span>
        <input type="text" class="form-control" id="title" name="title">

      </div>
      <div class="form-group">
        <label for="file">Images</label> <span class="redtext">* <?php echo $fileErr;?></span>
        <input type="file" class="form-control-file" id="file" name="file">
      </div>
      <div class="form-group">
        <label for="desc">Description</label> <span class="redtext">* <?php echo $descErr;?></span>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="event">Choose Event</label>
        <select class="form-control" id="event" name ="event">
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
     <option>5</option>
   </select>
      </div>
      <div class="form-group">
        <label for="tags">Tags</label>
        <textarea class="form-control" id="tags" rows="3" name="tags"></textarea>
      </div>
      <div class="form-group">
        <label for="links">Links</label>
        <textarea class="form-control" id="links" rows="3" name="links"></textarea>
      </div>
      <input type="submit" id="record" value="Submit" class="btn btn-primary" onclick="addItem()" />
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
  /*  function addItem() {
      var x = document.getElementById("title").value;
      var y = document.getElementById("desc").value;
      var z = document.getElementById("file").value;
      if (x == '' || y == '' || z == '') {
        if (x == '') {
          document.getElementById("title-note").innerHTML = "Please enter title";
        } else {
          document.getElementById("title-note").innerHTML = "";
        }
        if (y == '') {
          document.getElementById("desc-note").innerHTML = "Please enter description";
        } else {
          document.getElementById("desc-note").innerHTML = "";
        }
        if (z == '') {
          document.getElementById("file-note").innerHTML = "Please upload image";
        } else {
          document.getElementById("file-note").innerHTML = "";
        }
      } else {
        document.getElementById("title-note").innerHTML = "";
        document.getElementById("desc-note").innerHTML = "";
        document.getElementById("file-note").innerHTML = "";
        var para = document.createElement("p");
        var node = document.createTextNode("Submitted!");
        para.appendChild(node);
        var element = document.getElementById("items");
        element.appendChild(para);
        document.getElementById("postform").submit();
      }
    }*/
  </script>
</body>

</html>
