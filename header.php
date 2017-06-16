<?php 
require_once 'init.php';
 ?>
<div class="top clear">
	<div class="copyright">
		版权所有 天拓技术
	</div>
		<?php if ($_SESSION['uid']){ ?>
			<?php echo $_SESSION['name']; ?>
			<br>
			<div class="handle"><a href="#" class="login">登出</a></div>
		<?php }else { ?>
			<div class="handle"><a href="#" class="login">登录</a></div>
		
		<?php } ?>
	
	<!-- <ul class="handle">
		<li><a href="#" class="login">登录</a></li>
	</ul> -->
</div>
<div class="popupLogin">
	<div class="content">
		
		<div class="form">						
			<form action="index.php" method="POST" class="loginForm" name="login">
				<div class="entry">
					<input type="hidden" name="dplinkID">
				</div>
				<div class="entry">
					<label>用户名:</label>
					<input type="text" name="name" placeholder="">
				</div>
				<div class="entry">
					<label>密码:</label>
					<input type="password" name="password" placeholder=""> 
				</div>
			</form>
		</div>
		<div class="operate">					
			<a href="javascript:document.login.submit();" class="btn save">登录</a>
			<a href="#" class="btn cancle">取消</a>
		</div>
		<div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
	</div>
</div>