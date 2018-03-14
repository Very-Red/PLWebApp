<?php

// The implicit $_COOKIE global array variable stores cookie names/values
// in an associative array of keys and values.
// To view the cookie data, loop through the array, or
// using var_dump() function

if (count($_COOKIE) > 0)
{
   echo '<dl>';
   foreach ($_COOKIE as $key => $value)
   {
      echo "<dt>Key: $key";
      echo "<dd>Value: $value";
   }
   echo '</dl><hr />';
   var_dump($_COOKIE);
}
else
   echo 'Please <a href="login.html" >Log in</a>';

?>
