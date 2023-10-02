<?php
$page_title = "TOP RATIO LP PAR TOURNEE";
$api_action = "topratiolp";
include 'header.php';

?>

<body class="dashboard-page sb-l-o sb-r-c">

    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
        <!-- End: Header -->
        <?php include 'sidebar_left.php'; ?>
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">
            <?php include 'bread_crumbs.php'; ?>
            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">
                <!-- Admin-panels -->
                <div class="admin-panels fade-onload sb-l-o-full">
                    <!-- full width widgets -->
                    <div class="row">
                        <div class="panel">
                            <div class="panel-menu p12 admin-form theme-primary">
                                <div class="row">
                                    <?php include 'search_2_dates.php' ?>
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
                            function loadfile(f) {
                                function getJSONData() {
                                    data = $.parseJSON(f);
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "ratio": {
                                            type: "number"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        
                                        
                                    }
                                    data.unshift(struct);
                                    return data;
                                    /*
                                    1,5-1,75%
: 
0
1,25-1,50%
: 
1
1,75-2%
: 
0
75-100
: 
0
100-125
: 
0
125-150
: 
0
<1,25%
: 
0
<75
: 
1
>2%
: 
0
>150
: 
0
Agence
: 
"OUJDA"
CA
: 
3796.128333333333
Pertes
: 
48.13500000000002
Secteur
: 
"1235"
                                    */ 
                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    beforetoolbarcreated: customizeToolbar,
                                    customizeCell: customizeCellFunction,
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [],
                                            "rows": [{
                                                    "uniqueName": "Secteur"
                                                }
                                                

                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [
                                                {
                                                "uniqueName": "ratio",
                                                "caption": "RATIO LP %",
                                                "format": "percent",
                                                
                                            },
                                           
                                            
                                         ],
                                            "expands": {
                                                "expandAll": true,
                                            }
                                        },
                                        "options": {
                                            "grid": {
                                                "type": "classic",
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": true,
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                                "name": "3dhvqfuq",
                                                "thousandsSeparator": " ",
                                                "decimalSeparator": ".",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "",
                                                "currencySymbolAlign": "left",
                                                "nullValue": "",
                                                "textAlign": "right",
                                                "isPercent": false
                                            },
                                            {
                                                "name": "precision",
                                                "decimalPlaces": 2,

                                            },{
                                                "name": "percent",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "%",
                                                

                                            }, {
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

                                function customizeCellFunction(cell, data) {
                                    let a = 1;
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "GLOBAL";
                                    }
                                }

                                function customizeToolbar(toolbar) {
                                    var tabs = toolbar.getTabs(); // get all tabs from the toolbar
                                    toolbar.getTabs = function() {
                                        delete tabs[1];
                                        delete tabs[0]; // delete the first tab
                                        return tabs;
                                    }
                                }

                            }

                            //WebDataRocks[ report ] = yourValue;

                            loaddate();
                        </script>


                    </div>
                    <!-- end: .row -->

                    <!-- partial width widgets -->

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

        <?php include 'sidebar_right.php'; ?>
    </div>
    <!-- End: Main -->




</body>
<!-- Start: header -->
<?php include 'footer.php'; ?>
<!-- Start: header -->

</html>