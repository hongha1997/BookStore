<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
	document.title='Edit Tin | bookstore';
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
                                <h4 class="title">Sửa sách</h4>
                            </div>
                            <div class="content">
								<?php
									
									$id = 0;
									if(isset($_GET['id'])){
										$id = $_GET['id'];																													
										$queryNews = "SELECT HinhAnh FROM sanpham WHERE IDSanPham = {$id}";
										$resultNews = $mysqli->query($queryNews);
										$arNews = mysqli_fetch_assoc($resultNews);
										$fileNameOld = $arNews['HinhAnh'];

										if(isset($_POST['delete']) && $_POST['delete']==1 ){
											$filePath = $_SERVER['DOCUMENT_ROOT'].'/files/'.$fileNameOld;
											unlink($filePath);
										}
									}
									$query = "SELECT * FROM sanpham AS sp INNER JOIN loaisanpham AS lsp ON sp.IDLoaiSanPham = lsp.IDLoaiSanPham WHERE sp.IDSanPham = {$id} ";
									$result = $mysqli->query($query);
									$ar = mysqli_fetch_assoc($result);				
									$idsp = $ar['IDSanPham'];
									$namesp = $ar['TenSanPham'];
									$mota = $ar['MoTa'];
									$nhaxuatban = $ar['NhaXuatBan'];
									$tacgia = $ar['TacGia'];	
									$giadagiam = $ar['GiaDaGiam'];	
									$giaban = $ar['GiaBan'];	
									$idlsp = $ar['IDLoaiSanPham'];	
									$hinhanh = $ar['HinhAnh'];
									$trangthai = $ar['TrangThai'];
									$namelsp = $ar['TenLoaiSanPham'];
									if(isset($_POST['submit'])){
										$tensach = $_POST['tensach'];
										$mota = $_POST['mota'];
										$nhaxuatban = $_POST['nhaxuatban'];
										$tacgia = $_POST['tacgia'];
										$giadagiam = $_POST['giadagiam'];
										$giaban = $_POST['giaban'];			
										$loaisach = $_POST['loaisach'];
										$fileName = $_FILES['hinhanh']['name'];										
										if($fileName != ''){
											$arFileName = explode('.', $fileName);
											$duoiFile = end($arFileName); // phần tử cuối cùng của mảng
											$fileName = 'VNE-Story-' . time() . '.' . $duoiFile;
											$tmp_name = $_FILES['hinhanh']['tmp_name'];
											$pathUpload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$fileName;
											move_uploaded_file($tmp_name, $pathUpload);
										} 										
										$queryEditS = "UPDATE sanpham SET TenSanPham = '{$tensach}', MoTa = '{$mota}' , NhaXuatBan = '{$nhaxuatban}' ,
													TacGia = '{$tacgia}' , GiaDaGiam = '{$giadagiam}', GiaBan = '{$giaban}', GiaDaGiam = '{$giadagiam}', IDLoaiSanPham = '{$loaisach}', HinhAnh = '{$fileName}' WHERE IDSanPham = {$id} ";
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
                                                <label>Tên sách</label>
                                                <input type="text" name="tensach" class="form-control border-input" required value="<?php echo $namesp; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mô Tả</label>
                                                <input type="text" name="mota" class="form-control border-input" required value="<?php echo $mota; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nhà xuất bản</label>
                                                <input type="text" name="nhaxuatban" class="form-control border-input" required value="<?php echo $nhaxuatban; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tác giả</label>
                                                <input type="text" name="tacgia" class="form-control border-input" required value="<?php echo $tacgia; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá đã giảm</label>
                                                <input type="text" name="giadagiam" class="form-control border-input" required value="<?php echo $giadagiam; ?>">
                                            </div>
                                        </div>                             
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá bán</label>
                                                <input type="text" name="giaban" class="form-control border-input" required value="<?php echo $giaban; ?>">
                                            </div>
                                        </div>                             
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Loại sách</label>
                                                <select name="loaisach" class="form-control border-input">
                                                	<option value="<?php echo $idlsp; ?>"><?php echo $namelsp; ?></option>
											
                                                	<?php 
														$queryCat = "SELECT * FROM loaisanpham WHERE IDLoaiSanPham != {$idlsp} ORDER BY IDLoaiSanPham DESC";
														$resultCat = $mysqli->query($queryCat);
														while($arCat = mysqli_fetch_assoc($resultCat)){
															$idloaisp = $arCat['IDLoaiSanPham'];
															$nameloaisp = $arCat['TenLoaiSanPham'];
													?>
                                                	<option value="<?php echo $idloaisp ?>"><?php echo $nameloaisp ?></option>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hình ảnh cũ</label>
												<?php if($hinhanh!=''){ ?>
                                                <img src="/files/<?php echo $hinhanh; ?>" width="120px" alt="" /> Xóa hình <input type="checkbox" name="delete" value="1" />
												<?php }else { echo 'Không có ảnh';}?>
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
