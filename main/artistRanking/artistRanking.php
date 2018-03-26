<?PHP
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
// session_unset();
?>
<?PHP
// $base_dir = "/home/mh/soma/webpage";
include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-connect.php");
?>

<div class="content-left">
  <div class="bar-area">
    <img id="artist-ranking-bar-img" src="/images/main/background/bar-artistRanking.png"></img>
  </div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#all" data-toggle="tab">All</a></li>
    <li><a href="#jazz" data-toggle="tab">Jazz</a></li>
    <li><a href="#blues" data-toggle="tab">Blues</a></li>
    <li><a href="#rnb" data-toggle="tab">R & B</a></li>
    <li><a href="#hiphop" data-toggle="tab">Hip Hop</a></li>
    <li><a href="#pop" data-toggle="tab">Pop</a></li>
    <li><a href="#rock" data-toggle="tab">Rock</a></li>
    <li><a href="#electronic" data-toggle="tab">Electronic</a></li>
  </ul>

  <div class="tab-content">

    <div class="tab-pane fade in active" id="all">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-all.php"); ?>
    </div>

    <div class="tab-pane fade" id="jazz">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-jazz.php"); ?>
    </div>

    <div class="tab-pane fade" id="blues">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-blues.php"); ?>
    </div>

    <div class="tab-pane fade" id="rnb">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-rnb.php"); ?>
    </div>

    <div class="tab-pane fade" id="hiphop">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-hiphop.php"); ?>
    </div>

    <div class="tab-pane fade" id="pop">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-pop.php"); ?>
    </div>

    <div class="tab-pane fade" id="rock">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-rock.php"); ?>
    </div>

    <div class="tab-pane fade" id="electronic">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/main/artistRanking/artistRanking-electronic.php"); ?>
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