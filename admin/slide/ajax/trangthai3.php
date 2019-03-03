
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php'; ?>
<?php	
	$trangThai = $_POST['aTrangthai'];
	$id = $_POST['aId'];
	if($trangThai==0){
		$trangThai =1;
	} else {
		$trangThai =0;		
	}	
	$query ="UPDATE slide SET TrangThaiSlide = {$trangThai} WHERE IDSlide = {$id}";
	$result = $mysqli->query($query);
?>
<table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Ảnh</th>
										<th>Mô tả</th>
                                    	<th>Trạng thái
											<?php
												$soLuong = "";
												$queryGiam = "SELECT COUNT(*) AS tatol FROM slide WHERE TrangThaiSlide = 1";
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
                                    <tbody>
										
										<?php
											$query = "SELECT * FROM slide ORDER BY IDSlide DESC";
											$result = $mysqli->query($query);
											while($ar = mysqli_fetch_assoc($result)){
												$id = $ar['IDSlide'];
												$Hinhanh = $ar['AnhSlide'];
												$Mota = $ar['MoTaSlide'];
												$TrangThaiSlide = $ar['TrangThaiSlide'];
										?>
									
                                        <tr>
                                        	<td><?php echo $id; ?></td>
                                        	<?php 
												if($Hinhanh !=''){ // empty() 
											?>
                                        	<td><img src="/files/slide/<?php echo $Hinhanh ?>" alt="" width="100px" />
											<?php } else {?>
												<td><strong>Không có hình ảnh</strong></td>
											<?php } ?>
											<td><?php echo $Mota; ?></td>
                                        	<td><a href="javascript:void(0)" onclick="return getTT3(<?php echo $TrangThaiSlide ?>,<?php echo $id ?>)"><img src="/templates/admin/assets/img/<?php if($TrangThaiSlide==0){echo 'agree.png';} else { echo 'deagree.png'; } ?>" alt="" width="40px" height="40px" /></a></td>
											<td>
                                        		<a href="edit.php?id=<?php echo $id ?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a href="del.php?id=<?php echo $id ?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                        	</td>
                                        </tr>
										
											<?php } ?>
										
                                    </tbody>
 
                                </table>
<script type="text/javascript">
	function getTT3(trangthai, id){
		var Trangthai = trangthai;
		var Id = id;
		$.ajax({
			url: 'ajax/trangthai3.php',
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
