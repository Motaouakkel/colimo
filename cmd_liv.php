<?php
$page_title = "COMMANDE JOURNALIERE AGENCES";
$api_action = "cmdliv";
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

                                    <?php include 'search_1_date.php' ?>

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
                            var mapper = {}

                            function loadfile(f) {
                                var test = {}

                                function getJSONData() {

                                    data = $.parseJSON(f);
                                    var i = 1
                                    data.forEach(function(item) {
                                        item.vendeur_identifier = i
                                        item.aide_identifier = i
                                        i += 1
                                        item.vendeur = String(item.vendeur);
                                        item.aide_vendeur = String(item.aide_vendeur) + " ";
                                    });

                                    var struct = {
                                        "SousFamille": {
                                            type: "string"
                                        },
                                        "product_name": {
                                            type: "number"
                                        },
                                        "cmd_agence": {
                                            type: "number"
                                        },
                                        "other_agence": {
                                            type: "number"
                                        },
                                        "stock": {
                                            type: "number"
                                        },
                                        "total_commande": {
                                            type: "number"
                                        },

                                    }

                                    data.unshift(struct);
                                    test = data

                                    return data;

                                };


                                var pivot1 = new WebDataRocks({
                                    container: "#wdr-component",

                                    toolbar: true,
                                    report: {
                                        dataSource: {
                                            "data": getJSONData()
                                        },
                                        "slice": {
                                            "rows": [{
                                                "uniqueName": "SousFamille",
                                                "caption": "SOUS FAMILLE"

                                            }, {
                                                "uniqueName": "product_name",
                                                "caption": "PRODUIT"

                                            }],
                                            "columns": [{

                                                "uniqueName": "MEASURES"
                                            }, ],
                                            "expands": {
                                                "expandAll": true
                                            },
                                            "measures": [{
                                                    "uniqueName": "cmd_agence",
                                                    "caption": "TOTAL OUJDA",
                                                    "format": "precision"
                                                }, {
                                                    "uniqueName": "other_agence",
                                                    "caption": "TOTAL AUTRES AGENCES",
                                                    "format": "precision"
                                                }, {
                                                    "uniqueName": "total_commande",
                                                    "caption": "TOTAL COMMANDE",
                                                    "format": "precision"
                                                },{
                                                    "uniqueName": "stock",
                                                    "caption": "STOCK",
                                                    "format": "precision"
                                                },{
                                                    "uniqueName": "ecart",
                                                    "caption": "ECART",
                                                    "formula":"sum('stock') - sum('total_commande')",
                                                    "format": "precision"
                                                },
                                                {
                                                    "uniqueName": "perecart",
                                                    "caption": "% ECART",
                                                    "formula":"IF(sum('stock')=0,0,(sum('total_commande')*100)/sum('stock'))",
                                                    "format": "percentage"
                                                },


                                            ]
                                        },

                                        "options": {
                                            "sorting": "off",
                                            "grid": {
                                                "type": "classic",
                                                "title": "<?php echo $page_title ?>",
                                                "showHeaders": false,
                                                "showGrandTotals": "off",

                                                "showHierarchyCaptions": false
                                            },
                                            "showAggregationLabels": false
                                        },
                                        "formats": [
                                            {
                                            "name": "precision",
                                            "decimalPlaces": 2,
                                            },
                                            {
                                            "name": "percentage",
                                            "decimalPlaces": 2,
                                           
                                            }
                                        ]
                                    },

                                });

                                
                                pivot1.customizeCell(function customizeCellFunction(cell, data) {


                                    if (data.rows[0] && data.rows[0].caption == "ZTOTAL") {
                                        
                                        if (data.columnIndex == 0) {
                                            cell.text = ""                                           
                                        }
                                        if(data.isClassicTotalRow){
                                            cell.text = ""
                                        }
                                        

                                        console.log(cell)
                                        console.log(data)
                                    }
                                    console.log("***********")

                                });

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