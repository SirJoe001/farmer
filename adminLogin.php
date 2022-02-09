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
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
        <?php
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = array();

            if (empty($email)) {
                $error['msg'] = "Enter your Email";
            } else if (empty($password)) {
                $error['msg'] = "Enter Your Password";
            }

            if (count($error) == 0) {
                $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);

                if ($row['email'] == $email && $row['password'] == $password) {
                    $row['email'] = $_SESSION['email'];
                    $_SESSION['check'] = 1;
                    header("Location: admin/index.php");
                }
            }
        }
        if (isset($error['msg'])) {
            $m = $error['msg'];
            $show = "<h4 class='alert alert-danger'>$m</h4>";
        } else {
            $show = "";
        }
        ?>
        <form method="POST" action="">
        <div class="form-group">
            <div class="form-label-group">
             <?php echo $show;  ?>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input type="submit" value="Login" name="login" class="btn btn-primary btn-block">
          <a href="index.php">Return? Home</a>
        </form>
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
