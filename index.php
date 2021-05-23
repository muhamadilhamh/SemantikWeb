<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  <title>Teknik Informatika</title>
  <!-- Navbar -->
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="index.php">Mata <b>Kuliah</b></a>
      </button>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="about.html">About Teknik Informatika</a>
        </li>
      </ul>
    </nav>
  </div>
</head>

<body>
  <!--PHP-->
  <?php
  require_once("sparqllib.php");
  $test = "";
  if (isset($_POST['search-matakuliah'])) {
    $test = $_POST['search-matakuliah'];
    $data = sparql_get(
      " http://2112292ae223.ngrok.io/matakuliah",
      "
      PREFIX p: <http://matakuliahTI.com>
      PREFIX d: <http://matakuliahTI.com/ns/data#>
      
      SELECT ?id ?Matkul ?jenisMatkul ?deskripsi ?dosenPengajar ?jumlahSks ?semester
      WHERE
      { 
          ?id d:namaMatkul ?Matkul ;
              d:jenisMatkul ?jenisMatkul;
              d:deskripsi ?deskripsi;
              d:dosenPengajar ?dosenPengajar;
              d:jumlahSks ?jumlahSks;
              d:semester ?semester;
              FILTER regex(?Matkul,  '$test')
      
      }
            "
    );
  } else {
    $data = sparql_get(
      " http://2112292ae223.ngrok.io/matakuliah",
      "
      PREFIX p: <http://matakuliahTI.com>
      PREFIX d: <http://matakuliahTI.com/ns/data#>
      
      SELECT ?id ?Matkul ?jenisMatkul ?deskripsi ?dosenPengajar ?jumlahSks ?semester
      WHERE
      { 
          ?id d:namaMatkul ?Matkul ;
              d:jenisMatkul ?jenisMatkul;
              d:deskripsi ?deskripsi;
              d:dosenPengajar ?dosenPengajar;
              d:jumlahSks ?jumlahSks;
              d:semester ?semester;
      
      }
            "
    );
  }

  if (!isset($data)) {
    print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
  }

  // melihat data sementara
  //var_dump($data);
  // $search = $_POST['search-matakuliah'];
  //         var_dump($search);
  ?>

  <!-- Jumbotron-->
  <section class="jumbotron-bg">
    <div class="jumbotron  warna-bg">
      <div class=" row h-100  bg-heroes">
        <div class="col-sm-12 my-auto">
          <div class=" mx-auto">
            <p class="title">Ada mata kuliah apa saja sih di Teknik Informatika</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Form Search -->
  <div class="main">
    <div class="container">
      <div class="shadow mb-5 bg-white rounded layout">
        <div class="form-group has-search">
          <form action="" method="post" id="nameform">
            <div class="input-group">
              <span class="fa fa-search fa-1x form-control-feedback"></span>
              <input type="text" name="search-matakuliah" class="form-control form-control-lg " placeholder="Cari Mata Kuliah">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="submit"> Cari
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Opsi dua -->
  <div class="konten">
    <div class="container">
      <h3>Hasil Pencarian Mata Kuliah</h3>
      <p>Keyword : <span>
          <?php
          if ($test != NULL) {
            echo $test;
          } else {
            echo "Search Keyword";
          }
          ?></span></p>
      <hr>
      <div class="row">

        <?php foreach ($data as $dat) : ?>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <div class="header-data"> <b>Nama Mata Kuliah :</b></div>
                  <div class="item-data"><?= $dat['Matkul'] ?></div>
                  <hr>
                </div>

                <div>
                  <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#drop" aria-expanded="false" aria-controls="drop">
                      Tentang Mata Kuliah
                    </button>
                  </p>
                  <div class="collapse" id="drop">
                    <div class="card card-body">
                      <p class="card-text">
                        <?= $dat['deskripsi'] ?>
                        <br>
                        <!--<?= $dat['id'] ?>-->
                      </p>
                    </div>
                  </div>
                </div>
                <hr>

              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="header-data"> <b>Jenis Mata Kuliah :</b>
                    <div class="item-data"><?= $dat['jenisMatkul'] ?></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="header-data"> <b>Dosen Pengajar :</b></div>
                  <div class="item-data"><?= $dat['dosenPengajar'] ?></div>
                </li>
                <li class="list-group-item">
                  <div class="header-data"> <b>Jumlah SKS :</b></div>
                  <div class="item-data"><?= $dat['jumlahSks'] ?></div>
                </li>
                <li class="list-group-item">
                  <div class="header-data"> <b>Semester :</b></div>
                  <div class="item-data"><?= $dat['semester'] ?></div>
                </li>
              </ul>

            </div>
          </div>

        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>
<footer class="py-2 mt-auto" style="background: linear-gradient(to right, rgb(0, 110, 255), rgba(2, 100, 229, 0.658))">
  <div class="container">
    <div class="row align-items-center justify-content-center flex-column flex-sm-row">
      <div class="col-auto">
        <p class="text-white">Copyright &copy; MataKuliah 2021</p>
      </div>

    </div>
  </div>
</footer>
<style>

</style>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>