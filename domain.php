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
				    <a href="index.html" class="active">首页</a>
				</li>
				<li>
				    <a href="domain.html">域名管理</a>
				</li>
				<li>
				    <a href="dp-links.html">部门链接管理</a>
				</li>
				<li>
				    <a href="links.html">个人链接管理</a>
				</li>
				<li>
				    <a href="permit.html">权限管理</a>
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
				<h2>域名管理</h2>
				<div class="operate">
					<a href="#" class="btn add">新增</a>
					<a href="#" class="btn search">查询</a>
				</div>
				<form action="#" class="searchForm">
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
						<input type="text" name="record" placeholder="粤ICP备XXX号-1">
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
							<tr>
								<td>1</td>
								<td>aaa.com</td>
								<td>2017-06-06</td>
								<td>90</td>
								<td>浙ICP备15017819号-1</td>
								<td>杭州知底儿网络技术有限公司</td>
								<td>企业</td>
								<td>
									<a href="#" class="btn modify">修改</a>
									<a href="#" class="btn delete">删除</a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>aaa.com</td>
								<td>2017-06-06</td>
								<td>90</td>
								<td>浙ICP备15017819号-1</td>
								<td>杭州知底儿网络技术有限公司</td>
								<td>企业</td>
								<td>
									<a href="#" class="btn modify">修改</a>
									<a href="#" class="btn delete">删除</a>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="paginate">
						<ul class="clear">
							<li><a href="#" class="active">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">...</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
						</ul>
					</div>
				</div> <!-- end table -->
			</div><!-- end main -->

			<div class="popup">
				<div class="content">
					<div class="title">新增</div>
					<div class="form">						
						<form action="#" class="operateForm">
							<div class="entry">
								<input type="hidden" name="domainID">
							</div>
							<div class="entry">
								<label>域名:</label>
								<input type="text" name="domain" placeholder="http://">
							</div>
							<div class="entry">
								<label>日期</label>
								<input type="text" name="date" placeholder=""> 
							</div>
							<div class="entry">
								<label>费用:</label>
								<input type="text" name="nature" placeholder="">
							</div>
							<div class="entry">
								<label>备案号:</label>
								<input type="text" name="record" placeholder="粤ICP备XXX号-1">
							</div>
							<div class="entry">
								<label>域名所属公司:</label>
								<input type="text" name="record" placeholder="">
							</div>	
							<div class="entry">
								<label>性质:</label>
								<input type="text" name="nature" placeholder="企业/个人">
							</div>
						</form>
					</div>
					<div class="operate">					
						<a href="#" class="btn save">保存</a>
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
</body>
</html>