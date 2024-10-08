<?php
    include('CRUD.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BloodBank Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="main/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="main/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="main/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="main/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="main/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="main/">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="main/css/util.css">
	<link rel="stylesheet" type="text/css" href="main/css/main.css">
<!--===============================================================================================-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="main/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						#Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="spp" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <!-- <div class="wrap-input100 validate-input">
						<input class="input100" type="checkbox"  name="email" onclick="showpass()">Show Password
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div> -->
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
					<div>
						<?php
                        session_start();
						    if(isset($_POST['login'])) {
								$response = loginAdmin($_POST);
								$records = mysqli_num_rows($response);
								if($records > 0)
                                 {
								//   echo "Login Success!";
                                    $_SESSION['addmail']=$_POST['email'];
								    echo'
								<script>
                            let timerInterval;
                            Swal.fire({
                              title: "Login Success!",
                              html: "Please Wait! Page will be redirect to dashboard..",
                              timer:2000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                  timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                              },
                              willClose: () => {
                                clearInterval(timerInterval);
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                window.location.href="adminIndex.php";
                                //alert("");
                              }
                            });
                            </script>
								';
								}
								else {
								  echo "Sorry! Invalid Email or Password..";
								}
							  }
						?>
					</div>
					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="userRegis.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="main/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="main/vendor/bootstrap/js/popper.js"></script>
	<script src="main/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="main/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="main/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="main/js/main.js"></script>
    <script>
        function showpass()
        {
            let sp = document.getElementById('spp')
            if(sp.type == "password")
                sp.type = "text"
            else
                sp.type = "password"
        }
    </script>

</body>
</html>