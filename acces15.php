<?php	
session_start();    


extract($_REQUEST);



$d1 = $date1;
$d2 = $date2;
$d3 = $date3;
$d4 = $date4;

$d1 = $date1;
$d2 = $date2;
$d3 = $date3;
$d4 = $date4;

$ag_id = $agency_id;
$sup_id = $user_id;
$part = $_SESSION['partner'];


$url =  'http://194.163.166.243:3020/op/invoicecompare2';

if ($_SESSION['job_id'] == 21) {

$params = array('date1' => $d1, 'date2' => $d2, 'date3' => $d3, 'date4' => $d4,'user_id' => $part);

} else {

$params = array('date1' => $d1, 'date2' => $d2, 'date3' => $d3, 'date4' => $d4);

}

if ($ag_id != 0 && $_SESSION['job_id'] != 21) {
	$params['agency_id'] = $ag_id;
} 

if ($sup_id != 0 && $_SESSION['job_id'] != 21) {
		$params['user_id'] = $sup_id;
} 

$header = array('Content-Type' => 'application/json');
$header = addBasicAuth($header, 'test', 'miftah');
$response = request("GET", $url, $header, $params);

function addBasicAuth($header, $username, $password) {
    $header['Authorization'] = 'Basic '.base64_encode("$username:$password");
    return $header;
}

// method should be "GET", "PUT", etc..
function request($method, $url, $header, $params) {
    $opts = array(
        'http' => array(
            'method' => $method,
        ),
    );

    // serialize the header if needed
    if (!empty($header)) {
        $header_str = '';
        foreach ($header as $key => $value) {
            $header_str .= "$key: $value\r\n";
        }
        $header_str .= "\r\n";
        $opts['http']['header'] = $header_str;
    }

    // serialize the params if there are any
    if (!empty($params)) {
        $params_array = array();
        foreach ($params as $key => $value) {
            $params_array[] = "$key=$value";
        }
        $url .= '?'.implode('&', $params_array);
    }

    $context = stream_context_create($opts);
    $data = file_get_contents($url, false, $context);
    return $data;
}

//$chaine=$response; 
//$nombre_caract_a_suppr=1; 
//$chaine=substr($chaine,-strlen($chaine)+$nombre_caract_a_suppr); 



//$b= "[{\"Agence\":{\"type\": \"string\"},\"Secteur\":{\"type\": \"string\"},\"Date\":{\"type\": \"String\"},\"Heure\":{\"type\": \"string\"},\"CA\":{\"type\": \"number\"},\"Latitude\":{\"type\": \"String\"},\"Longitude\":{\"type\": \"String\"},\"Scan\":{\"type\":
//\"String\"},\"Réf\":{\"type\": \"String\"},\"Client\":{\"type\": \"String\"},\"Typologie\":{\"type\": \"String\"},\"NumFacture\":{\"type\": \"String\"},\"Tél\":{\"type\": \"String\"},\"Sec_Time\":{\"type\": \"time\"},\"Dur.Vis\":{\"type\": \"time\"},\"Durée\":{\"type\": \"time\"}},".$chaine;

//echo $b;
echo $response;

?>

	
