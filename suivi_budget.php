<?php
$page_title = "SUIVI BUDGET";
$api_action = "suiviBudg";
include 'header.php';
?>

<body class="dashboard-page sb-l-o sb-r-c">
    <script src="include.js"></script>
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
                                <div id="filters"></div>
                                <div class="column">
                                    
                                            <div style="height: 100%;"><div id="wdr-component" ></div></div>
                                            
                                        
                                        
                                       
                                            <div style="height: 100%;"><div id="wdr-component2" ></div></div>
                                       
                                        <<div style="height: 100%;"><div id="wdr-component3" ></div></div>
                                    
                                </div>
                            </div>
                        </div>
                        <script>
                            var piv = null
                            var pin = null

                            function loadfile(f) {

                                var maper = []

                                function getJSONData(i) {

                                    data = $.parseJSON(f);



                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        
                                        "canal": {
                                            type: "string"
                                        },
                                        
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "BUDGET": {
                                            type: "number"
                                        },
                                        "N": {
                                            type: "number"
                                        },
                                        "N_1": {
                                            type: "number"
                                        },
                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    datas = data["data"]
                                    datas[i].unshift(struct);
                                    return datas[i];

                                };

                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    toolbar: false,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData(0)
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "Agence",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "canal",
                                                    "caption": "canal",
                                                },
                                                
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Gamme"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "N_1",
                                                "caption": "N-1",
                                                "format": "precentForamt"
                                                
                                                
                                            },
                                            {
                                                "uniqueName": "BUDGET",
                                                "caption": "BUDGET",
                                                "format": "precentForamt"
                                                
                                            },
                                            {
                                                "uniqueName": "N",
                                                "caption": "REEL N",
                                                "format": "precentForamt"
                                                
                                            },
                                            {
                                                "uniqueName": "N-N-1",
                                                "caption": "N-N-1",
                                                "format": "precentForamt",
                                                "formula": "(sum('N') - sum('N_1'))"
                                            },
                                            {
                                                "uniqueName": "%N-N-1",
                                                "caption": "%",
                                                "format": "precentForamt",
                                                "formula": "IF(sum('N_1') = 0,sum('N'),((sum('N') / sum('N_1') ) *100))"
                                            },
                                            {
                                                "uniqueName": "N-B",
                                                "caption": "N-B",
                                                "format": "precentForamt",
                                                "formula":  "(sum('N') - sum('BUDGET'))"
                                            },
                                            {
                                                "uniqueName": "%N_B",
                                                "caption": "%",
                                                "format": "precentForamt",
                                                "formula": "IF(sum('BUDGET') = 0,sum('N'),((sum('N') / sum('BUDGET') ) *100))"
                                            },
                                            
                                        ],
                                            
                                        },

                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "title": "JOUR",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false,
                                                "showFilter": true,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            
                                        }]
                                    },
                                });
                                piv = pivot1

                                var pivot2 = new WebDataRocks({
                                    container: "#wdr-component2",
                                    toolbar: false,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData(1)
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "Agence",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "canal",
                                                    "caption": "canal",
                                                },
                                                
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Gamme"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "N_1",
                                                "caption": "N-1",
                                                "format": "precentForamt"
                                                
                                                
                                            },
                                            {
                                                "uniqueName": "BUDGET",
                                                "caption": "BUDGET",
                                                "format": "precentForamt"
                                                
                                            },
                                            {
                                                "uniqueName": "N",
                                                "caption": "REEL N",
                                                "format": "precentForamt"
                                                
                                            },
                                            {
                                                "uniqueName": "N-N-1",
                                                "caption": "N-N-1",
                                                "format": "precentForamt",
                                                "formula": "(sum('N') - sum('N_1'))"
                                            },
                                            {
                                                "uniqueName": "%N-N-1",
                                                "caption": "%",
                                                "format": "precentForamt",
                                                "formula": "IF(sum('N_1') = 0,sum('N'),((sum('N') / sum('N_1') ) *100))"
                                            },
                                            {
                                                "uniqueName": "N-B",
                                                "caption": "N-B",
                                                "format": "precentForamt",
                                                "formula":  "(sum('N') - sum('BUDGET'))"
                                            },
                                            {
                                                "uniqueName": "%N_B",
                                                "caption": "%",
                                                "format": "precentForamt",
                                                "formula": "IF(sum('BUDGET') = 0,sum('N'),((sum('N') / sum('BUDGET') ) *100))"
                                            },
                                            
                                        ],
                                            
                                        },

                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "title": "MTD",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false,
                                                "showFilter": true,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            
                                        }]
                                    },
                                });
                                var pivot3 = new WebDataRocks({
                                    container: "#wdr-component3",
                                    toolbar: false,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData(2)
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "Agence",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "canal",
                                                    "caption": "canal",
                                                },
                                                
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "Gamme"
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                "uniqueName": "N_1",
                                                "caption": "N-1",
                                                "format": "precentForamt"
                                                
                                                
                                            },
                                            {
                                                "uniqueName": "BUDGET",
                                                "caption": "BUDGET",
                                                "format": "precentForamt"
                                                
                                            },
                                            {
                                                "uniqueName": "N",
                                                "caption": "REEL N",
                                                "format": "precentForamt"
                                                
                                            },
                                            {
                                                "uniqueName": "N-N-1",
                                                "caption": "N-N-1",
                                                "format": "precentForamt",
                                                "formula": "(sum('N') - sum('N_1'))"
                                            },
                                            {
                                                "uniqueName": "%N-N-1",
                                                "caption": "%",
                                                "format": "precentForamt",
                                                "formula": "IF(sum('N_1') = 0,sum('N'),((sum('N') / sum('N_1') ) *100))"
                                            },
                                            {
                                                "uniqueName": "N-B",
                                                "caption": "N-B",
                                                "format": "precentForamt",
                                                "formula":  "(sum('N') - sum('BUDGET'))"
                                            },
                                            {
                                                "uniqueName": "%N_B",
                                                "caption": "%",
                                                "format": "precentForamt",
                                                "formula": "IF(sum('BUDGET') = 0,sum('N'),((sum('N') / sum('BUDGET') ) *100))"
                                            },
                                            
                                        ],
                                            
                                        },

                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "title": "YTD",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false,
                                                "showFilter": true,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            
                                        }]
                                    },
                                });
                                pin = pivot2;
                                pit = pivot3

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
                                });

                                pivot2.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot2.getMeasures().concat(pivot2.getRows()));
                                    applayLSFilters(pivot2, captionsMapper);
                                    pivot2.off("reportcomplete");
                                });
                                pivot3.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot3.getMeasures().concat(pivot3.getRows()));
                                    applayLSFilters(pivot3, captionsMapper);
                                    pivot3.off("reportcomplete");
                                });

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