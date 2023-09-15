<?php

///////////////////////////////////////////////////////////
////////////////////      Function     ///////////////////
//////////////////////////////////////////////////////////

function get_data($endpint)
{
    session_start();

    extract($_REQUEST);

    if (!isset($_SESSION['auth']) or $_SESSION['auth'] != 'yes' or empty($_SESSION['auth'])) {
        echo "<script language='javascript'>window.location.href='login.php';</script>";
        exit;
    }

    $ag_id = $agency_id;
    $sup_id = $user_id;
    $part = $_SESSION['partner'];

    if ($part == "") {
        $part  = 0;
    }

    $url =  'http://194.163.166.243:3020/op/' . $endpint;


    $params = array('user_id' => $part);
    if (isset($date1)) {
        $params['date1'] = $date1;
    }
    if (isset($date2)) {
        $params['date2'] = $date2;
    }
    if (isset($date3)) {
        $params['date3'] = $date3;
    }
    if (isset($date4)) {
        $params['date4'] = $date4;
    }

    if ($ag_id != 0 && $_SESSION['job_id'] != 21) {
        $params['agency_id'] = $ag_id;
    }

    if ($sup_id != 0) {
        $params['supervisor_id'] = $sup_id;
    }

    $header = array('Content-Type' => 'application/json');
    $header = addBasicAuth($header, 'test', 'miftah');
    $response = request("GET", $url, $header, $params);

    return $response;
}


function addBasicAuth($header, $username, $password)
{
    $header['Authorization'] = 'Basic ' . base64_encode("$username:$password");
    return $header;
}

// method should be "GET", "PUT", etc..
function request($method, $url, $header, $params)
{
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
        $url .= '?' . implode('&', $params_array);
    }
    $context = stream_context_create($opts);
    $data = file_get_contents($url, false, $context);
    return $data;
}

///////////////////////////////////////////////////////////
//////////      Map action to endpoint     ////////////////
//////////////////////////////////////////////////////////

if (isset($_POST['action'])) {
    echo get_data($_POST['action']);
}
