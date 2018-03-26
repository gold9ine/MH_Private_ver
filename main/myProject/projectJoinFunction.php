<?php
	header('Content-Type: text/html; charset=utf-8');
	session_cache_expire(1800);
	session_start();

	$project_id=$_GET['a'];
	$user_id=$_SESSION["user_id"];
	// $base_dir = "/home/mh/soma/webpage";
	include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
	$q="insert into users_projects (user_id, project_id) values ( :user_id,  :project_id);";
	$dbq = $pdo->prepare($q);
    $dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
	$dbq->execute();
	// $count = $dbq->rowCount();
	// $sql_result = $dbq->fetchAll(PDO::FETCH_ASSOC);
	// $sql_result=mysql_query($q, $db_conn);       

	include($_SERVER["DOCUMENT_ROOT"]."/main/myProject/addComment.php");
	joinComment($project_id, $user_id);
?>