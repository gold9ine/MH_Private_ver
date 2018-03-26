<?PHP
header('Content-Type: text/html; charset=utf-8');
session_start();
// function text_scan($info)
//   {
//     if(strlen($info) > 25)
//     {
//       $info = mb_strcut($info, 0,25,'euc-kr');
//       $info = "$info"."...";
//     }
//     return $info;
//   }
?>

<?PHP
$base_dir = "/home/mh/soma/webpage";
include("$base_dir/include/config/config.php");
// $db_host    = "localhost";
// $db_user    = "mh";
// $db_password  = "thak2014";
// $db_dbname  = "mh";
// $db_conn    = mysql_connect($db_host, $db_user, $db_password);
// mysql_select_db($db_dbname, $db_conn);

$user_id=$_SESSION["user_id"];
$project_id=$_GET['a'];
$_SESSION["project_id"] = $project_id;
$q="select projects.*, sounds.id as sound_id, sounds.project_id, sounds.pri_user_id as sound_pri_user_id, sounds.SOUND_PATH, sounds.updated_at as sound_updated_at from projects, sounds where projects.id=sounds.project_id and projects.id=$project_id;";
$sql_result=mysql_query($q, $db_conn); 
$count2=mysql_num_rows($sql_result);
      
if($count2){
  $pro_dbid=$project_id;
  $pro_dbGOOD_COUNT=mysql_result($sql_result, 0 , 'GOOD_COUNT');
  $pro_dbDOWNLOAD_COUNT=mysql_result($sql_result, 0 , 'DOWNLOAD_COUNT');
  $pro_dbPLAY_COUNT=mysql_result($sql_result, 0 , 'PLAY_COUNT');
  $pro_dbPLAY_TIME=mysql_result($sql_result, 0 , 'PLAY_TIME');

  (mysql_result($sql_result, 0 , 'created_at')!=null)?$pro_dbcreated_at=mysql_result($sql_result, 0 , 'created_at'):$pro_dbcreated_at=0;
  // $pro_dbcreated_at=mysql_result($sql_result, 0 , 'created_at');
  (mysql_result($sql_result, 0 , 'updated_at')!=null)?$pro_dbupdated_at=mysql_result($sql_result, 0 , 'updated_at'):$pro_dbupdated_at=0;
  // $pro_dbupdated_at=mysql_result($sql_result, 0 , 'updated_at');
  // (mysql_result($pro_dbALBUM_IMAGE_PATH, 0 , 'ALBUM_IMAGE_PATH')!=null)?$pro_dbALBUM_IMAGE_PATH=mysql_result($pro_dbALBUM_IMAGE_PATH, 0 , 'ALBUM_IMAGE_PATH'):$pro_dbALBUM_IMAGE_PATH="";
  $pro_dbALBUM_IMAGE_PATH=mysql_result($sql_result, 0 , 'ALBUM_IMAGE_PATH');
  $pro_dbTITLE=mysql_result($sql_result, 0 , 'TITLE');
  $pro_dbARTIST=mysql_result($sql_result, 0 , 'ARTIST');

  $pro_dbPROJECT_INFO=mysql_result($sql_result, 0 , 'PROJECT_INFO');
  $pro_dbmeta_num=mysql_result($sql_result, 0 , 'meta_id');
  $pro_dbpri_user_id=mysql_result($sql_result, 0 , 'pri_user_id');
  $pro_dbGENRE=mysql_result($sql_result, 0 , 'GENRE');
  $pro_dbsound_id=mysql_result($sql_result, 0 , 'sound_id');

  $pro_dbsound_pri_user_id=mysql_result($sql_result, 0 , 'sound_pri_user_id');
  $pro_dbSOUND_PATH=mysql_result($sql_result, 0 , 'SOUND_PATH');
  $pro_dbsound_updated_at=mysql_result($sql_result, 0 , 'sound_updated_at');

  $sql = "select NAME from users where id=$pro_dbsound_pri_user_id;";
  $res2=mysql_query($sql,$db_conn);
  $pro_dbuploader_user_name = mysql_result($res2, 0,'NAME');
}
else{
  $q="select * from projects where id='$project_id';";
  $sql_result=mysql_query($q, $db_conn); 
  $count=mysql_num_rows($sql_result);

  $pro_dbid=$project_id;
  $pro_dbGOOD_COUNT=mysql_result($sql_result, 0 , 'GOOD_COUNT');
  $pro_dbDOWNLOAD_COUNT=mysql_result($sql_result, 0 , 'DOWNLOAD_COUNT');
  $pro_dbPLAY_COUNT=mysql_result($sql_result, 0 , 'PLAY_COUNT');
  $pro_dbPLAY_TIME=mysql_result($sql_result, 0 , 'PLAY_TIME');

  (mysql_result($sql_result, 0 , 'created_at')!=null)?$pro_dbcreated_at=mysql_result($sql_result, 0 , 'created_at'):$pro_dbcreated_at=0;
  $pro_dbsound_updated_at=mysql_result($sql_result, 0 , 'updated_at');
  $pro_dbALBUM_IMAGE_PATH=mysql_result($sql_result, 0 , 'ALBUM_IMAGE_PATH');
  $pro_dbTITLE=mysql_result($sql_result, 0 , 'TITLE');
  $pro_dbARTIST=mysql_result($sql_result, 0 , 'ARTIST');

  $pro_dbPROJECT_INFO=mysql_result($sql_result, 0 , 'PROJECT_INFO');
  $pro_dbmeta_num=mysql_result($sql_result, 0 , 'meta_id');
  $pro_dbpri_user_id=mysql_result($sql_result, 0 , 'pri_user_id');
  $pro_dbGENRE=mysql_result($sql_result, 0 , 'GENRE');

  $sql2 = "select NAME from users where id=$pro_dbpri_user_id;";
  $res2=mysql_query($sql2,$db_conn);
  $pro_dbuploader_user_name = mysql_result($res2, 0,'NAME');
}

$temp_pro_dbGENRE=$pro_dbGENRE;
$q_temp="select * from projects where GENRE='$temp_pro_dbGENRE' and id!=$pro_dbid order by id desc, rand() limit 10;";
$q_temp_result=mysql_query($q_temp, $db_conn);          
$q_temp_count=mysql_num_rows($q_temp_result);
for($j=0; $j<$q_temp_count; $j++)
{
  $re_pro_dbid[$j]=mysql_result($q_temp_result, $j, 'id');
  $re_pro_dbALBUM_IMAGE_PATH[$j]=mysql_result($q_temp_result, $j, 'ALBUM_IMAGE_PATH');
}
?>


<div class="bar-area">
  <img id="projectInfo-bar-img"></img>
</div>
<div class="row pi-1st">
  <div class="col-md-6">
    <div class="pi-title-banner">
      <img id="cd-img-bg" class="cd-img-bg">
      <?php echo($pro_dbARTIST."'s album '".$pro_dbTITLE."'");?>
    </div>

    <div class="row pi-main-row-top album-info-area">
      <div class="col-xs-5">
        <div class="pi-main-alblum-img-back">      
          <?php echo("<img class=\"pi-main-album-full img-radius\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH\">");?>
        </div>
      </div>
      <div class="col-xs-7 pi-main-formgroup">
        <div class="form-group">
          <label class="col-xs-4 control-label">Title</label>
          <div class="col-xs-8"><?php echo($pro_dbTITLE); ?></div>
        </div>
        <div class="form-group">
          <label class="col-xs-4 control-label">Creator</label>
          <?php echo("<div onclick=\"user_info($pro_dbpri_user_id);\" class=\"pointer col-xs-7\">$pro_dbARTIST</div>");?>
        </div>
        <div class="form-group">
          <label class="col-xs-4 control-label">Created At</label>
          <div class="col-xs-8"><?php echo($pro_dbcreated_at); ?></div>
        </div>
        <div class="form-group">
          <label class="col-xs-4 control-label">Genre</label>
          <div class="col-xs-8"><?php echo($pro_dbGENRE); ?></div>
        </div>
        <div class="form-group">
          <label class="col-xs-4 control-label">Good Count</label>
          <div class="col-xs-8"><?php echo($pro_dbGOOD_COUNT); ?></div>
        </div>
        <div class="form-group">
          <label class="col-xs-4 control-label">Recent Upload</label>
          <div class="col-xs-8"><?php echo($pro_dbsound_updated_at); ?></div>
        </div>
        <div class="form-group" style="height: 32px;">
          <label class="col-xs-4 control-label">Musician</label>
          <?php
          if($count2){
          echo("<div onclick=\"user_info($pro_dbsound_pri_user_id);\" class=\"pointer col-xs-7\">$pro_dbuploader_user_name</div>");
          }
          else{
          echo("<div onclick=\"user_info($pro_dbpri_user_id);\" class=\"pointer col-xs-7\">$pro_dbuploader_user_name</div>");
          }
          ?>
        </div>
        <div class="form-group" style="height: 38px;">
          <label class="col-xs-4 control-label introduce-label" style="color: rgb(22, 39, 165);margin-left: 20px;width: 120px;"><a class="mic-icon"></a>Introduce</label>
          <div class="col-xs-8 project-info-text"><?php  echo($pro_dbPROJECT_INFO); ?></div>
        </div>
        <div class="form-group">
          <form class="pi-main-button-group">
            <?php 
              echo("
              <a onclick=\"callEditProject($project_id);\" type=\"button\" id=\"project-edit-button\" class=\"pro-button pro-edit-button\"></a>
              "); 
              if($count2){
              echo("
              <a onclick=\"session_play_add($pro_dbid, '$pro_dbTITLE', '$pro_dbARTIST', '$pro_dbSOUND_PATH')\" class=\"pro-button pro-play-add-button\"></a>
              <a onclick=\"down_music($pro_dbid) \" href=\"/uploads/music/$pro_dbSOUND_PATH\" download=\"$pro_dbSOUND_PATH\" type=\"button\" class=\"pro-button pro-download-button\"></a>
              "); 
              };
              echo("
              <a onclick=\"like_project($pro_dbid)\" class=\"pro-button pro-like-button\"></a>
              "); 
            ?>
          </form>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-6">
    <div class="pi-ra-banner">
      <img class="related-albums-img">
    </div>
    <div class="album-info-area">
      <div style="height: 15px;"></div>
      <?php for($j=0; $j<$q_temp_count; $j++){
      echo("
      <img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small pi-related-album-group\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"
      );
      };
      ?>
    </div>
  </div>
</div>
<iframe name="projectBottom" class="col-md-12 pi-iframe" scrolling="No" onLoad="setIFrameHeight(this);" src="/main/myProject/projectBottom.php" frameborder="0"></iframe>
