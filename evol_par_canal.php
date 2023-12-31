<?php
$page_title = "EVOLUTION par canal";
$api_action = "evolutioncanal";
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

                                    <?php include 'search_4_dates.php' ?>

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
                                var test = []

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "Gamme":{
                                            type : "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "canal": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "string"
                                        },
                                        "type2": {
                                            type: "string"
                                        },
                                        "amount1": {
                                            type: "number"
                                        },
                                        "amount2": {
                                            type: "number"
                                        },
                                        
                                    }
                                    test = data;
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
                                                    "uniqueName": "Agence"
                                                },
                                                
                                                
                                                {
                                                    "uniqueName": "Gamme"
                                                },
                                                {
                                                    "uniqueName": "Produit"
                                                },
                                                {
                                                    "uniqueName": "type",
                                                    "caption": "unité",
                                                    "filter": {
                                                        "members": [
                                                            "type.DH TTC"
                                                        ]
                                                    }
                                                },
                                                {
                                                    "uniqueName": "type2",
                                                    "caption": "Type",
                                                    "filter": {
                                                        "members": [
                                                            "type2.ENLEV NET"
                                                        ]
                                                    }
                                                },
                                            ],
                                            "rows": [{
                                                "uniqueName": "canal",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [
                                                {
                                                    "uniqueName": "amount1",
                                                    "caption": "PERIODE 1",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "amount2",
                                                    "caption": "PERIODE 2",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "amount_3",
                                                    "caption": "EVOLUTION",
                                                    "format": "precision",
                                                    "formula": "sum('amount2') -sum('amount1')"
                                                },
                                                {
                                                    "uniqueName": "% evolution",
                                                    "caption": "% evolution",
                                                    //to save againt division by zero
                                                    "formula": "IF(sum('amount1')=0,100,100*(sum('amount2') -sum('amount1'))/sum('amount1'))",
                                                    "format": "precentForamt"
                                                }
                                            ],

                                        },
                                        "expands": {
                                            "expandAll": true,
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
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
                                
                                pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "Total";
                                    }
                                });
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