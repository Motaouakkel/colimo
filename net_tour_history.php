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
                                <div id="filters"></div>
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            var daysMapper = {}

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
                                            type: "number"
                                        },
                                        "Mt facture": {
                                            type: "number"
                                        },
                                        "unite": {
                                            type: "string"
                                        },
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "canal": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },


                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    daysMapper = data['data'][1]
                                    data['data'][0].unshift(struct);
                                    return data['data'][0];
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
                                                    "uniqueName": "unite",
                                                    "caption": "unite",
                                                    "filter": {
                                                        "members": [
                                                            "unite.DH TTC"
                                                        ]
                                                    }

                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },
                                                {
                                                    "uniqueName": "Agence",
                                                    "caption": "agence",
                                                }, {
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                }, {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },
                                                {
                                                    "uniqueName": "canal",
                                                    "caption": "canal",
                                                },
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                },



                                            ],
                                            "rows": [{
                                                    "uniqueName": "Agence",
                                                    "caption": "agence",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                }, {
                                                    "uniqueName": "Secteur",
                                                    "caption": "Secteur",
                                                },
                                            ],
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
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,

                                        }]
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