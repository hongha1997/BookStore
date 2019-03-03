<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>Xác thực mã lấy lại mật khẩu</h3>
			  	<?php
			  	if(isset($_GET['maget'])){
					$ma = $_GET['maget'];
					$email = $_GET['email'];

					$query = "SELECT COUNT(TenKhachHang) AS total FROM khachhang WHERE Mail = '{$email}' ";
					$result = $mysqli->query($query);									
					$ar = mysqli_fetch_assoc($result);
					if($ar['total'] == 0){
						$msg2 = "Tên tài khoản chưa tồn tại";
									    	}
 else {
											
										

					echo "Đã gửi mã xác nhận, kiểm tra Email để nhận mã xác nhận!";
				}
			  	?>
				<form action="" method="post">					
					<div>
					<span>Mã xác thực<label>*</label></span>
					<input type="text" name="maxtget"> 
				  </div>
				  <div>
					<span>Mật khẩu mới<label>*</label></span>
					<input type="password" name="matkhaumoi"> 
				  </div>
				  <input type="submit" name="submit5" value="OK">
			    </form>
			    <?php
			    	if(isset($_POST["submit5"])){
			    		$maxt = $_POST['maxtget'];
			    		$matkhaumoi = $_POST['matkhaumoi'];
			    		$matkhaumoi = md5($matkhaumoi);
			    		if($maxt==$ma){
			    			$query2 = "UPDATE khachhang SET MatKhau = '{$matkhaumoi}' WHERE Mail = '{$email}' ";
							$result2 = $mysqli->query($query2);
							if($result2){
								header("location:register.php?msg=Thành công");
								return;
							} else {
								header("location:register.php?msg=Có lỗi trong quá trình xử lý");
								return;
							}
			    		}
			    	}
			    	}

			    ?>
			    <?php if(isset($msg2)){ echo '<h4 style="color:red" >'.$msg2.'</h4>'; } ?>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
			<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
			  <div class="clearfix"> </div>
      	 </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>