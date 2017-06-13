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

	/**
	 * ajax返回json数据
	 * @param  int/array $data 状态码/数组数据
	 * @param  string    $msg  内容
	 * @return string          json
	 */
	function ajaxReturn($data, $msg = '') {
		if(is_array($data)) {
			exit(json_encode($data));
		}
		exit(json_encode(array('status' => $data, 'msg' => $msg)));
	}

	// 组合查询数据到url
	function get_search_url() {
		$url_get = '';
		foreach ($_GET as $key => $value) {
			if($key == 'page') continue;
			$url_get .= '&'. $key . '=' . $value;
		}

		return $url_get;
	}

	/**
	 * 引入公共js文件
	 * @return [type] [description]
	 */
	function common_js() {
		echo "<script type='text/javascript' src='js/jquery.min.js'></script>";	
		echo "<script type='text/javascript' src='js/main.js'></script>";
		echo "<script type='text/javascript' src='js/My97DatePicker/WdatePicker.js'></script>";
	}

	/**
	 * 判断是否为一维数组 是就转为二维数组
	 * @param  array  $array 数组
	 * @return array        [description]
	 */
	function array_change(&$array) {
		if (count($array) == count($array, 1) && $array) {
			$tmparr  = $array;
			$array   = [];
			$array[] = $tmparr;
		}
	}
