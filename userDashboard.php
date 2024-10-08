<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER_profile</title>
    <style>
        .ck{
            display: flex;
            justify-content: flex-end;
            /* margin-left: 25px; */
        }
    </style>
</head>
<body>
<?php
        include('navbar.php');
        include('CRUD.php');
        session_start();
        if(!isset($_SESSION['mail']))
        {
            header('location:index.php');
        }
    ?>
    <h1 align=center>This is YOUR User Dashboard</h1>
    <div class="ck">
        <div class="btn btn-warning mt-5 me-5"><a class="nav-link" href="logoutU.php" style="color:white;">LogOut</a></div>
    </div>
    <table class="table table-primary table-hover mt-5">
        <tbody>
            <?php
                $temp = DashU($_SESSION['mail']);
                while($data = mysqli_fetch_assoc($temp))
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
                        <th>'.$data['password'].'</th>
                    </tr>
                    <tr>
                        <td class="ps-5">Contact</td>
                        <td>'.$data['contact'].'</td>
                    </tr>
                    <tr>
                        <td class="ps-5">Address</td>
                        <td>'.$data['address'].'</td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
    <div class="ck">
        <button class="btn btn-primary mt-2 me-5 ps-3 pe-3" class="nav-link" onclick="editU('<?php echo $_SESSION['mail'];?>')">Edit</button>
        <button class="btn btn-danger mt-2 me-5 ps-3 pe-3" class="nav-link" onclick="delU('<?php echo $_SESSION['mail'];?>')">Delete</button>
    </div>
    <!-- update modal -->
    <div class="modal fade" id="mymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">User's Update Panel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="userEdit.php" method="post">
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
    <?php
        include('footer.php');
    ?>
    <script src="bootstrap5.js"></script>
    <script src="z1jquery.js"></script>
    <script>
        function delU(lt)
        {
            if(confirm("Are you sure to DELETE your account!!"))
            {
                $.ajax({
                    url: "deleteU.php",
                    method: "post",
                    data: {"cmail": lt},
                    success: function(response)
                    {
                        alert(response);
                        window.location.href="logoutU.php";
                    }
                })
            }
        }
        function editU(lt)
        {
            $.ajax({
                url: "Uinfopush.php",
                method: "post",
                data: {"smail": lt},
                success: function(response){
                    let ct = JSON.parse(response)
                    // alert(response)
                    document.getElementById("fname").value = ct.name;
                    document.getElementById("exampleInputEmail1").value = ct.email;
                    document.getElementById("Contact").value = ct.contact;
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
    </script>
</body>
</html>