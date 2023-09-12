<?php
$json_string = 'http://10.10.10.165:3020/op/report1';

$jsondata = file_get_contents($json_string);

$obj = json_decode($jsondata, true);


foreach ($obj as $v1) {
	
        echo $v1['Agence'] ;
    }

?>