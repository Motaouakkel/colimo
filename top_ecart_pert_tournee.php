<?php
$page_title = "Top ecart perte tournees";
$api_action = "topecartPerteTournees";
include 'header.php';

?>

<body class="dashboard-page sb-l-o sb-r-c">

    <!-- Start: Main -->
    <div id="main">
        <script src="include.js"></script>
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
                                    <div class="col-md-2">
                                        <a type="submit" class="button btn-primary submit-btn" href="#" onclick="exportAndHandleData(piv,pin,'<?php echo $page_title ?>');">To Excel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <div class="ml15 ib va-m" id="toggle_sidemenu_r">
                                    <a href="#" id="aCliquer">
                                    </a>
                                </div>
                                <div id="filters"></div>
                                <div class="row">
                                    <div class="report-title col-xl-12 col-md-12 col-sm-12">
                                        <h3> <?php echo strtoupper($page_title) ?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table1 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component"></div>
                                    </div>
                                    <div class="spacer col-xl-2 col-md-2 col-sm-12" style="height: 250%;">

                                    </div>
                                    <div class="table2 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var piv = null
                            var pin = null

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
                                        "Ecart_Pert": {
                                            type: "number"
                                        },
                                        "Canal": {
                                            type: "string"
                                        },
                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    daysMapper = data['data'];
                                    data['data'].unshift(struct);
                                    return data['data'];
                                };

                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    //beforetoolbarcreated: customizeToolbar,
                                    toolbar: false,

                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                "uniqueName": "Agence"
                                            }, {
                                                "uniqueName": "Secteur"
                                            }],
                                            "rows": [{
                                                    "uniqueName": "Secteur"
                                                },

                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Ecart_Pert",
                                                "caption": "ECART PERTE/J",
                                                "format": "precision"
                                            }, ],
                                            "sorting": {
                                                "column": {
                                                    "type": "desc",
                                                    "tuple": [],
                                                    "measure": "Ecart_Pert"
                                                }
                                            },
                                            "expands": {
                                                "expandAll": true,
                                            }
                                        },
                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "type": "classic",
                                                "title": "TOP +",
                                                "showHeaders": false,
                                                "showTotals": "off",
                                                "showGrandTotals": "off",
                                                "showHierarchyCaptions": false,
                                                "showFilter": false,

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
                                piv = pivot1

                                var pivot2 = new WebDataRocks({
                                    container: "#wdr-component2",
                                    //beforetoolbarcreated: customizeToolbar,

                                    toolbar: false,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                "uniqueName": "Agence"
                                            }, {
                                                "uniqueName": "Secteur"
                                            }],
                                            "rows": [{
                                                    "uniqueName": "Secteur"
                                                },

                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Ecart_Pert",
                                                "caption": "ECART PERTE/J",
                                                "format": "precision"
                                            }, ],
                                            "sorting": {
                                                "column": {
                                                    "type": "asc",
                                                    "tuple": [],
                                                    "measure": "Ecart_Pert"
                                                }
                                            },
                                            "expands": {
                                                "expandAll": true,
                                            }
                                        },
                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "type": "classic",
                                                "title": "TOP -",
                                                "showHeaders": false,
                                                "showFilter": false,
                                                "showTotals": "off",
                                                "showGrandTotals": "off",
                                                "showHierarchyCaptions": false,


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
                                pin = pivot2

                                function customizeToolbar(toolbar) {
                                    var tabs = toolbar.getTabs(); // get all tabs from the toolbar
                                    toolbar.getTabs = function() {
                                        delete tabs[1];
                                        delete tabs[0]; // delete the first tab
                                        return tabs;
                                    }
                                }
                                pivot1.on("reportcomplete", function() {
                                    pivot1.on("reportchange", function() {
                                        var currentConfigP1 = pivot1.getReport();
                                        var currentConfigP2 = pivot2.getReport();
                                        currentConfigP2.slice.measures.forEach(m => {
                                            if (m.uniqueName == 'Ecart_Pert') {
                                                m.caption = "ECART PERTE/J"
                                            }
                                        })
                                        currentConfigP2.slice.reportFilters = currentConfigP1.slice.reportFilters;
                                        pivot2.setReport(currentConfigP2);
                                    });
                                });

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
                                });

                                pivot2.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot2.getMeasures().concat(pivot2.getRows()));
                                    applayLSFilters(pivot2, captionsMapper);
                                    pivot2.off("reportcomplete");
                                });

                            }
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