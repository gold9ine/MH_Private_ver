<?PHP
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(1800);
session_start();
// session_unset();
// session_unset() => 현재 연결된 세션에 등록되어 있는 모둔 변수의 값을 삭제 
// session_destroy() =>현재의 세션을 종료 
// $_SESSION["user_id"]=4;
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="/include/css/user.css">
 	<!-- bootstrap -->
 	<link rel="stylesheet" type="text/css" href="/include/css/bootstrap-theme.min.css">
 	<link rel="stylesheet" type="text/css" href="/include/css/bootstrap.min.css">
 	<script type="text/javascript" src="/include/js/registform.js"></script>
 </head>

 <body class="page-background">
 	<div class="middleArea">
 		<form class="form-inline login-padding login-right" role="form" action="/login/login.php" method="post">
 			<div class="form-group login-form ">
      <div class="checkbox login-checkbox">
        <label class="checkbox-font">
          <input type="checkbox" class="login-remember" name="remember-me"> Remember me </input>
        </label>
      </div>
      <div class="form-group">
      	<label class="sr-only login-label" for="InputEmail">Email address</label>
      	<input type="email" class="form-control login-label" name="userEmail" id="InputEmail" placeholder="Enter email"></input>
      </div>
      <div class="form-group">
      	<label class="sr-only" for="InputPassword" >Password</label>
      	<input type="password" class="form-control login-label" name="userPassword" id="InputPassword" placeholder="Password"></input>
      </div>
      <button type="submit" id="sign-button" class="btn btn-warning" name="signin">Sign in</button>
    </div>
  </form>
  <div class="main-form-size">
  	<div class="main-form-size" id="main-contents-form">
  	</div>
  	<div class="main-form-size" id="main-contents-form-inner">
  	</div>
  	<div id="regist-form">
  		<form class="form-horizontal" onsubmit="return registcheck(this)" id="register-form" name="register-form" role="form" name="register-form" action="/login/regist.php" method="post">

  			<div class="form-group regist-form-padding">
  				<h4 >Register</h4>
  			</div>
  			<div class="form-group regist-form-padding">
  				<label for="inputEmail" class="control-label">Email</label>
  				<input type="email" name="userEmail" class="form-control" id="email" placeholder="Email">
  			</div>

  			<div class="form-group regist-form-padding">
  				<label for="inputName" class="control-label">Name</label>
  				<div class="regist-textbox">
  					<input type="text" name="userName" class="form-control" id="name" placeholder="Name">
  				</div>
  			</div>

  			<div class="form-group regist-form-padding">
  				<label for="inputPassword" class="control-label">Password</label>
  				<div class="">
  					<input type="password" id="password" name="userPassword" class="form-control" placeholder="Password">
  				</div>
  			</div>

  			<div class="form-group regist-form-padding">
  				<label for="inputPassword" class="control-label">Confirm Password</label>
  				<div class="">
  					<input type="password" name="userCPassword" class="form-control" id="passwordagain" placeholder="Confirm Password">
  				</div>
  			</div>

  			<div class="form-group regist-form-padding">
  				<label for="inputPart" class="control-label">Instrument Part</label>
  				<div class="">
  					<select type="text" name ="userPart" class="form-control" id="inputGanre" placeholder="INSTRUMENT PART">
  						<option>Vocal</option>
              <option>Drum</option>
              <option>Synthesizer</option>
  						<option>Electric Guitar</option>
  						<option>Bass Guitar</option>
  						<option>Classic Guitar</option>
  						<option>Acoustic Guitar</option>
  					</select>
  				</div>
  			</div>

  			<div class="form-group">
  				<div class="submit-top ">
  					<button type="submit" class="regist-btn"></button>
  				</div>
  			</div>
  		</form>
  	</div>
  </div>
</div>
</body>
</html>
