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
                                <div id="filters"></div>
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
                                        'DEG': {
                                            type: 'number'
                                        },
                                        '% DEG': {
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
                                        'CANAL': {
                                            type: 'string'
                                        },
                                        'Gamme': {
                                            type: 'string'
                                        },
                                        'Produit': {
                                            type: 'string'
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
                                            "reportFilters": [

                                                {
                                                    "uniqueName": "AGENCE",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "SECTEUR",
                                                    "caption": "SECTEUR",
                                                }, {
                                                    "uniqueName": "BLOC",
                                                    "caption": "BLOC",
                                                },
                                                {
                                                    "uniqueName": "CANAL",
                                                    "caption": "CANAL",
                                                },
                                                {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },
                                                {
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                },

                                            ],
                                            "rows": [{
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
                                                "expandAll": false
                                            },
                                            "measures": [{
                                                    "uniqueName": "ENLEVEMENT BRUT",
                                                    "aggregation": "sum",
                                                    "caption": "ENLEVEMENT BRUT",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "INVENDU",
                                                    "aggregation": "sum",
                                                    "caption": "INVENDU",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%INV",
                                                    "caption": "%INV",
                                                    "formula": "(sum('INVENDU')/sum('ENLEVEMENT BRUT'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "ENLEVEMENT NET",
                                                    "aggregation": "sum",
                                                    "caption": "ENLEVEMENT NET",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "PERTE COMMERCIAL",
                                                    "aggregation": "sum",
                                                    "caption": "PERTE COMMERCIAL",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%PC",
                                                    "caption": "%PC",
                                                    "formula": "(sum('PERTE COMMERCIAL')/sum('ENLEVEMENT NET'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "PERTE TECHNIQUE",
                                                    "caption": "PERTE TECHNIQUE",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%PT",
                                                    "caption": "%PT",
                                                    "formula": "(sum('PERTE TECHNIQUE')/sum('ENLEVEMENT NET'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "PERTE CAMION",
                                                    "caption": "PERTE CAMION",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%PCAM",
                                                    "caption": "%PCAM",
                                                    "formula": "(sum('PERTE CAMION')/sum('ENLEVEMENT NET'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "PERTE GLOBALE",
                                                    "caption": "PERTE GLOBALE",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%PG",
                                                    "caption": "%PG",
                                                    "formula": "(sum('PERTE GLOBALE')/sum('ENLEVEMENT NET'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "CA NET avant remise",
                                                    "caption": "CA NET avant remise",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "RFM",
                                                    "caption": "RFM",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%RFM",
                                                    "caption": "%RFM",
                                                    "formula": "(sum('RFM')/sum('CA NET avant remise'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "RSF",
                                                    "caption": "RSF",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%RSF",
                                                    "caption": "%RSF",
                                                    "formula": "(sum('RSF')/sum('CA NET avant remise'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "PROMOTION",
                                                    "caption": "PROMOTION",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%PROMO",
                                                    "caption": "%PROMO",
                                                    "formula": "(sum('PROMOTION')/sum('CA NET avant remise'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "DEG",
                                                    "caption": "DEG",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%DEG",
                                                    "caption": "%DEG",
                                                    "formula": "(sum('DEG')/sum('CA NET avant remise'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "REMISE GLOBALE",
                                                    "caption": "REMISE GLOBALE",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%REMISE GLOBALE",
                                                    "caption": "%REMISE GLOBALE",
                                                    "formula": "(sum('REMISE GLOBALE')/sum('CA NET avant remise'))*100",
                                                    "format": "percentage"
                                                },
                                                {
                                                    "uniqueName": "CA NET",
                                                    "caption": "CA NET",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                }


                                            ],
                                        },
                                        "options": {
                                            "configuratorButton": false,
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showTotals": "rows",
                                                "showHierarchyCaptions": false,
                                                "type": "classic",
                                                "showFilter": false,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                                "name": "precision",
                                                "decimalPlaces": 0,
                                            },
                                            {
                                                "name": "percentage",
                                                "decimalPlaces": 2,

                                            }
                                        ]
                                    },

                                });

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(pivot1, captionsMapper);
                                    pivot1.off("reportcomplete");
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