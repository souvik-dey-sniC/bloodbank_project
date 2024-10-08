<?php
    session_start();
    // session_destroy();
    unset($_SESSION['mail']);
    unset($_SESSION['req']);
    header('location:index.php');
?>