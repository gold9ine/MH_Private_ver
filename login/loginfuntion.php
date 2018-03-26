<?php
  // include("../include/config/config.php");

  function loginf($email,$password)
  {
    include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
    // $sql = "select * from users where EMAIL='$email'";
    // $res = mysql_query($sql);

    // $sql = "select * from users where EMAIL= :email";
    $dbq = $pdo->prepare("select * from users where EMAIL= :email");
    $dbq->bindParam(':email', $email, PDO::PARAM_STR);
    $dbq->execute();

    // $row = mysql_fetch_array($res);
    $row = $dbq->rowCount();
 
    // Fetch 모드를 설정
    $dbq->setFetchMode(PDO::FETCH_ASSOC);

    // 결과 가져오기
    $res = $dbq->fetch();

    if($row)
    {
      if($res['PASSWORD'] == crypt($password, $res['SALT']))
      {
        session_start();
        $_SESSION['user_id'] = $res['id'];
        header("Location: /main/layout.php");
      }
      else
      {
        echo("<script>
          window.alert('Login Fail'); 
          window.location='/login/loginform.php';
              </script>"
            );
      }
    }
    else
    {
      echo("<script>
        window.alert('Login Fail');
        window.location='/login/loginform.php';
            </script>"
          );
    }
    
  }
  
?>