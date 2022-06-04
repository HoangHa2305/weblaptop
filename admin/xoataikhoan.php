<?php 
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM username WHERE id=$id";
    $ketqua = mysqli_query($conn,$sql);
    header('location: taikhoan.php');
?>