<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top"  id="navheader">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">altera</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header"  style="background: #004274">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="background: #004274">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="sector.php">Sector Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="github.php">Github</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 active" aria-current="page">Contact</a>
                </li> 
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navbar end -->
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>