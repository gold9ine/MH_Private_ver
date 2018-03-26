<script type="text/javascript">
  var user_id = "<?PHP echo $_SESSION["user_id"]; ?>";

  var user_NAME;
  var user_EMAIL;
  var user_PART;
  var user_AFFILIATE_BAND;
  var user_PICTURE;

  var user_created_at;
  var user_updated_at;
  var user_INFO;

  var query_count = 0;
</script>
<?PHP
// $base_dir = "/home/mh/soma/webpage";
include($_SERVER["DOCUMENT_ROOT"] . "/include/config/config.php");

$user_id = $_SESSION["user_id"];
$dbq = $pdo->prepare("select * from users where id= :id");
$dbq->bindParam(':id', $user_id, PDO::PARAM_STR);
$dbq->execute();

$row = $dbq->rowCount();
$dbq->setFetchMode(PDO::FETCH_ASSOC);
$res = $dbq->fetch();
echo("<script>query_count = $row;</script>");

$user_NAME = $res['NAME'];
$user_EMAIL = $rex['EMAIL'];
$user_PART = $rex['PART'];
$user_AFFILIATE_BAND = $rex['AFFILIATE_BAND'];
$user_PICTURE = $rex['PICTURE'];

$user_created_at = $rex['created_at'];
$user_updated_at = $rex['updated_at'];
$user_INFO = $rex['INFO'];

echo("<script>
          user_NAME = '$user_NAME';
          user_EMAIL = '$user_EMAIL';
          user_PART = '$user_PART';
          user_AFFILIATE_BAND = '$user_AFFILIATE_BAND';
          user_PICTURE = '$user_PICTURE';

          user_created_at = '$user_created_at';
          user_updated_at = '$user_updated_at';
          user_INFO = '$user_INFO';
      </script>");
$_SESSION["user_NAME"] = $user_NAME;
?>

<script src='/include/js/jquery-2.1.0.min.js'></script>
<script src="/include/js/header.js"></script>
<link rel="stylesheet" href="/include/css/header.css">

<div id="header">
  <div id="topBanner-extention" class="topBanner-hight">
    <div class="topBanner-extention-left"></div>
    <div class="topBanner-extention-right"></div>
    <div id="topBanner" class="middleArea">
      <div class="middleArea">
        <div id="banner-user-search-area">
          <div id="banner-user-area">
            <ul id="banner-user-ul">
              <li class="banner-user-li">
                <img id="user-icon" src="/images/main/button/user-button.png"></img>
              </li>
              <li class="banner-user-li">
                <a id="user-nickname" style="background: transparent; cursor:pointer;">
                  <h3 class="banner-user-h3"><?php echo $_SESSION["user_NAME"]?></h3>
                </a>
              </li>
              <li class="banner-user-li" id="logout-button-li">
                <a id="user-logout" value="delete" TITLE="Log out" style="background: transparent; cursor:pointer;">
                  <img id="logout-button" src="/images/main/button/logout-button.png"></img>
                </a>
              </li>
            </ul>
          </div>
            <fieldset id="banner-fildset">
              <img id="search-text" src="/images/main/background/search.png"></img>
              <div id="banner-form-group">
                <input id="search-box" type="search" required="required" placeholder=" The hall of fame" results="5" name="search-key" autosave="unique">
                </input>
              </div>
              <button type="submit" onClick="searchAction();" id="search-button"class="search-button"></button>
            </fieldset>
        </div>
        <div id="modeChange-area">
          <img id="modeChangeButton" class="tilt modeChangeButton"></img>
        </div>
      </div>
    </div>

  </div>
  <div id="topMenu" style="text-align: center;">
    <div id="menu-btn-group" class="middleArea menu_none" style="
    margin-left: 5px;
    ">
      <img class="top-menu-btn" id="harmonyChartButton" name="harmonyChartButton"></img>
      <img class="top-menu-btn" id="artistRankingButton" name="artistRankingButton"></img>
      <img class="top-menu-btn" id="myProjectButton" name="myProjectButton"></img>
      <img class="top-menu-btn" id="timelineButton" name="timelineButton"></img>
    </div>
  </div>
</div>