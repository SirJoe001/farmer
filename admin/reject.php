<?php
include("../conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM purchase WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    header("Location: products.php");
}
?>