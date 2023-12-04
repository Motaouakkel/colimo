<?php
$page_title = "Segmentation nombre de lignes Factures";
$api_action = "segmnbrlinesfactures";
include 'header.php';
?>

<body class="dashboard-page sb-l-o sb-r-c">
    <!-- Start: Main -->
    <div id="main">
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
                                <div id="filters"></div>
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
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "responsable": {
                                            type: "string"
                                        },
                                        "lines": {
                                            type: "number"
                                        },
                                        "factures": {
                                            type: "number"
                                        },
                                        "5": {
                                            type: "number"
                                        },
                                        "5_10": {
                                            type: "number"
                                        },
                                        "10_15": {
                                            type: "number"
                                        },
                                        "15_20": {
                                            type: "number"
                                        },
                                        "20": {
                                            type: "number"
                                        },

                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    data['data'].unshift(struct);
                                    return data['data'];

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
                                            "reportFilters": [{
                                                    "uniqueName": "Agence"
                                                },
                                                {
                                                    "uniqueName": "Secteur"
                                                },
                                                {
                                                    "uniqueName": "responsable"
                                                },
                                            ],
                                            "rows": [{
                                                    "uniqueName": "Agence"
                                                },
                                                {
                                                    "uniqueName": "Secteur"
                                                },
                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "factures",
                                                    "caption": "Nombre factures",
                                                    "aggregation": "sum",

                                                },
                                                {
                                                    "uniqueName": "lines",
                                                    "caption": "Nombre total lignes Produits",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "lines_factures",
                                                    "caption": "Nbr lignes/factures",
                                                    "formula": " sum(\"lines\") / sum(\"factures\")",
                                                    "format": "3dhvwiax"
                                                },
                                                {
                                                    "uniqueName": "5",
                                                    "caption": "<=5",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "5_10",
                                                    "caption": "5-10",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "10_15",
                                                    "caption": "10-15",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "15_20",
                                                    "caption": "15-20",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "20",
                                                    "caption": ">20",
                                                    "aggregation": "sum",
                                                },

                                            ]
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false,
                                                "showFilter": false
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
                                                "name": "3dhvwiax",
                                                "thousandsSeparator": " ",
                                                "decimalSeparator": ".",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "",
                                                "currencySymbolAlign": "left",
                                                "nullValue": "",
                                                "textAlign": "right",
                                                "isPercent": false
                                            }
                                        ]
                                    },

                                });

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
                                });

                                function customizeCellFunction(cell, data) {
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "TOTAL";
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
                            loaddate();
                        </script>


                    </div>
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