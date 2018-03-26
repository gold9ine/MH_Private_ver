
<?php
	// $base_dir = "/home/mh/soma/webpage";
	// include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");

	function goodComment($project_id, $user_id)
	{
		include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
		$sql_project = "select TITLE from projects where id= :project_id;";
		$dbq = $pdo->prepare($sql_project);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_project = $dbq->fetch(PDO::FETCH_ASSOC);
		$project_name = $res_project['TITLE'];
 
		$sql_user = "select NAME from users where id= :user_id";
		$dbq = $pdo->prepare($sql_user);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_user = $dbq->fetch(PDO::FETCH_ASSOC);
		$user_name = $res_user['NAME'];

		// $content = ":user_name"."님이 ".":project_name"."을(를) 좋아합니다.";
		$sql="insert into comments (pri_user_id, project_id,created_at,CONTENTS,TYPE) values (:user_id, :project_id,NOW(), :user_name '님이 ' :project_name '을(를) 좋아합니다.','1');";
		$dbq = $pdo->prepare($sql);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
		$dbq->bindParam(':user_name', $user_name, PDO::PARAM_STR);
		$dbq->bindParam(':project_name', $project_name, PDO::PARAM_STR);
	    $dbq->execute();
		// $content = "$user_name"."님이 "."$project_name"."을(를) 좋아합니다.";
		// $sql="insert into comments (pri_user_id, project_id,created_at,CONTENTS,TYPE) values ('$user_id', '$project_id',NOW(),'$content','1');";
		// $res=mysql_query($sql);
	}

	function downloadComment($project_id, $user_id)
	{
		include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
		$sql_project = "select TITLE from projects where id= :project_id;";
		$dbq = $pdo->prepare($sql_project);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_project = $dbq->fetch(PDO::FETCH_ASSOC);
		$project_name = $res_project['TITLE'];
 
		$sql_user = "select NAME from users where id= :user_id";
		$dbq = $pdo->prepare($sql_user);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_user = $dbq->fetch(PDO::FETCH_ASSOC);
		$user_name = $res_user['NAME'];
		// $sql_project = "select TITLE from projects where id='$project_id';";
		// $res_project = mysql_query($sql_project);
		// $project_name = mysql_result($res_project, 0);
 
		// $sql_user = "select NAME from users where id='$user_id'";
		// $res_user = mysql_query($sql_user);
		// $user_name = mysql_result($res_user, 0);

		// $content = ":user_name"."님이 ".":project_name"."을(를) 다운로드 하였습니다.";
		$sql="insert into comments (pri_user_id, project_id,created_at,CONTENTS,TYPE) values (:user_id, :project_id,NOW(), :user_name '님이 ' :project_name '을(를) 다운로드 하였습니다.','2');";
		$dbq = $pdo->prepare($sql);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
		$dbq->bindParam(':user_name', $user_name, PDO::PARAM_STR);
		$dbq->bindParam(':project_name', $project_name, PDO::PARAM_STR);
	    $dbq->execute();
	}

	function joinComment($project_id, $user_id)
	{
		include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
		$sql_project = "select TITLE from projects where id= :project_id;";
		$dbq = $pdo->prepare($sql_project);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_project = $dbq->fetch(PDO::FETCH_ASSOC);
		$project_name = $res_project['TITLE'];
 
		$sql_user = "select NAME from users where id= :user_id;";
		$dbq = $pdo->prepare($sql_user);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_user = $dbq->fetch(PDO::FETCH_ASSOC);
		$user_name = $res_user['NAME'];

		// $content = ":user_name"."님이 ".":project_name"."에 참가 하였습니다.";
		$sql="insert into comments (pri_user_id, project_id,created_at,CONTENTS,TYPE) values (:user_id, :project_id,NOW(), :user_name '님이 ' :project_name '에 참가 하였습니다.','3');";
		$dbq = $pdo->prepare($sql);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
		$dbq->bindParam(':user_name', $user_name, PDO::PARAM_STR);
		$dbq->bindParam(':project_name', $project_name, PDO::PARAM_STR);
	    $dbq->execute();
	}

	function uploadSource($project_id, $user_id)
	{
		include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
		$sql_project = "select TITLE from projects where id= :project_id;";
		$dbq = $pdo->prepare($sql_project);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_project = $dbq->fetch(PDO::FETCH_ASSOC);
		$project_name = $res_project['TITLE'];
 
		$sql_user = "select NAME from users where id= :user_id";
		$dbq = $pdo->prepare($sql_user);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_STR);
	    $dbq->execute();
		$res_user = $dbq->fetch(PDO::FETCH_ASSOC);
		$user_name = $res_user['NAME'];

		// $content = ":user_name"."님이 ".":project_name"."에 새로운 음원을 추가 하였습니다.";
		$sql="insert into comments (pri_user_id, project_id,created_at,CONTENTS,TYPE) values (:user_id, :project_id,NOW(), :user_name '님이 ' :project_name '에 새로운 음원을 추가 하였습니다','4');";
		$dbq = $pdo->prepare($sql);
		$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
		$dbq->bindParam(':user_name', $user_name, PDO::PARAM_STR);
		$dbq->bindParam(':project_name', $project_name, PDO::PARAM_STR);
	    $dbq->execute();

	}

	$flag = $_GET['b'];
	$down_id=$_GET['a'];
	if($flag == 2)
	{
		session_start();
		$user = $_SESSION["user_id"];
		downloadComment($down_id, $user);
	}

?>