<?php	
include 'consts.php';	
	
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

			
extract($_REQUEST);
$r=$ref;




$url = BASE_URL . ':'.PORT.'/md/addresspartner';
$params = array('ref' => $r);
$header = array('Content-Type' => 'application/json');
$header = addBasicAuth($header, 'test', 'miftah');
$response = request("GET", $url, $header, $params);



$obj = json_decode($response, true);


foreach ($obj as $v1) {
		
		
    $a=     array($v1["Sectorization"]["name"],$v1["Sectorization"]["sector"],$v1["CoPartnerType"]["name"],$v1["CoCity"]["name"],$v1["grade"],$v1["name"],$v1["CoPartner"]["company_name"]);
	 break;
  
}

$url = BASE_URL . ':'.PORT.'/md/listprospect';
$params = array('ref' => $r);
$header = array('Content-Type' => 'application/json');
$header = addBasicAuth($header, 'test', 'miftah');
$response_pros = request("GET", $url, $header, $params);

$obj_pros = json_decode($response_pros, true);

foreach ($obj_pros as $v1_pros) {
		
		
     $id_pros=     $v1_pros["prospect_id"];
	 
	 array_push($a, $v1_pros["gps_lat"],$v1_pros["gps_long"]);
	 break;
  
}



$url = BASE_URL . ':'.PORT.'/md/prospectline';
$params = array('prospect_id' => $id_pros);
$header = array('Content-Type' => 'application/json');
$header = addBasicAuth($header, 'test', 'miftah');
$response_vitr = request("GET", $url, $header, $params);
$obj_vitr = json_decode($response_vitr, true);

$vitr_name ="";

foreach ($obj_vitr as $v1_vitr) {

			if ($v1_vitr["local"]==false && $v1_vitr["local_customer"] ==false)
			{
				$vitr_name  = $v1_vitr["CoPartner"]["partner_name"];
			}
	 array_push($a, $v1_vitr["local"],$v1_vitr["local_customer"],$v1_vitr["PmIuType"]["iu_type_name"],$vitr_name);
	
  
}

	 
echo json_encode($a);


?> 
		