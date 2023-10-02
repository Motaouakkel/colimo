<?php
$page_title = "EVOLUTION TOUrnee";
$api_action = "evolTounree";
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
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "Bloc": {
                                            type: "string"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "string"
                                        },
                                        "amount_1": {
                                            type: "number"
                                        },
                                        "amount_2": {
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
                                                    "uniqueName": "type",
                                                    "filter": {
                                                        "members": [
                                                            "type.ENLEV NET"
                                                        ]
                                                    }
                                                },
                                                {
                                                    "uniqueName": "Secteur"
                                                },
                                                {
                                                    "uniqueName": "Gamme"
                                                },
                                                {
                                                    "uniqueName": "Produit"
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Agence",
                                            }, {
                                                "uniqueName": "Bloc",
                                            }, {
                                                "uniqueName": "Secteur",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [{
                                                    "uniqueName": "amount_1",
                                                    "caption": "PERIODE 1",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "amount_2",
                                                    "caption": "PERIODE 2",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "amount_3",
                                                    "caption": "EVOLUTION",
                                                    "format": "precision",
                                                    "formula": "sum(\"amount_2\")- sum(\"amount_1\")"
                                                },
                                                {
                                                    "uniqueName": "% evolution",
                                                    "caption": "% evolution",
                                                    //to save againt division by zero
                                                    "formula": "IF(sum('amount_1')=0,0,100*(sum('amount_2') -sum('amount_1'))/sum('amount_1'))",

                                                    "format": "precentForamt"

                                                }
                                            ],
                                            "expands": {
                                                "expandAll": true,
                                            },
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
                                        }, {
                                            "name": "precision",
                                            "decimalPlaces": 2,

                                        }]
                                    },

                                });
                                
                                pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "TOTAL";
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