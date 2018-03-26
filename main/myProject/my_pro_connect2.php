<?PHP
session_cache_expire(1800);
session_start();

// $base_dir = "/home/mh/soma/webpage";
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");

extract($_POST);
$user_id=$_SESSION["user_id"];
$project_id=$_GET['a'];
$TITLE=$_POST["TITLE"];
$GENRE=$_POST["GENRE"];
// $AFFILIATE_BAND=$_POST["AFFILIATE"];
$INFO=$_POST["INFO"];
// $ALBUM_IMAGE_PATH=$_POST["ALBUM_IMAGE_PATH"];
$PICTURE=$_FILES['ALBUM_IMAGE_PATH']['name'];
$SOUND=$_FILES['ALBUM_SOUND_PATH']['name'];
?>

<?php
if($PICTURE && $SOUND){

/// picture
// $q1="update users set NAME='$NAME', PART='$PART', AFFILIATE_BAND='$AFFILIATE_BAND', INFO='$INFO', PICTURE='$PICTURE' where id=$user_id;";
$q1="update projects set TITLE= :TITLE, GENRE= :GENRE, PROJECT_INFO= :INFO, ALBUM_IMAGE_PATH= :PICTURE where id= :project_id;";
$dbq = $pdo->prepare($q1);
$dbq->bindParam(':TITLE', $TITLE, PDO::PARAM_STR);
$dbq->bindParam(':GENRE', $GENRE, PDO::PARAM_STR);
$dbq->bindParam(':INFO', $INFO, PDO::PARAM_STR);
$dbq->bindParam(':PICTURE', $PICTURE, PDO::PARAM_STR);
$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
$dbq->execute();
// $sql_result1 = $dbq->fetch(PDO::FETCH_ASSOC);
// $sql_result1=mysql_query($q1, $db_conn);          //질의(위 내용)를 수행하라.

  if ($_FILES['ALBUM_IMAGE_PATH']['error'] > 0) { 
      echo 'problem'; 
      switch ($_FILES['ALBUM_IMAGE_PATH']['error']) { 
          case 1: echo 'file exceeded upload_max_filesize'; echo "<script>alert('file exceeded upload_max_filesize !!');</script>";break; 
          case 2: echo 'file exceeded max_file_size'; echo "<script>alert('file exceeded max_file_size !!');</script>";break; 
          case 3: echo 'file only partially uploaded'; echo "<script>alert('file only partially uploaded !!');</script>";break; 
          case 4: echo 'No file uploaded'; echo "<script>alert('No file uploaded !!');</script>";break; 
      } 
  echo "<script>location.replace('/main/myProject/myProject_edit.php?a=pro_id');</script>";
  exit; 
  } 

  //파일을 원하는 곳으로 옮긴다.
  // $base_dir = "/home/mh/soma/webpage/uploads/albumImg/";
  $upfile = $_SERVER["DOCUMENT_ROOT"]."/uploads/albumImg/".$_FILES['ALBUM_IMAGE_PATH']['name']; 
  // $dest = $save_dir . $_FILES["myFile"]["name"];
  $upfile_name = $_FILES['ALBUM_IMAGE_PATH']['name'];

  if (is_uploaded_file($_FILES['ALBUM_IMAGE_PATH']['tmp_name'])) { 
      
      // do { 
      //     $real_name = date("YmdHis") . "." . $ext; 
      // } while(file_exists("$base_dir/uploads/{$real_name}")); 


      if (!move_uploaded_file($_FILES['ALBUM_IMAGE_PATH']['tmp_name'], $upfile)) { 
      echo 'problem could not move file to destination directory';
      exit; 
      } 

  } else { 
      echo 'problem possible file upload attack. filename:'; 
      echo $_FILES['ALBUM_IMAGE_PATH']['name']; 
      exit; 
  } 
//// sound
  $uploaddir = $_SERVER["DOCUMENT_ROOT"]."/uploads/music/";
  $uploadfile = $uploaddir.basename($SOUND);
  $type = $_FILES['ALBUM_SOUND_PATH']['type'];

  $valid_extension = array('.mp3', '.mp4', '.wav');
  $file_extension = strtolower( strrchr( $_FILES["ALBUM_SOUND_PATH"]["name"], "." ) );

  if( in_array( $file_extension, $valid_extension ) &&  $_FILES["ALBUM_SOUND_PATH"]['size'] < 104857600)
  {
    echo("<pre>");
    if (move_uploaded_file($_FILES['ALBUM_SOUND_PATH']['tmp_name'], $uploadfile)) 
    {
      // include("./addComment.php");
        // uploadSource($project_id, $user_id);    // timeline 
      $sound_path = $_FILES["ALBUM_SOUND_PATH"]["name"];
        // $comment = $_REQUEST['comment'];
        // $sql = "insert into sources (pri_user_id, project_id,created_at,COMMENT,SOURCES_PATH) values ('$user_id', '$project_id',NOW(),'$comment','$source_path');";
        // include("./myProject_edit_soundCheck.php");
        // projectSoundCheck($project_id, $user_id);
      $projectSoundCheck = "select * from sounds where project_id= :project_id and pri_user_id= :user_id;";
      $dbq = $pdo->prepare($projectSoundCheck);
      $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
      $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $dbq->execute();
      $cnt = $dbq->rowCount();
      $res_check = $dbq->fetchAll(PDO::FETCH_ASSOC);
      // $res_check = mysql_query($projectSoundCheck);
      // $cnt=mysql_num_rows($res_check);
      if($cnt){
        $sql = "update sounds set updated_at=now(), SOUND_PATH= :sound_path where pri_user_id= :user_id and project_id= :project_id;";
      }
      else{
        $sql = "insert into sounds (pri_user_id, project_id,created_at,SOUND_PATH) values ( :user_id, :project_id ,NOW(), :sound_path);";
      }
      $dbq = $pdo->prepare($sql);
      $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
      $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $dbq->bindParam(':sound_path', $sound_path, PDO::PARAM_STR);
      $dbq->execute();
      // $cnt = $dbq->rowCount();
      // $res = $dbq->fetchAll(PDO::FETCH_ASSOC);
      // $res = mysql_query($sql);
      // $q2="update projects set TITLE='$TITLE', GENRE='$GENRE', PROJECT_INFO='$INFO' where id='$project_id';";
      // $sql_result2=mysql_query($q2, $db_conn);          //질의(위 내용)를 수행하라.
      echo "<script>alert('Modify Complete !!'); parent.$(\"#content\").load(\"/main/myProject/projectInfo.php?a=\"+$project_id);</script>";
      exit();
    } 
    else 
    {
      $error = $_FILES["ALBUM_SOUND_PATH"]["error"];
      print "파일 업로드 실패!\n$error\n";
    }
    
    echo '자세한 디버깅 정보입니다:';
    print_r($_FILES);

    print "</pre>";
    
  }
  else
  {
    echo("<script>alert(\"Please upload only audio files and smaller file size than 100M\");
      window.location=\"/main/myProject/projectBottom.php\";
      </script>");    
  }
}
else if($PICTURE && !$SOUND)
{
  $q1="update projects set TITLE= :TITLE, GENRE= :GENRE, PROJECT_INFO= :INFO, ALBUM_IMAGE_PATH= :PICTURE where id= :project_id;";
  $dbq = $pdo->prepare($q1);
  $dbq->bindParam(':TITLE', $TITLE, PDO::PARAM_STR);
  $dbq->bindParam(':GENRE', $GENRE, PDO::PARAM_STR);
  $dbq->bindParam(':INFO', $INFO, PDO::PARAM_STR);
  $dbq->bindParam(':PICTURE', $PICTURE, PDO::PARAM_STR);
  $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
  $dbq->execute();
  // $sql_result1=mysql_query($q1, $db_conn);          //질의(위 내용)를 수행하라.

  if ($_FILES['ALBUM_IMAGE_PATH']['error'] > 0) { 
    echo 'problem'; 
    switch ($_FILES['ALBUM_IMAGE_PATH']['error']) { 
      case 1: echo 'file exceeded upload_max_filesize'; echo "<script>alert('file exceeded upload_max_filesize !!');</script>";break; 
      case 2: echo 'file exceeded max_file_size'; echo "<script>alert('file exceeded max_file_size !!');</script>";break; 
      case 3: echo 'file only partially uploaded'; echo "<script>alert('file only partially uploaded !!');</script>";break; 
      case 4: echo 'No file uploaded'; echo "<script>alert('No file uploaded !!');</script>";break; 
    } 
    echo "<script>location.replace('/main/myProject/myProject_edit.php?a=pro_id');</script>";
    exit; 
  } 

  //파일을 원하는 곳으로 옮긴다.
  $base_dir = $_SERVER["DOCUMENT_ROOT"]."/uploads/albumImg/";
  $upfile = $base_dir.$_FILES['ALBUM_IMAGE_PATH']['name']; 
  $upfile_name = $_FILES['ALBUM_IMAGE_PATH']['name'];

  if (is_uploaded_file($_FILES['ALBUM_IMAGE_PATH']['tmp_name'])) { 
    if (!move_uploaded_file($_FILES['ALBUM_IMAGE_PATH']['tmp_name'], $upfile)) { 
      echo 'problem could not move file to destination directory';
      exit; 
    } 

  } else { 
    echo 'problem possible file upload attack. filename:'; 
    echo $_FILES['ALBUM_IMAGE_PATH']['name']; 
    exit; 
  } 
}
else if(!$PICTURE && $SOUND)
{
  $uploaddir = $_SERVER["DOCUMENT_ROOT"]."/uploads/music/";
  $uploadfile = $uploaddir.basename($SOUND);
  $type = $_FILES['ALBUM_SOUND_PATH']['type'];

  $valid_extension = array('.mp3', '.mp4', '.wav');
  $file_extension = strtolower( strrchr( $_FILES["ALBUM_SOUND_PATH"]["name"], "." ) );

  if( in_array( $file_extension, $valid_extension ) &&  $_FILES["ALBUM_SOUND_PATH"]['size'] < 104857600)
  {
    echo("<pre>");
    if (move_uploaded_file($_FILES['ALBUM_SOUND_PATH']['tmp_name'], $uploadfile)) 
    {
      // include("./addComment.php");
        // uploadSource($project_id, $user_id);    // timeline 
      $sound_path = $_FILES["ALBUM_SOUND_PATH"]["name"];
        // $comment = $_REQUEST['comment'];
        // $sql = "insert into sources (pri_user_id, project_id,created_at,COMMENT,SOURCES_PATH) values ('$user_id', '$project_id',NOW(),'$comment','$source_path');";
        // include("./myProject_edit_soundCheck.php");
        // projectSoundCheck($project_id, $user_id);
      $projectSoundCheck = "select * from sounds where project_id= :project_id and pri_user_id= :user_id;";
      $dbq = $pdo->prepare($projectSoundCheck);
      $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
      $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $dbq->execute();
      $cnt = $dbq->rowCount();
      $res_check = $dbq->fetchAll(PDO::FETCH_ASSOC);
      // $res_check = mysql_query($projectSoundCheck);
      // $cnt=mysql_num_rows($res_check);
      if($cnt){
        $sql = "update sounds set updated_at=now(), SOUND_PATH= :sound_path where pri_user_id= :user_id and project_id= :project_id;";
      }
      else{
        $sql = "insert into sounds (pri_user_id, project_id,created_at,SOUND_PATH) values ( :user_id, :project_id ,NOW(), :sound_path);";
      }
      $dbq = $pdo->prepare($sql);
      $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
      $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $dbq->bindParam(':sound_path', $sound_path, PDO::PARAM_STR);
      $dbq->execute();
      // $cnt = $dbq->rowCount();
      // $res = $dbq->fetchAll(PDO::FETCH_ASSOC);
      $q2="update projects set TITLE= :TITLE, GENRE= :GENRE, PROJECT_INFO= :INFO where id= :project_id;";
      $dbq = $pdo->prepare($q2);
      $dbq->bindParam(':TITLE', $TITLE, PDO::PARAM_STR);
      $dbq->bindParam(':GENRE', $GENRE, PDO::PARAM_STR);
      $dbq->bindParam(':INFO', $INFO, PDO::PARAM_STR);
      $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
      $dbq->execute();
      // $q2="update projects set TITLE='$TITLE', GENRE='$GENRE', PROJECT_INFO='$INFO' where id='$project_id';";
      // $sql_result2=mysql_query($q2, $db_conn);          //질의(위 내용)를 수행하라.
      echo "<script>alert('Modify Complete !!'); parent.$(\"#content\").load(\"/main/myProject/projectInfo.php?a=\"+$project_id);</script>";
      exit();
    } 
    else 
    {
      $error = $_FILES["ALBUM_SOUND_PATH"]["error"];
      print "파일 업로드 실패!\n$error\n";
    }
    
    echo '자세한 디버깅 정보입니다:';
    print_r($_FILES);

    print "</pre>";
    
  }
  else
  {
    echo("<script>alert(\"Please upload only audio files and smaller file size than 100M\");
      window.location=\"/main/myProject/projectBottom.php\";
      </script>");    
  }
}
else{
  $q2="update projects set TITLE= :TITLE, GENRE= :GENRE, PROJECT_INFO= :INFO where id= :project_id;";
  $dbq = $pdo->prepare($q2);
  $dbq->bindParam(':TITLE', $TITLE, PDO::PARAM_STR);
  $dbq->bindParam(':GENRE', $GENRE, PDO::PARAM_STR);
  $dbq->bindParam(':INFO', $INFO, PDO::PARAM_STR);
  $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
  $dbq->execute();
  // $sql_result2 = $dbq->fetch(PDO::FETCH_ASSOC);
  // $sql_result2=mysql_query($q2, $db_conn);          //질의(위 내용)를 수행하라.
}

echo "<script>alert('Modify Complete !!'); parent.$(\"#content\").load(\"/main/myProject/projectInfo.php?a=\"+$project_id);</script>";
?>