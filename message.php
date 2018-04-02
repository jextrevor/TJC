<?php
include('page.php');
include('user.php');
$title = 'New Message';
include('header.php');
?>
<h2>New Message</h2>
<?php
if(isset($_SESSION['username'])){
echo '<form action="send.php" method="post">
	<label>To: <input type="text" name="to" /></label><br />
	<label>Subject: <input type="text" name="subject" /></label><br />
	<label>Message:</label><br />
	<textarea name="message"></textarea>
	<br />
	<input type="submit" name="Send" />
	</form>';
}
else{
echo '<p>You must be <a href="login.php">logged in</a> to send a message.</p>';
}
?>
</div>
</div>
</div>
</body>
</html>