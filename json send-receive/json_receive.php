<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
	<head>
		<title>JSON Receive</title>
		<style type="text/css">
			.file-name{
				display: none;
			}
		</style>
		<script type="text/javascript" src="/js/jquery-1.8.2.js"></script>
		<script type="text/javascript">
			function getFileLocation(){
				var text = $('div.file-name').text();
				var file_name = $.parseJSON(text);
				return file_name.name_attr;
			}	
		</script>
	</head>
	<body>
		<div class="file-name">
		<?php echo json_encode(array("name_attr"=>$_POST['article_type']));?>
		</div>
		<input name = "submit_button" type = "submit" value = "Submit" onclick="alert(getFileLocation())"></input>
	</body>
</html>