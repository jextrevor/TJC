<?php
include('page.php');
include('user.php');
$title = 'Inbox';
include('header.php');
if(isset($_SESSION['username']) && $correct == true){
echo '
<h2>Inbox</h2>
<p>This is your inbox, where you can send messages and view messages.</p>
<a href="message.php">New Message</a>';
$usernamequery = addslashes($_SESSION['name']);
$query = "select * from messages where Receiver = '$usernamequery' order by Date desc";
$result = mysql_query($query);
$num = mysql_num_rows($result);
echo '<p>There are '.$num.' messages in your inbox.</p>';
if($num > 0){
echo '<table border="1">
	<tr><th>From</th><th>Subject</th><th>Delete</th><th>View</th><th>Date Sent</th></tr>';
for($i = 0; $i < $num; $i++){
$array = mysql_fetch_array($result);
echo '<tr>';
echo '<td>'.stripslashes($array['Sender']).'</td>';
echo '<td>'.stripslashes($array['Subject']).'</td>';
echo '<td><a href="delete.php?date='.stripslashes($array['Date']).'">Delete</a></td>';
echo '<td><a href="view.php?date='.stripslashes($array['Date']).'">View</a></td>';
echo '<td>'.stripslashes($array['Date']).'</td>';
echo '</tr>';
}
echo '</table>';
}
}
else{
echo '<h2>Inbox</h2>
	<p>You must be <a href="">logged in</a> to view your inbox.</p>';
}
?>
</div>
</div>
</div>
</body>
</html>