<?PHP
// header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
// session_start();
// session_unset();
// array_pop($_SESSION['play_pro_title']);//($_SESSION['play_pro_title'][0]);
?>
<!-- player -->
<!-- <link type="text/css" href="/include/css/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" /> -->
<!-- <link type="text/css" href="/include/css/skin/midnight.black/jplayer.midnight.black.css" rel="stylesheet" /> -->
<link type="text/css" href="/include/css/skin/morning.light/jplayer.morning.light.css" rel="stylesheet" />
<!-- <script type="text/javascript" src="/include/js/jquery-1.7.2.min.js"></script> -->
<script type="text/javascript" src="/include/js/jquery-2.1.0.min.js"></script>
<script src="/include/js/jquery.jplayer.min.js"></script>

<script src="/include/js/add-on/jplayer.playlist.min.js"></script>
<script src="/include/js/add-on/jquery.jplayer.inspector.js"></script>
<!-- <script src="/include/js/popcorn/popcorn.jplayer.js"></script> -->

<script type="text/javascript">
// var baseDir = '/mh';
var baseDir = '';
var filePath = baseDir + '/uploads/music/';
  // $(document).ready(function(){
    $(function(){     
var cssSelector = { jPlayer: "#jquery_jplayer_1", cssSelectorAncestor: "#jp_container_1" };
var playlist = [
  {
    title:"The Title",
    artist:"The Artist", // Optional
    // free: Boolean, // Optional - Generates links to the media
    mp3: "filePath"
    // poster: "Poster URL" // Optional
  }
]; // Empty playlist
var options = {
  playlistOptions: {
  autoPlay: true,
  loopOnPrevious: true,
  shuffleOnLoop: true,
  enableRemoveControls: true,
  displayTime: 'slow',
  addTime: 'fast',
  removeTime: 'fast',
  shuffleTime: 'fast'
},
  swfPath:  baseDir + "/uploads/music",
  supplied: "m4a, oga, mp3",
  smoothPlayBar: true,
  keyEnabled: true,
  audioFullScreen: true
};
myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);
myPlaylist.setPlaylist([
]);
});



function play_add(playid, playtitle, playartist, playmp3){
  myPlaylist.add({
    title:playtitle,
    artist:playartist,
    mp3:  baseDir + "/uploads/music/" + playmp3
});
  listShow_temp();
  // session_play_add(playid, playtitle, playartist, playmp3);
}
function play_add_source(playid, playtitle, playartist, playmp3){
  myPlaylist.add({
    title:playmp3,
    artist:playartist,
    mp3:  baseDir + "/uploads/source/" + playmp3
});
  listShow_temp();
  // session_play_add(playid, playtitle, playartist, playmp3);
}
</script>
<script>
function listShow(){
      var listShow = $('#play-list');
      if(listShow.hasClass('playlist_show'))
      { 
        listShow.removeClass('playlist_show');
        listShow.addClass('playlist_none');
      }
      else
      {
        listShow.removeClass('playlist_none');
        listShow.addClass('playlist_show');
      }
}
function listShow_temp(){
  var listShow = $('#play-list');
  listShow.removeClass('playlist_none');
  listShow.addClass('playlist_show');
  var mark = setTimeout("close_list()", 3000); 
}
function close_list(){
  var listShow = $('#play-list');
  listShow.removeClass('playlist_show');
  listShow.addClass('playlist_none');
}

function session_play_add(playid, playtitle, playartist, playmp3){
  var kind='0';
  // var encode = escape(encodeURIComponent(playmp3));
    $(document).ready(function(){
    jQuery.ajax({
    type:"POST",
    // contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    url:  baseDir + "/main/session_play_add.php?a="+playid+"&b="+playtitle+"&c="+playartist+"&d="+playmp3+"&e="+kind,
    // contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    success:function(){
      play_add(playid, playtitle, playartist, playmp3);
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  }); 
}
function session_play_add_source(playid, playtitle, playartist, playmp3){
  var kind='1';
    $(document).ready(function(){
    jQuery.ajax({
    type:"POST",
    url: baseDir + "/main/session_play_add.php?a=" + playid + "&b=" + playtitle + "&c=" + playartist + "&d=" + playmp3 + "&e=" + kind,
    success:function() {
      play_add_source(playid, playtitle, playartist, playmp3);
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  }); 
}
var temp_play_pro_id = new Array();
var temp_play_pro_title = new Array();
var temp_play_pro_artist = new Array();
var temp_play_pro_path = new Array();
var temp_play_source = new Array();
</script>
<?PHP
if ( !isset($_SESSION['play_pro_id']) ) {
    // session_register( $_SESSION['play_pro_id'] = array());
    $_SESSION['play_pro_id'] = array();
}
if ( !isset($_SESSION['play_pro_title']) ) { 
    // session_register( $_SESSION['play_pro_title'] = array());
    $_SESSION['play_pro_title'] = array(); 
}
if ( !isset($_SESSION['play_pro_artist']) ) { 
    // session_register( $_SESSION['play_pro_artist'] = array());
  $_SESSION['play_pro_artist'] = array();
}
if ( !isset($_SESSION['play_pro_path']) ) { 
    // session_register( $_SESSION['play_pro_path'] = array());
    $_SESSION['play_pro_path'] = array(); 
}
if ( !isset($_SESSION['temp_play_source']) ) { 
    // session_register( $_SESSION['temp_play_source'] = array());
    $_SESSION['temp_play_source'] = array(); 
}
// sound=> 0, source=1;

// array_push($_SESSION['play_pro_id'], '17','12');
// array_push($_SESSION['play_pro_title'], 'TRAX','Comfom');
// array_push($_SESSION['play_pro_artist'], 'user2','user1');
// array_push($_SESSION['play_pro_path'], '아스트로비츠-집에오는길.mp3','서태지 - Take Five.mp3');

// array_pop($_SESSION['play_pro_id']);
// array_pop($_SESSION['play_pro_title']);
// array_pop($_SESSION['play_pro_artist']);
// array_pop($_SESSION['play_pro_path']);
$play_count = count($_SESSION['play_pro_id']);
echo ("<script>var play_count='$play_count';var pc=0;</script>");

for($i = 0; $i < $play_count; $i++){
  $temp_play_pro_id = $_SESSION['play_pro_id'][$i];
  $temp_play_pro_title = $_SESSION['play_pro_title'][$i];
  $temp_play_pro_artist = $_SESSION['play_pro_artist'][$i];
  $temp_play_pro_path = $_SESSION['play_pro_path'][$i];
  $temp_play_source = $_SESSION['temp_play_source'][$i];
  echo("<script>temp_play_pro_id[pc]='$temp_play_pro_id';</script>");
  echo("<script>temp_play_pro_title[pc]='$temp_play_pro_title';</script>");
  echo("<script>temp_play_pro_artist[pc]='$temp_play_pro_artist';</script>");
  echo("<script>temp_play_pro_path[pc]='$temp_play_pro_path';</script>");
  echo("<script>temp_play_source[pc]='$temp_play_source';pc++;</script>");
}
?>
<script>
  $(function(){
    for(var i = 0; i < play_count; i++) {
      if(temp_play_source[i] == 0) {
      // console.log(temp_play_source[i]);
        play_add(temp_play_pro_id[i], temp_play_pro_title[i], temp_play_pro_artist[i], temp_play_pro_path[i]);
      }
      else{console.log(temp_play_source[i]);
        // console.log("bbbb");
        play_add_source(temp_play_pro_id[i], temp_play_pro_title[i], temp_play_pro_artist[i], temp_play_pro_path[i]);
      }
  }
  });
</script>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio">
  <div class="jp-type-single">
    <div class="jp-gui jp-interface">
      <ul class="jp-controls">
        <li>
          <div id="sound-title-artist-area">
          <img id="music-icon" src="/images/main/icon/music.png">
          <div id="sound-title-artist" class="jp-title2"></div>
          </div>
        </li>
        <li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
        <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
        <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
        <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
        <li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
        <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
        <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
        <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        <li><div id="list-button-area" onclick="listShow();"><img id="jp-list-button" src="/images/main/player/main_playbar_icon_playlist_over.png"></div></li>
      </ul>
      <div id="play-list"class="jp-playlist playlist_show"><ul></ul></div>
      <div class="jp-progress">
        <div class="jp-seek-bar">
          <div class="jp-play-bar"></div>
        </div>
      </div>
      <div class="jp-volume-bar">
        <div class="jp-volume-bar-value"></div>
      </div>
      <div class="jp-time-holder">
        <div class="jp-current-time"></div>
        <div class="jp-duration"></div>
        <ul class="jp-toggles">
          <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
          <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off" style="display: none;">repeat off</a></li>
          <li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
          <li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off" style="display: none;">shuffle off</a></li>
        </ul>
      </div>
    </div>
</div>
