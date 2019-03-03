<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php'; ?>
<?php
	$trangThai = 0;
	$id = 0;
	if(isset($_POST['aTrangthai']) && isset($_POST['aId']) ){
		$trangThai = $_POST['aTrangthai'];
		$id = $_POST['aId'];
	}
	if($trangThai==0){
		$trangThai =1;
	} else {
		$trangThai =0;		
	}	
	$query ="UPDATE khachhang SET TrangThai = {$trangThai} WHERE IDKhachHang = {$id}";
	$result = $mysqli->query($query);
?>
 <div class="content table-responsive table-full-width" >
								
                                <table class="table table-striped">
                                   
                                    <tbody class="danhsach">
										<?php
											$query2 = "SELECT * FROM khachhang ORDER BY IDKhachHang DESC";
											$result2 = $mysqli->query($query2);
											while($ar2 = mysqli_fetch_assoc($result2)){
												$ID = $ar2['IDKhachHang'];
												$name = $ar2['TenKhachHang'];
												$email = $ar2['Mail'];
												$sodienthoai = $ar2['SDT'];
												$diachi = $ar2['DiaChiKhachHang'];
												$trangthai = $ar2['TrangThai'];

										?>
										<?php 
											

											$query3 = "SELECT DISTINCT time1 FROM chitietdonhang WHERE IDKhachHang = '{$ID}' ";
											
											$result3 = $mysqli->query($query3);
											while($ar3 = mysqli_fetch_assoc($result3)){
											$time1 = $ar3['time1'];

											$query = "SELECT  * FROM chitietdonhang as ctdh INNER JOIN sanpham as sp ON ctdh.IDSanPham = sp.IDSanPham WHERE IDKhachHang = '{$ID}' AND time1 = '{$time1}' ";
											
											$result = $mysqli->query($query);
											echo '<hr><h5>Tên: '.$name.'</h5><br><h6>Email: '.$email.'</h6><br>Số ĐT: 0'.$sodienthoai.'<br>Địa chỉ: '.$diachi.'<br>Đơn hàng gồm: <br>';
											$thanhtien2=0;
											while($ar = mysqli_fetch_assoc($result)){
												//$ID = $ar['IDKhachHang'];
												$idsp = $ar['IDSanPham'];
											      $tensach = $ar['TenSanPham'];
											      $id = $ar['IDctdh'];
											      $gia = $ar['GiaDaGiam'];
											      $soluong = $ar['SoLuong'];

											      $thanhtien =  $gia*$soluong;
											      $thanhtien2=$thanhtien2+$thanhtien;
												//echo $idsp;
											     echo 'Tên sách: ';
												echo $tensach.'. Giá:  ';
												echo $gia.'. Số lượng:  ';
												echo $soluong.'<br>';

												//echo $Ten;
												//$email = $ar['Mail'];
												//$sdt = $ar['SDT'];
												//$diachi = $ar['DiaChiKhachHang'];
										?>
										
									
                                      
											<?php	 } ?>	

												<?php echo 'Tổng tiền: '.$thanhtien2; ?><br><a  href="javascript:void(0)" onclick="return getTT(<?php echo $trangthai ?>,<?php echo $ID ?>)" ><?php if($trangthai==0){ echo '<p style="color:red" >Chưa thanh toán</p>'; } else { echo '<p style="color:blue" >Đã thanh toán</p>'; } ?></a><a href="del.php?id=<?php echo $ID; ?>&time1=<?php echo $time1; ?>">Xóa</a><hr>

												

											<?php }	} ?>	




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