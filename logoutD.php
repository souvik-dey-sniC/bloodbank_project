<?php
    session_start();
    // session_destroy();
    unset($_SESSION['Email']);
    header('location:index.php');
?>