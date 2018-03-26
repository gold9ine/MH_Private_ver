<?PHP
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
// session_unset();
$user_id=$_SESSION["user_id"];

function icone_text($flag)
{
  if($flag == 0)
  {
    return "<a type=\"button\" class=\"timeline-button timeline-comment-button\"></a>";
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
  else if($flag == 4)
  {
    return "<a type=\"button\" class=\"timeline-button timeline-newtrack-button\"></a>";
  }
}

function project_master()
{
  include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
  $user_id=$_SESSION["user_id"];
  $master_sql = "select id from projects where pri_user_id= :user_id";
  $dbq = $pdo->prepare($master_sql);
  $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $dbq->execute();
  $master_cnt = $dbq->rowCount();
  // $dbq->setFetchMode(PDO::FETCH_ASSOC);
  $master_res = $dbq->fetchAll(PDO::FETCH_ASSOC);
  // $master_res = mysql_query($master_sql);
  // $master_cnt=mysql_num_rows($master_res);

  if($master_cnt == 0)
  {
    return "";
  }
  else
  {
    $q = "";
    $i=0;
    foreach ($master_res as $row){
      $master_id = $row['id'];
      $q = "$q or project_id = '$master_id'";
      $i++;
    }
    // for($i=0;$i<$master_cnt;$i++)
    // {
    //   $master_id = mysql_result($master_res,$i,'id');
    //   $q = "$q or project_id = '$master_id'";
    // }
    // echo($q);
    return $q;

  }
}

?>

<div class="content-left">
  <div class="bar-area">
    <img id="timeline-bar-img" src="/images/main/background/bar-timeline.png"></img>
  </div>

  <div class="col-md-12 time-line-group" id="project-list-area-myproject">
    <div id="project-comments" role="form">
      <form class="form-horizontal">
        <?php
          $master_projects = project_master();
          // $sql = "select * from comments where pri_user_id= :user_id :master_projects order by created_at desc;";
          $sql = "select * from comments where pri_user_id= :user_id order by created_at desc;";
          $dbq = $pdo->prepare($sql);
          $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
          // $dbq->bindParam(':master_projects', $master_projects, PDO::PARAM_STR);
          $dbq->execute();
          $cnt = $dbq->rowCount();
          $res = $dbq->fetchAll(PDO::FETCH_ASSOC);
          // $res = mysql_query($sql);
          // $cnt=mysql_num_rows($res);
          $flag = "0000-00-00";

          $i=0;
          foreach ($res as $row){
            $content = $row['CONTENTS'];
            $time = $row['created_at'];
            $commenter_id = $row['pri_user_id'];
            $head_time = substr($time, 0,10);
            $type = $row['TYPE'];
            $project_id = $row['project_id'];
            $icone = icone_text($type);

            if($flag != $head_time)
            {
              $date_form="<div class=\"timeline-date\">$head_time </div>";
              $flag = $head_time;
            }
            else
            {
              $date_form="";
            }

            $sql2 = "select PICTURE, NAME, id from users where id = :commenter_id;";
            $dbq = $pdo->prepare($sql2);
            $dbq->bindParam(':commenter_id', $commenter_id, PDO::PARAM_INT);
            $dbq->execute();
            // $cnt = $dbq->rowCount();
            $res2 = $dbq->fetch(PDO::FETCH_ASSOC);
            // $res2 = mysql_query($sql2);

            $picture_path = $res2['PICTURE'];
            $user_name = $res2['NAME'];
            $comment_user_id = $res2['id'];

            $temp_comment="";

            $sql_temp = "select TITLE from projects where id= :project_id;";
            $dbq = $pdo->prepare($sql_temp);
            $dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
            $dbq->execute();
            $res_temp = $dbq->fetch(PDO::FETCH_ASSOC);
            // $res_temp = mysql_query($sql_temp);
            $project_name = $res_temp['TITLE'];

            if($type==0)
            {
              
              $temp_comment=$content;
              // $content="$user_name 님이 $project_name"."에 댓글을 남겼습니다.";
              $content="'$user_name' scribbled by '$project_name'.";
            }
            else if($type==1){
              
              $content="'$user_name' like '$project_name'.";
            }
            else if($type==2){
              
              $content="'$user_name' had downloaded '$project_name's music.";
            }
            else if($type==3){
              
              $content="'$user_name's track was merged into '$project_name'.";
            }
            else if($type==4){
              
              $content="'$user_name' added track to '$project_name'.";
            }

            echo("  
               <div class=\"form-group\">
                  $date_form
                  <img onclick=\"user_info($comment_user_id);\" class=\"timeline-user-img left\" src=\"/uploads/userImg/$picture_path\"/>
                  <div class=\"col-md-8\">
                    <h4 onclick=\"user_info($comment_user_id);\" class=\"time-line-user-name\">$user_name</h4>
                    <label class=\"time-line-label\" onclick=\"getAlbumInfo($project_id);\">
                      $icone
                      $content
                    </label>
                      <div>
                        $temp_comment
                      </div>
                  </div>

                  <div class=\"right time-line-date\">
                    $time
                  </div>
                </div>
              ");
            $i++;
          }
          // for($i=0;$i<$cnt;$i++)
          // {
          //   $content = mysql_result($res,$i,'CONTENTS');
          //   $time = mysql_result($res,$i,'created_at');
          //   $commenter_id = mysql_result($res,$i, 'pri_user_id');
          //   $head_time = substr($time, 0,10);
          //   $type = mysql_result($res,$i,'TYPE');
          //   $project_id = mysql_result($res,$i,'project_id');
          //   $icone = icone_text($type);

          //   if($flag != $head_time)
          //   {
          //     $date_form="<div class=\"timeline-date\">$head_time </div>";
          //     $flag = $head_time;
          //   }
          //   else
          //   {
          //     $date_form="";
          //   }

          //   $sql2 = "select PICTURE, NAME, id from users where id = $commenter_id;";
          //   $res2 = mysql_query($sql2);

          //   $picture_path = mysql_result($res2,0,'PICTURE');
          //   $user_name = mysql_result($res2,0,'NAME');
          //   $comment_user_id = mysql_result($res2,0,'id');

          //   $temp_comment="";

          //   $sql_temp = "select TITLE from projects where id='$project_id';";
          //   $res_temp = mysql_query($sql_temp);
          //   $project_name = mysql_result($res_temp, 0);

          //   if($type==0)
          //   {
              
          //     $temp_comment=$content;
          //     // $content="$user_name 님이 $project_name"."에 댓글을 남겼습니다.";
          //     $content="'$user_name' scribbled by '$project_name'.";
          //   }
          //   else if($type==1){
              
          //     $content="'$user_name' like '$project_name'.";
          //   }
          //   else if($type==2){
              
          //     $content="'$user_name' had downloaded '$project_name's music.";
          //   }
          //   else if($type==3){
              
          //     $content="'$user_name's track was merged into '$project_name'.";
          //   }
          //   else if($type==4){
              
          //     $content="'$user_name' added track to '$project_name'.";
          //   }

          //   echo("  
          //      <div class=\"form-group\">
          //         $date_form
          //         <img onclick=\"user_info($comment_user_id);\" class=\"timeline-user-img left\" src=\"/uploads/userImg/$picture_path\"/>
          //         <div class=\"col-md-8\">
          //           <h4 onclick=\"user_info($comment_user_id);\" class=\"time-line-user-name\">$user_name</h4>
          //           <label class=\"time-line-label\" onclick=\"getAlbumInfo($project_id);\">
          //             $icone
          //             $content
          //           </label>
          //             <div>
          //               $temp_comment
          //             </div>
          //         </div>

          //         <div class=\"right time-line-date\">
          //           $time
          //         </div>
          //       </div>
          //     ");
          // }
        ?>
      </form>
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
    include($_SERVER["DOCUMENT_ROOT"]."/main/favorite_connect.php");
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
  </ul>
</div>
