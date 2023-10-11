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
                                    <div class="col-md-1">
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
                                <div id="ls-filters" class="row ls-filters">

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
                                    data.unshift(struct);
                                    return data;

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
                                                //"showFilter": false,
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
                                pin = pivot2
                                previosFilter = []

                               

                                pivot1.on("reportcomplete", function() {
                                    console.log("reportcomplete")
                                    previosFilter = pivot1.getFilter("type");

                                    var sourceFiltersContainer = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                    console.log(sourceFiltersContainer)
                                    var targetFiltersContainer = document.getElementById("ls-filters");
                                    while(targetFiltersContainer.firstChild){
                                        targetFiltersContainer.removeChild(targetFiltersContainer.firstChild)
                                    }
                                    var elementParent = sourceFiltersContainer.parentElement;
                                    console.log("child",sourceFiltersContainer)
                                    console.log("parent",elementParent)
                                    sourceFiltersContainer.classList.remove("wdr-ui-hgroup")
                                    elementParent.removeChild(sourceFiltersContainer);
                                    targetFiltersContainer.appendChild(sourceFiltersContainer);
                                    
                                        console.log("loaded ", loaded)
                                        loaded = true;
                                        pivot1.on("reportchange", function() {
                                            var srcFiltersContainer = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                            var Parent =  srcFiltersContainer.parentElement;
                                            Parent.removeChild(srcFiltersContainer);
                                            console.log("reportchange")
                                            var sourceFiltersContainer = document.getElementById("wdr-page-filter");

                                            var filterValue = pivot1.getFilter("type");
                                            var currentConfig = pivot1.getReport();
                                            var currentConfigP2 = pivot2.getReport();
                                            currentConfigP2.slice.measures.forEach(m => {
                                                if (m.uniqueName == 'Mt Perte') {
                                                    m.caption = "PERTE"
                                                }
                                            })
                                            currentConfigP2.slice.reportFilters = currentConfig.slice.reportFilters;
                                            pivot2.setReport(currentConfigP2);
                                            // if (compare_filters(previosFilter, filterValue)) {
                                            //     console.log("filter not changed")
                                            //     return;
                                            // }
                                            // var headerValue = "PERTE GLOBALE"

                                            // if (filterValue != null && filterValue.length === 1) {
                                            //     headerValue = filterValue[0].caption;
                                            // } else if (filterValue != null && filterValue.length === 2) {
                                            //     headerValue = filterValue[0].caption + " + " + filterValue[1].caption;
                                            // }

                                            // currentConfig.slice.measures[0].caption = headerValue + " DH TTC/J";
                                            // currentConfig.slice.measures[1].caption = "QTT " + headerValue + " UNITES/J";
                                            // pivot1.setReport(currentConfig);


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