<?php 
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM contact WHERE id=$id";
    $ketqua = mysqli_query($conn,$sql);
    header('location: contactus.php');
?>