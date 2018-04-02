<html>
<head>
<title><?php echo $title; ?></title>
<link rel="icon" href="Images/mail-icon.png" type="image/png" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="default.css" type="text/css" />
</head>
<body>
<div id="header">
<div align="center">
<div id="contentouter">
<div id="contentinner">
<div id="headertext">Trevor Jex Communications</div></div></div></div></div>
<div align="center">
<div id="contentouter">
<div id="nav"><a href="http://trevor.byjogen.com/">&nbsp;Home&nbsp;</a><?php
if($correct && isset($_SESSION[username])){
echo '<a href="inbox.php">&nbsp;Inbox&nbsp;</a><a href="">&nbsp;Instant Messager&nbsp;</a><a href="logout.php">&nbsp;Logout&nbsp;</a><a href="settings.php">&nbsp;Settings&nbsp;</a>';
}
else{
echo '<a href="login.php">&nbsp;Login&nbsp;</a><a href="signup.php">&nbsp;Sign Up&nbsp;</a>';
}?></div>
<div id="contentinner">