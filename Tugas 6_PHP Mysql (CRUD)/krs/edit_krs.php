<?php
    include "../database/connection.php";
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT id, krs.npm, krs.kodemk, mahasiswa.nama as nama_mahasiswa, matakuliah.nama as nama_matakuliah FROM krs INNER JOIN mahasiswa ON krs.npm = mahasiswa.npm INNER JOIN matakuliah ON krs.kodemk = matakuliah.kodemk and id=$id");
    $data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>edit_krs</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Style CSS -->
        <link rel="stylesheet" href="../assets/style.css" />

        <!-- Bootstrap CSS -->
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous"
        />

        <title>edit_krs</title>
      </head>
      <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="../index.php"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../mahasiswa/mahasiswa.php">Mahasiswa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../matakuliah/matakuliah.php">Mata Kuliah</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- EndNavbar -->

        <!-- Content -->
        <section class="content">
          <div class="container">
            <div class="text-center">
              <h2>Edit KRS</h2>
            </div>
            <div class="data">
              <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                  <div class="text-end">
                    <a href="krs.php" class="btn btn-warning">
                      Kembali
                    </a>
                  </div>
                  <form class="form-container" action="proses.php" method="POST">
                  <div class="mb-2">
                      <input
                        type="text"
                        class="form-control"
                        hidden
                        id="id"
                        name="id"
                        placeholder="Masukkan id"
                        value="<?= $data['id'] ?>"
                      />
                    </div>
                    <div class="mb-2">
                      <label for="npm" class="form-label">Mahasiswa</label>
                      <select class="form-select" name="npm"  id="npm" aria-label="Default select example">
                      <option value="<?= $data['npm']?>"><?= $data['nama_mahasiswa']?></option>
                      <?php 
                      $query = mysqli_query($conn, "select * from mahasiswa");
                      
                      foreach ($query as $datas) : ?>
                        <option <?php if( $datas['nama']== $data['nama_mahasiswa']){echo "hidden"; } ?> value="<?= $datas['npm']?>"><?= $datas['nama']?></option>
                        <?php endforeach; ?>
                      </select> 
                    </div>
                    <div class="mb-2">
                      <label for="kodemk" class="form-label">Mata Kuliah</label>
                      <select class="form-select" name="kodemk"  id="kodemk" aria-label="Default select example">
                      <option value="<?= $data['kodemk']?>"><?= $data['nama_matakuliah']?></option>
                      <?php 
                      $query1 = mysqli_query($conn, "select * from matakuliah");
                      
                      foreach ($query1 as $datas) : ?>
                        <option <?php if( $datas['nama']== $data['nama_matakuliah']){echo "hidden"; } ?> value="<?= $datas['kodemk']?>"><?= $datas['nama']?></option>
                        <?php endforeach; ?>
                      </select> 
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-success btn-block" name="edit">
                        Edit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- EndContent -->
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"
        ></script>
      </body>
    </html>
  </body>
</html>
