<?php
require_once('connectvars.php');
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');//Will allow us to use hebrew

function addMemo ($con, $user, $bulletinId, $data, $style){
  mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');
  $query = "INSERT INTO memos (created_by, bulletin_id, data, style) VALUES ('$user', '$bulletinId', '$data', '$style')";
  mysqli_query($con, $query) or die ("Cannot Add memo");
  mysqli_close($con);
}

function changeMemoStyle ($con, $memoId, $style){
  $query = "UPDATE memos SET style = '$style' WHERE id = $memoId";
  mysqli_query($con, $query) or die ("Cannot change memo style");
  mysqli_close($con);

}

function delMemo ($con, $memoId){
  $query = "DELETE FROM memos WHERE id = $memoId";
  mysqli_query($con, $query) or die ("Cannot Delete memo");
  mysqli_close($con);

}

function createBulletin ($con, $name, $style){
  $query = "INSERT INTO bulletin (bulletin_name, bulletin_style) VALUES ('$name', '$style')";
  mysqli_query($con, $query) or die ("Cannot create bulletin");
  mysqli_close($con);
}

function addImg($con, $memoId, $imgUrl){
  $query = "UPDATE memos SET pic_url = '$imgUrl' WHERE id = $memoId";
  mysqli_query($con, $query) or die ("Cannot embed pic");
  mysqli_close($con);
}

function getAllBulletins($con, $username){
  $return = array();
  $query = "SELECT bulletinId FROM connector WHERE username = '$username'";
  $result = mysqli_query($con, $query) or die ("Cannot retrieve info");
  while ($row = mysqli_fetch_array($result)){
    array_push($return, '$row['bulletinId']');
  }
  return $return;
}

function signUserToBulletin ($con, $username, $bulletinId){
  $query = "INSERT INTO connector (username, bulletinId) VALUES ('$username', '$bulletinId')";
  mysqli_query($con, $query) or die ("Cannot sign user to bulletin");
}

function displayAllBulletinMemos ($con, $bulletinId){
  mysqli_set_charset($con, "utf8") or die ('Could not set utf-8');//Will allow us to use hebrew
  $query = "SELECT * FROM memos WHERE bulletin_id = '$bulletinId'";
  $result = mysqli_query($con, $query) or die ("Cannot get memos");
  while ($row = mysqli_fetch_array($result)){
    echo 'Created By '.$row['created_by'].'<br>';
    echo 'Timestamp '.$row['date_created'].'<br>';
    echo 'Data :'.$row['data'].'<br>';

  }

  mysqli_close($con);
}
function getButtons(){
  $str='';
  $btns=array(
    1=>'AddMemo',
    2=>'CreateBulletin',
    3=>'ChangeMemoStyle',
    4=>'AddImg',
    5=>'displayAllBulletinMemos',
    6=>'getAllBulletins',
    7=>'signUserToBulletin'
  );
  while(list($k,$v)=each($btns)){
    $str.=' <input type="submit" value="'.$v.'" name="btn_'.$k.'" id="btn_'.$k.'"/>';
  }
  return $str;
}
//Code start here

if(isset($_POST['btn_1']))
{
  $user = 'moshe';
  $bulletinId = '1';
  $data = 'bla bla bla bla and in hebrew בלה בלה בלה';
  $style = 3;

  echo "AddMemo clicked";
  AddMemo($con, $user, $bulletinId, $data, $style);

}
if(isset($_POST['btn_2']))
{
  $name = 'moshe';
  $style = 2;
  CreateBulletin($con, $name, $style);
  echo "CreateBulletin clicked";
}
if(isset($_POST['btn_3']))
{
  $memoId = 1;
  $style = 1;
  ChangeMemoStyle($con, $memoId, $style);
  echo "ChangeMemoStyle clicked";
}
if(isset($_POST['btn_4']))
{
  $memoId = 6;
  $imgUrl = "www.blabla.bla.bla";

  AddImg($con, $memoId, $imgUrl);
  echo "AddImg clicked";
}
if(isset($_POST['btn_5']))
{
  $bullitenId = 1;

  displayAllBulletinMemos($con, $bullitenId);

  echo "click";
}
if(isset($_POST['btn_6']))
{
  $username = 'moshe';
  getAllBulletins($con, $username);
  echo 'click';
}
if(isset($_POST['btn_7']))
{
  $username = 'moshe';
  $bulletinId = 3;
  signUserToBulletin($con, $username, $bulletinId);
  echo 'click';
}
if(isset($_POST['image']))
{


  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check image file

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

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
  <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="image">
  </form>
</body>
</html>
