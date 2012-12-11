<?php

$continued = mysql_connect("localhost", "root", "");
if ($continued){
	echo "Connection is succeed";
}else{
	echo "Connection is fail";
}
$make = mysql_create_db("data_root");
if($make){
	echo "<br><br>Database data_root succeeds in making";
}else{
	echo "<br><br>Database data_root fails in making";
}
?>