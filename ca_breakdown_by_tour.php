<?php
$page_title = "Decomposition ca par secteur";
$api_action = "caBreakdownByTour";
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
                                        "BLOC": {
                                            type: 'string'
                                        },
                                        "SECTEUR": {
                                            type: 'string'
                                        },
                                        'ENLEVEMENT BRUT': {
                                            type: 'number'
                                        },
                                        "INVENDU": {
                                            type: 'number'
                                        },
                                        '% INV': {
                                            type: 'number'
                                        },
                                        'ENLEVEMENT NET': {
                                            type: 'number'
                                        },
                                        'PERTE COMMERCIAL': {
                                            type: 'number'
                                        },
                                        '% PC': {
                                            type: 'number'
                                        },
                                        'PERTE TECHNIQUE': {
                                            type: 'number'
                                        },
                                        '% PT': {
                                            type: 'number'
                                        },
                                        'PERTE CAMION': {
                                            type: 'number'
                                        },
                                        '% PCAM': {
                                            type: 'number'
                                        },
                                        'PERTE GLOBALE': {
                                            type: 'number'
                                        },
                                        '% PG': {
                                            type: 'number'
                                        },
                                        'CA NET avant remise': {
                                            type: 'number'
                                        },
                                        "RFM": {
                                            type: 'number'
                                        },
                                        '% RFM': {
                                            type: 'number'
                                        },
                                        "RSF": {
                                            type: 'number'
                                        },
                                        '% RSF': {
                                            type: 'number'
                                        },
                                        "PROMOTION": {
                                            type: 'number'
                                        },
                                        '% PROMO': {
                                            type: 'number'
                                        },
                                        'REMISE GLOBALE': {
                                            type: 'number'
                                        },
                                        '% REMISE GLOBALE': {
                                            type: 'number'
                                        },
                                        'CA NET': {
                                            type: 'number'
                                        },
                                        
                                    }
                                    data.unshift(struct);
                                    console.log(data);
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
                                            "reportFilters": [
                                               
                                                {
                                                    "uniqueName": "AGENCE",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "SECTEUR",
                                                    "caption": "SECTEUR",
                                                }
                                                ,{
                                                    "uniqueName": "BLOC",
                                                    "caption": "BLOC",
                                                },
                                                
                                            ],
                                            "rows": [
                                                {
                                                    "uniqueName": "AGENCE"
                                                },
                                                {
                                                    "uniqueName": "BLOC"
                                                },
                                                {
                                                    "uniqueName": "SECTEUR"
                                                }
                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "expands": {
                                                "expandAll": true
                                            },
                                            "measures": [
                                                {
                                                    "uniqueName": "ENLEVEMENT BRUT",
                                                    "aggregation": "sum",
                                                    "caption": "ENLEVEMENT BRUT",
                                                },
                                                {
                                                    "uniqueName": "INVENDU",
                                                    "aggregation": "sum",
                                                    "caption": "INVENDU",
                                                },
                                                {
                                                    "uniqueName": "%INV",
                                                    "caption": "%INV",
                                                    "formula": "(sum('INVENDU')/sum('ENLEVEMENT BRUT'))*100",
                                                },
                                                {
                                                    "uniqueName": "ENLEVEMENT NET",
                                                    "aggregation": "sum",
                                                    "caption": "ENLEVEMENT NET",
                                                },
                                                {
                                                    "uniqueName": "PERTE COMMERCIAL",
                                                    "aggregation": "sum",
                                                    "caption": "PERTE COMMERCIAL",
                                                },
                                                {
                                                    "uniqueName": "%PC",
                                                    "caption": "%PC",
                                                    "formula": "(sum('PERTE COMMERCIAL')/sum('ENLEVEMENT NET'))*100",
                                                },
                                                {
                                                    "uniqueName": "PERTE TECHNIQUE",
                                                    "caption": "PERTE TECHNIQUE",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "%PT",
                                                    "caption": "%PT",
                                                    "formula": "(sum('PERTE TECHNIQUE')/sum('ENLEVEMENT NET'))*100",
                                                },
                                                {
                                                    "uniqueName": "PERTE CAMION",
                                                    "caption": "PERTE CAMION",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "%PCAM",
                                                    "caption": "%PCAM",
                                                    "formula": "(sum('PERTE CAMION')/sum('ENLEVEMENT NET'))*100",
                                                },
                                                {
                                                    "uniqueName": "PERTE GLOBALE",
                                                    "caption": "PERTE GLOBALE",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "%PG",
                                                    "caption": "%PG",
                                                    "formula": "(sum('PERTE GLOBALE')/sum('ENLEVEMENT NET'))*100",
                                                },
                                                {
                                                    "uniqueName": "CA NET avant remise",
                                                    "caption": "CA NET avant remise",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "RFM",
                                                    "caption": "RFM",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "%RFM",
                                                    "caption": "%RFM",
                                                    "formula": "(sum('RFM')/sum('CA NET avant remise'))*100",
                                                },
                                                {
                                                    "uniqueName": "RSF",
                                                    "caption": "RSF",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "%RSF",
                                                    "caption": "%RSF",
                                                    "formula": "(sum('RSF')/sum('CA NET avant remise'))*100",
                                                },
                                                {
                                                    "uniqueName": "PROMOTION",
                                                    "caption": "PROMOTION",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "%PROMO",
                                                    "caption": "%PROMO",
                                                    "formula": "(sum('PROMOTION')/sum('CA NET avant remise'))*100",
                                                },
                                                {
                                                    "uniqueName": "REMISE GLOBALE",
                                                    "caption": "REMISE GLOBALE",
                                                    "aggregation": "sum",
                                                },
                                                {
                                                    "uniqueName": "%REMISE GLOBALE",
                                                    "caption": "%REMISE GLOBALE",
                                                    "formula": "(sum('REMISE GLOBALE')/sum('CA NET avant remise'))*100",
                                                },
                                                {
                                                    "uniqueName": "CA NET",
                                                    "caption": "CA NET",
                                                    "aggregation": "sum",
                                                }
                                                
                                                
                                            ],
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": true,
                                                "showGrandTotals": "off",
                                                "showTotals": "off",
                                                "showHierarchyCaptions": true,
                                                "type": "classic",
                                                
                                               
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": []
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