<?php 
    session_start();
    $id = $_GET['id'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ten = $_POST['ten'];
        $soluong = $_POST['soluong'];
        $dongia = $_POST['dongia'];
        $danhmuc = $_POST['danhmuc'];
        $hinhanh = $_POST['hinhanh'];
        $post_content = $_POST['post_content'];

        $conn1 = mysqli_connect("localhost","root","","giuaki");
        $sql1 = "UPDATE hanghoa SET tenhang= '$ten',soluong=$soluong , dongia=$dongia , hinhanh= '$hinhanh', mota= '$post_content' , danhmuc= $danhmuc WHERE id=$id";
        $ketqua1 = mysqli_query($conn1,$sql1);

        $hinh1 = $_POST['hinh1'];
        $hinh2 = $_POST['hinh2'];
        $hinh3 = $_POST['hinh3'];
        $conn2 = mysqli_connect("localhost","root","","giuaki");
        $sql2 = "UPDATE chitietsanpham SET hinh1= '$hinh1',hinh2= '$hinh2',hinh3= '$hinh3' WHERE tenhanghoa='$ten'";
        $ketqua2 = mysqli_query($conn2,$sql2);
        if(isset($ketqua2) && isset($ketqua1)){
            echo 'Thêm thành công sản phẩm';
            header("location: quanlisanpham.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Chỉnh sửa sản phẩm</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />
</head>

<body>
<?php include('nav.php'); ?>
<div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Chỉnh sửa sản phẩm</h1>
                </div>
                <!--end page header -->
            </div>
<?php
    $conn2 = mysqli_connect("localhost","root","","giuaki");
    $sql2 = "SELECT * FROM hanghoa WHERE id= $id";
    $ketqua2 = mysqli_query($conn2,$sql2);
    $row2 = mysqli_fetch_array($ketqua2);
?>
            <form action="" method="POST">
	<table>
		<tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Tên sản phẩm :</td>
			<td><input type="text" id="ten" name="ten" value="<?php echo $row2['tenhang'] ?>"></td>
		</tr>
        <tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Số lượng :</td>
			<td><input type="number" id="soluong" name="soluong" value="<?php echo $row2['soluong'] ?>">
            Đơn giá:
			<input type="number" id="dongia" name="dongia" value="<?php echo $row2['dongia'] ?>"></td>
		</tr>
        <tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Thuộc hãng :</td>
            <td>
                <select id="danhmuc" name="danhmuc">
                    <?php 
                        $conn = mysqli_connect("localhost","root","","giuaki");
                        $sql = "SELECT * FROM danhmuchanghoa";
                        $ketqua = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($ketqua)){
                            echo '<option value="'.$row['id'].'"';
                            if($row2['danhmuc'] == $row['id'])
                            echo 'selected';
                            echo '>'.$row['tendanhmuc'].'</option>';
                        }
                    ?>
                </select>
               <td> Ảnh chính : <input type="file" name="hinhanh" id="hinhanh" value="<?php echo $row2['hinhanh'] ?>"></td>
            </td>
            
		</tr>
		<tr>
			<td nowrap="nowrap">Mô tả :</td>
			<td><textarea name="post_content" id="post_content" rows="10" cols="110"><?php echo $row2['mota'] ?></textarea></td>
		</tr>
        <br>
        <tr>
            <td>Hình minh họa:</td>
            <td><input type="file" name="hinh1" id="hinh1"><input type="file" name="hinh2" id="hinh2"><input type="file" name="hinh3" id="hinh3"></td>
        </tr>
		<tr>
			<td colspan="2" align="center">
                <button type="submit" class="btn btn-warning">Chỉnh sửa sản phẩm</button>
            </td>
		</tr>

	</table>
	
</form>
</div>
    <script>
        CKEDITOR.replace( 'post_content' );
    </script>
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
