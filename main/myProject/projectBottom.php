
<head>
  <?PHP 
  	session_start();
    // $base_dir = "/home/mh/soma/webpage";
    include($_SERVER["DOCUMENT_ROOT"]."/main/file_include.php");
  ?>
  <script>var user_id = "<?PHP echo $_SESSION["user_id"]; ?>";</script>
  <script type="text/javascript" src="/include/js/myprojectform.js"></script>

</head>
<body style="margin-top: 20px;">
<div class="row">
  <div id="project-track" role="form" class="form-horizontal col-md-6">
    <img class="track-area-img">
    <div class="form-group project-bottom-back">
      <div class="col-md-2 track-user-name">
        <?PHP echo $_SESSION["user_NAME"]; ?>
      </div>
      <form id="add-Source" enctype="multipart/form-data" action="addSource.php" method="POST" class="form-horizontal col-md-10">
        <div>
          <input type="text" class="form-control" id="input-comment" placeholder="comment" name="comment"></input>
        </div>
        <!-- <br> -->
        <div style="margin-top: 10px;">
          <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
          <input type="file" name="userfile" class="form-control col-lg-10" id="input-track-area" accept=".mp3"></input>
          <button type="submit" class="submit-button track-summit-button" value="Upload File"></button>
        </div>
      </form>
    </div>
     <?PHP include($_SERVER["DOCUMENT_ROOT"]."/main/myProject/projectAudios.php"); ?>
  </div>
  <div id="project-comments" role="form" onsubmit="return check_comment(this)" class="col-md-6 form-horizontal">
    <img class="comment-area-img">
    <div class="form-group project-bottom-back">
      <div class="col-md-2 comment-user-name">
        <?PHP echo $_SESSION["user_NAME"]; ?>
      </div>
      <form id="project-comment-list" class="col-md-10 form-horizontal" action="/main/myProject/newComment.php">
        <form id="project-comment-new" class="has-success form-inline" method="post" enctype="multipart/form-data">
          <div class="col-md-9">
          	<input type="text" class="form-control" id="incomment" placeholder="comment" name="content"></input>
          	<input type="text" name="project_id" value="<?php echo($_SESSION['project_id']); ?>" style="display:none;"></input>
          	<input type="text" name="user_id" value="<?php echo($_SESSION['user_id']); ?>" style="display:none;"></input>
          </div>
      		<button type="submit" class="submit-button comment-summit-button"></button> 
        </form>
      </form>
    </div>
    <?PHP include($_SERVER["DOCUMENT_ROOT"]."/main/myProject/projectComments.php"); ?>
  </div>
</div>
</body>