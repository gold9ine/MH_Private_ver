<?PHP
header('Content-Type: text/html; charset=utf-8');
session_start();
?>

<?PHP
$playlist_index=$_GET['a'];

$a=$playlist_index;
$b=$a+1;
$list_count=0;
$list_count=count($_SESSION['play_pro_id'])-1;
$list_count_round=$list_count-$a;

if($list_count==0 || $a==$list_count){
unset($_SESSION['play_pro_id'][$a]);
unset($_SESSION['play_pro_title'][$a]);
unset($_SESSION['play_pro_artist'][$a]);
unset($_SESSION['play_pro_path'][$a]);
unset($_SESSION['temp_play_source'][$a]);
}
for($i=0; $i<$list_count_round; $i++){
$_SESSION['play_pro_id'][$a] = $_SESSION['play_pro_id'][$b];
$_SESSION['play_pro_title'][$a] = $_SESSION['play_pro_title'][$b];
$_SESSION['play_pro_artist'][$a] = $_SESSION['play_pro_artist'][$b];
$_SESSION['play_pro_path'][$a] = $_SESSION['play_pro_path'][$b];
$_SESSION['temp_play_source'][$a] = $_SESSION['temp_play_source'][$b];

unset($_SESSION['play_pro_id'][$b]);
unset($_SESSION['play_pro_title'][$b]);
unset($_SESSION['play_pro_artist'][$b]);
unset($_SESSION['play_pro_path'][$b]);
unset($_SESSION['temp_play_source'][$b]);

$a++;$b++;
}
?>