<?php
include('page.php');
$code = 0;
if(isset($_POST['action'])){
	if($_POST['action'] == 'remove'){
		$usernamequery = addslashes($_SESSION['username']);
		$query = "delete from users where Username = '$usernamequery'";
		mysql_query($query);
		$code = 1;
	}
	elseif($_POST['action'] == 'change'){
		$usernamequery = addslashes($_SESSION['username']);
		if($_POST['password'] == $_POST['confirm']){
		$passwordquery = addslashes(crypt($_POST['password'], "xx"));
		$hintquery = addslashes($_POST['hint']);
		$query = "update users set Password = '$passwordquery', PasswordHint = '$hintquery' where Username = '$usernamequery'";
		mysql_query($query);
		$_SESSION['password'] = $_POST['password'];
		$code = 2;
		}
		else{
		$code = 3;
		}
	}
}
include('user.php');
$title = 'Account Settings';
include('header.php');
?>
<h2>Account Settings</h2>
<?php 
if($code == 0 && isset($_SESSION['username'])){
echo '<p>Remove Account:</p><form action="" method="post"><input type="hidden" name="action" value="remove" /><input type="submit" value="Remove Account" /></form><p>Change Password:</p><form action="" method="post"><input type="hidden" name="action" value="change" /><label>New Password: <input type="password" name="password" /></label><br /><label>Confirm New Password: <input type="password" name="confirm" /></label><br /><label>Password Hint: <textarea name="hint"></textarea></label><br /><input type="submit" value="Change Password" /></form>';
}
elseif($code == 1){
echo '<p>Your account has been removed.</p>';
}
elseif($code == 2){
echo '<p>Your password has been changed.</p>';
}
elseif($code == 3 && isset($_SESSION['username'])){
echo '<p>Please reconfirm your new password.</p><form action="" method="post"><input type="hidden" name="action" value="change" /><input type="hidden" name="hint" value="'.$_POST['hint'].'" /><label>New Password: <input type="password" name="password" /></label><br /><label>Confirm New Password: <input type="password" name="confirm" /></label><br /><input type="submit" value="Change Password" /></form>';
}
else{
echo '<p>You must <a href="login.php">log in</a> to change account settings.</p>';
}
?>
</div>
</div>
</div>
</body>
</html>