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

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-secondary">
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register as Farmer</div>
      <div class="card-body">
          <?php
            if (isset($_POST['register'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $error = array();
                 
                if (empty($firstname)) {
                    $error['msg'] = "Enter First Name";
                } else if (empty($lastname)) {
                    $error['msg'] = "Enter Last Name";
                }  else if (empty($email)) {
                    $error['msg'] = "Enter E-mail";
                } 
                $suc = array();
                if (count($error) == 0) {
                    $sql = "INSERT INTO farmerData(first_name, last_name, email) VALUES ('$firstname','$lastname', '$email')";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        $sqll = "INSERT INTO farmer(email, password) VALUES('$email','$password')";
                        $qqd = mysqli_query($conn,$sqll);
                        header("Location: farmerLogin.php");
                    } else {
                        $suc['say'] = "Registration not Successful";
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
        <form method="POST" action="">
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
                  <input type="text" name="firstname" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lastname" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" value="Register" name="register" class="btn btn-primary btn-block">
        </form>
        <br>
        Already have account? <a href="farmerLogin.php">Login</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
