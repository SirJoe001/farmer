<?php 
session_start();
include("../conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Farmer - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

 <?php include("nav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
   <?php include("sidenav.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
    <div class="container jumbotron">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Farmer Update Products Price</div>
      <div class="card-body bg-success">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if (isset($_POST['upload'])) {
                $price = $_POST['new_price'];
    
                $error = array();
    
                if (empty($price)) {
                    $error['msg'] = "Enter price";
                } 
                if (count($error) == 0) {
                    $sql = "UPDATE product SET product_price='$price' WHERE id='$id'";
                    $query = mysqli_query($conn, $sql);
                    $succ = array();
                    if ($query) {
                        $succ['say'] = "Price Adjusted";
                    } else {
                        $succ['say'] = "Price Not Adjusted";
                    }
                }
        }
    }
        if (isset($error['msg'])) {
            $m = $error['msg'];
            $show ="<h5 class='alert alert-danger'>$m</h5>";
        } else {
            $show = "";
        }
        if (isset($succ['say'])) {
            $ms = $succ['say'];
            $sh ="<h5 class='alert alert-info'>$ms</h5>";
        } else {
            $sh = "";
        }
        ?>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <div class="form-label-group">
                 <?php 
                    echo $show;
                    echo $sh;
                 ?>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="number" name="new_price" id="firstName" class="form-control" placeholder="new product price" required="required" autofocus="autofocus">
                  <label for="firstName">Product Price</label>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" value="Update Price" name="upload" class="btn btn-primary mt-3 btn-block">
        </form>
        <br>
      </div>
    </div>
  </div>

        <!-- Area Chart Example-->


        <!-- DataTables Example -->
        
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
