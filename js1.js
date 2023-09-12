        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init({
                sbm: "sb-l-c",
            });

            // Init Demo JS
            Demo.init();

            // Init Widget Demo JS
            // demoHighCharts.init();

            // Because we are using Admin Panels we use the OnFinish 
            // callback to activate the demoWidgets. It's smoother if
            // we let the panels be moved and organized before 
            // filling them with content from various plugins

            // Init plugins used on this page
            // HighCharts, JvectorMap, Admin Panels

            // Init Admin Panels on widgets inside the ".admin-panels" container
            $('.admin-panels').adminpanel({
                grid: '.admin-grid',
                draggable: true,
                preserveGrid: true,
                mobile: false,
                callback: function() {
                    bootbox.confirm('<h3>A Custom Callback!</h3>', function() {});
                },
                onFinish: function() {
                    $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                    // Init the rest of the plugins now that the panels
                    // have had a chance to be moved and organized.
                    // It's less taxing to organize empty panels
                    demoHighCharts.init();
                    runVectorMaps();

                    // We also refresh any "in-view" waypoints to ensure
                    // the correct position is being calculated after the 
                    // Admin Panels plugin moved everything
                    Waypoint.refreshAll();

                },
                onSave: function() {
                    $(window).trigger('resize');
                }
            });

            // Widget VectorMap
            function runVectorMaps() {

                // Jvector Map Plugin
                var runJvectorMap = function() {
                    // Data set
                    var mapData = [900, 700, 350, 500];
                    // Init Jvector Map
                    $('#WidgetMap').vectorMap({
                        map: 'us_lcc_en',
                        //regionsSelectable: true,
                        backgroundColor: 'transparent',
                        series: {
                            markers: [{
                                attribute: 'r',
                                scale: [3, 7],
                                values: mapData
                            }]
                        },
                        regionStyle: {
                            initial: {
                                fill: '#E5E5E5'
                            },
                            hover: {
                                "fill-opacity": 0.3
                            }
                        },
                        markers: [{
                            latLng: [37.78, -122.41],
                            name: 'San Francisco,CA'
                        }, {
                            latLng: [36.73, -103.98],
                            name: 'Texas,TX'
                        }, {
                            latLng: [38.62, -90.19],
                            name: 'St. Louis,MO'
                        }, {
                            latLng: [40.67, -73.94],
                            name: 'New York City,NY'
                        }],
                        markerStyle: {
                            initial: {
                                fill: '#a288d5',
                                stroke: '#b49ae0',
                                "fill-opacity": 1,
                                "stroke-width": 10,
                                "stroke-opacity": 0.3,
                                r: 3
                            },
                            hover: {
                                stroke: 'black',
                                "stroke-width": 2
                            },
                            selected: {
                                fill: 'blue'
                            },
                            selectedHover: {}
                        },
                    });
                    // Manual code to alter the Vector map plugin to 
                    // allow for individual coloring of countries
                    var states = ['US-CA', 'US-TX', 'US-MO',
                        'US-NY'
                    ];
                    var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
                    var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
                    $.each(states, function(i, e) {
                        $("#WidgetMap path[data-code=" + e + "]").css({
                            fill: colors[i]
                        });
                    });
                    $('#WidgetMap').find('.jvectormap-marker')
                        .each(function(i, e) {
                            $(e).css({
                                fill: colors2[i],
                                stroke: colors2[i]
                            });
                        });
                }

                if ($('#WidgetMap').length) {
                    runJvectorMap();
                }
            }
			// Init Admin plugins
            $(".datepicker").datepicker({
                numberOfMonths: 1,
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                showButtonPanel: false,
                beforeShow: function(input, inst) {
                    var newclass = 'admin-form';
                    var themeClass = $(this).parents('.admin-form').attr('class');
                    var smartpikr = inst.dpDiv.parent();
                    if (!smartpikr.hasClass(themeClass)) {
                        inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                    }
                }
            });
			 function loadfile(f) {
	  
			var d = new Date(document.getElementById("date1").value);
var dd = ("0"+d.getDate()).slice(-2);
var mm = d.getMonth()+1;

var aa = d.getFullYear();

var date_du = aa+""+mm+""+dd ;

var d = new Date(document.getElementById("date2").value);
var dd = ("0"+d.getDate()).slice(-2);
var mm = d.getMonth()+1;
var aa = d.getFullYear();

var date_au = aa+""+mm+""+dd ;

	       var str = f+"?date1="+date_du+"&date2="+date_au;
		   
                function readJSON(file) {
    var request = new XMLHttpRequest();
    request.open('GET', file, false);
    request.send(null);
    if (request.status == 200)
        return request.responseText;
                };
                
                
                function getJSONData(str) {
					
                               return JSON.parse(readJSON(str));
                };
                
                var pivot1 = new WebDataRocks({
                               container: "#wdr-component",
                               toolbar: false,
                               report: {
                                               dataSource: {
                                                               "data": getJSONData(str)
                                               },
                                               "slice": {
        "rows": [
            {
                "uniqueName": "Agence"
            },
            {
                "uniqueName": "Famille"
            },
            {
                "uniqueName": "SousFamille"
            },
            {
                "uniqueName": "Produit"
            },
            {
                "uniqueName": "Article"
            }
        ],
        "columns": [
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "ValeurCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (Dh)",
            },
            {
                "uniqueName": "ValeurLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Dh)",
            },
            {
                "uniqueName": "PoidsCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (kg)",
            },
            {
                "uniqueName": "PoidsLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Kg)",
            },
            {
                "uniqueName": "QS",
                "formula": "(sum(\"ValeurLivraison\")  / sum(\"ValeurCommande\") ) * 100",
                "caption": "QS (Valeur)",
                "format": "3bep0lb7"
            }
        ]
    },
    "options": {
        "grid": {
            "title": "Qualité de service / Agence",
            "showHeaders": false,
            "showGrandTotals": "columns",
            "showHierarchyCaptions": false
        },
        "showAggregationLabels": false
    },
    "formats": [
        {
            "name": "3bep0lb7",
            "thousandsSeparator": " ",
            "decimalSeparator": ".",
            "decimalPlaces": 2,
            "currencySymbol": "",
            "currencySymbolAlign": "left",
            "nullValue": "",
            "textAlign": "right",
            "isPercent": false
        }
    ]
                               },
                               
                });
                
                
                var pivot2 = new WebDataRocks({
                               container: "#wdr-component2",
                               toolbar: false,
                               report: {
                                               dataSource: {
                                                               "data": getJSONData(str)
                                               },
                                               "slice": {
        "reportFilters": [
            {
                "uniqueName": "Agence"
            }
        ],
        "rows": [
            {
                "uniqueName": "GroupArticle"
            },
            {
                "uniqueName": "Famille"
            },
            {
                "uniqueName": "SousFamille"
            },
            {
                "uniqueName": "Produit"
            },
            {
                "uniqueName": "Article"
            }
        ],
        "columns": [
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "ValeurCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (Dh)",
            },
            {
                "uniqueName": "ValeurLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Dh)",
            },
            {
                "uniqueName": "PoidsCommande",
                "aggregation": "sum",
                                                               "caption": "Commande (kg)",
            },
            {
                "uniqueName": "PoidsLivraison",
                "aggregation": "sum",
                                                               "caption": "Livraison (Kg)",
            },
            {
                "uniqueName": "QS",
                "formula": "(sum(\"ValeurLivraison\")  / sum(\"ValeurCommande\") ) * 100",
                "caption": "QS (Valeur)",
                "format": "3bep0lb7"
            }
        ]
    },
    "options": {
        "grid": {
            "title": "Qualité de service / Catégorie",
            "showHeaders": false,
            "showGrandTotals": "columns",
            "showHierarchyCaptions": false
        },
        "showAggregationLabels": false
    },
    "formats": [
        {
            "name": "3bep0lb7",
            "thousandsSeparator": " ",
            "decimalSeparator": ".",
            "decimalPlaces": 2,
            "currencySymbol": "",
            "currencySymbolAlign": "left",
            "nullValue": "",
            "textAlign": "right",
            "isPercent": false
        }
    ]
                               },
                               
                });
  }
 

        });
