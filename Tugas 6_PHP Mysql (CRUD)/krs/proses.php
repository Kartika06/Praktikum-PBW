<?php
include "../database/connection.php";
if(isset($_POST['submit'])){
    
    $npm = $_POST['npm']; 
    $kodemk = $_POST['kodemk'];

   $query = mysqli_query($conn, "insert into krs set npm = '$npm', kodemk = '$kodemk'");

   if ($query) {
    $message = "Data berhasil ditambahkan!";
    $message = urlencode($message);
    header("Location:krs.php?message={$message}");
    } else {
        $message = "Data gagal ditambahkan!";
        $message = urlencode($message);
        header("Location:krs.php?message={$message}");
    }
} else if(isset($_POST['edit'])){

    $id = $_POST['id'];
    $npm = $_POST['npm']; 
    $kodemk = $_POST['kodemk'];

    $query = mysqli_query($conn, "update krs set id = '$id', npm = '$npm', kodemk = '$kodemk' where id=$id");
    if ($query) {
        $message = "Data berhasil diubah!";
        $message = urlencode($message);
        header("Location:krs.php?message={$message}");
        } else {
            $message = "Data gagal diubah!";
            $message = urlencode($message);
            header("Location:krs.php?message={$message}");
        }
}else if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "delete from krs where id=$id");
    if ($query) {
        $message = "Data berhasil dihapus!";
        $message = urlencode($message);
        header("Location:krs.php?message={$message}");
        } else {
            $message = "Data gagal dihapus!";
            $message = urlencode($message);
            header("Location:krs.php?message={$message}");
    }
}