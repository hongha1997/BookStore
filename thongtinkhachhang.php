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
			   	<?php
					if(isset($_GET['msg'])){
				?>
				<p><?php echo $_GET['msg']; ?></p>
				<?php } ?>
			  	<h3>Chỉnh Sửa Thông Tin Tài Khoản</h3>

			  	<?php
					if(isset($_SESSION['userInfo2'])){
						$fullName = $_SESSION['userInfo2']['TenKhachHang'];
						$id = $_SESSION['userInfo2']['IDKhachHang'];
					}
					$query = "SELECT * FROM khachhang WHERE IDKhachHang = {$id} ";
					$result = $mysqli->query($query);
					$ar = mysqli_fetch_assoc($result);	
					$hoten2 = $ar['TenKhachHang'];
					$matkhau2 = $ar['MatKhau'];
					$mail2 = $ar['Mail'];
					$sodt2 = $ar['SDT'];
					$diachi2 = $ar['DiaChiKhachHang'];



					if(isset($_POST['submit'])){
						$hoten = $_POST['hoten'];
						$matkhau = $_POST['password'];
						$sodt = $_POST['sodienthoai'];	
						$diachi = $_POST['diachi'];	
						if($matkhau == '' ){
							$query3 = "UPDATE khachhang SET TenKhachHang = '{$hoten}', SDT = '{$sodt}'  , DiaChiKhachHang = '{$diachi}'  WHERE IDKhachHang = {$id} ";
							$ketqua3 = $mysqli->query($query3);  // đúng là TRUE, sai là FALSE
							if($ketqua3){ // == true
								// Thêm thành công
								header("location:thongtinkhachhang.php?msg=Sửa thành công");
								return; // có thể bỏ
								// die();
							} else {
								// Thất bại
								header("location:thongtinkhachhang.php?msg=Có lỗi trong quá trình xử lý");
								// echo "có lỗi";
								return;
								// die();
							}
						} else {
							$matkhau = md5($matkhau);
							$query3 = "UPDATE khachhang SET MatKhau = '{$matkhau}', TenKhachHang = '{$hoten}',SDT = '{$sodt}',DiaChiKhachHang = '{$diachi}'  WHERE IDKhachHang = {$id} ";
							$ketqua3 = $mysqli->query($query3);  // đúng là TRUE, sai là FALSE
							if($ketqua3){ // == true
								// Thêm thành công
								header("location:thongtinkhachhang.php?msg=Sửa thành công");
								return; // có thể bỏ
								// die();
							} else {
								// Thất bại
								header("location:thongtinkhachhang.php?msg=Có lỗi trong quá trình xử lý");
								// echo "có lỗi";
								return;
								// die();
							}
						}
					}
					
				?>


				<form action="" method="post">
				  <div>
					<span>Họ và tên<label>*</label></span>
					<input type="text" name="hoten" value="<?php echo $hoten2; ?>"> 
				  </div>
				  <div>
					<span>Email<label>*</label></span>
					<input type="text" readonly name="email" value="<?php echo $mail2; ?>"> 
				  </div>
				  <div>
					<span>Mật khẩu<label>*</label></span>
					<input type="password" name="password" > 
				  </div>
				  <div>
					<span>Số địa thoại<label>*</label></span>
					<input type="text" name="sodienthoai" value="<?php echo '0'.$sodt2; ?>"> 
				  </div>
				  <div>
					<span>Địa chỉ<label>*</label></span>
					<input type="text" name="diachi" value="<?php echo $diachi2; ?>"> 
				  </div>
				  <input type="submit" name="submit" value="Sửa ">
			    </form>
			
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
			<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
			  <div class="clearfix"> </div>
      	 </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>