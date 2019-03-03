<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
<?php
	$idkh = $_SESSION['userInfo2']['IDKhachHang'];
	$queryDel = "DELETE FROM chitiethang WHERE IDKhachHang = '{$idkh}' ";
	$resultDel = $mysqli->query($queryDel);
	if($resultDel){
		header('location:giohang.php?msg=Gở bỏ tất cả thành công');
		die();
	} else {
		header('location:giohang.php?msg=Có lỗi trong quá trình gở bỏ');
		die();
	}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>