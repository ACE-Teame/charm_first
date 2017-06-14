<?php
require_once "init.php";
require_once CLASS_PATH  . "PDO_class.php";
require_once COMMON_PATH . "common.php";
$arrGet = $_GET;
$id     = intval($arrGet['id']);
$pdo    = new server();
if($arrGet['type'] == 'modi') {
	// 查询域名管理数据
	if($arrGet['state'] == 'domain' && $id) {
		$data = $pdo->select('domain', 'id=' . $id);
		
	// 查询部门链接数据
	}else if($arrGet['state'] == 'seclink' && $id) {
		$data = $pdo->select('section_link', 'id=' . $id);
	}else if($arrGet['state'] == 'perlink' && $id) {
		$data = $pdo->select('person_link', 'id=' . $id);
	}
	
	if($data && is_array($data)) {
		$data[0]['time'] = date('Y-m-d H:i:s', $data[0]['time']);
		ajaxReturn(200, json_encode($data[0]));
	}
}

if($arrGet['type'] == 'del') {
	// 删除域名管理数据
	if($arrGet['state'] == 'domain' && $id) {
		$delId = $pdo->delete('domain', 'id=' . $id);
	// 删除部门链接数据
	}else if($arrGet['state'] == 'seclink' && $id) {
		$delId = $pdo->delete('section_link', 'id=' . $id);
	}else if($arrGet['state'] == 'perlink' && $id) {
		$delId = $pdo->delete('person_link', 'id=' . $id);
	}
	if($delId) ajaxReturn(200);
}
 ?>