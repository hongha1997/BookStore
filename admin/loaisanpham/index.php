<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
	document.title='Danh Mục | bookstore';
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
                                <h4 class="title">Danh sách loại sách</h4>
                                <?php
									if(isset($_GET['msg'])){
								?>
								<p class="category success"><?php echo $_GET['msg']; ?></p>
								<?php } ?>
                                <a href="add.php" class="addtop"><img src="/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Tên loại sách</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    
									
										<?php
											$query = "SELECT * FROM loaisanpham";
											$result = $mysqli->query($query);
											if($result->num_rows>0){
												echo '<tbody>';
												while($ar = mysqli_fetch_assoc($result)){
													$id = $ar['IDLoaiSanPham'];
													$name = $ar['TenLoaiSanPham'];		
														echo '<tr>';
															echo '<td>'.$id.'</td>';
															echo '<td>'.$name.'</td>';
															echo '<td>';
															?>
															<?php 
																// Khi dang nhap tai khoan la Admindemo thi day la tk demo nen khong duoc thuc hien cac chuc nang
																//if($_SESSION['userInfo']['username']!="admindemo"){ 
															?>
																<a href="edit.php?id=<?php echo $id; ?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
																<a href="del.php?id=<?php echo $id; ?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
															<?php //} ?>	
															<?php
															echo '</td>';									
															 
														echo '</tr>';		
												}
												echo '</tbody>';
												
											}
											
										?>
									
                                    
 
                                </table>

								
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
