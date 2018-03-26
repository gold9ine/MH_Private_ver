<?php include($_SERVER["DOCUMENT_ROOT"]."/main/search/search_connect.php"); ?>
<div class="content-left-mp">
  <div class="bar-area searchbar-bottom-magin" style="margin-top: 90px;">
    <h3 class="search-key-result"><a class="mic-icon"></a>"<label class="search-key"><?PHP echo($searchKey);?></label>" on the search results.</h3>
  </div>

  <div class="bar-area searchbar-bottom-magin"  style="margin-top: 40px;">
    <img id="searchbar-project"></img>
  </div>
  <div class="col-md-10 col-md-offset-2">
    <table id="search-table-project" class="search-table table table-hover">
      <tr class="search-table-tr1">
        <td class="search-table-td1"></td>
        <td class="search-table-td2">Project Name</td>
        <td class="search-table-td3">Uploader</td>
        <td class="search-table-td4">Track</td>
        <td class="search-table-td5 search-table-td-icon">Play</td>
        <td class="search-table-td6 search-table-td-icon">Download</td>
        <td class="search-table-td7 search-table-td-icon">Like</td>
      </tr>

      <?php 
      for($i=0; $i<$count1; $i++){$j=$i+1;echo("
        <tr class=\"search-table-tr\">
          <td class=\"search-table-td1\">$j</td>
          <td class=\"search-table-td2\" onclick=\"getAlbumInfo($search_pro_dbid[$i]);\">$search_pro_dbTITLE[$i]</td>
          <td class=\"search-table-td3\" onclick=\"user_info($search_pro_dbpri_user_id[$i]);\">$search_pro_dbARTIST[$i]</td>
          <td class=\"search-table-td4\">$search_pro_dbSOUND_PATH[$i]</td>
          <td class=\"search-table-td5 search-table-td-icon\"><a type=\"button\" onclick=\"session_play_add($search_pro_dbid[$i], '$search_pro_dbTITLE[$i]', '$search_pro_dbARTIST[$i]', '$search_pro_dbSOUND_PATH[$i]')\" class=\"favoritelist-button rank-play-add-button\"></a></td>
          <td class=\"search-table-td6 search-table-td-icon\"><a href=\"/uploads/music/$search_pro_dbSOUND_PATH[$i]\" download=\"$search_pro_dbSOUND_PATH[$i]\" type=\"button\" class=\"favoritelist-button rank-download-button\"></a></td>
          <td class=\"search-table-td7 search-table-td-icon\"><a type=\"button\" onclick=\"like_project($search_pro_dbid[$i])\" class=\"favoritelist-button rank-like-button\"></a></td>
        </tr>
      "); $j=0;}?>
      <?php 
      for($i=0; $i<$count1_r; $i++){$j=$i+1;echo("
        <tr class=\"search-table-tr\">
          <td class=\"search-table-td1\">$j</td>
          <td class=\"search-table-td2\" onclick=\"getAlbumInfo($search_pro_dbid[$i]);\">$search_pro_dbTITLE[$i]</td>
          <td class=\"search-table-td3\" onclick=\"user_info($search_pro_dbpri_user_id[$i]);\">$search_pro_dbARTIST[$i]</td>
          <td class=\"search-table-td4\"></td>
          <td class=\"search-table-td5 search-table-td-icon\"><a style=\"cursor: auto;\" type=\"button\" class=\"favoritelist-button rank-play-add-button\"></a></td>
          <td class=\"search-table-td6 search-table-td-icon\"><a style=\"cursor: auto;\" type=\"button\" class=\"favoritelist-button rank-download-button\"></a></td>
          <td class=\"search-table-td7 search-table-td-icon\"><a style=\"cursor: auto;\" type=\"button\" class=\"favoritelist-button rank-like-button\"></a></td>
        </tr>
      "); $j=0;}?>
    </table>
  </div>

  <div class="bar-area searchbar-bottom-magin">
    <img id="searchbar-track"></img>
  </div>
    <div class="col-md-10 col-md-offset-2">
    <table id="search-table-track" class="search-table table table-hover">
      <tr class="search-table-tr2">
        <td class="search-table-td1"></td>
        <td class="search-table-td2">Project Name</td>
        <td class="search-table-td3">Uploader</td>
        <td class="search-table-td4">Track</td>
        <td class="search-table-td5 search-table-td-icon">Play</td>
        <td class="search-table-td6 search-table-td-icon">Download</td>
        <td class="search-table-td7 search-table-td-icon">Like</td>
      </tr>
      <?php 
      for($i=0; $i<$count2; $i++){$j=$i+1;echo("
        <tr class=\"search-table-tr\">
          <td class=\"search-table-td1\">$j</td>
          <td class=\"search-table-td2\" onclick=\"getAlbumInfo($search_sound_dbid[$i]);\">$search_sound_dbTITLE[$i]</td>
          <td class=\"search-table-td3\" onclick=\"user_info($search_sound_dbpri_user_id[$i]);\">$search_sound_dbARTIST[$i]</td>
          <td class=\"search-table-td4\">$search_sound_dbSOUND_PATH[$i]</td>
          <td class=\"search-table-td5 search-table-td-icon\"><a type=\"button\" onclick=\"session_play_add($search_sound_dbid[$i], '$search_sound_dbTITLE[$i]', '$search_sound_dbARTIST[$i]', '$search_sound_dbSOUND_PATH[$i]')\" class=\"favoritelist-button rank-play-add-button\"></a></td>
          <td class=\"search-table-td6 search-table-td-icon\"><a href=\"/uploads/music/$search_sound_dbSOUND_PATH[$i]\" download=\"$search_sound_dbSOUND_PATH[$i]\" type=\"button\" class=\"favoritelist-button rank-download-button\"></a></td>
          <td class=\"search-table-td7 search-table-td-icon\"><a type=\"button\" onclick=\"like_project($search_sound_dbid[$i])\" class=\"favoritelist-button rank-like-button\"></a></td>
        </tr>
      "); $j=0;}?>
      <?php 
      for($i=0; $i<$count3; $i++){$j=$i+1;echo("
        <tr class=\"search-table-tr\">
          <td class=\"search-table-td1\">$j</td>
          <td class=\"search-table-td2\" onclick=\"getAlbumInfo($search_source_dbid[$i]);\">$search_source_dbTITLE[$i]</td>
          <td class=\"search-table-td3\" onclick=\"user_info($search_source_dbpri_user_id[$i]);\">$search_source_dbARTIST[$i]</td>
          <td class=\"search-table-td4\">$search_source_dbSOUND_PATH[$i]</td>
          <td class=\"search-table-td5 search-table-td-icon\"><a type=\"button\" onclick=\"session_play_add_source($search_source_dbid[$i], '$search_source_dbTITLE[$i]', '$search_source_dbARTIST[$i]', '$search_source_dbSOUND_PATH[$i]')\" class=\"favoritelist-button rank-play-add-button\"></a></td>
          <td class=\"search-table-td6 search-table-td-icon\"><a href=\"/uploads/source/$search_source_dbSOUND_PATH[$i]\" download=\"$search_source_dbSOUND_PATH[$i]\" type=\"button\" class=\"favoritelist-button rank-download-button\"></a></td>
          <td class=\"search-table-td7 search-table-td-icon\"><a type=\"button\" onclick=\"like_project($search_source_dbid[$i])\" class=\"favoritelist-button rank-like-button\"></a></td>
        </tr>
      "); $j=0;}?>
    </table>
  </div>

  <div class="bar-area searchbar-bottom-magin">
    <img id="searchbar-artist"></img>
  </div>
  <div class="col-md-10 col-md-offset-2">
    <table id="search-table-artist" class="search-table table table-hover">
      <tr class="search-table-tr4">
        <td class="search-table-td1"></td>
        <td class="search-table-td2">Project Name</td>
        <td class="search-table-td3">Uploader</td>
        <td class="search-table-td4">Track</td>
        <td class="search-table-td5 search-table-td-icon">Play</td>
        <td class="search-table-td6 search-table-td-icon">Download</td>
        <td class="search-table-td7 search-table-td-icon">Like</td>
      </tr>
      <?php 
      for($i=0; $i<$count4; $i++){$j=$i+1;echo("
        <tr class=\"search-table-tr\">
          <td class=\"search-table-td1\">$j</td>
          <td class=\"search-table-td2\" onclick=\"getAlbumInfo($search_artist_dbid[$i]);\">$search_artist_dbTITLE[$i]</td>
          <td class=\"search-table-td3\" onclick=\"user_info($search_artist_dbpri_user_id[$i]);\">$search_artist_dbARTIST[$i]</td>
          <td class=\"search-table-td4\">$search_artist_dbSOUND_PATH[$i]</td>
          <td class=\"search-table-td5 search-table-td-icon\"><a type=\"button\" onclick=\"session_play_add($search_artist_dbid[$i], '$search_artist_dbTITLE[$i]', '$search_artist_dbARTIST[$i]', '$search_artist_dbSOUND_PATH[$i]')\" class=\"favoritelist-button rank-play-add-button\"></a></td>
          <td class=\"search-table-td6 search-table-td-icon\"><a href=\"/uploads/music/$search_artist_dbSOUND_PATH[$i]\" download=\"$search_artist_dbSOUND_PATH[$i]\" type=\"button\" class=\"favoritelist-button rank-download-button\"></a></td>
          <td class=\"search-table-td7 search-table-td-icon\"><a type=\"button\" onclick=\"like_project($search_artist_dbid[$i])\" class=\"favoritelist-button rank-like-button\"></a></td>
        </tr>
      "); $j=0;}?>
      <?php 
      for($i=0; $i<$count4_r; $i++){$j=$i+1;echo("
        <tr class=\"search-table-tr\">
          <td class=\"search-table-td1\">$j</td>
          <td class=\"search-table-td2\" onclick=\"getAlbumInfo($search_artist_dbid[$i]);\">$search_artist_dbTITLE[$i]</td>
          <td class=\"search-table-td3\" onclick=\"user_info($search_artist_dbpri_user_id[$i]);\">$search_artist_dbARTIST[$i]</td>
          <td class=\"search-table-td4\"></td>
          <td class=\"search-table-td5 search-table-td-icon\"><a style=\"cursor: auto;\" type=\"button\" class=\"favoritelist-button rank-play-add-button\"></a></td>
          <td class=\"search-table-td6 search-table-td-icon\"><a style=\"cursor: auto;\" type=\"button\" class=\"favoritelist-button rank-download-button\"></a></td>
          <td class=\"search-table-td7 search-table-td-icon\"><a style=\"cursor: auto;\" type=\"button\"  class=\"favoritelist-button rank-like-button\"></a></td>
        </tr>
      "); $j=0;}?>
    </table>
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