<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Thanks</title>
    <style>
    body {
      background-image: url("./images/thanks.png");
    }
   </style>
 </head>
  <?php
   // Address error handing.
   ini_set ('display_errors', 1);
   error_reporting (E_ALL & ~E_NOTICE);

   if (isset ($_POST['submit'])) { // Handle form.
     if ($fp = fopen ('../Info.txt', 'w')) { // Try to open the file.
       $data = array($_POST['firstname'], $_POST['email'], $_POST['address'],$_POST['city'],$_POST['state'],$_POST['zip'],
       $_POST['cardname'], $_POST['cardnumber'],$_POST['expmonth'],$_POST['expyear'],$_POST['cvv'],
     );

     fwrite ($fp, "Bill & Payment info."); // Write the data.
     foreach ($data as $l) {
       fwrite ($fp, "$l <br/> ");
     }
     fclose ($fp); // Close the file.

     $Rfile = file('../Info.txt');
     foreach ($Rfile as $value) {
       print "<center><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>$value</center><br/>\r\n";
     }
   } else { // Could not open the file.
      print "<p>system error.</p>";
    }
  } // End of SUBMIT IF.
  // Leave PHP and display the form.

  header('Refresh: 5; URL = page1.php');
  exit();
  ?>

</html>
