<!-- Start: header -->
<?php

require_once 'function.php';


session_start();
if (!isset($_SESSION['auth']) or $_SESSION['auth'] != 'yes' or empty($_SESSION['auth'])) {
    echo "<script language='javascript'>window.location.href='login.php';</script>";
    exit;
}


$data = array("partner_id" => $_SESSION["partner"]);

$response = fetch_data(BASE_URL . ':'.PORT.'/ms/gpmenuweb', $data, 'test', 'miftah');


$objet = json_decode($response, true);



?>


<html>

<script>
    function includeHTML() {
        var z, i, elmnt, file, xhttp;
        /*loop through a collection of all HTML elements:*/
        z = document.getElementsByTagName("*");
        for (i = 0; i < z.length; i++) {
            elmnt = z[i];
            /*search for elements with a certain atrribute:*/
            file = elmnt.getAttribute("w3-include-html");
            if (file) {
                /*make an HTTP request using the attribute value as the file name:*/
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            elmnt.innerHTML = this.responseText;
                        }
                        if (this.status == 404) {
                            elmnt.innerHTML = "Page not found.";
                        }
                        /*remove the attribute, and call this function once more:*/
                        elmnt.removeAttribute("w3-include-html");
                        includeHTML();
                    }
                }
                xhttp.open("GET", file, true);
                xhttp.send();
                /*exit the function:*/
                return;
            }
        }
    };
</script>

<head>


    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Optima Board</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/magnific/magnific-popup.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- Admin Panels CSS -->
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-plugins/admin-panels/adminpanels.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link href="webdatarocks.min.css" rel="stylesheet" />
    <script src="webdatarocks.toolbar.min.js"></script>
    <script src="webdatarocks.js"></script>
    <!-- <link href="https://cdn.webdatarocks.com/latest/webdatarocks.min.css" rel="stylesheet"/> -->
    <link href="theme/teal/webdatarocks.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top bg-light">
    <div class="navbar-branding">
        <a class="navbar-brand" href="/home.php"> <b>OPTI</b>REPORTING
        </a>
        <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
        <ul class="nav navbar-nav pull-right hidden">
            <li>
                <a href="#" class="sidebar-menu-toggle">
                    <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                </a>
            </li>
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-left">

        <li>
            <span id="toggle_sidemenu_l2" class="glyphicon glyphicon-log-in fa-flip-horizontal hidden"></span>
        </li>
        <li class="dropdown hidden">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicons glyphicons-settings fs14"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="javascript:void(0);">
                        <span class="fa fa-times-circle-o pr5 text-primary"></span> Reset LocalStorage </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="fa fa-slideshare pr5 text-info"></span> Force Global Logout </a>
                </li>
                <li class="divider mv5"></li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="fa fa-tasks pr5 text-danger"></span> Run Cron Job </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="fa fa-wrench pr5 text-warning"></span> Maintenance Mode </a>
                </li>
            </ul>
        </li>
        <li class="hidden-xs">
            <a class="request-fullscreen toggle-active" href="#">
                <span class="octicon octicon-screen-full fs18"></span>
            </a>
        </li>
    </ul>
    <form class="navbar-form navbar-left navbar-search ml5" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search..." value="Search...">
        </div>
    </form>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-item-slide">
            <a class="dropdown-toggle pl10 pr10" data-toggle="dropdown" href="#">
                <span class="octicon octicon-radio-tower fs18"></span>
            </a>
            <ul class="dropdown-menu dropdown-hover dropdown-persist pn w350 bg-white animated animated-shorter fadeIn" role="menu">
                <li class="bg-light p8">
                    <span class="fw600 pl5 lh30"> Notifications</span>
                    <span class="label label-warning label-sm pull-right lh20 h-20 mt5 mr5">12</span>
                </li>
            </ul>
        </li>
        <li class="ph10 pv20 hidden-xs"> <i class="fa fa-circle text-tp fs8"></i>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15">
                <span><?php echo $_SESSION['fname_u'] . "." . $_SESSION['lname_u'] ?></span>
                <span class="caret caret-tp hidden-xs"></span>
            </a>
            <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">


                <li class="br-t of-h">
                    <a href="#" class="fw600 p12 animated animated-short fadeInDown">
                        <span class="fa fa-gear pr5"></span> Account Settings </a>
                </li>
                <li class="br-t of-h">
                    <a href="deconnection.php" class="fw600 p12 animated animated-short fadeInDown">
                        <span class="fa fa-power-off pr5"></span> Se deconnecter </a>
                </li>
            </ul>
        </li>
    </ul>

</header>
<!-- End: Header -->

<?php include 'skin_toolbox.php' ?>