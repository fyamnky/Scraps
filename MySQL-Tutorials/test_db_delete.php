<html>
    <head>
        <basefont face="Arial">
    </head>
<body>
    <?php
        
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "testdb";

        $mysqli = new mysqli($host, $user, $password, $database);

        if (mysql_errno()){
            die("Unable to connect!");
        }

        if (isset($_GET['id'])){
            $query = "DELETE FROM symbols WHERE id = ".$_GET['id'];
            if ($mysqli->query($query)){
                //echo $mysqli->affected_rows;
            }else{
                echo "ERROR: Malformed query -> $query ".$mysqli->error;
            }
        }else{
        }

        $query = "SELECT * FROM symbols";

        if($result = $mysqli->query($query)){
            if ($result->num_rows > 0){
                echo "<table cellpadding = 10 border = 1>";
                while ($rows = $result->fetch_array()){
                    echo "<tr>";
                    echo "<td>".$rows[0]."</td>";
                    echo "<td>".$rows[1]."</td>";
                    echo "<td>".$rows[2]."</td>";
                    echo "<td><a href= ".$_SERVER['PHP_SELF']."?id=".$rows[0].">Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            $result->close();
        }else{
            echo "ERROR: Malformed query -> $query".$mysqli->error;
        }
    ?>
</body>

</html>
