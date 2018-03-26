<?PHP
header('Content-Type: text/html; charset=EUC-KR');
?>

<?php
$host="localhost";
$user="mh";
$password="thak2014";
$conn=mysql_connect($host, $user, $password);
mysql_select_db("mh", $conn);

$sql="INSERT INTO test(USER_ID,
USER_PASSWORD,
E_MAIL)
VALUES('한글이당',
'이당aaaaaaa',
'코@코')";

mysql_query($sql, $conn);

?>
<script>
alert("DB 입력 성공! mysql에서 확인해보세요!");
</script>
