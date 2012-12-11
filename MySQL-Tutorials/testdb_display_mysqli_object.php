<html>
<head>
<basefont face="Arial">
</head>
<body>
	<?php

		function check_connection_has_error($mysqli_object, $result){
			if(!$result){
				$err_no = $mysqli_object->errno;
				$err_msg = $mysqli_object->error;
				die ("MySQL error $err_no: $err_msg ");
			}
		}

		//set db access vars
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'testdb';

		$mysqli = new mysqli($host, $user, $pass, $db);

		if(mysqli_connect_errno()){
			die("Unable to connect to the database server");
		}

		$query = "SELECT * FROM symbols";
		$result = $mysqli->query($query);
		check_connection_has_error($mysqli, $result);
		/*if($result = $mysqli->query($query)){*/
			if($result->num_rows > 0){
				echo "<table cellpadding=10 border=1>";
				while ($rows = $result->fetch_array()) {
					echo "<tr>";
					echo "<td>".$rows[0]."</td>";
					echo "<td>".$rows[1]."</td>";
					echo "<td>".$rows[2]."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}else{
				echo "No rows found";
			}
		/*}else{
			echo "Error in query: $query. ".$mysqli->error;
		}*/

		$mysqli->close();

	?>
</body>
</html>