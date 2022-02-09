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
      <div class="card-header">Farmers Upload Products</div>
      <div class="card-body bg-success">
          <?php
          $user = $_SESSION['email'];
          $sql = "SELECT * FROM farmer WHERE email='$user'";
          $query = mysqli_query($conn, $sql);
          $email = mysqli_fetch_assoc($query);
          // die(var_dump($_SESSION['email']));
            if (isset($_POST['upload'])) {
              
              $prod_name = $_POST['prod_name'];
              $prod_price = $_POST['prod_price'];
              $category = $_POST['category'];
              $description = $_POST['description'];
              $farmer = $email['email'];
              $img = $_FILES['img']['name'];
              $tmp = $_FILES['img']['tmp_name'];
              $final = $img;
              $path = "../images/".$final;

              move_uploaded_file($tmp, $path);

              $error = array();
              if (empty($prod_name)) {
                $error['msg'] = "Enter Product Name";
              } else if (empty($prod_price)) {
                $error['msg'] = "Enter Price of Product";
              } else if (empty($category)) {
                $error['msg'] = "Select product category";
              } else if (empty($description)) {
                $error['msg'] = "Write Description of your product";
              }

              if (count($error) == 0) {
                $sql = "INSERT INTO product (product_name, product_price, product_description, product_category, product_owner, product_image) 
                VALUES ('$prod_name','$prod_price', '$description', '$category', '$farmer','$img')";
                $query = mysqli_query($conn, $sql);
                $suc = array();
                if ($query) {
                  $suc['say'] = "Product Uploaded Successful";
                } else {
                  echo "<script>alert('Product not uploaded')</script>";
                }
              }
           
          }
          
            if (isset($error['msg'])) {
                $err = $error['msg'];
                $show = "<h5 class='alert alert-danger'>$err</h5>";
            } else {
                $show = "";
            }

            if (isset($suc['say'])) {
                $display = $suc['say'];
                $print = "<h5 class='alert alert-danger'>$display</h5>";
            } else {
                $print = "";
            }
          ?>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <div class="form-label-group">
                  <?php
                    echo $show;
                    echo $print;
                  ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="prod_name" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">Product Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="lastName" name="prod_price" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">produc Price</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <select name="category" class="form-control" id="">
                <option value="cereal">Cereal</option>
                <option value="Vegetable">Vegetable</option>
                <option value="Tubber">Tubber</option>
                <option value="Fruit">Fruit</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="file" name="img" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <textarea style="width:100%;" placeholder="product description..." class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                </div>
              </div>
          <input type="submit" value="Upload" name="upload" class="btn btn-primary mt-3 btn-block">
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
