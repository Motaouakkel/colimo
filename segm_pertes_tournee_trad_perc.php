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
                            dataglob = []
                            data_to_feed = []
                            canals = new Set()
                            window.prev_filters = []
                            function decompose(data,members){   
                                console.log(data)

                                ret = {}
                                data.forEach(el => {
                                    if (!ret[el.AGENCE]) {
                                        ret[el.AGENCE] = {}
                                    }
                                    if (!ret[el.AGENCE][el.secteur]) {
                                        ret[el.AGENCE][el.secteur] = {}
                                        ret[el.AGENCE][el.secteur]["CA"] = 0
                                        ret[el.AGENCE][el.secteur]["Pertes"] = 0
                                    }
                                    if (members.includes(el.Canal)) {
                                        ret[el.AGENCE][el.secteur]["CA"] += el["CA NET"]
                                        ret[el.AGENCE][el.secteur]["Pertes"] += el["Pertes"]
                                    }

                                })
                                ret2 = []
                                int = 0
                                Object.keys(ret).forEach(agency => {
                                    Object.keys(ret[agency]).forEach(sector => {
                                        obj = {}
                                        obj["AGENCE"] = agency
                                        obj["Secteur"] = sector
                                        obj['CA NET'] = ret[agency][sector]["CA"]
                                        obj['Canal'] = Array.from(canals)[int % 3]
                                        obj['Pertes'] = ret[agency][sector]["Pertes"]
                                        int += 1
                                        ret2.push(obj)
                                    })
                                })
                             
                              return ret2
                            
                            }
                            var struct = {
                                        "AGENCE": {
                                            type: "string"
                                        },
                                        "CA NET": {
                                            type: "number"
                                        },
                                        "Secteur": {
                                            type: "string"
                                        },
                                       
                                        "Pertes": {
                                            type: "number"
                                        },
                                        
                                        "Canal": {
                                            type: "String"
                                        },
                                        
                                    }

                            function loadfile(f) {
                                function getJSONData() {
                                    data = $.parseJSON(f);
                                    
                                    data = $.parseJSON(f);
                                    dataglob = data

                                    data_to_feed = data
                                    data.forEach(e => {
                                        canals.add(e.Canal)
                                    })
                                    data_ret = decompose(data, Array.from(canals))
                                    window.prev_filters = Array.from(canals)
                                    console.log(data_ret)
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
                                                    "uniqueName": "Secteur"
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
                                            
                                            // {
                                            //     "uniqueName": "<75",
                                            //     "caption": "<75",
                                            //     "formula": "IF(sum(\"Pertes\")<=1.25 ,1,0)",
                                            //     "individual": true

                                            // },
                                            // {
                                            //     "uniqueName": "75-100",
                                            //     "caption": "75-100",
                                            //     "formula": "IF(sum(\"Pertes\")>75 AND sum(\"Pertes\")<=100 ,1,0)",
                                            //     "individual": true
                                            // }
                                            // ,
                                            // {
                                            //     "uniqueName": "100-125",
                                            //     "caption": "100-125",
                                            //     "formula": "IF(sum(\"Pertes\")>1 AND sum(\"Pertes\")<=1,25 ,1,0)",
                                            //     "individual": true
                                            // },
                                            // {
                                            //     "uniqueName": "125-150",
                                            //     "caption": "125-150",
                                            //     "formula": "IF(sum(\"Pertes\")>1,25 AND sum(\"Pertes\")<=1,5 ,1,0)",
                                            //     "individual": true
                                            // },
                                            // {
                                            //     "uniqueName": ">150",
                                            //     "caption": ">150",
                                                
                                            // },
                                            {
                                                "uniqueName": "TAUX PERTE GLOBALE%",
                                                "caption": "TAUX PERTE GLOBALE%",
                                                "format": "precision",
                                                "formula": "(sum(\"Pertes\")/sum(\"CA NET\"))*100"
                                            },
                                            {
                                                "uniqueName": "<1,25%",
                                                "caption": "<1,25%",
                                                "formula": "IF(((sum(\"Pertes\")/sum(\"CA NET\")) * 100)<=1.25 ,1,0)",
                                                "individual": true
                                            },
                                            {
                                                "uniqueName": "1,25-1,50%",
                                                "caption": "1,25-1,50%",
                                                "formula": "IF(((sum(\"Pertes\")/sum(\"CA NET\")) * 100)>1.25 AND ((sum(\"Pertes\")/sum(\"CA NET\")) * 100) <=1.5 ,1,0)",
                                                "individual": true
                                            },
                                            {
                                                "uniqueName": "1,50-1,75%",
                                                "caption": "1,50-1,75%",
                                                "formula": "IF(((sum(\"Pertes\")/sum(\"CA NET\")) * 100)>1.5 AND ((sum(\"Pertes\")/sum(\"CA NET\")) * 100) <=1.75 ,1,0)",
                                                "individual": true
                                            },{

                                                "uniqueName": "1,75-2%",
                                                "caption": "1,75-2%",
                                                "formula": "IF(((sum(\"Pertes\")/sum(\"CA NET\")) * 100)>1.75 AND ((sum(\"Pertes\")/sum(\"CA NET\")) * 100) <=2 ,1,0)",
                                                "individual": true
                                            },
                                            {
                                                "uniqueName": ">2%",
                                                "caption": ">2%",
                                                "formula": "IF(((sum(\"Pertes\")/sum(\"CA NET\")) * 100)>2 ,1,0)",
                                                "individual": true
                                            },
                                            {
                                                "uniqueName": "CA NET",
                                                "format": "precision",
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