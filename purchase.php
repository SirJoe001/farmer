<?php 
session_start();
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Purchase</title>

  <!-- Custom fonts for this template-->
  <link href="farmer/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="farmer/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="farmer/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">



    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Home Page</a>
          </li>
          <li class="breadcrumb-item active"></li>
        </ol>

        <!-- Icon Cards-->
    <div class="container jumbotron">
    <?php  
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sel = "SELECT * FROM product WHERE id='$id'";
      $fr = mysqli_query($conn, $sel);
     
      while ($ch = mysqli_fetch_array($fr)) {
    
    ?>
    <div class="bg-secondary" style="width:300px; margin:auto; display:flex;">
        <img src="images/<?php echo $ch['product_image'] ?>" height='150' width='150' alt=''>
        <h4 class="mt-5 ml-2 text-white"><small>Price: </small><del>N</del><?php echo $ch['product_price']; ?></h4>
    </div>
    <?php }} ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Fill Form To Complete Purchase</div>
      <div class="card-body bg-success">
          <?php
           if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sel = "SELECT * FROM product WHERE id='$id'";
            $fr = mysqli_query($conn, $sel);
            $ch = mysqli_fetch_array($fr);
            $image = $ch['product_image'];
            $price = $ch['product_price'];
           
            if (isset($_POST['purchase'])) {
              
              $fname = $_POST['fname'];
              $phone = $_POST['phone'];
              $qty = $_POST['qty'];
              $address = $_POST['address'];
              $email = $_POST['email'];
              
              $error = array();
              if (empty($fname)) {
                $error['msg'] = "Enter Full Name";
              } else if (empty($phone)) {
                $error['msg'] = "Enter Phone Number";
              } else if (empty($qty)) {
                $error['msg'] = "Enter Quantity";
              } else if (empty($address)) {
                $error['msg'] = "Write you home Address";
              } else if (empty($email)) {
                $error['msg'] = "Enter Email";
              }

              if (count($error) == 0) {
                $sqle = "INSERT INTO purchase (customer_name, email, address, quantity, price,image, phone) 
                VALUES ('$fname','$email', '$address', '$qty', '$price','$image', '$phone')";
                $qy = mysqli_query($conn, $sqle);
                $suc = array();
                if ($qy) {
                  $suc['say'] = "Order Placed Successfully";
                } else {
                  echo "<script>alert('Order not Placed')</script>";
                }
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
                $print = "<h5 class='alert alert-success'>$display</h5>";
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
                  <input type="text" name="fname" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">Full Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" name="phone" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">Phone Number</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="email" name="email" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">E-Mail</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="lastName" name="qty" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">produc Quantity</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <textarea style="width:100%;" placeholder="Address..." class="form-control" name="address" id="" cols="30" rows="10"></textarea>
                </div>
              </div>
          <input type="submit" value="Confirm Purchase" name="purchase" class="btn btn-danger mt-3 btn-block">
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
