<?PHP
if(!$_SESSION['user_id'])
  header("Location: /");
?>

<!DOCTYPE html>
<html>
<head>
  <?PHP 
    // $base_dir = "/home/mh/soma/webpage";
    include("main/file_include.php");
  ?>
</head>

<body>
  <div id="container" class="normal">
    <?PHP
      include("include/config/header.php");
    ?>
    <nav class="navbar-fixed-top" role="navigation">
      <div id="navbar-fixed-area">
        <div id="player-area" class="container middleArea">
        <?PHP
          include("main/player/music_player.php");
        ?>
        </div>
      </div>
    </nav>
    <div id="content" class="middleArea">
    <?PHP
      include("main/harmonyChart/harmonyChart.php");
    ?>
    </div>
  </div>
</body>
</html>
