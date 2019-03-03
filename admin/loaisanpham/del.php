<?php
	ob_start();
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
?>
<?php

	$id = 0;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$queryDelDM = "DELETE FROM loaisanpham WHERE IDLoaiSanPham = {$id}";
		$resultDelDM = $mysqli->query($queryDelDM);
		if($resultDelDM){
			$queryStory = "SELECT HinhAnh FROM sanpham WHERE IDLoaiSanPham = {$id}";
			$resultStory = $mysqli->query($queryStory);
			while($arStory = mysqli_fetch_assoc($resultStory)){
				$fileNameOld = $arStory['HinhAnh'];
				if($fileNameOld != ''){
					// xóa file, dùng hàm unlink()
					$filePath = $_SERVER['DOCUMENT_ROOT'].'/files/'.$fileNameOld;
					unlink($filePath); // truyền vào đường dẫn file đang cần xóa
				}
			}
			$query2 = "DELETE FROM sanpham WHERE IDLoaiSanPham = {$id}";
			$result2 = $mysqli->query($query2);	
			header("location:index.php?msg=Xóa thành công");
			return;
		} else {
			header("location:index.php?msg=Có lỗi trong quá trình xử lý!");
			return;
		}	
	}
	
?>
<?php
	ob_end_flush();
?>