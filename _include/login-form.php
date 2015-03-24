<form class="form-signin" role="form" method="post" action="login.php">
  <h2 class="form-signin-heading">Please Log in</h2>
<?php 
	if(empty($errors) == false):
		output_errors($errors);
	endif;
?>
  <input type="text" class="form-control" name="username" placeholder="User Name" required autofocus>
  <input type="password" class="form-control" name="password" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="text-center">Don't have account <a href="Register.php">Register</a></p>
</form>