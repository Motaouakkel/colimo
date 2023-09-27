<?php
$page_title = "Affectation vendeurs tournees";
$api_action = "assignmentSellerTours";
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
                                var tournee_pivot = [];

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var tournee = {};

                                    try {
                                        if (data[0].tournee != undefined) {
                                            data[0].tournee.forEach(tr => {
                                                tournee_pivot.push({
                                                    "uniqueName": tr,
                                                    "caption": tr,
                                                })
                                                tournee[tr] = {
                                                    type: "number"
                                                }

                                            })
                                        }
                                    } catch (e) {
                                        console.log("");
                                    }
                                    var struct = {
                                        "agency": {
                                            type: "string"
                                        },
                                        "vendeur": {
                                            type: "string"
                                        },
                                        "nombre de jours": {
                                            type: "number"
                                        },
                                        "journee affectation": {
                                            type: "number"
                                        },
                                        "tournee affectation": {
                                            type: "number"
                                        },
                                        ...tournee
                                    }
                                    data.unshift(struct);

                                    return data;

                                };

                                dataSource = getJSONData()

                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    beforetoolbarcreated: customizeToolbar,
                                    toolbar: true,

                                    report: {
                                        dataSource: {
                                            "data": dataSource
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                "uniqueName": "agency",
                                                "caption": "agence",

                                            }, {
                                                "uniqueName": "vendeur"
                                            }],
                                            "rows": [{
                                                "uniqueName": "vendeur",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "nombre de jours",
                                                    "caption": "Total jours periode",
                                                    "format": "3dhvwiax",
                                                }, {
                                                    "uniqueName": "journee affectation",
                                                    "caption": "Total jours affectation",
                                                },
                                                {
                                                    "uniqueName": "tournee affectation",
                                                    "caption": "Nbre tournees affectation",
                                                }, ...tournee_pivot,

                                            ]
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "off",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false,

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