<?php
$page_title = "Top pertes par secteur";
$api_action = "topTourLosses";
include 'header.php';
?>

<body class="dashboard-page sb-l-o sb-r-c top-report">
    <script src="include.js"></script>
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

                                    <div class="col-md-2 excel-btn">
                                        <a type="submit" class="button btn-primary submit-btn" href="#" onclick="exportAndHandleData(piv,pin,'<?php echo $page_title ?>');">To Excel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <div class="ml15 ib va-m" id="toggle_sidemenu_r">
                                    <a href="#" id="aCliquer">
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="report-title col-xl-12 col-md-12 col-sm-12">
                                        <h3> <?php echo strtoupper($page_title) ?></h3>
                                    </div>
                                </div>
                                <div id="filters"></div>
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
                            var loaded = false;
                            var piv = null;
                            var pin = null;

                            function loadfile(f) {
                                var maper = []

                                function getJSONData() {

                                    data = $.parseJSON(f);

                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "Canal":{
                                            type: "string"
                                        },
                                        
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "Mt Perte": {
                                            type: "number"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "QTT Perte": {
                                            type: "number"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "string"
                                        },
                                        "BLOC": {
                                            type: "string"
                                        },
                                        "unite": {
                                            type: "string"
                                        }

                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    data['data'].unshift(struct);
                                    return data['data'];
                                };

                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    toolbar: false,
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
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },
                                                {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                }, {
                                                    "uniqueName": "unite",
                                                    "caption": "DH TTC Ou unite",
                                                    "filter": {
                                                        "members": ['unite.DH TTC']
                                                    }
                                                },


                                                {
                                                    "uniqueName": "type",
                                                    "caption": "type",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Secteur",
                                                "caption": "Secteur",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Mt Perte",
                                                "caption": "PERTE",
                                                "aggregation": "sum",
                                                "format": "precentForamt"
                                            }],
                                            "sorting": {
                                                "column": {
                                                    "type": "desc",
                                                    "tuple": [],
                                                    "measure": "Mt Perte"
                                                }
                                            },
                                        },
                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {

                                                "title": "TOP +",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showFilter": false,
                                                "sorting": "on",
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
                                piv = pivot1
                                var pivot2 = new WebDataRocks({
                                    container: "#wdr-component2",
                                    toolbar: false,
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
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },
                                                {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                }, {
                                                    "uniqueName": "unite",
                                                    "caption": "DH TTC Ou unite",
                                                    "filter": {
                                                        "members": ['unite.DH TTC']
                                                    }
                                                },


                                                {
                                                    "uniqueName": "type",
                                                    "caption": "type",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Secteur",
                                                "caption": "Secteur",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Mt Perte",
                                                "caption": "PERTE",
                                                "aggregation": "sum",
                                                "format": "precentForamt"
                                            }],
                                            "sorting": {
                                                "column": {
                                                    "type": "asc",
                                                    "tuple": [],
                                                    "measure": "Mt Perte"
                                                }
                                            },
                                        },
                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "title": "TOP -",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "sorting": "on",
                                                "showHierarchyCaptions": false,
                                                "showFilter": false,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                        }]
                                    },
                                });
                                pin = pivot2
                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.on("reportchange", function() {
                                        var filterValue = pivot1.getFilter("type");
                                        var currentConfig = pivot1.getReport();
                                        var currentConfigP2 = pivot2.getReport();
                                        currentConfigP2.slice.measures.forEach(m => {
                                            if (m.uniqueName == 'Mt Perte') {
                                                m.caption = "PERTE"
                                            }
                                        })
                                        currentConfigP2.slice.reportFilters = currentConfig.slice.reportFilters;
                                        currentConfigP2.options.grid["showFilter"] = true,
                                            pivot2.setReport(currentConfigP2);

                                    });
                                    pivot1.off("reportcomplete");
                                });

                                pivot2.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot2.getMeasures().concat(pivot2.getRows()));
                                    applayLSFilters(pivot2, captionsMapper);
                                    pivot2.off("reportcomplete");
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