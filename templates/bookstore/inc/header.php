<?php
	ob_start();
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/ConstantUtil.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/util/Utf8ToLatinUtil.php';
?>
<!DOCTYPE html>		 
<html>
<head>
<title>Book</title>
<link href="/templates/bookstore/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="/templates/bookstore/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="/templates/bookstore/css/style2.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<link rel="stylesheet" href="/templates/bookstore/css/etalage.css" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="fb:app_id" content="342341286314345" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="/templates/bookstore/js/jquery.min.js"></script>
<!--script-->
<script src="/templates/bookstore/js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<script type="text/javascript">
$(document).ready(function(){
    $(".timkiem").keyup(function(){
        var txt = $(".timkiem").val();
		$.post('ajax/ajax.php',{data:txt}, function(data){
			$('.danhsach2').html(data);
		})
    });
});
</script>

</head>
<body> 
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=342341286314345&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<!--header-->
	<div class="header">
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="/index.php"><img src="/templates/bookstore/images/logo.jpg" alt=" " /></a>
					</div>
					<div class="search">
					<form action="/index.php" method="post">
						<input type="text" value="" class="timkiem" onclick="Redirect();" name="search"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">
					</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">				
						<?php
							if(isset($_SESSION['userInfo2'])){
								$fullName = $_SESSION['userInfo2']['TenKhachHang'];
						?>	
						<div class="account"><a href="thongtinkhachhang.php"><span> </span><?php echo $fullName; ?></a></div>
						<?php } ?>
							<ul class="login">
								<?php
									if(isset($_SESSION['userInfo2'])){
								?>
								<li><a href="/dangxuat.php"><span> </span>LOGOUT</a></li> |
								<?php 
								}else {
								?>
								<li><a href="/login.php"><span> </span>LOGIN</a></li> |
								<?php } ?>
								<li ><a href="/register.php">SIGNUP</a></li>							
							</ul>
						<div class="cart"><a href="<?php if(isset($_SESSION['userInfo2'])){ echo '/giohang.php'; } ?>"><span> </span>CART </a><span id="ket-qua">
							<?php
								if(isset($_SESSION['userInfo2'])){
								$soLuong = "";
								$idkh = $_SESSION['userInfo2']['IDKhachHang'];
								$queryGiam = "SELECT SUM(SoLuong) AS tatol FROM chitiethang WHERE IDKhachHang = '{$idkh}' ";
								$resultGiam = $mysqli->query($queryGiam);
								$arGiam = mysqli_fetch_assoc($resultGiam);
								$soLuong = $arGiam['tatol'];
								if($soLuong!=0){	
							?>	
						<img src="/templates/admin/assets/img/images.png" width="20px" height="20px" /><?php echo $soLuong ?>
						<?php	} ?>
						</span></div>
						<?php } ?>



					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>