<?PHP

header('Content-Type: text/html; charset=utf-8');

session_cache_expire(1800);

session_start();
$_SESSION["user_id"] = 1;
?>


<?PHP

$base_dir = "/mh/";

// echo("<script>

// window.alert('비상업용 개인 연습사이트 입니다. 음원은 올리지 말아주세요 DB가 부족해요..'); 

// </script>");

if(isset($_SESSION["user_id"])) {

  // include("main/layout.php");

  include($_SERVER["DOCUMENT_ROOT"] . "/main/layout.php");

  //echo ("세션 있음");

}

else {

  // include("login/loginform.php");

  include($_SERVER["DOCUMENT_ROOT"] . "/login/loginform.php");

  // echo ("세션 없음");

}

?>

