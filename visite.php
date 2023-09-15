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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

	
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="datatables.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- Admin Panels CSS -->
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-plugins/admin-panels/adminpanels.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
	
  <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

    <!-- Datatables Editor CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css">

  
	

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
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
                            <a href="#">Taux de pénétrataion Remise</a>
                        </li>
                    </ol>
                </div>
             <div class="topbar-right">
                      
			<span class="label label-rounded label-default">A</span><span class="label label-default">MDF CLIENTS + OPERATEURS</span>
				<span class="label label-rounded label-primary">B</span><span class="label label-primary">MDF OPERATEURS + SILDA</span>
				<span class="label label-rounded label-success">C</span><span class="label label-success">SILDA SEUL</span>
				<span class="label label-rounded label-danger">D</span><span class="label label-danger">SILDA + CLIENT</span><br/>
				<span class="label label-rounded label-system">E</span><span class="label label-system">LOCAL 2P SEUL</span>
				
				<span class="label label-rounded label-warning">F</span><span class="label label-warning">LOCAL 1 P SEUL </span>
				<span class="label label-rounded label-alert">G</span><span class="label label-alert">COMPTOIRE SEUL</span>
                   
                             
                   
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
                                      <a type="submit" href = "#" onclick="loadme('visite_ws.php');" class="button btn-primary submit-btn">Consulter</a>
                                                           
                                </div>
                            </div>
                        </div>
                        <div class="panel-body pn">
                          	
					<div class="ml15 ib va-m" id="toggle_sidemenu_r">
                        <a href="#" id="aCliquer"> 
                        </a>
                    </div>
  <div class="col-md-12">
                               
<table id="example" class="display" width="100%" style="font-size:11px !important"></table>            
                
                        </div>
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
  
  
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
			
			
		var b = JSON.parse(this.response);
		
		
			var dataSet1 = b;

	
	var dataSet = [
    [ "-", "-", "-", "-", "-", "-" ]
];

		for (var i=0, len=dataSet1.length; i<len; i++) {
		dataSet.push(dataSet1[i]);
		}
		
		console.log(dataSet);
 
 
		$(document).ready(function() {
    $('#example').DataTable( {
		"language": {
                "url": "french.json"
            },
        data: dataSet,
		destroy: true,
		 paging: true,
		searching: true,
		"lengthMenu": [ [100,-1], [100, "Tout"] ],
        columns: [
            { title: "Agence" },
            { title: "Secteur" },
            { title: "Date" },
            { title: "Heure" },
            { title: "Motif" },
            { title: "Client" }
        ]
		
	} );
} );
                     
        }
      }      
      xhttp.open("POST", link, true);
	  
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send("date1="+date_du+"&date2="+date_au+"&ch="+ch);
      
      /*exit the function:*/
      return;
    
  }

     loadme('visite_ws.php');


 
 
 
  
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
		

    <!-- Datatables -->
    <script type="text/javascript" src="vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

    <!-- Datatables Tabletools addon -->
    <script type="text/javascript" src="vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

    <!-- Datatables Editor addon - READ LICENSING NOT MIT  -->
    <script type="text/javascript" src="vendor/plugins/datatables/extensions/Editor/js/dataTables.editor.js"></script>
	
  <!-- Datatables Bootstrap Modifications  -->
    <script type="text/javascript" src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="vendor/plugins/datatables/extensions/Editor/js/editor.bootstrap.js"></script>

</body>

</html>
	