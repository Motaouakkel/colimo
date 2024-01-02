
<?php
$page_title = "Decomposition ca par secteur";
$api_action = "caBreakdownByTour2";
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
                                <button class="button-18" role="button" onclick="test1(tot)">Agence</button>
                                <button class="button-18" role="button" onclick="test2(tot)">Canal</button>
                                <button class="button-18" role="button" onclick="test3(tot)">Secteur</button>
                                <div class="row">
                                    <div id="wdr-component"></div>
                                </div>

                            </div>
                        </div>
                        <script>
                            function test1(tb){
                                tb.collapseAllData()
                            }
                            function test2(tb){
                                
                                tb.collapseAllData();
                                setTimeout(function() {
                                    tb.expandData("AGENCE");
                                    }, 50);

                                
                            }
                            function test3(tb){
                                
                                tb.expandData("CANAL");
                            }
                            tot = null;
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
                                                "uniqueName": "CANAL"
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
                                                    "caption": "CHARGEMENT",
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
                                                // {
                                                //     "uniqueName": "ENLEVEMENT NET",
                                                //     "aggregation": "sum",
                                                //     "caption": "ENLEVEMENT NET",
                                                //     "format": "precision"
                                                // },
                                                
                                                {
                                                    "uniqueName": "PERTE GLOBALE",
                                                    "caption": "PERTES",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%PG",
                                                    "caption": "%PG",
                                                    "formula": "(sum('PERTE GLOBALE')/sum('ENLEVEMENT NET'))*100",
                                                    "format": "percentage"
                                                },
                                                // {
                                                //     "uniqueName": "CA NET avant remise",
                                                //     "caption": "CA NET avant remise",
                                                //     "aggregation": "sum",
                                                //     "format": "precision"
                                                // },
                                                {
                                                    "uniqueName": "REMISE GLOBALE",
                                                    "caption": "REMISES",
                                                    "aggregation": "sum",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "%REMISE GLOBALE",
                                                    "caption": "%REMISES",
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
                                                "showGrandTotals": true,
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
                                tot = pivot1
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