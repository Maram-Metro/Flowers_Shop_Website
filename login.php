<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log in Form</title>
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
      if (empty($_POST["password"])) {
        $pass = "email is required";
      }

      // Connect and Select
      if ($dbc = @mysqli_connect('localhost', 'root', 'mM123')) {
        //select database
        if(!@mysqli_select_db($dbc,'Flowersshop')){
          die('<p>Could not select the database: <b>'.mysqli_error($dbc).'</b></p>');
        }
      } else {
        die('<p>Could not connected to MySQL because: <b>'.mysqli_error($dbc).'</b></p>');
      }

      //------ Check user account ------
      $useremail = $_POST["email"];
      $password = $_POST["password"];

      //cookie
      $sql = "SELECT FIRST_NAME, LAST_NAME FROM users WHERE EMAIL = '$useremail'";
      $r = mysqli_query($dbc, $sql);
      $row = mysqli_fetch_array($r);
      setcookie ("username", $row['FIRST_NAME'].' '.$row['LAST_NAME'], time()+ 3600);


      $query = "SELECT * FROM users WHERE EMAIL = '$useremail' AND PASSWORD = '$password'";
      $result = mysqli_query($dbc, $query);
      if (mysqli_num_rows($result) == 1) {
        header('Refresh: 0; URL = page1.php?'.$useremail);
      } else {
        //echo "Wrong user email or password";
        echo"<script>alert('Wrong user email or password');</script>";
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
          <form method="POST">
            <h1>Log In</h1>
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
              <input type="submit" name="submit" value="Log in">
            </div>
            <a href="setpass.php">forget your password ?</a><br><br>
            <a href="deleteacc.php">delete my acount</a><br><br>
        </form>
      </div>
   </body>
</html>
