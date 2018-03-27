<?php
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();

$goodProject_id = $_GET['a'];
$user_id = $_SESSION["user_id"];

include($_SERVER["DOCUMENT_ROOT"] . "/include/config/config.php");
$q = "select * from favorite where user_id= :user_id and project_id= :goodProject_id;";
$dbq = $pdo->prepare($q);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$dbq->bindParam(':goodProject_id', $goodProject_id, PDO::PARAM_INT);
$dbq->execute();
$count = $dbq->rowCount();

echo("$count");
?>