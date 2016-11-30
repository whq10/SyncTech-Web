<!DOCTYPE html>
<?php
   include("config.php");
   session_start();
   $error = NULL;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $role = $row['role'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		  
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
		 $_SESSION['role'] = $role;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
	<html xmlns="http://www.w3.org/1999/xhtml" lang="en-CA">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Sync Tech &lsaquo; Log In</title>
	<link rel='dns-prefetch' href='//s.w.org' />

	<link rel='stylesheet' href='http://www.safe.com/wp-admin/load-styles.php?c=0&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp;ver=4.6.1' type='text/css' media='all' />


	<style>
		.content {
			margin-top: 80px;
		}
	</style>



<meta name='robots' content='noindex,follow' />
	</head>
	<body class="login login-action-login wp-core-ui  locale-en-ca">
		<div id="login">
		<h2><a href="https://www.synctech.com/" title="Powered by Sync Tech" tabindex="-1">Sync Tech</a></h2>
	
<form name="loginform" id="loginform" action = "" method="post">
	<p>
		<label for="user_login">Username<br />
		<input type="text" name="username" id="user_login" class="input" value="" size="20" /></label>
	</p>
	<p>
		<label for="user_pass">Password<br />
		<input type="password" name="password" id="user_pass" class="input" value="" size="20" /></label>
	</p>
		<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> Remember Me</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />
		<input type="hidden" name="redirect_to" value="http://www.synctech.com/wp-admin/" />
		<input type="hidden" name="testcookie" value="1" />
	</p>
</form>

<p id="nav">
	<a href="http://www.synctech.com/wp-login.php?action=lostpassword">Lost your password?</a>
</p>

<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>

	<p id="backtoblog"><a href="http://www.synctech.com/">&larr; Back to Sync Tech</a></p>
	
	</div>

	
		<div class="clear"></div>
	</body>
	</html>
	