
<?php	
session_start();    


extract($_REQUEST);



$sec_id = $sector;
$dte = $date1;
$url =  'http://10.10.10.165:3020/sl/gpsinvoice';


$params = array('sector_id' => $sec_id , 'dte' => $dte);





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
$obj = json_decode($response, true);
$a = array();


foreach ($obj as $v1) {
		
		$l = floatval($v1["time"])  - 3600;
	
		array_push($a,array("lng"=>floatval($v1["lng"]),"lat"=>floatval($v1["lat"]),"time"=>$l));
	
 	 
}

echo json_encode($a);

?>


	
