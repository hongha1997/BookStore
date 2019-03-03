<?php
	ob_start();
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/ConstantUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/Utf8ToLatinUtil.php';
?>
<?php
	$a = $_POST['data'];
	$query = "SELECT * FROM khachhang WHERE TenKhachHang LIKE '%{$a}%'";
	$result = $mysqli->query($query);
	$result = $mysqli->query($query);
	while($ar = mysqli_fetch_assoc($result)){
		$ID = $ar['IDKhachHang'];
		$Ten = $ar['TenKhachHang'];
		$email = $ar['Mail'];
		$sdt = $ar['SDT'];
		$diachi = $ar['DiaChiKhachHang'];
?>
 <tr>
	<td><?php echo $Ten; ?></td>
	<td><?php echo $email; ?></td>
	<td><?php echo $sdt; ?></td>
	<td><?php echo $diachi; ?></td>
	<td>
	<?php 
		// Khi dang nhap tai khoan la Admindemo thi day la tk demo nen khong duoc thuc hien cac chuc nang
		//if($_SESSION['userInfo']['username']!="admindemo"){ 
	?>
		<a href="edit.php?id=<?php echo $ID;?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a>  
		<a href="del.php?id=<?php echo $ID;?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
	<?php //} ?>
	</td>
	
</tr>
	<?php	 } ?>	