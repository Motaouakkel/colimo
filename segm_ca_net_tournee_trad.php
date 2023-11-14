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
                            canals = new Set()
                            window.prev_filters = []

                            function decompose(data, members) {
                                ret = {}
                                data.forEach(el => {
                                    if (!ret[el.AGENCE]) {
                                        ret[el.AGENCE] = {}
                                    }
                                    if (!ret[el.AGENCE][el.secteur]) {
                                        ret[el.AGENCE][el.secteur] = {}
                                        ret[el.AGENCE][el.secteur]["CA"] = 0
                                    }
                                    if (members.includes(el.Canal)) {
                                        ret[el.AGENCE][el.secteur]["CA"] += el["CA NET"]
                                    }

                                })
                                ret2 = []
                                int = 0
                                Object.keys(ret).forEach(agency => {
                                    Object.keys(ret[agency]).forEach(sector => {
                                        obj = {}
                                        obj["AGENCE"] = agency
                                        obj["secteur"] = sector
                                        obj['CA NET'] = ret[agency][sector]["CA"]
                                        obj['Canal'] = Array.from(canals)[int % 3]
                                        int += 1
                                        ret2.push(obj)
                                    })
                                })
                                return ret2

                            }
                            dataglob = []
                            data_to_feed = []

                            var struct = {
                                "AGENCE": {
                                    type: "string"
                                },
                                "secteur": {
                                    type: "string"
                                },
                                "Canal": {
                                    type: "string"
                                },
                                "CA NET": {
                                    type: "number"
                                },


                            }

                            function loadfile(f) {
                                function getJSONData() {
                                    data = $.parseJSON(f);
                                    dataglob = data

                                    data_to_feed = data
                                    data.forEach(e => {
                                        canals.add(e.Canal)
                                    })
                                    data_ret = decompose(data, Array.from(canals))
                                    window.prev_filters = Array.from(canals)
                                    data_ret.unshift(struct);
                                    return data_ret;
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
                                            "reportFilters": [{
                                                "uniqueName": "Canal"
                                            }, ],
                                            "rows": [{
                                                    "uniqueName": "AGENCE"
                                                },
                                                {
                                                    "uniqueName": "secteur"
                                                },

                                            ],
                                            "columns": [{
                                                "uniqueName": "Measures"
                                            }],
                                            "measures": [{
                                                    "uniqueName": "secteur",
                                                    "caption": "Nombre de secteurs",
                                                    "formula": "IF(distinctcount(\"secteur\")=0,0,distinctcount(\"secteur\"))",
                                                },
                                                {
                                                    "uniqueName": "CA NET2",
                                                    "caption": "DH TTC/Secteur",
                                                    "format": "precision",
                                                    "formula": "IF(distinctcount(\"secteur\")=0,sum(\"CA NET\"),sum(\"CA NET\")/distinctcount(\"secteur\"))",
                                                },
                                                {
                                                    "uniqueName": "<7500",
                                                    "caption": "<7500",

                                                    "formula": "IF(sum(\"CA NET2\")<=7500 ,1,0)",
                                                    "individual": true
                                                },
                                                {
                                                    "uniqueName": "7500-10000",
                                                    "caption": "7500-10000",
                                                    "formula": "IF(sum(\"CA NET2\")>7500 AND sum(\"CA NET2\")<=10000 ,1,0)",
                                                    "individual": true
                                                },
                                                {
                                                    "uniqueName": "10000-12500",
                                                    "caption": "10000-12500",
                                                    "formula": "IF(sum(\"CA NET2\")>10000 AND sum(\"CA NET2\")<=12500 ,1,0)",
                                                    "individual": true
                                                },
                                                {
                                                    "uniqueName": "12500-15000",
                                                    "caption": "12500-15000",
                                                    "formula": "IF(sum(\"CA NET2\")>12500 AND sum(\"CA NET2\")<=15000 ,1,0)",
                                                    "individual": true
                                                },
                                                {
                                                    "uniqueName": ">15000",
                                                    "caption": ">15000",
                                                    "formula": "IF(sum(\"CA NET2\")>15000  ,1,0)",
                                                    "individual": true
                                                }

                                            ],
                                            "expands": {
                                                "expandAll": false,
                                            }
                                        },
                                        "options": {
                                            "grid": {
                                                "type": "classic",
                                                "title": "<?php echo strtoupper($page_title) ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": true,
                                                "showTotals": 'columns',
                                                "showHierarchyCaptions": false,
                                                "drillThrough": false
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

                                function comparearrs(ar1, ar2) {
                                    if (ar1.length != ar2.length) {
                                        return false
                                    }
                                    ar1.forEach(e => {
                                        if (!ar2.includes(e)) {
                                            return false
                                        }
                                    })
                                    return true
                                }
                                pivot1.on("reportchange", function() {
                                    filters = pivot1.getFilter('Canal')

                                    arr = []

                                    filters.forEach(e => {
                                        arr.push(e.caption)
                                    })
                                    params = arr.length > 0 ? arr : prev_filters
                                    if (!comparearrs(params, window.prev_filters)) {
                                        window.prev_filters = []
                                        //window.prev_filters = params
                                        params.forEach(e => {
                                            window.prev_filters.push(e)
                                        })

                                        datasss = decompose(dataglob, params)
                                        datasss.unshift(struct)
                                        pivot1.updateData({
                                            data: datasss
                                        })
                                    }
                                })

                            }
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