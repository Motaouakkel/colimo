<?php
$page_title = "Top nombre factures";
$api_action = "topNetSalesToured";
include 'header.php';
?>

<body class="dashboard-page sb-l-o sb-r-c">
    <script src="include.js"></script>
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
                                    <div class="col-md-2">
                                        <a type="submit" class="button btn-primary submit-btn" href="#" onclick="exportAndHandleData(piv,pin,'<?php echo $page_title ?>');">To Excel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <div class="ml15 ib va-m" id="toggle_sidemenu_r">
                                    <a href="#" id="aCliquer">
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="report-title col-xl-12 col-md-12 col-sm-12">
                                        <h3> <?php echo strtoupper($page_title) ?></h3>
                                    </div>
                                </div>
                                <div id="ls-filters" class="row ls-filters">

                                </div>
                                <div class="row">
                                    <div class="table1 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component"></div>
                                    </div>
                                    <div class="spacer col-xl-2 col-md-2 col-sm-12" style="height: 250%;">
                                    </div>
                                    <div class="table2 col-xl-5 col-md-5 col-sm-12">
                                        <div id="wdr-component2"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <script>
                            var piv =null
                            var pin = null
                            function loadfile(f) {
                                var maper = []

                                function getJSONData() {

                                    data = $.parseJSON(f);



                                    var struct = {
                                        "AGENCE": {
                                            type: "string"
                                        },
                                        "SECTEUR": {
                                            type: "string"
                                        },
                                        "BLOC": {
                                            type: "string"
                                        },
                                        "Gamme": {
                                            type: "string"
                                        },
                                        "Produit": {
                                            type: "string"
                                        },
                                        "CE NET": {
                                            type: "number"
                                        },
                                        "QTT": {
                                            type: "number"
                                        },
                                        "type":{
                                            type: "string"
                                        }

                                    }


                                    data.unshift(struct);
                                    return data;

                                };

                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    toolbar: false,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "AGENCE",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "BLOC",
                                                },
                                                {
                                                    "uniqueName": "SECTEUR",
                                                    "caption": "SECTEUR",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                },
                                                {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },{
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                },
                                                {
                                                    "uniqueName": "type",
                                                    "caption": "type",
                                                    "filter": {
                                                        "members": [
                                                            "type.DH TTC"
                                                        ]
                                                    }
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "SECTEUR",
                                                "caption": "sect",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "CE NET",
                                                    "caption": "VENTE NETTE DH TTC/J",
                                                    "aggregation": "sum",
                                                    "format": "precentForamt"
                                                },
                                               
                                            ],
                                            "sorting":{
                                                "column" : {
                                                    "type": "desc",
                                                    "tuple": [],
                                                    "measure": "CE NET"
                                                }
                                            },
                                        },
                                        "sorting": "off",
                                        "options": {
                                            "grid": {
                                                "title": "TOP +",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                        }]
                                    },
                                });
                                piv = pivot1
                                var pivot2 = new WebDataRocks({
                                    container: "#wdr-component2",
                                    toolbar: false,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [{
                                                    "uniqueName": "AGENCE",
                                                    "caption": "AGENCE",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "BLOC",
                                                },
                                                {
                                                    "uniqueName": "SECTEUR",
                                                    "caption": "SECTEUR",
                                                },
                                                {
                                                    "uniqueName": "BLOC",
                                                    "caption": "Bloc",
                                                },
                                                {
                                                    "uniqueName": "Gamme",
                                                    "caption": "Gamme",
                                                },{
                                                    "uniqueName": "Produit",
                                                    "caption": "Produit",
                                                },
                                                {
                                                    "uniqueName": "type",
                                                    "caption": "type",
                                                    "filter": {
                                                        "members": [
                                                            "type.DH TTC"
                                                        ]
                                                    }
                                                }
                                            ],
                                            "rows": [{
                                                "uniqueName": "SECTEUR",
                                                "caption": "sect",
                                            }],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "CE NET",
                                                    "caption": "VENTE NETTE DH TTC/J",
                                                    "aggregation": "sum",
                                                    "format": "precentForamt"
                                                },
                                               
                                            ],
                                            "sorting":{
                                                "column" : {
                                                    "type": "asc",
                                                    "tuple": [],
                                                    "measure": "CE NET"
                                                }
                                            },
                                        },
                                        "options": {
                                            "grid": {
                                                "title": "TOP -",
                                                "showHeaders": false,
                                                "showGrandTotals": "rows",
                                                "showHierarchyCaptions": false,
                                                "showFilter":true,
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                            "name": "precentForamt",
                                            "decimalPlaces": 2,
                                        }]
                                    },
                                });
                                pin  =pivot2
                                pivot1.on("reportcomplete", function() {
                                    previosFilter = pivot1.getFilter("type");
                                    var sourceFiltersContainer = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                    srcDemo = sourceFiltersContainer;
                                    var targetFiltersContainer = document.getElementById("ls-filters");
                                    while(targetFiltersContainer.firstChild){
                                        targetFiltersContainer.removeChild(targetFiltersContainer.firstChild)
                                    }
                                    var elementParent = sourceFiltersContainer.parentElement;                                 
                                    elementParent.removeChild(sourceFiltersContainer);
                                    sourceFiltersContainer.classList.remove("wdr-ui-hgroup")
                                    var secondElement = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                    secondparent = secondElement.parentElement;
                                    srcDemo = secondElement; 
                                    secondparent.removeChild(secondElement);
                                    targetFiltersContainer.appendChild(sourceFiltersContainer);  
                                    pivot1.on("reportchange", function() {

                                        while(document.querySelector(".wdr-filters.wdr-ui-hgroup")){
                                                var srcFiltersContainer = document.querySelector(".wdr-filters.wdr-ui-hgroup");
                                                var Parent =  srcFiltersContainer.parentElement;
                                                Parent.removeChild(srcFiltersContainer);
                                            }
                                        var currentConfigP1 = pivot1.getReport();
                                        var currentConfigP2 = pivot2.getReport();
                                        currentConfigP2.slice.measures.forEach(m => {
                                            if (m.uniqueName == 'CE NET') {
                                                m.caption = "VENTE NETTE DH TTC/J"
                                            }
                                        })
                                        currentConfigP2.slice.reportFilters = currentConfigP1.slice.reportFilters;
                                            currentConfigP2.options.grid["showFilter"]=  true,
                                            pivot2.setReport(currentConfigP2);
                                            document.getElementById("wdr-grid-view").appendChild(srcDemo); 
                                    });
                                });
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