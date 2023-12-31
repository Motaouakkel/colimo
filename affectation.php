<?php
    session_start();
	
    
    
	
	
	
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
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
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

<body class="dashboard-page sb-l-o sb-r-c">

   
    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <!-- End: Header -->

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
                        <span><?php echo $_SESSION['fname_u'] .".". $_SESSION['lname_u']?></span>
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
<?php include 'sidebar_left.php';?>
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

           
            <!-- Start: Topbar -->
            <header id="topbar" class="wdr-ui-element">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a href="#.html">Dashboard</a>
                        </li>
                        <li class="crumb-icon">
                            <a href="#.html">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </li>
                        <li class="crumb-link">
                            <a href="#">Accueil</a>
                        </li>
                        <li class="crumb-trail">Factures</li>
                    </ol>
                </div>
             <div class="topbar-right">
                      
				
					  
					           
                             
                   
                </div>
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">

                

                <!-- Admin-panels -->
                <div class="admin-panels fade-onload sb-l-o-full">

                    <!-- full width widgets -->
                    <div class="row">
					
							  <div class="panel">
                        <div class="panel-menu p12 admin-form theme-primary">
                            <div class="row">
                                <div class="col-md-3">
                                   <label for="date1" class="field prepend-icon">
                                                                    <input type="text" name="date1" id="date1" class="datepicker form-control" value="">
                                                                    </label>
                                </div>
                                <div class="col-md-3" >
                                   
                                    <input type="text" name="date2" id="date2" class="datepicker  form-control" value="">
                                   				               
														 
                                </div>
                                <div class="col-md-3">
                                    <label class="field select">
                                        <select id="filter-customer" name="filter-customer">
                                            <option value="0">Secteur</option>
                                            <option value="1">Kasbah taher</option>
                                            <option value="2">LEMZAR</option>
                                            <option value="3">MASSIRA</option>
                                            <option value="4">KABBAJ</option>
                                        </select>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>
								<div class="col-md-3">
                                      <a type="submit" href = "#" onclick="loadme('acces7.php');" class="button btn-primary submit-btn">Consulter</a>
                                                           
                                </div>
                            </div>
                        </div>
                        <div class="panel-body pn">
                          	
					<div class="ml15 ib va-m" id="toggle_sidemenu_r">
                        <a href="#" id="aCliquer"> 
                        </a>
                    </div>
<div id="wdr-component"></div>
                </div>
                </div>


<script>
  
   function loaddate()
  {
	  
	  
	  var d = new Date(new Date().setDate(new Date().getDate()-1));
	  
	  var dd = ("0"+d.getDate()).slice(-2);
var mm = ("0"+(d.getMonth()+1)).slice(-2);
var aa = d.getFullYear();

var c = dd+"/"+mm+"/"+aa ;

document.getElementById("date1").value = c;
document.getElementById("date2").value = c;
  }

  
  loaddate();
 
 
  function loadme(link) {
var DDU = document.getElementById("date1").value ;
DDU = DDU.split('/');


var date_du = DDU[2]+""+DDU[1]+""+DDU[0] ;

var DAU = document.getElementById("date2").value ;
DAU = DAU.split('/');


var date_au = DAU[2]+""+DAU[1]+""+DAU[0] ;

var date1 = new Date(DDU[2],DDU[1],DDU[0]);
var date2 = new Date(DAU[2],DAU[1],DAU[0]);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
nb_jours = (Math.ceil(timeDiff / (1000 * 3600 * 24)))+1; 

var ch =  1

	       var str = "?date1="+date_du+"&date2="+date_au;
		   
		   
		   xhr = new XMLHttpRequest();
		xhr.open("POST", "log.php", true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var select1 = document.getElementById('filter-customer');
		var text1 = select1.options[select1.selectedIndex].text;
		var select2 = document.getElementById('f-customer');
		var text2 = select2.options[select2.selectedIndex].text;
		xhr.send("description="+ document.getElementById("date1").value + ' -> ' + document.getElementById("date1").value + ' ,filtres : ' + text1 + ',' + text2 + "&action_name="+'Indicateurs de performance/Période');
		
  
  
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
			
		loadfile(this.response);
                     
        }
      }      
      xhttp.open("POST", link, true);
	  
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send("date1="+date_du+"&date2="+date_au+"&ch="+ch);
      
      /*exit the function:*/
      return;
    
  }
                			 function loadfile(f) {
		
function getJSONData() {
	
		data = $.parseJSON(f);
		 
			
		var struct = {
			"Agence": {type : "string"},
			"Secteur": {type : "string"},
			"Date": {type : "string"},
			"Fonction": {type : "string"},
			"Matricule": {type : "string"},
			"Nom": {type : "string"},
		}
		
		data.unshift(struct);
			
		//for (var i= 1; i < data.length; i++) {
			
			//data[i].NB = 1;
			//data[i].C1 = 0;
			//data[i].C2= 0;
			//data[i].NBJ = nb_jours;
			//data[i].CA_BRUT = data[i].CA + data[i].Remise;
			 
		//}
			//console.log(data);
		return data;
	};
	
	var pivot1 = new WebDataRocks({
		container: "#wdr-component",
		beforetoolbarcreated: customizeToolbar,
		toolbar: true,
		report: {
			dataSource: {
				"data": getJSONData()
			},
			"slice": {
		"reportFilters": [
            {
                "uniqueName": "Fonction",
                "filter": {
                    "members": [
                        "Fonction.VENDEUR"
                    ]
                }
            }
        ],
        "rows": [
            {
                "uniqueName": "Secteur"
            },
            {
                "uniqueName": "Nom"
            }
        ],
        "columns": [
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "Matricule",
                "aggregation": "count",
                "availableAggregations": [
                    "count",
                    "distinctcount"
                ]
            },
            {
                "uniqueName": "NBMatricule",
                "formula": "distinctcount(\"Matricule\") ",
                "caption": "Nb Perso",
                "active": false
            }
        ]
    },
    "options": {
        "grid": {
            "title": "Affectation vendeurs",
            "showHeaders": false,
            "showGrandTotals": "off",
			"showTotals": "off",
            "showHierarchyCaptions": false,
			"type": "classic"
        },
        "showAggregationLabels": false
    },
    "formats": [
        {
            "name": "3dhvqfuq",
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
	
	function customizeToolbar(toolbar) {
        var tabs = toolbar.getTabs(); // get all tabs from the toolbar
        toolbar.getTabs = function () {
            delete tabs[1];
            delete tabs[0];// delete the first tab
            return tabs;
        }
    }
	
	}
                
      
   loadme('acces7.php');
  
                //WebDataRocks[ report ] = yourValue;
</script>

        
                    </div>
                    <!-- end: .row -->

                    <!-- partial width widgets -->
      
            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

        <!-- Start: Right Sidebar -->
        <aside id="sidebar_right" class="nano">
            <div class="sidebar_right_content nano-content">
                <div class="tab-block sidebar-block br-n">
                    <ul class="nav nav-tabs tabs-border nav-justified hidden">
                        
                    </ul>
                    <div class="tab-content br-n">
                        <div id="sidebar-right-tab1" class="tab-pane active">


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

    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Sparklines CDN -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>

    <!-- Chart Plugins -->
    <script type="text/javascript" src="vendor/plugins/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="vendor/plugins/circles/circles.js"></script>
    <script type="text/javascript" src="vendor/plugins/raphael/raphael.js"></script>

    <!-- Holder js  -->
    <script type="text/javascript" src="assets/js/bootstrap/holder.min.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/demo.js"></script>

    <!-- Admin Panels  -->
	
	
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/json2.js"></script>
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript" src="assets/js/pages/widgets.js"></script>
    <script type="text/javascript" src="js1.js"></script>
   

    <!-- END: PAGE SCRIPTS -->
 <script type="text/javascript">
			//$("#wdr-tab-fullscreen").hide();
		</script> 
		

	

</body>

</html>
	