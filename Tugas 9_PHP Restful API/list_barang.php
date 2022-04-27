<?php
include_once "connection.php";
// exit(var_dump($_POST));
if (isset($_GET)) {
	$table = $_GET['table'];
    $query = mysqli_query($conn, "SELECT * FROM $table");
    while($data = mysqli_fetch_array($query)){
        $item[] = array(
            'kode' 	=> $data['kode'],
            'nama' 	=> $data['nama'],
            'qty' 	=> $data['qty']
        );
    }

    $response = array(
        'status' => 'OK',
        'data' => $item
    );

    echo json_encode($response);
}
?>
