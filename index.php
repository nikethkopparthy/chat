<?php

session_start();

if(!isset($_SESSION['username'])) {
?>
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="css/niketh.css">
</head>
<form style="font-family: 'Open Sans', sans-serif;width:25%;" class="nik-card-2 nik-container  nik-margin nik-padding-24 nik-round nik-display-topmiddle" name="form2" action="login.php" method="post">

Username:
<input class="nik-input" type="text" name="username">

<br><br>
Password: 
<input class="nik-input" type="password" name="password">

<br><br>

<center><input class="nik-btn nik-border nik-round nik-center nik-border-green nik-hover-green" type="submit" name="submit" value="Login">
    </center>
<br><br>

<center><a class="nik-panel" href="register.php"><i class="nik-tag nik-blue nik-padding nik-round"><i class="fa fa-user-plus fa-2x"></i><br> No account ? Register here</i></a>
    </center>
    </form>


<?php
exit;
}

?>

<html>
<head>
<title>Chat Box</title>

<script src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/niketh.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>

.niketh{-webkit-animation: hues 2s linear infinite;}

@-webkit-keyframes hues{
from{-webkit-filter:hue-rotate(-360deg);
to{-webkit-filter:hue-rotate(360deg);}
</style>
    
<script>

function submitChat() {
	if(form1.msg.value == '') {
		alert("Enter your message!!!");
		return;
	}
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>

</head>
<body style="font-family: 'Open Sans', sans-serif;background-image:url('images/illl.jpg')" class="nik-row">
<form class="nik-card nik-third nik-center nik-margin nik-padding nik-round-large nik-border nik-border-blue" name="form1">
    <i class="fa fa-user fa-3x"></i><br>
    Welcome 
    <p class="nik-animate-zoom nik-border-blue  nik-padding nik-leftbar nik-rightbar nik-round-large">User name: <b><?php echo $_SESSION['username']; ?></b> <br /></p>
 <br><br>
<textarea placeholder="Type your message" class="nik-input nik-card-4 nik-round-large" name="msg"></textarea><br /><br>
<a class="nik-btn nik-hover-green nik-border-green nik-border nik-round-xxlarge nik-left" href="#" onclick="submitChat()"><i class="fa fa-rocket"></i> Send</a>

<a  class="nik-btn  nik-hover-red nik-border nik-round-xxlarge nik-right nik-border-red" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a><br /><br />

</form>
    <center><h3 class="nik-border nik-border-orange nik-tag nik-transparent nik-text-black">Recent Messages</h3></center>
<div class="nik-card nik-rest nik-margin nik-border  nik-round-large nik-border-orange nik-padding" id="chatlogs">
    
    <p class="nik-padding nik-blue niketh">Please wait while we load your chat history</p>
</div>

</body>