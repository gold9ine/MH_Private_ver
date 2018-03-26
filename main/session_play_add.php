<?PHP
header('Content-Type: text/html; charset=utf-8');
session_start();
?>

<?PHP
// echo("<script>window.alert('dfadfda');</script>");
$project_id=$_GET['a'];
$project_title=$_GET['b'];
$project_artist=$_GET['c'];
$project_path2=$_GET['d'];
$project_togle=$_GET['e'];
array_push($_SESSION['play_pro_id'], $project_id);
array_push($_SESSION['play_pro_title'], $project_title);
array_push($_SESSION['play_pro_artist'], $project_artist);
array_push($_SESSION['play_pro_path'], $project_path);
array_push($_SESSION['temp_play_source'], $project_togle);
?>