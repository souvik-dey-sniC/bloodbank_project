<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home_Page</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style>
      .dcontainer{
        background-color: darkred;
      }
    </style>
</head>
<body>
  <div class="dcontainer">
    <!-- navbar -->
    <?php
        include ('navbar.php');
    ?>
    <!-- navbar -->
    <!-- carousel -->
    <div class="container mt-3">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-intrval="5000">
        <div class="carousel-inner" style="border-radius: 15px;">
          <div class="carousel-item ">
            <img src="images/June-14th.jpg" class="d-block w-100" alt="..." height=625>
          </div>
          <div class="carousel-item active">
            <img src="images/creative-collage.jpg" class="d-block w-100" alt="..." height=625>
          </div>
          <!-- <div class="carousel-item">
            <img src="assets/mountain-landscape-tranquil-waters-majestic-rocky-peaks-generated-by-ai.jpg" class="d-block w-100" alt="...">
          </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <!-- slider -->
    </div>
    <!-- carousel -->
    <?php
    include ('footer.php');
    ?>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="zjquery.js"></script>
</body>
</html>