<?php

function addMemo ($user, $bulletinId, $data, $style){
  $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "INSERT INTO memos (created_by, bulletin_id, data, style) VALUES ('$user', '$bulletinId', '$data', '$style')";
  mysqli_query($con, $query) or die ("Cannot Add memo");
  mysqli_close($con);
}

function changeMemoStyle ($memoId, $style){
  $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "UPDATE memos SET 'style'=['$style'] WHERE id = $memoid";
  mysqli_query($con, $query) or die ("Cannot change memo style");
  mysqli_close($con);

}

function delMemo ($memoId){
  $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "DELETE FROM memos WHERE id = $memoId";
  mysqli_query($con, $query) or die ("Cannot Delete memo");
  mysqli_close($con);

}

function createBulletin ($name, $style){
  $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "INSERT INTO bulletin (bulletin_name, bulletin_style) VALUES ('$name', '$style')";
  mysqli_query($con, $query) or die ("Cannot create bulletin");
  mysqli_close($con);
}

function addImg($memoId, $imgUrl){
  $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "UPDATE memos SET 'pic_url'=['$imgUrl'] WHERE id = $memoid";
  mysqli_query($con, $query) or die ("Cannot embed pic");
  mysqli_close($con);
}

function displayMemo ($memoId){
  $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "SELECT 'data' FROM memos WHERE id = $memoId";
  $result = mysqli_query($con, $query) or die ("Cannot display memo");
  echo $result;
  mysqli_close($con);

}
function getButtons(){
  $str='';
  $btns=array(
    1=>'AddMemo',
    2=>'CreateBulletin',
    3=>'ChangeMemoStyle',
    4=>'AddImg',
    5=>'DisplayMemo'
    );
  while(list($k,$v)=each($btns)){
    $str.='$nbsp;<input type="submit" value="'.$v.'" name="btn_'.$k.'" id="btn_'.$k.'"/>';
  }
  return $str;
}
//Code start here

require_once('connectvars.php');
mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');//Will allow us to use hebrew

$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//$username = mysqli_real_escape_string($con, trim($_POST['username']));//Defence vs sql injection =

if(isset($_POST['btn_1']))
{
  echo "btn clicked";
}
if(isset($_POST['btn_2']))
{
  echo "btn clicked";
}
if(isset($_POST['btn_3']))
{
  echo "btn clicked";
}
if(isset($_POST['btn_4']))
{
  echo "btn clicked";
}




?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>testing</title>
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

    <div id="buttons_panel">
      <?php echo getButtons(); ?>

    </div>
        </form>

  </body>
</html>
