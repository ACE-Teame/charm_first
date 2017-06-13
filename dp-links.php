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
		$domain['time'] = strtotime($domain['time']);
		$pdo->update('section_link', $from_data, 'id=' . intval($_POST['id']));
	}else {
		$intInsID = $pdo->insert('section_link',$from_data);
	}
}

// get方式为查询 组装查询条件
$where = '';

if ($_GET) {
	if($_GET['section']) $where = "section like '%".$_GET["section"]. "%' AND";
	if($_GET['domain']) $where .= "domain like '%".$_GET["domain"]. "%' AND";
	if($_GET['state']) $where .= "state like '%".$_GET["state"]. "%' AND";
	if($_GET['start_time']) $where .= 'time > '. strtotime($_GET['start_time']) . ' AND';
	if($_GET['end_time']) $where .= ' time < '. strtotime($_GET['end_time']) . ' AND';
	$where = $where ? rtrim($where, ' AND') : '';
}

$count    = $pdo->total('section_link', $where);
$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;

// 计算偏移量
$offset   = PAGE_NUM * ($now_page - 1);
$arrData =  $pdo->select('section_link', $where, '', '', "$offset," . PAGE_NUM);

array_change($arrData);
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
				<h2>部门链接管理</h2>
				<div class="operate">
					<a href="#" class="btn add">新增</a>
					<a href="javascript:document.search.submit()" class="btn search">查询</a>
				</div>
				<form action="#" method="GET" name="search">
					<div class="entry">
						<label>部门:</label>
						<input type="text" name="section" placeholder="">
					</div>
					<div class="entry">
						<label>域名:</label>
						<input type="text" name="domain" placeholder="http://">
					</div>
					<div class="entry">
						<label>时间范围:</label>
						<input type="text" name="start_time" placeholder="起始时间" onClick="WdatePicker()"> - 
						<input type="text" name="end_time" placeholder="结束时间" onClick="WdatePicker()">
					</div>
					<div class="entry">
						<label>状态:</label>
						<input type="text" name="state" placeholder="">
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
									<td><a href="<?php echo $value['domain'] ?>" class="domainLink"><?php echo $value['domain'] ?></a></td>
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
							<?php if ($count > PAGE_NUM){ 
								// 实例化分页类
								$objPage  = new page($count, PAGE_NUM, $now_page, '?page={page}' . get_search_url());
								echo $objPage->myde_write();
							} ?>
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
								<!-- <input type="text" name="section" id="section" placeholder=""> -->
								<select name="section" id="section">
									<option value ="扶翼" selected>扶翼</option>
									<option value ="微博">微博</option>
									<option value="陌陌">陌陌</option>
									<option value="TSA">TSA</option>
									<option value="KA">KA</option>
									<option value="海外">海外</option>
								</select>
							</div>
							<div class="entry">
								<label>域名</label>
								<input type="text" name="domain" id="domains" placeholder="http://"> 
							</div>
							<div class="entry">
								<label>客户:</label>
								<input type="text" name="costomer" id="costomer" placeholder="">
							</div>
							<div class="entry">
								<label>日期:</label>
								<input type="text" name="time" id="time" placeholder="" onclick="WdatePicker()">
							</div>
							<div class="entry">
								<label>状态:</label>
								<!-- <input type="text" name="state" id="state" placeholder=""> -->
								<select name="state" id="state">
									<option value ="新链接" selected>新链接</option>
									<option value ="改版">改版</option>
								</select>
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
		</div>
	</div>
	<?php common_js() ?>
	<script>
		function modify(id) {
			$.get('app.php',{id:id, state:'seclink', type:'modi'}, function(data) {
				if(data.status == 200) {
					var result = JSON.parse(data.msg);
					$('#domains').val(result.domain);
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