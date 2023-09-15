<?php	

session_start();    

extract($_REQUEST);


$data = array("description" => $description,"action_name" => $action_name, "user_name" => $_SESSION['lname_u'].' '.$_SESSION['fname_u']);   



function file_post_contents12($url, $data, $username = null, $password = null){

 $postdata = http_build_query($data, '', '&');

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'content' => $postdata
    )
);

if($username && $password)
{
    $opts['http']['header'] .= ("Authorization: Basic " . base64_encode("$username:$password"));
}

$context = stream_context_create($opts);
return file_get_contents($url, false, $context);

}

$obj = 'Nothing';

$response = file_post_contents12('http://10.10.10.165:3020/md/log',$data,'test','miftah');
			

$obj = json_decode($response, true);


echo $obj;
	

?> 
			