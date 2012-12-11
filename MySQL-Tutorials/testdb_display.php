<html>
<head>
<basefont face="Arial">
</head>
<body>
	<?php

		//set db access vars
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'testdb';

		//open db connection
		$connection = mysql_connect($host, $user, $pass) or die("Unable to connect to the database!");

		//select database
		mysql_select_db($db) or die("Unable to select the database");

		//create query
		$query = "SELECT * FROM symbols";

		//execute query
		$result = mysql_query($query) or die ("Error in query: $query. ".$mysql_error());

		//see if any rows exist
		if (mysql_num_rows($result) > 0){
			//rows exist -> print them one after another in a table

			echo "<table cellpadding=10 border = 1>";
			/*while ($row = mysql_fetch_row($result)){
				echo "<tr>";
				echo "<td>".$row[0]."</td>";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "</tr>";
			}

			while (list($id, $country, $animal) = mysql_fetch_row($result)){
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$country</td>";
				echo "<td>$animal</td>";
				echo "</tr>";
			}

			while ($row = mysql_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['country']."</td>";
				echo "<td>".$row['animal']."</td>";
				echo "</tr>";
			}*/

			while($row = mysql_fetch_object($result)){
				echo "<tr>";
				echo "<td>".$row->id."</td>";
				echo "<td>".$row->country."</td>";
				echo "<td>".$row->animal."</td>";
				echo "</tr>";
			}

			echo "</table>";

		}else{
			//no rows -> exit, print error message
			echo "No rows found!";
		}

		//free result set memory
		mysql_free_result($result);

		//close connection to db
		mysql_close($connection);
	?>
</body>
</html>