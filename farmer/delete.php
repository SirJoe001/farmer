<?php 
include("../conn.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    header("Location:view.php");
}
?>