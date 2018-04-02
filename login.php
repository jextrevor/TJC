<?php
include('page.php');
$loggedin = false;
if(isset($_POST['username'])){
	$usernamequery = addslashes($_POST['username']);
	$passwordquery = addslashes(crypt($_POST['password'],"xx"));
	$query = "select * from users where Username = '".$usernamequery."' and Password = '".$passwordquery."'";
	$result = mysql_query($query);
	$user = mysql_num_rows($result);
	if($user != 1){
	$loggedin = false;
	}
	else{
	$loggedin = true;
	$array = mysql_fetch_array($result);
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['name'] = stripslashes($array['Name']);	
	}
}
include('user.php');
$title = 'Log In';
include('header.php');
if(isset($_POST[username]) && $loggedin == true && isset($_SESSION['username'])){
	echo '<h2>Welcome</h2>
		<p>You have been successfully logged in, '.$_SESSION['name'].'.</p>';
}
elseif(isset($_SESSION['username']) && $correct == true){
	echo '<h2>Welcome</h2>
		<p>Welcome, '.$_SESSION['name'].'.</p>';
}
elseif($loggedin == false && isset($_POST['username'])){
	echo '<h2>Log In</h2>
		<p>Incorrect username or password. Please try again. <a href="forgot.php">Forgot Password</a>?</p>
		<form action="" method="post">
		<label>Username: <input type="text" name="username" /></label><br />
		<label>Password: <input type="password" name="password" /></label><br />
		<input type="submit" value="Login" />
		</form>';
}
else{
	echo '<h2>Log In</h2>
		<p>Enter your username and password, and press Login. <a href="forgot.php">Forgot Password</a>?</p>
		<form action="" method="post">
		<label>Username: <input type="text" name="username" /></label><br />
		<label>Password: <input type="password" name="password" /></label><br />
		<input type="submit" value="Login" />
		</form>';
}
?>
</div>
</div>
</div>
</body>
</html>


	


	
