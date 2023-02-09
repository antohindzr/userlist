<?php
use App\Models\Jsonuser;
     
       $jsondata = Jsonuser::all();
       $tojson = fopen('listuserto.json', 'w');
       fwrite($tojson, json_encode($jsondata));
       fclose($tojson);
      