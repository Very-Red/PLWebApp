
<html>
<head>
 <title>CS 4640: Sending mail exercise</title>
</head>
<body>
<center><h1>CS 4640: Mail Service</h1></center>
<form action="http://labunix03.cs.virginia.edu:8080/cs4640/mailService" method="post">
<center>
  <table>
    <tr>
      <td>
        Your email address 
      </td>
      <td>
        <input type="text" name="your_email" size=30>
      </td>
    </tr>
    <tr>
      <td>
        Subject 
      </td>
      <td>
        <input type="text" name="email_subject" size=30>
      </td>
    </tr>
    <tr>
      <td>
        Message 
      </td>
      <td>
        <textarea name="email_msg" row=4 cols=50></textarea>
      </td>
    </tr>
    <tr>
      <td align="center" colspan=2>
        <input type="submit" value="Send Email">
      </td>
    </tr>
  </table>
</center>
</form>
</body>
</html>
