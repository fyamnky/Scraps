<?php
//mysql_connect(host, name, username, password);

$continued = mysql_connect("localhost", "root", "");

if($continued){
	echo("Connection has succeeded");
}else{
	echo ("Connection has failed");
}

var_dump($continued);
?>