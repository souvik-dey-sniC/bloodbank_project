<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <!-- Toggle button -->
          <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navbarRightAlignExample"
            aria-controls="navbarRightAlignExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>
      
          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <!-- Left links -->
            <div>
                <img src="images/blood-drop-plus.webp" alt="" srcset="" height="45" style="border-radius: 20px;">
            </div>
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">E-Blood Bank</span>
              </div>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><h5>Home</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="donorlogin.php"><h5>Donor</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="userlogin.php"><h5>User</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="searchblood.php"><h5>Search</h5></a>
              </li>
              
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
    <!-- navbar -->
</body>
</html>