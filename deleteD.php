<?php
    include('CRUD.php');
    // session_start();

    $ml = $_POST['cmail'];
    $respn = deldonor($ml);

    if($respn == 1)
        echo "Success";
    else
        echo "Failed";
?>