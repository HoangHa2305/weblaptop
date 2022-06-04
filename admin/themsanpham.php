<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ten = $_POST['ten'];
        $soluong = $_POST['soluong'];
        $dongia = $_POST['dongia'];
        $danhmuc = $_POST['danhmuc'];
        $hinhanh = $_POST['hinhanh'];
        $post_content = $_POST['post_content'];

        $conn1 = mysqli_connect("localhost","root","","giuaki");
        $sql1 = "INSERT INTO hanghoa (tenhang,soluong,dongia,hinhanh,mota,danhmuc) VALUES ('$ten','$soluong','$dongia','$hinhanh','$post_content','$danhmuc')";
        $ketqua1 = mysqli_query($conn1,$sql1);

        $hinh1 = $_POST['hinh1'];
        $hinh2 = $_POST['hinh2'];
        $hinh3 = $_POST['hinh3'];
        $conn2 = mysqli_connect("localhost","root","","giuaki");
        $sql2 = "INSERT INTO chitietsanpham (tenhanghoa,hinh1,hinh2,hinh3) VALUES ('$ten','$hinh1','$hinh2','$hinh3')";
        $ketqua2 = mysqli_query($conn2,$sql2);
        if(isset($ketqua1) && isset($ketqua2)){
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
    <title>Thêm sản phẩm</title>
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
                    <h1 class="page-header">Thêm sản phẩm</h1>
                </div>
                <!--end page header -->
            </div>
            <form action="themsanpham.php" method="post">
	<table>
		<tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Tên sản phẩm :</td>
			<td><input type="text" id="ten" name="ten"></td>
		</tr>
        <tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Số lượng :</td>
			<td><input type="number" id="soluong" name="soluong">
            Đơn giá:
			<input type="number" id="dongia" name="dongia"></td>
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
                            echo '<option value="'.$row['id'].'">'.$row['tendanhmuc'].'</option>';
                        }
                    ?>
                </select>
               <td> Ảnh chính : <input type="file" name="hinhanh" id="hinhanh"></td>
            </td>
            
		</tr>
		<tr>
			<td nowrap="nowrap">Mô tả :</td>
			<td><textarea name="post_content" id="post_content" rows="10" cols="110"></textarea></td>
		</tr>
        <tr>
            <td>Hình minh họa:</td>
            <td><input type="file" name="hinh1" id="hinh1"><input type="file" name="hinh2" id="hinh2"><input type="file" name="hinh3" id="hinh3"></td>
        </tr>
		<tr>
			<td colspan="2" align="center">
                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
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
