<?php
include('page.php');
$code = 0;
if(isset($_POST['username'])){
	$usernamequery = addslashes($_POST['username']);
	$query = "select PasswordHint from users where Username = '$usernamequery'";
	$result = mysql_query($query);
	if(mysql_num_rows($result) == 0){
	$code = 1;
	}
	else{
	$array = mysql_fetch_array($result);
	$passhint = stripslashes($array['PasswordHint']);
	$code = 2;
	}
}
include('user.php');
$title = 'Forgot Password';
include('header.php');
?>
<h2>Forgot Password</h2>
<?php
if($code == 0){
echo '<p>Please enter your username to display your password hint.</p><form action="" method="post"><label>Username: <input type="text" name="username" /></label><br /><input type="submit" value="Submit" /></form>';
}
elseif($code == 1){
echo '<p>No such account exists. Please try again.</p><form action="" method="post"><label>Username: <input type="text" name="username" /></label><br /><input type="submit" value="Submit" /></form>';
}
elseif($code == 2){
echo '<p>The password hint for the account '.$_POST['username'].' is:</p><p>'.$passhint.'</p><p>Enter the password for '.$_POST['username'].' to log in:</p><form action="login.php" method="post" ><input type="hidden" name="username" value="'.$_POST['username'].'" /><label>Password: <input type="password" name="password" /></label><br /><input type="submit" value="Login" /></form>';
}
?>
</div>
</div>
</div>
</body>
</html>