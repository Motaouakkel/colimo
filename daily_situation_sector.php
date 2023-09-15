<?php
$page_title = "Situation journaliere secteur";
$api_action = "dailySituationSector";
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

                                    <?php include 'search_1_date.php' ?>

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
                            var mapper = {}
                            function loadfile(f) {
                                var test = {}

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var i = 1
                                    data.forEach(function(item) {
                                        item.vendeur_identifier = i
                                        item.aide_identifier = i
                                        i += 1
                                        item.vendeur = String(item.vendeur);
                                        item.aide_vendeur = String(item.aide_vendeur) + " ";
                                    });

                                    var struct = {
                                        "tournee": {
                                            type: "string"
                                        },
                                        "vendeur_identifier": {
                                            type: "number"
                                        },
                                        "aide_identifier": {
                                            type: "number"
                                        },
                                        "aide_vendeur": {
                                            type: "string"
                                        },
                                        "time_assignement": {
                                            type: "time"
                                        },
                                        "time_unsold": {
                                            type: "time"
                                        },
                                        "total_time": {
                                            type: "time"
                                        },
                                        "sales_amount": {
                                            type: "number"
                                        },
                                        "Perte Commercial": {
                                            type: "number"
                                        },
                                        "Perte Camion": {
                                            type: "number"
                                        },
                                        "Perte Usine": {
                                            type: "number"
                                        },
                                        "taux perte globale": {
                                            type: "number"
                                        },
                                        "perte globale": {
                                            type: "number"
                                        },
                                        "invoices_count": {
                                            type: "number"
                                        },
                                        "qs LAIT FRAIS": {
                                            type: "number"
                                        },
                                        "ca LAIT FRAIS": {
                                            type: "number"
                                        },
                                        "vendeur": {
                                            type: "string"
                                        },
                                        "qs LAIT UHT": {
                                            type: "number"
                                        },
                                        "ca LAIT UHT": {
                                            type: "number"
                                        },
                                        "qs BEURRE": {
                                            type: "number"
                                        },
                                        "ca BEURRE": {
                                            type: "number"
                                        },
                                        "qs YAOURT FERME & BRASSÉ": {
                                            type: "number"
                                        },
                                        "ca YAOURT FERME & BRASSÉ": {
                                            type: "number"
                                        },
                                        "qs YAOURT À BOIRE": {
                                            type: "number"
                                        },
                                        "ca YAOURT À BOIRE": {
                                            type: "number"
                                        },
                                        "qs DESSERT": {
                                            type: "number"
                                        },
                                        "ca DESSERT": {
                                            type: "number"
                                        },
                                        "qs LBEN & RAIB": {
                                            type: "number"
                                        },
                                        "ca LBEN & RAIB": {
                                            type: "number"
                                        },
                                        "qs FROMAGE FRAIS": {
                                            type: "number"
                                        },
                                        "ca FROMAGE FRAIS": {
                                            type: "number"
                                        },
                                        "qs JUS": {
                                            type: "number"
                                        },
                                        "ca JUS": {
                                            type: "number"
                                        },
                                        "clients": {
                                            type: "number"
                                        },
                                        "nbr_visits": {
                                            type: "number"
                                        },
                                        "success_visits": {
                                            type: "number"
                                        },
                                        "visite_ration": {
                                            type: "number"
                                        },
                                        "success_visite_ration": {
                                            type: "number"
                                        },
                                        "Perte Camion": {
                                            type: "number"
                                        },
                                        "Perte Commercial": {
                                            type: "number"
                                        },
                                        "Perte Usine": {
                                            type: "number"
                                        },
                                        "Perte Usine": {
                                            type: "number"
                                        },
                                    }

                                    data.unshift(struct);
                                    test = data

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
                                                "uniqueName": "tournee"
                                            }],
                                            "rows": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "columns": [{

                                                "uniqueName": "tournee"
                                            }, ],
                                            "measures": [{
                                                    "uniqueName": "vendeur_identifier",
                                                    "caption": "VENDUR"
                                                }, {
                                                    "uniqueName": "aide_identifier",
                                                    "caption": "AIDE VENDEUR"
                                                }, {
                                                    "uniqueName": "time_assignement",
                                                    "caption": "HEURE SORTIE",

                                                }, {
                                                    "uniqueName": "time_unsold",
                                                    "caption": "HEURE RETOUR",
                                                },
                                                {
                                                    "uniqueName": "total_time",
                                                    "caption": "DUREE TOURNEE",
                                                },
                                                {
                                                    "uniqueName": "sales_amount",
                                                    "caption": "VENTE NETTE REALISEE",
                                                },
                                                {
                                                    "uniqueName": "invoices_count",
                                                    "caption": "NBRE FACTURES",
                                                },
                                                {
                                                    "uniqueName": "qs LAIT FRAIS",
                                                    "caption": "QS LAIT FRAIS",
                                                },
                                                {
                                                    "uniqueName": "ca LAIT FRAIS",
                                                    "caption": "CA LAIT FRAIS",
                                                },
                                                {
                                                    "uniqueName": "qs LAIT UHT",
                                                    "caption": "QS LAIT UHT",
                                                },
                                                {
                                                    "uniqueName": "ca LAIT UHT",
                                                    "caption": "CA LAIT UHT",
                                                },
                                                {
                                                    "uniqueName": "qs BEURRE",
                                                    "caption": "SQ BEURRE",
                                                },
                                                {
                                                    "uniqueName": "ca BEURRE",
                                                    "caption": "CA BEURRE",
                                                },
                                                {
                                                    "uniqueName": "qs YAOURT FERME & BRASSÉ",
                                                    "caption": "QS YAOURT FERME & BRASSÉ",
                                                },
                                                {
                                                    "uniqueName": "ca YAOURT FERME & BRASSÉ",
                                                    "caption": "CA YAOURT FERME & BRASSÉ",
                                                },
                                                {
                                                    "uniqueName": "qs YAOURT À BOIRE",
                                                    "caption": "QS YAOURT À BOIRE",
                                                },
                                                {
                                                    "uniqueName": "ca YAOURT À BOIRE",
                                                    "caption": "CA YAOURT À BOIRE",
                                                },
                                                {
                                                    "uniqueName": "qs DESSERT",
                                                    "caption": "QS DESSERT",
                                                },
                                                {
                                                    "uniqueName": "ca DESSERT",
                                                    "caption": "CA DESSERT",
                                                },
                                                {
                                                    "uniqueName": "qs LBEN & RAIB",
                                                    "caption": "QS LBEN & RAIB",
                                                },
                                                {
                                                    "uniqueName": "ca LBEN & RAIB",
                                                    "caption": "CA LBEN & RAIB",
                                                },
                                                {
                                                    "uniqueName": "qs FROMAGE FRAIS",
                                                    "caption": "QS FROMAGE FRAIS",
                                                },
                                                {
                                                    "uniqueName": "ca FROMAGE FRAIS",
                                                    "caption": "CA FROMAGE FRAIS",
                                                },
                                                {
                                                    "uniqueName": "qs JUS",
                                                    "caption": "QS JUS",
                                                },
                                                {
                                                    "uniqueName": "ca JUS",
                                                    "caption": "CA JUS",
                                                },
                                                {
                                                    "uniqueName": "clients",
                                                    "caption": "NBRE VISITES PROGRAMMEES",
                                                },
                                                {
                                                    "uniqueName": "nbr_visits",
                                                    "caption": "NBRE VISITE REALISEES",
                                                },
                                                {
                                                    "uniqueName": "visite_ration",
                                                    "caption": "TAUX REALISATION VISITES PROGRAMMEES",
                                                },
                                                {
                                                    "uniqueName": "success_visits",
                                                    "caption": "NOMBRE VISITES AVEC SUCCES",
                                                },
                                                {
                                                    "uniqueName": "success_visite_ration",
                                                    "caption": "TAUX DE SUCCES",
                                                },
                                                {
                                                    "uniqueName": "Perte Commercial",
                                                    "caption": "PERTE COMMERCIALE",
                                                }, {
                                                    "uniqueName": "Perte Camion",
                                                    "caption": "PERTE CAMION",
                                                }, {
                                                    "uniqueName": "perte globale",
                                                    "caption": "PERTE GLOBALE",
                                                }, {
                                                    "uniqueName": "taux perte globale",
                                                    "caption": "TAUX PERTE GLOBALE",
                                                },


                                            ]
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
                                        "formats": []
                                    },

                                });

                                pivot1.customizeCell(function customizeCellFunction(cell, data) {

                                    if (data.measure &&
                                        data.type != "header") {
                                        if (data.measure.uniqueName == "vendeur_identifier") {
                                            cell.text = "" + test[data.value]["vendeur"];
                                        } else if (data.measure.uniqueName == "aide_identifier") {
                                            cell.text = "" + test[data.value]["aide_vendeur"];
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