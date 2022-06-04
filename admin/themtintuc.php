<?php 
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ten = $_POST['ten'];
        $hinhanh = $_POST['hinhanh'];
        $post_content = $_POST['post_content'];
        $thoigian = date('h:i');
        $ngay = date('d/m/Y');
        $danhmuc = $_POST['danhmuc'];
        $tacgia = $_SESSION['name'];

        $conn1 = mysqli_connect("localhost","root","","giuaki");
        $sql1 = "INSERT INTO tintuc (tieude,hinhminhhoa,noidung,thoigian,ngay,tacgia,iddanhmuc) VALUES ('$ten','$hinhanh','$post_content','$thoigian','$ngay','$tacgia','$danhmuc')";
        $ketqua1 = mysqli_query($conn1,$sql1);
        if(isset($ketqua1)){
            header("location: quanlitintuc.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Thêm tin tức</title>
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
                    <h1 class="page-header">Thêm tin tức</h1>
                </div>
                <!--end page header -->
            </div>
            <form action="themtintuc.php" method="post">
	<table>
		<tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Tiêu đề :</td>
			<td><input type="text" id="ten" name="ten"></td>
		</tr>
        <tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Thuộc danh mục :</td>
            <td>
                <select id="danhmuc" name="danhmuc">
                    <?php 
                        $conn = mysqli_connect("localhost","root","","giuaki");
                        $sql = "SELECT * FROM danhmuctintuc";
                        $ketqua = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($ketqua)){
                            echo '<option value="'.$row['id'].'">'.$row['tendanhmuc'].'</option>';
                        }
                    ?>
                </select>
               <td> Ảnh : <input type="file" name="hinhanh" id="hinhanh"></td>
            </td>
            
		</tr>
		<tr>
			<td nowrap="nowrap">Nội dung :</td>
			<td><textarea name="post_content" id="post_content" rows="10" cols="110"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
                <button type="submit" class="btn btn-info">Thêm tin tức</button>
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
