<?php
$page_title = "Segmentation frequence vente cl";
$api_action = "segsalesfreq";
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
                                        "name": {
                                            type: "string"
                                        },
                                        "tournee": {
                                            type: "number"
                                        },
                                        "date": {
                                            type: "string"
                                        },
                                        "total": {
                                            type: "number"
                                        },
                                        "<20": {
                                            type: "number"
                                        },
                                        "20-35": {
                                            type: "number"
                                        },
                                        "35-50": {
                                            type: "number"
                                        },
                                        "50-65": {
                                            type: "number"
                                        },
                                        "65-80": {
                                            type: "number"
                                        },
                                        ">80": {
                                            type: "number"
                                        }
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
                                                "uniqueName": "date",
                                            }],
                                            "rows": [{
                                                "uniqueName": "name"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "tournee",
                                                    "caption": "Nmbre Tourness"
                                                },
                                                {
                                                    "uniqueName": "total",
                                                    "caption": "Frequence moy",
                                                    "aggregation": "average",
                                                    "format": "precision",
                                                },
                                                {
                                                    "uniqueName": "<20",
                                                    "caption": "<20%",
                                                    "aggregation": "average",
                                                },
                                                {
                                                    "uniqueName": "20-35",
                                                    "caption": "20-35%",
                                                    "aggregation": "average",
                                                },
                                                {
                                                    "uniqueName": "35-50",
                                                    "caption": "35-50%",
                                                    "aggregation": "average",
                                                },
                                                {
                                                    "uniqueName": "50-65",
                                                    "caption": "50-65%",
                                                    "aggregation": "average",
                                                },
                                                {
                                                    "uniqueName": "65-80",
                                                    "caption": "65-80%",
                                                    "aggregation": "average",
                                                },
                                                {
                                                    "uniqueName": ">80",
                                                    "caption": ">80%",
                                                    "aggregation": "average",
                                                },
                                            ]
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
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

                                            },
                                            {
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