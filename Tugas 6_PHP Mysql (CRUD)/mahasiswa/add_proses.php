<?php
include "../database/connection.php";
if(isset($_POST['submit'])){
    
    $npm = $_POST['npm'];
    $nama = $_POST['nama']; 
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

   $query = mysqli_query($conn, "insert into mahasiswa set npm = '$npm', nama = '$nama', jurusan = '$jurusan', alamat = '$alamat'");

   if ($query) {
    $message = "Data berhasil ditambahkan!";
    $message = urlencode($message);
    header("Location:mahasiswa.php?message={$message}");
    } else {
        $message = "Data gagal ditambahkan!";
        $message = urlencode($message);
        header("Location:mahasiswa.php?message={$message}");
    }
}

?>