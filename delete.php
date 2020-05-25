<?php
    require_once("db.php");
    $id = $_GET['id'];
    $query = "DELETE FROM keu_5klsupplier WHERE id = '$id'";
    $queryact = mysqli_query($koneksi, $query);
    header("Location: keu_5klsupplier.php");
?>