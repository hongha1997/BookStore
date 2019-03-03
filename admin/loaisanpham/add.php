<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
	document.title='Add | Bookstore';
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
                                <h4 class="title">Thêm tên loại sách</h4>
                            </div>
                            <div class="content">
								<?php
									if(isset($_POST['submit'])){
									$name = $_POST['name'];
									$illegal = "#$%^&*()+=-[]';,./{}|:<>?~";
									if(false === strpbrk($name, $illegal)){
										$queryAdđM = "INSERT INTO loaisanpham(TenLoaiSanPham) VALUES('{$name}')";
										$resultAddDM = $mysqli->query($queryAdđM);  // đúng là TRUE, sai là FALSE
										if($resultAddDM){ // == true
											// Thêm thành công
											header("location:index.php?msg=Thêm thành công");
											return; // có thể bỏ
										} else {
											// Thất bại
											header("location:add.php?msg=Có lỗi trong quá trình xử lý");
											return;
										}
									}else{
										$msg2 = "Không được chứa kí tự đặc biệt";
									}
								}
								?>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên loại sách</label><?php if(isset($msg2)){ echo '<h4 style="color:red" >'.$msg2.'</h4>'; } ?>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Nhập tên loại sách" value="" required>
                                            </div>
                                        </div>                             
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd" value="Thêm" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
