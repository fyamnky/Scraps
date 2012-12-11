<html>
	<head>
		<basefont face="Arial">
	</head>
<body>
	<?php
		if (!isset($_POST['submit'])){
	?>
		<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
			Country: <input type="text" name="country">
			National Animal: <input type="text" name="animal">
			<input type="submit" name="submit">
		</form>
	<?php
		}else{
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "testdb";

			$country = empty($_POST['country']) ? die("ERROR: Enter a country") : mysql_escape_string($_POST['country']);
			$animal = empty($_POST['animal']) ? die('ERROR: Enter an animal') : mysql_escape_string($_POST['animal']);

			$connection = mysql_connect($host, $user, $pass) or die("Unable to connect to database server");
			mysql_select_db($db) or die("Unable to select database");

			$query = "INSERT INTO symbols (country, animal) VALUES ('$country', '$animal')";
			$result = mysql_query($query) or die ("ERROR: Malformed query - $query ".mysql_error());

			echo "New record inserted with ID ".mysql_insert_id();

			$query_2 = "SELECT * FROM symbols";
			$result_2 = mysql_query($query_2) or die("Error: Malformed Query -> $query_2 ".mysql_error());
			var_dump($result_2);
			if (mysql_num_rows($result_2) > 0){
					echo "<table cellpadding = 10 border = 1>";
					while ($rows = mysql_fetch_array($result_2) ){
						echo "<tr>";
						echo "<td>".$rows[0]."</td>";
						echo "<td>".$rows[1]."</td>";
						echo "<td>".$rows[2]."</td>";
						echo "</tr>";
					}
					echo "</table>";
			}else{
				echo "No rows available to display";
			}
			

			mysql_close($connection);
		}
	?>
</body>
</html>