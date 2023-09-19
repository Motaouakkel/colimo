<?php
include 'consts.php';

$json_string = BASE_URL . ':'.PORT.'/op/report1';

$jsondata = file_get_contents($json_string);

$obj = json_decode($jsondata, true);


foreach ($obj as $v1) {
	
        echo $v1['Agence'] ;
    }

?>