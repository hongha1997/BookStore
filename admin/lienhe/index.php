<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php 
	/*
	// tổng số dòng
	$queryTSD = "SELECT COUNT(*) AS TSD FROM contact";
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
	$offset = ($current_page - 1) * $row_count;
	*/
?>
<script type="text/javascript">
	document.title='Liên Hệ | bookstore';
</script>

<script type="text/javascript">
$(document).ready(function(){
    $(".timkiem").keyup(function(){
        var txt = $(".timkiem").val();
		$.post('search.php',{data:txt}, function(data){
			$('.danhsach').html(data);
		})
    });
});
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
                                <h4 class="title">Danh sách Liên hệ</h4>
								<?php
									if(isset($_GET['msg'])){
								?>
								<p class="category success"><?php echo $_GET['msg']; ?></p>
								<?php } ?>
                                <form action="" method="post">
                                	<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="timkiem form-control border-input" placeholder="Tên liên hệ" value="" required>
                                            </div>
                                        </div>
                                    </div>        
                                </form>
							</div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Tên</th>
										<th>Email</th>
                                    	<th>Số ĐT</th>
                                    	<th>Nội dung</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody class="danhsach">
										<?php
											$queryCT = "SELECT * FROM lienhe ORDER BY IDLienHe DESC ";/*LIMIT {$offset}, {$row_count}*/
											$resultCT = $mysqli->query($queryCT);
											while($arCT = mysqli_fetch_assoc($resultCT)){
												$id = $arCT['IDLienHe'];
												$name_lienhe = $arCT['TenNguoiLienHe'];
												$email_lienhe = $arCT['Mail'];
												$sdt_lienhe = $arCT['SDT'];
												$noidung = $arCT['NoiDung'];
										?>
                                        <tr>
                                        	<td><?php echo $id; ?></td>
                                        	<td><?php echo $name_lienhe; ?></td>
                                        	<td><?php echo $email_lienhe; ?></td>
                                        	<td><?php echo $sdt_lienhe; ?></td>
                                        	<td><?php echo $noidung; ?></td>
											<td>
                                        		<a href="del.php?id=<?php echo $id; ?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                        	</td>
                                        </tr>
										<?php } ?>
                                    </tbody>
 
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>