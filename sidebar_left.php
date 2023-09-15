<?php

session_start();
$data = array("partner_id" => $_SESSION["partner"]);


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
        $opts['http']['header'] .= ("Authorization: Basic " . base64_encode("$username:$password")); // .= to append to the header array element
    }

    $context = stream_context_create($opts);
    return file_get_contents($url, false, $context);
}



$response = file_post_contents12('http://10.10.10.165:3020/ms/gpmenuweb', $data, 'test', 'miftah');

$obj = json_decode($response, true);

?>


<!-- Start: Sidebar -->
<aside id="sidebar_left" class="nano nano-primary test3434">
    <div class="nano-content">
        <!-- sidebar menu -->
        <ul class="nav sidebar-menu">
            <li class="active">
                <a href="/home.php">
                    <span class="glyphicons glyphicons-home"></span>
                    <span class="sidebar-title">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-label pt15">Menu</li>
            <li>
                <a class="accordion-toggle menu-open" href="#">
                    <span class="glyphicons glyphicons-fire"></span>
                    <span class="sidebar-title">PDA</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <?php
                    $currentUrl = $_SERVER['REQUEST_URI'];
                    $pageRoute = parse_url($currentUrl, PHP_URL_PATH);
                    $class  = "";
                    foreach ($obj as $v1) {
                        $class = strpos($pageRoute, $v1["logic_name"]) !== false ? "active" : "";
                        echo "<li class=\"" . $class . "\">";
                        echo "<a href=" . $v1["logic_name"] . "><span class='glyphicons glyphicons-book'></span> " . $v1["iname"] . " </a> </li>";
                    }

                    ?>
                </ul>
            </li>
        </ul>
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
    </div>
</aside>