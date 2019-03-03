<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="/admin">Trang quản lý</a>
	</div>
	<div class="collapse navbar-collapse">
		<div style="color: black;
		padding: 15px 50px 5px 50px;
		float: right;
		font-size: 16px;">
		<?php
			if(isset($_SESSION['userInfo'])){
				$fullName = $_SESSION['userInfo']['FullName'];
		?>
		Xin chào: <b><?php echo $fullName; ?></b> &nbsp;&nbsp; 
		<a href="/auth/logout.php" class="btn btn-danger square-btn-adjust">Đăng xuất</a>
		</div>
		<?php } ?>
	</div>
</div>