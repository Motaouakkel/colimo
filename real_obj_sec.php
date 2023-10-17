<?php
$page_title = "TAUX REALISATION OBJECTIFS VENTES NETTES AGENCES	DH TTC";
$api_action = "salesgoal";
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
                                var test = ""

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var struct = {
                                        "agency": {
                                            type: "string"
                                        },
                                        "bloc":{
                                            type : "string"
                                        },
                                        "sector": {
                                            type: "string"
                                        },
                                        "goal":{
                                            type: "number"
                                        },
                                        "taxed_amount":{
                                            type: "number"
                                        },
                                                        
                                    }
                                    
                                    data.unshift(struct);
                                    return data;
                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                   // beforetoolbarcreated: customizeToolbar,
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        
                                        "slice": {
                                            "reportFilters": [
                                                {
                                                "uniqueName": "agency",
                                                "caption": "AGENCE"
                                            },
                                            {
                                                "uniqueName": "sector",
                                                "caption": "SECTEUR"

                                            }
                                            ],
                                            "rows": [{
                                                "uniqueName": "agency",
                                                "caption": "AGENCE"
                                            },
                                            {
                                                "uniqueName": "bloc",
                                                "caption": "BLOC"

                                            },
                                            {
                                                "uniqueName": "sector",
                                                "caption": "SECTEUR"

                                            }
                                        ],
                                            "columns": [
                                                {
                                                    "uniqueName": "Measures",
                                                }
                                            ],

                                            "measures": [
                                                {
                                                    "uniqueName": "goal",
                                                    "caption": "OBJECTIF",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "taxed_amount",
                                                    "caption": "REALISATION",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                
                                                {
                                                    "uniqueName": "percent",
                                                    "caption": "%",
                                                    "formula": "100*(sum('taxed_amount'))/sum('goal'))",
                                                    "format": "precentForamt"
                                                },
                                                {
                                                    "uniqueName": "amount_3",
                                                    "caption": "RESTE A FAIRE MOIS",
                                                    "format": "precision",
                                                    "formula": "sum('goal') -sum('taxed_amount')"
                                                }
                                            ],
                                            "expands": {
                                            "expandAll": true,
                                        },

                                        },
                                        
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?> " ,
                                                "showHeaders": false,
                                                "type": "classic",
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            "currencySymbol": "%",
                                            "currencySymbolAlign": "right"
                                        },{
                                            "name": "precision",
                                            "decimalPlaces": 2,
                                            
                                        }]
                                    },

                                });
                                
                                // pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                //     if (data.isGrandTotal && data.columnIndex == 0) {
                                //         cell.text = "Total";
                                //     }
                                // });
                                // var i = false;
                                // if(i == false){
                                //     i = true
                                // previosFilter = []
                                // pivot1.on("reportcomplete", function() {
                                //     previosFilter = pivot1.getFilter("canal");
                                    
                                    
                                //     pivot1.on("reportchange", function() {
                                //         if (compare_filters(previosFilter, filterValue)) {
                                //             console.log("filter not changed")
                                //             return;
                                //         }
                                //         var filterValue = pivot1.getFilter("canal");
                                       
                                //             var currentConfig = pivot1.getReport();
                                //             console.log(currentConfig)
                                            
                                //         headerValue = "EVOLUTION AGENCES CANAL "
                                //         if (filterValue.length === 1) {
                                //             headerValue = headerValue +  filterValue[0].caption;
                                //         } else if (filterValue.length === 2) {
                                //             headerValue = headerValue + filterValue[0].caption + " + " + filterValue[1].caption;
                                //         }
                                //         else if (filterValue.length === 3) {
                                //             headerValue = headerValue + filterValue[0].caption + " + " + filterValue[1].caption + " + " + filterValue[2].caption;
                                //         }
                                //         currentConfig.options.grid.title = headerValue.toUpperCase();
                                //         pivot1.setReport(currentConfig);                  
                                //     });
                                // });
                                // }
                            // function compare_filters(f1,f2){
                            //         filter1 = {}
                                    
                            //         if(f1 != null){
                            //             f1.forEach(e=>{
                            //                 filter1[e.uniqueName] = 1
                            //             })
                            //         }
                            //         //check if element in f2 is in f1
                            //         if(f2 != null){
                            //             f2.forEach(e=>{
                            //                 if(filter1[e.uniqueName] == 1){
                            //                     filter1[e.uniqueName] = 2
                            //                 }
                            //             })
                            //         }
                            //         if(f1 != null && f2 != null){
                            //             if (f1.length != f2.length)
                            //             return false
                            //         }
                            //         for (const [key, value] of Object.entries(filter1)) {
                            //             if(value == 1){
                            //                 return false
                            //             }
                            //         }
                            //         return true
                            //     }
                            //     function customizeToolbar(toolbar) {
                            //         var tabs = toolbar.getTabs(); // get all tabs from the toolbar
                            //         toolbar.getTabs = function() {
                            //             delete tabs[1];
                            //             delete tabs[0]; // delete the first tab
                            //             return tabs;
                            //         }
                            //     }

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