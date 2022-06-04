<?php 
    $idbinhluan = $_GET['id'];
    $idtintuc = $_GET['idtintuc'];
    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM binhluan WHERE id= $idbinhluan";
    $ketqua = mysqli_query($conn,$sql);
    header("location:../giuaki/tintuc.php?id=".$idtintuc);
    
?>