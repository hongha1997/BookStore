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
						echo $_GET['msg'];
					} 
				?>
			  	<h3>THÔNG TIN CÁ NHÂN ĐĂNG KÍ</h3>
				<form action="" method="post">
					<div>
					<span>Họ tên<label>*</label></span>
					<input type="text" name="hoten"> 
				  </div>
				  <div>
					<span>Email<label>*</label></span>
					<input type="text" name="email"> 
				  </div>
				  <div>
					<span>Mật khẩu<label>*</label></span>
					<input type="password" name="password"> 
				  </div>
				  <div>
					<span>Số điện thoại<label>*</label></span>
					<input type="text" name="sdt"> 
				  </div>
				  <div>
					<span>Địa chỉ<label>*</label></span>
					<input type="text" name="diachi"> 
				  </div>
				  <input type="submit" name="submit2" value="Đăng ký">
			    </form>
			    <?php
if(isset($_POST["submit2"])){
	$msg2="";
	$hoten = $_POST['hoten'];
	$email = $_POST['email'];
	$matkhau = $_POST['password'];
	$sodienthoai = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$body = rand();

	$query = "SELECT COUNT(TenKhachHang) AS total FROM khachhang WHERE Mail = '{$email}' ";
	$result = $mysqli->query($query);									
	$ar = mysqli_fetch_assoc($result);
	if($ar['total'] == 0){
	//SMTP needs accurate times, and the PHP time zone MUST be set
	//This should be done in your php.ini, but this is how to do it if you don't have access to that
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
	$mail->msgHTML($body);

	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';

	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');

	//send the message, check for errors
	if (!$mail->send()) {
		echo "Chưa nhập Email !!!";
	} else {
		
		//echo $body;
		header('location:/haha.php?ma='.$body.'&hoten='.$hoten.'&email='.$email.'&matkhau='.$matkhau.'&sodienthoai='.$sodienthoai.'&diachi='.$diachi);
	}
}
 else {
											$msg2 = "Tên tài khoản đã tồn tại";
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