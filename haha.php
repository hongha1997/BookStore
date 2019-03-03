<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>Xác thực mã</h3>
			  	<?php
			  	if(isset($_GET['ma'])){
					$ma = $_GET['ma'];
					$hoten = $_GET['hoten'];
					$email = $_GET['email'];
					$matkhau = $_GET['matkhau'];
					$matkhau = md5($matkhau);
					$sodienthoai = $_GET['sodienthoai'];
					$diachi = $_GET['diachi'];
					echo "Đã gửi mã xác nhận, kiểm tra Email để nhận mã xác nhận!";
				}
			  	?>
				<form action="" method="post">					
					<div>
					<span>Mã xác thực<label>*</label></span>
					<input type="text" name="maxt"> 
				  </div>
				  <input type="submit" name="submit3" value="OK">
			    </form>
			    <?php
			    	if(isset($_POST["submit3"])){
			    		$maxt = $_POST['maxt'];
			    		if($maxt==$ma){
			    			$query2 = "INSERT INTO khachhang(TenKhachHang, MatKhau, Mail, SDT, DiaChiKhachHang, TrangThai) VALUES('{$hoten}', '{$matkhau}', '{$email}','{$sodienthoai}','{$diachi}', 0)";
							$result2 = $mysqli->query($query2);
							if($result2){
								header("location:register.php?msg=Đăng kí thành công");
								return;
							} else {
								header("location:register.php?msg=Có lỗi trong quá trình xử lý");
								return;
							}
			    		}
			    	}
			    ?>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
			<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
			  <div class="clearfix"> </div>
      	 </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>