<?php
require_once('includes\header.inc');
?>
<div id="content">
  <div id="main-menu">
	<div class = "container form-signin">
      </div> <!-- /container -->
      
      <div class = "container">
      <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="userAuthentication.php" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" value="">
            </div> 
            <div>
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
      </div> 
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>