<?PHP
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
// session_unset();
?>

<!DOCTYPE html>
<html>
<head>
<!-- java script -->
<script src='/include/js/jquery-2.1.0.min.js'></script>
<script src='/include/js/bootstrap.js'></script>

<!-- style sheet -->
<link rel="stylesheet" href="/include/css/bootstrap.css">
<link rel="stylesheet" href="/include/css/bootstrap-theme.css">
<link rel="stylesheet" href="/include/css/layout.css">
</head>
<body>
<!-- <button class="top-menu-btn menu-btn menu-area-background buttonBackground" id="timelineButton2" name="timelineButton">timeline button</button> -->
<div class="side-banner">
    <div class="createProject-img"></div>
</div>
<div class="bs-example" style="width: 100%;position: absolute;">
  <!-- <form class="contact_form" id="project-create" action="./myProject/create-project_connect2.php" method="post" enctype="multipart/form-data"
  > -->
  <form class="contact_form" id="project-create" action="/main/myProject/create-project_connect.php" method="post" enctype="multipart/form-data"
  >
  <fieldset>
    <div id="temp">
      <!-- <span class="help-block">Please complete here.</span> -->
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="TITLE" class="form-control" placeholder="Project Name"></input>
      </div>

      <div class="form-group">
        <label>Artist</label>
        <?php
        echo ("<input type=\"text\" name=\"ARTIST\" class=\"form-control\" value=\"");
        echo ($_SESSION["user_NAME"]);
        echo ("\" disabled></input>");
        ?>
      </div>

      <label>Genre</label>
      <select name="GENRE" class="form-control" id="normalSelect">
        <option>Rock</option>
        <option>Pop</option>
        <option>HipHop</option>
        <option>Electronic</option>
        <option>Jazz</option>
        <option>Blues</option>
        <option>RnB</option>
      </select>
      <div class="form-group">
        <label>Image</label>
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" />  -->
        <input type="file" name="ALBUM_IMAGE_PATH" class="form-control" size="60" /></input>
      </div>

      <div class="form-group">
        <label>Information</label>
        <textarea id="project-information-textarea" type="text" name="PROJECT_INFO" placeholder="Project Information"></textarea>
      </div>

      <button type="submit" class="btn btn-sm create-project-button">Submit</button>
    </div>
  </fieldset>
</form>
</div>
</body>
</html>

 