<?php
    include('CRUD.php');
    $resp = updateU($_POST);
    if($resp == 1)
        header('location:userDashboard.php');
?>