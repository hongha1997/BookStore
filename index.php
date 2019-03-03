<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
	<!---->
	<div class="container">
			<div class="danhsach2 shoes-grid">
			<div class="wrap-in">
				<div class="wmuSlider example1 slide-grid">		 
				   <div class="wmuSliderWrapper">		  
					   <?php
						$query = "SELECT * FROM slide";
						$result = $mysqli->query($query);
						while($ar = mysqli_fetch_assoc($result)){
							$id = $ar['IDSlide'];
							$hinhanh = $ar['AnhSlide'];
							$mota = $ar['MoTaSlide'];
							$trangthai = $ar['TrangThaiSlide'];
						?>
						<?php
							if($trangthai==0){
							?>
					 	<article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<?php
							if($trangthai==0){
							?>
							<img class="img-responsive " src="/files/slide/<?php echo $hinhanh; ?>" alt=" " />
						
							</div>
							<div class="col-md-7 banner-off">							
								<h2>FLAT 50% 0FF</h2>
								<label>FOR ALL PURCHASE <b>VALUE</b></label>
								<p>Nhanh tay mua <?php echo $mota; ?> để nhận ưu đãi được biệt ngay hôm nay. </p>					
								
							</div>
							
							<div class="clearfix"> </div>
							<?php } ?>
						</div>
						
					 	</article>
					 	<?php } ?>
						<?php } ?>
					 </div>
	                <ul class="wmuSliderPagination">
	                	<li><a href="" class="">0</a></li>
	                	<li><a href="" class="">1</a></li>
	                	<li><a href="" class="">2</a></li>
	                </ul>
					 <script src="/templates/bookstore/js/jquery.wmuSlider.js"></script> 
				  <script>
	       			$('.example1').wmuSlider();         
	   		     </script> 
	            </div>
	          </div>
	           	</a>
	   		      <!---->
	   		     <div class="shoes-grid-left">
				 <?php
					$query2 = "SELECT * FROM sanpham ORDER BY GiaDaGiam ASC LIMIT 2";
						$result2 = $mysqli->query($query2);
						$i=0;
						while($ar2 = mysqli_fetch_assoc($result2)){
							$id = $ar2['IDSanPham'];
							$name = $ar2['TenSanPham'];
							$mota = $ar2['MoTa'];
							$giadagiam = $ar2['GiaDaGiam'];
							$giadagiam2 = number_format($giadagiam,0, '', '.');
							$giaban = $ar2['GiaBan'];
							$giaban2 = number_format($giaban,0, '', '.');
							$hinhanh = $ar2['HinhAnh'];
							$i++;
				 ?>
					<a href="single.php?id=<?php echo $id; ?>">				 
	   		     	<div class="col-md-6 con-sed-grid <?php if($i==2){ echo "sed-left-top"; } ?>">
					
	   		     		<div class=" elit-grid"> 
						
		   		     		<h4><?php echo $name; ?></h4>
							<p><?php echo $mota; ?></p>
							<span class="on-get">GET NOW</span>						
						</div>						
						<img class="img-responsive shoe-left" src="/files/<?php echo $hinhanh; ?>" width="150px" height="170px"  alt=" " />
							
						<div class="clearfix"> </div>
						
	   		     	</div>
					</a>
						<?php } ?>
	   		     </div>
	   		   <div class="products">
					<h5 class="latest-product">Sách mới nhất</h5>	
	   		     	  <a class="view-all" href="/product.php">Xem tất cả các sản phẩm<span> </span></a>    
	   		     </div>
	   		     <div class="product-left">
					<?php
						$query2 = "SELECT * FROM sanpham ORDER BY IDSanPham DESC LIMIT 3";
							$result2 = $mysqli->query($query2);
							$i=0;
							while($ar2 = mysqli_fetch_assoc($result2)){
								$id = $ar2['IDSanPham'];
								$name = $ar2['TenSanPham'];
								$mota = $ar2['MoTa'];
								$giadagiam = $ar2['GiaDaGiam'];
								$giadagiam2 = number_format($giadagiam,0, '', '.');
								$giaban = $ar2['GiaBan'];
								$giaban2 = number_format($giaban,0, '', '.');
								$hinhanh = $ar2['HinhAnh'];
								$i++;
					 ?>
	   		     	<div class="col-md-4 chain-grid <?php if($i==3){ echo "grid-top-chain"; } ?> ">
	   		     		<a href="/single.php?id=<?php echo $id; ?>"><img class="img-responsive chain" src="/files/<?php echo $hinhanh; ?>" alt=" " width="180px" height ="320px" /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="/single.php?id=<?php echo $id; ?>"><?php echo $name; ?></a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual"><?php echo $giadagiam2; ?> VNĐ</span>
									</br>
		   		     				<span class="reducedfrom"><?php echo $giaban2; ?> VNĐ</span>
	   		     				</div>
	   		     				<a class="now-get get-cart" href="/single.php?id=<?php echo $id; ?>">GET NOW</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
	   		     	</div>
					<?php } ?>
	   		     </div>
				 
	   		     <div class="products">
	   		     	<h5 class="latest-product">Sách cũ</h5>	
	   		     	  <a class="view-all" href="/product.php">Xem tất cả các sản phẩm<span> </span></a> 		     
	   		     </div>
	   		     <div class="product-left">
					<?php
						$query2 = "SELECT * FROM sanpham ORDER BY IDSanPham ASC LIMIT 3";
							$result2 = $mysqli->query($query2);
							$i=0;
							while($ar2 = mysqli_fetch_assoc($result2)){
								$id = $ar2['IDSanPham'];
								$name = $ar2['TenSanPham'];
								$mota = $ar2['MoTa'];
								$giadagiam = $ar2['GiaDaGiam'];
								$giadagiam2 = number_format($giadagiam,0, '', '.');
								$giaban = $ar2['GiaBan'];
								$giaban2 = number_format($giaban,0, '', '.');
								$hinhanh = $ar2['HinhAnh'];
								$i++;
					 ?>
	   		     	<div class="col-md-4 chain-grid <?php if($i==3){ echo "grid-top-chain"; } ?> ">
	   		     		<a href="/single.php?id=<?php echo $id; ?>"><img class="img-responsive chain" src="/files/<?php echo $hinhanh; ?>" alt=" " width="180px" height ="320px" /></a>
	   		     		
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="/single.php?id=<?php echo $id; ?>"><?php echo $name; ?></a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual"><?php echo $giadagiam2; ?> VNĐ</span>
									</br>
		   		     				<span class="reducedfrom"><?php echo $giaban2; ?> VNĐ</span>
	   		     				</div>
	   		     				<a class="now-get get-cart" href="/single.php?id=<?php echo $id; ?>">GET NOW</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
	   		     	</div>
					<?php } ?>
	   		     </div>
	   		     <div class="clearfix"> </div>
	   		   </div>  
			    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
	   		    <div class="clearfix"> </div>        	         
		</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>