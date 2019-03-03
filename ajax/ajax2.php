<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
	session_start();
?>
<?php	
	$idkh = $_SESSION['userInfo2']['IDKhachHang'];
	$id = $_POST['aId'];

	$query2 = "SELECT * FROM chitiethang WHERE IDSanPham = '{$id}' ";
	$result2 = $mysqli->query($query2);
	$ar2 = mysqli_fetch_assoc($result2);
	$haha = $ar2['IDSanPham'];
	$sl = $ar2['SoLuong'];
	if($haha==0){
		$sl++;
		$query ="INSERT INTO chitiethang (IDSanPham, SoLuong, IDKhachHang)
	VALUES ('{$id}', '{$sl}', '{$idkh}')";
		$result = $mysqli->query($query);	
	} else {
		$sl++;
		$query ="UPDATE chitiethang SET SoLuong = '{$sl}' WHERE IDSanPham = $id;  ";
		$result = $mysqli->query($query);
	}

	//$sl =1;
	//if(isset($id)){
	//$sl++;
	//$query ="UPDATE chitiethang SET SoLuong = '{$sl}' WHERE IDSanPham = $id;  ";
	//$result = $mysqli->query($query);
	//} else{
	//$query ="INSERT INTO chitiethang (IDSanPham, SoLuong, IDKhachHang)
//VALUES ('{$id}', '1', '{$idkh}')";
	//$result = $mysqli->query($query);	
	//}



	$soLuong = "";
	$idkh = $_SESSION['userInfo2']['IDKhachHang'];
	$queryGiam = "SELECT SUM(SoLuong) AS tatol FROM chitiethang WHERE IDKhachHang = '{$idkh}' ";
	$resultGiam = $mysqli->query($queryGiam);
	$arGiam = mysqli_fetch_assoc($resultGiam);
	$soLuong = $arGiam['tatol'];
	if($soLuong!=0){
		?>
		<img src="/templates/admin/assets/img/images.png" width="20px" height="20px" /><?php echo $soLuong ?>
		<?php
	}
?>