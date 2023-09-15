<?php
$page_title = "Evol ca clients tournees";
$api_action = "evolCaCustomersTours";
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
                                        "agency": {
                                            type: "string"
                                        },
                                        "type_identifier":{
                                            type : "number"
                                        },
                                        "ca1": {
                                            type: "number"
                                        },
                                        "ca2": {
                                            type: "number"
                                        },
                                        "customer_name": {
                                            type: "string"
                                        },
                                        "discount1": {
                                            type: "number"
                                        },
                                        "discount2": {
                                            type: "number"
                                        },
                                        "nbr_vitrine": {
                                            type: "number"
                                        },
                                        "perte1": {
                                            type: "number"
                                        },
                                        "perte2": {
                                            type: "number"
                                        },
                                        "sector": {
                                            type: "string"
                                        },
                                        "tour": {
                                            type: "string"
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
                                                    "uniqueName": "agency"
                                                },
                                                {
                                                    "uniqueName": "sector"
                                                },
                                                {
                                                    "uniqueName": "tour"
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "customer_name"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [
                                                {
                                                    
                                                    "uniqueName": "type_identifier",
                                                    "caption": "Typologie",
                                                },
                                                {
                                                    "uniqueName": "nbr_vitrine",
                                                    "caption": "Vitrine",
                                                },
                                                
                                                {
                                                    "uniqueName": "ca1",
                                                    "caption": "Ca 1",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "ca2",
                                                    "caption": "Ca 2",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "Evol_ca",
                                                    "caption": "Evol",
                                                    "formula": "\"ca2\" - \"ca1\"",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "Evol_ca%",
                                                    "caption": "%",
                                                    "formula": "if( (sum(\"ca1\") != 0) ,  (\"Evol_ca\" * 100)/abs(sum(\"ca1\") ,sum(\"ca1\") )",
                                                    "aggregation": "none",
                                                    "format": "precentForamt",
                                                },
                                                {
                                                    "uniqueName": "discount1",
                                                    "caption": "Remise/promo 1",
                                                },
                                                {
                                                    "uniqueName": "discount2",
                                                    "caption": "Remise/promo 2",
                                                },
                                                {
                                                    "uniqueName": "Evol_discount",
                                                    "caption": "Evol",
                                                    "formula": "\"discount2\" - \"discount1\""
                                                },
                                                {
                                                    "uniqueName": "Evol_discount%",
                                                    "caption": "%",
                                                    "formula": "if( (sum(\"discount1\") != 0) ,  (\"Evol_discount\" * 100)/abs(sum(\"discount1\") ,sum(\"discount1\") )",
                                                    "aggregation": "none",
                                                    "format": "precentForamt",
                                                },
                                                {
                                                    "uniqueName": "perte1",
                                                    "caption": "Perte globale 1",
                                                },
                                                {
                                                    "uniqueName": "perte2",
                                                    "caption": "Perte globale 2",
                                                },
                                                {
                                                    "uniqueName": "Evol_perte",
                                                    "caption": "Evol",
                                                    "formula": "\"perte2\" - \"perte1\""
                                                },
                                                {
                                                    "uniqueName": "Evol_perte%",
                                                    "caption": "%",
                                                    "formula": "if( (sum(\"perte1\") != 0) ,  (\"Evol_perte\" * 100)/abs(sum(\"perte1\") ,sum(\"perte1\") )",
                                                    "aggregation": "none",
                                                    "format": "precentForamt",
                                                },
                                            ],

                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo $page_title ?>",
                                                "showHeaders": false,
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
                                    if (data.measure &&
                                        data.type != "header") {
                                        if (data.measure.uniqueName == "type_identifier") {
                                           
                                            cell.text = "" + test[data.value]["customer_type"];
                                            
                                        } 
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