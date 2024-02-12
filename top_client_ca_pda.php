<?php
$page_title = "EVOLUTION CA TOP 10 CLIENTS PDA";
$api_action = "topcaclientpda";
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

                                function getJSONData() {

                                    data = $.parseJSON(f);
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
                                        
                                        "secteur": {
                                            type: "string"
                                        },
                                       
                                        "ca1": {
                                            type: "number"
                                        },
                                        "ca2": {
                                            type: "number"
                                        },
                                        

                                    }
                                    loadLSFiltersTemplate(data['filters']);
                                    data['data'].unshift(struct);
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
                                            "reportFilters": [{
                                                    "uniqueName": "agence"
                                                },
                                                {
                                                    "uniqueName": "responsable"
                                                }
                                                ,{
                                                    "uniqueName": "secteur",
                                                   
                                                },
                                                {
                                                "uniqueName": "gamme",
                                            }, {
                                                "uniqueName": "produit",
                                            },

                                               
                                            ],
                                            "sorting": {
                                                "column": {
                                                    "type": "desc",
                                                    "tuple": [],
                                                    "measure": "ca2",
                                                    
                                                }
                                            },
                                            "rows": [ {
                                                "uniqueName": "secteur",
                                                
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures",
                                               
                                            }],

                                            "measures": [{
                                                    "uniqueName": "ca1",
                                                    "caption": "CA DH/J P1",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "ca2",
                                                    "caption": "CA DH/J P2",
                                                    "format": "precision",
                                                   
                                                },
                                                {
                                                    "uniqueName": "amount_3",
                                                    "caption": "EVOLUTION",
                                                    "format": "precision",
                                                    "formula": "sum(\"ca2\")- sum(\"ca1\")"
                                                },
                                                {
                                                    "uniqueName": "% evolution",
                                                    "caption": "%",
                                                    //to save againt division by zero
                                                    "formula": "IF(sum('ca1')=0,100,(100*(sum('ca2') -sum('ca1')))/sum('ca1'))",
                                                    "format": "precentForamt"

                                                }

                                                
                                            ],
                                            "expands": {
                                                "expandAll":false,
                                            },
                                        },

                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
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
                                            "decimalPlaces": 0,

                                        }]
                                    },

                                });

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
                                });

                                pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "TOTAL";
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