<html>
    <head>
        <basefont face="Arial">
    </head>
<body>
    <?php

    function check_result_has_error($result){
    	if(!$result) {

    	    $error_number = mysql_errno();

    	    $error_msg = mysql_error();

    	    die("MySQL error $error_number: $error_msg");    
    	}
    }

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "testdb";

    $connection = mysql_connect($host, $user, $pass, $db) or die("Unable to connect to database server");

    $query = "SHOW DATABASES";
    $result = mysql_query($query) or die("ERROR: Malformed query -> $query ".mysql_error());
    check_result_has_error($result);

    echo "<ul>";
    while ($rows = mysql_fetch_array($result)) {
    	echo "<li>".$rows[0];
    	$query2 = "SHOW TABLES FROM ".$rows[0];
    	$result2 = mysql_query($query2) or die("ERROR: Malformed query -> $query ".mysql_error());
    	echo "<ul>";
    	while ($rows2 = mysql_fetch_array($result2)) {
    		echo "<li>".$rows2[0];
    	}
    	echo "</ul>";
    }
    echo "</ul>";

    echo "Client Version: ".mysql_get_client_info()."<br />";
    echo "Server Version: ".mysql_get_server_info()."<br />";
    echo "Protocol Version: ".mysql_get_proto_info()."<br />";
    echo "Host: ".mysql_get_host_info()."<br />";

    $status = mysql_stat();
    echo "Status: ".$status;

    mysql_close($connection);
    ?>
</body>

</html>