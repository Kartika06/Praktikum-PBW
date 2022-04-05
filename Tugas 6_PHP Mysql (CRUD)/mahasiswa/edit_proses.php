<?php
include "../database/connection.php";
if(isset($_POST['edit'])){
    $npm = $_POST['npm'];
    $nama = $_POST['nama']; 
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

   $query = mysqli_query($conn, "update mahasiswa set npm = '$npm', nama = '$nama', jurusan = '$jurusan', alamat = '$alamat' where npm=$npm");
 
   if ($query) {
    $message = "Data berhasil diubah!";
    $message = urlencode($message);
    header("Location:mahasiswa.php?message={$message}");
    } else {
        $message = "Data gagal diubah!";
        $message = urlencode($message);
        header("Location:mahasiswa.php?message={$message}");
    }
}
