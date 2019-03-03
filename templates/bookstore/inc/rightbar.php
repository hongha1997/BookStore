<div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">CATEGORIES</h3>
		 <ul class="menu">
		<li class="item1"><a href="">Danh mục Sách<img class="arrow-img" src="/templates/bookstore/images/arrow1.png" alt=""/> </a>
			<ul class="cute">
				<?php
					$query = "SELECT * FROM loaisanpham";
					$result = $mysqli->query($query);
					while($ar = mysqli_fetch_assoc($result)){
						$id = $ar['IDLoaiSanPham'];
						$name = $ar['TenLoaiSanPham'];
				?>
				<li class="subitem1"><a href="/loaiproduct.php?id=<?php echo $id; ?>"><?php echo $name; ?></a></li>
				<?php
					}
				?>
			</ul>
		</li>
		<li class="item2"><a href="">Giá Sách<img class="arrow-img " src="/templates/bookstore/images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="/loaiproduct2.php?sl=50000"> < 100.000 VNĐ</a></li>
				<li class="subitem2"><a href="/loaiproduct2.php?sl=150000">100.000 VNĐ -> 200.000 VNĐ</a></li>
				<li class="subitem3"><a href="/loaiproduct2.php?sl=250000">200.000 VNĐ -> 300.000 VNĐ</a></li>
				<li class="subitem3"><a href="/loaiproduct2.php?sl=350000">300.000 VNĐ -> 400.000 VNĐ</a></li>
				<li class="subitem3"><a href="/loaiproduct2.php?sl=450000">400.000 VNĐ -> 500.000 VNĐ</a></li>
				<li class="subitem3"><a href="/loaiproduct2.php?sl=550000">> 500.000 VNĐ</a></li>
			</ul>
		</li>
		<!--<li class="item3"><a href="#">Ultrices  du<img class="arrow-img img-arrow" src="/templates/bookstore/images/arrow1.png" alt=""/> </a>
			<ul class="cute">
				<li class="subitem1"><a href="/product.php">Cute Kittens </a></li>
				<li class="subitem2"><a href="/product.php">Strange Stuff </a></li>
				<li class="subitem3"><a href="/product.php">Automatic Fails</a></li>
			</ul>
		</li>
		<li class="item4"><a href="#">Cras iacaus rhone <img class="arrow-img img-left-arrow" src="/templates/bookstore/images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="/product.php">Cute Kittens </a></li>
				<li class="subitem2"><a href="/product.php">Strange Stuff </a></li>
				<li class="subitem3"><a href="/product.php">Automatic Fails </a></li>
			</ul>
		</li>
				<li>
			<ul class="kid-menu">
				<li><a href="/product.php">Tempus pretium</a></li>
				<li ><a href="/product.php">Dignissim neque</a></li>
				<li ><a href="/product.php">Ornared id aliquet</a></li>
			</ul>
		</li>
		-->
		<ul class="kid-menu ">
				<!--<li><a href="/product.php">Commodo sit</a></li>
				<li ><a href="/product.php">Urna ac tortor sc</a></li>
				<li><a href="/product.php">Ornared id aliquet</a></li>
				<li><a href="/product.php">Urna ac tortor sc</a></li>
				<li ><a href="/product.php">Eget nisi laoreet</a></li>
				<li><a href="/product.php">Faciisis ornare</a></li>-->
				<li class="menu-kid-left"><a href="/contact.php">Liên Hệ Cho Chúng Tôi</a></li>
			</ul>
		
	</ul>
					</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
				<?php
					$query = "SELECT * FROM sanpham ORDER BY GiaBan ASC LIMIT 1 ";
					$result = $mysqli->query($query);
					$ar = mysqli_fetch_assoc($result);
					$id = $ar['IDSanPham'];
					$name = $ar['TenSanPham'];
					$giadagiam = $ar['GiaDaGiam'];
					$giadagiam2 = number_format($giadagiam,0, '', '.');
					$giaban = $ar['GiaBan'];
					$giaban2 = number_format($giaban,0, '', '.');
					$hinhanh = $ar['HinhAnh'];
				?>
					<div class=" chain-grid menu-chain">
	   		     		<a href="/single.php?id=<?php echo $id; ?>"><img class="img-responsive chain" src="/files/<?php echo $hinhanh; ?>" alt=" " /></a>	   		     		
	   		     		<div class="grid-chain-bottom chain-watch">
		   		     		<span class="actual dolor-left-grid"><?php echo $giadagiam2; ?> VNĐ</span>
		   		     		<span class="reducedfrom"><?php echo $giaban2; ?> VNĐ</span>  
		   		     		<h6>Tên: <?php echo $name; ?></h6>  		     			   		     										
	   		     		</div>
	   		     	</div>
	   		     	 <a class="view-all all-product" href="/product.php">Xem tất cả các sản phẩm<span> </span></a> 	
			</div>