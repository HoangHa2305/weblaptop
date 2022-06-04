<?php 
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM binhluan WHERE id= $id";
    $ketqua = mysqli_query($conn,$sql);
    header("location:../admin/quanlibinhluan.php");  
?>