<?php
$page_title = "Top nombre factures";
$api_action = "topNumberInvoices";
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
                                        "agence": {
                                            type: "string"
                                        },
                                        "secteur": {
                                            type: "string"
                                        },
                                        "Bloc": {
                                            type: "string"
                                        },
                                        "nbr_facture": {
                                            type: "number"
                                        },
                                        "nbr_facture2": {
                                            type: "number"
                                        },
                                    }
                                    console.log(struct)

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
                                                    "uniqueName": "agence",
                                                    "caption": "agence",
                                                },
                                                {
                                                    "uniqueName": "secteur",
                                                    "caption": "secteur",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Bloc"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "nbr_facture",
                                                "caption": "NBRE FACTURE/JOURS",
                                                "aggregation": "sum",
                                                "format": "precentForamt"
                                            }],
                                        },
                                        "sorting": "off",
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 0,
                                        }]
                                    },
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