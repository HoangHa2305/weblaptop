<?php 
    session_start();
    $id = $_GET['id'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ten = $_POST['ten'];
        $hinhanh = $_POST['hinhanh'];
        $post_content = $_POST['post_content'];
        $danhmuc = $_POST['danhmuc'];

        $conn1 = mysqli_connect("localhost","root","","giuaki");
        $sql1 = "UPDATE tintuc SET tieude ='$ten', hinhminhhoa = '$hinhanh', noidung = '$post_content', iddanhmuc = $danhmuc WHERE id=$id";
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
    <title>Chỉnh sửa tin tức</title>
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
    <?php 
         $conn1 = mysqli_connect("localhost","root","","giuaki");
         $sql1 = "SELECT * FROM tintuc WHERE id=$id";
         $ketqua1 = mysqli_query($conn1,$sql1);
         $row1 = mysqli_fetch_array($ketqua1);
    ?>
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Chỉnh sửa tin tức</h1>
                </div>
                <!--end page header -->
            </div>
            <form action="" method="post">
	<table>
		<tr style="margin-bottom: 10px;">
			<td nowrap="nowrap">Tiêu đề :</td>
			<td><input type="text" id="ten" name="ten" value="<?php echo $row1['tieude'];  ?>"></td>
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
                            echo '<option value="'.$row['id'].'"';
                            if($row1['iddanhmuc'] == $row['id'])
                            echo 'selected';
                            echo '>'.$row['tendanhmuc'].'</option>';
                        }
                    ?>
                </select>
               <td> Ảnh : <input type="file" name="hinhanh" id="hinhanh" value="<?php echo $row1['hinhminhhoa'];  ?>"></td>
            </td>
            
		</tr>
		<tr>
			<td nowrap="nowrap">Nội dung :</td>
			<td>
                <textarea name="post_content" id="post_content" rows="10" cols="110"><?php echo $row1['noidung']; ?></textarea>
            </td>
		</tr>
		<tr>
			<td colspan="2" align="center">
                <button type="submit" class="btn btn-warning">Chỉnh sửa tin tức</button>
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
