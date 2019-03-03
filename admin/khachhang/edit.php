<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
	document.title='Edit | BookStore';
</script>
<style>
	#tentin-error {
		color:red;
	}
	#mota-error {
		color:red;
	}
	#chitiet-error {
		color:red;
	}
</style>
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
                                <h4 class="title">Sửa thông tin khách hàng</h4>
                            </div>
                            <div class="content">
								<?php
									
									$id = 0;
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									$query = "SELECT * FROM khachhang WHERE IDKhachHang = {$id} ";
									$result = $mysqli->query($query);
									$ar = mysqli_fetch_assoc($result);				
									$id = $ar['IDKhachHang'];
									$name = $ar['TenKhachHang'];
									$matkhau = $ar['MatKhau'];
									$email = $ar['Mail'];
									$sdt = $ar['SDT'];	
									$diachi = $ar['DiaChiKhachHang'];	
									if(isset($_POST['submit2'])){
										$name2 = $_POST['ten'];
										$matkhau2 = $_POST['matkhau'];
										$matkhau3 = md5($matkhau2);
										$sdt2 = $_POST['sdt'];
										$diachi2 = $_POST['diachi'];
																			
																				
										$queryEditS = "UPDATE khachhang SET TenKhachHang = '{$name2}', MatKhau = '{$matkhau3}' ,
													SDT = '{$sdt2}' , DiaChiKhachHang = '{$diachi2}' WHERE IDKhachHang = {$id} ";
										$resultEditS = $mysqli->query($queryEditS);  // đúng là TRUE, sai là FALSE
										if($resultEditS){ // == true
											// Thêm thành công
											header("location:index.php?msg=Sửa thành công");
											return; // có thể bỏ
										} else {
											// Thất bại
											header("location:index.php?msg=Có lỗi trong quá trình xử lý");
											return;
										}
										
									}
								?>
                                <form enctype="multipart/form-data" action="" method="post" class="frmEdit">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên khách hàng</label>
                                                <input type="text" name="ten" class="form-control border-input" required value="<?php echo $name; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input type="password" name="matkhau" class="form-control border-input" required value="<?php echo $matkhau; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" readonly class="form-control border-input" required value="<?php echo $email; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" name="sdt" class="form-control border-input" required value="<?php echo $sdt; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="diachi" class="form-control border-input" required value="<?php echo $diachi; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									
                                    
                                
                                    
                                    <div class="text-center">
                                        <input type="submit" name="submit2" class="btn btn-info btn-fill btn-wd" value="Sửa" />
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
