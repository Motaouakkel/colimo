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



$response = file_post_contents12('http://194.163.166.243:3020/ms/gpmenuweb', $data, 'test', 'miftah');

$obj = json_decode($response, true);

?>
<!-- Start: Sidebar -->
<div id="skin-toolbox">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-icon"><i class="fa fa-gear text-primary"></i>
            </span>
            <span class="panel-title"> Theme Options</span>
        </div>
        <div class="panel-body pn">

            <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
                <li class="active">
                    <a href="#toolbox-header" role="tab" data-toggle="tab">Navbar</a>
                </li>
                <li>
                    <a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a>
                </li>
                <li>
                    <a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a>
                </li>
            </ul>

            <div class="tab-content p20 ptn pb15">
                <div role="tabpanel" class="tab-pane active" id="toolbox-header">
                    <form id="toolbox-header-skin">
                        <h4 class="mv20">Header Skins</h4>

                        <!--                             <div class="checkbox-custom checkbox-disabled mb5">
                                <input type="checkbox" name="headerTwoTone" id="headerTwoTone" checked>
                                <label for="headerTwoTone">Two Tone Header</label>
                            </div>

                            <hr class="mv10 alt">
 -->
                        <div class="skin-toolbox-swatches">
                            <div class="checkbox-custom checkbox-disabled fill mb5">
                                <input type="radio" name="headerSkin" id="headerSkin8" checked value="bg-light">
                                <label for="headerSkin8">Light</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-primary mb5">
                                <input type="radio" name="headerSkin" id="headerSkin1" value="bg-primary">
                                <label for="headerSkin1">Primary</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-info mb5">
                                <input type="radio" name="headerSkin" id="headerSkin3" value="bg-info">
                                <label for="headerSkin3">Info</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-warning mb5">
                                <input type="radio" name="headerSkin" id="headerSkin4" value="bg-warning">
                                <label for="headerSkin4">Warning</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-danger mb5">
                                <input type="radio" name="headerSkin" id="headerSkin5" value="bg-danger">
                                <label for="headerSkin5">Danger</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-alert mb5">
                                <input type="radio" name="headerSkin" id="headerSkin6" value="bg-alert">
                                <label for="headerSkin6">Alert</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-system mb5">
                                <input type="radio" name="headerSkin" id="headerSkin7" value="bg-system">
                                <label for="headerSkin7">System</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-success mb5">
                                <input type="radio" name="headerSkin" id="headerSkin2" value="bg-success">
                                <label for="headerSkin2">Success</label>
                            </div>
                            <div class="checkbox-custom fill mb5">
                                <input type="radio" name="headerSkin" id="headerSkin9" value="bg-dark">
                                <label for="headerSkin9">Dark</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="toolbox-sidebar">
                    <form id="toolbox-sidebar-skin">

                        <h4 class="mv20">Sidebar Skins</h4>
                        <div class="skin-toolbox-swatches">
                            <div class="checkbox-custom fill mb5">
                                <input type="radio" name="sidebarSkin" checked id="sidebarSkin3" value="">
                                <label for="sidebarSkin3">Dark</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-disabled mb5">
                                <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                                <label for="sidebarSkin1">Light</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-light mb5">
                                <input type="radio" name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light">
                                <label for="sidebarSkin2">Lighter</label>
                            </div>

                        </div>

                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="toolbox-settings">
                    <form id="toolbox-settings-misc">
                        <h4 class="mv20 mtn">Layout Options</h4>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" checked="" id="header-option">
                                <label for="header-option">Fixed Header</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" id="sidebar-option">
                                <label for="sidebar-option">Fixed Sidebar</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" id="breadcrumb-option">
                                <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" id="breadcrumb-hidden">
                                <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                            </div>
                        </div>
                        <h4 class="mv20">Layout Options</h4>
                        <div class="form-group">
                            <div class="radio-custom mb5">
                                <input type="radio" id="fullwidth-option" checked name="layout-option">
                                <label for="fullwidth-option">Fullwidth Layout</label>
                            </div>
                        </div>
                        <div class="form-group mb20">
                            <div class="radio-custom radio-disabled mb5">
                                <input type="radio" id="boxed-option" name="layout-option" disabled>
                                <label for="boxed-option">Boxed Layout <b class="text-muted">(Coming Soon)</b></label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="form-group mn br-t p15">
                <a href="#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a>
            </div>

        </div>
    </div>
</div>
<!-- End: Theme Preview Pane -->

<header class="navbar navbar-fixed-top bg-light">
    <div class="navbar-branding">
        <a class="navbar-brand" href="#"> <b>OPTI</b>REPORTING
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

<!-- Start: Sidebar -->
<aside id="sidebar_left" class="nano nano-primary test3434">
    <div class="nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">
            <div class="user-menu">
                <div class="row text-center mbn">
                    <div class="col-xs-4">
                        <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                            <span class="glyphicons glyphicons-home"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                            <span class="glyphicons glyphicons-inbox"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                            <span class="glyphicons glyphicons-bell"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                            <span class="glyphicons glyphicons-imac"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicons glyphicons-settings"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                            <span class="glyphicons glyphicons-restart"></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- End: Sidebar Header -->

        <!-- sidebar menu -->
        <ul class="nav sidebar-menu">


            <li class="active">
                <a href="#">
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