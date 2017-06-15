<?php 

require_once "init.php";
require_once CLASS_PATH  . "PDO_class.php";

require_once COMMON_PATH . "common.php";

require_once CLASS_PATH  . 'page_class.php';
$pdo = new server();

// post提交为数据的增、改
if($_POST) {
	$from_data = [
		'name'       => $_POST['name'],
		'password'   => password_hash($_POST['password'], PASSWORD_DEFAULT),
		'time'       => time(),
		'group_name' => $_POST['group_name'],
		'status'     => ($_POST['status'] == '启用' || empty($_POST['status'])) ? 1 : 0
	];

	if($_POST['id'] && intval($_POST['id'])) {
		if(empty($_POST['password'])) unset($from_data['password']);
		$pdo->update('user', $from_data, 'id=' . intval($_POST['id']));
	}else {
		$intInsID = $pdo->insert('user', $from_data);
	}
}

// get方式为查询 组装查询条件
$where = '';

if ($_GET) {
	if($_GET['domain']) $where = "domain like '%".$_GET["domain"]. "%' AND";
	if($_GET['nature']) $where .= "nature like '%".$_GET["nature"]. "%' AND";
	if($_GET['record_number']) $where .= "record_number like '%".$_GET["record_number"]. "%' AND";
	if($_GET['start_time']) $where .= 'time > '. strtotime($_GET['start_time']) . ' AND';
	if($_GET['end_time']) $where .= ' time < '. strtotime($_GET['end_time']) . ' AND';

	$where = $where ? rtrim($where, ' AND') : '';
}

// echo $where;
// 取出总数量
$count    = $pdo->total('user', $where);
// 获得当前页码
$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;

// 计算偏移量
$offset   = PAGE_NUM * ($now_page - 1);
// 取出数据
$arrData =  $pdo->select('user', $where, '', '', "$offset," . PAGE_NUM);
// 一维数组转为二维
array_change($arrData);
// p($arrData);

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
				<h2>权限管理</h2>
				<div class="operate">
					<a href="#" class="btn add">新增</a>
				</div>

				<div class="table">
					<table>
						<thead>
							<tr>
								<th>序号</th>
								<th>用户名</th>
								<th>权限</th>
								<th>状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if($arrData || $arrData[0]) { foreach ($arrData as $key => $value){ ?>
								<tr>
									<td><?php echo $value['id'] ?></td>
									<td><?php echo $value['name'] ?></td>
									<td><?php echo empty($value['group_name']) ? '管理员' : $value['group_name'] ?></td>
									<td><?php echo ($value['status'] == 1) ? '启用' : '停用';?></td>
									<td>
										<a href="#" class="btn modify" id="" onclick="modify(<?php echo $value['id'] ?>)">修改</a>
										<a href="#" class="btn delete" onclick="delete_by_id(<?php echo $value['id'] ?>, 'user')">删除</a>
									</td>
								</tr>
							<?php } } ?>
						</tbody>
					</table>
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
								<label>用户名:</label>
								<input type="text" name="name" id="name" placeholder="">
							</div>
							<div class="entry">
								<label>密码</label>
								<input type="text" name="password" id="password" placeholder=""> 
							</div>
							<div class="entry">
								<label>权限:</label>
								<input type="text" name="group_name" id="group_name" placeholder="">
							</div>
							<div class="entry">
								<label>状态:</label>
								<input type="text" name="status" id="status" placeholder="">
							</div>
						</form>
					</div>
					<div class="operate">					
						<a href="javascript:document.form1.submit();" class="btn save" >保存</a>
						<a href="#" class="btn cancle">取消</a>
					</div>
					<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
				</div>
			</div><!-- end popup -->
		</div>
	</div>
	<?php common_js() ?>
	<script>
		function modify(id) {
			$.get('app.php',{id:id, state:'user', type:'modi'}, function(data) {
				if(data.status == 200) {
					var result = JSON.parse(data.msg);
					$('#name').val(result.name);
					$('#group_name').val(result.group_name);
					$('#status').val(result.status == '1' ? '启用' : '停用');
					$('#id').val(result.id);
				}
				// console.log(data);
			}, 'json');
		}
	</script>	
</body>
</html>