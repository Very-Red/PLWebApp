<?php

// When an HTML form is submitted to the server using the post method,
// its field data is automatically assigned to the implicit $_POST global array variable.
// PHP script can check for the presence of individual submission fields using
// a built-in isset() function to seek an element of a specified HTML field name.
// When this confirms the field is present, its name and value can usually be
// stored in a cookie. This might be used to stored username and password details
// to be used across a website

// Define a function to handle failed validation attempts
// if the blank login form was submitted, it'll get caught by the reject function
// (try comment the reject function to see what happens)
function reject($entry)
{
   echo 'Please <a href="logintest.html">Log in </a>';
   exit();    // exit the current script, no value is returned
}

if (isset($_POST['user']))
{
   $user = trim($_POST['user']);
   if (!ctype_alnum($user))   // ctype_alnum() check if the values contain only alphanumeric data
      reject('User Name');

   if (isset($_POST['pwd']))
   {
      $pwd = trim($_POST['pwd']);
      if (!ctype_alnum($pwd))
         reject('Password');
      else
      {
      	 // setcookie(name, value, expiery-time)
      	 // setcookie() function stores the submitted fields' name/value pair
         setcookie('user', $user, time()+3600);
         setcookie('pwd', md5($pwd), time()+3600);  // create a hash conversion of password values using md5() function

         // relocate the browser to another page using the header() function to specify the target URL
         header('Location: cookie-get.php');
         // header('Location: question1.php');  // redirect to the first question
         // header('Location: question1.php?user=upsorn');  // redirect with user info (and it will be treated as form submission with get method)
      }
   }
}
else
   header('Location: logintest.html');

?>
