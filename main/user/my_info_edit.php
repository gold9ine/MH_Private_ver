<?PHP
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");

$user_id = $_SESSION["user_id"];

$q = "select * from users where id= :user_id";
$dbq = $pdo->prepare($q);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$dbq->execute();
$count = $dbq->rowCount();
$sql_result = $dbq->fetch(PDO::FETCH_ASSOC);
echo("<script>query_count=$count;</script>");
$user_NAME = $sql_result['NAME'];
$user_EMAIL = $sql_result['EMAIL'];
$user_PART = $sql_result['PART'];
$user_AFFILIATE_BAND = $sql_result['AFFILIATE_BAND'];
$user_PICTURE = $sql_result['PICTURE'];

$user_created_at = $sql_result['created_at'];
$user_updated_at = $sql_result['updated_at'];
$user_INFO = $sql_result['INFO'];
echo("<script>
        var user_INFO = '$user_INFO';
  </script>");
?>
<?PHP 
  // $base_dir = "/home/mh/soma/webpage";
  // include("$base_dir/main/file_include.php");
?>
<script>
$(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
            reader.onload = function (e) { 
            //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
                $('#user-img').attr('src', e.target.result);
                //이미지 Tag의 SRC속성에 읽어들인 File내용을 지정
                //(아래 코드에서 읽어들인 dataURL형식)
            }                    
            reader.readAsDataURL(input.files[0]);
            //File내용을 읽어 dataURL형식의 문자열로 저장
        }
    }//readURL()--

    //file 양식으로 이미지를 선택(값이 변경) 되었을때 처리하는 코드
    $("#inputUserImg").change(function(){
        // alert(this.value); //선택한 이미지 경로 표시
        readURL(this);
    });
 });
</script>
<form class="form-horizontal" role="form" action="/main/user/my_info_connect.php" method="post" enctype="multipart/form-data">
  <div class="userinfo-row row">
    <div class="col-xs-5">
      <div class="user-img-back">
        <?php echo("
        <img id=\"user-img\" class=\"user-album-full img-radius\" src=\"/uploads/userImg/$user_PICTURE\">
        "); ?>
      </div>
      <input type="file" oninput="OnInput(event)" name="ALBUM_IMAGE_PATH" class="form-control" id="inputUserImg">
    </div>
    <div class="col-xs-7 user-info-formgroup">
      <div class="form-group">
        <label for="inputEmail3" class="col-xs-3 control-label">Nick Name</label>
        <div class="col-xs-9">
          <?php echo("<input type=\"text\" name=\"NICKNAME\" class=\"form-control\" id=\"name\" value=\"$user_NAME\">");?>
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
           <?php echo("<select type=\"text\" name=\"PART\" class=\"form-control\" id=\"part\">
            <option>$user_PART</option>
           ");?>
              <option>Drum</option>
              <option>Synthesizer</option>
              <option>Vocal</option>
              <option>Electric Guitar</option>
              <option>Bass Guitar</option>
              <option>Classic Guitar</option>
              <option>Acoustic Guitar</option>
            </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-xs-3 control-label">Affiliate Band</label>
        <div class="col-xs-9">
          <?php echo("<input type=\"text\" name=\"AFFILIATE\" class=\"form-control\" id=\"affiliate\" value=\"$user_AFFILIATE_BAND\">");?>
        </div>
      </div>
      <div class="form-group" style="margin-bottom: 0px;">
        <label for="inputPassword3" class="col-xs-3 control-label">Introduce</label>
        <div class="col-xs-9">
          <script>$("textarea.user-info-text").val(user_INFO);</script>
          <textarea id="user-info-text" class="user-info-text" name="INFO" style="padding-left: 12px;"></textarea>
        </div>
      </div>
    </div>
  </div>
  <button type="submit" id="user-edit-summit-btn" class="user-edit-summit-btn right" role="button"></button>
</form>