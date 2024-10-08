<?php
    include('CRUD.php');
    $cmail = $_POST['smail'];

    $response = DashD($cmail);
    $dict = mysqli_fetch_assoc($response);
    echo json_encode($dict);
?>