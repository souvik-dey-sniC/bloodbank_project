<?php
    include("CRUD.php");
    $id =$_GET['id'];

    $response = deleteRequestedUser($email);
    if($response == 1) {
        // header('location:04_dashboard.php');
        echo "SUCCESS!";
    }
    else {
        echo "FAILED!";
    }
?>