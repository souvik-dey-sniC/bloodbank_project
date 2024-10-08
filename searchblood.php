<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search_blood</title>
    <style>
      .tcontainer{
        background-color: darkred;
        color: white;
      }
    </style>
    
</head>
<body>
    <div class="tcontainer">
        <div>
            <?php
                include('navbar.php');
                include('CRUD.php');
                session_start();
            ?>
            <form action="" method="post" style="margin: 40px 10% 10%;">
                <div class="mb-3">
                    <table align=center>
                        <tr>
                            <td><label for="bg" class="form-label h2">Blood Group:</label></td>
                            <td width="350px"><select name="Blood_grp" id="bg" class="ms-2 form-control" required>
                                <option name="Blood_grp" value="">Search Blood Group</option>
                                <option name="Blood_grp" value="A+">A+</option>
                                <option name="Blood_grp" value="A-">A-</option>
                                <option name="Blood_grp" value="B+">B+</option>
                                <option name="Blood_grp" value="B-">B-</option>
                                <option name="Blood_grp" value="O+">O+</option>
                                <option name="Blood_grp" value="O-">O-</option>
                                <option name="Blood_grp" value="AB+">AB+</option>
                                <option name="Blood_grp" value="AB-">AB-</option>
                            </select></td>
                            <td><button type="submit" name="search" class="btn btn-success ms-3">Search</button></td>
                        </tr>
                    </table>
                </div>
            </from>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <table class="table table-info table-hover">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_POST['search']))
                    {
                        $caught = donorbyID($_POST);
                        $rowsp = mysqli_num_rows($caught);
                        if($rowsp > 0)
                        {
                            $count = 0;
                            while($data = mysqli_fetch_assoc($caught))
                            {
                                $count++;
                                echo '
                                <tr>
                                    <td>'.$count.'</td>
                                    <td>'.$data['name'].'</td>
                                    <td>'.$data['email'].'</td>
                                    <td>'.$data['contact'].'</td>
                                    <td>'.$data['address'].'</td>
                                    <td>
                                        <a href="request.php?need='.$data['email'].'">Request</a>
                                    </td>
                                </tr>';
                            }
                        }
                        else{
                            echo '<script>Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "No matches found!!",
                                timer: 1500
                            });</script>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php
        include('footer.php');
    ?>
</body>
</html>