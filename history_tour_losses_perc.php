<?php
$page_title = "Historique pertes par secteur ( % )";
$api_action = "historyTourLossesperc";
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
                                <div id="filters"></div>
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            var daysMapper = {}

                            function loadfile(f) {
                                function getJSONData() {
                                    data = $.parseJSON(f);
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "amout": {
                                            type: "number"
                                        },
                                        "day": {
                                            type: "string"
                                        },
                                        "Bloc": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "string"
                                        },
                                        "enlev_net": {
                                            type: "number"
                                        },
                                        "canal": {
                                            type: "string"
                                        },
                                        "unite": {
                                            type: "string"
                                        }
                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    daysMapper = data['data'][1]
                                    data['data'][0].unshift(struct);
                                    return data['data'][0];
                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    customizeCell: customizeCellFunction,
                                    beforetoolbarcreated: customizeToolbar,
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                "uniqueName": "Agence"
                                            }, {
                                                "uniqueName": "Secteur"
                                            }, {
                                                "uniqueName": "Bloc"
                                            }, {
                                                "uniqueName": "unite",
                                                "filter": {
                                                    "members": [
                                                        "unite.DH TTC"
                                                    ]
                                                }
                                            }, {
                                                "uniqueName": "Gamme"
                                            }, {
                                                "uniqueName": "Produit"
                                            }, {
                                                "uniqueName": "type"
                                            }, {
                                                "uniqueName": "canal"
                                            }],
                                            "rows": [{
                                                    "uniqueName": "Agence"
                                                },
                                                {
                                                    "uniqueName": "Bloc"
                                                }, {
                                                    "uniqueName": "Secteur"
                                                },

                                            ],
                                            "columns": [{
                                                "uniqueName": "day",

                                                "format": "precision",

                                            }],
                                            "measures": [{
                                                "uniqueName": "tttttt",
                                                "caption": "total",
                                                "formula": "abs(sum(\"amout\")/sum(\"enlev_net\")) * 100",
                                                "format": "precision",

                                            }, ],
                                            "expands": {
                                                "expandAll": false,
                                            }
                                        },
                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "type": "classic",
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": true,
                                                "showHierarchyCaptions": false,
                                                "showFilter": false,
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
                                        ],
                                    },

                                });

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");

                                });


                                function customizeCellFunction(cell, data) {
                                    if (data.rowIndex == 0 && data.columnIndex != 0 && data.label != '') {
                                        var str = daysMapper[parseInt(data.label)];

                                        if (str) {
                                            arr = str.split('/');
                                            cell.text = arr[0] + '/' + arr[1];
                                        }
                                    }
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "GLOBAL";
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