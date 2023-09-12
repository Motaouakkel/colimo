<?php


function fetch_data($url, $data, $username = null, $password = null)
{

    $postdata = http_build_query($data, '', '&');

    $opts = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => $postdata
        )
    );

    if ($username && $password) {
        $opts['http']['header'] .= ("Authorization: Basic " . base64_encode("$username:$password")); // .= to append to the header array element
    }

    $context = stream_context_create($opts);
    return file_get_contents($url, false, $context);
}

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