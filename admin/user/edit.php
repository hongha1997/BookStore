<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
	document.title='Edit | Bookstore';
</script>
    <div class="main-panel">
		<nav class="navbar navbar-default">
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/rightbar.php'; ?>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa User</h4>
                            </div>
                            <div class="content">
								<?php
									$id = 0;
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									
									$query2 = "SELECT * FROM user WHERE IDUser = {$id} ";
									$result2 = $mysqli->query($query2);
									$ar2 = mysqli_fetch_assoc($result2);	
									$username = $ar2['NameUser'];
									$password = $ar2['MatKhau'];
									$fullname = $ar2['FullName'];
									$chucvu = $ar2['PhanCap'];
									if($chucvu==1){
										$chucvu2 = "Admin";
									} else if ($chucvu==0) {
										$chucvu2 = "Nhân viên";
									}
									if(isset($_POST['submit'])){
										$username = $_POST['username'];
										$password = $_POST['password'];
										$hoten = $_POST['hoten'];
										$chucvu = $_POST['chucvu'];		
										if($password == '' ){
											$query3 = "UPDATE user SET FullName = '{$hoten}',PhanCap = '{$chucvu}'  WHERE IDUser = {$id} ";
											$ketqua3 = $mysqli->query($query3);  // đúng là TRUE, sai là FALSE
											if($ketqua3){ // == true
												// Thêm thành công
												header("location:index.php?msg=Sửa thành công");
												return; // có thể bỏ
												// die();
											} else {
												// Thất bại
												header("location:add.php?msg=Có lỗi trong quá trình xử lý");
												// echo "có lỗi";
												return;
												// die();
											}
										} else {
											$password = md5($password);
											$query3 = "UPDATE user SET MatKhau = '{$password}', FullName = '{$hoten}',PhanCap = '{$chucvu}'  WHERE IDUser = {$id} ";
											$ketqua3 = $mysqli->query($query3);  // đúng là TRUE, sai là FALSE
											if($ketqua3){ // == true
												// Thêm thành công
												header("location:index.php?msg=Sửa thành công");
												return; // có thể bỏ
												// die();
											} else {
												// Thất bại
												header("location:add.php?msg=Có lỗi trong quá trình xử lý");
												// echo "có lỗi";
												return;
												// die();
											}
										}
									}
								?>
                                <form action="" enctype="multipart/form-data" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label><?php if(isset($msg2)){ echo '<h4 style="color:red" >'.$msg2.'</h4>'; } ?>
                                                <input type="text" name="username" class="form-control border-input"  readonly placeholder="Username" value="<?php echo $username; ?>">
                                            </div>
                                        </div>                             
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="Password" value="">
                                            </div>
                                        </div>                             
                                    </div>
 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input type="text" name="hoten" class="form-control border-input" placeholder="Họ và tên" value="<?php echo $fullname; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chức vụ</label>
												<select name="chucvu" class="form-control border-input">
                                                	<option value="<?php echo $chucvu; ?>"><?php echo $chucvu2; ?></option>
													<?php 
														$querytt = "SELECT * FROM user WHERE PhanCap != {$chucvu} LIMIT 1";
														$resulttt = $mysqli->query($querytt);
														while($artt = mysqli_fetch_assoc($resulttt)){
															$type = $artt['PhanCap'];
															 
															if($type==1){
																$type2 = "Admin";
															} else if($type==0){
																$type2 = "Nhân viên";
															}
															
													?>
                                                	<option value="<?php echo $type; ?>"><?php echo $type2; ?></option>
													<?php } ?>
                                                </select>
                                            </div>
                                        </div>                             
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd" value="Sửa" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
