<?php
$page_title = "Top pertes tournees";
$api_action = "topTourLosses";
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
                                    <div id="wdr-component1"></div>
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
                                        "tournee": {
                                            type: "string"
                                        },

                                    }
                                    data.unshift(struct);
                                    return data;

                                };

                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component1",
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
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },
                                                {
                                                    "uniqueName": "tournee",
                                                    "caption": "tournee",
                                                },
                                                {
                                                    "uniqueName": "type",
                                                    "caption": "type",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "tournee"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Mt Perte",
                                                "caption": "PERTE GLOBALE",
                                                "aggregation": "sum",
                                                "format": "precentForamt"
                                            }, {
                                                "uniqueName": "QTT Perte",
                                                "caption": "QTT GLOBALE",
                                                "aggregation": "sum",
                                                "format": "precentForamt"
                                            }],
                                        },
                                        "sorting": "off",
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
                                        }]
                                    },
                                });
                                pivot1.on("reportcomplete", function() {
                                    pivot1.on("reportchange", function() {
                                        var filterValue = pivot1.getFilter("type");
                                        var currentConfig = pivot1.getReport();
                                        headerValue = "PERTE GLOBALE"
                                        if (filterValue.length === 1) {
                                            headerValue = filterValue[0].caption;
                                        } else if (filterValue.length === 2) {
                                            headerValue = filterValue[0].caption + " + " + filterValue[1].caption;
                                        }
                                        currentConfig.slice.measures[0].caption = headerValue.toUpperCase();
                                        pivot1.setReport(currentConfig);
                                    });
                                });
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