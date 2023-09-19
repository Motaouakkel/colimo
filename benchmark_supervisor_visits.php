<?php
$page_title = "Benchmark visites superviseurs";
$api_action = "benchmarkSupervisorVisits";
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
                            function loadfile(f) {
                                var maper = []

                                function getJSONData() {

                                    glob = $.parseJSON(f);
                                    data = glob

                                    var struct = {
                                        "CAB": {
                                            type: "string"
                                        },
                                        "AGENCE": {
                                            type: "string"
                                        },
                                        "SECTEUR": {
                                            type: "string"
                                        },
                                        "TOURNEE": {
                                            type: "string"
                                        },
                                        "NOM CLIENT": {
                                            type: "string"
                                        },
                                        "TYPOLOGIE": {
                                            type: "string"
                                        },
                                        "VITRINE": {
                                            type: "string"
                                        },
                                        "N°FACTURE": {
                                            type: "string"
                                        },
                                        "SCAN": {
                                            type: "string"
                                        },
                                        "DEBUT VISITE": {
                                            type: "string"
                                        },
                                        "FIN VISITE": {
                                            type: "string"
                                        },
                                        "DUREE VISITE": {
                                            type: "string"
                                        },
                                        "VENTE AVANT REMISE/PERTE": {
                                            type: "number"
                                        },
                                        "PERTE COMM": {
                                            type: "number"
                                        },
                                        "PROMO": {
                                            type: "number"
                                        },
                                        "RSF": {
                                            type: "number"
                                        },
                                        "RFM": {
                                            type: "number"
                                        },
                                        "VENTE NETTE": {
                                            type: "number"
                                        },

                                    }
                                    
                                    maper = data;
                                    data.unshift(struct);
                                    cosnole.log(data)
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
                                            "reportFilters": [],
                                            "rows": [],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [],
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo $page_title ?>",
                                                "showHeaders": true,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": true,
                                                "type": "flat",
                                                "showFilter": true,
                                                "showReportFiltersArea": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": []
                                    },

                                });

                                function customizeToolbar(toolbar) {
                                    var tabs = toolbar.getTabs();
                                    toolbar.getTabs = function() {
                                        delete tabs[1];
                                        delete tabs[0];
                                        return tabs;
                                    }
                                }

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