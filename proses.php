<?php
require_once("sparqllib.php");
$test = "";
$data_received = json_decode(file_get_contents("php://input"));
if ($data_received) {
  $test = $data_received->data;
  $data = sparql_get(
    "http://localhost:3030/datasemantik",
    "
    prefix p: <http://matakuliahTI.com>
    prefix d: <http://matakuliahTI.com/ns/data#>

    SELECT ?Matkul ?Syarat ?Prak ?Sks ?Semester ?jenisMatkul ?Dosen ?Desc

        WHERE
        { 
  			?x	d:namaMatkul ?Matkul;
  				  d:deskripsi	?Desc;
  				  d:syaratAmbil ?Syarat.
  
  			?p 	d:prak ?Prak;
  			  	d:isPrak ?x.
  
  			?k 	d:sks ?Sks;
  				  d:isSks ?x.
  
  			?s 	d:semester ?Semester;
  			  	d:isSemester ?x.
  
 			?t 	d:jenisMatkul ?jenisMatkul;
  				d:isJenisMatkul ?x.
  			
  			?d  d:dosen ?Dosen;
        		d:isDosen ?x.

      FILTER (regex(?Matkul, '$test', 'i') || regex(?Dosen, '$test','i') ||  regex(?Sks, '$test', 'i') || regex(?Semester, '$test','i') || regex(?jenisMatkul, '$test','i') || regex(?Prak, '$test','i'))      
    } "
  );
} else {
  $data = sparql_get(
    "http://localhost:3030/datasemantik",
    "
    prefix p: <http://matakuliahTI.com>
    prefix d: <http://matakuliahTI.com/ns/data#>

    SELECT ?Matkul ?Syarat ?Prak ?Sks ?Semester ?jenisMatkul ?Dosen ?Desc

        WHERE
        { 
  			?x	d:namaMatkul ?Matkul;
  				  d:deskripsi	?Desc;
  				  d:syaratAmbil ?Syarat.
  
  			?p 	d:prak ?Prak;
  			  	d:isPrak ?x.
  
  			?k 	d:sks ?Sks;
  				  d:isSks ?x.
  
  			?s 	d:semester ?Semester;
  			  	d:isSemester ?x.
  
 			  ?t 	d:jenisMatkul ?jenisMatkul;
  			  	d:isJenisMatkul ?x.
  			
  			?d  d:dosen ?Dosen;
        		d:isDosen ?x.
                  
    }
          "
  );
}
echo json_encode($data);
