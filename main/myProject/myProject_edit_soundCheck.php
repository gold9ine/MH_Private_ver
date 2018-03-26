<?php
	// $base_dir = "/home/mh/soma/webpage";
	// include("../../include/config/config.php");
// $db_host		= "localhost";
// $db_user		= "root";
// $db_password	= "";
// $db_dbname  = "mh";
// $db_conn    = mysql_connect($db_host, $db_user, $db_password);
// mysql_select_db($db_dbname, $db_conn);
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
$cnt = 0;
function projectSoundCheck($project_id, $user_id){
// $projectSoundCheck = "select TITLE from projects where id='$project_id';";
$projectSoundCheck = "select * from sounds where project_id= :project_id and pri_user_id= :user_id;";
$dbq = $pdo->prepare($projectSoundCheck);
$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$dbq->execute();
$cnt = $dbq->rowCount();
$res_check = $dbq->fetchAll(PDO::FETCH_ASSOC);
// $res_check = mysql_query($projectSoundCheck, $db_conn);
// $cnt=mysql_num_rows($res_check);
}
?>