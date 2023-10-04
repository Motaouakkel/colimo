<?php
$page_title = "Segm dh ttc par facture";
$api_action = "segfact";
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

                                    ret = []
                                    data.forEach(item => {
                                        var a = {
                                            "<100": 0,
                                            "100-150": 0,
                                            "150-200": 0,
                                            "200-250": 0,
                                            "250-300": 0,
                                            ">300": 0,
                                        }
                                        if (item.CA < 100) {
                                            a["<100"]++;
                                        } else if (item.CA >= 100 && item.CA < 150) {
                                            a["100-150"]++;
                                        } else if (item.CA >= 150 && item.CA < 200) {
                                            a["150-200"]++;
                                        } else if (item.CA >= 200 && item.CA < 250) {
                                            a["200-250"]++;
                                        } else if (item.CA >= 250 && item.CA < 300) {
                                            a["250-300"]++;
                                        } else {
                                            a[">300"]++;
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
                                        "CA/DAYS":{
                                            type: "number"
                                        
                                        },
                                        
                                        "<100": {
                                            type: "number"
                                        },
                                        "100-150": {
                                            type: "number"
                                        },
                                        "150-200": {
                                            type: "number"
                                        },
                                        "200-250": {
                                            type: "number"
                                        },
                                        "250-300": {
                                            type: "number"
                                        },
                                        ">300": {
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
                                            "reportFilters": [],
                                            "rows": [{
                                                "uniqueName": "Agence"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "CA/DAYS",
                                                    "caption": "CA NET TTC",
                                                    "aggregation": "sum",
                                                    "format": "precision",
                                                }, {
                                                    "uniqueName": "total des factures",
                                                    "caption": "NOMBRE FACTURES",
                                                    "formula": "count(\"CA\")",
                                                },
                                                {
                                                    "uniqueName": "TTCRatio",
                                                    "caption": "DH TTC/FACTURE",
                                                    "format": "precision",
                                                    "formula": "sum(\"CA\")/count(\"CA\")",
                                                },
                                                {
                                                    "uniqueName": "<100",
                                                    "caption": "<100",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "100-150",
                                                    "caption": "100-150",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "150-200",
                                                    "caption": "150-200",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "200-250",
                                                    "caption": "200-250",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "250-300",
                                                    "caption": "250-300",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": ">300",
                                                    "caption": ">300",
                                                    "aggregation": "sum",
                                                },

                                            ]
                                        },
                                        "options": {
                                            grandTotalCaption: "Total",
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