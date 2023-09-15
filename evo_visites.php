<?php
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
                            <a href="#.html">OPTIMAREPORT</a>
                        </li>
                        <li class="crumb-icon">
                            <a href="#.html">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </li>
                        <li class="crumb-link">
                            <a href="#">Accueil</a>
                        </li>
                        <li class="crumb-trail">Evolution fact moy/secteur</li>
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
                            <div class="row" style="margin-bottom:10px !important">
                                <?php include "search.php" ?>
                                </div>
								
							  <div class="row">
								<div class="col-md-2" >
                                   
                                    <input type="text" name="date3" id="date3" class="datepicker  form-control" value="">
                                   				               
														 
                                </div>
								<div class="col-md-2" >
                                   
                                    <input type="text" name="date4" id="date4" class="datepicker  form-control" value="">
                                   				               
														 
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
  var nb_jours1=1;
  var nb_jours2=1;
  function loaddate()
  {
	  
	  
	  var d = new Date(new Date().setDate(new Date().getDate()-1));
	  
	  var dd = ("0"+d.getDate()).slice(-2);
var mm = ("0"+(d.getMonth()+1)).slice(-2);
var aa = d.getFullYear();

var c = dd+"/"+mm+"/"+aa ;

document.getElementById("date1").value = c;
document.getElementById("date2").value = c;
document.getElementById("date3").value = c;
document.getElementById("date4").value = c;
  }

  
  loaddate();
 
 
 function loadme(sup_id,ag_id , action ) {
	var DDU = document.getElementById("date1").value ;
	DDU = DDU.split('/');
	var date_du1 = DDU[2]+""+DDU[1]+""+DDU[0] ;
	

	var DAU = document.getElementById("date2").value ;
	DAU = DAU.split('/');
	var date_au1 = DAU[2]+""+DAU[1]+""+DAU[0] ;
	
	var date1 = new Date(DDU[2],DDU[1],DDU[0]);
	var date2 = new Date(DAU[2],DAU[1],DAU[0]);
	var timeDiff = Math.abs(date2.getTime() - date1.getTime());
	nb_jours1 = (Math.ceil(timeDiff / (1000 * 3600 * 24)))+1;
	
	var DDU = document.getElementById("date3").value ;
	DDU = DDU.split('/');
	var date_du2 = DDU[2]+""+DDU[1]+""+DDU[0] ;
	
	var DAU = document.getElementById("date4").value ;
	DAU = DAU.split('/');
	var date_au2 = DAU[2]+""+DAU[1]+""+DAU[0] ;
	
	
	date1 = new Date(DDU[2],DDU[1],DDU[0]);
	date2 = new Date(DAU[2],DAU[1],DAU[0]);
	timeDiff = Math.abs(date2.getTime() - date1.getTime());
	nb_jours2 = (Math.ceil(timeDiff / (1000 * 3600 * 24)))+1;

	
	
	var ch =  1

			   //var str = "?date1="+date_du+"&date2="+date_au;
			   
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
		  xhttp.open("POST", "acces15.php", true);
		  
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("date1="+date_du1+"&date2="+date_au1+"&ch="+ch+"&date3="+date_du2+"&date4="+date_au2+"&user_id="+sup_id+"&agency_id="+ag_id);
		  
		  /*exit the function:*/
		  return;
    
}
                
function loadfile(f) {
		
	function getJSONData() {
		
			data = $.parseJSON(f);
			
			var struct = {
		
				"Agence": {type : "string"},
				"Secteur": {type : "string"},
				"Ref": {type : "string"},
				"Client": {type : "string"},
				"partner_type": {type : "string"},
				"NB Factures 1": {type : "number"},
				"NB Factures 2": {type : "number"},
				"NB Clients 1": {type : "number"},
				"NB Clients 2": {type : "number"},
				"NB Jours 1": {type : "number"},
				"NB Jours 2": {type : "number"},
				
				"Diff": {type : "number"},
				
				

			}
			data.unshift(struct);
			
			for (var i= 0; i < data.length; i++) {
				
					/* if (data[i].Famille != "Lait Frais") {
						data[i]['Mt Chargement H.L'] = data[i]['Mt Chargement'];
						data[i]['Mt Invendu H.L'] = data[i]['Mt Invendu'];
					} else {
						data[i]['CA Lait'] = data[i]['Mt Brut'];
					} */
					
					data[i]['NB Factures 1'] = data[i]['NB Factures 1'] / nb_jours1;
					data[i]['NB Factures 2'] = data[i]['NB Factures 2'] / nb_jours2;
					
					
					
					data[i]['Diff'] = data[i]['NB Factures 2']- data[i]['NB Factures 1'];
					
					
					 
			}
			
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
                "uniqueName": "Agence"
            },
            {
                "uniqueName": "Secteur"
            }
        ],
        "rows": [
			{
                "uniqueName": "Ref"
            },
            {
                "uniqueName": "Client"
            },
			{
                "uniqueName": "partner_type",
				"caption": "typologie",
            }
        ],
        "columns": [
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "NB Jours 1",
                "aggregation": "sum"
            },
            {
                "uniqueName": "NB Jours 2",
                "aggregation": "sum"
            },
            {
                "uniqueName": "TX1",
                "formula": "sum(\"NB Jours 1\")",
                "caption": "NB1",
                "active": false,
                "format": "3dhvqfuq"
            },
            {
                "uniqueName": "TX2",
                "formula": "sum(\"NB Jours 1\")",
                "caption": "NB2",
                "active": false,
                "format": "3dhvqfuq"
            }
        ],
        "expands": {
            "expandAll": true
        },
        "flatOrder": [
            "Ref",
            "Client"
        ]
    },
    "options": {
        "grid": {
            "type": "classic",
            "title": "Comparatif clients",
            "showHeaders": false,
            "showTotals": "off"
        },
        "showAggregationLabels": false
    },
    "formats": [
        {
            "name": "3dhvqfuq",
            "thousandsSeparator": " ",
            "decimalSeparator": ".",
            "decimalPlaces": 1,
            "currencySymbol": "",
            "currencySymbolAlign": "left",
            "nullValue": "",
            "textAlign": "right",
            "isPercent": false
        },
        {
            "name": "3dhvwiax",
            "thousandsSeparator": " ",
            "decimalSeparator": ".",
            "decimalPlaces": 0,
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
	