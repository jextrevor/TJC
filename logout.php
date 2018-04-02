<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['name']);
unset($_SESSION['password']);
session_destroy();
$correct = true;
@ $connection = mysql_pconnect('localhost','bhsnll','rlnfqeb');
mysql_select_db('bhsnll_trevor');
$title = 'Logout';
include('header.php');
?>
<h2>Home</h2>
<p>Welcome to Trevor Jex Communications. Please <a href="login.php">log in</a> or <a href="signup.php">sign up</a> if you don't have an account.</p>
</div>
</div>
</div>
</body>
</html>
