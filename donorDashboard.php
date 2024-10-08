<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONOR_profile</title>
    <style>
        .ck{
            display: flex;
            justify-content: flex-end;
            /* margin-right: 25px; */
        }
    </style>
</head>

<body>
    <?php
        include('navbar.php');
        include('CRUD.php');
        session_start();
        if(!isset($_SESSION['Email']))
        {
            header('location:index.php');
        }
    ?>
    <h1 align=center>This is Your Donor Dashboard</h1>
    <div class="ck">
        <div class="btn btn-warning mt-5 me-5"><a class="nav-link" href="logoutD.php" style="color:white;">Log Out</a></div>
    </div>
    <table class="table table-primary table-hover mt-5">
            <?php
                $temp = DashD($_SESSION['Email']);
                if($data = mysqli_fetch_assoc($temp))
                {
                    echo '
                    <tr>
                        <td class="ps-5">Name</td>
                        <td>'.$data['name'].'</td>
                    </tr>
                    <tr>
                        <td class="ps-5">Email</td>
                        <td>'.$data['email'].'</td>
                    </tr>
                    <tr>
                        <td class="ps-5">Password</td>
                        <td>'.$data['password'].'</td>
                    </tr>
                    <tr>
                        <td class="ps-5">Blood Group</td>
                        <td>'.$data['bloodgrp'].'</td>
                    </tr>
                    <tr>
                        <td class="ps-5">Contact</td>
                        <td>'.$data['contact'].'</td>
                    </tr>
                    <tr>
                        <td class="ps-5">Address</td>
                        <td>'.$data['address'].'</td>
                    ';
                }   
            ?>
    </table>
    <div class="ck">
        <button class="btn btn-primary mt-2 me-5 ps-3 pe-3" class="nav-link" onclick="editD('<?php echo $_SESSION['Email'];?>')">Edit</button>
        <button class="btn btn-danger mt-2 me-5 ps-3 pe-3" class="nav-link" onclick="delD('<?php echo $_SESSION['Email'];?>')">Delete</button>
    </div>
    <!-- update modal -->
    <div class="modal fade" id="mymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Donor's Update Panel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="donorEdit.php" method="post">
                    <div class="mb-3">
                        <label for="fname" class="form-label h4">Full Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your Full name" required>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label h4">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" aria-describedby="emailHelp" readonly>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="Contact" class="form-label h4">Contact</label>
                        <input type="number" name="contact" class="form-control" id="Contact" placeholder="Enter your Contact" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="bg" class="form-label h4">Blood Group</label><br>
                        <input type="text" name="Blood_grp" class="form-control" id="bg" readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label h4">Password</label>
                    <input type="password" name="passwrd" class="form-control" id="exampleInputPassword1" placeholder="Enter your Password" required>
                    <input type="checkbox" class="form-text" id="view" onclick="Visible()"> Show Password
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label h4">Address</label>
                        <input type="text" name="adres" class="form-control" id="address" placeholder="Enter your Address" required>
                    </div>
                    </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!-- update modal end-->
    <legend><b>Requests</b></legend>
    <table class="table table-primary table-hover mt-5">
        <thead>
            <th>Sl. No.</th>
            <th>User</th>
            <th>Date</th>
            <th>Purpose</th>
            <th>Address</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                $req = Requesterinfo($_SESSION['Email']);
                $rec = mysqli_num_rows($req);
                if($rec > 0)
                {
                    $sn=1;
                    while($details = mysqli_fetch_assoc($req))
                    {
                        echo '
                        <tr>
                            <td>'.$sn++.'</td>
                            <td>'.$details["user"].'</td>
                            <td>'.$details["date"].'</td>
                            <td>'.$details["purpose"].'</td>
                            <td>'.$details["address"].'</td>
                            <td>
                                <a href="actionCnt.php?act=1&snd='.$details["user"].'&uid='.$details["id"].'">Accept</a>
                                <a href="actionCnt.php?act=0&snd='.$details["user"].'&uid='.$details["id"].'">Decline</a>
                            </td>
                        </tr>';
                    }
                }
                else
                    echo "No records found";
            ?>
        </tbody>
    </table>
    <legend><b>Replied</b></legend>
    <table class="table table-primary table-hover mt-5">
        <thead>
            <th>Sl. No.</th>
            <th>User</th>
            <th>Date</th>
            <th>Purpose</th>
            <th>Address</th>
            <th>Action taken</th>
        </thead>
        <tbody>
            <?php
                $rq = showreply($_SESSION['Email']);
                $rc = mysqli_num_rows($rq);
                if($rc > 0)
                {
                    $sn=1;
                    while($dta = mysqli_fetch_assoc($rq))
                    {
                        echo '
                        <tr>
                            <td>'.$sn++.'</td>
                            <td>'.$dta["user"].'</td>
                            <td>'.$dta["date"].'</td>
                            <td>'.$dta["purpose"].'</td>
                            <td>'.$dta["address"].'</td>
                            <td>'.$dta["reply"].'</td>
                        </tr>';
                    }
                }
                else
                    echo "No records found";
            ?>
        </tbody>
    </table>
    <?php
        include('footer.php');
    ?>
    <script src="bootstrap5.js"></script>
    <script src="z1jquery.js"></script>
    <script>
        function editD(lt)
        {
            $.ajax({
                url: "Dinfopush.php",
                method: "post",
                data: {"smail": lt},
                success: function(response){
                    let ct = JSON.parse(response)
                    // alert(response)
                    document.getElementById("fname").value = ct.name;
                    document.getElementById("exampleInputEmail1").value = ct.email;
                    document.getElementById("Contact").value = ct.contact;
                    document.getElementById("bg").value = ct.bloodgrp;
                    document.getElementById("exampleInputPassword1").value = ct.password;
                    document.getElementById("address").value = ct.address;
                    $("#mymodal").modal("show")
                }
            })
        }

        function Visible()
        {
            let v = document.getElementById("exampleInputPassword1")
            if(v.type == "password")
                v.type = "text"
            else
                v.type = "password"
        }

        function delD(lt)
        {
            if(confirm("Are you sure to DELETE your account!!"))
            {
                $.ajax({
                    url: "deleteD.php",
                    method: "post",
                    data: {"cmail": lt},
                    success: function(response)
                    {
                        alert(response);
                        window.location.href="logoutD.php";
                    }
                })
            }
        }
    </script>
</body>
</html>