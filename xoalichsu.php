<?php 
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM chitietdonhang WHERE Id = $id ";
    $ketqua = mysqli_query($conn,$sql);

    header('location: lichsudonhang.php');
?>