<?php
require_once 'function.php';
    session_start();
	if(!isset($_SESSION['auth']) or $_SESSION['auth']!='yes' or empty($_SESSION['auth'])) {
	  echo "<script language='javascript'>window.location.href='login.php';</script>";
	  exit;
	}
	
	
	
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
                        <li class="crumb-trail">HISTORIQUE  GPS CLIENTS</li>
                    </ol>
                </div>
            <div class="topbar-right">
                <span class="label label-rounded label-default" style="background-color:#99ff66 !important" ></span><span style="background-color:#99ff66 !important;color:#000000 !important" class="label label-default">GPS CONFORME</span>
		<span class="label label-rounded label-primary" style="background-color:#ffccff !important"></span><span style="background-color:#ffccff !important;color:#000000 !important" class="label label-primary">GPS NON CONFORME</span>
		<span class="label label-rounded label-success" style="background-color:#4FC3F7 !important"></span><span  style="background-color:#4FC3F7 !important;color:#000000 !important" class="label label-success">CLIENT FERME</span>
		<span class="label label-rounded label-danger" style="background-color:#ffff00 !important"></span><span style="background-color:#ffff00 !important;color:#000000 !important" class="label label-danger">CLIENT NON VISITE</span>
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
                               <?php include "search.php" ?>
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
 
 
 function loadme(sup_id,ag_id) {
var DAU = document.getElementById("date1").value ;
DAU = DAU.split('/');


var date_du = DAU[2]+""+DAU[1]+""+DAU[0] ;

var DAU = document.getElementById("date2").value ;
DAU = DAU.split('/');


var date_au = DAU[2]+""+DAU[1]+""+DAU[0] ;

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
      xhttp.open("POST", "acces2horaire.php", true);
	  
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("date1="+date_du+"&date2="+date_au+"&user_id="+sup_id+"&agency_id="+ag_id);
      
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
				"inv_Lat": {type : "string"},
				"inv_Long": {type : "string"},
				"part_long": {type : "string"},
				"part_lat": {type : "string"},
				"Heure": {type : "numbers"},
				"CA": {type : "number"},
				"Scan": {type : "string"},
				"Réf": {type : "string"},
				"Client": {type : "string"},
				"Cat": {type : "string"},
				"Typologie": {type : "string"},
				"NumFacture": {type : "string"},
				"Tél": {type : "string"},
				"Sec_Time": {type : "time"},
				"Sec_Scan": {type : "time"},
				"Duree": {type : "time"},
				"Heure": {type : "time"},
				"distance": {type : "number"},
				"positionclient": {type : "string"},
				"scanclient": {type : "number"},
				"status_viste": {type : "number"}
			}
			data.unshift(struct);
			
			
			for (var i= 1; i < data.length; i++) {
				
					
					data[i].positionclient = (data[i].part_lat +","+ data[i].part_long);
					
					//data[i].VNT = data[i].Vente;
				if ((data[i].distance < 15 && data[i].distance > 1  ) && (data[i].status_viste == 'VENTE')) {
					data[i].scanclient = 0;
					} 
				if ((data[i].distance > 15  ) && (data[i].status_viste == 'VENTE')) {
					data[i].scanclient = 1;
					} 
				if (data[i].status_viste < 'CLIENT FERME' ){
					data[i].scanclient = 2;
					} 
				if (data[i].status_viste == 'null' ){
					data[i].scanclient = 3;
					} 
				if (data[i].status_viste == '' ){
					data[i].scanclient = 3;
					} 
				
					 
			}
			
			return data;
			
		};
		
		var pivot1 = new WebDataRocks({
			container: "#wdr-component",
			customizeCell: customizeCellFunction,
			beforetoolbarcreated: customizeToolbar,
			toolbar: true,
			height: "100%",
			report: {
				dataSource: {
					"data": getJSONData()
				},
				"slice": {
					"reportFilters": [
						{
							"uniqueName": "Secteur"
						},
					],
					"rows": [
						{
							"uniqueName": "Réf"
						},
						{
							"uniqueName": "Client"
						},
						{
							"uniqueName": "Typologie"
						},
						{
							"uniqueName": "Secteur",
							"caption": "Secteur"
						},
						{
							"uniqueName": "positionclient",
							"caption": "GPS CLIENT"
						}
					],
					"columns": [
						{
							"uniqueName": "Date"
						},
						{
							"uniqueName": "Measures"
						}
					],
					"measures": [
						{
							"uniqueName": "scanclient",
							"aggregation": "min",
							"caption": "Scan Client"
						}
					],
					"sorting": {
						
					},
					"expands": {
						"expandAll": true,
					},
					"flatOrder": [
						"Ref",
						"Client",
						"Typologie"
					]
				},
		"options": {
			"grid": {
				"type": "classic",
				"title": "HISTORIQUE  GPS CLIENTS",
				"showHeaders": false,
				"showTotals": "columns",
				"showGrandTotals": "columns"
			},
			"showAggregationLabels": false
		},
		"conditions": [
        {
                "formula": "#value == 0",
                "measure": "scanclient",
                "format": {
                    "backgroundColor": "#99ff66",
                    "color": "#99ff66",
                    "fontFamily": "Arial",
                    "fontSize": "16px"
                }
        },
		{
            "formula": "#value == 1",
            "measure": "scanclient",
            "format": {
                "backgroundColor": "#ffccff",
		"color": "#ffccff",
                "fontFamily": "Arial",
                "fontSize": "16px"
            }
        },
			{
            "formula": "#value == 2",
            "measure": "scanclient",
            "format": {
                "backgroundColor": "#4FC3F7",
		"color": "#ffff00",
                "fontFamily": "Arial",
                "fontSize": "16px"
            }
        },
			{
            "formula": "#value == 3",
            "measure": "scanclient",
            "format": {
                "backgroundColor": "#ffff00",
		"color": "#ffff00",
                "fontFamily": "Arial",
                "fontSize": "16px"
            }
        },
			{
            "formula": "isNaN(#value)",
            "measure": "scanclient",
            "format": {
                "backgroundColor": "#ffff00",
		"color": "#ffff00",
                "fontFamily": "Arial",
                "fontSize": "16px"
            }}
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
	
		function customizeCellFunction(cellBuilder, cellData) {
		let a = 1;
		if (
     cellData.hierarchy &&
      cellData.hierarchy.uniqueName == "positionclient"
    )
	{
		cellBuilder.text = '<a  href="https://www.google.com/maps/@'+cellData.label+'" target="_blank" class="pl5" value="Réf" style="color:#fff;text-decoration:underline"  id ="link">Réf</a>'.replace(/Réf/g, cellData.label);	
	}
    
	}
	
	
	}
                
      
  
                //WebDataRocks[ report ] = yourValue;
</script>
<script>
   function setReport(m) {
	   var m1;
	   //console.log(m);
	   if (m == '0') {
			 m1= [ {
              	"uniqueName": "Sec_Time",
				"aggregation": "min",
				"caption": "H Livraison"
            }]
			}
	   if (m == '1') {
			 m1= [ {

				"uniqueName": "Formatheure",
				"aggregation": "min",
				"caption": "Htest"
            }]
			}

		
       
	  
       var report = pivot1.getReport();
	   report.slice.measures = m1;
	   pivot1.setReport(report);
   }

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
	
	<?php include 'aside.php';?>

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
		

	 <script>
    $(document).ready(function () {
        $('input:radio[name=radioMeasure]').change(function() {
			if (this.value == '0') {
				setReport(0);
			}
			if (this.value == '1') {
				setReport(1);
			}
			
		});
    });
	
</script>

</body>

</html>
	
