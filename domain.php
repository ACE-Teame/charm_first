<?php 
require_once "init.php";
require_once CLASS_PATH  . "PDO_class.php";
require_once COMMON_PATH . "common.php";
require_once CLASS_PATH  . 'page_class.php';
$pdo = new server();

// post提交为数据的增、改
if($_POST) {
	$from_data = [
		'domain'        => $_POST['domain'],
		'time'          => time(),
		'money'         => $_POST['money'],
		'record_number' => $_POST['record_number'],
		'company'       => $_POST['company'],
		'nature'        => $_POST['nature'],
	];

	if($_POST['id'] && intval($_POST['id'])) {
		unset($domain['time']);
		$pdo->update('domain', $from_data, 'id=' . intval($_POST['id']));
	}else {
		$intInsID = $pdo->insert('domain',$from_data);
	}
}

// get方式为查询 组装查询条件
$where = '';
if ($_GET) {
	if($_GET['domain']) $where = "domain like '%".$_GET["domain"]. "%' AND";
	if($_GET['nature']) $where .= "nature like '%".$_GET["nature"]. "%' AND";
	// if($_GET['domain']) $where .= 'domain like %'.$_GET['domain']. '% AND';
	if($_GET['record_number']) $where .= "domain like '%".$_GET["record_number"]. "%' AND";

	$where = $where ? rtrim($where, ' AND') : '';
}
// 取出总数量
$count    = $pdo->total('domain', $where);
// 获得当前页码
$now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
$params   = array(
    'total_rows'=> $count, #(必须)
    'method'    => 'html', #(必须)
    'parameter' => 'domain.php?page=$',  #(必须)
    'now_page'  => $now_page,  #(必须)
    'list_rows' => PAGE_NUM, #(可选) 默认为15
);
// 实例化分页类
$objPage  = new page($params);
// 分页
$page_str = $objPage->show($now_page);

// 计算偏移量
$offset   = PAGE_NUM * ($now_page - 1);
// 取出数据
$arrData =  $pdo->select('domain', $where, '', '', "$offset," . PAGE_NUM);
// 一维数组转为二维
if (count($arrData) == count($arrData, 1)) {
	$tmpData         = $arrData;
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
		<?php require ('sidebar.php');?>
		<div class="container-right">
			<?php require ('header.php');?>
			<div class="main">
				<h2>域名管理</h2>
				<div class="operate">
					<a href="#" class="btn add">新增</a>
					<a href="javascript:document.search.submit()" class="btn search">查询</a>
				</div>
				<form action="#" class="searchForm" method="GET" name="search">
					<div class="entry">
						<label>域名:</label>
						<input type="text" name="domain" placeholder="http://">
					</div>
					<div class="entry">
						<label>性质:</label>
						<input type="text" name="nature" placeholder="企业/个人">
					</div>
					<div class="entry">
						<label>时间范围:</label>
						<input type="text" name="starttime" placeholder="起始时间"> - 
						<input type="text" name="endtime" placeholder="结束时间">
					</div>
					<div class="entry">
						<label>备案号:</label>
						<input type="text" name="record_number" placeholder="粤ICP备XXX号-1">
					</div>						
				</form>

				<div class="table">
					<table>
						<thead>
							<tr>
								<th>序号</th>
								<th>域名</th>
								<th>日期</th>
								<th>费用(元)</th>
								<th>备案号</th>
								<th>域名所属公司</th>
								<th>性质</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if($arrData) { foreach ($arrData as $key => $value){ ?>
								<tr>
									<td><?php echo $value['id'] ?></td>
									<td><?php echo $value['domain'] ?></td>
									<td><?php echo date('Y-m-d H:i:s', $value['time']) ?></td>
									<td><?php echo $value['money'] ?></td>
									<td><?php echo $value['record_number'] ?></td>
									<td><?php echo $value['company'] ?></td>
									<td><?php echo $value['nature'] ?></td>
									<td>
										<a href="#" class="btn modify" id="" onclick="modify(<?php echo $value['id'] ?>)">修改</a>
										<a href="#" class="btn delete" onclick="delete_by_id(<?php echo $value['id'] ?>, 'domain')">删除</a>
									</td>
								</tr>
							<?php } } ?>
							
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
						<form action="#" class="operateForm" method="POST" name="form1">
							<div class="entry">
								<input type="hidden" name="id" id="id" value="">
							</div>
							<div class="entry">
								<label>域名:</label>
								<input type="text" name="domain" id="domain" placeholder="http://">
							</div>
							<div class="entry">
								<label>日期</label>
								<input type="text" name="time" id="time" placeholder=""> 
							</div>
							<div class="entry">
								<label>费用:</label>
								<input type="text" name="money" id="money" placeholder="">
							</div>
							<div class="entry">
								<label>备案号:</label>
								<input type="text" name="record_number" id="record_number" placeholder="粤ICP备XXX号-1">
							</div>
							<div class="entry">
								<label>域名所属公司:</label>
								<input type="text" name="company" id="company" placeholder="">
							</div>	
							<div class="entry">
								<label>性质:</label>
								<!-- <input type="text" name="nature" id="nature" placeholder="企业/个人"> -->
								<select name="nature" id="nature">
									<option value ="企业" selected>企业</option>
									<option value ="个人">个人</option>
								</select>
							</div>
						
					</div>
					<div class="operate">					
						<a href="javascript:document.form1.submit();" class="btn save" >保存</a>
						<a href="#" class="btn cancle">取消</a>
					</div>
					</form>
					<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
				</div>
			</div><!-- end popup -->
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script>

		function modify(id) {
			$.get('app.php',{id:id, state:'domain', type:'modi'}, function(data) {
				if(data.status == 200) {
					var result = JSON.parse(data.msg);
					$('#domain').val(result.domain);
					$('#time').val(result.time);
					$('#money').val(result.money);
					$('#record_number').val(result.record_number);
					$('#company').val(result.company);
					$('#nature').val(result.nature);
					$('#id').val(result.id);
				}
				console.log(data);
			}, 'json');
		}
	</script>	
</body>
</html>
