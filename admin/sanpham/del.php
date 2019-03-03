<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php
	// lấy id -> xóa file nếu có -> xóa tin trong db
	
	
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT HinhAnh FROM sanpham WHERE IDSanPham = {$id}";
		$result = $mysqli->query($query);
		$ar = mysqli_fetch_assoc($result);
		$fileNameOld = $ar['HinhAnh'];
		if($fileNameOld != ''){
			// xóa file, dùng hàm unlink()
			$filePath = $_SERVER['DOCUMENT_ROOT'].'/files/'.$fileNameOld;
			unlink($filePath); // truyền vào đường dẫn file đang cần xóa
		}
		$queryDel = "DELETE FROM sanpham WHERE IDSanPham = {$id} ";
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