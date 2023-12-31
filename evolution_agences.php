<?php
$page_title = "EVOLUTION par canal";
$api_action = "bulkEvolAgence";
$export_btn = true;
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
                            <div class="panel-body pn" id="panel-body">
                                <div class="ml15 ib va-m" id="toggle_sidemenu_r">
                                    <a href="#" id="aCliquer">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <script>
                            async function loadfile(f) {
                                let data = $.parseJSON(f);
                                buildTablesContainers(data);

                                function buildTablesContainers(data) {
                                    var index = 1;
                                    var mainContainer = $('#panel-body');
                                    $.each(data, function(key, element) {
                                        if (mainContainer && index <= 21) {
                                            var rowOutput = "";
                                            console.log(index);
                                            if (data[index]['div']) {
                                                rowOutput += '<div class="row wdr-table-container ' + (data[index]['expanded'] ? 'expanded' : 'not-expanded') + '">';
                                                if (data[index]['expanded']) {
                                                    rowOutput += '<div class="table1 col-xl-12 col-md-12 col-sm-12"><div class="wdr-component-box" id="wdr-component-' + data[index]['div'] + '"></div></div>';
                                                } else {
                                                    var nextTable = data[index + 1];
                                                    if (nextTable != null && !nextTable['expanded']) {
                                                        rowOutput += '<div class="table1 col-xl-5 col-md-5 col-sm-12"><div class="wdr-component-box" id="wdr-component-' + data[index]['div'] + '"></div></div>';
                                                        rowOutput += '<div class="spacer col-xl-2 col-md-2 col-sm-12" style="height: 40%;"></div>';
                                                        rowOutput += '<div class="table2 col-xl-5 col-md-5 col-sm-12"><div class="wdr-component-box" id="wdr-component-' + nextTable['div'] + '"></div></div>';
                                                    } else {
                                                        rowOutput += '<div class="table1 col-xl-12 col-md-12 col-sm-12"><div class="wdr-component-box" id="wdr-component-' + data[index]['div'] + '"></div></div>';
                                                    }
                                                    index++;
                                                }
                                                rowOutput += '</div>';

                                                console.log(rowOutput);
                                                mainContainer.append(rowOutput);
                                                rowOutput = "";
                                            }
                                        }
                                        index += 1;
                                    });


                                }



                                function getJSONData(data) {
                                    var struct = {
                                        "agence": {
                                            type: "string"
                                        },
                                        "gamme": {
                                            type: "string"
                                        },
                                        "produit": {
                                            type: "string"
                                        },
                                        "canal": {
                                            type: "string"
                                        },
                                        "av1": {
                                            type: "number"
                                        },
                                        "av2": {
                                            type: "number"
                                        },
                                        "amount1": {
                                            type: "number"
                                        },
                                        "amount2": {
                                            type: "number"
                                        },

                                    }
                                    data.unshift(struct);
                                    return data;
                                };


                                var tables = [];
                                var index = 0;
                                $.each(data, function(key, element) {
                                    tables.push(buildWebDataRocksTable(element, index))
                                    index++;
                                });

                                tables[0].on("reportcomplete", function() {
                                    tables[0].on("reportchange", function() {
                                        var currentConfig = tables[0].getReport();
                                        $.each(tables, function(key, element) {
                                            if (key != 0) {
                                                var elementConfig = element.getReport();
                                                elementConfig.slice.reportFilters = currentConfig.slice.reportFilters;
                                                element.setReport(elementConfig);
                                            }
                                        });
                                    });
                                });



                                function buildWebDataRocksTable(element, index) {
                                    console.log("wdr-component-" + element.div)
                                    return new WebDataRocks({
                                        container: "#wdr-component-" + element.div,
                                        toolbar: false,
                                        report: {
                                            dataSource: {
                                                "data": getJSONData(element.data)
                                            },
                                            "slice": {
                                                "reportFilters": [{
                                                        "uniqueName": "agence"
                                                    },
                                                    {
                                                        "uniqueName": "gamme"
                                                    },
                                                    {
                                                        "uniqueName": "produit"
                                                    },
                                                ],
                                                "rows": element.config.slice.rows,
                                                "columns": [{
                                                    "uniqueName": "Measures"
                                                }],
                                                "measures": element.config.slice.columns,
                                            },
                                            "expands": {
                                                "expandAll": true,
                                            },
                                            "options": {
                                                "configuratorButton": false,
                                                "grid": {
                                                    "title": element.name,
                                                    "showHeaders": false,
                                                    "type": "classic",
                                                    "showGrandTotals": "columns",
                                                    "showHierarchyCaptions": false,
                                                    "showFilter": (index == 0)
                                                },
                                                "showAggregationLabels": false
                                            },
                                            "formats": [{
                                                "name": "precentForamt",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "%",
                                                "currencySymbolAlign": "right"
                                            }, {
                                                "name": "precision",
                                                "decimalPlaces": 2,

                                            }]
                                        },

                                    });
                                }

                            }
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