<?php
	ob_start();
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/ConstantUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/Utf8ToLatinUtil.php';
?>
<?php
$a = $_POST['data'];
		$query = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%{$a}%' ";
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