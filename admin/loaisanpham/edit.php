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
                                <h4 class="title">Sửa loại sách</h4>
                            </div>
                            <div class="content">
								<?php
									$id = 0;
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									$queryDM = "SELECT * FROM loaisanpham WHERE IDLoaiSanPham = {$id}";
									$resultDM = $mysqli->query($queryDM);
									$arDM = mysqli_fetch_assoc($resultDM);
									$nameOld = $arDM['TenLoaiSanPham'];
									if(isset($_POST['submit'])){
										$name = $_POST['name'];
										$queryEditDM = "UPDATE loaisanpham SET TenLoaiSanPham = '{$name}' WHERE IDLoaiSanPham = {$id} ";
										$resultEditDM = $mysqli->query($queryEditDM);  // đúng là TRUE, sai là FALSE
										if($resultEditDM){ // == true
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
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
												
                                                <label>Tên loại sách</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="" value="<?php echo $nameOld; ?>" required>
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
