<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>add_matakuliah</title>
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

        <title>add_matakuliah</title>
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
                    class="nav-link"
                    aria-current="page"
                    href="../index.php"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="../matakuliah/matakuliah.php">Mata Kuliah</a>
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
              <h2>Tambah Mahasiswa</h2>
            </div>
            <div class="data">
              <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                  <div class="text-end">
                    <a href="matakuliah.php" class="btn btn-warning">
                      Kembali
                    </a>
                  </div>
                  <form class="form-container" action="proses.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                      <label for="kodemk" class="form-label">Kode Mata Kuliah</label>
                      <input
                        type="text"
                        class="form-control"
                        id="kodemk"
                        name="kodemk"
                        placeholder="Masukkan Kode MK"
                      />
                    </div>
                    <div class="mb-2">
                      <label for="name" class="form-label">Nama</label>
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="nama"
                        placeholder="Masukkan Nama"
                      />
                    </div>
                    <div class="mb-2">
                      <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                      <input
                        type="text"
                        class="form-control"
                        id="jumlah_sks"
                        name="jumlah_sks"
                        placeholder="Masukkan Jumlah SKS"
                      />
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-success btn-block" name="submit">
                        Tambah
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
