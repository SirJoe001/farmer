<?php
include("../conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE purchase SET status='Approved' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    header("Location: customer_order.php");
}
?>