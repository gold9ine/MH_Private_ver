<?PHP
session_cache_expire(1800);
session_start();

// $db_host    = "localhost";
// $db_user    = "mh";
// $db_password  = "thak2014";
// $db_dbname  = "mh";
// $db_conn    = mysql_connect($db_host, $db_user, $db_password);
// mysql_select_db($db_dbname, $db_conn);
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");

extract($_POST);
$user_id=$_SESSION["user_id"];
$NAME=$_POST["NICKNAME"];
$PART=$_POST["PART"];
$AFFILIATE_BAND=$_POST["AFFILIATE"];
$INFO=$_POST["INFO"];
// $ALBUM_IMAGE_PATH=$_POST["ALBUM_IMAGE_PATH"];
$PICTURE=$_FILES['ALBUM_IMAGE_PATH']['name'];

$q="select * from users where NAME= :NAME and id!= :user_id;";
$dbq = $pdo->prepare($q);
$dbq->bindParam(':NAME', $NAME, PDO::PARAM_STR);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$dbq->execute();
$count = $dbq->rowCount();
$sql_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
// $sql_result=mysql_query($q, $db_conn);          //질의(위 내용)를 수행하라.
// $count=mysql_num_rows($sql_result);
if($count>=1){
  echo "<script>alert('NickName overlapped !!');</script>";
  echo "<script>location.replace('/main/user/my_info_area.php');</script>";
  exit;
}

if($PICTURE){
$q1="update users set NAME= :NAME, PART= :PART, AFFILIATE_BAND= :AFFILIATE_BAND, INFO= :INFO, PICTURE= :PICTURE where id= :user_id;";
$dbq = $pdo->prepare($q1);
$dbq->bindParam(':NAME', $NAME, PDO::PARAM_STR);
$dbq->bindParam(':PART', $PART, PDO::PARAM_STR);
$dbq->bindParam(':AFFILIATE_BAND', $AFFILIATE_BAND, PDO::PARAM_STR);
$dbq->bindParam(':INFO', $INFO, PDO::PARAM_STR);
$dbq->bindParam(':PICTURE', $PICTURE, PDO::PARAM_STR);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$dbq->execute();
// $count2 = $dbq->rowCount();
// $sql_result = $dbq->fetch(PDO::FETCH_ASSOC);
// $sql_result1=mysql_query($q1, $db_conn);          //질의(위 내용)를 수행하라.

  if ($_FILES['ALBUM_IMAGE_PATH']['error'] > 0) { 
      echo 'problem'; 
      switch ($_FILES['ALBUM_IMAGE_PATH']['error']) { 
          case 1: echo 'file exceeded upload_max_filesize'; echo "<script>alert('file exceeded upload_max_filesize !!');</script>";break; 
          case 2: echo 'file exceeded max_file_size'; echo "<script>alert('file exceeded max_file_size !!');</script>";break; 
          case 3: echo 'file only partially uploaded'; echo "<script>alert('file only partially uploaded !!');</script>";break; 
          case 4: echo 'No file uploaded'; echo "<script>alert('No file uploaded !!');</script>";break; 
      } 
  echo "<script>location.replace('/main/user/my_info_area.php');</script>";
  exit; 
  } 

  //파일을 원하는 곳으로 옮긴다.
  // $base_dir = "/home/mh/soma/webpage/uploads/userImg/";
  $upfile = $_SERVER["DOCUMENT_ROOT"]."/uploads/userImg/".$_FILES['ALBUM_IMAGE_PATH']['name']; 
  // $dest = $save_dir . $_FILES["myFile"]["name"];
  $upfile_name = $_FILES['ALBUM_IMAGE_PATH']['name']; 

  if (is_uploaded_file($_FILES['ALBUM_IMAGE_PATH']['tmp_name'])) { 
      
      // do { 
      //     $real_name = date("YmdHis") . "." . $ext; 
      // } while(file_exists("$base_dir/uploads/{$real_name}")); 


      if (!move_uploaded_file($_FILES['ALBUM_IMAGE_PATH']['tmp_name'], $upfile)) { 
      echo 'problem could not move file to destination directory'; echo($upfile);
      exit; 
      } 

  } else { 
      echo 'problem possible file upload attack. filename:'; 
      echo $_FILES['ALBUM_IMAGE_PATH']['name']; 
      exit; 
  } 
}
else{
  $q2="update users set NAME= :NAME, PART= :PART, AFFILIATE_BAND= :AFFILIATE_BAND, INFO= :INFO where id= :user_id;";
  $dbq = $pdo->prepare($q2);
  $dbq->bindParam(':NAME', $NAME, PDO::PARAM_STR);
  $dbq->bindParam(':PART', $PART, PDO::PARAM_STR);
  $dbq->bindParam(':AFFILIATE_BAND', $AFFILIATE_BAND, PDO::PARAM_STR);
  $dbq->bindParam(':INFO', $INFO, PDO::PARAM_STR);
  $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $dbq->execute();
  // $sql_result2=mysql_query($q2, $db_conn);          //질의(위 내용)를 수행하라.
}

echo "<script>alert('Modify Complete !!'); location.replace('/main/user/my_info_area.php');</script>";
?>