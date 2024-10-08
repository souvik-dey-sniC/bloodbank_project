<?php
    session_start();
    unset($_SESSION['addmail']);
    header('location:adminLogin.php');
?>