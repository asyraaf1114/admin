<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- CSS Basic CDN -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_lib.css">
  <link rel="stylesheet" href="css/style.min.css">

  <!-- Database PostgreSQL -->
  <?php
  $conn_string = "host=localhost port=5432 dbname=test user=postgres password=AZlan1114";
  $dbconn4 = pg_connect($conn_string) or die("Unable to connect to postgre");
  $raw_data = pg_query($dbconn4, "SELECT * FROM public.fw_info ORDER BY release DESC, build DESC, family_id DESC");
  $resultArr = pg_fetch_all($raw_data);
  ?>
</head>

<body>
  <!-- Header start -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navheader">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">altera</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a href="#home" class="nav-link mx-lg-2 active">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="#sector" class="nav-link mx-lg-2">Sector Map</a>
              </li>
              <li class="nav-item">
                <a href="#github" class="nav-link mx-lg-2">Github</a>
              </li>
              <li class="nav-item">
                <a href="#contact" class="nav-link mx-lg-2">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
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
  </header>
  <!-- Header end -->

  <section id="home" class="content-secondary">
    <div class="container" style="padding-top: 80px; font-family: 'Poppins', sans-serif; font-weight: 700;">
      <!-- Breadcomb area Start-->
      <div class="breadcomb-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="breadcomb-list">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcomb-wp">
                      <div class="breadcomb-icon">
                        <i class="notika-icon notika-windows">FR</i>
                      </div>
                      <div class="breadcomb-ctn">
                        <h2>Release</h2>
                        <p>Latest Update : 2024</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                    <div class="breadcomb-report">
                      <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn">24.3</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcomb area End-->

      <!-- Data Table area Start-->
      <div class="data-table-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="data-table-list">
                <div class="basic-tb-hd">
                  <h2>Product 1</h2>
                </div>
                <div class="table-responsive">
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th><strong>Status</strong></th>
                        <th><strong>Release</strong></th>
                        <th><strong>Family</strong></th>
                        <th><strong>Tag</strong></th>
                        <th><strong>Tag</strong></th>
                      </tr>
                    </thead>
                    <tfoot style="display: table-header-group;">
                      <tr>
                        <th><strong>Status</strong></th>
                        <th><strong>Release</strong></th>
                        <th><strong>Family</strong></th>
                        <th><strong>Tag</strong></th>
                        <th><strong>Tag</strong></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      foreach ($resultArr as $array) {
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
                              <td>' . $status . '</td>
                              <td>' . $array['release'] . '/' . $array['build'] . '</td>
                              <td>' . $family . '</td>
                              <td>' . $array['tag'] . '</td>
                              <td id="' . $array['tag'] . '"><button class="fa-solid fa-copy" onclick="copyToClipboard(this)"></button></td>
                            </tr>';
                      };
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sector" class="content-secondary">
    <div class="container">
      <div class="layout with-right-sidebar js-layout">
        <div class="row">
          <div class="col-md-9">
            <div class="main-content">
              <div class="category-info helper pt0">
                <br>
                <h3>Sector
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="github" class="content-secondary">
    <div class="container">
      <div class="layout with-right-sidebar js-layout">
        <div class="row">
          <div class="col-md-9">
            <div class="main-content">
              <div class="category-info helper pt0">
                <br>
                <h3>Github
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contact" class="content-secondary">
    <div class="container">
      <div class="layout with-right-sidebar js-layout">
        <div class="row">
          <div class="col-md-9">
            <div class="main-content">
              <div class="category-info helper pt0">
                <br>
                <h3>Contact
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Javascript/Jquery Basic CDN -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

  <!-- Custom JS -->
  <script src="js/script.js"></script>

  <script>
    $(function () {
      // $('#product1').DataTable({
      //   initComplete: function () {
      //     this.api().columns().every( function() {
      //       var that = this;
      //       $('input', this.footer()).on('keyup change clear', function () {
      //         that
      //           .search(this.value)
      //           .draw();
      //       });
      //     });
      //   }
      // })
      $('#product2').DataTable()
    })
  </script>
  <script>
new DataTable('#example', {
    columns: [{ width: '20%' }, { width: '20%' }, { width: '20%' }, { width: '20%' }, { width: '20%' }],
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                let column = this;
 
                // Create select element
                let select = document.createElement('select');
                select.style.cssText = 'width: 100%';
                select.add(new Option(''));
                column.footer().replaceChildren(select);
 
                // Apply listener for user change in value
                select.addEventListener('change', function () {
                    column
                        .search(select.value, {exact: true})
                        .draw();
                });
 
                // Add list of options
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.add(new Option(d));
                    });
            });
    }
});

$(document).on('click', '.abc', function(){  
    var id = $(this).data("id1");
            
    var copyText = document.getElementById(id);

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
     alert("Copy: " + copyText.value);

}); 

function copyToClipboard(elem) { 
            var content = elem.parentNode.id; 
            navigator.clipboard.writeText(content); 
            alert("Copied to clipboard: " + content); 
        } 

        const clipboard = FlowbiteInstances.getInstance('CopyClipboard', 'npm-install-copy-button');
const tooltip = FlowbiteInstances.getInstance('Tooltip', 'tooltip-copy-npm-install-copy-button');

const $defaultIcon = document.getElementById('default-icon');
const $successIcon = document.getElementById('success-icon');

const $defaultTooltipMessage = document.getElementById('default-tooltip-message');
const $successTooltipMessage = document.getElementById('success-tooltip-message');

clipboard.updateOnCopyCallback((clipboard) => {
    showSuccess();

    // reset to default state
    setTimeout(() => {
        resetToDefault();
    }, 2000);
})

const showSuccess = () => {
    $defaultIcon.classList.add('hidden');
    $successIcon.classList.remove('hidden');
    $defaultTooltipMessage.classList.add('hidden');
    $successTooltipMessage.classList.remove('hidden');    
    tooltip.show();
}

const resetToDefault = () => {
    $defaultIcon.classList.remove('hidden');
    $successIcon.classList.add('hidden');
    $defaultTooltipMessage.classList.remove('hidden');
    $successTooltipMessage.classList.add('hidden');
    tooltip.hide();
}

  </script>

</body>