<?php
$page_title = "EVOLUTION PRODUITS";
$api_action = "evolutionproduit";
include 'header.php';

?>

<body class="dashboard-page sb-l-o sb-r-c">
    <script src="https://cdn.webdatarocks.com/latest/webdatarocks.googlecharts.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
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

                                <!-- <button onclick="test2(thepivot)">graph <==> tableau</button> -->
                                <!-- hige the wdr-component -->

                                <div id="filters"></div>
                                <style>
                                    /* CSS */
                                </style>
                                <div>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'')">Categorie</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Categorie','Famille')">Famille</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Famille','Gamme')">Gamme</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Gamme','Produit')">Produit</button>
                                    <button class="button-18" role="button" onclick="setCategorie(thepivot,'Produit','Article')">Article</button>
                                </div>

                                <div id="wdr-component"></div>
                                <div id="google-chart"></div>
                            </div>
                        </div>
                        <script>
                            arr = ["Categorie", 'Famille', 'Gamme', 'Produit', 'Article']
                            var x = document.getElementById("google-chart");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }

                            function test2(tab) {
                                //hide the div wdr-component
                                var x = document.getElementById("wdr-component");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                                var x = document.getElementById("google-chart");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }

                            var thechart = null;

                            var thepivot = null;

                            function setCategorie(arg, arg2, row) {


                                arg.collapseAllData();
                                if (arg2 != '') {
                                    setTimeout(function() {
                                        arg.expandData(arg2);

                                        //redraw the chart with the new data
                                        // thechart.clearChart();
                                        if (row) {
                                            // createGoogleChart({
                                            //     rows: [{
                                            //         uniqueName: row
                                            //     }],


                                            // });

                                        } else {
                                            // console.log("biatchh")
                                            // createGoogleChart()
                                        }
                                    }, 15);




                                } else {
                                    // thechart.clearChart();
                                    // createGoogleChart();
                                }
                            }

                            function loadfile(f) {
                                var test = []




                                function setFamille(arg) {
                                    tb.collapseAllData();
                                }

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },

                                        "secteur": {
                                            type: "string"
                                        },
                                        "type": {
                                            type: "string"
                                        },
                                        "amount_1": {
                                            type: "number"
                                        },
                                        "amount_2": {
                                            type: "number"
                                        },
                                        "amount_3": {
                                            type: "number"
                                        },
                                        "Canal": {
                                            type: "string"

                                        },
                                        "unite": {
                                            type: "string"

                                        },
                                        "Categorie": {
                                            type: "string"

                                        },
                                        "Famille": {
                                            type: "string"
                                        },
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "Article": {
                                            type: "string"

                                        }
                                    }

                                    data['data'].unshift(struct);
                                    loadLSFiltersTemplate(data['filters']);
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
                                                    "uniqueName": "Agence"
                                                },
                                                {
                                                    "uniqueName": "type",
                                                    "filter": {
                                                        "members": ["type.ENLEV NET"]
                                                    }

                                                },

                                                {
                                                    "uniqueName": "Canal"
                                                },
                                                {
                                                    "uniqueName": "secteur"
                                                },
                                                {
                                                    "uniqueName": "Categorie"
                                                },
                                                {
                                                    "uniqueName": "Famille"
                                                },
                                                {
                                                    "uniqueName": "Article"
                                                },
                                                {
                                                    "uniqueName": "Gamme"
                                                },
                                                {
                                                    "uniqueName": "Produit"
                                                },
                                                {
                                                    "uniqueName": "unite",
                                                    "filter": {
                                                        "members": ["unite.DH TTC"]
                                                    }

                                                },
                                            ],
                                            "rows": [{
                                                    "uniqueName": "Categorie"
                                                },
                                                {
                                                    "uniqueName": "Famille"
                                                },
                                                {
                                                    "uniqueName": "Gamme",
                                                }, {
                                                    "uniqueName": "Produit",
                                                }, {
                                                    "uniqueName": "Article"
                                                },
                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],

                                            "measures": [{
                                                    "uniqueName": "amount_1",
                                                    "caption": "PERIODE 1",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "amount_2",
                                                    "caption": "PERIODE 2",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "amount_3",
                                                    "caption": "EVOLUTION",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "% evolution",
                                                    "caption": "% evolution",
                                                    //to save againt division by zero
                                                    "formula": "IF(sum('amount_1')=0,0,100*(sum('amount_2') -sum('amount_1'))/sum('amount_1'))",

                                                    "format": "precentForamt"

                                                }
                                            ],

                                        },
                                        "expands": {
                                            "expandAll": false,
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "type": "compact",
                                                "showGrandTotals": "columns",
                                                "showHierarchyCaptions": false,
                                                "showFilter": false,
                                                "showDrillThroughConfigurator": true
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
                                thepivot = pivot1

                                function customizeToolbar(toolbar) {
                                    var tabs = toolbar.getTabs(); // get all tabs from the toolbar
                                    toolbar.getTabs = function() {
                                        delete tabs[1];
                                        delete tabs[0]; // delete the first tab
                                        return tabs;
                                    }
                                }

                                pivot1.on("reportcomplete", function() {
                                    var captionsMapper = buildCaptionsMapper(pivot1.getMeasures().concat(pivot1.getRows()));
                                    applayLSFilters(thepivot, captionsMapper);
                                    pivotTableReportComplete = true;
                                    // createGoogleChart();
                                    pivot1.off("reportcomplete");
                                });
                                var pivotTableReportComplete = false;
                                var googleChartsLoaded = false;


                            }
                            // google.charts.load('current', {
                            //     'packages': ['bar']
                            // });
                            // google.charts.setOnLoadCallback(onGoogleChartsLoaded);

                            // function onGoogleChartsLoaded() {
                            //     googleChartsLoaded = true;
                            //     if (pivotTableReportComplete) {
                            //         createGoogleChart();
                            //     }
                            // }

                            // function createGoogleChart(slice) {
                            //     console.log("createGoogleChart")
                            //     if (googleChartsLoaded) {
                            //         console.log(slice)
                            //         thepivot.googlecharts.getData({
                            //                 type: "bar",
                            //                 slice: {
                            //                     "rows": slice ? slice.rows : [{
                            //                         uniqueName: "Categorie"
                            //                     }],
                            //                     columns: [{
                            //                         uniqueName: "[Measures]"
                            //                     }],

                            //                     measures: [{
                            //                             uniqueName: "amount_1",
                            //                         },
                            //                         {
                            //                             uniqueName: "amount_2",
                            //                         }
                            //                     ],

                            //                 }
                            //             },
                            //             drawChart,
                            //             drawChart,
                            //         );
                            //     }
                            // }

                            // function drawChart(_data) {
                               
                            //     set = []
                            //     new_Data = []
                            //     _data.data.forEach(element => {
                            //         if(set.includes(element[0])){
                            //             // /_data.data.remove(element)
                                       
                            //         }
                            //         else{
                            //             set.push(element[0])
                            //             new_Data.push(element)
                            //         }
                            //     });
                                

                               
                            //     var data = google.visualization.arrayToDataTable(new_Data);
                                
                            //     let entries = Object.entries(data["Wf"]);
                            //     let half = Math.ceil(entries.length / 2);

                            //     // data["Wf"]= Object.fromEntries(entries.slice(0, half));
                            //     var options = {
                            //         title: "",
                                    
                            //         'height':400,
                            //         legend: {
                            //             position: 'right'
                            //         },
                                    

                            //     };
                                
                            //     var chart = new google.charts.Bar(document.getElementById('google-chart'));
                            //     chart.draw(data, google.charts.Bar.convertOptions(options));
                            //     thechart = chart
                            // }
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