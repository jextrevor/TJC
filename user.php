<?php
if(isset($_SESSION['username'])){
		$username = addslashes($_SESSION['username']);
		$query = "select Password from users where Username = '$username'";
		$result = mysql_query($query,$connection);
		$user = mysql_num_rows($result);
		if($user == 0){
		$correct = false;
		}
		else{
		$password = $_SESSION['password'];
		$array = mysql_fetch_array($result);
		if(crypt($password,"xx") == stripslashes($array['Password'])){
		$correct = true;
		}
		else{
		$correct = false;
		}
		}
		}
		else{
		$correct = true;
		}
?>