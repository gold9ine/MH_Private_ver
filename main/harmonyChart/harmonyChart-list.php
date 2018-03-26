<?php
  function text_scan($info)
  {
    if(strlen($info) > 30)
    {
      $info = mb_strcut($info, 0,30,'euc-kr');
      $info = "$info"."...";
    }
    return $info;
  }
?>

<div id="project-list-area-harmonychart" class="row">
  <!-- <legend>Project List</legend> -->
  <div id="project-list-harmonychart" class="col-md-3 chart-list-margin">
    <?PHP
    for($i=0; $i<7; $i++){
      // if(strlen($pro_dbPROJECT_INFO[$i]) > 30)
      // {
      //   $pro_dbPROJECT_INFO[$i] = mb_strcut($pro_dbPROJECT_INFO[$i], 0,30,'euc-kr');
      //   $pro_dbPROJECT_INFO[$i] = "$pro_dbPROJECT_INFO[$i]"."...";
      // }
      $pro_dbPROJECT_INFO[$i] = text_scan($pro_dbPROJECT_INFO[$i]);
      echo("
      <div class=\"projects\">
        <h3>$pro_dbTITLE[$i]</h3>
        <a>
          <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"morph img-radius projcet-img pull-left col-md-6\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\"/>
        </a>
        <div class=\"projectinfo-postion col-md-6\">
          <div>
            <label>Creator : </label> $pro_dbARTIST[$i]
          </div>
          <div>
            <label>Genre : </label> $pro_dbGENRE[$i]
          </div>
          <div>
            <label>Like Count : </label> $pro_dbGOOD_COUNT[$i]
          </div>
        </div>
        <br>
        <h5 style=\"clear: both;padding-top: 10px;margin-bottom: 0px;\"> Info : $pro_dbPROJECT_INFO[$i]</h5>
      </div>
      <div class=\"center\">
        <img class=\"under-bar-line under-bar-line-shot\" src=\"/images/main/background/underbar.png\"></img>
      </div>
      ");
    }
    ?>
  </div>
  <div id="project-list-harmonychart" class="col-md-3 chart-list-margin">
    <?PHP
    for($i=7; $i<14; $i++){
      $pro_dbPROJECT_INFO[$i] = text_scan($pro_dbPROJECT_INFO[$i]);
      echo("
      <div class=\"projects\">
        <h3>$pro_dbTITLE[$i]</h3>
        <a>
          <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"morph img-radius projcet-img pull-left col-md-6\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\"/>
        </a>
        <div class=\"projectinfo-postion col-md-6\">
          <div>
            <label>Creator : </label> $pro_dbARTIST[$i]
          </div>
          <div>
            <label>Genre : </label> $pro_dbGENRE[$i]
          </div>
          <div>
            <label>Like Count : </label> $pro_dbGOOD_COUNT[$i]
          </div>
        </div>
        <br>
        <h5 style=\"clear: both;padding-top: 10px;margin-bottom: 0px;\"> Info : $pro_dbPROJECT_INFO[$i]</h5>
      </div>
      <div class=\"center\">
        <img class=\"under-bar-line under-bar-line-shot\" src=\"/images/main/background/underbar.png\"></img>
      </div>
      ");
    }
    ?>
  </div>
  <div id="project-list-harmonychart" class="col-md-3 chart-list-margin">
    <?PHP
    for($i=14; $i<21; $i++){
      $pro_dbPROJECT_INFO[$i] = text_scan($pro_dbPROJECT_INFO[$i]);
      echo("
      <div class=\"projects\">
        <h3>$pro_dbTITLE[$i]</h3>
        <a>
          <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"morph img-radius projcet-img pull-left col-md-6\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\"/>
        </a>
        <div class=\"projectinfo-postion col-md-6\">
          <div>
            <label>Creator : </label> $pro_dbARTIST[$i]
          </div>
          <div>
            <label>Genre : </label> $pro_dbGENRE[$i]
          </div>
          <div>
            <label>Like Count : </label> $pro_dbGOOD_COUNT[$i]
          </div>
        </div>
        <br>
        <h5 style=\"clear: both;padding-top: 10px;margin-bottom: 0px;\"> Info : $pro_dbPROJECT_INFO[$i]</h5>
      </div>
      <div class=\"center\">
        <img class=\"under-bar-line under-bar-line-shot\" src=\"/images/main/background/underbar.png\"></img>
      </div>
      ");
    }
    ?>
  </div>
  <div id="project-list-harmonychart" class="col-md-3 chart-list-margin">
    <?PHP
    for($i=21; $i<28; $i++){
      $pro_dbPROJECT_INFO[$i] = text_scan($pro_dbPROJECT_INFO[$i]);
      echo("
      <div class=\"projects\">
        <h3>$pro_dbTITLE[$i]</h3>
        <a>
          <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"morph img-radius projcet-img pull-left col-md-6\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\"/>
        </a>
        <div class=\"projectinfo-postion col-md-6\">
          <div>
            <label>Creator : </label> $pro_dbARTIST[$i]
          </div>
          <div>
            <label>Genre : </label> $pro_dbGENRE[$i]
          </div>
          <div>
            <label>Like Count : </label> $pro_dbGOOD_COUNT[$i]
          </div>
        </div>
        <br>
        <h5 style=\"clear: both;padding-top: 10px;margin-bottom: 0px;\"> Info : $pro_dbPROJECT_INFO[$i]</h5>
      </div>
      <div class=\"center\">
        <img class=\"under-bar-line under-bar-line-shot\" src=\"/images/main/background/underbar.png\"></img>
      </div>
      ");
    }
    ?>
  </div>
</div>