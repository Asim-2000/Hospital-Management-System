<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  
  <?php include( $_SERVER['DOCUMENT_ROOT']."/assets/functions/func.php"); ?>

  <link rel="icon" type="image/png" href="../../assets/img/favicon1.png">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MedPlus+
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  
  <!-- CSS Files -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet">

</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="./dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../../assets/img/phar_avatar.png">
          </div>
        </a>
        <a href="./dashboard.php" class="simple-text logo-normal">
          Pharmacist
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./view_bill.php">
              <i class="nc-icon nc-money-coins"></i>
              <p>Patient Billing</p>
            </a>
          </li>
          <li class="active">
            <a href="./add_medicine.php">
              <i class="nc-icon nc-ambulance"></i>
              <p>Add Medicine</p>
            </a>
          </li>
          <li>
            <a href="./add_company.php">
              <i class="nc-icon nc-delivery-fast"></i>
              <p>Add Supplier</p>
            </a>
          </li>
          <li>
            <a href="./add_inventory.php">
              <i class="nc-icon nc-cart-simple"></i>
              <p>New Shipment</p>
            </a>
          </li>
          <li>
            <a href="./view_shipments.php">
              <i class="nc-icon nc-box-2"></i>
              <p>view Shipments</p>
            </a>
          </li>
          <li>
            <a href="./view_inventory.php">
              <i class="nc-icon nc-paper"></i>
              <p>View Inventory</p>
            </a>
          </li>
          <li>
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
         </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="./dashboard.php">MedPlus+</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="../../index.php">
                  <i class="nc-icon nc-button-power"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Logout</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header">

      </div> -->
      <div class="content">
        <div class="row">
          <div class=" col-md-2"></div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Register Medicine</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="card-body ">
                    <form class="form-group" action="../../assets/functions/func.php" method="post">
                      <label>Medicine Name :</label>
                      <input type="text" name="name" class="form-control"><br>
                      <label>Medicine Type :</label>
                      <input type="text" name="type" class="form-control"><br>
                      <label>Cost :</label>
                      <input type="number" name="cost" class="form-control"><br>
                      <label>Selling Price :</label>
                      <input type="number" name="sale" class="form-control"><br><br>
                      <label>Supplier:</label>
                      <select type="text" name="supplier" class="form-control">
                        <?php display_comps()?>
                      </select><br>
                      <input type="submit" class="btn btn-primary btn-round" name="med_register" value="Register">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

     
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/jquery.min.js"></script>
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>

</body>

</html>
