<h1>Register</h1>
 
<p>Please enter your details below to login.</p>
 
<form method="post" action="<?php url('/register') ?>" name="registerform" id="registerform">
<fieldset>
	<label for="username">Email:</label><input type="text" name="email" id="email" /><br />
    <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
    <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
    <input type="submit" name="register" id="register" value="Login" />
</fieldset>
</form>