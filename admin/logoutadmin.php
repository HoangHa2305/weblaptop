<?php 
    session_start();
?>
<?php
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header("location: ../login.php");
?>