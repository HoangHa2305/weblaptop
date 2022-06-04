<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date('H:i:s d/m/Y');
    $noidung = $_POST['noidung'];
    $name = $_POST['name'];
    $idhanghoa = $_POST['idhanghoa'];
    $avata = $_POST['avata'];
    
    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "INSERT INTO binhluan (noidung, thoigian, idhanghoa, tacgia,avata) VALUES ('$noidung','$time','$idhanghoa','$name','$avata')";
    $ketqua = mysqli_query($conn,$sql);
?>