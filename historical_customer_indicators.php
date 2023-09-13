<?php
$page_title = "Historique indicateurs clients";
$api_action = "historicalCustomerIndicators";
include 'header.php';

?>

<body class="dashboard-page sb-l-o sb-r-c">

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <!-- End: Header -->
        <?php include 'externe.php'; ?>
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
                                    <?php include 'search_1_date.php' ?>
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
                                var maper = []

                                function getJSONData() {

                                    glob = $.parseJSON(f);
                                    data = glob

                                    var struct = {
                                        "agency": {
                                            type: "string"
                                        },
                                        "customer_name": {
                                            type: "string"
                                        },
                                        "date_invoice": {
                                            type: "string"
                                        },

                                        "type": {
                                            type: "string"
                                        },
                                        "amount": {
                                            type: "number"
                                        },
                                        "sector": {
                                            type: "string"
                                        },
                                        "tour": {
                                            type: "string"
                                        },

                                    }
                                    maper = data;
                                    data.unshift(struct);

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
                                            "reportFilters": [{
                                                    "uniqueName": "customer_name",
                                                    "caption": "Nom client",
                                                },
                                                {
                                                    "uniqueName": "tour",
                                                    "caption": "Tournee",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "type"
                                            }],
                                            "columns": [{
                                                "uniqueName": "date_invoice",
                                                "formula": "sum(\"amount\")"
                                            }],

                                            "measures": [{
                                                "uniqueName": "amount",
                                            } ],

                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo $page_title ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            "currencySymbol": "%",
                                            "currencySymbolAlign": "right"
                                        }]
                                    },

                                });

                               function  pivotcallback(pivot1){
                                pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                    var i = 0
                                    var l = 0
                                    if (data.columnIndex == 1 && data.label == "-1" && i == 0) {
                                        cell.text = "Agence"
                                        i++
                                    } else if (data.columnIndex == 2 && data.label == "0" && l == 0) {
                                        cell.text = "type"
                                        l++
                                    }
                                    if (data.columnIndex == 1 && data.label == "-1" && i == 0) {
                                        cell.text = "Agence"
                                        i++
                                    }  
                                    if (data.columnIndex == 2 &&  data.rowIndex != 0 )  {
                                        cell2 = pivot1.getCell(data.rowIndex,0)
                                        //cell.label.split("/")[1]
                                        var a = cell2.label
                                        var b = a.split("/")[2]
                                       
                                        cell.text = b
                                        
                                    }else if (data.columnIndex == 1 &&  data.rowIndex != 0 && !data.isGrandTotalRow )  {
                                        cell2 = pivot1.getCell(data.rowIndex,0)
                                        
                                        //cell.label.split("/")[1]
                                        
                                        var a = cell2.label
                                        var b = a.split("/")[0]
                                        
                                        cell.text = b
                                        
                                    }else if (data.columnIndex == 0 && data.rowIndex != 0 && !data.isGrandTotalRow){
                                        
                                        var a = data.label
                                        cell.text = a.split("/")[1]
                                        
                                    }
                                
                                });                                
                            }
                            pivotcallback(pivot1)

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