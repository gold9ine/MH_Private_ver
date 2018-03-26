<?php
$track_id=$_GET['a'];
// $base_dir = "/home/mh/soma/webpage";
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
$q="delete from sources where id=:track_id;";
$dbq = $pdo->prepare($q);
$dbq->bindParam(':track_id', $track_id, PDO::PARAM_INT);
$dbq->execute();
// $sql_result=mysql_query($q, $db_conn);        
?>