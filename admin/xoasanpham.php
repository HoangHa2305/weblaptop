<?php 
    $id = $_GET['id'];
    $tenhanghoa = $_GET['tenhanghoa'];

    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM hanghoa WHERE id=$id";
    $ketqua = mysqli_query($conn,$sql);

    $conn1 = mysqli_connect("localhost","root","","giuaki");
    $sql1 = "DELETE FROM chitietsanpham WHERE tenhanghoa= '$tenhanghoa'";
    $ketqua1 = mysqli_query($conn1,$sql1);
    header('location: quanlisanpham.php');
?>