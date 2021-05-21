<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="text/css" href=css/style.css>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  <title>Hello, world!</title>
</head>

<body>
  <!-- Navbar -->

  <head>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="index.html">Mata <b>Kuliah</b></a>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="about.html">About Teknik Informatika</a>
          </li>
        </ul>
      </nav>
    </div>
  </head>

  <!--PHP-->
  <?php
  require_once("sparqllib.php");
  $test = "";
  if (isset($_POST['search-matakuliah'])) {
    $test = $_POST['search-matakuliah'];
    $data = sparql_get(
      "http://localhost:3030/matakuliah",
      "
      PREFIX p: <http://matakuliahTI.com>
      PREFIX d: <http://matakuliahTI.com/ns/data#>
      
      SELECT ?Matkul ?jenisMatkul ?deskripsi ?dosenPengajar ?jumlahSks ?semester
      WHERE
      { 
          ?s  d:namaMatkul ?Matkul ;
              d:jenisMatkul ?jenisMatkul;
              d:deskripsi ?deskripsi;
              d:dosenPengajar ?dosenPengajar;
              d:jumlahSks ?jumlahSks;
              d:semester ?semester;
              FILTER regex(?Matkul, '$test')
      
      }
            "
    );
  } else {
    $data = sparql_get(
      "http://localhost:3030/matakuliah",
      "
      PREFIX p: <http://matakuliahTI.com>
      PREFIX d: <http://matakuliahTI.com/ns/data#>
      
      SELECT ?Matkul ?jenisMatkul ?deskripsi ?dosenPengajar ?jumlahSks ?semester
      WHERE
      { 
          ?s  d:namaMatkul ?Matkul ;
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
  // $search = $_POST['search-aniln'];
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
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Tentang Mata Kuliah
                    </button>
                  </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      <p class="card-text"><?= $dat['deskripsi'] ?>
                      </p>
                    </div>
                  </div>
                </div>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<style>
  body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    color: #515155;
  }

  .my-auto p {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    text-align: center;
    font-size: 2rem;
    color: white;
  }

  .bg-heroes {
    background: url(asset/tst4.svg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
  }

  .warna-bg {
    background: linear-gradient(to right, rgb(0, 110, 255), rgba(2, 100, 229, 0.658));
    height: 437px;
  }

  .has-search .form-control {
    padding-left: 2.375rem;
  }

  .has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
    margin-top: 5px
  }

  .form-control {
    background-color: white;
    border: 0;
  }

  .layout {
    margin-top: -60px;
  }

  .header-data {
    padding-right: 15px;
    justify-content: space-between;
    font-weight: 500;
    letter-spacing: 2%;
  }

  .item-data {
    padding-right: 15px;
    justify-content: space-between;
    font-weight: 400;
    letter-spacing: 2%;
  }

  .data {
    line-height: 30px;
    padding-bottom: 10px;
  }

  .card {
    margin-bottom: 40px;
    border-radius: 10px;
  }

  .card-text {
    letter-spacing: 2%;
    line-height: 30px;
  }
</style>
</body>

</html>