<?php
$json_string = 'http://194.163.166.243:3020/op/report1';

$jsondata = file_get_contents($json_string);

$obj = json_decode($jsondata, true);


foreach ($obj as $v1) {
	
        echo $v1['Agence'] ;
    }

?>