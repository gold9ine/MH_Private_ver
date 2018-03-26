<div class="bar-area">
  <img id="new-upload-bar-img" src="/images/main/background/bar-harmonyChart.png"></img>
</div>
<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
  <!-- Carousel indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>   
  <!-- Carousel items -->
  <div class="carousel-inner">
    <?php $i=0; ?>
    <div class="active item">
        <div class="caro-left col-md-4">
          <?php 
              echo ("
              <div class=\"\">
                <a class=\"thumbnail albumImg-a-thumbnail \">
                  <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"album_img_left img-radius\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                  <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"album_img_left img-over-info-left\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                    <div class=\"img-over-info-left-content\"> 
                     <h2 class=\"img-over-info-left-content-title\">$pro_dbTITLE[$i]</h2>
                     <h3 class=\"img-over-info-left-content-artist\">$pro_dbARTIST[$i]</h3>
                    </div>
                  </div>
                </a>
              </div>
              ");
              $i++;
            ?>
        </div>
        <div class="caro-right col-md-8">
          <div class="row">
            <?php 
            for($k=0; $k<4; $k++){
              echo ("
              <div class=\"col-md-3\">
                <a class=\"thumbnail albumImg-a-thumbnail\">
                  <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-radius\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                  <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-over-info-right\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                    <div class=\"img-over-info-right-content\"> 
                     <h5 class=\"img-over-info-right-content-artist\">$pro_dbTITLE[$i]</h5>
                    </div>
                  </div>
                </a>
              </div>
              ");
              $i++;
            }
            ?>
          </div>
          <div class="row caro_under">
            <?php
            for($k=0; $k<4; $k++){
              echo ("
              <div class=\"col-md-3\">
                <a class=\"thumbnail albumImg-a-thumbnail\">
                  <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-radius\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                  <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-over-info-right\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                    <div class=\"img-over-info-right-content\"> 
                     <h5 class=\"img-over-info-right-content-artist\">$pro_dbTITLE[$i]</h5>
                    </div>
                  </div>
                </a>
              </div>
              ");
              $i++;
            }
            ?>
          </div>
        </div>
    </div>

    <?php 
    for($j=0; $j<2; $j++){
      echo("
      <div class=\"item\">
        <div class=\"caro-left col-md-4\">
          <div class=\"\">
            <a class=\"thumbnail albumImg-a-thumbnail \">
              <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"album_img_left img-radius\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"album_img_left img-over-info-left\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                  <div class=\"img-over-info-left-content\"> 
                   <h2 class=\"img-over-info-left-content-title\">$pro_dbTITLE[$i]</h2>
                   <h3 class=\"img-over-info-left-content-artist\">$pro_dbARTIST[$i]</h3>
                  </div>
              </div>
            </a>
          </div>
          ");
          $i++;
      echo("
        </div>
        <div class=\"caro-right col-md-8\">
           <div class=\"row\">
            ");
                for($k=0; $k<4; $k++){
                  echo ("
                  <div class=\"col-md-3\">
                    <a class=\"thumbnail albumImg-a-thumbnail\">
                      <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-radius\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                      <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-over-info-right\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                        <div class=\"img-over-info-right-content\"> 
                         <h5 class=\"img-over-info-right-content-artist\">$pro_dbTITLE[$i]</h5>
                        </div>
                      </div>
                    </a>
                  </div>
                  ");
                  $i++;
                }
            echo("
            </div>
            <div class=\"row caro_under\">
             ");
                for($k=0; $k<4; $k++){
                  echo ("
                  <div class=\"col-md-3\">
                    <a class=\"thumbnail albumImg-a-thumbnail\">
                      <img onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-radius\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                      <div onclick=\"getAlbumInfo($pro_dbid[$i]);\" class=\"img-over-info-right\" src=\"/uploads/albumImg/$pro_dbALBUM_IMAGE_PATH[$i]\" alt=\"...\">
                        <div class=\"img-over-info-right-content\"> 
                         <h5 class=\"img-over-info-right-content-artist\">$pro_dbTITLE[$i]</h5>
                        </div>
                      </div>
                    </a>
                  </div>
                  ");
                  $i++;
                }
            echo ("
            </div>
        </div>
      </div>
      ");
    }
    ?>
  </div>

  <!-- Carousel nav -->
  <a class="carousel-control left carousel-side-width" href="#myCarousel" data-slide="prev">
    <!-- <span class="glyphicon glyphicon-chevron-left"></span> -->
    <img class="slide-left-button" src="/images/main/button/slide-left.png">
  </a>
  <a class="carousel-control right carousel-side-width" href="#myCarousel" data-slide="next">
    <!-- <span class="glyphicon glyphicon-chevron-right"></span> -->
    <img class="slide-right-button" src="/images/main/button/slide-right.png">
  </a>
</div>
<div class="center">
  <img class="under-bar-line" src="/images/main/background/underbar.png"></img>
</div>


 

