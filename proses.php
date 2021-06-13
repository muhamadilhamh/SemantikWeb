<?php
require_once("sparqllib.php");
$test = "";
$data_received = json_decode(file_get_contents("php://input"));
if ($data_received) {
  $test = $data_received->data;
  $data = sparql_get(
    "http://localhost:3030/uasSemweb",
    "
    prefix p: <http://matakuliahTI.com>
    prefix d: <http://matakuliahTI.com/ns/data#>

    SELECT  ?Matkul ?jenisMatkul ?dosenPengajar ?jumlahSks ?semester ?deskripsi ?keterangan ?syaratAmbil
    WHERE
    { 
        ?s  d:namaMatkul ?Matkul ;
            d:jenisMatkul ?jenisMatkul;
            d:dosenPengajar ?dosenPengajar;
            d:jumlahSks ?jumlahSks;
            d:semester ?semester;
            d:tentangMatkul ?tentangMatkul.

        ?tentangMatkul  d:deskripsi      ?deskripsi;
                        d:keterangan    ?keterangan;
                        d:syaratAmbil    ?syaratAmbil;

             FILTER (regex(?jumlahSks, '$test') || regex(?Matkul, '$test','i') || regex(?jenisMatkul,  '$test','i') ||   regex(?dosenPengajar, '$test','i') || regex(?semester, '$test', 'i') || regex(?keterangan, '$test','i'))      
    } "
  );
} else {
  $data = sparql_get(
    "http://localhost:3030/uasSemweb",
    "
    prefix p: <http://matakuliahTI.com>
    prefix d: <http://matakuliahTI.com/ns/data#>

    SELECT  ?Matkul ?jenisMatkul ?dosenPengajar ?jumlahSks ?semester ?deskripsi ?keterangan ?syaratAmbil ?tentangMatkul
    WHERE
    { 
        ?s  d:namaMatkul ?Matkul ;
            d:jenisMatkul ?jenisMatkul;
            d:dosenPengajar ?dosenPengajar;
            d:jumlahSks ?jumlahSks;
            d:semester ?semester;
            d:tentangMatkul ?tentangMatkul.

        ?tentangMatkul  d:deskripsi      ?deskripsi;
                        d:keterangan     ?keterangan;
                        d:syaratAmbil    ?syaratAmbil;
                  
    }
          "
  );
}
echo json_encode($data);
