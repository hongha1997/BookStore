<?php
	ob_start();
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/ConstantUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/Utf8ToLatinUtil.php';
?>
<?php
	$a = $_POST['data'];
	$query = "SELECT * FROM lienhe WHERE TenNguoiLienHe LIKE '%{$a}%' ";
	$result = $mysqli->query($query);
	while($ar = mysqli_fetch_assoc($result)){
		$id = $ar['IDLienHe'];
		$name_lienhe = $ar['TenNguoiLienHe'];
		$email_lienhe = $ar['Mail'];
		$sdt_lienhe = $ar['SDT'];
		$noidung = $ar['NoiDung'];
?>
<tr>
	<td><?php echo $id; ?></td>
	<td><?php echo $name_lienhe; ?></td>
	<td><?php echo $email_lienhe; ?></td>
	<td><?php echo $sdt_lienhe; ?></td>
	<td><?php echo $noidung; ?></td>
	<td>
		<a href="del.php?id=<?php echo $id; ?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
	</td>
</tr>
<?php } ?>