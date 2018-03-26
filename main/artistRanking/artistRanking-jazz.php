<br>
<?php $i=0; ?>
<table class="table table-hover">
  <tr class="rank-area-row">
    <td class="rank-td1" style="padding-left: 0; padding-right: 0;"><div class="rank-1"></div></td>
    <td class="rank-td2"><?php echo("<img onclick=\"getAlbumInfo($jazz_pro_dbid[$i]);\" class=\"rank-projcet-img\" src=\"/uploads/albumImg/$jazz_pro_dbALBUM_IMAGE_PATH[$i]\"/>");?></td>
    <td>
      <?php echo("
      <a type=\"button\" onclick=\"session_play_add($jazz_pro_dbid[$i], '$jazz_pro_dbTITLE[$i]', '$jazz_pro_dbARTIST[$i]', '$jazz_pro_dbSOUND_PATH[$i]')\" class=\"rank-button rank-play-add-button\"></a>
      <a href=\"/uploads/music/$jazz_pro_dbSOUND_PATH[$i]\" download=\"$jazz_pro_dbSOUND_PATH[$i]\" type=\"button\" class=\"rank-button rank-download-button\"></a>
      <a type=\"button\" onclick=\"like_project($jazz_pro_dbid[$i])\" class=\"rank-button rank-like-button\"></a>
      "); ?>
      <br>
      <div class="rank-title"><h3><?php echo("$jazz_pro_dbTITLE[$i] - $jazz_pro_dbARTIST[$i]"); ?></h3></div>
      <div class="rank-info"><h4><?php echo("$jazz_pro_dbSOUND_PATH[$i]"); ?></h4></div>
      <div class="rank-info"><h3><?php echo("$jazz_pro_dbPROJECT_INFO[$i]"); ?></h3></div>
    </td>
    <?php
    $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    $q_temp="select * from projects where pri_user_id= :temp_pro_dbid order by rand() limit 4;";
    $dbq = $pdo->prepare($q_temp);
    $dbq->bindParam(':temp_pro_dbid', $temp_pro_dbid, PDO::PARAM_INT);
    $dbq->execute();
    $q_temp_count = $dbq->rowCount();
    $q_temp_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    $j=0;
    foreach ($q_temp_result as $row){
      $re_pro_dbid[$j]=$row['id'];
      $re_pro_dbALBUM_IMAGE_PATH[$j]=$row['ALBUM_IMAGE_PATH'];
      $j++;
    }
    // $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    // $q_temp="select * from projects where pri_user_id='$temp_pro_dbid' order by rand() limit 4;";
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    // for($j=0; $j<$q_temp_count; $j++)
    // {
    //   $re_pro_dbid[$j]=mysql_result($q_temp_result, $j, 'id');
    //   $re_pro_dbALBUM_IMAGE_PATH[$j]=mysql_result($q_temp_result, $j, 'ALBUM_IMAGE_PATH');
    // }
    ?>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php $j=0; echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
    </td>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); ?>
      </div>
    </td>
  </tr>
  <?php $i++; ?>

    <tr class="rank-area-row">
    <td class="rank-td1" style="padding-left: 0; padding-right: 0;"><div class="rank-2"></div></td>
    <td class="rank-td2"><?php echo("<img onclick=\"getAlbumInfo($jazz_pro_dbid[$i]);\" class=\"rank-projcet-img\" src=\"/uploads/albumImg/$jazz_pro_dbALBUM_IMAGE_PATH[$i]\"/>");?></td>
    <td>
      <?php echo("
      <a type=\"button\" onclick=\"session_play_add($jazz_pro_dbid[$i], '$jazz_pro_dbTITLE[$i]', '$jazz_pro_dbARTIST[$i]', '$jazz_pro_dbSOUND_PATH[$i]')\" class=\"rank-button rank-play-add-button\"></a>
      <a href=\"/uploads/music/$jazz_pro_dbSOUND_PATH[$i]\" download=\"$jazz_pro_dbSOUND_PATH[$i]\" type=\"button\" class=\"rank-button rank-download-button\"></a>
      <a type=\"button\" onclick=\"like_project($jazz_pro_dbid[$i])\" class=\"rank-button rank-like-button\"></a>
      "); ?>
      <br>
      <div class="rank-title"><h3><?php echo("$jazz_pro_dbTITLE[$i] - $jazz_pro_dbARTIST[$i]"); ?></h3></div>
      <div class="rank-info"><h4><?php echo("$jazz_pro_dbSOUND_PATH[$i]"); ?></h4></div>
      <div class="rank-info"><h3><?php echo("$jazz_pro_dbPROJECT_INFO[$i]"); ?></h3></div>
    </td>
    <?php
    $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    $q_temp="select * from projects where pri_user_id= :temp_pro_dbid order by rand() limit 4;";
    $dbq = $pdo->prepare($q_temp);
    $dbq->bindParam(':temp_pro_dbid', $temp_pro_dbid, PDO::PARAM_INT);
    $dbq->execute();
    $q_temp_count = $dbq->rowCount();
    $q_temp_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    $j=0;
    foreach ($q_temp_result as $row){
      $re_pro_dbid[$j]=$row['id'];
      $re_pro_dbALBUM_IMAGE_PATH[$j]=$row['ALBUM_IMAGE_PATH'];
      $j++;
    }
    // $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    // $q_temp="select * from projects where pri_user_id='$temp_pro_dbid' order by rand() limit 4;";
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    // for($j=0; $j<$q_temp_count; $j++)
    // {
    //   $re_pro_dbid[$j]=mysql_result($q_temp_result, $j, 'id');
    //   $re_pro_dbALBUM_IMAGE_PATH[$j]=mysql_result($q_temp_result, $j, 'ALBUM_IMAGE_PATH');
    // }
    ?>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php $j=0; echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
    </td>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); ?>
      </div>
    </td>
  </tr>
  <?php $i++; ?>

    <tr class="rank-area-row">
    <td class="rank-td1" style="padding-left: 0; padding-right: 0;"><div class="rank-3"></div></td>
    <td class="rank-td2"><?php echo("<img onclick=\"getAlbumInfo($jazz_pro_dbid[$i]);\" class=\"rank-projcet-img\" src=\"/uploads/albumImg/$jazz_pro_dbALBUM_IMAGE_PATH[$i]\"/>");?></td>
    <td>
      <?php echo("
      <a type=\"button\" onclick=\"session_play_add($jazz_pro_dbid[$i], '$jazz_pro_dbTITLE[$i]', '$jazz_pro_dbARTIST[$i]', '$jazz_pro_dbSOUND_PATH[$i]')\" class=\"rank-button rank-play-add-button\"></a>
      <a href=\"/uploads/music/$jazz_pro_dbSOUND_PATH[$i]\" download=\"$jazz_pro_dbSOUND_PATH[$i]\" type=\"button\" class=\"rank-button rank-download-button\"></a>
      <a type=\"button\" onclick=\"like_project($jazz_pro_dbid[$i])\" class=\"rank-button rank-like-button\"></a>
      "); ?>
      <br>
      <div class="rank-title"><h3><?php echo("$jazz_pro_dbTITLE[$i] - $jazz_pro_dbARTIST[$i]"); ?></h3></div>
      <div class="rank-info"><h4><?php echo("$jazz_pro_dbSOUND_PATH[$i]"); ?></h4></div>
      <div class="rank-info"><h3><?php echo("$jazz_pro_dbPROJECT_INFO[$i]"); ?></h3></div>
    </td>
    <?php
    $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    $q_temp="select * from projects where pri_user_id= :temp_pro_dbid order by rand() limit 4;";
    $dbq = $pdo->prepare($q_temp);
    $dbq->bindParam(':temp_pro_dbid', $temp_pro_dbid, PDO::PARAM_INT);
    $dbq->execute();
    $q_temp_count = $dbq->rowCount();
    $q_temp_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    $j=0;
    foreach ($q_temp_result as $row){
      $re_pro_dbid[$j]=$row['id'];
      $re_pro_dbALBUM_IMAGE_PATH[$j]=$row['ALBUM_IMAGE_PATH'];
      $j++;
    }
    // $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    // $q_temp="select * from projects where pri_user_id='$temp_pro_dbid' order by rand() limit 4;";
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    // for($j=0; $j<$q_temp_count; $j++)
    // {
    //   $re_pro_dbid[$j]=mysql_result($q_temp_result, $j, 'id');
    //   $re_pro_dbALBUM_IMAGE_PATH[$j]=mysql_result($q_temp_result, $j, 'ALBUM_IMAGE_PATH');
    // }
    ?>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php $j=0; echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
    </td>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); ?>
      </div>
    </td>
  </tr>
  <?php $i++; ?>

    <tr class="rank-area-row">
    <td class="rank-td1" style="padding-left: 0; padding-right: 0;"><div class="rank-4"></div></td>
    <td class="rank-td2"><?php echo("<img onclick=\"getAlbumInfo($jazz_pro_dbid[$i]);\" class=\"rank-projcet-img\" src=\"/uploads/albumImg/$jazz_pro_dbALBUM_IMAGE_PATH[$i]\"/>");?></td>
    <td>
      <?php echo("
      <a type=\"button\" onclick=\"session_play_add($jazz_pro_dbid[$i], '$jazz_pro_dbTITLE[$i]', '$jazz_pro_dbARTIST[$i]', '$jazz_pro_dbSOUND_PATH[$i]')\" class=\"rank-button rank-play-add-button\"></a>
      <a href=\"/uploads/music/$jazz_pro_dbSOUND_PATH[$i]\" download=\"$jazz_pro_dbSOUND_PATH[$i]\" type=\"button\" class=\"rank-button rank-download-button\"></a>
      <a type=\"button\" onclick=\"like_project($jazz_pro_dbid[$i])\" class=\"rank-button rank-like-button\"></a>
      "); ?>
      <br>
      <div class="rank-title"><h3><?php echo("$jazz_pro_dbTITLE[$i] - $jazz_pro_dbARTIST[$i]"); ?></h3></div>
      <div class="rank-info"><h4><?php echo("$jazz_pro_dbSOUND_PATH[$i]"); ?></h4></div>
      <div class="rank-info"><h3><?php echo("$jazz_pro_dbPROJECT_INFO[$i]"); ?></h3></div>
    </td>
    <?php
    $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    $q_temp="select * from projects where pri_user_id= :temp_pro_dbid order by rand() limit 4;";
    $dbq = $pdo->prepare($q_temp);
    $dbq->bindParam(':temp_pro_dbid', $temp_pro_dbid, PDO::PARAM_INT);
    $dbq->execute();
    $q_temp_count = $dbq->rowCount();
    $q_temp_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    $j=0;
    foreach ($q_temp_result as $row){
      $re_pro_dbid[$j]=$row['id'];
      $re_pro_dbALBUM_IMAGE_PATH[$j]=$row['ALBUM_IMAGE_PATH'];
      $j++;
    }
    // $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    // $q_temp="select * from projects where pri_user_id='$temp_pro_dbid' order by rand() limit 4;";
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    // for($j=0; $j<$q_temp_count; $j++)
    // {
    //   $re_pro_dbid[$j]=mysql_result($q_temp_result, $j, 'id');
    //   $re_pro_dbALBUM_IMAGE_PATH[$j]=mysql_result($q_temp_result, $j, 'ALBUM_IMAGE_PATH');
    // }
    ?>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php $j=0; echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
    </td>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); ?>
      </div>
    </td>
  </tr>
  <?php $i++; ?>

    <tr class="rank-area-row">
    <td class="rank-td1" style="padding-left: 0; padding-right: 0;"><div class="rank-5"></div></td>
    <td class="rank-td2"><?php echo("<img onclick=\"getAlbumInfo($jazz_pro_dbid[$i]);\" class=\"rank-projcet-img\" src=\"/uploads/albumImg/$jazz_pro_dbALBUM_IMAGE_PATH[$i]\"/>");?></td>
    <td>
      <?php echo("
      <a type=\"button\" onclick=\"session_play_add($jazz_pro_dbid[$i], '$jazz_pro_dbTITLE[$i]', '$jazz_pro_dbARTIST[$i]', '$jazz_pro_dbSOUND_PATH[$i]')\" class=\"rank-button rank-play-add-button\"></a>
      <a href=\"/uploads/music/$jazz_pro_dbSOUND_PATH[$i]\" download=\"$jazz_pro_dbSOUND_PATH[$i]\" type=\"button\" class=\"rank-button rank-download-button\"></a>
      <a type=\"button\" onclick=\"like_project($jazz_pro_dbid[$i])\" class=\"rank-button rank-like-button\"></a>
      "); ?>
      <br>
      <div class="rank-title"><h3><?php echo("$jazz_pro_dbTITLE[$i] - $jazz_pro_dbARTIST[$i]"); ?></h3></div>
      <div class="rank-info"><h4><?php echo("$jazz_pro_dbSOUND_PATH[$i]"); ?></h4></div>
      <div class="rank-info"><h3><?php echo("$jazz_pro_dbPROJECT_INFO[$i]"); ?></h3></div>
    </td>
    <?php
    $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    $q_temp="select * from projects where pri_user_id= :temp_pro_dbid order by rand() limit 4;";
    $dbq = $pdo->prepare($q_temp);
    $dbq->bindParam(':temp_pro_dbid', $temp_pro_dbid, PDO::PARAM_INT);
    $dbq->execute();
    $q_temp_count = $dbq->rowCount();
    $q_temp_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    $j=0;
    foreach ($q_temp_result as $row){
      $re_pro_dbid[$j]=$row['id'];
      $re_pro_dbALBUM_IMAGE_PATH[$j]=$row['ALBUM_IMAGE_PATH'];
      $j++;
    }
    // $temp_pro_dbid=$jazz_pro_dbpri_user_id[$i];
    // $q_temp="select * from projects where pri_user_id='$temp_pro_dbid' order by rand() limit 4;";
    // $q_temp_result=mysql_query($q_temp, $db_conn);          
    // $q_temp_count=mysql_num_rows($q_temp_result);
    // for($j=0; $j<$q_temp_count; $j++)
    // {
    //   $re_pro_dbid[$j]=mysql_result($q_temp_result, $j, 'id');
    //   $re_pro_dbALBUM_IMAGE_PATH[$j]=mysql_result($q_temp_result, $j, 'ALBUM_IMAGE_PATH');
    // }
    ?>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php $j=0; echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
    </td>
    <td class="rank-td3">
      <div class="rank-td4">
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); $j++; ?>
      </div>
      <div>
        <?php echo("<img onclick=\"getAlbumInfo($re_pro_dbid[$j]);\" class=\"rank-projcet-img-small\" src=\"/uploads/albumImg/$re_pro_dbALBUM_IMAGE_PATH[$j]\"/>"); ?>
      </div>
    </td>
  </tr>
</table>