<?php
    session_start();
	if(!isset($_SESSION['auth']) or $_SESSION['auth']!='yes' or empty($_SESSION['auth'])) {
	  echo "<script language='javascript'>window.location.href='login.php';</script>";
	  exit;
	}
	
	
	
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>AdminDesigns</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
	  <link href="webdatarocks.min.css" rel="stylesheet" />
    <script src="webdatarocks.toolbar.min.js"></script>
    <script src="webdatarocks.js"></script>
    <link href="theme/teal/webdatarocks.css" rel="stylesheet">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

</head>

<body class="ecommerce-page">

    <!-- Start: Theme Preview Pane -->
    <div id="skin-toolbox" class="hidden">
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
                                    <label for="boxed-option">Boxed Layout <b class="text-muted">(Coming Soon)</b>
                                    </label>
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

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top bg-light">
            <div class="navbar-branding">
                <a class="navbar-brand" href="dashboard.html"> <b>Admin</b>Designs </a>
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
                    <a class="sidebar-menu-toggle" href="#">
                        <span class="octicon octicon-ruby fs18"></span>
                    </a>
                </li>
                <li>
                    <a class="topbar-menu-toggle" href="#">
                        <span class="glyphicons glyphicons-magic fs16"></span>
                    </a>
                </li>
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
                        <li class="p10 br-t item-1">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                        <li class="p10 br-t item-2">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                        <li class="p10 br-t item-3">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/4.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                        <li class="p10 br-t item-4">
                            <div class="media">
                                <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg" class="mw40" alt="holder-img"> </a>
                                <div class="media-body va-m">
                                    <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="flag-xs flag-us"></span>
                        <span class="fw600">US</span>
                    </a>
                    <ul class="dropdown-menu animated animated-short flipInX" role="menu">
                        <li>
                            <a href="javascript:void(0);" class="fw600">
                                <span class="flag-xs flag-in mr10"></span> Hindu </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="fw600">
                                <span class="flag-xs flag-tr mr10"></span> Turkish </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="fw600">
                                <span class="flag-xs flag-es mr10"></span> Spanish </a>
                        </li>
                    </ul>
                </li>
                <li class="ph10 pv20 hidden-xs"> <i class="fa fa-circle text-tp fs8"></i>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15">
                        <span>John.Smith</span>
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        <li class="bg-light br-b br-light p8">
                            <span class="pull-left ml10">
                                <select id="user-status">
                                    <optgroup label="Current Status:">
                                        <option value="1-1">Away</option>
                                        <option value="1-2">Offline</option>
                                        <option value="1-3" selected="selected">Online</option>
                                    </optgroup>
                                </select>
                            </span>

                            <span class="pull-right mr10">
                                <select id="user-role">
                                    <optgroup label="Logged in As:">
                                        <option value="1-1">Client</option>
                                        <option value="1-2">Editor</option>
                                        <option value="1-3" selected="selected">Admin</option>
                                    </optgroup>
                                </select>
                            </span>
                            <div class="clearfix"></div>

                        </li>
                        <li class="of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInUp">
                                <span class="fa fa-envelope pr5"></span> Messages
                                <span class="pull-right lh20 h-20 label label-warning label-sm">2</span>
                            </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInUp">
                                <span class="fa fa-user pr5"></span> Friends
                                <span class="pull-right lh20 h-20 label label-warning label-sm">6</span>
                            </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-gear pr5"></span> Account Settings </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
        <aside id="sidebar_left" class="nano nano-primary test">
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
                    <li class="sidebar-label pt20">Menu</li>
                    <li>
                        <a href="pages_calendar.html">
                            <span class="fa fa-calendar"></span>
                            <span class="sidebar-title">Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="documentation/index.html">
                            <span class="glyphicons glyphicons-book_open"></span>
                            <span class="sidebar-title">Documentation</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="dashboard.html">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-label pt15">Exclusive Tools</li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-fire"></span>
                            <span class="sidebar-title">Admin Plugins</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="admin_plugins-panels.html">
                                    <span class="glyphicons glyphicons-book"></span> Admin Panels </a>
                            </li>
                            <li>
                                <a href="admin_plugins-modals.html">
                                    <span class="glyphicons glyphicons-show_big_thumbnails"></span> Admin Modals </a>
                            </li>
                            <li>
                                <a href="admin_plugins-dock.html">
                                    <span class="glyphicons glyphicons-sampler"></span> Admin Dock </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title">Admin Forms</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="admin_forms-elements.html">
                                    <span class="glyphicons glyphicons-edit"></span> Admin Elements </a>
                            </li>
                            <li>
                                <a href="admin_forms-widgets.html">
                                    <span class="glyphicons glyphicons-calendar"></span> Admin Widgets </a>
                            </li>
                            <li>
                                <a href="admin_forms-layouts.html">
                                    <span class="glyphicons glyphicons-more_windows"></span> Admin Layouts </a>
                            </li>
                            <li>
                                <a href="admin_forms-wizard.html">
                                    <span class="glyphicons glyphicons-magic"></span> Admin Wizard </a>
                            </li>
                            <li>
                                <a href="admin_forms-validation.html">
                                    <span class="glyphicons glyphicons-check"></span> Admin Validation </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-label pt20">Systems</li>
                    <li>
                        <a class="accordion-toggle menu-open" href="#">
                            <span class="glyphicons glyphicons-shopping_cart"></span>
                            <span class="sidebar-title">Ecommerce</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="ecommerce_dashboard.html">
                                    <span class="glyphicons glyphicons-shopping_cart"></span> Dashboard <span class="label label-xs bg-primary">New</span></a>
                            </li>
                            <li class="active">
                                <a href="ecommerce_products.html">
                                    <span class="glyphicons glyphicons-tags"></span> Products </a>
                            </li>
                            <li>
                                <a href="ecommerce_orders.html">
                                    <span class="glyphicons glyphicons-coins"></span> Orders </a>
                            </li>
                            <li>
                                <a href="ecommerce_customers.html">
                                    <span class="glyphicons glyphicons-user_add"></span> Customers </a>
                            </li>
                            <li>
                                <a href="ecommerce_settings.html">
                                    <span class="glyphicons glyphicons-keys"></span> Store Settings </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="email_templates.html">
                            <span class="fa fa-envelope-o"></span>
                            <span class="sidebar-title">Email Templates</span>
                            <span class="sidebar-title-tray">
                                <span class="label label-xs bg-primary">New</span>
                            </span>
                        </a>
                    </li>

                    <!-- sidebar resources -->
                    <li class="sidebar-label pt20">Elements</li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-bell"></span>
                            <span class="sidebar-title">UI Elements</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="ui_tour.html">
                                    <span class="glyphicons glyphicons-lightbulb"></span> Tour <span class="label label-xs bg-primary">New</span> </a>
                            </li>
                            <li>
                                <a href="ui_alerts.html">
                                    <span class="glyphicons glyphicons-warning_sign"></span> Alerts </a>
                            </li>
                            <li>
                                <a href="ui_animations.html">
                                    <span class="glyphicons glyphicons-dislikes"></span> Animations </a>
                            </li>
                            <li>
                                <a href="ui_buttons.html">
                                    <span class="glyphicons glyphicons-macbook"></span> Buttons </a>
                            </li>
                            <li>
                                <a href="ui_portlets.html">
                                    <span class="glyphicons glyphicons-check"></span> Portlets </a>
                            </li>
                            <li>
                                <a href="ui_progress-bars.html">
                                    <span class="glyphicons glyphicons-adjust_alt"></span> Progress Bars </a>
                            </li>
                            <li>
                                <a href="ui_tabs.html">
                                    <span class="glyphicons glyphicons-podium"></span> Tabs </a>
                            </li>
                            <li>
                                <a href="ui_tiles.html">
                                    <span class="glyphicons glyphicons-fabric"></span> Tiles </a>
                            </li>
                            <li>
                                <a href="ui_widgets.html">
                                    <span class="glyphicons glyphicons-more_items"></span> Widgets </a>
                            </li>
                            <li>
                                <a href="ui_icons.html">
                                    <span class="glyphicons glyphicons-rabbit"></span> Icons </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-hdd"></span>
                            <span class="sidebar-title">Form Elements</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="form_inputs.html">
                                    <span class="glyphicons glyphicons-pen"></span> Inputs </a>
                            </li>
                            <li>
                                <a href="ui_typography.html">
                                    <span class="glyphicons glyphicons-text_height"></span> Typography </a>
                            </li>
                            <li>
                                <a href="form_editors.html">
                                    <span class="glyphicons glyphicons-book_open"></span> Editors </a>
                            </li>
                            <li>
                                <a href="form_treeview.html">
                                    <span class="glyphicons glyphicons-tree_conifer"></span> Treeview </a>
                            </li>
                            <li>
                                <a href="form_nestable.html">
                                    <span class="glyphicons glyphicons-sort"></span> Nestable </a>
                            </li>
                            <li>
                                <a href="form_uploaders.html">
                                    <span class="glyphicons glyphicons-cloud-upload"></span> Uploaders </a>
                            </li>
                            <li class="hidden">
                                <a class="accordion-toggle" href="#">
                                    <span class="glyphicons glyphicons-more_items"></span> Editors
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a href="editors_ckeditor.html">
                                            <span class="glyphicons glyphicons-flash"></span> Ckeditor </a>
                                    </li>
                                    <li>
                                        <a href="editors_markdown.html">
                                            <span class="glyphicons glyphicons-flash"></span> Markdown </a>
                                    </li>
                                    <li>
                                        <a href="editors_summernote.html">
                                            <span class="glyphicons glyphicons-flash"></span> Summernote </a>
                                    </li>
                                    <li>
                                        <a href="editors_xedit">
                                            <span class="glyphicons glyphicons-flash"></span> X-Editable </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="ui_notifications.html">
                                    <span class="glyphicons glyphicons-crown"></span> Notifications </a>
                            </li>
                            <li>
                                <a href="ui_content-sliders.html">
                                    <span class="glyphicons glyphicons-retweet"></span> Content Sliders </a>
                            </li>
                            <li>
                                <a href="ui_grid.html">
                                    <span class="glyphicons glyphicons-show_big_thumbnails"></span> Grid </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-stopwatch"></span>
                            <span class="sidebar-title">Plugins</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a class="accordion-toggle" href="#">
                                    <span class="glyphicons glyphicons-globe"></span> Maps
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a href="maps_advanced.html">Admin Maps</a>
                                    </li>
                                    <li>
                                        <a href="maps_basic.html">Basic Maps</a>
                                    </li>
                                    <li>
                                        <a href="maps_vector.html">Vector Maps</a>
                                    </li>
                                    <li>
                                        <a href="maps_full.html">Full Map</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-toggle" href="#">
                                    <span class="glyphicons glyphicons-charts"></span> Charts
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a href="charts_highcharts.html">Highcharts</a>
                                    </li>
                                    <li>
                                        <a href="charts_d3.html">D3 Charts</a>
                                    </li>
                                    <li>
                                        <a href="charts_flot.html">Flot Charts</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-toggle" href="#">
                                    <span class="glyphicons glyphicons-table"></span> Tables
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a href="tables_basic.html"> Basic Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables_datatables.html"> DataTables </a>
                                    </li>
                                    <li>
                                        <a href="tables_datatables-editor.html"> Editable Tables </a>
                                    </li>
                                    <li>
                                        <a href="tables_pricing.html"> Pricing Tables </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-more_items"></span>
                            <span class="sidebar-title">Pages</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a class="accordion-toggle" href="#">
                                    <span class="glyphicons glyphicons-cogwheels"></span> Utility
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a href="landing-page/landing1/index.html" target="_blank"> Landing Page <span class="label label-xs bg-primary">New</span> </a>
                                    </li>
                                    <li>
                                        <a href="pages_login.html"> Login </a>
                                    </li>
                                    <li>
                                        <a href="pages_register.html"> Register </a>
                                    </li>
                                    <li>
                                        <a href="pages_screenlock.html"> Screenlock </a>
                                    </li>
                                    <li>
                                        <a href="pages_forgotpw.html" target="_blank"> Forgotten Password </a>
                                    </li>
                                    <li>
                                        <a href="pages_coming-soon.html"> Coming Soon <span class="label label-xs bg-primary">New</span> </a>
                                    </li>
                                    <li>
                                        <a href="pages_404.html"> 404 Error </a>
                                    </li>
                                    <li>
                                        <a href="pages_500.html"> 500 Error </a>
                                    </li>
                                    <li>
                                        <a href="pages_404(alt).html"> 404 Error Alt </a>
                                    </li>
                                    <li>
                                        <a href="pages_500(alt).html"> 500 Error Alt </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-toggle" href="#">
                                    <span class="glyphicons glyphicons-imac"></span> Basic
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a href="pages_calendar.html"> Calendar </a>
                                    </li>
                                    <li>
                                        <a href="pages_profile.html"> Profile </a>
                                    </li>
                                    <li>
                                        <a href="pages_timeline.html"> Timeline Split </a>
                                    </li>
                                    <li>
                                        <a href="pages_timeline-single.html"> Timeline Single </a>
                                    </li>
                                    <li>
                                        <a href="pages_faq.html"> FAQ Page </a>
                                    </li>
                                    <li>
                                        <a href="pages_messages.html"> Messages </a>
                                    </li>
                                    <li>
                                        <a href="pages_messages(alt).html"> Messages Alt </a>
                                    </li>
                                    <li>
                                        <a href="pages_gallery.html"> Gallery </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-toggle" href="#">
                                    <span class="glyphicons glyphicons-usd"></span> Misc
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a href="pages_invoice.html"> Printable Invoice </a>
                                    </li>
                                    <li>
                                        <a href="pages_blank.html"> Blank </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- sidebar bullets -->
                    <li class="sidebar-label pt20">Projects</li>
                    <li class="sidebar-proj">
                        <a href="#projectOne">
                            <span class="fa fa-dot-circle-o text-primary"></span>
                            <span class="sidebar-title">Website Redesign</span>
                        </a>
                    </li>
                    <li class="sidebar-proj">
                        <a href="#projectTwo">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            <span class="sidebar-title">Ecommerce Panel</span>
                        </a>
                    </li>
                    <li class="sidebar-proj">
                        <a href="#projectTwo">
                            <span class="fa fa-dot-circle-o text-danger"></span>
                            <span class="sidebar-title">Adobe Mockup</span>
                        </a>
                    </li>
                    <li class="sidebar-proj">
                        <a href="#projectThree">
                            <span class="fa fa-dot-circle-o text-warning"></span>
                            <span class="sidebar-title">SSD Upgrades</span>
                        </a>
                    </li>

                    <!-- sidebar progress bars -->
                    <li class="sidebar-label pt25 pb10">User Stats</li>
                    <li class="sidebar-stat mb10">
                        <a href="#projectOne" class="fs11">
                            <span class="fa fa-inbox text-info"></span>
                            <span class="sidebar-title text-muted">Email Storage</span>
                            <span class="pull-right mr20 text-muted">35%</span>
                            <div class="progress progress-bar-xs ml20 mr20">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                                    <span class="sr-only">35% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-stat mb10">
                        <a href="#projectOne" class="fs11">
                            <span class="fa fa-dropbox text-warning"></span>
                            <span class="sidebar-title text-muted">Bandwidth</span>
                            <span class="pull-right mr20 text-muted">58%</span>
                            <div class="progress progress-bar-xs ml20 mr20">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                                    <span class="sr-only">58% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Start: Topbar-Dropdown -->
          
            <!-- End: Topbar-Dropdown -->

            <!-- Start: Topbar -->
            <header id="topbar" class="ph10">
               
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

                <!-- begin: .tray-center -->
                <div class="tray tray-center p25 va-t posr">
<div id="wdr-component"></div>
                <div id="wdr-component2" ></div>

	
  <script>
                
                
  function loadfile(f) {
	  
			

	       var str = f;
		   
                function readJSON(file) {
    var request = new XMLHttpRequest();
    request.open('GET', file, false);
    request.send(null);
    if (request.status == 200)
        return request.responseText;
                };
                
                
                function getJSONData(str) {
					
                               return JSON.parse(readJSON(str));
                };
                
                var pivot1 = new WebDataRocks({
                               container: "#wdr-component",
                               toolbar: false,
                               report: {
                                               dataSource: {
                                                               "data": getJSONData(str)
                                               },
                                               "slice": {
        "rows": [
            {
                "uniqueName": "Agence"
            },
            {
                "uniqueName": "Famille"
            },
            {
                "uniqueName": "SousFamille"
            },
            {
                "uniqueName": "Produit"
            },
            {
                "uniqueName": "Article"
            }
        ],
        "columns": [
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "ValeurCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (Dh)",
            },
            {
                "uniqueName": "ValeurLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Dh)",
            },
            {
                "uniqueName": "PoidsCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (kg)",
            },
            {
                "uniqueName": "PoidsLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Kg)",
            },
            {
                "uniqueName": "QS",
                "formula": "(sum(\"ValeurLivraison\")  / sum(\"ValeurCommande\") ) * 100",
                "caption": "QS (Valeur)",
                "format": "3bep0lb7"
            }
        ]
    },
    "options": {
        "grid": {
            "title": "Qualité de service / Agence",
            "showHeaders": false,
            "showGrandTotals": "columns",
            "showHierarchyCaptions": false
        },
        "showAggregationLabels": false
    },
    "formats": [
        {
            "name": "3bep0lb7",
            "thousandsSeparator": " ",
            "decimalSeparator": ".",
            "decimalPlaces": 2,
            "currencySymbol": "",
            "currencySymbolAlign": "left",
            "nullValue": "",
            "textAlign": "right",
            "isPercent": false
        }
    ]
                               },
                               
                });
                
                
                var pivot2 = new WebDataRocks({
                               container: "#wdr-component2",
                               toolbar: false,
                               report: {
                                               dataSource: {
                                                               "data": getJSONData(str)
                                               },
                                               "slice": {
        "reportFilters": [
            {
                "uniqueName": "Agence"
            }
        ],
        "rows": [
            {
                "uniqueName": "GroupArticle"
            },
            {
                "uniqueName": "Famille"
            },
            {
                "uniqueName": "SousFamille"
            },
            {
                "uniqueName": "Produit"
            },
            {
                "uniqueName": "Article"
            }
        ],
        "columns": [
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "ValeurCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (Dh)",
            },
            {
                "uniqueName": "ValeurLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Dh)",
            },
            {
                "uniqueName": "PoidsCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (kg)",
            },
            {
                "uniqueName": "PoidsLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Kg)",
            },
            {
                "uniqueName": "QS",
                "formula": "(sum(\"ValeurLivraison\")  / sum(\"ValeurCommande\") ) * 100",
                "caption": "QS (Valeur)",
                "format": "3bep0lb7"
            }
        ]
    },
    "options": {
        "grid": {
            "title": "Qualité de service / Catégorie",
            "showHeaders": false,
            "showGrandTotals": "columns",
            "showHierarchyCaptions": false
        },
        "showAggregationLabels": false
    },
    "formats": [
        {
            "name": "3bep0lb7",
            "thousandsSeparator": " ",
            "decimalSeparator": ".",
            "decimalPlaces": 2,
            "currencySymbol": "",
            "currencySymbolAlign": "left",
            "nullValue": "",
            "textAlign": "right",
            "isPercent": false
        }
    ]
                               },
                               
                });
  }
  
  loadfile('http://172.30.10.16:3000/op/report1?date1=20180101&date2=20181231');
  
                //WebDataRocks[ report ] = yourValue;
</script>

   
                  </div>
                <!-- end: .tray-center -->

                <!-- begin: .tray-right -->
                <aside class="tray tray-right tray290 va-t pn" data-tray-height="match">

                    <!-- menu quick links -->
                    <div class="p20 admin-form">

                        <h4 class="mt5 text-muted fw500"> Zone de recherche</h4>

                        <hr class="short">

                        <h6 class="fw400">Sales Date</h6>
                        <div class="section row">
                            <div class="col-md-6">
                                <label for="date1" class="field prepend-icon">
                                    <input type="text" name="date1" id="date1" class="gui-input" placeholder="01/01/15">
                                    <label for="date1" class="field-icon"><i class="fa fa-calendar"></i>
                                    </label>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="date2" class="field prepend-icon">
                                    <input type="text" name="date2" id="date2" class="gui-input" placeholder="01/31/15">
                                    <label for="date2" class="field-icon"><i class="fa fa-calendar"></i>
                                    </label>
                                </label>
                            </div>
                        </div>

                  
                        <hr class="short">

                        <div class="section row">
                            <div class="col-sm-12">
                                <button class="btn btn-default btn-sm ph25" onclick="loadfile('http://172.30.10.16:3000/op/report1');" type="button">Search</button>
                                <label class="field option ml15">
                                    <input type="checkbox" name="info">
                                    <span class="checkbox"></span> <span class="text-muted">Save Search</span>
                                </label>
                            </div>
                            <div class="col-sm-7 hidden">
                                <label class="field option mt10">
                                    <input type="checkbox" name="info" checked>
                                    <span class="checkbox"></span>Save Search
                                </label>
                            </div>
                        </div>

                    </div>

                </aside>
                <!-- end: .tray-right -->

            </section>
            <!-- End: Content -->

        </section>

        <!-- Start: Right Sidebar -->
        <aside id="sidebar_right" class="nano">
            <div class="sidebar_right_content nano-content">
                <div class="tab-block sidebar-block br-n">
                    <ul class="nav nav-tabs tabs-border nav-justified hidden">
                        <li class="active">
                            <a href="#sidebar-right-tab1" data-toggle="tab">Tab 1</a>
                        </li>
                        <li>
                            <a href="#sidebar-right-tab2" data-toggle="tab">Tab 2</a>
                        </li>
                        <li>
                            <a href="#sidebar-right-tab3" data-toggle="tab">Tab 3</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n">
                        <div id="sidebar-right-tab1" class="tab-pane active">

                            <h5 class="title-divider text-muted mb20"> Server Statistics <span class="pull-right"> 2013 <i class="fa fa-caret-down ml5"></i> </span> </h5>
                            <div class="progress mh5">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
                                    <span class="fs11">DB Request</span>
                                </div>
                            </div>
                            <div class="progress mh5">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
                                    <span class="fs11 text-left">Server Load</span>
                                </div>
                            </div>
                            <div class="progress mh5">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
                                    <span class="fs11 text-left">Server Connections</span>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
                            <div class="row">
                                <div class="col-xs-5">
                                    <h3 class="text-primary mn pl5">132</h3>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h3 class="text-success-dark mn"> <i class="fa fa-caret-up"></i> 13.2% </h3>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
                            <div class="row">
                                <div class="col-xs-5">
                                    <h3 class="text-primary mn pl5">212</h3>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h3 class="text-success-dark mn"> <i class="fa fa-caret-up"></i> 25.6% </h3>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
                            <div class="row">
                                <div class="col-xs-5">
                                    <h3 class="text-primary mn pl5">82.5</h3>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h3 class="text-danger mn"> <i class="fa fa-caret-down"></i> 17.9% </h3>
                                </div>
                            </div>

                            <h5 class="title-divider text-muted mt40 mb20"> Server Statistics <span class="pull-right text-primary fw600">USA</span> </h5>
                            <div id="sidebar-right-map" class="hide-jzoom" style="width: 100%; height: 180px;"></div>

                        </div>
                        <div id="sidebar-right-tab2" class="tab-pane"></div>
                        <div id="sidebar-right-tab3" class="tab-pane"></div>
                    </div>
                    <!-- end: .tab-content -->
                </div>
            </div>
        </aside>
        <!-- End: Right Sidebar -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->


    <style>
        #message-table > tbody > tr.highlight > td {
            background-color: #FFFEF0;
        }
    </style>
    
    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- FileUpload JS -->
    <script type="text/javascript" src="vendor/plugins/fileupload/fileupload.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/holder.min.js"></script>

    <!-- Tagmanager JS -->
    <script type="text/javascript" src="vendor/plugins/tagsinput/tagsinput.min.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/demo.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

            // grant file-upload preview onclick functionality
            $('.fileupload-preview').on('click', function() {
                $('.btn-file > input').click();
            });

            // select dropdowns - placeholder like creation
            var selectList = $('.admin-form select');
            selectList.each(function(i, e) {
                $(e).on('change', function() {
                    if ($(e).val() == "0") $(e).addClass("empty");
                    else $(e).removeClass("empty")
                });
            });
            selectList.each(function(i, e) {
                $(e).change();
            });

            // Init tagsinput plugin
            $("input#tagsinput").tagsinput({
                tagClass: function(item) {
                    return 'label bg-primary light';
                }
            });

        });
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
