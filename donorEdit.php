<?php
    include('CRUD.php');
    $resp = updateD($_POST);
    if($resp == 1)
        header('location:donorDashboard.php');
?>