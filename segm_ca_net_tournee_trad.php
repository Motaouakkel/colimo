<?php
$page_title = "SEGMENTATION CA NET DH TTC/J";
$api_action = "segmcatournee";
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
                                        "<7500": {
                                            type: "number"
                                        },
                                        "7500-10000": {
                                            type: "number"
                                        },
                                        "10000-12500": {
                                            type: "number"
                                        },
                                        "12500-15000": {
                                            type: "number"
                                        },
                                        ">15000": {
                                            type: "number"
                                        },
                                        
                                    }
                                    data.unshift(struct);
                                    return data;
                                    /*
                                    7500-10000
: 
0
10000-12500
: 
0
12500-15000
: 
0
<7500
: 
1
>15000
: 
0
Agence
: 
"OUJDA"
CA
: 
3689.973333333334
Secteur
: 
"1478"
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
                                            "measures": [{
                                                "uniqueName": "Secteur",
                                                "caption": "Nombre de secteurs",
                                                "formula": "IF(distinctcount(\"Secteur\")=0,0,distinctcount(\"Secteur\"))"
                                            },{
                                                "uniqueName": "CA",
                                                "caption": "DH TTC/Secteur",
                                                "format": "precision",
                                                "formula": "IF(distinctcount(\"Secteur\")=0,sum(\"CA\"),sum(\"CA\")/distinctcount(\"Secteur\"))"
                                            },
                                            {
                                                "uniqueName": "<7500",
                                                "caption": "<7500",

                                            },
                                            {
                                                "uniqueName": "7500-10000",
                                                "caption": "7500-10000",
                                            }
                                            ,
                                            {
                                                "uniqueName": "10000-12500",
                                                "caption": "10000-12500",
                                            },
                                            {
                                                "uniqueName": "12500-15000",
                                                "caption": "12500-15000",
                                            },
                                            {
                                                "uniqueName": ">15000",
                                                "caption": ">15000",
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