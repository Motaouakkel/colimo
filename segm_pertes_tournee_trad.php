<?php
$page_title = "SEGMENTATION PERTE GLOBALE DH TTC/J";
$api_action = "segmpertetournee";
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
                                <div id="wdr-component"></div>
                            </div>
                        </div>
                        <script>
                            function loadfile(f) {
                                function getJSONData() {
                                    data = $.parseJSON(f);
                                    var struct = {
                                        "Agence": {
                                            type: "string"
                                        },
                                        "CA": {
                                            type: "number"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                        "<75": {
                                            type: "number"
                                        },
                                        "75-100": {
                                            type: "number"
                                        },
                                        "100-125": {
                                            type: "number"
                                        },
                                        "125-150": {
                                            type: "number"
                                        },
                                        ">150": {
                                            type: "number"
                                        },
                                        "Pertes": {
                                            type: "number"
                                        },
                                        "<1,25%": {
                                            type: "number"
                                        },
                                        "1,25-1,50%": {
                                            type: "number"
                                        },
                                        "1,50-1,75%": {
                                            type: "number"
                                        },
                                        "1,75-2%": {
                                            type: "number"
                                        },
                                        ">2%": {
                                            type: "number"
                                        },
                                        
                                    }
                                    data.unshift(struct);
                                    return data;
                                    /*
                                    1,5-1,75%
: 
0
1,25-1,50%
: 
1
1,75-2%
: 
0
75-100
: 
0
100-125
: 
0
125-150
: 
0
<1,25%
: 
0
<75
: 
1
>2%
: 
0
>150
: 
0
Agence
: 
"OUJDA"
CA
: 
3796.128333333333
Pertes
: 
48.13500000000002
Secteur
: 
"1235"
                                    */ 
                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",
                                    beforetoolbarcreated: customizeToolbar,
                                    customizeCell: customizeCellFunction,
                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "reportFilters": [],
                                            "rows": [{
                                                    "uniqueName": "Agence"
                                                },
                                                

                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [
                                                {
                                                "uniqueName": "Pertes",
                                                "caption": "PERTE GLOBALE",
                                                "format": "precision",
                                                "formula": "sum(\"Pertes\")"
                                            },
                                            {
                                                "uniqueName": "Secteur",
                                                "caption": "Nombre de secteurs",
                                                "formula": "IF(distinctcount(\"Secteur\")=0,0,distinctcount(\"Secteur\"))"
                                            },
                                            {
                                                "uniqueName": "PERTE GLOBALE DH TTC/TOURNEE",
                                                "caption": "PERTE GLOBALE DH TTC/TOURNEE",
                                                "format": "precision",
                                                "formula": "sum(\"Pertes\")/distinctcount(\"Secteur\")"
                                            },
                                            
                                            {
                                                "uniqueName": "<75",
                                                "caption": "<75",

                                            },
                                            {
                                                "uniqueName": "75-100",
                                                "caption": "75-100",
                                            }
                                            ,
                                            {
                                                "uniqueName": "100-125",
                                                "caption": "100-125",
                                            },
                                            {
                                                "uniqueName": "125-150",
                                                "caption": "125-150",
                                            },
                                            {
                                                "uniqueName": ">150",
                                                "caption": ">150",
                                            },
                                            {
                                                "uniqueName": "TAUX PERTE GLOBALE%",
                                                "caption": "TAUX PERTE GLOBALE%",
                                                "format": "percent",
                                                "formula": "(sum(\"Pertes\")/sum(\"CA\"))*100"
                                            },
                                            {
                                                "uniqueName": "<1,25%",
                                                "caption": "<1,25%",
                                            },
                                            {
                                                "uniqueName": "1,25-1,50%",
                                                "caption": "1,25-1,50%",
                                            },
                                            {
                                                "uniqueName": "1,50-1,75%",
                                                "caption": "1,50-1,75%",
                                            },{
                                                "uniqueName": "1,75-2%",
                                                "caption": "1,75-2%",
                                            },
                                            {
                                                "uniqueName": ">2%",
                                                "caption": ">2%",
                                            },{
                                                "uniqueName": "CA"
                                            }
                                            
                                         ],
                                            "expands": {
                                                "expandAll": true,
                                            }
                                        },
                                        "options": {
                                            "grid": {
                                                "type": "classic",
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": true,
                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [{
                                                "name": "3dhvqfuq",
                                                "thousandsSeparator": " ",
                                                "decimalSeparator": ".",
                                                "decimalPlaces": 2,
                                                "currencySymbol": "",
                                                "currencySymbolAlign": "left",
                                                "nullValue": "",
                                                "textAlign": "right",
                                                "isPercent": false
                                            },
                                            {
                                                "name": "precision",
                                                "decimalPlaces": 2,

                                            },{
                                                "name": "percent",

                                                

                                            }, {
                                                "name": "3dhvwiax",
                                                "thousandsSeparator": " ",
                                                "decimalSeparator": ".",
                                                "decimalPlaces": 0,
                                                "currencySymbol": "",
                                                "currencySymbolAlign": "left",
                                                "nullValue": "",
                                                "textAlign": "right",
                                                "isPercent": false
                                            }
                                        ]
                                    },

                                });

                                function customizeCellFunction(cell, data) {
                                    let a = 1;
                                    if (data.isGrandTotal && data.columnIndex == 0) {
                                        cell.text = "GLOBAL";
                                    }
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