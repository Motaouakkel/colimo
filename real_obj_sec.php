<?php
$page_title = "TAUX REALISATION OBJECTIFS VENTES NETTES AGENCES	DH TTC";
$api_action = "salesgoal";
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
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            function loadfile(f) {
                                var test = ""

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var struct = {
                                        "agency": {
                                            type: "string"
                                        },
                                        "bloc":{
                                            type : "string"
                                        },
                                        "sector": {
                                            type: "string"
                                        },
                                        "goal":{
                                            type: "number"
                                        },
                                        "taxed_amount":{
                                            type: "number"
                                        },
                                                        
                                    }
                                    
                                    loadLSFiltersTemplate(data['filters']);
                                    data['data'].unshift(struct);
                                    return data['data'];
                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                   // beforetoolbarcreated: customizeToolbar,
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        
                                        "slice": {
                                            "reportFilters": [
                                                {
                                                "uniqueName": "agency",
                                                "caption": "AGENCE"
                                            },
                                            {
                                                "uniqueName": "sector",
                                                "caption": "SECTEUR"

                                            }
                                            ],
                                            "rows": [{
                                                "uniqueName": "agency",
                                                "caption": "AGENCE"
                                            },
                                            {
                                                "uniqueName": "bloc",
                                                "caption": "BLOC"

                                            },
                                            {
                                                "uniqueName": "sector",
                                                "caption": "SECTEUR"

                                            }
                                        ],
                                            "columns": [
                                                {
                                                    "uniqueName": "Measures",
                                                }
                                            ],

                                            "measures": [
                                                {
                                                    "uniqueName": "goal",
                                                    "caption": "OBJECTIF",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "taxed_amount",
                                                    "caption": "REALISATION",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                
                                                {
                                                    "uniqueName": "percent",
                                                    "caption": "%",
                                                    "formula": "100*(sum('taxed_amount'))/sum('goal'))",
                                                    "format": "precentForamt"
                                                },
                                                {
                                                    "uniqueName": "amount_3",
                                                    "caption": "RESTE A FAIRE MOIS",
                                                    "format": "precision",
                                                    "formula": "sum('goal') -sum('taxed_amount')"
                                                }
                                            ],
                                            "expands": {
                                            "expandAll": true,
                                        },

                                        },
                                        
                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?> " ,
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

                                        },{
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