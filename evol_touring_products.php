<?php
$page_title = "Evol produits tournee";
$api_action = "productTournee";
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

                                    <?php include 'search_4_dates.php' ?>

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
                                var mapper = {}

                                function getJSONData() {

                                    data = $.parseJSON(f);

                                    var i = 1;
                                    data.forEach(e => {
                                        if (!mapper[e.product_name]) {
                                            mapper[e.product_name] = {
                                                "gamme": e.gamme,
                                                "famille": e.famille

                                            }
                                        }
                                        e.gamme_seq = i;
                                        e.famille_seq = i;
                                        i++
                                    })

                                    ret = []
                                    //<40	40-50	50-60	60-70	>70

                                    var struct = {
                                        "tournee": {
                                            type: "string"
                                        },
                                        
                                        "gamme_seq": {
                                            type: "number"
                                        },
                                        "famille_seq": {
                                            type: "number"
                                        },
                                        "product_name": {
                                            type: "string"
                                        },
                                        "ca1": {
                                            type: "number"
                                        },
                                        "ca2": {
                                            type: "number"
                                        },
                                        "sold_qtt1": {
                                            type: "number"
                                        },
                                        "sold_qtt2": {
                                            type: "number"
                                        },
                                        "lost1": {
                                            type: "number"
                                        },
                                        "lost2": {
                                            type: "number"
                                        },
                                        "famille": {
                                            type: "string"
                                        },
                                        "gamme": {
                                            type: "string"
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
                                                // "uniqueName": "Date"
                                            }],
                                            "rows": [{
                                                    "uniqueName": "product_name"
                                                },

                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [{
                                                    "uniqueName": "gamme_seq",
                                                    "caption": "gamme",
                                                },
                                                {
                                                    "uniqueName": "famille_seq",
                                                    "caption": "famille",
                                                },
                                                
                                                {
                                                    "uniqueName": "sold_qtt1",
                                                    "caption": "CA P1",

                                                },
                                                {
                                                    "uniqueName": "sold_qtt2",
                                                    "caption": "CA P2",

                                                },
                                                {
                                                    "uniqueName": "Evol_sold_qtt",
                                                    "caption": "Evol",
                                                    "formula": "\"sold_qtt2\" - \"sold_qtt1\""
                                                },
                                                {
                                                    "uniqueName": "Evol_sold_qtt%",
                                                    "caption": "%",
                                                    "formula": "if( (sum(\"sold_qtt1\") != 0) ,  (\"Evol_sold_qtt\" * 100)/abs(sum(\"sold_qtt1\") ,sum(\"sold_qtt1\") )",
                                                    "aggregation": "none",
                                                    "format": "precentForamt",
                                                },
                                                {
                                                    "uniqueName": "ca1",
                                                    "caption": "ca1",

                                                },

                                                {
                                                    "uniqueName": "ca2",
                                                    "caption": "ca2",

                                                },
                                                {
                                                    "uniqueName": "Evol",
                                                    "caption": "Evol",
                                                    "formula": "\"ca2\" - \"ca1\""

                                                },
                                                {
                                                    "uniqueName": "Evol%",
                                                    "caption": "%",
                                                    "formula": "if( (sum(\"ca1\") != 0) ,  (\"Evol\" * 100)/abs(sum(\"ca1\") ,sum(\"ca1\") )",
                                                    "aggregation": "none",
                                                    "format": "precentForamt",

                                                },
                                                {
                                                    "uniqueName": "lost1",
                                                    "caption": "Perte globale p1",

                                                },
                                                {
                                                    "uniqueName": "lost2",
                                                    "caption": "Perte globale p2",
                                                },
                                                {
                                                    "uniqueName": "EvolLost",
                                                    "caption": "Evol",
                                                    "formula": "\"lost2\" - \"lost1\""
                                                },
                                                {
                                                    "uniqueName": "EvolLost%",
                                                    "caption": "%",
                                                    "formula": "if( (sum(\"lost1\") != 0) ,  (\"EvolLost\" * 100)/abs(sum(\"lost1\") ,sum(\"lost1\") )",
                                                    "aggregation": "none",
                                                    "format": "precentForamt",
                                                },
                                            ],

                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo $page_title ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            "currencySymbol": "%",
                                            "currencySymbolAlign": "right"
                                        }]
                                    },

                                });

                                pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                    if (data.measure &&
                                        data.type != "header") {
                                        if (data.measure.uniqueName == "gamme_seq") {
                                            if (data.rows.length == 0) {
                                                cell.text = ""
                                            } else {
                                                cell.text = "" + mapper[data.rows[0].caption].gamme;
                                            }
                                        } else if (data.measure.uniqueName == "famille_seq") {
                                            if (data.rows.length == 0) {
                                                cell.text = ""
                                            } else {
                                                cell.text = "" + mapper[data.rows[0].caption].famille;
                                            }
                                        }
                                    }
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