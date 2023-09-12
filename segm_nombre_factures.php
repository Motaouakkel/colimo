<?php
$page_title = "Segmentation nombre de factures";
$api_action = "segfact";
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
                                    console.log("-------------------");
                                    console.log(data);
                                    ret = []
                                    //<40	40-50	50-60	60-70	>70
                                    data.forEach(item => {
                                        var a = {
                                            "<40": 0,
                                            "40-50": 0,
                                            "50-60": 0,
                                            "60-70": 0,
                                            ">70": 0,
                                        }
                                        if (item.CA < 40) {
                                            a["<40"]++;
                                        } else if (item.CA >= 40 && item.CA < 50) {
                                            a["40-50"]++;
                                        } else if (item.CA >= 50 && item.CA < 60) {
                                            a["50-60"]++;
                                        } else if (item.CA >= 60 && item.CA < 70) {
                                            a["60-70"]++;
                                        } else {
                                            a[">70"]++;
                                        }
                                        item = {
                                            ...item,
                                            ...a
                                        }
                                        ret.push(item)
                                    })
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "Date": {
                                            type: "string"
                                        },
                                        "CA": {
                                            type: "number"
                                        },
                                        "Client": {
                                            type: "string"
                                        },
                                        "tournee_id": {
                                            type: "number"
                                        },
                                        "tournee_name": {
                                            type: "string"
                                        },
                                        "secteur_id": {
                                            type: "number"
                                        },
                                        "agency_id": {
                                            type: "number"
                                        },
                                        "Remise": {
                                            type: "number"
                                        },
                                        "Sec_Scan": {
                                            type: "number"
                                        },
                                        "Duree": {
                                            type: "number"
                                        },
                                        "<40": {
                                            type: "number"
                                        },
                                        "40-50": {
                                            type: "number"
                                        },
                                        "50-60": {
                                            type: "number"
                                        },
                                        "60-70": {
                                            type: "number"
                                        },
                                        ">70": {
                                            type: "number"
                                        },

                                    }
                                    ret.unshift(struct);

                                    return ret;

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
                                                "uniqueName": "Date"
                                            }],
                                            "rows": [{
                                                "uniqueName": "Agence"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "CA",
                                                    "caption": "Nombre factures",
                                                    "aggregation": "count",
                                                    "format": "3dhvwiax"
                                                },
                                                {
                                                    "uniqueName": "tournee_id",
                                                    "caption": "Number of Tournees",
                                                    "aggregation": "distinctcount",
                                                },
                                                {
                                                    "uniqueName": "TourneeRatio",
                                                    "caption": "Tournee Ratio",
                                                    "formula": " count(\"CA\") / distinctcount(\"tournee_id\")",
                                                },
                                                {
                                                    "uniqueName": "<40",
                                                    "caption": "<40",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "40-50",
                                                    "caption": "40-50",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "50-60",
                                                    "caption": "50-60",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "60-70",
                                                    "caption": "60-70",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": ">70",
                                                    "caption": ">70",
                                                    "aggregation": "sum",
                                                },

                                            ]
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "SEGM NBRE FACTURES",
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