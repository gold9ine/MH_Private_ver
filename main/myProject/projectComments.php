<?php
// $base_dir = "/home/mh/soma/webpage";
include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
	$user_id=$_SESSION["user_id"];
	$project_id = $_SESSION["project_id"];
	
	$sql="select * from comments where project_id= :project_id and TYPE='0' order by created_at desc;";
	$dbq = $pdo->prepare($sql);
	$dbq->bindParam(':project_id', $project_id, PDO::PARAM_STR);
	$dbq->execute();
	$cnt = $dbq->rowCount();
	$res = $dbq->fetchAll(PDO::FETCH_ASSOC);

	$i=0;
	foreach ($res as $row){
		$comment=$row['CONTENTS'];
		$created_at= substr($row['created_at'], 0,10);
		$pri_user_id=$row['pri_user_id'];
		$source_id=$row['id'];

		$sql2 = "select * from users where id= :pri_user_id";
		$dbq = $pdo->prepare($sql2);
		$dbq->bindParam(':pri_user_id', $pri_user_id, PDO::PARAM_STR);
		$dbq->execute();
		$res2 = $dbq->fetch(PDO::FETCH_ASSOC);
		$picture_path=$res2['PICTURE'];
		
		if($picture_path == "")
			$picture_path = "def.jpg";

		$user_name = $res2['NAME'];

		echo("
			<div class=\"row pi-content-area-comment\">
				<div class=\"col-md-2 pi-track-user-img-area\">
					<img onclick=\"user_info_parents($pri_user_id);\" class=\"pi-user-img left\" src=\"/uploads/userImg/$picture_path\"/>
				</div>
				<div class=\"col-md-10\">
				  <div onclick=\"user_info_parents($pri_user_id);\" class=\"pi-comment-user-name pointer\"> $user_name </div>
				  ");
		if($user_id==$pri_user_id){
		echo("
				  	<a type=\"button\" onclick=\"comment_delete($source_id)\" class=\"track-delete-button favoritelist-button favorite-delete-button\"></a>
		");
		};
		echo("
				 
					<div class=\"pi-track-user-commnet\"> $comment </div>
					<div class=\"right\"> $created_at </div>
				</div>
			</div>	
			");
		$i++;
	}
?>

