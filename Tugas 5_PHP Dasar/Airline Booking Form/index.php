<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Airline Booking Form</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <!--container-->

      <form class="form-group" action="" method="POST">
        <!--form-->
        <h1 class="text-center text-white">Airline Booking Form</h1>
        <div id="form">
          <h3 class="text-white">Booking Details</h3>
          <div id="input4">
            <input type="text" id="input-group1" placeholder="Airline Name" name="airline"/>
          </div>
          <!--akhir form-->

          <div id="input">
            <!--input-->
            <select id="input-group" style="background: black" name="origin">
              <option disabled selected>Select Origin of Departure</option>
              <option value="Soekarno Hatta">Soekarno Hatta</option>
              <option value="Husain Sastranegara">Husain Sastranegara</option>
              <option value="Abdul Rachman Saleh">Abdul Rachman Saleh</option>
              <option value="Juanda">Juanda</option>
            </select>
            <select id="input-group" style="background: black" name="destination">
              <option disabled selected>Select Arrival Destination</option>
              <option value="Ngurai Rai">ngurah Rai</option>
              <option value="Hasanuddin">Hasanuddin</option>
              <option value="Inanwatan">Inanwatan</option>
              <option value="Sultan Iskandar Muda">Sultan Iskandar Muda</option>
            </select>
          </div>
          <!--input-->

          <div id="input4">
            <!--input4-->
            <input type="text" id="input-group1" placeholder="Route Fare (Rp)" name="price" />
          </div>
          <!--input4-->

          <div id="input5">
            <!--input5-->
            <h3 class="text-white">Personal Details</h3>
          </div>
          <!--input5-->

          <div id="input6">
            <!--input6-->
            <input type="text" id="input-group" placeholder="Full Name" name="nama" />
            <input type="text" id="input-group" placeholder="Phone Number" name="phone" />
            <input type="text" id="input-group1" placeholder="Email" name="email" />
          </div>
          <!--input6-->
          <button type="submit" class="btn btn-primary">Submit Form</button>
        </div>
        <!--form-->
      </form>
      <!--form-->
    </div>
    <!--container-->
 
    <?php
$file      = "data/data.json";
$data      = array();
$file_json = file_get_contents($file);
$data      = json_decode($file_json, true);

if (isset($_POST['submit'])) {
    if (!empty($_POST['origin'])) {
        $awal = $_POST['origin'];
        if ($awal == "Soekarno Hatta") {
            $pajak_awal = 50000;
        } else if ($awal == "Husein Sastranegara") {
            $pajak_awal = 30000;
        } else if ($awal == "Abdul Rahman Saleh") {
            $pajak_awal = 40000;
        } else {
            $pajak_awal = 40000;
        }
    } else {
        echo 'Please select the value.';
    }
    
    if (!empty($_POST['destination'])) {
        $tujuan = $_POST['destination'];
        if ($tujuan == "Ngurai Rai") {
            $pajak_tujuan = 80000;
        } else if ($tujuan == "Hasanuddin") {
            $pajak_tujuan = 70000;
        } else if ($tujuan == "Inanwatan") {
            $pajak_tujuan = 90000;
        } else {
            $pajak_tujuan = 70000;
        }
    } else {
        echo 'Please select the value.';
    }
    
    $pajak = $pajak_awal + $pajak_tujuan;
    $total = $_POST['price'] + $pajak;
    
    $input = array(
        "name" => $_POST['name'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email'],
        "airline" => $_POST['airline'],
        "origin" => $_POST['origin'],
        "destination" => $_POST['destination'],
        "price" => $_POST['price'],
        "tax" => $pajak,
        "total" => $total
    );
    
    array_push($data, $input);
    
    $data_json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($file, $data_json);
}
?>

     <!-- tabel penerbangan -->
    <section>
      <div id="penerbangan">
        <div class="container">
            <div class="row justify-content-center mt-8">
                
                <div class="col-md-12">
                    <h2 class="text-center text-white mb-3">Jadwal Penerbangan</h2>
                    <table class="table text-white">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Airline</th>
                        <th scope="col">Origin</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Price</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $datas => $value): ?>
                           <tr>
                                <td><?= $data[$datas]['name']; ?></td>
                                <td><?= $data[$datas]['phone']; ?></td>
                                <td><?= $data[$datas]['email']; ?></td>
                                <td><?= $data[$datas]['airline']; ?></td>
                                <td><?= $data[$datas]['origin']; ?></td>
                                <td><?= $data[$datas]['destination']; ?></td>
                                <td><?= $data[$datas]['price']; ?></td>
                                <td><?= $data[$datas]['tax']; ?></td>
                                <td><?= $data[$datas]['total']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                   </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>