<?php
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();

$goodProject_id=$_GET['a'];
$user_id=$_SESSION["user_id"];
// $base_dir = "/home/mh/soma/webpage";
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");

$q="insert into favorite (user_id, project_id) values (:user_id, :goodProject_id);";
$dbq = $pdo->prepare($q);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$dbq->bindParam(':goodProject_id', $goodProject_id, PDO::PARAM_INT);
$dbq->execute();
// $sql_result=mysql_query($q, $db_conn);       

$q2="update projects set GOOD_COUNT=GOOD_COUNT+1 where id= :goodProject_id;";
$dbq = $pdo->prepare($q2);
$dbq->bindParam(':goodProject_id', $goodProject_id, PDO::PARAM_INT);
$dbq->execute();
// $sql_result2=mysql_query($q2, $db_conn);

include($_SERVER["DOCUMENT_ROOT"]."/main/myProject/addComment.php");
goodComment($goodProject_id, $user_id);


?>