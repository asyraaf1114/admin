<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?php
    $conn_string = "host=localhost port=5432 dbname=test user=postgres password=AZlan1114";
    $dbconn4 = pg_connect($conn_string) or die ("Unable to connect to postgre");
    $raw_data = pg_query($dbconn4 , "SELECT * FROM public.fw_info ORDER BY release DESC, build DESC, family_id DESC");
    $resultArr = pg_fetch_all($raw_data);
  ?>
</head>
<body class="hold-transition">
  <div>
    <section class="content">
      <!-- Header -->
      <div class="header header-over large" style="background-image: url('img/backgrounds/2.jpg')">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
              <!-- Logo Image -->
              <a href="index.html" class="logo-image logo-animated">
                <img src="img/logos/logo.png" alt="logo">
              </a>
              <!-- End of Logo Image -->
            </div>
          </div>
        </div>
      </div>
      <!-- End of Header -->
      <!-- Header Back -->
      <div class="header-back header-back-simple header-back-small" style="background-image: url('img/backgrounds/2.jpg')">
        <div class="header-back-container">
          <div class="container">
            <div class="row">
              <div class="col-md-30">
                <!-- Page Info -->
                <div class="page-info page-info-simple">
                  <h1 class="page-title">Firmware Release</h1>
                  <h2 class="page-description">In this tutorial we’ll create a trendy double exposure effect in Adobe Photoshop with the help of Blending Modes and Clipping Masks in a few steps.</h2>
                </div>
                <!-- End Page Info -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Header Back -->

    <div class="container">
        <div class="layout with-right-sidebar js-layout">
          <div class="row">
            <div class="col-md-9">
              <div class="main-content">
                <!-- Category Info -->
                <div class="category-info helper pt0">
                  <h3 class="category-title"> Product1
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
                      <th>Status</th>
                      <th>Release</th>
                      <th>Build</th>
                      <th>Family</th>
                      <th>Tag</th>
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
                <!-- <tfoot>
                  <tr>
                    <th>Release</th>
                    <th>Build</th>
                    <th>Family</th>
                    <th>Tag</th>
                    <th>Status</th>
                  </tr>
                </tfoot> -->
                </table>
              </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="layout with-right-sidebar js-layout">
          <div class="row">
            <div class="col-md-9">
              <div class="main-content">
                <!-- Category Info -->
                <div class="category-info helper pt0">
                  <h3 class="category-title"> Product 2
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
                <table id="product2" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Release</th>
                      <th>Build</th>
                      <th>Family</th>
                      <th>Tag</th>
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
                <!-- <tfoot>
                  <tr>
                    <th>Release</th>
                    <th>Build</th>
                    <th>Family</th>
                    <th>Tag</th>
                    <th>Status</th>
                  </tr>
                </tfoot> -->
                </table>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#product1').DataTable()
      $('#product2').DataTable()
    })
  </script>
</body>
</html>