<?php
$page_title = "ANALYSE EFFETS PRIX VOLUME EVOLUTION AGENCES DH TTC";
$api_action = "effectoricevlm";
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
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            function loadfile(f) {
                                var test = ""

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var struct = {
                                        "agence": {
                                            type: "string"
                                        },
                                        "gamme":{
                                            type : "string"
                                        },
                                        "produit": {
                                            type: "string"
                                        },
                                        "canal": {
                                            type: "string"
                                        },
                                        
                                        "mt1": {
                                            type: "number"
                                        },
                                        "mt2": {
                                            type: "number"
                                        },
                                        "1t2": {
                                            type: "number"
                                        },
                                        "qt1": {
                                            type: "number"
                                        },
                                        
                                    }
                                    
                                    ret = []
                                    data.forEach(e => {
                                        if (e.type ='DH TTC'){
                                            ret.push(e)
                                        }
                                    });
                                    test = ret[0].canal 
                                    ret.unshift(struct);
                                    
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
                                                    "uniqueName": "gamme"
                                                },
                                                {
                                                    "uniqueName": "produit"
                                                },
                                                {
                                                    "uniqueName": "canal",
                                                    "filter": {
                                                        "members": [
                                                            "canal."+test
                                                        ]
                                                    }
                                                },
                                               
                                               
                                            ],
                                            "rows": [{
                                                "uniqueName": "produit",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [
                                                {
                                                    "uniqueName": "mt1",
                                                    "caption": "VALEUR P1",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                
                                                {
                                                    "uniqueName": "qt1",
                                                    "caption": "VOLUME P1",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "mt2",
                                                    "caption": "VALEUR P2",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "qt2",
                                                    "caption": "VOLUME P2",
                                                    "format": "precision",
                                                    "aggregation": "sum"
                                                },
                                                {
                                                    "uniqueName": "evol_val",
                                                    "caption": "EVOLUTION VALEUR",
                                                    "format": "precision",
                                                    "formula": "sum('mt2') -sum('mt1')"
                                                },
                                                {
                                                    "uniqueName": "per_evolution",
                                                    "caption": "%EVOLUTION VALEUR",
                                                    //to save againt division by zero
                                                    "formula": "IF(sum('amount1')=0,100,100*(sum('mt2') -sum('mt1'))/(sum('mt1')+sum('mt2')))",
                                                    "format": "precentForamt"
                                                },
                                                {
                                                    "uniqueName": "evol_vol",
                                                    "caption": "EFFET VOLUME",
                                                    "format": "precision",
                                                    "formula": "(sum('qt2') -sum('qt1'))* ( sum('mt1')/sum('qt1'))"
                                                },
                                                {
                                                    "uniqueName": "per_evol_vol",
                                                    "caption": "% EFFET VOLUME",
                                                    //to save againt division by zero
                                                    "formula": "((sum('qt2') -sum('qt1'))* ( sum('mt1')/sum('qt1'))) * 100 / (sum('mt1'))",
                                                    "format": "precentForamt"
                                                },
                                                {
                                                    "uniqueName": "prixeff",
                                                    "caption": "EFFET PRIX",
                                                    //to save againt division by zero
                                                    "formula": "( ((sum('mt2') / sum('qt2')) - (sum('mt1') / sum('qt1')) ) * sum('qt2') )",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "per_prixeff",
                                                    "caption": "% EFFET PRIX",
                                                    //to save againt division by zero
                                                    "formula": "(( ((sum('mt2') / sum('qt2')) - (sum('mt1') / sum('qt1')) ) * sum('qt2') ) * 100) / sum('mt1')",
                                                    "format": "precentForamt"
                                                },
                                                
                                                
                                            ],

                                        },
                                        "expands": {
                                            "expandAll": true,
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?> " ,
                                                "showHeaders": false,
                                                "type": "classic",
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                            "currencySymbol": "%",
                                            "currencySymbolAlign": "right"
                                        },{
                                            "name": "precision",
                                            "decimalPlaces": 2,
                                            
                                        }]
                                    },

                                });
                                
                                // pivot1.customizeCell(function customizeCellFunction(cell, data) {
                                //     if (data.isGrandTotal && data.columnIndex == 0) {
                                //         cell.text = "Total";
                                //     }
                                // });
                                // var i = false;
                                // if(i == false){
                                //     i = true
                                // previosFilter = []
                                // pivot1.on("reportcomplete", function() {
                                //     previosFilter = pivot1.getFilter("canal");
                                    
                                    
                                //     pivot1.on("reportchange", function() {
                                //         if (compare_filters(previosFilter, filterValue)) {
                                //             console.log("filter not changed")
                                //             return;
                                //         }
                                //         var filterValue = pivot1.getFilter("canal");
                                       
                                //             var currentConfig = pivot1.getReport();
                                //             console.log(currentConfig)
                                            
                                //         headerValue = "EVOLUTION AGENCES CANAL "
                                //         if (filterValue.length === 1) {
                                //             headerValue = headerValue +  filterValue[0].caption;
                                //         } else if (filterValue.length === 2) {
                                //             headerValue = headerValue + filterValue[0].caption + " + " + filterValue[1].caption;
                                //         }
                                //         else if (filterValue.length === 3) {
                                //             headerValue = headerValue + filterValue[0].caption + " + " + filterValue[1].caption + " + " + filterValue[2].caption;
                                //         }
                                //         currentConfig.options.grid.title = headerValue.toUpperCase();
                                //         pivot1.setReport(currentConfig);                  
                                //     });
                                // });
                                // }
                            function compare_filters(f1,f2){
                                    filter1 = {}
                                    
                                    if(f1 != null){
                                        f1.forEach(e=>{
                                            filter1[e.uniqueName] = 1
                                        })
                                    }
                                    //check if element in f2 is in f1
                                    if(f2 != null){
                                        f2.forEach(e=>{
                                            if(filter1[e.uniqueName] == 1){
                                                filter1[e.uniqueName] = 2
                                            }
                                        })
                                    }
                                    if(f1 != null && f2 != null){
                                        if (f1.length != f2.length)
                                        return false
                                    }
                                    for (const [key, value] of Object.entries(filter1)) {
                                        if(value == 1){
                                            return false
                                        }
                                    }
                                    return true
                                }
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