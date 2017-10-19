<?php
//First define some functions..
function isExist ($username){//Return TRUE if name already exist in users table
  //mysqli_query($con,"SELECT * FROM Persons");
  //$query = "SELECT * FROM 'users' WHERE username = $username";
  $result = mysqli_query($con,"SELECT * FROM users WHERE username = $username") or die ('Cannot use SELECT query');
  //$result = mysqli_query($con, $query) or die ('Cannot use SELECT query');
  return (mysqli_num_rows($result) != 0);
}

function passChk($password, $conf_pass){//Return TRUE if pass and confirmed pass match
  return ($password == $conf_pass);
}

function newUser ($username, $password){//Add a new user .. duh ;p
  if (!isExist($username)) {
    if (passChk($pass, $conf_pass)){
      $query  = "INSERT INTO 'users' (username, password, id) VALUES ('$username', '$password')";
      mysqli_query($con, $query) or die ("Cannot INSERT into Database");
      echo 'Username Created successfully';
    } else {echo '<script>alert ("Password and confirmed password do not match")</script>';
      header("Location: http://www.sweiss.co.il/sfn/index.html");
    }
  } else { echo '<script>alert ("Username already exist!")</script>';
    header("Location: http://www.sweiss.co.il/sfn/index.html");
  }
  mysqli_close($con);
}
//Code start
require_once('connectvars.php');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('Cannot create connection to Database');
mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');//Will allow us to use hebrew
$username = mysqli_real_escape_string($con, trim($_POST['username']));//Defence vs sql injection =
$password = mysqli_real_escape_string($con, trim($_POST['password']));
$conf_pass = mysqli_real_escape_string($con, trim($_POST['conf_pass']));
echo $username. ' '. $password.' '.$conf_pass;
//$query  = "INSERT INTO users (username, password, id) VALUES ('$username', '$password')";
//mysqli_query($con, $query) or die ("Cannot INSERT into Database");

  $result = mysqli_query($con,"SELECT * FROM `users` WHERE username = $username") or die ('Cannot use SELECT query');

//$result = mysqli_query($con, $query) or die ('Cannot use SELECT query');
//newUser ($username, $password);

?>
