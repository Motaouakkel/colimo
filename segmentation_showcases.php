<?php
$page_title = "Segmentation ca vitrines";
$api_action = "segmentationShowcases";
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

                                    <?php include 'search_2_dates.php' ?>

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

                                function getJSONData() {

                                    data = $.parseJSON(f);

                                    var struct = {
                                        "agency": {
                                            type: "string"
                                        },
                                        "vitrines": {
                                            type: "number"
                                        },
                                        "ca_vitrines": {
                                            type: "number"
                                        },
                                        "ca/jour": {
                                            type: "number"
                                        },
                                        "<100": {
                                            type: "number"
                                        },
                                        "100-200": {
                                            type: "number"
                                        },
                                        "200-300": {
                                            type: "number"
                                        },
                                        "300-400": {
                                            type: "number"
                                        },
                                        "400-500": {
                                            type: "number"
                                        },
                                        ">500": {
                                            type: "number"
                                        },

                                    }
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
                                                "uniqueName": "agency"
                                            }],
                                            "rows": [{
                                                "uniqueName": "agency"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "vitrines",
                                                    "caption": "Nbre vitrines",
                                                }, {
                                                    "uniqueName": "ca_vitrines",
                                                    "caption": "Ca vitrines",
                                                },
                                                {
                                                    "uniqueName": "ca/jour",
                                                    "caption": "Ca /vitrine/jour",
                                                },
                                                {
                                                    "uniqueName": "<100",
                                                    "caption": "<100",
                                                },
                                                {
                                                    "uniqueName": "100-200",
                                                    "caption": "100-200",
                                                },
                                                {
                                                    "uniqueName": "200-300",
                                                    "caption": "200-300",
                                                },
                                                {
                                                    "uniqueName": "300-400",
                                                    "caption": "300-400",
                                                },
                                                {
                                                    "uniqueName": "400-500",
                                                    "caption": "400-500",
                                                },
                                                {
                                                    "uniqueName": ">500",
                                                    "caption": ">300",
                                                },

                                            ]
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "SEGM DH TTC PAR FACTURE",
                                                "showHeaders": false,
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                                "name": "3dhvqfuq",
                                                "thousandsSeparator": " ",
                                                "decimalSeparator": ".",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "",
                                                "currencySymbolAlign": "left",
                                                "nullValue": "",
                                                "textAlign": "right",
                                                "isPercent": false
                                            },
                                            {
                                                "name": "precision",
                                                "decimalPlaces": 2,

                                            }, {
                                                "name": "3dhvwiax",
                                                "thousandsSeparator": " ",
                                                "decimalSeparator": ".",
                                                "decimalPlaces": 0,
                                                "currencySymbol": "",
                                                "currencySymbolAlign": "left",
                                                "nullValue": "",
                                                "textAlign": "right",
                                                "isPercent": false
                                            }
                                        ]
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