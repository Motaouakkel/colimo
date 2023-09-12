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

		  <link href="webdatarocks.css" rel="stylesheet" />
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
<?php include 'externe.php';?>
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
                            <a href="#">VENTILATION VENTES PRODUITS PAR TYPE CLIENTS</a>
                        </li>
                    </ol>
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
							<div class="row" style="margin-top:10px !important;">
								<div class="col-md-6" >
								
												<SPAN class="radio-custom mb5" >
                                                        <input type="radio" id="radioExample0" name="radioMeasure" value="0" checked="checked">
                                                        <label for="radioExample0" style="margin-top:6px !important;margin-left:5px !important">Vente Qte</label>
                                                </span>
                                                
												<span class="radio-custom radio-primary mb5" >
                                                        <input type="radio" id="radioExample1" name="radioMeasure" value="1">
                                                        <label for="radioExample1" style="margin-top:6px !important;margin-left:5px !important">Vente Val</label>
                                                </span>
												
												<SPAN class="radio-custom mb5" >
                                                        <input type="radio" id="radioExample2" name="radioMeasure" value="2">
                                                        <label for="radioExample2" style="margin-top:6px !important;margin-left:5px !important">Perte Qte</label>
                                                </span>
												
												<SPAN class="radio-custom mb5" >
                                                        <input type="radio" id="radioExample3" name="radioMeasure" value="3">
                                                        <label for="radioExample3" style="margin-top:6px !important;margin-left:5px !important">Perte Val</label>
                                                </span>
										  
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

var pivot1;
var rows_nb=0;
var cols_nb=0;
var nb_jours = 0;
  
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
 
 
 function loadme(sup_id,ag_id , action) {
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
//console.log(nb_jours);

var ch =  1

	       var str = "?date1="+date_du+"&date2="+date_au;
  
  
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
			
		loadfile(this.response);
                     
        }
      }      
     xhttp.open("POST", "acces3.php", true);
	  
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("date1="+date_du+"&date2="+date_au+"&user_id="+sup_id+"&agency_id="+ag_id);
      
      /*exit the function:*/
      return;
    
  }
                			 function loadfile(f) {
		
function getJSONData() {
	
		const vit = ['B', 'C', 'D'];
		data = $.parseJSON(f);
		
		var struct = {
				"Agence": {type : "string"},
				"Secteur": {type : "string"},
				"Date": {type : "string"},
				"Heure": {type : "string"},
				"Scan": {type : "number"},
				"Réf": {type : "string"},
				"Client": {type : "string"},
				"Tranche": {type : "string"},
				"Cat": {type : "string"},
				"Typologie": {type : "string"},
				"NumFacture": {type : "string"},
				"Tél": {type : "string"},
				"Sec_Time": {type : "time"},
				"Produit": {type : "string"},
				"Vente": {type : "number"},
				"VNT": {type : "number"},
				"NB": {type : "number"},
				"Perte": {type : "number"},
				"C1": {type : "number"},
				"C2": {type : "number"},
				"Type": {type : "string"},
				"Mt Remise": {type : "number"},
				"Prix": {type : "number"},
				"CA": {type : "number"},
				"MtPerte": {type : "number"}
			}
			data.unshift(struct);
			
		for (var i= 1; i < data.length; i++) {
				
				
				data[i].NBJ = nb_jours;
				
				data[i].CA = ( data[i].Vente * data[i].Prix );
				data[i].MtPerte = ( data[i].Perte * data[i].Prix );
				
				if (vit.includes(data[i].Cat)) {
					data[i].Type = 'Clients Vitrine';
				} else {
					data[i].Type = 'Autres';
				}
				 
			}
			
		return data;
		
	};
	
	pivot1 = new WebDataRocks({
		container: "#wdr-component",
		toolbar: true,
		customizeCell: customizeCellFunction,
		beforetoolbarcreated: customizeToolbar,
		height: '100%',
		report: {
			dataSource: {
				"data": getJSONData()
			},
			"slice": {
        "reportFilters": [
			{
                "uniqueName": "Secteur"
            }
        ],
        "rows": [
            {
                "uniqueName": "Produit"
            }
        ],
        "columns": [
            {
                "uniqueName": "Type"
            },
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "NbClients",
                "formula": "distinctcount(\"Réf\") ",
                "caption": "NbClients"
            },
            {
                "uniqueName": "Vente",
                "aggregation": "sum"
            },
            {
                "uniqueName": "VenteMoy",
                "formula": "sum(\"Vente\")  / distinctcount(\"Réf\") ",
                "caption": "Vente Moy",
                "format": "422hu25f"
            }
        ],
        "expands": {
            "expandAll": true
        },
        "flatOrder": [
            "Réf",
            "Client",
            "Typologie",
            "Mt Remise"
        ]
    },
    "options": {
        "grid": {
            "type": "classic",
            "title": "VENTILATION VENTES PRODUITS PAR TYPE CLIENTS",
            "showHeaders": false,
            "showTotals": "off",
            "showGrandTotals": "off"
        },
        "showAggregationLabels": false
    },
    "conditions": [
    ],
    "formats": [
        {
            "name": "422hu25f",
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
		reportcomplete: function() {
			pivot1.off("reportcomplete");
			
			//calcul_cumul();
			
		}	
	});
	
	function calcul_cumul() {
			
			//var cur_val1 = 0;
			//var cur_val2 = 0;
			//console.log(rows_nb);
			//cols_nb = pivot1.getMeasures().length;
			//for (i=1;i<=rows_nb;i++) {
				
			//	for (x=1;x<=cols_nb;x++) {
			//		if (x=4) {
			//			cur_val1 += pivot1.getCell(i,x).value;
			//		}
					
			//	}
				//cur_val1 += pivot1.getCell(i,4).value;
				//$("div[data-c=5][data-r="+i+"]").html(cur_val1.toFixed(0) + "%");
				
				//cur_val2 += pivot1.getCell(i,6).value;
				//$("div[data-c=7][data-r="+i+"]").html(cur_val2.toFixed(0) + "%");
			//	console.log(cur_val1);
			//	$("div[data-c="+(cols_nb+3)+"][data-r="+i+"]").html(cur_val1);
				
			//}
			
			//$("div[data-c=5][data-r="+(rows_nb+1)+"]").html("");
			//$("div[data-c=7][data-r="+(rows_nb+1)+"]").html("");
	};
	
	webdatarocks.on('reportchange', function() {
		setTimeout(function() { calcul_cumul() }, 1000);
	});
	
	}
    
		
	function customizeCellFunction(cellBuilder, cellData) {
	  	//console.log(cellData);
		if (cellData.isTotalRow == true ) {
			
			rows_nb = (cellData.rowIndex-1);
		}
		
		if (cellData.columnIndex == 4) {
			//cellBuilder.addClass("masq");
		} else {
			//cellBuilder.addClass("masq");
		}
	
	if (
     cellData.hierarchy &&
      cellData.hierarchy.uniqueName == "Réf"
    )
	{
		cellBuilder.text = '<a  href="#" class="pl5" value="Réf" style="color:#fff;text-decoration:underline" onclick="test(this);" id ="link">Réf</a>'.replace(/Réf/g, cellData.label);	
	}
	}
	
	function customizeToolbar(toolbar) {
        var tabs = toolbar.getTabs(); // get all tabs from the toolbar
        toolbar.getTabs = function () {
            delete tabs[1];
            delete tabs[0];// delete the first tab
            return tabs;
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
                "uniqueName": "NbClients",
                "formula": "distinctcount(\"Réf\") ",
                "caption": "Nb Clients"
            },
            {
                "uniqueName": "Vente",
                "aggregation": "sum"
            },
            {
                "uniqueName": "VenteMoy",
                "formula": "sum(\"Vente\")  / distinctcount(\"Réf\") ",
                "caption": "Vente Moy",
                "format": "422hu25f"
            }]
			}
	   if (m == '1') {
			 m1= [ {
                "uniqueName": "NbClients",
                "formula": "distinctcount(\"Réf\") ",
                "caption": "Nb Clients"
            },
            {
                "uniqueName": "CA",
				"formula": "sum(\"CA\")",
                "caption": "CA",
                "aggregation": "sum"
            },
            {
                "uniqueName": "CAMoy",
                "formula": "sum(\"CA\") / distinctcount(\"Réf\") ",
                "caption": "CA Moy",
                "format": "422hu25f"
            }]
			}
		
		if (m == '2') {
			  m1= [ {
                "uniqueName": "NbClients",
                "formula": "distinctcount(\"Réf\") ",
                "caption": "Nb Clients"
            },
            {
                "uniqueName": "Perte",
				"formula": "sum(\"Perte\")",
                "caption": "CA",
                "aggregation": "sum"
            },
            {
                "uniqueName": "PerteVal",
                "formula": "sum(\"Perte\") / distinctcount(\"Réf\") ",
                "caption": "Perte Moy",
                "format": "422hu25f"
            }]
		}
		if (m == '3') {
			  m1= [{
                "uniqueName": "NbClients",
                "formula": "distinctcount(\"Réf\") ",
                "caption": "Nb Clients"
            },
            {
                "uniqueName": "MtPerte",
				"formula": "sum(\"MtPerte\")",
                "caption": "CA",
                "aggregation": "sum"
            },
            {
                "uniqueName": "PerteMoy",
                "formula": "sum(\"MtPerte\") / distinctcount(\"Réf\") ",
                "caption": "Mt Perte Moy",
                "format": "422hu25f"
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
 <script>
    $(document).ready(function () {
        $('input:radio[name=radioMeasure]').change(function() {
			if (this.value == '0') {
				setReport(0);
			}
			if (this.value == '1') {
				setReport(1);
			}
			if (this.value == '2') {
				setReport(2);
			}
			if (this.value == '3') {
				setReport(3);
			}
		});
    });
	
</script>
		

	

</body>

</html>
	