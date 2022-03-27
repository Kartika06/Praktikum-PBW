<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Maskapai Penerbangan</title>
  </head>
  <body>

    
    <div class="pendaftaran">
        <div class="container">
            <div class="text-center mb-5">
                <h1>Maskapai Penerbangan</h1>
            </div>
            <div class="row align-content-center">
                <div class="col-lg-4 col-md-12 m-auto">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputMaskapai" class="form-label">Maskapai</label>
                            <input type="text" class="form-control" required id="exampleInputMaskapai" name="maskapai">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputBandaraAwal" class="form-label">Bandara Awal</label>
                            <select class="form-select" name="awal" id="exampleInputBandaraAwal" aria-label="Default select example">
                            <option disabled selected>Pilih Bandara</option>
                            <option value="Soekarno Hatta">Bandara Soekarno Hatta</option>
                            <option value="Husein Sastranegara">Bandara Husein Sastranegara</option>
                            <option value="Abdul Rahman Saleh">Bandara Abdul Rahman Saleh</option>
                            <option value="Juanda">Bandara Juanda</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputBandaraTujuan" class="form-label">Bandara Tujuan</label>
                            <select class="form-select" name="tujuan" id="exampleInputBandaraTujuan" aria-label="Default select example">
                            <option disabled selected>Pilih Bandara</option>
                            <option value="Ngurai Rai">Bandara Ngurai Rai</option>
                            <option value="Hasanuddin">Bandara Hasanuddin</option>
                            <option value="Inanwatan">Bandara Inanwatan</option>
                            <option value="Sultan Iskandar Muda">Bandara Sultan Iskandar Muda</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTiket" class="form-label">Harga Tiket</label>
                            <input type="text" class="form-control" id="exampleInputTiket" name="harga" required>
                        </div>
                        <button class="btn btn-warning d-flex m-auto" name="submit">Simpan</button>
                    </form>
                </div>

    <?php
     $file = "data/data.json";
     $data = array();
     $file_json = file_get_contents($file);
     $data = json_decode($file_json, true);


        if(isset($_POST['submit'])){
 
            if(!empty($_POST['awal'])) {
                $awal = $_POST['awal'];
                if ($awal == "Soekarno Hatta") {
                    $pajak_awal = 50000;
                } else if ($awal == "Husein Sastranegara"){
                    $pajak_awal = 30000;
                } else if ($awal == "Abdul Rahman Saleh"){
                    $pajak_awal = 40000;
                } else{
                    $pajak_awal = 40000;
                }
            } else {
                echo 'Please select the value.';
            }

            if(!empty($_POST['tujuan'])) {
                $tujuan = $_POST['tujuan'];
                if ($tujuan == "Ngurai Rai") {
                    $pajak_tujuan = 80000;
                } else if ($tujuan == "Hasanuddin"){
                    $pajak_tujuan = 70000;
                } else if ($tujuan == "Inanwatan"){
                    $pajak_tujuan = 90000;
                } else{
                    $pajak_tujuan = 70000;
                }
            } else {
                echo 'Please select the value.';
            }

            $pajak = $pajak_awal + $pajak_tujuan;
            $total = $_POST['harga'] + $pajak;

            $input = array(
                "maskapai" => $_POST['maskapai'],
                "asal_penerbangan" => $awal,
                "tujuan_penerbangan" => $tujuan,
                "harga_tiket" => $_POST['harga'],
                "pajak" => $pajak,
                "total_harga" => $total
            );

            array_push($data,$input);

            $data_json = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($file, $data_json);
        }
    ?>
                <div class="col-lg-12 col-md-12  pt-5">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Maskapai</th>
                                <th scope="col">Asal Penerbangan</th>
                                <th scope="col">Tujuan Penerbangan</th>
                                <th scope="col">Harga Tiket</th>
                                <th scope="col">Pajak</th>
                                <th scope="col">Total Harga Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $datas => $value) : ?>
                            <tr>
                                <td><?= $data[$datas]['maskapai']; ?></td>
                                <td><?= $data[$datas]['asal_penerbangan']; ?></td>
                                <td><?= $data[$datas]['tujuan_penerbangan']; ?></td>
                                <td><?= $data[$datas]['harga_tiket']; ?></td>
                                <td><?= $data[$datas]['pajak']; ?></td>
                                <td><?= $data[$datas]['total_harga']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>