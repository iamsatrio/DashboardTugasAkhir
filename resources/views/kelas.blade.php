<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>

        body {
            font-family: Verdana;
            font-size: 12px;
        }

        #chartdiv {
            width: 100%;
            height: 400px;
            font-size: 11px;
        }

        #debug {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 20px;
        }

        #loader {
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000;
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
            animation: sk-scaleout 1.0s infinite ease-in-out;
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            100% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="app">
<!-- @TOC -->
<!-- =================================================== -->
<!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

<!-- @Page Loader -->
<!-- =================================================== -->
<div id='loader'>
    <div class="spinner"></div>
</div>

<script type="text/javascript">
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "autoMargins": false,
            "borderAlpha": 0.2,
            "equalWidths": false,
            "horizontalGap": 10,
            "markerSize": 10,
            "useGraphSettings": true,
            "valueAlign": "left",
            "valueWidth": 0
        },
        "dataProvider": [{
            "year": "SI 38 01",
            "europe": 25,
            "namerica": 25,
            "asia": 21,
        }, {
            "year": "SI 38 02",
            "europe": 26,
            "namerica": 27,
            "asia": 22,
        }, {
            "year": "SI 38 03",
            "europe": 28,
            "namerica": 29,
            "asia": 24,
        }, {
            "year": "SI 38 04",
            "europe": 28,
            "namerica": 29,
            "asia": 24,
        }, {
            "year": "SI 38 05",
            "europe": 28,
            "namerica": 29,
            "asia": 24,
        }, {
            "year": "SI 38 06",
            "europe": 28,
            "namerica": 29,
            "asia": 24,
        }],
        "valueAxes": [{
            "stackType": "100%",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "labelsEnabled": false,
            "position": "left"
        }],
        "graphs": [{
            "balloonText": "[[title]], [[category]]<br><span style='font-size:14px;'><b>[[value]]</b> ([[percents]]%)</span>",
            "fillAlphas": 1,
            "fontSize": 11,
            "labelText": "[[percents]]%",
            "lineAlpha": 0.5,
            "title": "At Risk",
            "type": "column",
            "valueField": "europe",
            "alphaField": "europe_fill",
            "showHandOnHover": true
        }, {
            "balloonText": "[[title]], [[category]]<br><span style='font-size:14px;'><b>[[value]]</b> ([[percents]]%)</span>",
            "fillAlphas": 1,
            "fontSize": 11,
            "labelText": "[[percents]]%",
            "lineAlpha": 0.5,
            "title": "Warning",
            "type": "column",
            "valueField": "namerica",
            "alphaField": "namerica_fill",
            "showHandOnHover": true
        }, {
            "balloonText": "[[title]], [[category]]<br><span style='font-size:14px;'><b>[[value]]</b> ([[percents]]%)</span>",
            "fillAlphas": 1,
            "fontSize": 11,
            "labelText": "[[percents]]%",
            "lineAlpha": 0.5,
            "title": "On Time",
            "type": "column",
            "valueField": "asia",
            "alphaField": "asia_fill",
            "showHandOnHover": true
        }],
        "marginTop": 30,
        "marginRight": 0,
        "marginLeft": 0,
        "marginBottom": 40,
        "autoMargins": false,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0
        }
    });

    chart.addListener("clickGraphItem", function (event) {
        // update click debug info
        document.getElementById('debug').innerHTML = 'Clicked: ' + event.graph.title + ' (' + event.item.category + ')';

        

        // toggle between fills
        if (event.item.dataContext[event.graph.alphaField] == 1)
            event.item.dataContext[event.graph.alphaField] = 0.5;
        else
            event.item.dataContext[event.graph.alphaField] = 1;
        event.chart.validateData();
    });

    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 300);
    });
</script>

<!-- @App Content -->
<!-- =================================================== -->
<div>
    <!-- #Left Sidebar ==================== -->
@include('layouts.sidebar')

<!-- #Main ============================ -->
    <div class="page-container">
        <!-- ### $Topbar ### -->
    @include('layouts.header')

    <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
            <div id='mainContent'>
                <div class="row gap-20 masonry pos-r">
                    <div class="masonry-sizer col-md-6"></div>
                    <div class="masonry-item col-12">
                        <!-- #Site Visits ==================== -->
                        <div class="bd bgc-white">
                            <div class="peers fxw-nw@lg+ ai-s">
                                <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                                    <div class="layers">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Student Year 2014</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div id="chartdiv"></div>
                                            <div id="debug">Click column sections to display information</div>
                                            <h4 class="ta-c">Total 252 Students</h4>
                                            {{--<center><div id="power-gauge"></div></center>--}}
                                            {{--<center><div id="percent"></div></center>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            <span>Copyright © 2017 Designed by <a href="https://colorlib.com" target='_blank'
                                                  title="Colorlib">Colorlib</a>. All rights reserved.</span>
        </footer>
    </div>
</div>
</body>
<script src="{{asset('js/index.js')}}" charset="utf-8"></script>
</html>
