<?php 
    session_start();
?>
<?php
    unset($_SESSION['name']);
    header("location: ../giuaki");
?>