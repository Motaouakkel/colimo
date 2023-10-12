<?php
$page_title = "TOP RATIO LP PAR TOURNEE";
$api_action = "topratiolp";
include 'header.php';

?>

<body class="dashboard-page sb-l-o sb-r-c top-report">

    <!-- Start: Main -->
    <div id="main">
        <script src = "include.js"></script>
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
                                    <div class="col-md-2">
                                        <a type="submit" class="button btn-primary submit-btn" href="#" onclick="exportAndHandleData(piv,pin,'<?php echo $page_title ?>');">To Excel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <div class="ml15 ib va-m" id="toggle_sidemenu_r">
                                    <a href="#" id="aCliquer">
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="report-title col-xl-12 col-md-12 col-sm-12">
                                        <h3> <?php echo strtoupper($page_title) ?></h3>
                                    </div>
                                </div>
                                <div id="ls-filters" class="row ls-filters">

                                </div>
                                <div class="row">
                                    <div class="table1 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component"></div>
                                    </div>
                                    <div class="spacer col-xl-2 col-md-2 col-sm-12" style="height: 250%;">
                                    </div>
                                    <div class="table2 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component2"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <script>
                            var piv = null
                            var pin = null
                            function loadfile(f) {
                                function getJSONData() {
                                    data = $.parseJSON(f);
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "ratio": {
                                            type: "number"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "Bloc": {
                                            type: "string"
                                        },
                                    }
                                    data.unshift(struct);
                                    return data;
                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    //beforetoolbarcreated: customizeToolbar,
                                    customizeCell: customizeCellFunction,
                                    toolbar: false,
                                    height: 1000,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "Agence"
                                                },
                                                {
                                                    "uniqueName": "Bloc"
                                                },
                                                {
                                                    "uniqueName": "Secteur",
                                                    "filter": {
                                                        "quantity": 10,
                                                        "type": "top"
                                                    }
                                                },

                                            ],
                                            "rows": [{
                                                    "uniqueName": "Secteur"
                                                }


                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "ratio",
                                                "caption": "RATIO LP %",
                                                "format": "percent",
                                            }, ],
                                            "sorting":{
                                                "column" : {
                                                    "type": "desc",
                                                    "tuple": [],
                                                    "measure": "ratio"
                                                }
                                            },
                                            "expands": {
                                                "expandAll": true,
                                            }
                                        },
                                        "options": {
                                            "grid": {
                                                "type": "classic",
                                                "title": "TOP +",
                                                "showHeaders": false,
                                                "showGrandTotals": true,
                                                "showHierarchyCaptions": false,

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
                                                "name": "percent",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "%",


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
                                piv = pivot1
                                var pivot2 = new WebDataRocks({
                                    container: "#wdr-component2",
                                    customizeCell: customizeCellFunction,
                                    toolbar: false,

                                    height: 1000,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "Agence"
                                                },
                                                {
                                                    "uniqueName": "Bloc"
                                                },
                                                {
                                                    "uniqueName": "Secteur"
                                                },

                                            ],
                                            "rows": [{
                                                    "uniqueName": "Secteur"
                                                }


                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "ratio",
                                                    "caption": "RATIO LP %",
                                                    "format": "percent",
                                                },


                                            ],
                                            "sorting":{
                                                "column" : {
                                                    "type": "asc",
                                                    "tuple": [],
                                                    "measure": "ratio"
                                                }
                                            },
                                            "expands": {
                                                "expandAll": true,
                                            }
                                        },
                                        "options": {
                                            "grid": {
                                                "type": "classic",
                                                "title": "TOP -",
                                                "showHeaders": false,
                                                "showFilter": true,
                                                "showGrandTotals": true,
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
                                                "name": "percent",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "%",


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
                                pin = pivot2

                                function customizeCellFunction(cell, data) {
                                    let a = 1;
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


                                pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "Total";
                                    }
                                });

                                srcDemo = null
                                pivot1.on("reportcomplete", function() {
                                    var sourceFiltersContainer = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                    srcDemo = sourceFiltersContainer;
                                    var targetFiltersContainer = document.getElementById("ls-filters");
                                    while(targetFiltersContainer.firstChild){
                                        targetFiltersContainer.removeChild(targetFiltersContainer.firstChild)
                                    }
                                    var elementParent = sourceFiltersContainer.parentElement;                                 
                                    elementParent.removeChild(sourceFiltersContainer);
                                    sourceFiltersContainer.classList.remove("wdr-ui-hgroup")
                                    var secondElement = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                    secondparent = secondElement.parentElement;
                                    srcDemo = secondElement; 
                                    secondparent.removeChild(secondElement);
                                    targetFiltersContainer.appendChild(sourceFiltersContainer);      
                                    pivot1.on("reportchange", function() {
                                        while(document.querySelector(".wdr-filters.wdr-ui-hgroup")){
                                                var srcFiltersContainer = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                                var Parent =  srcFiltersContainer.parentElement;
                                                Parent.removeChild(srcFiltersContainer);
                                            }
                                        var currentConfigP1 = pivot1.getReport();
                                        var currentConfigP2 = pivot2.getReport();
                                        currentConfigP2.slice.measures.forEach(m => {
                                            if (m.uniqueName == 'ratio') {
                                                m.caption = "RATIO LP %"
                                            }
                                        })
                                        currentConfigP2.slice.reportFilters = currentConfigP1.slice.reportFilters;
                                        currentConfigP2.options.grid["showFilter"]=  true,
                                            pivot2.setReport(currentConfigP2);
                                            document.getElementById("wdr-grid-view").appendChild(srcDemo);
                                        pivot2.setReport(currentConfigP2);
                                    });
                                });
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