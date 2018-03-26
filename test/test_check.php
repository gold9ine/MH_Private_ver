<?PHP

include("../include/config/config.php");

echo "hello... $db_host <br>";
echo $_REQUEST['userName'];
$kknd = $_REQUEST['userName'];

$sql = "inset into [TABLEΈν](dddd, ddd, ddd) values($kknd, 'dd', 'dd')";

$result = mysql_query($sql);
echo(" username : $kknd  ");

?>