<html>

  <head>
  	<title></title>
  </head>

  <body>
  	<?php
  		include('model/simpleCMS.php');

  		$host = 'localhost';
  		$username = "root";
  		$password = "";
  		$table = "testdb";

      $obj = new simpleCMS($host, $username, $password, $table);
  		$obj->connect();

  		if($_POST){
  			$obj->write($_POST);
  		}
  		//determine whether to show the display page or public page
  		echo (isset($_GET['admin'])) ? $obj->display_admin() : $obj->display_public();

  		/*if (isset($_GET['admin'])){
  			echo "private";
  			var_dump($_POST);
  			//$obj->write($_POST);
  			$obj->display_admin();
  		}else{
  			echo "public";
  			$obj->display_public();
  		}*/

  	?>
  </body>

</html>