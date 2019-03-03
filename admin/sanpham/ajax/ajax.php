<?php
	ob_start();
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/ConstantUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/Utf8ToLatinUtil.php';
?>
<?php
	$a = $_POST['data'];
	$query = "SELECT * FROM sanpham as sp INNER JOIN loaisanpham as lsp ON sp.IDLoaiSanPham = lsp.IDLoaiSanPham WHERE sp.TenSanPham LIKE '%{$a}%'";
	$result = $mysqli->query($query);
	while($arNews = mysqli_fetch_assoc($result)){
		$ID = $arNews['IDSanPham'];
		$Ten = $arNews['TenSanPham'];
		$Mota = $arNews['MoTa'];
		$NXB = $arNews['NhaXuatBan'];
		$Tacgia = $arNews['TacGia'];	
		$ggiam = $arNews['GiaDaGiam'];	
		$gban = $arNews['GiaBan'];	
		$Hinhanh = $arNews['HinhAnh'];
		$Soluong = $arNews['SoLuongNhap'];
		$Trangthai = $arNews['TrangThai'];
		$IDLoai = $arNews['IDLoaiSanPham'];	
		$Tenloai = $arNews['TenLoaiSanPham'];
?>
<tr>
	<td><?php echo $Ten; ?></td>
	<td><?php echo $Mota; ?></td>
	<td><?php echo $NXB; ?></td>
	<td><?php echo $Tacgia; ?></td>
	<td><?php echo $ggiam; ?></td>
	<td><?php echo $gban; ?></td>
	<td><?php echo $Tenloai; ?></td>
	<?php 
		if($Hinhanh !=''){ // empty() 
	?>
	<td><img src="/files/<?php echo $Hinhanh ?>" alt="" width="100px" />
	<?php } else {?>
		<td><strong>Không có hình ảnh</strong></td>
	<?php } ?>	
	</td>
	
	<td><a href="javascript:void(0)" onclick="return getTT(<?php echo $Trangthai ?>,<?php echo $ID ?>)"><img src="/templates/admin/assets/img/<?php if($Trangthai==0){echo 'agree.png';} else { echo 'deagree.png'; } ?>" alt="" width="40px" height="40px" /></a></td>
	
	<td>
	<?php 
		// Khi dang nhap tai khoan la Admindemo thi day la tk demo nen khong duoc thuc hien cac chuc nang
		//if($_SESSION['userInfo']['username']!="admindemo"){ 
	?>
		<a href="edit.php?id=<?php echo $ID;?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a></br>
		<a href="del.php?id=<?php echo $ID;?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
	<?php //} ?>
	</td>
	
</tr>
	<?php	 } ?>	