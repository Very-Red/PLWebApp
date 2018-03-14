<?php

// Once the cookies are set, they are automatically assigned to
// an implicit $_COOKIE global array variable.
// PHP script can check for the presence of an individual cookie using
// the built-in isset() function to seek a cookie of a special name.
// When this confirms the cookie is present, its value can usually
// be assigned to a regular script variable.
// This might be used to retrieve a stored username for output on a page.
// If a sought cookie is absent, the script can offer an alternative to the user.

if (isset($_COOKIE['user']))
{
   $user = trim($_COOKIE['user']);
   echo "<h1>Welcome $user ! </h1> <hr />";
   echo '<a href="cookie-data.php">View Cookie</a>';
}
else
   echo 'Please <a href="login.html">Log in</a>';

?>
