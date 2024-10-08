<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <title>Donor_register</title>

    <!-- sweetalertCDN -->
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
      <!-- sweetalertCDN -->

    <style>
      .dcontainer{
        background-color: darkred;
        color: white;
      }
    </style>
  </head>
  <body>
  <div class="dcontainer">
      <?php
        include('CRUD.php');
        include('navbar.php');
      ?>
        <h1 style="text-align: center;">DONOR REGISTRATION</h1>
        <form action="" method="post" style="margin: 0 10% 10%;">
            <div class="mb-3">
                <label for="fname" class="form-label h4">Full Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your Full name" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label h4">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="Contact" class="form-label h4">Contact</label>
                <input type="number" name="contact" class="form-control" id="Contact" placeholder="Enter your Contact" min="0" required>
            </div>
            <div class="mb-3">
                <label for="bg" class="form-label h4">Blood Group</label><br>
                <select name="Blood_grp" id="bg" class="form-control" required>
                    <option name="Blood_grp" value="">Select Blood Group</option>
                    <option name="Blood_grp" value="A+">A+</option>
                    <option name="Blood_grp" value="A-">A-</option>   
                    <option name="Blood_grp" value="B+">B+</option>
                    <option name="Blood_grp" value="B-">B-</option>
                    <option name="Blood_grp" value="O+">O+</option>
                    <option name="Blood_grp" value="O-">O-</option>
                    <option name="Blood_grp" value="AB+">AB+</option>
                    <option name="Blood_grp" value="AB-">AB-</option>
                </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label h4">Password</label>
              <input type="password" name="passwrd" class="form-control" id="exampleInputPassword1" placeholder="Enter your Password" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label h4">Address</label>
                <input type="text" name="adres" class="form-control" id="address" placeholder="Enter your Address" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">REGISTER</button>
            <button type="reset" class="btn btn-warning ms-2">RESET</button>
            <?php
              if(isset($_POST['register']))
              {
                $getting = donorinsert($_POST);
                if($getting==1)
                  echo '<script>swal({
                    title: "Registered Successfully!!",
                    text: "Proceed to LOGIN",
                    timer: 2000
                  })</script>';
                else
                  echo "Data insertion UNSUCCESSFUL!!";
              }
            ?>
            <p><h5><b>Already Registered ? </b><a href="donorlogin.php">Login Here !!</a></h5></p>
        </form>
      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      -->
      <?php
      include ('footer.php');
      ?>
    </div>
  </body>
</html>