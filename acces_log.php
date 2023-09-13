<?php	
session_start();    


extract($_REQUEST);

if(!isset($_SESSION['auth']) or $_SESSION['auth']!='yes' or empty($_SESSION['auth']) or empty($_SESSION['partner'])) {
	  echo "<script language='javascript'>window.location.href='login.php';</script>";
	  exit;
}

$d1 = $date1;
$d2 = $date2;


$url =  'http://194.163.166.243:3020/md/log';


$params = array('date1' => "'" + $d1 + "'", 'date2' => "'" +  $d2 + "'");



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

echo $response;
?>

	
