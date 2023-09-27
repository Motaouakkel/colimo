<?php
$page_title = "Historique ca net par secteur";
$api_action = "netTourHistory";
include 'header.php';
?>

<body class="dashboard-page sb-l-o sb-r-c">
    <div id="main">
        <?php include 'sidebar_left.php'; ?>
        <section id="content_wrapper">
            <?php include 'bread_crumbs.php'; ?>
            <section id="content" class="animated fadeIn">
                <div class="admin-panels fade-onload sb-l-o-full">
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
                                var maper = []

                                function getJSONData() {

                                    glob = $.parseJSON(f);
                                    data = glob

                                    var struct = {
                                        "BLOC": {
                                            type: "string"
                                        },
                                        "Agence": {
                                            type: "string"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "tournnee": {
                                            type: "string"
                                        },
                                        "day": {
                                            type: "string"
                                        },
                                        "Mt facture": {
                                            type: "number"
                                        },

                                    }
                                    maper = data;
                                    data.unshift(struct);

                                    return data;

                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    customizeCell: customizeCellFunction,
                                    // beforetoolbarcreated: customizeToolbar,
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },
                                                {
                                                    "uniqueName": "Agence",
                                                    "caption": "agence",
                                                }, {
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                },
                                            ],
                                            "rows": [
                                                {
                                                    "uniqueName": "Agence",
                                                    "caption": "agence",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                },{
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },],
                                                "expands": {
                                                "expandAll": true,
                                            },
                                            "columns": [{
                                                "uniqueName": "day",
                                                "formula": "sum(\"Mt facture\")"
                                            }],
                                            "measures": [{
                                                "uniqueName": "Mt facture",
                                                "caption": "total"
                                            }, ],
                                        },
                                        "options": {
                                            "grid": {
                                                "type": "classic",
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": true,
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
                                function customizeCellFunction(cell, data) {
                                    let a = 1;
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "TOTAL";
                                    }
                                }

                                // function pivotcallback(pivot1) {
                                //     pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                //         var i = 0
                                //         cell2 = pivot1.getCell(data.rowIndex, 0)
                                //         if (data.type == "header" && i == 0) {
                                //             if (data.columnIndex == 1 && data.label == "-1") {
                                //                 cell.text = "SECTEUR"
                                //             } else if (data.columnIndex == 2 && data.label == "0") {
                                //                 cell.text = "TOURNEE"
                                //             }
                                //             i++
                                //         }

                                //         if (data.columnIndex == 1 && data.rowIndex != 0) {
                                //             var a = cell2.label
                                //             var b = a.split("/")[1]
                                //             cell.text = b
                                //         }

                                //         if (data.columnIndex == 2 && data.rowIndex != 0) {
                                //             var a = cell2.label
                                //             var b = a.split("/")[2]
                                //             cell.text = b
                                //         }

                                //         if (data.columnIndex == 0 && data.rowIndex != 0 && !data.isGrandTotalRow) {
                                //             var a = data.label
                                //             cell.text = a.split("/")[0]
                                //         }

                                //     });
                                // }
                                // pivotcallback(pivot1)

                                function customizeToolbar(toolbar) {
                                    var tabs = toolbar.getTabs(); // get all tabs from the toolbar
                                    toolbar.getTabs = function() {
                                        delete tabs[1];
                                        delete tabs[0]; // delete the first tab
                                        return tabs;
                                    }
                                }

                            }

                            loaddate();
                        </script>


                    </div>


            </section>

        </section>

        <?php include 'sidebar_right.php'; ?>
    </div>




</body>
<?php include 'footer.php'; ?>

</html>