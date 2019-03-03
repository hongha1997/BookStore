<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php'; ?>
<?php	
	$trangThai = $_POST['aTrangthai'];
	$id = $_POST['aId'];
	if($trangThai==0){
		$trangThai =1;
	} else {
		$trangThai =0;		
	}	
	$query ="UPDATE sanpham SET TrangThai = {$trangThai} WHERE IDSanPham = {$id}";
	$result = $mysqli->query($query);
?>
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
											
											$query = "SELECT * FROM sanpham as sp INNER JOIN loaisanpham as lsp ON sp.IDLoaiSanPham = lsp.IDLoaiSanPham ORDER BY IDSanPham DESC";
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