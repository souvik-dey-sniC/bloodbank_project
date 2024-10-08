<?php
    include('CRUD.php');
    $act = $_GET['act'];
    $snd = $_GET['snd'];
    $uid = $_GET['uid'];
    if($act == 1)
    {
        $reply = "approved";
        $msg = replyMail($snd,$reply);
        if($msg == 1)
        {
            $rpy = tfdetails($snd,$reply,$uid);
            if($rpy == 1)
                header('location:donorDashboard.php');
        }
    }
    else
    {
        $reply = "rejected";
        $msg = replyMail($snd,$reply);
        if($msg == 1)
        {
            $rpy = tfdetails($snd,$reply,$uid);
            if($rpy == 1)
                header('location:donorDashboard.php');
        }
    }
?>