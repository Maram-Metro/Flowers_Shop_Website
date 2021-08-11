<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    if (isset($_POST['submit'])) {
      if (empty($_POST["fullname"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["fullname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      if (empty($_POST["username"])) {
        $usernameErr = "Name is required";
      } else {
        $nameuser = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nameuser)) {
          $usernameErr = "Only letters and white space allowed";
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

        //cookie
        setcookie ("username", $_POST["fullname"].' '.$_POST["username"], time()+ 3600);

        //--------------INSERT INTO THE TABLE QUERY---------------------------------

        $query = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD)
        VALUES ('".$_POST["fullname"]."', '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."')";

        // Execute the query.
        if (@mysqli_query ($dbc, $query)) {
          print '<p>The users info has been added.</p>';
        }
        else {
          print "<p>Could not add the entry because: <b>" . mysqli_error($dbc) . "</b>. The query was $query.</p>";
        }
        if (empty($nameErr)&& empty ( $usernameErr)&&empty ($emailErr )&& empty ($pass)&& empty ( $pass1)){
          header('Refresh: 0; URL = page1.php');
          exit();
        }
      } else {
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
            <a href="login.php">LogIn</a>
          </div>
        </center>
        <form method="post">
          <h1>Sign Up</h1>
          <div class="input-box">
            <input type="text" name="fullname" placeholder="First Name" required></br>
            <span class="error"> <?php echo $nameErr;?></span>
          </div>

          <div class="input-box">
            <input type="text" name="username" placeholder="Last Name" required></br>
            <span class="error"> <?php echo $usernameErr;?></span>
          </div>

          <div class="input-box">
            <input type="email" name="email" placeholder="Email" required></br>
            <span class="error"> <?php echo $emailErr;?></span>
          </div>

          <div class="input-box">
            <input type="password" name="password" placeholder="Password" required></br>
					  <span class="error"> <?php echo $pass;?></span>
          </div>

          <div class="input-box">
            <input type="password" name="confirmpassword" placeholder="Confirm password" required></br>
					  <span class="error"> <?php echo $pass1;?></span>
          </div>

          <div class="input-box">
            <input type="submit" name="submit" value="Sign Up">
          </div>
        </form>
      </div>
    </body>
</html>
