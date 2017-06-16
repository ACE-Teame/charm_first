<?php 
session_start();
require_once "init.php";
require_once CLASS_PATH  . "PDO_class.php";
require_once COMMON_PATH . "common.php";
$pdo = new server();
if($_POST) {
	$where = '';
	if($_POST['name']) $where = 'name=' . "'" . trim($_POST['name']) . "'";
	$arrData = $pdo->select('user', $where);
	if(is_array($arrData[0])) {
		if(password_verify(trim($_POST['password']), $arrData[0]['password']))  {
			$_SESSION['uid']  = $arrData[0]['id'];
			$_SESSION['name'] = $arrData[0]['name'];
		}else {
			echo "<p style='color:red;'>登陆失败</p>";
		}	
	}
}
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
