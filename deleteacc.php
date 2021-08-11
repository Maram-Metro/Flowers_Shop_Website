<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Delete Account</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <?php

    if (isset($_POST['submit'])) {
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $emailE = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($emailE, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $emailE = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($emailE, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
        if (empty($_POST["password"])) {
        $pass = "password is required";
      }


    	  if($_POST["confirmpassword"]== $_POST["password"]){

          // Connect and Select
          if ($dbc = @mysqli_connect('localhost', 'root', 'mM123')) {
            //select database
            if(!@mysqli_select_db($dbc,'Flowersshop')){
              die('<p>Could not select the database: <b>'.mysqli_error($dbc).'</b></p>');
            }
          } else {
            die('<p>Could not connected to MySQL because: <b>'.mysqli_error($dbc).'</b></p>');
          }

          //------ Delete user account ------

          $query = "DELETE FROM users WHERE EMAIL = '".$_POST["email"]."' AND PASSWORD = '".$_POST["password"]."'";
          $r = mysqli_query ($dbc, $query); // Execute the query.
          // Report on the result.
          if (mysqli_affected_rows($dbc) > 0) {
            print '<p>The user account has been deleted'.$query.'</p>';

            session_start();
            $_SESSION['submit']= $_POST['submit'];
            $_SESSION['loggedin'] = time();

             header('Refresh: 0; URL = deletedacc.php');
             exit();
          }
          else {
            print "<p>Could not delete the user account because: <b>" . mysqli_error($dbc) . "</b>. The
            query was $query.</p>";
          }
    	  } else{
    		  $pass1=" is not match";
    	  }

    }


    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    ?>
    <div class="card-form">
      <center>
        <div>
          <img src="./images/logo.png">
          <div class="topnav" >
            <a href="page1.php">Home</a>
            <a href="valid.php">SignUp</a>
          </div>
     </center>
          <form method="post" action="#"><!--action="page1.php"-->
            <h1>Delete Account</h1>
            <div class="input-box">
              <input type="email" name="email" placeholder="Email" required>
					    </br>
              <span class="error"> <?php echo $emailErr;?></span>
            </div>
            <div class="input-box">
              <input type="password" name="password" placeholder="Password" required>
              </br>
              <span class="error"> <?php echo $pass;?></span>
            </div>
            <div class="input-box">
              <input type="password" name="confirmpassword" placeholder="Confirm password" required>
					    </br>
              <span class="error"> <?php echo $pass1;?></span>
            </div>
            <div class="input-box">
              <input type="submit" name="submit" value="Delete">
            </div>
        </form>
      </div>
   </body>
</html>
