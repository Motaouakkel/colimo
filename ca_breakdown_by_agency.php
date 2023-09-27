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
                                        'CE NET': {
                                            type: 'number'
                                        }
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
                                            "reportFilters": [],
                                            "rows": [],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [],
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": true,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": true,
                                                "type": "flat",
                                                "showFilter": true,
                                                "showReportFiltersArea": false
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