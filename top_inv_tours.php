<?php
$page_title = "Top inv par Secteur";
$api_action = "topInvTours";
include 'header.php';
?>

<body class="dashboard-page sb-l-o sb-r-c">
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
                                <div class="row">
                                    <div class="table1 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component"></div>
                                    </div>
                                    <div class="spacer col-xl-2 col-md-2 col-sm-12" style="height: 250%;">
                                        <h3> <?php echo strtoupper($page_title) ?></h3>
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
                                
                                var maper = []

                                function getJSONData() {

                                    data = $.parseJSON(f);



                                    var struct = {
                                        "AGENCE": {
                                            type: "string"
                                        },
                                        "SECTEUR": {
                                            type: "string"
                                        },
                                        "TOURNEE": {
                                            type: "string"
                                        },
                                        "BLOC": {
                                            type: "string"
                                        },
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "% INVENDU": {
                                            type: "number"
                                        },
                                        "INVENDU": {
                                            type: "number"
                                        },
                                    }
                                    console.log(struct)

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
                                                    "uniqueName": "AGENCE",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "BLOC",
                                                },
                                                {
                                                    "uniqueName": "SECTEUR",
                                                    "caption": "SECTEUR",
                                                },

                                                {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "SECTEUR"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "% INVENDU",
                                                "caption": "% INVENDU",
                                                "aggregation": "average",
                                                "format": "precentForamt"
                                            }],
                                            "sorting": {
                                                "column": {
                                                    "type": "desc",
                                                    "tuple": [],
                                                    "measure": "% INVENDU"
                                                }
                                            },
                                        },

                                        "options": {
                                            "grid": {
                                                "title": "TOP +",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            "currencySymbol" : "%",
                                            "currencySymbolAlign" : "left",
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
                                                    "uniqueName": "AGENCE",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "BLOC",
                                                },
                                                {
                                                    "uniqueName": "SECTEUR",
                                                    "caption": "SECTEUR",
                                                },

                                                {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "SECTEUR"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "% INVENDU",
                                                "caption": "% INVENDU",
                                                "aggregation": "average",
                                                "format": "precentForamt"
                                            }],
                                            "sorting": {
                                                "column": {
                                                    "type": "asc",
                                                    "tuple": [],
                                                    "measure": "% INVENDU"
                                                }
                                            },
                                        },

                                        "options": {
                                            "grid": {
                                                "title": "TOP -",
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
                                            "currencySymbol" : "%",
                                            "currencySymbolAlign" : "left",
                                        }]
                                    },
                                });
                                pin = pivot2
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