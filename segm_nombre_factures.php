<?php
$page_title = "Segmentation nombre de factures";
$api_action = "segmNombreFactures";
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
                                   
                                    console.log(data);
                                    ret = []
                                    data.forEach(item => {
                                        var a = {
                                            "<40": 0,
                                            "40-50": 0,
                                            "50-60": 0,
                                            "60-70": 0,
                                            ">70": 0,
                                        }
                                        if (item.nbr_inv < 40) {
                                            a["<40"]++;
                                        } else if (item.nbr_inv >= 40 && item.nbr_inv < 50) {
                                            a["40-50"]++;
                                        } else if (item.nbr_inv>= 50 && item.nbr_inv < 60) {
                                            a["50-60"]++;
                                        } else if (item.nbr_inv >= 60 && item.nbr_inv < 70) {
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
                                        "agency": {
                                            type: "string"
                                        },
                                        "nbr_inv": {
                                            type: "number"
                                        },
                                        "Secteur": {
                                            type: "string"
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
                                    customizeCell: customizeCellFunction,
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [],
                                            "rows": [{
                                                "uniqueName": "agency"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "nbr_inv",
                                                    "caption": "Nombre factures",
                                                    "aggregation": "sum",
                                                    
                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "caption": 	"Nombre de secteurs",
                                                    "aggregation": "count",
                                                },
                                                {
                                                    "uniqueName": "TourneeRatio",
                                                    "caption": "Nbr facture/tournee",
                                                    "formula": " sum(\"nbr_inv\") / count(\"Secteur\")",
                                                    "format": "3dhvwiax"
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
                                                "name": "3dhvwiax",
                                                "thousandsSeparator": " ",
                                                "decimalSeparator": ".",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "",
                                                "currencySymbolAlign": "left",
                                                "nullValue": "",
                                                "textAlign": "right",
                                                "isPercent": false
                                            }
                                        ]
                                    },

                                });
                                function customizeCellFunction(cell, data) {
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "TOTAL";
                                    }
                                }
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