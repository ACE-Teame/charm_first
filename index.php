<?php 
require_once "init.php";
require_once CLASS_PATH. "PDO_class.php";
require_once COMMON_PATH. "common.php";

// require_once COMMON_PATH

$pdo = new server();




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
	<title>链接统计系统</title>
	<link rel="stylesheet" type="text/css" href="css/font/iconfont.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	<div class="container clear">
		<?php require ('sidebar.php');?>
		<div class="container-right">
			<?php require ('header.php');?>
			<div class="main">
				<h1>Welcome</h1>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">

	</script>
</body>
</html>
