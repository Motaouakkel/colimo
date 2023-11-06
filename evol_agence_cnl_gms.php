<?php
$page_title = "EVOLUTION AGENCES par CANAL ";
$api_action = "evolutioncanal";
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

                                    <?php include 'search_4_dates.php' ?>

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
                            function loadfile(f) {
                                var test = ""

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
                                        "canal": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "string"
                                        },
                                        "type2": {
                                            type: "string"
                                        },
                                        "amount1": {
                                            type: "number"
                                        },
                                        "amount2": {
                                            type: "number"
                                        },

                                    }

                                    // ret = []
                                    // data['data'].forEach(e => {
                                    //     if (e.type = 'DH TTC') {
                                    //         ret.push(e)
                                    //     }
                                    // });
                                    // test = ret[0].canal
                                    data['data'].unshift(struct);
                                    loadLSFiltersTemplate(data['filters']);
                                    return data['data'];
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
                                            "reportFilters": [

                                                {
                                                    "uniqueName": "canal",
                                                    "filter": {
                                                        "members": [
                                                            "canal." + test
                                                        ]
                                                    }
                                                },
                                                {
                                                    "uniqueName": "Gamme"
                                                },
                                                {
                                                    "uniqueName": "Produit"
                                                },
                                                {
                                                    "uniqueName": "type2",
                                                    "caption": "Type",
                                                    "filter": {
                                                        "members": [
                                                            "type2.ENLEV NET"
                                                        ]
                                                    }
                                                },
                                            ],
                                            "rows": [{
                                                "uniqueName": "Agence",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [{
                                                    "uniqueName": "amount1",
                                                    "caption": "PERIODE 1",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "amount2",
                                                    "caption": "PERIODE 2",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "amount_3",
                                                    "caption": "EVOLUTION",
                                                    "format": "precision",
                                                    "formula": "sum('amount2') -sum('amount1')"
                                                },
                                                {
                                                    "uniqueName": "% evolution",
                                                    "caption": "% evolution",
                                                    //to save againt division by zero
                                                    "formula": "IF(sum('amount1')=0,100,100*(sum('amount2') -sum('amount1'))/sum('amount1'))",
                                                    "format": "precentForamt"
                                                }
                                            ],

                                        },
                                        "expands": {
                                            "expandAll": true,
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?> ",
                                                "showHeaders": false,
                                                "type": "classic",
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false,
                                                "showFilter": false,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            
                                        }, {
                                            "name": "precision",
                                            "decimalPlaces": 2,
                                        }]
                                    },

                                });

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
                                });

                                function compare_filters(f1, f2) {
                                    filter1 = {}

                                    if (f1 != null) {
                                        f1.forEach(e => {
                                            filter1[e.uniqueName] = 1
                                        })
                                    }
                                    //check if element in f2 is in f1
                                    if (f2 != null) {
                                        f2.forEach(e => {
                                            if (filter1[e.uniqueName] == 1) {
                                                filter1[e.uniqueName] = 2
                                            }
                                        })
                                    }
                                    if (f1 != null && f2 != null) {
                                        if (f1.length != f2.length)
                                            return false
                                    }
                                    for (const [key, value] of Object.entries(filter1)) {
                                        if (value == 1) {
                                            return false
                                        }
                                    }
                                    return true
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