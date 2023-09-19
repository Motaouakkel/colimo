<?php
require_once 'function.php';
session_start();

extract($_REQUEST);
$temail_user = $email_user;
$tpass_user = $pass_user;

$data = array("login" => $temail_user, "password" => $tpass_user);


function file_post_contents12($url, $data, $username = null, $password = null)
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
        $opts['http']['header'] .= ("Authorization: Basic " . base64_encode("$username:$password"));
    }

    $context = stream_context_create($opts);
    return file_get_contents($url, false, $context);
}

$response = file_post_contents12(BASE_URL . ':' . PORT . '/md/login', $data, 'test', 'miftah');


$obj = json_decode($response, true);
$b = 3;
if (isset($obj['first_name'])) {
    $_SESSION['auth'] = 'yes';
    $_SESSION['fname_u'] = $obj['first_name'];
    $_SESSION['lname_u'] = $obj['last_name'];
    $_SESSION['partner'] = $obj['partner_id'];
    $_SESSION['job_id'] = $obj['job_id'];
    $b = 1;
}


echo $b;
