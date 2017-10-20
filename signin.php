<?php
//First define some functions..
function signOk ($username, $password){
  $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
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

mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');//Will allow us to use hebrew
$username = mysqli_real_escape_string($con, trim($_POST['username']));//Defence vs sql injection =
$password = mysqli_real_escape_string($con, trim($_POST['password']));

if (signOk($username, $password) == 0) {echo '<script>alert ("Wrong username/password!")</script>';
  echo '<script>location.href = "index.html"</script>';}
  else{
    session_start();
    $_SESSION['loged'] = $username;
    echo 'logged in as: '.$_SESSION['loged'];
  }

  ?>
