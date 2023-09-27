<?php
$page_title = "Top remises promo clients";
$api_action = "topCustomerPromoDiscounts";
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
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            function loadfile(f) {
                                var maper = []

                                function getJSONData() {

                                    glob = $.parseJSON(f);
                                    data = glob

                                    var struct = {
                                        "AGENCE": {
                                            type: "string"
                                        },
                                        "SECTEUR": {
                                            type: "string"
                                        },
                                        "TOURNEE": {
                                            type: "string"
                                        },
                                        "CLIENT": {
                                            type: "string"
                                        },
                                        "TYPOLOGIE": {
                                            type: "string"
                                        },
                                        "VITRINE": {
                                            type: "string"
                                        },
                                        "RFM}0": {
                                            type: "number"
                                        },
                                        "RSF": {
                                            type: "number"
                                        },
                                        "PROMO": {
                                            type: "number"
                                        },
                                        "TOTAL": {
                                            type: "number"
                                        },
                                        "VENTE AVANT REMISE": {
                                            type: "number"
                                        },
                                        "%": {
                                            type: "number"
                                        },
                                    }
                                    maper = data;
                                    data.unshift(struct);

                                    return data;

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
                                            "reportFilters": [],
                                            "rows": [],
                                            "columns": [],
                                            "measures": [],
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
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
                                pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                        var i = 0
                                        var l = 0
                                        var x = 0
                                        
                                        if(data.label.split("}")[1] != null && data.rowIndex == 0){
                                            cell.text = "RFM"
                                            data.hierarchy.filterEnabled = false
                                            console.log(data)
                                            console.log(cell)
                                        }

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