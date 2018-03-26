<?php
	// $base_dir = "/home/mh/soma/webpage";
	include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");
	
	session_start();
	$user_id = $_SESSION['user_id'];
	$project_id = $_SESSION['project_id'];
	$uploaddir = $_SERVER["DOCUMENT_ROOT"]."/uploads/source/";
	$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
	$type = $_FILES['userfile']['type'];

	$valid_extension = array('.mp3', '.mp4', '.wav');
	$file_extension = strtolower( strrchr( $_FILES["userfile"]["name"], "." ) );

	if( in_array( $file_extension, $valid_extension ) &&  $_FILES["userfile"]['size'] < 104857600)
	{
    echo("<pre>");
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
		{
				include($_SERVER["DOCUMENT_ROOT"]."/main/myProject/addComment.php");
				uploadSource($project_id, $user_id);

		    $source_path = $_FILES["userfile"]["name"];
		    $comment = $_REQUEST['comment'];
		    $sql = "insert into sources (pri_user_id, project_id,created_at,COMMENT,SOURCES_PATH) values (:user_id, :project_id,NOW(),:comment,:source_path);";
		    $dbq = $pdo->prepare($sql);
			$dbq->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$dbq->bindParam(':project_id', $project_id, PDO::PARAM_INT);
			$dbq->bindParam(':comment', $comment, PDO::PARAM_STR);
			$dbq->bindParam(':source_path', $source_path, PDO::PARAM_STR);
		    $dbq->execute();

		    $res = mysql_query($sql);
		    header("Location: /main/myProject/projectBottom.php");
		    exit();
		} 
		else 
		{
				$error = $_FILES["userfile"]["error"];
		    print "파일 업로드 실패!\n$error\n";
		}
		
		echo '자세한 디버깅 정보입니다:';
		print_r($_FILES);

		print "</pre>";
		
	}
	else
	{
	    echo("<script>alert(\"Please upload only audio files and smaller file size than 100M\");
	    	window.location=\"/main/myProject/projectBottom.php\";
	    	</script>");		
	}
?>
