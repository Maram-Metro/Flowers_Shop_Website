<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Creat Flowers Database</title>
  </head>
  <body>
    <?php
    // Address error handling.
    ini_set ('display_errors', 1);
    error_reporting (E_ALL & ~E_NOTICE);

    //--------------CREAT DATABASE---------------------------------

    // Attempt to connect to MySQL and print out messages.
    if ($dbc = @mysqli_connect ('localhost', 'root', 'mM123')) {
      print '<p>Successfully connected to MySQL.</p>';
      if(@mysqli_query($dbc,'CREATE DATABASE Flowersshop')){
        print '<p>The database Flowersshop has created .</p>';
      }
      else{
        die('<p>Could not create the database: <b>'.mysqli_error($dbc).'</b></p>');
      }
      if(!@mysqli_select_db($dbc,'Flowersshop')){
        die('<p>Could not select the database: <b>'.mysqli_error($dbc).'</b></p>');
      }
      //mysqli_close($dbc); // Close the connection.
    } else {
      die('<p>Could not connected to MySQL because: <b>'.mysqli_error($dbc).'</b></p>');
    }

    //----------------------CREAT TABLE QUERY-------------------------

    $query='CREATE TABLE users(USER_ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      FIRST_NAME VARCHAR(10) NOT NULL,
      LAST_NAME VARCHAR(10) NOT NULL,
      EMAIL VARCHAR(30) NOT NULL,
      PASSWORD VARCHAR(30) NOT NULL)';

      //----------------------RUN CREAT TABLE QUERY-------------------------

      if (@mysqli_query($dbc,$query)){
        print '<p>the users table has create : <b>'	;
      }
      else {
        die ('<p>Could not create the users table because: <b>' . mysqli_error($dbc) . '</b>.</p>
        <p>The query being run was: ' . $query . '</p>');
      }

      mysqli_close($dbc); //close the connection
    ?>
  </body>
</html>
