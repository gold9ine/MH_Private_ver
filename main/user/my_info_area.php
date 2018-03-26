<?PHP
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
// session_unset();
?>
<!DOCTYPE html>
<html>
<head>
  <?PHP 
    // $base_dir = "/home/mh/soma/webpage";
    include($_SERVER["DOCUMENT_ROOT"]."/main/file_include.php");
  ?>
</head>

<body>
<script type="text/javascript">
function user_edit_mode(){
  $("#user-info-change-area").load("/main/user/my_info_edit.php");
}
</script>

<?PHP
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_dbname.';charset=utf8', $db_user, $db_password);


$user_id = $_SESSION["user_id"];
$q="select * from users where id= :user_id";
$dbq = $pdo->prepare($q);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$dbq->execute();
$count = $dbq->rowCount();
$sql_result = $dbq->fetch(PDO::FETCH_ASSOC);
// $sql_result=mysql_query($q, $db_conn);          //질의(위 내용)를 수행하라.
// $count=mysql_num_rows($sql_result);
echo("<script>query_count=$count;</script>");

$user_NAME=$sql_result['NAME'];
$user_EMAIL=$sql_result['EMAIL'];
$user_PART=$sql_result['PART'];
$user_AFFILIATE_BAND=$sql_result['AFFILIATE_BAND'];
$user_PICTURE=$sql_result['PICTURE'];

$user_created_at=$sql_result['created_at'];
$user_updated_at=$sql_result['updated_at'];
$user_INFO=$sql_result['INFO'];
echo("<script>
        var user_INFO = '$user_INFO';
  </script>");
?>
<div id="user-info-change-area">
  <img id="user-edit-btn" onclick="user_edit_mode();" class="user-edit-btn" src="/images/main/button/user-edit-btn.png">
  <form class="form-horizontal" role="form">
    <div class="userinfo-row row">
      <div class="col-xs-5">
        <div class="user-img-back">
          <?php echo("
          <img class=\"user-album-full img-radius\" src=\"/uploads/userImg/$user_PICTURE\">
          "); ?>
        </div>
      </div>
      <div class="col-xs-7 user-info-formgroup user-info-margin-bottom">
        <div class="form-group">
          <label for="inputEmail3" class="col-xs-3 control-label">Nick Name</label>
          <div class="col-xs-9">
            <?php echo("$user_NAME");?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-xs-3 control-label">Join Date</label>
          <div class="col-xs-9">
            <?php echo("$user_created_at");?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-xs-3 control-label">E-Mail</label>
          <div class="col-xs-9">
            <?php echo("$user_EMAIL");?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-xs-3 control-label">Part</label>
          <div class="col-xs-9">
            <?php echo("$user_PART");?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-xs-3 control-label">Affiliate Band</label>
          <div class="col-xs-9">
            <?php echo("$user_AFFILIATE_BAND");?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-xs-3 control-label">Introduce</label>
          <div class="col-xs-9">
            <?php echo("$user_INFO");?>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>