<?php
include_once "connection.php";
// exit(var_dump($_POST));
if (isset($_GET)) {
	$kode 	= $_POST['kode'];
	$nama 	= $_POST['nama'];
	$qty	= $_POST['qty'];
	$sql 	= "INSERT INTO barang VALUES ('$kode','$nama','$qty')";
	$query = mysqli_query($conn, $sql);

	if ($query) {
	    $respone = array(
	    'status' => "OK",
	    'message' => "Data berhasil ditambahkan!"
	    );
    } else {
	    $respone = array(
	    'status' => "OK",
	    'message' => "Data gagal ditambahkan!"
	    );
    }

	echo json_encode($respone,JSON_PRETTY_PRINT);
	    
}
?>
