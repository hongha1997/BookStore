<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
	<div class="container">
		
			<!---->
		 <div class="main"> 
         <div class="reservation_top">          
            	<div class=" contact_right">
            		<h3>Contact Form</h3>
            		<div class="contact-form">

                        <?php
                            $msg = "";
                            $name = "";
                            $email = "";
                            $sdt = "";
                            $contact = "";
                            if(isset($_POST['submit2'])){
                                $name  = $_POST['name'];
                                $email  = $_POST['email'];
                                $sdt  = $_POST['sdt'];
                                $message  = $_POST['message'];
                                $query = "INSERT INTO lienhe (TenNguoiLienHe, Mail, SDT, NoiDung) VALUES('{$name}', '{$email}', '{$sdt}', '{$message}')";
                                $result = $mysqli->query($query);
                                if($result){
                                    $msg = "Thành công";
                                }
                            }
                        ?>
							<form method="post" action="">
								<input type="text" class="textbox" value="Họ tên" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
								<input type="text" class="textbox" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                                <input type="text" class="textbox" value="Số điện thoại" name="sdt" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Số điện thoại';}">
								<textarea value="Message" onfocus="this.value= '';" name="message" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
								<input type="submit" value="Send" name="submit2">
								<div class="clearfix"> </div>
							</form>
                            
							<?php echo $msg; ?>
						</div>
            	</div>
            </div>
           </div>
		   <?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
	     </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>