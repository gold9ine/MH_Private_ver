<?PHP
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
// session_unset();
?>
<script>
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_mbp');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_atb');
</script>
<?PHP
// $base_dir = "/home/mh/soma/webpage";
// include("$base_dir/include/config/config.php");
$db_host    = "localhost";
$db_user    = "mh";
$db_password  = "thak2014";
$db_dbname  = "mh";
$db_conn    = mysql_connect($db_host, $db_user, $db_password);
mysql_select_db($db_dbname, $db_conn);
$user_id=$_SESSION["user_id"];
$q="select * from projects where pri_user_id=$user_id;";
$sql_result=mysql_query($q, $db_conn);        
$count=mysql_num_rows($sql_result);
for($i=0; $i<$count; $i++)
{
  $pro_dbid[$i]=mysql_result($sql_result, $i, 'id');
  $pro_dbGOOD_COUNT[$i]=mysql_result($sql_result, $i, 'GOOD_COUNT');
  $pro_dbDOWNLOAD_COUNT[$i]=mysql_result($sql_result, $i, 'DOWNLOAD_COUNT');
  $pro_dbPLAY_COUNT[$i]=mysql_result($sql_result, $i, 'PLAY_COUNT');
  $pro_dbPLAY_TIME[$i]=mysql_result($sql_result, $i, 'PLAY_TIME');

  $pro_dbcreated_at[$i]=mysql_result($sql_result, $i, 'created_at');
  $pro_dbcreated_at_head[$i]=substr($pro_dbcreated_at[$i], 0,10);
  $pro_dbupdated_at[$i]=mysql_result($sql_result, $i, 'updated_at');
  $pro_dbupdated_at_head[$i]=substr($pro_dbupdated_at[$i], 0,10);
  $pro_dbALBUM_IMAGE_PATH[$i]=mysql_result($sql_result, $i, 'ALBUM_IMAGE_PATH');
  $pro_dbTITLE[$i]=mysql_result($sql_result, $i, 'TITLE');
  $pro_dbARTIST[$i]=mysql_result($sql_result, $i, 'ARTIST');

  $pro_dbPROJECT_INFO[$i]=mysql_result($sql_result, $i, 'PROJECT_INFO');
  $pro_dbmeta_num[$i]=mysql_result($sql_result, $i, 'meta_id');
  $pro_dbpri_user_id[$i]=mysql_result($sql_result, $i, 'pri_user_id');
  $pro_dbGENRE[$i]=mysql_result($sql_result, $i, 'GENRE');
}
?>
<div class="content-left-mp">
  <div class="bar-area">
    <img id="myProject-bar-img"></img>
  </div>

  <div class="panel-group" id="accordion">
    <?php $i=0;
    echo("
    <div class=\"panel panel-default\">
      <div class=\"panel-heading pi-panel-heading\">
        <h4 class=\"panel-title\">
          <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#$i\">
            <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-radius projcet-img\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\"/>
            <div class=\"mp-date-area right col-md-4\">
              <div>created date : $pro_dbcreated_at_head[$i]</div>
              <div>recent update : $pro_dbupdated_at_head[$i]</div>
            </div>
            <div class=\"mp-title-area right col-md-6\">
              <div class=\"mp-title\"><h4>$pro_dbTITLE[$i]</h4></div>
              <div class=\"mp-info\">$pro_dbPROJECT_INFO[$i]</div>
            </div>
          </a>
        </h4>
      </div>
      <div id=\"$i\" class=\"panel-collapse collapse in\">
        <div class=\"panel-body\">
          
        </div>
      </div>
    </div>
    ");
    for($i=1; $i<$count; $i++){
    echo("
    <div class=\"panel panel-default\">
      <div class=\"panel-heading pi-panel-heading\">
        <h4 class=\"panel-title\">
          <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#$i\">
            <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-radius projcet-img\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\"/>
            <div class=\"mp-date-area right col-md-4\">
              <div>created date : $pro_dbcreated_at_head[$i]</div>
              <div>recent update : $pro_dbupdated_at_head[$i]</div>
            </div>
            <div class=\"mp-title-area right col-md-6\">
              <div class=\"mp-title\"><h4>$pro_dbTITLE[$i]</h4></div>
              <div class=\"mp-info\">$pro_dbPROJECT_INFO[$i]</div>
            </div>
          </a>
        </h4>
      </div>
      <div id=\"$i\" class=\"panel-collapse collapse\">
        <div class=\"panel-body\">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
    ");}?>
  </div>
</div>

<div class="side-area-panel panel panel-default right">
  <iframe src='/main/myProject/create-project_frame.php' class="create-project-frame" id="create-project-frame" name='create-project-frame' scrolling=no></iframe>
</div>

<div class="side-area-panel panel panel-default right" style="margin-top: 0px;">
  <!-- Default panel contents -->
  <div class="side-banner">
    <div class="myproject-mp-banner"></div>
  </div>

  <!-- List group -->
  <ul id="list-group-item" class="list-group">
    <?php
    for($i=0; $i<$count; $i++){
    echo("
    <li class=\"list-group-item\">
      <div class=\"row\">
        <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"myproject-title col-md-8\">$pro_dbTITLE[$i]</div>
        <div onclick=\"user_info($pro_dbpri_user_id[$i]);\" class=\"myproject-artist col-md-4\">$pro_dbARTIST[$i]</div>
      </div>
    </li>
    ");
     }
    ?>
  </ul>
</div>

<div class="side-area-panel panel panel-default right" style="margin-top: 0px;">
  <!-- Default panel contents -->
  <div class="side-banner">
    <div class="myproject-pp-banner"></div>
  </div>

  <!-- List group -->
  <ul id="list-group-item" class="list-group">
    <?php
    // include("/home/mh/soma/webpage/main/favorite_connect.php");
    $q2="select sources.*, projects.ARTIST as ARTIST, projects.TITLE as TITLE, projects.pri_user_id as creator_id from sources,projects where sources.project_id=projects.id and sources.pri_user_id=$user_id;";
    $sql_result2=mysql_query($q2, $db_conn);        
    $count2=mysql_num_rows($sql_result2);
    for($i=0; $i<$count2; $i++){
      $pro_dbid[$i]=mysql_result($sql_result2, $i, 'project_id');
      $pro_dbTITLE[$i]=mysql_result($sql_result2, $i, 'TITLE');
      $pro_dbcreator_id[$i]=mysql_result($sql_result2, $i, 'creator_id');
      $pro_dbARTIST[$i]=mysql_result($sql_result2, $i, 'ARTIST');
    }
    for($i=0; $i<$count2; $i++){
    echo("
    <li class=\"list-group-item\">
      <div class=\"row\">
        <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"participated-title col-md-8\">$pro_dbTITLE[$i]</div>
        <div onclick=\"user_info($pro_dbcreator_id[$i]);\" class=\"myproject-artist col-md-4\">$pro_dbARTIST[$i]</div>
      </div>
    </li>
    ");
     }
    ?>
  </ul>
</div>