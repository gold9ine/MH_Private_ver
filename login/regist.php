<?PHP
	//ALTER TABLE `테이블명` CHANGE `컬럼명` `컬럼명` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL; //업데이트 자동 생성
	// include("../include/config/config.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
	// include("loginfuntion.php");

	$name = $_REQUEST['userName'];
	$email = $_REQUEST['userEmail'];
	$password = $_REQUEST['userPassword'];
	$part = $_REQUEST['userPart'];
	$def_num = mt_rand(1,8);
	$picture = "user-default-img".$def_num.".png";

	$cost = 10;
	$salt = ""; 
	for ($i = 0; $i < 22; $i++)
	    $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1);
	$salt = '$2a$'.$cost.'$'.$salt.'$';
	$password = crypt($password, $salt);

	// 예외처리
	$db_conn = @mysql_connect($db_host, $db_user, $db_password);
	@mysql_select_db($db_dbname, $db_conn);
	$sql = "Insert into users (NAME,EMAIL,PASSWORD,SALT,PART,created_at,PICTURE) values('$name','$email','$password','$salt' ,'$part',NOW(),'$picture')";
	$dbq = @mysql_query($sql, $db_conn);
	
	// $dbq = $pdo->prepare("Insert into users (NAME,EMAIL,PASSWORD,SALT,PART,created_at,PICTURE) values(:name,:email,:password,:salt,:part,NOW(),:picture)");
    // $dbq->bindParam(':name', $name, PDO::PARAM_STR);
    // $dbq->bindParam(':email', $email, PDO::PARAM_STR);
    // $dbq->bindParam(':password', $password, PDO::PARAM_STR);
    // $dbq->bindParam(':salt', $salt, PDO::PARAM_STR);
    // $dbq->bindParam(':part', $part, PDO::PARAM_STR);
    // $dbq->bindParam(':picture', $picture, PDO::PARAM_STR);
    // $dbq->execute();
    // $dbq->execute([':name'=>$name, ':email'=>$email, ':password'=>$password, ':salt'=>$salt, ':part'=>$part, ':picture'=>$picture]);
	// $pdo->query($sql);

    // $dbq->setFetchMode(PDO::FETCH_ASSOC);
    // $res = $dbq->fetch();
    // echo($dbq);

	if($dbq == 1)
	{
		echo("<script> 
		window.alert('Register Sucess!'); 
		window.location='/login/loginform.php';
		</script>");
		// loginf($email,$password);
		exit();
	}
	else
	{
		$sqlerr = mysql_error($db_conn);
		 if("NAME" == substr($sqlerr, -5,4))
		 {
			 	echo("<script> 
				window.alert('You can not use this Name'); 
				window.location='/login/loginform.php';
				</script>");
		 }
		 else if("EMAIL" == substr($sqlerr, -6,5))
		 {
		 		echo("<script> 
				window.alert('You can not use this Email Adress'); 
				window.location='/login/loginform.php';
				</script>");
		 }
		exit(); 
	}
	exit();

?>