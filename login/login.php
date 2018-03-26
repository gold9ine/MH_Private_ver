<?PHP
	include("loginfuntion.php");
	$email = $_REQUEST['userEmail'];
	$password = $_REQUEST['userPassword'];
	loginf($email,$password);
?>