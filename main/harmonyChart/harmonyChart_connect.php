<script type="text/javascript">
  var userId = "<?PHP echo $_SESSION["user_id"]; ?>";
  var pro_dbid = new Array();
  var pro_dbGOOD_COUNT = new Array();
  var pro_dbDOWNLOAD_COUNT = new Array();
  var pro_dbPLAY_COUNT = new Array();
  var pro_dbPLAY_TIME = new Array();
  var pro_dbcreated_at = new Array();
  var pro_dbupdated_at = new Array();
  var pro_dbALBUM_IMAGE_PATH = new Array();
  var pro_dbTITLE = new Array();
  var pro_dbARTIST = new Array();
  var pro_dbPROJECT_INFO = new Array();
  var pro_dbmeta_num = new Array();
  var pro_dbpri_user_id = new Array();
  var pro_dbGENRE = new Array();
  var query_count=0;
</script>
<?PHP
// include("$base_dir/include/config/config.php");
// include_once ("$base_dir/include/config/config.php");
// $db_host    = "localhost";
// $db_user    = "mh";
// $db_password  = "thak2014";
// $db_dbname  = "mh";
// $db_conn    = mysql_connect($db_host, $db_user, $db_password);
// mysql_select_db($db_dbname, $db_conn);
// $sql_result=mysql_query($q, $db_conn);          //질의(위 내용)를 수행하라.
// $count=mysql_num_rows($sql_result);

include($_SERVER["DOCUMENT_ROOT"]."/include/config/config.php");

$dbq = $pdo->prepare("select * from projects order by created_at desc limit 28;");
$dbq->execute();
$count = $dbq->rowCount();
// $dbq->setFetchMode(PDO::FETCH_ASSOC);
$res = $dbq->fetchAll(PDO::FETCH_ASSOC);
echo("<script>query_count=$count;</script>");

// print_r($res);
$i=0;
foreach ($res as $row){
  $pro_dbid[$i]=$row['id'];
  $pro_dbGOOD_COUNT[$i]=$row['GOOD_COUNT'];
  $pro_dbDOWNLOAD_COUNT[$i]=$row['DOWNLOAD_COUNT'];
  $pro_dbPLAY_COUNT[$i]=$row['PLAY_COUNT'];
  $pro_dbPLAY_TIME[$i]=$row['PLAY_TIME'];

  $pro_dbcreated_at[$i]=$row['created_at'];
  $pro_dbupdated_at[$i]=$row['updated_at'];
  $pro_dbALBUM_IMAGE_PATH[$i]=$row['ALBUM_IMAGE_PATH'];
  $pro_dbTITLE[$i]=$row['TITLE'];
  $pro_dbARTIST[$i]=$row['ARTIST'];

  $pro_dbPROJECT_INFO[$i]=$row['PROJECT_INFO'];
  $pro_dbmeta_num[$i]=$row['meta_id'];
  $pro_dbpri_user_id[$i]=$row['pri_user_id'];
  $pro_dbGENRE[$i]=$row['GENRE'];
  $i++;
}

// for($i=0; $i<$count; $i++)
// {
//   $pro_dbid[$i]=mysql_result($sql_result, $i, 'id');
//   $pro_dbGOOD_COUNT[$i]=mysql_result($sql_result, $i, 'GOOD_COUNT');
//   $pro_dbDOWNLOAD_COUNT[$i]=mysql_result($sql_result, $i, 'DOWNLOAD_COUNT');
//   $pro_dbPLAY_COUNT[$i]=mysql_result($sql_result, $i, 'PLAY_COUNT');
//   $pro_dbPLAY_TIME[$i]=mysql_result($sql_result, $i, 'PLAY_TIME');

//   $pro_dbcreated_at[$i]=mysql_result($sql_result, $i, 'created_at');
//   $pro_dbupdated_at[$i]=mysql_result($sql_result, $i, 'updated_at');
//   $pro_dbALBUM_IMAGE_PATH[$i]=mysql_result($sql_result, $i, 'ALBUM_IMAGE_PATH');
//   $pro_dbTITLE[$i]=mysql_result($sql_result, $i, 'TITLE');
//   $pro_dbARTIST[$i]=mysql_result($sql_result, $i, 'ARTIST');

//   $pro_dbPROJECT_INFO[$i]=mysql_result($sql_result, $i, 'PROJECT_INFO');
//   $pro_dbmeta_num[$i]=mysql_result($sql_result, $i, 'meta_id');
//   $pro_dbpri_user_id[$i]=mysql_result($sql_result, $i, 'pri_user_id');
//   $pro_dbGENRE[$i]=mysql_result($sql_result, $i, 'GENRE');
// }
echo("<script>var num=0;</script>");
for($i = 0 ; $i < $count; $i++){
  echo ("<script>
      pro_dbid[num]='$pro_dbid[$i]';
      pro_dbGOOD_COUNT[num]='$pro_dbGOOD_COUNT[$i]';
      pro_dbDOWNLOAD_COUNT[num]='$pro_dbDOWNLOAD_COUNT[$i]';
      pro_dbPLAY_COUNT[num]='$pro_dbPLAY_COUNT[$i]';
      pro_dbPLAY_TIME[num]='$pro_dbPLAY_TIME[$i]';

      pro_dbcreated_at[num]='$pro_dbcreated_at[$i]';
      pro_dbupdated_at[num]='$pro_dbupdated_at[$i]';
      pro_dbALBUM_IMAGE_PATH[num]='$pro_dbALBUM_IMAGE_PATH[$i]';
      pro_dbTITLE[num]='$pro_dbTITLE[$i]';
      pro_dbARTIST[num]='$pro_dbARTIST[$i]';

      pro_dbPROJECT_INFO[num]='$pro_dbPROJECT_INFO[$i]';
      pro_dbmeta_num[num]='$pro_dbmeta_num[$i]';
      pro_dbpri_user_id[num]='$pro_dbpri_user_id[$i]';
      pro_dbGENRE[num]='$pro_dbGENRE[$i]';
      </script>");
  echo("<script>num++;</script>");
}
?>