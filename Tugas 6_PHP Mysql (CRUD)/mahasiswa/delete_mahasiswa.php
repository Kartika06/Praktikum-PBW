<?php
include "../database/connection.php";

if(isset($_GET['npm'])){
    $npm = $_GET['npm'];
    $query = mysqli_query($conn, "delete from mahasiswa where npm=$npm");
    if ($query) {
        $message = "Data berhasil dihapus!";
        $message = urlencode($message);
        header("Location:mahasiswa.php?message={$message}");
        } else {
            $message = "Data gagal dihapus!";
            $message = urlencode($message);
            header("Location:mahasiswa.php?message={$message}");
    }
}