<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
<script>
        function myFunction(){
            var x = document.getElementById("hopthoai");
            if(x.open == true){
                x.open = false;
            }else{
                x.open = true;
            }
        }
    </script>
	 <div class="container"> 
	 	
	 	<div class=" single_top">
		
		<?php
		$id = 0;
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}
		$query2 = "SELECT * FROM sanpham WHERE IDSanPham = '{$id}'";
		$result2 = $mysqli->query($query2);
		$ar2 = mysqli_fetch_assoc($result2);
		$id = $ar2['IDSanPham'];
		$name = $ar2['TenSanPham'];
		$mota = $ar2['MoTa'];
		$nhaxuatban = $ar2['NhaXuatBan'];
		$tacgia = $ar2['TacGia'];
		$giadagiam = $ar2['GiaDaGiam'];
		$giadagiam2 = number_format($giadagiam,0, '', '.');
		$giaban = $ar2['GiaBan'];
		$giaban2 = number_format($giaban,0, '', '.');
		$hinhanh = $ar2['HinhAnh'];
		?>
		
	      <div class="single_grid">
				<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>									
								<img class="etalage_source_image" src="/files/<?php echo $hinhanh; ?>" class="img-responsive" />
							</li>			
						</ul>
						 <div class="clearfix"> </div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				  
					 <dialog id="hopthoai">Yêu cầu bạn đăng nhập, click lại để HỦY !!!</dialog>
					<h3>Tên sách: <?php echo $name; ?></h3>
				<div class="cart-b">
					<div class="left-n "><?php echo $giadagiam2; ?> VNĐ</div>
					<?php
						if(isset($_SESSION['userInfo2'])){
					?>	
				    <a class="now-get get-cart-in" href="javascript:void(0)" onclick="return getTT2(<?php echo $id ?>)">ADD TO CART</a> 
				<?php } else {?>
					<a class="now-get get-cart-in" onclick="myFunction()" href="javascript:void(0)">ADD TO CART</a>
					<?php	} ?>
				    <div class="clearfix"></div>
				 </div>
				 <h6>Nhà xuất bản: <?php echo $nhaxuatban; ?></h6>
				  <h6>Tác giả: <?php echo $tacgia; ?></h6>
			   	<p>Mô tả sách: <?php echo $mota; ?></p>
			   	
			   
				
				</div>
          	    <div class="clearfix"> </div>
          	   </div>
			  
			  
			  
			  
          	   <ul id="flexiselDemo1">
			    <?php
				$query = "SELECT * FROM sanpham ORDER BY IDSanPham DESC LIMIT 10";
				$result = $mysqli->query($query);
				while($ar = mysqli_fetch_assoc($result)){
					$id = $ar['IDSanPham'];
					$name = $ar['TenSanPham'];
					$hinhanh = $ar['HinhAnh'];
					$trangthai = $ar['TrangThai'];
					if($trangthai==0){
				?>
				<li><a href="/single.php?id=<?php echo $id; ?>"><img src="/files/<?php echo $hinhanh; ?>" width="130px" height="180px" /></a></li>
				
				<?php }} ?>
			</ul>
			<script type="text/javascript">
				function getTT2(id){
					var Id = id;
					$.ajax({
						url: 'ajax/ajax2.php',
						type: 'POST',  // POST or GET
						cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
						data: {
							aId: Id
						},
						success: function(data){ 
							$('#ket-qua').html(data);
						},
						error: function (){
							alert('Có lỗi xảy ra');
						}
					});
					return false;
				}
			</script>

	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="/templates/bookstore/js/jquery.flexisel.js"></script>

          	    	<div class="toogle">
				     	<h3 class="m_3">Bình luận facebook:</h3>
				     	<div class="fb-comments" data-href="http://bookstore.ttcn:8081/" data-numposts="5"></div>
				     </div>	
          	   </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
<div class="clearfix"> </div>			
		</div>
	<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>