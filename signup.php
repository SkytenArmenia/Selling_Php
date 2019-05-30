<?php
	require "header.php";
 ?>
	<main class="signup">
		<div class="signup-form">
		    <form action="includes/login.inc.php" method="post">
				<h2>Create an Account</h2>
		        	<input type="text" class="form-control input-lg" name="uid" placeholder="Username">
		        	<input type="email" class="form-control input-lg" name="mail" placeholder="Email Address">
		          <input type="password" class="form-control input-lg" name="pwd" placeholder="Password">
		          <input type="password" class="form-control input-lg" name="pwd-repeat" placeholder="Repeat Password">
		          <button type="submit" class="btn btn-success btn-lg btn-block signup-btn" name="signup-submit">Sign Up</button>
		    </form>
		    <div class="text-center">Already have an account? <a href="#">Login here</a></div>
		</div>
	</main>
<?php
	require "footer.php";
 ?>
