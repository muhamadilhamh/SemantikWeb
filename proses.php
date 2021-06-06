<?php
require_once("sparqllib.php");
$test = "";
$data_received = json_decode(file_get_contents("php://input"));
if ($data_received) {
  $test = $data_received->data;
  $data = sparql_get(
    "http://localhost:3030/matakuliah",
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
            FILTER (regex(?jumlahSks, '$test') || regex(?Matkul, '$test','i') || regex(?jenisMatkul,  '$test','i') ||   regex(?dosenPengajar, '$test','i') || regex(?semester, '$test' ))
    }
          "
  );
} else {
  $data = sparql_get(
    "http://localhost:3030/matakuliah",
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
echo json_encode($data);
