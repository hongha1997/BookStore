<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type="text/javascript">
	document.title='User | Bookstore';
</script>

<script type="text/javascript">
$(document).ready(function(){
    $(".timkiem").keyup(function(){
        var txt = $(".timkiem").val();
		$.post('ajax.php',{data:txt}, function(data){
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
                                <h4 class="title">Danh sách User</h4>
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
                                    	<th>Fullname</th>
										<th>User</th>
                                    	<th>Chức vụ</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody class="danhsach">
										
										<?php
											
											$query = "SELECT * FROM user ORDER BY IDUser DESC";
											$result = $mysqli->query($query);
											while($arNews = mysqli_fetch_assoc($result)){
												$IDUser = $arNews['IDUser'];
												$Fullname = $arNews['FullName'];
												$Nameuser = $arNews['NameUser'];
												$Matkhau = $arNews['MatKhau'];
												$Phancap = $arNews['PhanCap'];	
										?>
									
                                        <tr>
                                        	<td><?php echo $IDUser; ?></td>
                                        	<td><?php echo $Fullname; ?></td>
                                        	<td><?php echo $Nameuser; ?></td>
											<?php 
												if($Phancap==1){
													$chucvu = "Admin";
												} else {
													$chucvu = "Nhân viên";
												}
											?>
                                        	<td><?php echo $chucvu; ?></td>
											
											<td>
											<?php 
												// Khi dang nhap tai khoan la Admindemo thi day la tk demo nen khong duoc thuc hien cac chuc nang
												//if($_SESSION['userInfo']['username']!="admindemo"){ 
											?>
                                        		<?php if($_SESSION['userInfo']['NameUser']==$Nameuser  || $_SESSION['userInfo']['NameUser'] == 'admin'){ ?>
												<a href="edit.php?id=<?php echo $IDUser ?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<?php }?>
												
												<?php if(($_SESSION['userInfo']['NameUser']==$Nameuser && $Nameuser != 'admin') || ($_SESSION['userInfo']['NameUser'] == 'admin' && $Nameuser != 'admin')){ ?>
												<a href="del.php?id=<?php echo $IDUser ?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
												<?php } ?>
											<?php //} ?>
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