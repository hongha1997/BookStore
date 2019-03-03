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
	/*/ tổng số dòng
	$queryTSD = "SELECT COUNT(*) AS TSD FROM news";
	$resultTSD = $mysqli->query($queryTSD);
	$arTmp = mysqli_fetch_assoc($resultTSD);
	$tongSoDong = $arTmp['TSD'];
	// số truyện trên 1 trang
	$row_count = ROW_COUNT;
	// tổng số trang
	$tongSoTrang = ceil($tongSoDong/$row_count);
	// trang hiện tại
	$current_page = 1;
	if(isset($_GET['page'])){
		$current_page = $_GET['page'];
	}
	// offset
	$offset = ($current_page - 1) * $row_count;*/
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
                                <h4 class="title">Danh sách khách hàng</h4>
								<?php
									if(isset($_GET['msg'])){
								?>
								<p class="category success"><?php echo $_GET['msg']; ?></p>
								<?php } ?>
                                
                                <form action="" method="post">
                                	<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="timkiem form-control border-input" placeholder="Tìm kiếm tên khách hàng" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
							<div id="ket-qua">
							
							
                            <div class="content table-responsive table-full-width">
								
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Tên khách hàng</th>
										<th>Email</th>
                                    	<th>Số ĐT</th>
										<th>Địa chỉ</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody class="danhsach">
									
										<?php
											
											$query = "SELECT * FROM khachhang ORDER BY IDKhachHang DESC";
											$result = $mysqli->query($query);
											while($ar = mysqli_fetch_assoc($result)){
												$ID = $ar['IDKhachHang'];
												$Ten = $ar['TenKhachHang'];
												$email = $ar['Mail'];
												$sdt = $ar['SDT'];
												$diachi = $ar['DiaChiKhachHang'];
										?>
										
									
                                        <tr>
                                        	<td><?php echo $Ten; ?></td>
                                        	<td><?php echo $email; ?></td>
											<td><?php echo $sdt; ?></td>
											<td><?php echo $diachi; ?></td>
											<td>
											<?php 
												// Khi dang nhap tai khoan la Admindemo thi day la tk demo nen khong duoc thuc hien cac chuc nang
												//if($_SESSION['userInfo']['username']!="admindemo"){ 
											?>
                                        		<a href="edit.php?id=<?php echo $ID;?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a>  
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
							</div>
							
                        </div>
                    </div>


                </div>
            </div>
        </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>