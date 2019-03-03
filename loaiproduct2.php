<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
	<div class="container">
		
	<div class="women-product">
		<!-- grids_of_4 -->
		<div class="danhsach2 grid-product">
		<?php
		if(isset($_GET['sl'])){
			$sl = $_GET['sl'];
		}
		if($sl==50000){
			$query = "SELECT * FROM sanpham WHERE GiaDaGiam <= 100000 ";
		} else if($sl==550000){
			$query = "SELECT * FROM sanpham WHERE 550000 <= GiaDaGiam";
		} else {
			$query = "SELECT * FROM sanpham WHERE {$sl}-50000 <= GiaDaGiam AND GiaDaGiam <= {$sl}+50000 ";
		}
		//$query = "SELECT * FROM sanpham WHERE {$sl}-50000 < GiaDaGiam AND GiaDaGiam < {$sl}+50000 ";
		$result = $mysqli->query($query);
		while($ar = mysqli_fetch_assoc($result)){
			$id = $ar['IDSanPham'];
			$name = $ar['TenSanPham'];
			$mota = $ar['MoTa'];
			$giadagiam = $ar['GiaDaGiam'];
			$giaban = $ar['GiaBan'];
			$hinhanh = $ar['HinhAnh'];
			$trangthai = $ar['TrangThai'];
			if($trangthai==0){
		?>
		
		
		  <div class="product-grid" style="width: 265px;" ></br>
			<div class="content_box">
				
			   	<div class="left-grid-view grid-view-left">
			   	   	 <a href="/single.php?id=<?php echo $id; ?>"><img src="/files/<?php echo $hinhanh; ?>" class="img-responsive watch-right" alt=""/></a>				   	  
				</div>
				    <h5 style="text-align:center;"><a href="/single.php?id=<?php echo $id; ?>"><?php echo $name; ?></a><h5>
				     <p style="text-align:center;"><?php echo $giadagiam." VNĐ"; ?> -> <?php echo $giaban." VNĐ"; ?></p>
			   	</div></br>
              </div>
			 
			<?php }} ?>
			 
			<div class="clearfix"> </div>
		</div>
	</div>
	<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
	<div class="clearfix"> </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>