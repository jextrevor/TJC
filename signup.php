<?php
include('page.php');
$code = 3;
if(isset($_POST['username'])){
	$usernameq = addslashes($_POST['username']);
	$query = "select * from users where Username = '$usernameq'";
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0){
	$code = 1;
	}
	else{
	if($_POST['password'] != $_POST['confirm']){
	$code = 2;
	}
	else{
	$passwordq = addslashes(crypt($_POST['password'],"xx"));
	$nameq = addslashes($_POST['name']);
	$hintq = addslashes($_POST['hint']);
	$query = "insert into users values ('$usernameq','$passwordq','$nameq','$hintq')";
	mysql_query($query);
	$code = 0;
	}
	}
}
include('user.php');
$title = 'Sign Up';
include('header.php');
?>
<h2>Sign Up</h2>
<?php
if($code == 0){
echo '<p>Your account has been added to the account list.</p><form action="login.php" method="post"><input type="hidden" name="username" value="'.$_POST['username'].'" /><input type="hidden" name="password" value="'.$_POST['password'].'" /><input type="submit" value="Log In Now" /></form>';
}
elseif($code == 2){
echo '<p>Please reconfirm your password.</p><form action="" method="post"><input type="hidden" name="username" value="'.$_POST['username'].'" /><input type="hidden" name="name" value="'.$_POST['name'].'" /><label>Password: <input type="password" name="password" /></label><br /><label>Confirm Password: <input type="password" name="confirm" /></label><br /><label>Password Hint: <textarea name="hint"></textarea></label><br /><input type="submit" value="Register" /></form>';
}
elseif($code == 1){
echo '<p>An account with the username '.$_POST['username'].' already exists. Please enter a different username:</p><form action="" method="post"><input type="hidden" name="password" value="'.$_POST['password'].'" /><input type="hidden" name="confirm" value="'.$_POST['confirm'].'" /><input type="hidden" name="hint" value="'.$_POST['hint'].'" /><input type="hidden" name="name" value="'.$_POST['name'].'" /><label>Username: <input type="text" name="username" /></label><br /><input type="submit" value="Register" />';
}
else{
echo "<p>Please set your account information. <form action='' method='post'><label>Name: <input type='text' name='name' /></label><br /><label>Username: <input type='text' name='username' /></label><br /><label>Password: <input type='password' name='password' /></label><br /><label>Confirm Password: <input type='password' name='confirm' /></label><br /><label>Password Hint: <textarea name='hint'></textarea></label><br /><input type='submit' value='Register' /></form>";
}
?>
</div>
</div>
</div>
</body>
</html>