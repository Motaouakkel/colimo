<?php
$page_title = "Evol produits tournee";
$api_action = "productTournee";
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
                                <div id="filters"></div>
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            function loadfile(f) {
                                var mapper = {}

                                function getJSONData() {

                                    data = $.parseJSON(f);

                                    var struct = {
                                        "Famille": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "agence": {
                                            type: "string"
                                        },
                                        "bloc": {
                                            type: "string"
                                        },
                                        "ca_1": {
                                            type: "number"
                                        },
                                        "ca_2": {
                                            type: "number"
                                        },
                                        "perte_1": {
                                            type: "number"
                                        },
                                        "perte_2": {
                                            type: "number"
                                        },
                                        "quantite_1": {
                                            type: "number"
                                        },
                                        "quantite_2": {
                                            type: "number"
                                        },
                                        "secteur": {
                                            type: "string"
                                        },

                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    data['data'].unshift(struct);
                                    return data['data'];

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
                                                "uniqueName": "agence",
                                                "caption": "Agence",
                                            }, {
                                                "uniqueName": "bloc",
                                                "caption": "bloc",
                                            }, {
                                                "uniqueName": "secteur",
                                                "caption": "secteur",
                                            }],
                                            "rows": [{
                                                    "uniqueName": "Famille"
                                                },
                                                {
                                                    "uniqueName": "Gamme"
                                                },
                                                {
                                                    "uniqueName": "Produit"
                                                },
                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [{
                                                    "uniqueName": "quantite_1",
                                                    "caption": "QTTE P1",
                                                },
                                                {
                                                    "uniqueName": "quantite_2",
                                                    "caption": "QTTE P2",
                                                },
                                                {
                                                    "uniqueName": "evol_qtte",
                                                    "caption": "EVOL",
                                                    "format": "precision",
                                                    "formula": "(sum(\"quantite_2\") - sum(\"quantite_1\"))",
                                                },
                                                {
                                                    "uniqueName": "evol_qtte%",
                                                    "caption": "%",
                                                    "format": "precision",
                                                    "formula": "(((sum(\"quantite_2\") - sum(\"quantite_1\")) * 100)/ sum(\"quantite_1\"))",
                                                },
                                                {
                                                    "uniqueName": "ca_1",
                                                    "caption": "CA P1",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "ca_2",
                                                    "caption": "CA P2",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "evol_ca",
                                                    "caption": "EVOL",
                                                    "format": "precision",
                                                    "formula": "sum(\"ca_2\") - sum(\"ca_1\")",
                                                },
                                                {
                                                    "uniqueName": "evol_ca%",
                                                    "caption": "%",
                                                    "format": "precision",
                                                    "formula": "(((sum(\"ca_2\") - sum(\"ca_1\")) * 100)/ sum(\"ca_1\"))",
                                                },
                                                {
                                                    "uniqueName": "perte_1",
                                                    "caption": "Perte Globale P1",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "perte_2",
                                                    "caption": "Perte Globale P2",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "evol_perte",
                                                    "caption": "EVOL",
                                                    "format": "precision",
                                                    "formula": "((sum(\"perte_2\") - sum(\"perte_1\"))",
                                                },
                                                {
                                                    "uniqueName": "evol_ca%",
                                                    "caption": "%",
                                                    "format": "precision",
                                                    "formula": "(((sum(\"perte_2\") - sum(\"perte_1\")) * 100)/ sum(\"perte_1\"))",
                                                },

                                            ],

                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false,
                                                "showFilter": false,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                                "name": "precentForamt",
                                                "decimalPlaces": 2,

                                            },
                                            {
                                                "name": "precision",
                                                "decimalPlaces": 2,


                                            }
                                        ]
                                    },

                                });

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
                                });

                                // pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                //     if (data.measure &&
                                //         data.type != "header") {
                                //         if (data.measure.uniqueName == "gamme_seq") {
                                //             if (data.rows.length == 0) {
                                //                 cell.text = ""
                                //             } else {
                                //                 cell.text = "" + mapper[data.rows[0].caption].gamme;
                                //             }
                                //         } else if (data.measure.uniqueName == "famille_seq") {
                                //             if (data.rows.length == 0) {
                                //                 cell.text = ""
                                //             } else {
                                //                 cell.text = "" + mapper[data.rows[0].caption].famille;
                                //             }
                                //         }
                                //     }
                                // });

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