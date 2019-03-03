<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
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
	<div class="container">
		
	<div class="women-product">
		<!-- grids_of_4 -->
		<div class="danhsach2 grid-product">
		<?php
		$query = "SELECT * FROM sanpham ORDER BY IDSanPham DESC LIMIT {$offset}, {$row_count} ";
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
			
			<ul style="margin-left:170px" class="pagination modal-4">
				<?php
					$url2='product.php?page=1';
					$prev=$current_page-1;											
					$next=$current_page+1;
					if($current_page > 1 && $tongSoTrang > 1){
						$urlp='product.php?page='.$prev;
				?>
			  <li><a href="<?php echo $urlp; ?>"" class="prev">
				<i class="fa fa-chevron-left"></i>
				  Previous
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
								$url2='product.php?page='.$i;
								 
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
						$urln='product.php?page='.$next;
				?>

			  <li><a href="<?php echo $urln?>" class="next"> Next 
				<i class="fa fa-chevron-right"></i>
			  </a></li>
			  <?php
					}
				   ?>
			</ul>
			
			
		</div>
	</div>
	<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
	<div class="clearfix"> </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>