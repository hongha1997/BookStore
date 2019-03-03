<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    $(".timkiem").keyup(function(){
        var txt = $(".timkiem").val();
		$.post('ajax/ajax.php',{data:txt}, function(data){
			$('.danhsach').html(data);
		})
    });
});
</script>
<?php 
	// tổng số dòng
	$queryTSD = "SELECT COUNT(*) AS TSD FROM sanpham";
	$resultTSD = $mysqli->query($queryTSD);
	$arTmp = mysqli_fetch_assoc($resultTSD);
	$tongSoDong = $arTmp['TSD'];
	// so san pham 1 trang
	$row_count = ROW_COUNT;
	// tổng số trang
	$tongSoTrang = ceil($tongSoDong/$row_count);
	// trang hiện tại
	$current_page = 1;
	if(isset($_GET['page'])){
		$current_page = $_GET['page'];
	}
	// offset
	$offset = ($current_page - 1) * $row_count;
?>
<script type="text/javascript">
	document.title='Tin | Bookstore';
</script>
    <div class="main-panel">
		<nav class="navbar navbar-default">
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/rightbar.php'; ?>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách Sách</h4>
								<?php
									if(isset($_GET['msg'])){
								?>
								<p class="category success"><?php echo $_GET['msg']; ?></p>
								<?php } ?>
                                
                                <form action="" method="post">
                                	<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="timkiem form-control border-input" placeholder="Tìm kiếm tên sách" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                <a href="add.php" class="addtop"><img src="/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
								
                            </div>
							<div id="ket-qua">
							
							
                            <div class="content table-responsive table-full-width">
								
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Tên sách</th>
										<th>Mô tả</th>
                                    	<th>Nhà XB</th>
										<th>TGiả</th>
										<th>G/Giảm</th>
										<th>G/Bán</th>
										<th>Loại sách</th>
										<th>Hình ảnh</th>
                                    	<th>T/Thái
											<?php
												$soLuong = "";
												$queryGiam = "SELECT COUNT(*) AS tatol FROM sanpham WHERE TrangThai = 1 ";
												$resultGiam = $mysqli->query($queryGiam);
												$arGiam = mysqli_fetch_assoc($resultGiam);
												$soLuong = $arGiam['tatol'];
												if($soLuong!=0){
													echo '<span><img src="/templates/admin/assets/img/images.png" width="20px" height="20px" />'.$soLuong.'</span>';
												}
											?>
										</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody class="danhsach">
									
										<?php
											
											$query = "SELECT * FROM sanpham as sp INNER JOIN loaisanpham as lsp ON sp.IDLoaiSanPham = lsp.IDLoaiSanPham ORDER BY IDSanPham DESC LIMIT {$offset}, {$row_count}";
											$result = $mysqli->query($query);
											while($arNews = mysqli_fetch_assoc($result)){
												$ID = $arNews['IDSanPham'];
												$Ten = $arNews['TenSanPham'];
												$Mota = $arNews['MoTa'];
												$NXB = $arNews['NhaXuatBan'];
												$Tacgia = $arNews['TacGia'];	
												$ggiam = $arNews['GiaDaGiam'];	
												$gban = $arNews['GiaBan'];	
												$Hinhanh = $arNews['HinhAnh'];
												$Soluong = $arNews['SoLuongNhap'];
												$Trangthai = $arNews['TrangThai'];
												$IDLoai = $arNews['IDLoaiSanPham'];	
												$Tenloai = $arNews['TenLoaiSanPham'];
										?>
										
									
                                        <tr>
                                        	<td><?php echo $Ten; ?></td>
                                        	<td><?php echo $Mota; ?></td>
											<td><?php echo $NXB; ?></td>
											<td><?php echo $Tacgia; ?></td>
											<td><?php echo $ggiam; ?></td>
											<td><?php echo $gban; ?></td>
											<td><?php echo $Tenloai; ?></td>
											<?php 
												if($Hinhanh !=''){ // empty() 
											?>
                                        	<td><img src="/files/<?php echo $Hinhanh ?>" alt="" width="100px" />
											<?php } else {?>
												<td><strong>Không có hình ảnh</strong></td>
											<?php } ?>	
											</td>
											
											<td><a href="javascript:void(0)" onclick="return getTT(<?php echo $Trangthai ?>,<?php echo $ID ?>)"><img src="/templates/admin/assets/img/<?php if($Trangthai==0){echo 'agree.png';} else { echo 'deagree.png'; } ?>" alt="" width="40px" height="40px" /></a></td>
                                        	
											<td>
											<?php 
												// Khi dang nhap tai khoan la Admindemo thi day la tk demo nen khong duoc thuc hien cac chuc nang
												//if($_SESSION['userInfo']['username']!="admindemo"){ 
											?>
                                        		<a href="edit.php?id=<?php echo $ID;?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a></br>
                                        		<a href="del.php?id=<?php echo $ID;?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                        	<?php //} ?>
											</td>
											
                                        </tr>
											<?php	 } ?>										
                                    </tbody>

                                </table>
								

                                <ul style="margin-left:170px" class="pagination modal-4">
				<?php
					$url2='index.php?page=1';
					$prev=$current_page-1;											
					$next=$current_page+1;
					if($current_page > 1 && $tongSoTrang > 1){
						$urlp='index.php?page='.$prev;
				?>
			  <li><a href="<?php echo $urlp; ?>"" class="prev">
				<i class="fa fa-chevron-left"></i>
				  Pre...
				</a>
			  </li>
			<?php } ?>

			  <?php	
					  $limit=5;
					  if ($current_page > ($limit/2))
				?>
				<li> <a href="<?php echo $url2?>">1</a></li>
				<li> <a href="">..</a></li>
				<?php 
						if ($tongSoTrang >=1 && $current_page <= $tongSoTrang)
						{
							$counter = 1;
							for ($i=$current_page; $i<=$tongSoTrang;$i++)
							{
								$url2='index.php?page='.$i;
								 
								if($counter < $limit){
									$active='';
									if($i==$current_page){
										$active='active';
									}
							
				?>
				<li><a href="<?php echo $url2?>"  class="<?php echo $active; ?>"><?php echo $i?></a></li>
				<?php	
								$counter++;
								}
							}
						if ($current_page < $tongSoTrang - ($limit/2))
				?>

				<li> <a href="">..</a></li>
				<li> <a href="<?php echo $url2?>"><?php echo $tongSoTrang?></a></li>
				<?php
								}
								?>
			  <?php		
					if ($current_page < $tongSoTrang && $tongSoTrang > 1){
						$urln='index.php?page='.$next;
				?>

			  <li><a href="<?php echo $urln?>" class="next"> Next 
				<i class="fa fa-chevron-right"></i>
			  </a></li>
			  <?php
					}
				   ?>
			</ul>

								<script type="text/javascript">
									function getTT(Isslide, id){
										var Trangthai = Isslide;
										var Id = id;
										$.ajax({
											url: 'ajax/trangthai.php',
											type: 'POST',  // POST or GET
											cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
											data: {
												aTrangthai: Trangthai,
												aId: Id
											},
											success: function(data){ // dữ liệu lấy qua biến data
												//$('.jquery-demo-ajax').html(data);
												//alert(data);
												$('#ket-qua').html(data);
											},
											error: function (){
												alert('Có lỗi xảy ra');
											}
										});
										return false;
									}
								</script>
								
								
                            </div>
							</div>
							
                        </div>
                    </div>


                </div>
            </div>
        </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>