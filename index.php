<?php
  session_start();

  if($_SESSION["user-type"] === "administrator")
  {
    header("location:adminhome.php");
  }
  if($_SESSION["user-type"] === "user")
  {
    header("location:userhome.php");
  }
?>


<html>
  <head>
    <meta charset="UTF-8" />
    <title>Login-Signup Template</title>
  </head>
  <body>
    <nav style="text-align: right; font-size: 30px; margin: 30px">
      <a href="login.php" style="margin-right: 30px">Login</a>
      <a href="signup.php">Signup</a>
    </nav>
  </body>
</html>
