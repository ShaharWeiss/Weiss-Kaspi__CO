<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>StickyFreakyNote V 1.0</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="assest/styles/style.css">

  <!--this Give us the Font-->
  <link href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css" />





  <link rel="icon" type="image/ico" href="assest/img/fav.ico">
</head>
<body>
  <!--<div class="container">
    <h1>Crate a New MeMo</h1>


    <form id="myMemo" action="/action_page.php">
        Memo Title:
        <input type="text" name="TitleName" maxlength="15" />
        <br />
        MeMo Text:
        <input type="text" name="MemoText" maxlength="50" />
        <br />
        Memo Link:
        <input type="text" name="MemoLink" maxlength="20" />
        <br />
        Picture Link:
        <input type="text" name="PictureMemoLink" maxlength="20" />
        <br />
        <br />
        <input type="button" onclick = "myFunction()" value= "Submit Memo" />
    </form >

        <script>
            function myFunction() {
                document.getElementById("myMemo").submit();
            }
    </script>
</div>-->

<?php
function getAllBulletins($con, $username){
  $return = array();
  $query = "SELECT bulletinId FROM connector WHERE username = '$username'";
  $result = mysqli_query($con, $query) or die ("Cannot retrieve info");
  while ($row = mysqli_fetch_array($result)){

    array_push($return,$row['bulletinId']);
  }
  return $return;
}
//display all the memos

require_once('connectvars.php');
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start();
$username = $_SESSION['loged'];
$userBulletinNumbers = getAllBulletins($con, $username);//this will hold user bulletins id's
$length = count($userBulletinNumbers);
for ($i=0; $i < $length; $i++){
  mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');//Will allow us to use hebrew
  $query = "SELECT * FROM memos WHERE bulletin_id = '$userBulletinNumbers[$i]'";
  $result = mysqli_query($con, $query) or die ("Cannot get memos");
  echo '<h2>Bulletin number : '.$userBulletinNumbers[$i].'</h2>';
  while ($row = mysqli_fetch_array($result)){
    echo '<div style="float:left">';
    echo '<ul>';
    echo '<li>';
    echo '<a id="IdMemoLink" href="#">';
    echo '<h2 id="IdTitleName">Created by : '.$row['created_by'].' Date : '.$row['date_created'].'</h2>';
    echo '<p id="IdMemoText">'. $row['data']. '</p>';
    echo '</li>';
    echo '</a>';
    echo '</ul>';
    echo '</div>';
    }
}






// for i=0 to maxbulletins
  //retreive users bulletinId
  //display all memos connected to that bulletinId




/*function getAllBulletins($con, $username){
  $query = "SELECT bulletinId FROM connector WHERE username = '$username'";
  $result = mysqli_query($con, $query) or die ("Cannot retrieve info");
  $data = '';
  while ($row = mysqli_fetch_array($result)){
    $data += $row['bulletinId']
    echo $row['bulletinId'].'<br>';
  }
}*/




 ?>



<!-- This is the Memo Code -->
 <div>
     <ul>
         <li>
                 <!--Add link to make the Memo A Click Button-->
             <a id="IdMemoLink" href="url">

                 <h2 id="IdTitleName">Title MyFirstMeMo</h2>
                 <p id="IdMemoText">Sup Shahar this is a Cool MeMo Bla Bla BLa</p>
                 <h3 >Picture</h3>
                 <img id="IdPictureMemo" src="http://www.hitentertainment.com/corporate/images/brands/bobBuilder/BTB_KIDSCREEN_AD__Croped_V1.jpg" style="width:100px; height:100px;" />
             </a>

         </li>
         <li>
     </ul>

  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
