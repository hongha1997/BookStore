<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php
	// lấy id -> xóa file nếu có -> xóa tin trong db
	
	
	
	if(isset($_GET['id']) &&  isset($_GET['time1']) ){
		$id = $_GET['id'];
		$time1 = $_GET['time1'];
		//echo $id;
		//echo $time1;
		//die();
		$queryDel = "DELETE FROM chitietdonhang WHERE IDKhachHang = {$id} AND time1 = '{$time1}' ";
		$resultDel = $mysqli->query($queryDel);
		if($resultDel){
			header('location:index.php?msg=Xoá thành công');
			die();
		} else {
			header('location:index.php?msg=Có lỗi trong quá trình xóa');
			die();
		}
	} else { // có thể bỏ else do có die()
		header('location:index.php?msg=Không thể xóa vì không đúng yêu cầu');
		die();
	}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>