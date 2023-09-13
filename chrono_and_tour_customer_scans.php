<?php
$page_title = "Chrono et scans clients tournee";
$api_action = "chronoAndTourCustomerScans";
include 'header.php';

?>

<body class="dashboard-page sb-l-o sb-r-c">

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <!-- End: Header -->
        <?php include 'externe.php'; ?>
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
                            function loadfile(f) {
                                var maper = []

                                function getJSONData() {

                                    glob = $.parseJSON(f);
                                    data = glob

                                    var struct = {
                                        "agency": {
                                            type: "string"
                                        },
                                        "sector": {
                                            type: "string"
                                        },
                                        "tour": {
                                            type: "string"
                                        },
                                        "ref": {
                                            type: "string"
                                        },
                                        "client": {
                                            type: "string"
                                        },
                                        "typologie": {
                                            type: "string"
                                        },
                                        "vitrine": {
                                            type: "string"
                                        },
                                        "invoice": {
                                            type: "string"
                                        },
                                        "partner_scan": {
                                            type: "string"
                                        },



                                    }
                                    maper = data;
                                    data.unshift(struct);

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
                                                    "uniqueName": "agency",
                                                    "caption": "Agence",
                                                },
                                                {
                                                    "uniqueName": "tour",
                                                    "caption": "Tournee",
                                                },
                                                {
                                                    "uniqueName": "sector",
                                                    "caption": "Secteur",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "ref",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "client",
                                                "caption": "Nom client"
                                            }, {
                                                "uniqueName": "typologie",
                                                "caption": "Typologie"
                                            }, {
                                                "uniqueName": "vitrine",
                                                "caption": "Vitrine"
                                                
                                            }, {
                                                "uniqueName": "invoice",
                                                "caption": "N°facture"
                                            }, {
                                                "uniqueName": "partner_scan",
                                                "caption": "Scan"
                                            }],

                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo $page_title ?>",
                                                "showHeaders": true,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": true,
                                                "type": "flat",
                                                "showFilter":true,
                                                "showReportFiltersArea": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": []
                                    },

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