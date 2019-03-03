<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>thông tin của khách hàng</h3>
			  	<p>Thanh toán bằng tiền mặt khi nhận hàng</p>
			  	<?php
			  	$idkh = $_SESSION['userInfo2']['IDKhachHang'];
				$query = "SELECT * FROM khachhang WHERE IDKhachHang = '{$idkh}' ";
				$result = $mysqli->query($query);
				$ar = mysqli_fetch_assoc($result);
				$hoten = $ar['TenKhachHang'];
				$email = $ar['Mail'];
				$sdt = $ar['SDT'];
				$diachi = $ar['DiaChiKhachHang'];
				?>	
				<form action="" method="post">
				  <div>
					<span>Họ và tên<label>*</label></span>
					<input type="text" readonly name="hoten" value="<?php echo $hoten; ?>"> 
				  </div>
				  <div>
					<span>Điện thoại di động<label>*</label></span>
					<input type="text" name="sdt" value="<?php echo $sdt; ?>"> 
				  </div>
				  <div>
					<span>Email<label>*</label></span>
					<input type="text" readonly name="email" value="<?php echo $email; ?>"> 
				  </div>
				  <div>
					<span>Địa chỉ cụ thể giao hàng<label>*</label></span>
					<input type="text" name="diachi" value="<?php echo $diachi; ?>"> 
				  </div>
				  <input type="submit" name="submit2" value="Thanh toán" >
			    </form>
			    <?php
					if(isset($_POST["submit2"])){
						$hoten2 = $_POST['hoten'];
						$email2 = $_POST['email'];
						$sdt2 = $_POST['sdt'];
						$diachi2 = $_POST['diachi'];
						$query3 = "UPDATE khachhang SET SDT = '{$sdt2}', DiaChiKhachHang = '{$diachi2}'  WHERE IDKhachHang = {$idkh} ";
						$ketqua3 = $mysqli->query($query3);



						$query = "SELECT * FROM chitiethang as cth INNER JOIN sanpham as sp ON cth.IDSanPham = sp.IDSanPham WHERE IDKhachHang = '{$idkh}' ";
					    $result = $mysqli->query($query);
					     $thanhtien2=0;
					    while($ar = mysqli_fetch_assoc($result)){
					      $idsp = $ar['IDSanPham'];
					      $tensach = $ar['TenSanPham'];
					      $id = $ar['IDchitiethang'];
					      $gia = $ar['GiaDaGiam'];
					      $soluong = $ar['SoLuong'];
					      $thanhtien =  $gia*$soluong;
					      $thanhtien2=$thanhtien2+$thanhtien;
					     // $haha = rand(time());
					      
						$query2 ="INSERT INTO chitietdonhang (IDctdh, IDSanPham, SoLuong, ThanhTien, IDKhachHang )
					    VALUES ('{$id}','{$idsp}','{$soluong}', '{$thanhtien}', '{$idkh}')";
					      $result2 = $mysqli->query($query2);
					  }


						 $idkh = $_SESSION['userInfo2']['IDKhachHang'];
					    $query = "SELECT * FROM chitiethang as cth INNER JOIN sanpham as sp ON cth.IDSanPham = sp.IDSanPham WHERE IDKhachHang = '{$idkh}' ";
					    $result = $mysqli->query($query);
					     $thanhtien2=0;
					     $body="";
					    while($ar = mysqli_fetch_assoc($result)){
					      $tensach = $ar['TenSanPham'];
					      $id = $ar['IDchitiethang'];
					      $gia = $ar['GiaDaGiam'];
					      $soluong = $ar['SoLuong'];
					      $thanhtien =  $gia*$soluong;
					      $thanhtien2=$thanhtien2+$thanhtien;
					    
					      $body=$body."<br>Tên sản phẩm: ".$tensach.", Giá: ".$gia.", Số lượng: ".$soluong;
						} 
						$body2 = "Hóa đơn của khách hàng đã mua tại Bookstore.<br>".$body."<br>Tổng tiền cho tất cả các sản phẩm là:".$thanhtien2."<br>Xin chân thành cảm ơn quý khách đã ủng hộ chúng tôi, sản phẩm của quý khách sẽ được giao sau 2 ngày đăng kí mua.";
						date_default_timezone_set('Etc/UTC');

						date_default_timezone_set('Etc/UTC');

						require 'smtpmail/PHPMailerAutoload.php'; 	

						//Create a new PHPMailer instance
						$mail = new PHPMailer();

						//Tell PHPMailer to use SMTP
						$mail->isSMTP();

						//Enable SMTP debugging
						// 0 = off (for production use)
						// 1 = client messages
						// 2 = client and server messages
						$mail->SMTPDebug = 0;

						//Ask for HTML-friendly debug output
						$mail->Debugoutput = 'html';

						//Set the hostname of the mail server
						$mail->Host = 'smtp.gmail.com';

						//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
						$mail->Port = 587;

						//Set the encryption system to use - ssl (deprecated) or tls
						$mail->SMTPSecure = 'tls';

						//Whether to use SMTP authentication
						$mail->SMTPAuth = true;

						//Username to use for SMTP authentication - use full email address for gmail
						$mail->Username = "duonghongha130619971@gmail.com";

						//Password to use for SMTP authentication
						$mail->Password = "haduong1306";

						//Set who the message is to be sent from
						$mail->setFrom('duonghongha130619971@gmail.com', 'BookStore');

						//Set an alternative reply-to address
						$mail->addReplyTo('duonghongha130619971@gmail.com', 'BookStore');

						//Set who the message is to be sent to
						$mail->addAddress($email, "Book Store");

						//Set the subject line
						$mail->Subject = "Ma Xac Nhan Tu BookStore!";

						//Read an HTML message body from an external file, convert referenced images to embedded,
						//convert HTML into a basic plain-text alternative body
						$mail->msgHTML($body2);

						//Replace the plain text body with one created manually
						//$mail->AltBody = 'This is a plain-text message body';

						//Attach an image file
						//$mail->addAttachment('images/phpmailer_mini.png');

						$idkh = $_SESSION['userInfo2']['IDKhachHang'];
	$queryDel = "DELETE FROM chitiethang WHERE IDKhachHang = '{$idkh}' ";
	$resultDel = $mysqli->query($queryDel);

						//send the message, check for errors
						if (!$mail->send()) {
							echo "Mailer Error: " . $mail->ErrorInfo;
						} else {
							echo "Đặt hàng thành công, kiểm tra email để biết thêm thông tin";
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