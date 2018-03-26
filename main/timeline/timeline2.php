<?PHP
include("../../include/config/config.php");
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
// session_unset();
$user_id=$_SESSION["user_id"];

function icone_text($flag)
{
  if($flag == 0)
  {
    return "";
  }
  else if($flag == 1)
  {
    return "<a type=\"button\" class=\"timeline-button timeline-like-button\"></a>";
  }
  else if($flag == 2)
  {
    return "<a type=\"button\" class=\"timeline-button rank-download-button\"></a>";
  }
  else if($flag == 3)
  {
    return "<a type=\"button\" class=\"timeline-button rank-download-button\"></a>";
  }
}

function project_master()
{
  $user_id=$_SESSION["user_id"];
  $master_sql = "select id from projects where pri_user_id='$user_id'";
  $master_res = mysql_query($master_sql);
  $master_cnt=mysql_num_rows($master_res);

  if($master_cnt == 0)
  {
    return "";
  }
  else
  {
    $q = "";
    for($i=0;$i<$master_cnt;$i++)
    {
      $master_id = mysql_result($master_res,$i,'id');
      $q = "$q or project_id = '$master_id'";
    }

    return $q;

  }
}

?>

<div class="content-left">
  <div class="bar-area">
    <img id="timeline-bar-img"></img>
  </div>

  <div class="bs-example normal col-md-11 time-line-group" id="project-list-area-myproject">
    <div id="project-comments" role="form">
      <form class="form-horizontal">
        <?php
          $master_projects = project_master();
          $sql = "select * from comments where pri_user_id='$user_id' $master_projects order by created_at desc;";
          $res = mysql_query($sql);
          $cnt=mysql_num_rows($res);
          $flag = "0000-00-00";

          for($i=0;$i<$cnt;$i++)
          {
            $content = mysql_result($res,$i,'CONTENTS');
            $time = mysql_result($res,$i,'created_at');
            $commenter_id = mysql_result($res,$i, 'pri_user_id');
            $head_time = substr($time, 0,10);
            $type = mysql_result($res,$i,'TYPE');
            $icone = icone_text($type);

            if($flag != $head_time)
            {
              $date_form="<div>
                    <hr style=\"margin-top: 5px; margin-bottom: 5px;\" />
                      <div style=\"font-size: 16px\">$head_time </div>
                    <hr style=\"margin-top: 5px; margin-bottom: 15px;\" />
                  </div>";
              $flag = $head_time;
            }
            else
            {
              $date_form="";
            }

            $sql2 = "select PICTURE , NAME from users where id = $commenter_id;";
            $res2 = mysql_query($sql2);

            $picture_path = mysql_result($res2,0,'PICTURE');
            $user_name = mysql_result($res2,0,'NAME');

            echo("
              
               <div class=\"form-group \">
                  $date_form
                  <img \" class=\"timeline-user-img left\" src=\"/uploads/userImg/$picture_path\"/>
                  <div>
                    <h4>$user_name</h4>
                    <label>
                      $icone
                      $content
                    </label>
                  </div>

                  <div class=\"right\">
                    $time
                  </div>
                </div>
                <hr>
              ");
          }
          // $sql = "select * from users_projects where user_id='$user_id'";
          // $res = mysql_query($sql);
          // $cnt=mysql_num_rows($sql_result);
          // for($i=0;$i<$cnt;$i=$i++)
          // {
          //   $project_id=mysql_result($res,$i,'project_id');
          //   $sql2 = "select * from projects where pri_user_id = '$project_id'";
          // }
        ?>
      </form>
      <hr>
    </div>
  </div>
</div>

<div class="side-area-panel panel panel-default right">
  <!-- Default panel contents -->
  <div class="side-banner">
    <div class="myFavoriteListBanner-img"></div>
  </div>

  <!-- List group -->
  <ul id="list-group-item" class="list-group">
    <?php
    include("/home/mh/soma/webpage/main/favorite_connect.php");
    for($i=0; $i<$q_favoritelist_count; $i++){
    echo("
    <li class=\"list-group-item\">
      <div class=\"favoriteList-project row\">
        <div class=\"favoriteList-add col-md-2\">
          <a type=\"button\" onclick=\"play_add($favoritelist_pro_dbproject_id[$i], '$favoritelist_pro_dbTITLE[$i]', '$favoritelist_pro_dbARTIST[$i]', '$favoritelist_pro_dbSOUND_PATH[$i]')\" class=\"favoritelist-button rank-play-add-button\"></a>
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
  </ul>
</div>
