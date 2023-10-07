<?php
$page_title = "Top remises par secteur";
$api_action = "topTourDiscounts";
include 'header.php';
?>

<body class="dashboard-page sb-l-o sb-r-c">
    <div id="main">
        <?php include 'sidebar_left.php'; ?>
        <section id="content_wrapper">
            <?php include 'bread_crumbs.php'; ?>
            <section id="content" class="animated fadeIn">
                <div class="admin-panels fade-onload sb-l-o-full">
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
                                <div class="row">
                                    <div class="table1 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component"></div>
                                    </div>
                                    <div class="spacer col-xl-2 col-md-2 col-sm-12" style="height: 250%;"></div>
                                    <div class="table2 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component2"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <script>
                            function loadfile(f) {
                                var maper = []

                                function getJSONData() {

                                    data = $.parseJSON(f);



                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "Bloc": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "string"
                                        },
                                        "Mt Remise": {
                                            type: "number"
                                        },
                                    }
                                    console.log(struct)

                                    data.unshift(struct);
                                    return data;

                                };

                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "Agence",
                                                    "caption": "Agence",
                                                },
                                                {
                                                    "uniqueName": "Bloc",
                                                    "caption": "Bloc",
                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },

                                                {
                                                    "uniqueName": "type",
                                                    "caption": "Type de remise",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Secteur"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Mt Remise",
                                                "caption": "REMISE",
                                                "aggregation": "sum",
                                                "format": "precentForamt"
                                            }],
                                            "sorting": {
                                                "column": {
                                                    "type": "desc",
                                                    "tuple": [],
                                                    "measure": "Mt Remise"
                                                }
                                            },
                                        },
                                        "sorting": "off",
                                        "options": {
                                            "grid": {
                                                "title": "Top +",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                        }]
                                    },
                                });

                                var pivot2 = new WebDataRocks({
                                    container: "#wdr-component2",
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [
                                                {
                                                    "uniqueName": "Agence",
                                                    "caption": "Agence",
                                                },
                                                {
                                                    "uniqueName": "Bloc",
                                                    "caption": "Bloc",
                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },

                                                {
                                                    "uniqueName": "type",
                                                    "caption": "Type de remise",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Secteur"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Mt Remise",
                                                "caption": "REMISE",
                                                "aggregation": "sum",
                                                "format": "precentForamt"
                                            }],
                                            "sorting": {
                                                "column": {
                                                    "type": "asc",
                                                    "tuple": [],
                                                    "measure": "Mt Remise"
                                                }
                                            },
                                        },
                                        "sorting": "off",
                                        "options": {
                                            "grid": {
                                                "title": "Top -",
                                                "showHeaders": false,
                                                "showFilter": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                        }]
                                    },
                                });

                                previosFilter = []
                                pivot1.on("reportcomplete", function() {
                                    previosFilter = pivot1.getFilter("type");


                                    pivot1.on("reportchange", function() {
                                        var currentConfig = pivot1.getReport();
                                        var currentConfigP2 = pivot2.getReport();
                                        currentConfigP2.slice.reportFilters = currentConfig.slice.reportFilters;
                                        var filterValue = pivot1.getFilter("type");
                                        headerValue = "REMISE"
                                        if (filterValue.length === 1) {
                                            headerValue = filterValue[0].caption;
                                        } else if (filterValue.length === 2) {
                                            headerValue = filterValue[0].caption + " + " + filterValue[1].caption;
                                        }
                                        currentConfig.slice.measures[0].caption = headerValue.toUpperCase();
                                        currentConfigP2.slice.measures[0].caption = headerValue.toUpperCase();
                                        pivot2.setReport(currentConfigP2);
                                        pivot1.setReport(currentConfig);
                                    });
                                });
                            }

                            function compare_filters(f1, f2) {
                                filter1 = {}

                                if (f1 != null) {
                                    f1.forEach(e => {
                                        filter1[e.uniqueName] = 1
                                    })
                                }
                                //check if element in f2 is in f1
                                if (f2 != null) {
                                    f2.forEach(e => {
                                        if (filter1[e.uniqueName] == 1) {
                                            filter1[e.uniqueName] = 2
                                        }
                                    })
                                }
                                if (f1 != null && f2 != null) {
                                    if (f1.length != f2.length)
                                        return false
                                }
                                for (const [key, value] of Object.entries(filter1)) {
                                    if (value == 1) {
                                        return false
                                    }
                                }
                                return true
                            }
                            loaddate();
                        </script>


                    </div>


            </section>

        </section>

        <?php include 'sidebar_right.php'; ?>
    </div>




</body>
<?php include 'footer.php'; ?>

</html>