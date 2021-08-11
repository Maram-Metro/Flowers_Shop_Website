<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cart</title>
    <link rel="stylesheet" href="styleCart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php
    if(isset($_POST['submit'])){
      // first name
      if (empty($_POST["firstname"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      // email
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $emailE = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($emailE, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      // address
      if (empty($_POST["address"])) {
        $addressErr = "address is required";
      }
      //city
      if (empty($_POST["city"])) {
        $cityErr = " is required";
      } else {
        $city1 = test_input($_POST["city"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$city1)) {
          $cityErr = "Only letters and white space allowed";
        }
      }
      // state
      if (empty($_POST["state"])) {
        $stateErr = " is required";
      } else {
        $state1 = test_input($_POST["state"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$state1)) {
          $stateErr = "Only letters and white space allowed";
        }
      }
      //zip
      if (empty($_POST["zip"])) {
        $zipErr = " is required";
      } else {
        $zip1 = test_input($_POST["zip"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/",$zip1)) {
          $zipErr = "must be number";
        }
      }
      // card name
      if (empty($_POST["cardname"])) {
        $cardErr = " is required";
      } else {
        $card1 = test_input($_POST["cardname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$card1)) {
          $stateErr = "Only letters and white space allowed";
        }
      }
      //card number
      if (empty($_POST["cardnumber"])) {
        $cardError = " is required";
      } else {
        $cardd = test_input($_POST["cardnumber"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/",$cardd)) {
          $cardError = "must be number";
        }
      }
      // exp month
      if (empty($_POST["expmonth"])) {
        $expmonthErr = " is required";
      } else {
        $exp = test_input($_POST["expmonth"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$exp)) {
          $expmonthErr = "Only letters and white space allowed";
        }
      }
      //exp year
      if (empty($_POST["expyear"])) {
        $expyearErr = " is required";
      } else {
        $expy = test_input($_POST["expyear"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/",$expy)) {
          $expyearErr = "must be number";
        }
      }
      if (empty($_POST["cvv"])) {
        $cvvErr = " is required";
      } else {
        $cvv1 = test_input($_POST["expyear"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]*$/",$cvv1)) {
          $cvvErr = "must be number";
        }
      }

      if (empty($nameErr)&& empty ($emailErr )&& empty ($addressErr)&& empty ( $cityErr)
      && empty ( $stateErr)&& empty ( $zipErr) && empty ( $cardErr)&& empty ( $$cardError)
      && empty ( $expmonthErr)&& empty ( $expyearErr)&& empty ( $cvvErr)){
        include('thanks.php');
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    ?>

      </br>
      <center>
        <div class="back">
          <div>
            <img src="./images/logo.png">
            <div class="topnav">
              <a href="page1.php">Home</a>
              <a href="login.php">LogIn</a>
              <a href="valid.php">SinUp</a>
            </div>
          </br></br>

          <h1> Cart </h1>
          <form class="modal-content" method="post">
            <div class="container1">
              <div class="col-50">

                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>&nbsp;
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required><br>
                <span class="error"> <?php echo $nameErr;?></span>

                <label for="email"><i class="fa fa-envelope"></i> Email</label> &nbsp;
                <input type="text" id="email" name="email" placeholder="john@example.com" required><br>
                <span class="error"> <?php echo $emailErr;?></span>

                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>&nbsp;
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required><br>
                <span class="error"> <?php echo $pass;?></span>

                <label for="city"><i class="fa fa-institution"></i> City</label>&nbsp;
                <input type="text" id="city" name="city" placeholder="New York" required><br>
                <span class="error"> <?php echo $nameErr;?></span>

                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY" required><br>
                <span class="error"> <?php echo $nameErr;?></span>

                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001" required><br>
                <span class="error"> <?php echo $pass;?></span>

              </div>
            </div>
            <div class="container1">
              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>

                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
                <span class="error"> <?php echo $nameErr;?></span>

                <label for="ccnum">Credit card number</label>
                <input type="text" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                <span class="error"> <?php echo $pass;?></span>

                <label for="expmonth">Exp Month</label>
                <input type="text" name="expmonth" placeholder="September" required>
                <span class="error"> <?php echo $pass;?></span>

                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" name="expyear" placeholder="2018" required>
                    <span class="error"> <?php echo $pass;?></span>
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" name="cvv" placeholder="352" required>
                    <span class="error"> <?php echo $pass;?></span>
                  </div>
                </div>
              </div>

              <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
              </label>
              <input type="submit" name="submit" value="Continue to checkout" class="btn">
            </div>
          </form>
        </div>
      </div>
    </center>
  </body>
</html>
