<?php
$con = mysql_connect('localhost','root','');
mysql_select_db('chatbox', $con);

$result1 = mysql_query("SELECT * FROM logs ORDER BY id DESC");

while($extract = mysql_fetch_array($result1)) {
	echo "<b>" . $extract['username'] . "</b>: <span>" . $extract['msg'] . "</span><br />";
}

?>