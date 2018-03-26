<?php
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();

// $db_host    = "localhost";
// $db_user    = "mh";
// $db_password  = "thak2014";
// $db_dbname  = "mh";
// $db_conn    = mysql_connect($db_host, $db_user, $db_password);
// mysql_select_db($db_dbname, $db_conn);
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");

$user_id=$_SESSION["user_id"];

$q_favorite_project="select * from projects, (select project_id as favorite_project_id from favorite where user_id= :user_id)x where projects.id=favorite_project_id;";
$dbq = $pdo->prepare($q_favorite_project);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$dbq->execute();
$q_favoritelist_project_count = $dbq->rowCount();
$q_favorite_project_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
// $q_favorite_project_result=mysql_query($q_favorite_project, $db_conn);  
// $q_favoritelist_project_count=mysql_num_rows($q_favorite_project_result);

$i=0;
foreach ($q_favorite_project_result as $row){
  $favoritelist_pro_dbTITLE[$i]=$row['TITLE'];
  $favoritelist_pro_dbARTIST[$i]=$row['ARTIST'];
  $favoritelist_pro_dbproject_id[$i]=$row['favorite_project_id'];
  $favoritelist_pro_dbpri_user_id[$i]=$row['pri_user_id'];
   
  $q_favorite_project_r="select id, SOUND_PATH, pri_user_id from sounds where id= :favoritelist_pro_dbproject_id;";
  $dbq = $pdo->prepare($q_favorite_project_r);
  $dbq->bindParam(':favoritelist_pro_dbproject_id', $favoritelist_pro_dbproject_id[$i], PDO::PARAM_INT);
  $dbq->execute();
  $q_favorite_project_result_r=$dbq->fetch(PDO::FETCH_ASSOC);
  $q_favorite_project_result_r_count=$dbq->rowCount();
  if($q_favorite_project_result_r_count){
    $favoritelist_pro_dbsound_id[$i]=$q_favorite_project_result['id'];
    $favoritelist_pro_dbSOUND_PATH[$i]=$q_favorite_project_result['SOUND_PATH'];
  }
  else{
    $favoritelist_pro_dbsound_id[$i]=0;
    $favoritelist_pro_dbSOUND_PATH[$i]='Null';
  }
  $i++;
}

// for($i=0; $i<$q_favoritelist_project_count; $i++)
// {
//   $favoritelist_pro_dbTITLE[$i]=mysql_result($q_favorite_project_result, $i, 'TITLE');
//   $favoritelist_pro_dbARTIST[$i]=mysql_result($q_favorite_project_result, $i, 'ARTIST');
//   $favoritelist_pro_dbproject_id[$i]=mysql_result($q_favorite_project_result, $i, 'favorite_project_id');
//   $favoritelist_pro_dbpri_user_id[$i]=mysql_result($q_favorite_project_result, $i, 'pri_user_id');

//   $q_favorite_project_r="select id, SOUND_PATH, pri_user_id from sounds where id='$favoritelist_pro_dbproject_id[$i]';";
//   $q_favorite_project_result_r=mysql_query($q_favorite_project_r, $db_conn);
//   $q_favorite_project_result_r_count=mysql_num_rows($q_favorite_project_result_r);
//   if($q_favorite_project_result_r_count){
//     $favoritelist_pro_dbsound_id[$i]=mysql_result($q_favorite_project_result_r, 0, 'id');
//     $favoritelist_pro_dbSOUND_PATH[$i]=mysql_result($q_favorite_project_result_r, 0, 'SOUND_PATH');
//   }
//   else{
//     $favoritelist_pro_dbsound_id[$i]=0;
//     $favoritelist_pro_dbSOUND_PATH[$i]='Null';
//   }
// };

for($i=0; $i<$q_favoritelist_project_count; $i++){
echo("
<li class=\"list-group-item\">
  <div class=\"favoriteList-project row\">
    <div class=\"favoriteList-add col-md-2\">
    ");
    if($favoritelist_pro_dbsound_id[$i]==0){
     echo(" <a style=\"cursor: auto;\" type=\"button\" class=\"favoritelist-button rank-play-add-button\"></a>");
     }
     else{
      echo(" <a type=\"button\" onclick=\"session_play_add($favoritelist_pro_dbproject_id[$i], '$favoritelist_pro_dbTITLE[$i]', '$favoritelist_pro_dbARTIST[$i]', '$favoritelist_pro_dbSOUND_PATH[$i]')\" class=\"favoritelist-button rank-play-add-button\"></a>");
     }
    echo("
    </div>
    <div class=\"favoriteList-title-artist col-md-8\">
      <div onclick=\"getAlbumInfo($favoritelist_pro_dbproject_id[$i]);\" class=\"favoriteList-title col-md-6\">$favoritelist_pro_dbTITLE[$i]</div>
      <div onclick=\"user_info($favoritelist_pro_dbpri_user_id[$i]);\" class=\"favoriteList-artist col-md-6\">$favoritelist_pro_dbARTIST[$i]</div>
    </div>
    <div class=\"favoriteList-delete col-md-2\">
      <a type=\"button\" onclick=\"favorite_delete($favoritelist_pro_dbproject_id[$i])\" class=\"favoritelist-button favorite-delete-button\"></a>
    </div>
  </div>
</li>
");
 }
?>