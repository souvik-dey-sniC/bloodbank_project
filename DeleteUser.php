<?php
    include("CRUD.php");
    $email =$_GET['email'];

    $response = deleteUser($email);
    if($response == 1) {
        // header('location:04_dashboard.php');
        echo "SUCCESS!";
    }
    else {
        echo "FAILED!";
    }
?>