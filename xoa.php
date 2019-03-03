<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
<?php
	// lấy id -> xóa file nếu có -> xóa tin trong db
	
	
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$queryDel = "DELETE FROM chitiethang WHERE IDchitiethang = {$id} ";
		$resultDel = $mysqli->query($queryDel);
		if($resultDel){
			header('location:giohang.php?msg=Gở bỏ thành công');
			die();
		} else {
			header('location:giohang.php?msg=Có lỗi trong quá trình gở bỏ');
			die();
		}
	} else { // có thể bỏ else do có die()
		header('location:gohang.php?msg=Không thể xóa vì không đúng yêu cầu');
		die();
	}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>