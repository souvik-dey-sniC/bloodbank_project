<?php
    include("CRUD.php");
    $email =$_GET['email'];

    $response = deleteDonor($email);
    if($response == 1) {
        // header('location:04_dashboard.php');
        echo "SUCCESS!";
    }
    else {
        echo "FAILED!";
    }
?>