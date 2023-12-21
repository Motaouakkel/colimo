<?php
$page_title = "Historique Produit";
$api_action = "historyTourLosses";
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
                                <!-- HTML !-->

                                <style>
                                    /* CSS */
                                    .button-18 {
                                        align-items: center;
                                        background-color: #0A66C2;
                                        border: 0;
                                        border-radius: 100px;
                                        box-sizing: border-box;
                                        color: #ffffff;
                                        cursor: pointer;
                                        display: inline-flex;
                                        font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
                                        font-size: 16px;
                                        font-weight: 600;
                                        justify-content: center;
                                        line-height: 20px;
                                        max-width: 480px;
                                        min-height: 40px;
                                        min-width: 0px;
                                        overflow: hidden;
                                        padding: 0px;
                                        padding-left: 20px;
                                        padding-right: 20px;
                                        text-align: center;
                                        touch-action: manipulation;
                                        transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
                                        user-select: none;
                                        -webkit-user-select: none;
                                        vertical-align: middle;
                                    }

                                    .button-18:hover,
                                    .button-18:focus {
                                        background-color: #16437E;
                                        color: #ffffff;
                                    }

                                    .button-18:active {
                                        background: #09223b;
                                        color: rgb(255, 255, 255, .7);
                                    }

                                    .button-18:disabled {
                                        cursor: not-allowed;
                                        background: rgba(0, 0, 0, .08);
                                        color: rgba(0, 0, 0, .3);
                                    }
                                </style>
                                <div>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'')">Categorie</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Categorie')">Famille</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Famille')">Gamme</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Gamme')">Produit</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Produit')">Article</button>
                                </div>
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            var daysMapper = {}
                            var thepivot = null

                            function setCategorie(arg, arg2) {

                                arg.collapseAllData();
                                if (arg2 != '') {
                                    setTimeout(function() {
                                        arg.expandData(arg2);
                                    }, 15);
                                }

                            }

                            function loadfile(f) {
                                function getJSONData() {
                                    data = $.parseJSON(f);
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "canal": {
                                            type: "string"
                                        },
                                        "Categorie": {
                                            type: "string"
                                        },
                                        "Famille": {
                                            type: "string"
                                        },
                                        "Article": {
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
                                            type: "number"
                                        },
                                        "Bloc": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "number"
                                        },
                                        "unite": {
                                            type: "string"
                                        }
                                    }
                                    daysMapper = data["data"][1]
                                    data["data"][0].unshift(struct);
                                    loadLSFiltersTemplate(data['filters']);
                                    return data["data"][0];
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
                                                }, , {
                                                    "uniqueName": "canal",
                                                    "caption": "CANAL"
                                                }, {
                                                    "uniqueName": "type",
                                                    "filter": {
                                                        "members": [
                                                            "type.ENLEV NET"
                                                        ]
                                                    }
                                                },
                                                {
                                                    "uniqueName": "unite",
                                                    "filter": {
                                                        "members": [
                                                            "unite.DH TTC"
                                                        ]
                                                    }
                                                }
                                            ],
                                            "rows": [

                                                {
                                                    "uniqueName": "Categorie"
                                                },
                                                {
                                                    "uniqueName": "Famille"
                                                },
                                                {
                                                    "uniqueName": "Gamme"
                                                },
                                                {
                                                    "uniqueName": "Produit"
                                                },
                                                {
                                                    "uniqueName": "Article"
                                                }

                                            ],
                                            "columns": [{
                                                "uniqueName": "day",
                                                "formula": "sum(\"amout\")",
                                                "format": "precision"
                                            }],
                                            "measures": [{
                                                "uniqueName": "amout",
                                                "caption": "total",
                                                "format": "precision"
                                            }, ],
                                            "expands": {
                                                "expandAll": false,
                                            }
                                        },
                                        "options": {
                                            "grid": {
                                                "type": "compact",
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
                                                "decimalPlaces": 0,

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
                                thepivot = pivot1

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
                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
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