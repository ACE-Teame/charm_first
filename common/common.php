<?php 
	/**格式化数组输出**/
	function p($arr, $flag = TRUE)
		{
		echo "<pre>";
		echo '========================开始========================';
		echo "</br>";
		if( $arr ){
			print_r($arr);
		} else {
			echo '此值为空';
		}
		echo "</br>";
		echo '========================结束========================';
		echo "</pre>";
		if($flag == FALSE) exit;
	}

	function ajaxReturn($data, $msg = '') {
		if(is_array($data)) {
			exit(json_encode($data));
		}
		exit(json_encode(array('status' => $data, 'msg' => $msg)));
	}
