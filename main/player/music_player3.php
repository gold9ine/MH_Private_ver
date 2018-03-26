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
   var filePath='기억의 습작 - 전람회 - 건축학개론OST.mp3';
  $(document).ready(function(){

  //   $("#jquery_jplayer_1").jPlayer({
  //     ready: function () {
  //       $(this).jPlayer("setMedia", {
  //         title: "Bubble",
  //         // m4a: "http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
  //         // oga: "http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
  //         // m4a: "/uploads/music/기억의 습작 - 전람회 - 건축학개론OST.mp3",
  //         // oga: "/uploads/music/기억의 습작 - 전람회 - 건축학개론OST.mp3"
  //         mp3: "/uploads/music/" + filePath
  //       });
  //     },
  //     swfPath: "/uploads/music",
  //     supplied: "m4a, oga, mp3",
  //     smoothPlayBar: true,
  //     keyEnabled: true,
  //     audioFullScreen: true // Allows the audio poster to go full screen via keyboard

  //   });
  // });

// var myPlaylist = new jPlayerPlaylist({cssSelector}, [playlist], {options});
var cssSelector = { jPlayer: "#jquery_jplayer_1", cssSelectorAncestor: "#jp_container_1" };
var playlist = [
  {
    title:"The Title",
    artist:"The Artist", // Optional
    free: Boolean, // Optional - Generates links to the media
    mp3: "/uploads/music/" + filePath
    // poster: "Poster URL" // Optional
  }
]; // Empty playlist
var options = {
  playlistOptions: {
  autoPlay: false,
  loopOnPrevious: false,
  shuffleOnLoop: true,
  enableRemoveControls: false,
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
var myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);
myPlaylist.setPlaylist([
  {
    title:"비와당신",
    artist:"럼블피쉬",
    mp3:"/uploads/music/럼블피쉬-비와당신.mp3   "
    // oga:"/uploads/music/기억의 습작 - 전람회 - 건축학개론OST.mp3"
    // poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
  },
  {
    title:"서울의달",
    artist:"김건모",
    free: true,
    mp3:"/uploads/music/김건모 서울의달.mp3 "
    // oga:"/uploads/music/기억의 습작 - 전람회 - 건축학개론OST.mp3"
    // poster: "http://www.jplayer.org/audio/poster/Miaow_640x360.png"
  }
]);
myPlaylist.add({
  title:"집에오는길",
  artist:"아스트로비츠",
  mp3:"/uploads/music/아스트로비츠-집에오는길.mp3 "
  // oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg"
  // poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
});

// if( myPlaylist.remove(0) ) {
//   alert("1st item removed successfully!");
// } else {
//   alert("Failed to remove 1st item!"); // A remove operation is being animated.
// }
var controls = myPlaylist.option("enableRemoveControls"); // Get option
myPlaylist.option("enableRemoveControls", true); // Set option
});
</script>

<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio">
  <div class="jp-type-single">
    <div class="jp-gui jp-interface">
      <ul class="jp-controls">
        <li>
          <div id="sound-title-artist-area">
          <img id="music-icon">
          <div id="sound-title-artist" class="jp-title"></div>
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
        <li><div id="good-button-area"><img id="jp-good-button"></div></li>
        <li><div id="list-button-area"><img id="jp-list-button"></div></li>
      </ul>
      <div class="jp-playlist">
        <ul>
          <li></li> <!-- Empty <li> so your HTML conforms with the W3C spec -->
          <li>
  <div>
    <a class="jp-playlist-item-remove" href="javascript:;">&times;</a>
    <span class="jp-free-media">
      (<a tabindex="1" href="http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3" class="jp-playlist-item-free">mp3</a> )
    </span>
    <a tabindex="1" class="jp-playlist-item" href="javascript:;">Cro Magnon Man <span class="jp-artist">by The Stark Palace</span></a>
  </div>
</li>
        </ul>
          <!-- <ul style="display: block;"><li class="jp-playlist-current"><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item jp-playlist-current" tabindex="1">Cro Magnon Man</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Your Face</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Cyber Sonnet</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Tempered Song</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Hidden</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><span class="jp-free-media">(<a class="jp-playlist-item-free" href="http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3" tabindex="1">mp3</a> | <a class="jp-playlist-item-free" href="http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg" tabindex="1">oga</a>)</span><a href="javascript:;" class="jp-playlist-item" tabindex="1">Lentement</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Lismore</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">The Separation</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Beside Me</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><span class="jp-free-media">(<a class="jp-playlist-item-free" href="http://www.jplayer.org/audio/mp3/Miaow-07-Bubble.mp3" tabindex="1">mp3</a> | <a class="jp-playlist-item-free" href="http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg" tabindex="1">oga</a>)</span><a href="javascript:;" class="jp-playlist-item" tabindex="1">Bubble</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Stirring of a Fool</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><span class="jp-free-media">(<a class="jp-playlist-item-free" href="http://www.jplayer.org/audio/mp3/Miaow-09-Partir.mp3" tabindex="1">mp3</a> | <a class="jp-playlist-item-free" href="http://www.jplayer.org/audio/ogg/Miaow-09-Partir.ogg" tabindex="1">oga</a>)</span><a href="javascript:;" class="jp-playlist-item" tabindex="1">Partir</a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="1">Thin Ice</a></div></li></ul> -->
      </div>
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
          <!-- <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
          <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen" style="display: none;">restore screen</a></li> -->
          <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
          <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off" style="display: none;">repeat off</a></li>
          <li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
          <li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off" style="display: none;">shuffle off</a></li>
        </ul>
      </div>
    </div>
<!--     <div class="jp-details">
      <ul>
        <li><span class="jp-title"></span></li>
      </ul>
    </div> -->
<!--     <div class="jp-no-solution">
      <span>Update Required</span>
      To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
    </div>
  </div> -->
</div>
