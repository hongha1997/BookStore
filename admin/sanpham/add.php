<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
	document.title='Add Tin | bookstore';
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
                                <h4 class="title">Thêm sách</h4>
                            </div>
                            <div class="content">
								<?php
									if(isset($_POST['submit'])){
										$tensach = $_POST['tensach'];
										$mota = $_POST['mota'];
										$nhaxuatban = $_POST['nhaxuatban'];
										$tacgia = $_POST['tacgia'];
										$giagiam = $_POST['giagiam'];
										$giaban = $_POST['giaban'];
										$loaisach = $_POST['loaisach'];
										$fileName = $_FILES['hinhanh']['name'];	
										
										if($fileName != ''){
											$arFileName = explode('.', $fileName);
											$duoiFile = end($arFileName); // phần tử cuối cùng của mảng
											$fileName = 'TTCN-bookstory-' . time() . '.' . $duoiFile;
											$tmp_name = $_FILES['hinhanh']['tmp_name'];
											$pathUpload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$fileName;
											move_uploaded_file($tmp_name, $pathUpload);
										} 
										$queryAddStory = "INSERT INTO sanpham(TenSanPham, MoTa, NhaXuatBan, TacGia, GiaDaGiam, GiaBan, IDLoaiSanPham, HinhAnh) 
														VALUES('{$tensach}', '{$mota}', '{$nhaxuatban}', '{$tacgia}', '{$giagiam}', '{$giaban}',  '{$loaisach}', '{$fileName}') ";
										$resultAddStory = $mysqli->query($queryAddStory);
										if($resultAddStory){
											header('location:index.php?msg=Thêm thành công!');
											die();
										} else {
											header('location:index.php?msg=Có lỗi trong quá trình thêm');
											die();
										}
										
									}
								?>
                                <form action="" enctype="multipart/form-data" method="post" class="frmAdd">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên sách</label>
                                                <input type="text" name="tensach" class="form-control border-input" placeholder="Tên sách" value="" required>
                                            </div>
                                        </div>                             
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <input type="text" name="mota" class="form-control border-input" placeholder="Mô tả" value="" required>
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nhà xuất bản</label>
                                                <input type="text" name="nhaxuatban" class="form-control border-input" placeholder="Nhà xuất bản" value="" required>
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tác giả</label>
                                                <input type="text" name="tacgia" class="form-control border-input" placeholder="Tác giả" value="" required>
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá giảm</label>
                                                <input type="number" name="giagiam" class="form-control border-input" placeholder="Giá giảm" value="" required>
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá bán</label>
                                                <input type="number" name="giaban" class="form-control border-input" placeholder="Giá bán" value="" required>
                                            </div>
                                        </div>                             
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Loại sách</label>
                                                <select name="loaisach" class="form-control border-input" required>
                                                	<option>  -- Chọn --  </option>
													<?php 
														$queryCat = "SELECT * FROM loaisanpham ORDER BY IDLoaiSanPham DESC";
														$resultCat = $mysqli->query($queryCat);
														while($arCat = mysqli_fetch_assoc($resultCat)){
															$id = $arCat['IDLoaiSanPham'];
															$name = $arCat['TenLoaiSanPham'];
													?>
                                                	<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
													<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="hinhanh" class="form-control" placeholder="Chọn ảnh" />
                                            </div>
                                        </div>
                                    </div>
                         
                                    <div class="text-center">
                                        <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd" value="Thêm" />
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