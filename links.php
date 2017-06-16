<?php 
require_once "init.php";
require_once COMMON_PATH . "common.php";
require_once CLASS_PATH  . "PDO_class.php";
require_once CLASS_PATH  . 'page_class.php';
$pdo = new server();
if($_POST) {
	$from_data = [
		'leader'        => $_POST['leader'],
		'time'          => time(),
		'original_link' => $_POST['original_link'],
		'spread_link'   => $_POST['spread_link'],
		'industry'      => $_POST['industry'],
		'is_h5'         => $_POST['is_h5'],
		'state'         => $_POST['state'],
	];

	if($_POST['id'] && intval($_POST['id'])) {
		$from_data['time'] = strtotime($_POST['time']);
		$pdo->update('person_link', $from_data, 'id=' . intval($_POST['id']));
	}else {
		$intInsID = $pdo->insert('person_link',$from_data);
	}
}

// get方式为查询 组装查询条件
$where = '';
if ($_GET) {
	if($_GET['leader']) $where = "leader like '%".$_GET["leader"]. "%' AND";
	if($_GET['original_link']) $where .= "original_link like '%".$_GET["original_link"]. "%' AND";
	if($_GET['state']) $where .= "state like '%".$_GET["state"]. "%' AND";
	if($_GET['start_time']) $where .= 'time > '. strtotime($_GET['start_time']) . ' AND';
	if($_GET['end_time']) $where .= ' time < '. strtotime($_GET['end_time']) . ' AND';
	$where = $where ? rtrim($where, ' AND') : '';
}

$count    = $pdo->total('person_link', $where);
$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;

// 计算偏移量
$offset   = PAGE_NUM * ($now_page - 1);
$arrData  =  $pdo->select('person_link', $where, '', '', "$offset," . PAGE_NUM);
// array_change($arrData);
$arrState  =  $pdo->select('person_link', '', '', '', "", 'state');


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
				<h2>个人链接管理</h2>
				<div class="operate">
					<a href="#" class="btn add">新增</a>
					<a href="javascript:document.search.submit()" class="btn search">查询</a>
				</div>
				<form action="#" method="GET" name="search">
					<div class="entry">
						<label>负责人:</label>
						<input type="text" name="leader" placeholder="">
					</div>
					<div class="entry">
						<label>原始链接:</label>
						<input type="text" name="original_link" placeholder="http://">
					</div>
					<div class="entry">
						<label>时间范围:</label>
						<input type="text" name="start_time" placeholder="起始时间" onClick="WdatePicker()"> - 
						<input type="text" name="end_time" placeholder="结束时间" onClick="WdatePicker()"
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
								<th>负责人</th>
								<th>原始链接</th>
								<th>推广链接</th>
								<th>行业</th>								
								<th>时间</th>
								<th>是否是H5</th>
								<th>状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if ($arrData): ?>
							<?php foreach ($arrData as $value): ?>
								<tr>
									<td><?php echo $value['id'] ?></td>
									<td><?php echo $value['leader'] ?></td>
									<td><a href="<?php echo $value['original_link'] ?>" class="domainLink"><?php echo $value['original_link'] ?></a></td>
									<td><a href="<?php echo $value['spread_link'] ?>" class="spreadLink"><?php echo $value['spread_link'] ?></a></td>
									<td><?php echo $value['industry'] ?></td>
									<td><?php echo date('Y-m-d H:i:s', $value['time']) ?></td>
									<td><?php echo $value['is_h5'] ?></td>
									<td><?php echo $value['state'] ?></td>
									<td>
										<a href="#" class="btn modify" onclick="modify(<?php echo $value['id'] ?>)">修改</a>
										<a href="#" class="btn delete" onclick="delete_by_id(<?php echo $value['id'] ?>, 'perlink')">删除</a>
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
							}  ?>
						</ul>
					</div>
				</div> <!-- end table -->
			</div><!-- end main -->

			<div class="popup">
				<div class="content">
					<div class="title">新增</div>
					<div class="form">				
						<form action="#" class="operateForm" method="POST" name="form1">
							<div class="entry">
								<input type="hidden" name="id" id="id">
							</div>
							<div class="entry">
								<label>负责人:</label>
								<input type="text" name="leader" id="leader" placeholder="">
							</div>
							<div class="entry">
								<label>原始链接</label>
								<input type="text" name="original_link" id="original_link" placeholder="http://"> 
							</div>
							<div class="entry">
								<label>推广链接:</label>
								<input type="text" name="spread_link" id="spread_link" placeholder="http://">
							</div>
							<div class="entry">
								<label>行业:</label>
								<input type="text" name="industry" id="industry" placeholder="">
							</div>
							<div class="entry">
								<label>时间:</label>
								<input type="text" name="time" id="time" placeholder="" onclick="WdatePicker()">
							</div>	
							<div class="entry">
								<label>是否是H5:</label>
								<!-- <input type="text" name="is_h5" id="is_h5" placeholder=""> -->
								<select name="is_h5" id="is_h5" >
									<option value ="是" selected>是</option>
									<option value ="否">否</option>
								</select>
							</div>
							<div class="entry">
								<label>状态:</label>
								<!-- <input type="text" name="state" id="state" placeholder=""> -->
								<select name="state" id="state">
									<?php if ($arrState){ $tmpSelect = [];?>
										<?php foreach ($arrState as $value){ 
											if(in_array($value['state'], $tmpSelect)) continue;
											$tmpSelect[] = $value['state']; ?>
											<option value ="<?php echo $value['state']?>" selected><?php echo $value['state']?></option>
										<?php } ?>
									<?php } ?>
								</select>
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
			$.get('app.php',{id:id, state:'perlink', type:'modi'}, function(data) {
				if(data.status == 200) {
					var result = JSON.parse(data.msg);
					$('#leader').val(result.leader);
					$('#original_link').val(result.original_link);
					$('#spread_link').val(result.spread_link);
					$('#industry').val(result.industry);
					$('#time').val(result.time);
					$('#is_h5').val(result.is_h5);
					$('#state').val(result.state);
					$('#id').val(result.id);
				}
				console.log(data);
			}, 'json');
		}
	</script>
</body>
</html>