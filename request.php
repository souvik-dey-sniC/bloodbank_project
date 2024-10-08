<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request_form</title>
    <!-- sweetalertCDN -->
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
      <!-- sweetalertCDN -->
    <style>
      .ucontainer{
        background-color: darkred;
        color: white;
      }
    </style>
</head>
<body>
    <div class="ucontainer">
    <?php
        include('navbar.php');
        include('CRUD.php');
        session_start();
        if(!isset($_SESSION['mail']))
        {
            $_SESSION['req'] = $_GET['need'];
            header('location:userlogin.php');
            if(!isset($_SESSION['req']))
                header('location:searchblood.php');
        }
    ?>
    <form action="" method="post" style="margin: 0 10% 10%;" class="mt-4">
        <div class="mb-3">
            <label for="fname" class="form-label h4">Requested By</label>
            <input type="email" name="emailU" class="form-control" id="fname" value="<?php echo $_SESSION['mail'];?>" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label h4">Request To</label>
            <input type="email" name="emailD" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['req'];?>" readonly>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="Contact" class="form-label h4">Date</label>
            <input type="date" name="date" class="form-control" id="Contact" placeholder="Enter Date to be delivered" min="0" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label h4">Purpose</label>
            <input type="text" name="purpose" class="form-control" id="exampleInputPassword1" placeholder="Enter your Purpose for needing blood" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label h4">Address</label>
            <input type="text" name="adres" class="form-control" id="address" placeholder="Enter the Address to deliver" required>
        </div>
        <button type="submit" name="req" class="btn btn-primary">REQUEST</button>
        <button type="reset" class="btn btn-warning ms-2">RESET</button>

    <?php
        if(isset($_POST['req']))
        {
            $cach = datainsert($_POST);
            if($cach == 1)
            {
                $sendD = Dmail($_POST);
                $sendU = Umail($_POST);
                if($sendD == 1 && $sendU == 1)
                {
                    unset($_SESSION['req']);
                    echo '<script>swal({
                        title: "Mail Successfully Send!!",
                        text: "Donor will reply to you shortly",
                        timer: 5000
                      })
                      window.location.href="userDashboard.php";
                      </script>';
                    // header('location:userDashboard.php');
                }
            }
            else
                echo "ERROR!!";
        }
    ?>
    </form>
    <?php
        include('footer.php');
    ?>
    </div>
</body>
</html>