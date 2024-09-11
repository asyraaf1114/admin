<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php
      $conn_string = "";
      $dbconn4 = pg_connect($conn_string) or die ("Unable to connect to postgre");
      $raw_data = pg_query($dbconn4 , "SELECT * FROM public.fw_info ORDER BY release DESC, build DESC, family_id DESC");
      $resultArr = pg_fetch_all($raw_data);
    ?>
</head>
<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navheader">
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
                  <a class="nav-link mx-lg-2 active" aria-current="page">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="sector.php">Sector Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="github.php">Github</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="contact.php">Contact</a>
                </li> 
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navbar end -->

      <section>
      <div class="header-back header-back-small" style="background: #1f1e1e">
        <div class="header-back-container">
          <div class="container">
            <div class="row">
              <div class="col-md-20">
                <div class="page-info page-info-simple">
                  <h1 class="page-title" style="font-weight: 500; color: #ffffff">Firmware Release</h1>
                  <h2 class="page-description" style="color: #ffffff">In this tutorial we’ll create a trendy double exposure effect in Adobe Photoshop with the help of Blending Modes and Clipping Masks in a few steps.</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="layout with-right-sidebar js-layout">
          <div class="row">
            <div class="col-md-9">
              <div class="main-content">
                <div class="category-info helper pt0">
                  <br>
                  <h3>Falconmesa
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-xs-12">
              <div class="box-body">
                <table id="product1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th><strong>Status</strong></th>
                      <th><strong>Release</strong></th>
                      <th><strong>Build</strong></th>
                      <th><strong>Family</strong></th>
                      <th><strong>Tag</strong></th>
                    </tr>
                  </thead>
                <tbody>
                  <?php
                    foreach($resultArr as $array)
                    {
                      if ($array['family_id'] == 1)
                        $family = 'Product 1';
                      else if ($array['family_id']  == 2)
                        $family = 'Product 2';
                      else
                        $family = 'Unknown family';

                      if ($array['status'] == 1)
                        $status = 'Released';
                      else if ($array['status']  == 2)
                        $status = 'Active';
                      else if ($array['status']  == 3)
                        $status = 'Future';
                      else
                        $status = '';
                      echo '<tr>
                              <td>'. $status.'</td>
                              <td>'. $array['release'] . '/'. $array['build'] . '</td>
                              <td>'. $array['build'].'</td>
                              <td>'. $family.'</td>
                              <td>'. $array['tag'].'</td>
                            </tr>';
                    };
                  ?>
                </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
      </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    $(function () {
      $('#product1').DataTable()
      $('#product2').DataTable()
    })
  </script>
</body>
</html>