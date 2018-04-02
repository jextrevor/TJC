<?php 
include('page.php');
include('user.php');
$title = 'Home';
include('header.php');
?>
<h2>Home</h2>
<?php 
if(isset($_SESSION['username']) && $correct == true){
echo '<p>Welcome, '.$_SESSION['name'].'.</p>';
}
else{
echo '<p>Welcome to Trevor Jex Communications. Note that this website does not exist, so do not rely on it. Please <a href="login.php">log in</a> or <a href="signup.php">sign up</a> if you don\'t have an account.</p>';
}
?>
</div>
</div>
</div>
</body>
</html>