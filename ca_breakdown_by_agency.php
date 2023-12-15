<?php
$page_title = "Decomposition ca par agence";
$api_action = "caBreakdownByAgency";
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
                                <div class="row">
                                    <div id="wdr-component"></div>
                                </div>

                            </div>
                        </div>
                        <script>
                            function loadfile(f) {
                                var maper = []

                                function getJSONData() {


                                    data = $.parseJSON(f);

                                    var struct = {
                                        "AGENCE": {
                                            type: 'string'
                                        },
                                        "CANAL": {
                                            type: 'string'
                                        },
                                        'CA_AVRM': {
                                            type: 'number'
                                        },
                                        'CENET': {
                                            type: 'number'
                                        },
                                        'COUT VAR': {
                                            type: 'number'
                                        },
                                        'DEG': {
                                            type: 'number'
                                        },
                                        'ENL_BRU': {
                                            type: 'number'
                                        },
                                        'ENL_NET': {
                                            type: 'number'
                                        },
                                        'INV': {
                                            type: 'number'
                                        },
                                        'PC': {
                                            type: 'number'
                                        },
                                        'PCA': {
                                            type: 'number'
                                        },
                                        'PG': {
                                            type: 'number'
                                        },
                                        'PROM': {
                                            type: 'number'
                                        },
                                        'PT': {
                                            type: 'number'
                                        },
                                        'RFM': {
                                            type: 'number'
                                        },
                                        'RMGB': {
                                            type: 'number'
                                        },
                                        'RMPER': {
                                            type: 'number'
                                        },
                                        'RSF': {
                                            type: 'number'
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
                                                'uniqueName': 'CANAL'
                                            }, ],
                                            "rows": [{
                                                'uniqueName': 'AGENCE'
                                            }, ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    'uniqueName': 'ENL_BRU',
                                                    'caption': 'ENLEVEMENT BRUT',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': 'INV',
                                                    'caption': 'INVENDU',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%INV',
                                                    'caption': '%INVENDU',
                                                    'formula': '((sum(\"INV\")/sum(\"ENL_BRU\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'ENL_NET',
                                                    'caption': 'ENLEVEMENT NET',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': 'PC',
                                                    'caption': 'PERTE COMMERCIAL',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%PC',
                                                    'caption': '% PERTE COMMERCIAL',
                                                    'formula': '((sum(\"PC\")/sum(\"ENL_NET\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'PT',
                                                    'caption': 'PERTE COMMERCIAL',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%PT',
                                                    'caption': '%PERTE COMMERCIAL',
                                                    'formula': '((sum(\"PT\")/sum(\"ENL_NET\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'PCA',
                                                    'caption': 'PERTE CAMION',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%PCA',
                                                    'caption': '%PERTE CAMION',
                                                    'formula': '((sum(\"PCA\")/sum(\"ENL_NET\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'PG',
                                                    'caption': 'PERTE GLOBALE',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%PG',
                                                    'caption': '%PERTE GLOBALE',
                                                    'formula': '((sum(\"PG\")/sum(\"ENL_NET\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'CA_AVRM',
                                                    'caption': 'CA NET AVANT REMISES',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': 'RFM',
                                                    'caption': "RFM",
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%RFM',
                                                    'caption': '%RFM',
                                                    'formula': '((sum(\"RFM\")/sum(\"CA_AVRM\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'RSF',
                                                    'caption': "RSF",
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%RSF',
                                                    'caption': '%RSF',
                                                    'formula': '((sum(\"RSF\")/sum(\"CA_AVRM\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'PROM',
                                                    'caption': 'PROMOTION',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%PROM',
                                                    'caption': '%PROMOTION',
                                                    'formula': '((sum(\"PROM\")/sum(\"CA_AVRM\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'RMGB',
                                                    'caption': 'REMISE GLOBALE',
                                                    'format': 'precision'
                                                },
                                                {
                                                    'uniqueName': '%RMGB',
                                                    'caption': '%REMISE GLOBALE',
                                                    'formula': '((sum(\"RMGB\")/sum(\"CA_AVRM\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'RMPER',
                                                    'caption': 'REMISE + PERTE',
                                                    'format': 'precision'
                                                    
                                                },
                                                {
                                                    'uniqueName': '%RMPER',
                                                    'caption': '%REMISE + PERTE',
                                                    'formula': '(((sum(\"RMGB\")+ sum(\"PG\"))/sum(\"ENL_NET\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'COUT VAR',
                                                    'caption': 'TOTAL COUT VAR',
                                                    'format': 'precision'
                                                    
                                                },
                                                {
                                                    'uniqueName': '%COUT VAR',
                                                    'caption': '%TOTAL COUT VAR',
                                                    'formula': '((sum(\"COUT VAR\")/sum(\"CA_AVRM\")) * 100)',
                                                    'format': 'precentForamt'
                                                },
                                                {
                                                    'uniqueName': 'CENET',
                                                    'caption': 'CA NET',
                                                    'format': 'precision'
                                                },

                                            ],
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": true,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": true,
                                                "type": "classic",
                                                "showFilter": true,
                                                "showReportFiltersArea": true
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                        },{
                                            "name": "precision",
                                            "decimalPlaces": 0,
                                        }]
                                    },

                                });

                                function customizeToolbar(toolbar) {
                                    var tabs = toolbar.getTabs();
                                    toolbar.getTabs = function() {
                                        delete tabs[1];
                                        delete tabs[0];
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