<?PHP
header('Content-Type: text/html; charset=utf-8');
session_start();
$project_id=$_GET['a'];
?>
<div class="bar-area">
  <img id="projectInfo-bar-img"></img>
</div>
<?php echo("<iframe name=\"projectBottom\" class=\"col-md-12 pi-iframe\" scrolling=\"No\" onLoad=\"setIFrameHeight(this);\" src=\"/main/myProject/projectInfo_detail.php?a=".$project_id."\" frameborder=\"0\" style=\"height: 400px;\"></iframe>");?>
<iframe name="projectBottom" class="col-md-12 pi-iframe" scrolling="No" onLoad="setIFrameHeight(this);" src="/main/myProject/projectBottom.php" frameborder="0"></iframe>
