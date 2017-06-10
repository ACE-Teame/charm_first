<?php 
require_once "init.php";
require_once CLASS_PATH  . "PDO_class.php";
require_once COMMON_PATH . "common.php";
require_once CLASS_PATH  . 'page_class.php';
$pdo = new server();
if($_POST) {
	$from_data = [
		'section'  => $_POST['section'],
		'domain'   => $_POST['domain'],
		'time'     => time(),
		'costomer' => $_POST['costomer'],
		'state'    => $_POST['state'],
	];

	if($_POST['id'] && intval($_POST['id'])) {
		unset($domain['time']);
		$pdo->update('section_link', $from_data, 'id=' . intval($_POST['id']));
	}else {
		$intInsID = $pdo->insert('section_link',$from_data);
	}
}

$count    = $pdo->total('section_link');
$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
$params   = array(
    'total_rows'=> $count, #(必须)
    'method'    => 'html', #(必须)
    'parameter' => 'dp-links.php?page=$',  #(必须)
    'now_page'  => $now_page,  #(必须)
    'list_rows' => PAGE_NUM, #(可选) 默认为15
);
// 实例化分页类
$objPage  = new page($params);
// 分页
$page_str = $objPage->show($now_page);

// 计算偏移量
$offset   = PAGE_NUM * ($now_page - 1);
$arrData =  $pdo->select('section_link', '', '', '', "$offset," . PAGE_NUM);
if (count($arrData) == count($arrData, 1)) {
	$tmpData   = $arrData;
	$arrData   = [];
	$arrData[] = $tmpData;
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
		<div class="container-left">
			<div class="logo">
				<div class="img"><a href="index.html"><img src="images/logo.png" alt=""></a></div>
			</div>
			<ul class="nav">
				<li>
				    <a href="index.php" class="active menu_list">首页</a>
				</li>
				<li>
				    <a href="domain.php" class="menu_list">域名管理</a>
				</li>
				<li>
				    <a href="dp-links.php" class="menu_list">部门链接管理</a>
				</li>
				<li>
				    <a href="links.php" class="menu_list">个人链接管理</a>
				</li>
				<li>
				    <a href="permit.php" class="menu_list">权限管理</a>
				</li>
			</ul>
		</div>
		<div class="container-right">
			<div class="top">
				<ul class="handle">
					<li><a href="#" class="login">登录</a></li>
				</ul>
			</div>
			<div class="main">
				<h2>部门链接管理</h2>
				<div class="operate">
					<a href="#" class="btn add">新增</a>
					<a href="#" class="btn search">查询</a>
				</div>
				<form action="#">
					<div class="entry">
						<label>部门:</label>
						<input type="text" name="domain" placeholder="">
					</div>
					<div class="entry">
						<label>域名:</label>
						<input type="text" name="nature" placeholder="http://">
					</div>
					<div class="entry">
						<label>时间范围:</label>
						<input type="text" name="starttime" placeholder="起始时间"> - 
						<input type="text" name="endtime" placeholder="结束时间">
					</div>
					<div class="entry">
						<label>状态:</label>
						<input type="text" name="record" placeholder="">
					</div>						
				</form>

				<div class="table">
					<table>
						<thead>
							<tr>
								<th>序号</th>
								<th>部门</th>
								<th>域名</th>
								<th>日期</th>
								<th>客户</th>
								<th>状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if ($arrData): ?>
							<?php foreach ($arrData as $key => $value): ?>
								<tr>
									<td><?php echo $value['id'] ?></td>
									<td><?php echo $value['section'] ?></td>
									<td><?php echo $value['domain'] ?></td>
									<td><?php echo date('Y-m-d H:i:s', $value['time']) ?></td>
									<td><?php echo $value['costomer'] ?></td>
									<td><?php echo $value['state'] ?></td>
									<td>
										<a href="#" class="btn modify" onclick="modify(<?php echo $value['id'] ?>)">修改</a>
										<a href="#" class="btn delete" onclick="delete_by_id(<?php echo $value['id'] ?>, 'seclink')">删除</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
						</tbody>
					</table>
					<div class="paginate">
						<ul class="clear">
							<?php echo $page_str ?>
						</ul>
					</div>
				</div> <!-- end table -->
			</div><!-- end main -->

			<div class="popup">
				<div class="content">
					<div class="title">新增</div>
					<div class="form">						
						<form action="#" class="operateForm" name="form1" method="POST">
							<div class="entry">
								<input type="hidden" name="id" id="id">
							</div>
							<div class="entry">
								<label>部门:</label>
								<input type="text" name="section" id="section" placeholder="">
							</div>
							<div class="entry">
								<label>域名</label>
								<input type="text" name="domain" id="domain" placeholder="http://"> 
							</div>
							<div class="entry">
								<label>日期:</label>
								<input type="text" name="time" id="time" placeholder="">
							</div>
							<div class="entry">
								<label>客户:</label>
								<input type="text" name="costomer" id="costomer" placeholder="">
							</div>
							<div class="entry">
								<label>状态:</label>
								<input type="text" name="state" id="state" placeholder="">
							</div>
						</form>
					</div>
					<div class="operate">					
						<a href="javascript:document.form1.submit();" class="btn save">保存</a>
						<a href="#" class="btn cancle">取消</a>
					</div>
					<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
				</div>
			</div><!-- end popup -->

			<div class="popupLogin">
				<div class="content">
					<div class="title">登录</div>
					<div class="form">						
						<form action="#" class="loginForm">
							<div class="entry">
								<input type="hidden" name="dplinkID">
							</div>
							<div class="entry">
								<label>用户名:</label>
								<input type="text" name="username" placeholder="">
							</div>
							<div class="entry">
								<label>密码:</label>
								<input type="password" name="password" placeholder=""> 
							</div>
						</form>
					</div>
					<div class="operate">					
						<a href="#" class="btn save">登录</a>
						<a href="#" class="btn cancle">取消</a>
					</div>
					<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<script>
		function modify(id) {
			$.get('app.php',{id:id, state:'seclink', type:'modi'}, function(data) {
				if(data.status == 200) {
					var result = JSON.parse(data.msg);
					$('#domain').val(result.domain);
					$('#section').val(result.section);
					$('#time').val(result.time);
					$('#costomer').val(result.costomer);
					$('#state').val(result.state);
					$('#id').val(result.id);
				}
				console.log(data);
			}, 'json');
		}
	</script>
</body>
</html>