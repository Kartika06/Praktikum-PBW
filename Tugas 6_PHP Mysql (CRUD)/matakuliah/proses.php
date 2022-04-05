<?php
include "../database/connection.php";
if(isset($_POST['submit'])){
    
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama']; 
    $jumlah_sks = $_POST['jumlah_sks'];

   $query = mysqli_query($conn, "insert into matakuliah set kodemk = '$kodemk', nama = '$nama', jumlah_sks = '$jumlah_sks'");

   if ($query) {
    $message = "Data berhasil ditambahkan!";
    $message = urlencode($message);
    header("Location:matakuliah.php?message={$message}");
    } else {
        $message = "Data gagal ditambahkan!";
        $message = urlencode($message);
        header("Location:matakuliah.php?message={$message}");
    }
}else if(isset($_POST['edit'])){
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama']; 
    $jumlah_sks = $_POST['jumlah_sks'];

   $query = mysqli_query($conn, "update matakuliah set kodemk = '$kodemk', nama = '$nama', jumlah_sks = '$jumlah_sks' where kodemk=$kodemk");

   if ($query) {
    $message = "Data berhasil diubah!";
    $message = urlencode($message);
    header("Location:matakuliah.php?message={$message}");
    } else {
        $message = "Data gagal diubah!";
        $message = urlencode($message);
        header("Location:matakuliah.php?message={$message}");
    }
}else if(isset($_GET['kodemk'])){
    $kodemk = $_GET['kodemk'];
    $query = mysqli_query($conn, "delete from matakuliah where kodemk=$kodemk");
    if ($query) {
        $message = "Data berhasil dihapus!";
        $message = urlencode($message);
        header("Location:matakuliah.php?message={$message}");
        } else {
            $message = "Data gagal dihapus!";
            $message = urlencode($message);
            header("Location:matakuliah.php?message={$message}");
    }
}

?>