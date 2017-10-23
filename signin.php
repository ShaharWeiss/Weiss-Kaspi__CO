<?php
//First define some functions..
function signOk ($con, $username, $password){
  //this function searches the DB for matching username and password, if it finds it, it return the number of matching pairs (should be only 1)
  //meanning that returning 0 = no match between username and password
  $query = "SELECT * FROM `users` WHERE username = '$username' AND password = SHA('$password')";
  $result = mysqli_query($con, $query) or die ('Cannot use SELECT query');
  return mysqli_num_rows($result);
}

//Code start here
require_once('connectvars.php');
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$username = mysqli_real_escape_string($con, trim($_POST['username']));//Defence vs sql injection =
$password = mysqli_real_escape_string($con, trim($_POST['password']));

if (signOk($con, $username, $password) == 0) {echo '<script>alert ("Wrong username/password!")</script>';
  echo '<script>location.href = "index.html"</script>';}
  else{
    session_start();
    $_SESSION['loged'] = $username;
    $_SESSION['new'] = 0;//meanning user is not new.
    echo '<script>location.href = "main.php"</script>';

  }

  ?>
