<?php
include('page.php');
$send = false;
$valid = true;
if(isset($_POST['message']) && isset($_SESSION['username'])){
$send = true;
$fromq = addslashes($_SESSION['name']);
$toq = addslashes($_POST['to']);
$query = "select * from users where Name = '$toq'";
$result = mysql_query($query);
if(mysql_num_rows($result) == 0){
$valid = false;
}
else{
$subjectq = addslashes($_POST['subject']);
$messageq = addslashes($_POST['message']);
$date = getdate();
$dateq = addslashes($date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds']);
$query = "insert into messages values ('$fromq','$toq','$messageq','$subjectq','$dateq')";
mysql_query($query);
}
}
include('user.php');
$title = 'Send Message';
include('header.php');
?>
<h2>Send Message</h2>
<?php
if(isset($_SESSION['username']) && $correct){
if($send == false){
echo '<p>Please <a href="message.php">create</a> a message before going to this page.</p>';
}
elseif($valid == false){
echo '<p>Invalid name. Please enter a different name:</p>
	<form action="" method="post">
	<input type="hidden" name="subject" value="'.$_POST['subject'].'" />
	<input type="hidden" name="message" value="'.$_POST['message'].'" />
	<label>To: <input type="text" name="to" /></label><br />
	<input type="submit" value="Send" />
	</form>';
}
else{
echo '<p>Your message has been sent.</p><a href="inbox.php">Return to Inbox</a>';
}
}
else{
echo '<p>Please <a href="login.php">log in</a> to send messages.</p>';
}
?>
</div>
</div>
</div>
</body>
</html>