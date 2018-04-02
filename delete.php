<?php
include('page.php');
if(isset($_GET['date']) && isset($_SESSION['username'])){
$dateq = addslashes($_GET['date']);
$nameq = addslashes($_SESSION['name']);
$query = "delete from messages where Receiver = '$nameq' && Date = '$dateq'";
mysql_query($query);
}
include('user.php');
$title = 'Delete Message';
include('header.php');
?>
<h2>Delete Message</h2>
<?php
if(isset($_SESSION['username']) && $correct){
echo '<p>The message has been deleted.</p><a href="inbox.php">Back to Inbox</a>';
}
else{
echo '<p>You must <a href="login.php">log in</a> to delete messages.</p>';
}
?>
</div>
</div>
</div>
</body>
</html>