<?php
include('page.php');
include('user.php');
$title = 'View Message';
include('header.php');
?>
<h2>View Message</h2>
<?php
if(isset($_SESSION['username']) && $correct){
$dateq = addslashes($_GET['date']);
$nameq = addslashes($_SESSION['name']);
$query = "select * from messages where Date = '$dateq' and Receiver = '$nameq'";
$result = mysql_query($query);
if(mysql_num_rows($result) == 0){
echo '<p>No such message. Please <a href="">try again</a> or go back to your <a href="inbox.php">inbox</a> and reselect the message.</p>';
}
else{
$array = mysql_fetch_array($result);
echo '<p>From: '.stripslashes($array['Sender']).'</p>';
echo '<p>Subject: '.stripslashes($array['Subject']).'</p>';
echo '<p>Date Sent: '.stripslashes($array['Date']).'</p>';
echo '<p>'.stripslashes($array['Message']).'</p>';
echo '<p><a href="inbox.php">Back to Inbox</a></p>';
}
}
else{
echo '<p>You must <a href="login.php">log in</a> to view a message.</p>';
}
?>
</div>
</div>
</div>
</body>
</html>