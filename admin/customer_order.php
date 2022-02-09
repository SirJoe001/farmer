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

  <title>Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

 <?php 
 include("nav.php");
 ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    include("sidenav.php");
    ?>

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
        <div class="card mb-3 bg-success text-white">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Farmers Detail</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Product Price</th>
                    <th>Customer Address</th>
                    <th>Customer Contact</th>
                    <th>Customer E-Mail</th>
                    <th>Product Quantity</th>
                    <th>Product Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Customer Name</th>
                    <th>Product Price</th>
                    <th>Customer Address</th>
                    <th>Customer Contact</th>
                    <th>Customer E-Mail</th>
                    <th>Product Quantity</th>
                    <th>Product Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                  //$user = $_SESSION['email'];
                  $sql = "SELECT * FROM purchase";
                  $query = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                  <tr>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><del>N</del><?php echo $row['price']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><img src="../images/<?php echo $row['image']; ?>" height="100" width="100" alt=""></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td style="display:flex;">
                        <a href="reject.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger mt-4">Reject</button></a>
                        <a href="confirm.php?id=<?php echo $row['id'] ?>"><button class="btn btn-info mt-4">Confirm</button></a>
                    </td>
                  </tr>
                  <?php  }?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <!-- Area Chart Example-->
        
        <!-- DataTables Example -->
        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php
      include("footer.php");
      ?>

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
