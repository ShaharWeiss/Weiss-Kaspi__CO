  <?php
  //First define some functions..
  function isExist ($username){//Return TRUE if name already exist in users table
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query) or die ('Cannot use SELECT query');
    return mysqli_num_rows($result); //0 means the username is ok, any numb > 0 is bad

  }

  function passChk($password, $conf_pass){//Return TRUE if pass and confirmed pass match
    return ($password === $conf_pass);
  }

  function newUser ($username, $password){//Add a new user .. duh ;p
    global $conf_pass;//This will let us use the var which is outside the function scope
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if (isExist($username) > 0) {  echo '<script>alert ("Username already exist")</script>';
      echo '<script>location.href = "index.html"</script>';}
      if (isExist($username) == 0){
        if (passChk($password, $conf_pass)){
          $query  = "INSERT INTO users (username, password) VALUES ('$username', SHA('$password'))";
          session_start();
          $_SESSION['loged'] = $username;
          $_SESSION['new'] = 1;//meanning user is new
          mysqli_query($con, $query) or die ("Cannot INSERT into Database");
          echo '<script>alert ("Username Created successfully")</script>';
          echo '<script>location.href = "welcome.php"</script>';
        }
        else{
          echo '<script>alert ("Password and confirmed password do not match")</script>';
          echo '<script>location.href = "index.html"</script>';}

        }
        mysqli_close($con);
      }
      //Code start
      require_once('connectvars.php');
      $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);//NOT SURE I NEED THIS
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');//Will allow us to use hebrew
      $username = mysqli_real_escape_string($con, trim($_POST['username']));//Defence vs sql injection =
      $password = mysqli_real_escape_string($con, trim($_POST['password']));
      $conf_pass = mysqli_real_escape_string($con, trim($_POST['conf_pass']));
      newUser ($username, $password);
      ?>
