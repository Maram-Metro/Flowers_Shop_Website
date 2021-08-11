<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Deleted Account</title>

  </head>
  <body>
    <?php

    ini_set ('display_errors', 1);
    error_reporting (E_ALL & ~ E_NOTICE);

    session_start();
    if (time() > $_SESSION['loggedin'] + 5){
      session_destroy();
      unset($_SESSION);

      header('Refresh: 0; URL = page1.php');
      exit();
    }
     ?>
   <center>
    <form action="valid.php" method="post">
      <h2>Your Account has Deleted, if you want to SignUp a gain click the button</h2>
      <input type="submit" value="SignUp">
    </form>
  </center>
    <img src="./images/delet.jpeg" alt="imge"  width="1519" height="700">
  </body>
</html>
