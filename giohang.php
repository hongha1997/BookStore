<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/header.php'; ?>
<div class="container">
		
			<!---->
		 <div class="main"> 
         <div class="reservation_top">          
<?php
          if(isset($_GET['msg'])){
            echo $_GET['msg'];
          } 
        ?>
            		<h3>Thông tin giỏ hàng</h3>
                <?php 
                $query2 = "SELECT * FROM chitiethang WHERE IDSanPham = 10 ";
  $result2 = $mysqli->query($query2);
  $ar2 = mysqli_fetch_assoc($result2);
 // $haha = $ar2['tatol'];
  $sl = $ar2['SoLuong'];
  //echo $haha;
  echo $sl;//die();
                 ?>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Tên sách</th>
        <th>Giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
		<th>Gõ bỏ</th>
      </tr>
    </thead>
    <tbody>


      <?php
      $idkh = $_SESSION['userInfo2']['IDKhachHang'];

    $query = "SELECT * FROM chitiethang as cth INNER JOIN sanpham as sp ON cth.IDSanPham = sp.IDSanPham WHERE IDKhachHang = '{$idkh}' ";
    $result = $mysqli->query($query);
     $thanhtien2=0;
    while($ar = mysqli_fetch_assoc($result)){
      $idsp = $ar['IDSanPham'];
      $tensach = $ar['TenSanPham'];
      $id = $ar['IDchitiethang'];
      $gia = $ar['GiaDaGiam'];
      $soluong = $ar['SoLuong'];
      $thanhtien =  $gia*$soluong;
      $thanhtien2=$thanhtien2+$thanhtien;

    //  $query2 ="INSERT INTO chitietdonhang (IDctdh, IDSanPham, SoLuong, ThanhTien, IDKhachHang)
   // VALUES ('{$id}','{$idsp}','{$soluong}', '{$thanhtien}', '{$idkh}')";
    //  $result2 = $mysqli->query($query2);

    ?>

      <tr>
        <td><?php echo $tensach; ?></td>
        <td><?php echo $gia; ?></td>
		<td><?php echo $soluong; ?></td>
		<td><?php echo $thanhtien; ?></td>
		<td><a href="/xoa.php?id=<?php echo $id; ?>">Gở bỏ</a></td>
      </tr>
    
    <?php } ?>
    <?php 

    ?>
	  <tr>
        <td>Tổng tiền:</td>
        <td><?php echo $thanhtien2; ?></td>
        <td></td>
		<td></td>
		<td><a href="/xoaall.php">Gở bỏ tất cả</a></td>
      </tr>
    </tbody>
  </table>
     

<div class="container">
    
           <div class="account_grid">
         <div class=" login-right">
<form action="/thanhtoan.php" method="post">

          <input type="submit" value="Tiến hàng đặt hàng">
          </form>
</div>
           </div>
           </div>
            </div>
           </div>
		   <?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/rightbar.php'; ?>
	     </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/bookstore/inc/footer.php'; ?>