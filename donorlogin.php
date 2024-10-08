<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <title>Donor_login</title>
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
        include('navbar.php');
        include('CRUD.php');
        session_start();
      ?>
        <h1 style="text-align: center;">DONOR LOGIN</h1>
        <form action="" method="post" style="margin: 0 10% 10%;">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label h4">Email address</label>
              <input type="email" name ="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label h4">Password</label>
              <input type="password" name="passkey" class="form-control" id="exampleInputPassword1" placeholder="Enter your Password" required>
              <input type="checkbox" class="form-text" id="view" onclick="Visible()"> Show Password
            </div>
            <button type="submit" name="loginD" class="btn btn-primary">LOGIN</button>
            <button type="reset" class="btn btn-warning ms-2">RESET</button>
            <?php
              if(isset($_POST['loginD']))
              {
                $collect = dlogin($_POST);
                $records = mysqli_num_rows($collect);
                if($records > 0)
                {
                  $_SESSION['Email']=$_POST['email'];
                  header("location:donorDashboard.php");
                }
                else
                  echo "<u>Sorry!! No records found</u>";
              }
            ?>
            <p><h5><b>NEW DONOR ? </b><a href="donorregister.php">Register Here !!</a></h5></p>
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
    <script>
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