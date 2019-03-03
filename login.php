<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
<style>
.login-right input[type="password"] {
	border: 1px solid #DDDBDB;
	outline-color:#fb4d01;
	width: 96%;
	font-size:0.9em;
	padding:10px;
}
</style>
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>Đăng kí khách hàng</h3>
				<p>Nếu bạn có tài khoản với chúng tôi, hãy đăng nhập.</p>
				<?php
					//echo  "ád";

					$msg = '';
					if(isset($_POST['submit2'])){	
						//						die();
						//session_destroy();
						$email = $_POST['email'];
						$password = md5($_POST['password']);
						$queryLogin = "SELECT * FROM khachhang WHERE Mail = '{$email}' && MatKhau = '{$password}' ";
						$resultLogin = $mysqli->query($queryLogin);
						$arLogin2 = mysqli_fetch_assoc($resultLogin);				
						if( $arLogin2  ){ // count($arLogin)
							
							$_SESSION['userInfo2'] = $arLogin2;
							header('location:/index.php');
						} else {
							$msg = '<h4 style="color:red">Sai tên đăng nhập OR mật khẩu!</h4>';
						}
					}
				?>
				<?php// echo $_SESSION['userInfo2']['TenKhachHang'];die(); ?>
				<form action="" method="post">
				  <div>
					<span>Địa chỉ Email<label>*</label></span>
					<input type="text" name="email"> 
				  </div>
				  <div>
					<span>Mật khẩu<label>*</label></span>
					<input type="password" name="password"> 
				  </div>
				  <a class="forgot" href="/haha2.php">Quên mật khẩu?</a>
				  <input type="submit" name="submit2" value="Đăng nhập">
			    </form>
			    <?php echo $msg; ?>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
			<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
			  <div class="clearfix"> </div>
      	 </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>