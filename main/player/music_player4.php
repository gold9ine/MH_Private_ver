<?PHP
// header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
// session_start();
// session_unset();
?>
<!-- player -->
<!-- <link type="text/css" href="/include/css/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" /> -->
<!-- <link type="text/css" href="/include/css/skin/midnight.black/jplayer.midnight.black.css" rel="stylesheet" /> -->
<link type="text/css" href="/include/css/skin/morning.light/jplayer.morning.light.css" rel="stylesheet" />
<script type="text/javascript" src="/include/js/jquery-1.7.2.min.js"></script>
<script src="/include/js/jquery.jplayer.min.js"></script>

<script src="/include/js/add-on/jplayer.playlist.min.js"></script>
<script src="/include/js/add-on/jquery.jplayer.inspector.js"></script>
<script src="/include/js/popcorn/popcorn.jplayer.js"></script>

<script type="text/javascript">
   var filePath='/uploads/music/';
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
  shuffleTime: 'slow'
},
  swfPath: "/uploads/music",
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
    mp3:"/uploads/music/"+playmp3
});

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
</script>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio">
  <div class="jp-type-single">
    <div class="jp-gui jp-interface">
      <ul class="jp-controls">
        <li>
          <div id="sound-title-artist-area">
          <img id="music-icon">
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
        <li><div id="list-button-area" onclick="listShow();"><img id="jp-list-button"></div></li>
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
          <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
        </ul>
        <ul class="jp-toggles">
          <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
          <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off" style="display: none;">repeat off</a></li>
          <li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
          <li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off" style="display: none;">shuffle off</a></li>
        </ul>
      </div>
    </div>
</div>
