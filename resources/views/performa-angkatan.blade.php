<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/gauge.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>

        body {
            font-family: Helvetica, Arial, sans-serif;
            /*margin: 32px;*/
        }

        .ntab {
            border-radius: 2pt;
            border-top: lightgray 1pt solid;
            border-left: lightgray 1pt solid;
            border-right: lightgray 1pt solid;
            padding: 5px;
            margin-top: 5px;
            margin-left: 5px;
            margin-right: 5px;

        }

        .ntab.active {
            background-color: #00a1e4 !important;
            color: white;
        }

        #chartdiv1 {
            width: 100%;
            height: 400px;
        }

        #chartdiv2 {
            width: 100%;
            height: 400px;
        }

        #chartdiv3 {
            width: 100%;
            height: 400px;
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
    //CHART 1
    var chartData1 = generateChartData1();

    var chart1 = AmCharts.makeChart("chartdiv1", {
        "type": "serial",
        "theme": "light",
        "legend": {
            "useGraphSettings": true
        },
        "dataProvider": chartData1,
        "synchronizeGrid": true,
        "valueAxes": [{
            "id": "v1",
            "axisColor": "#FF6600",
            "axisThickness": 2,
            "axisAlpha": 1,
            "position": "left"
        }, {
            "id": "v2",
            "axisColor": "#FCD202",
            "axisThickness": 2,
            "axisAlpha": 1,
            "position": "right"
        }, {
            "id": "v3",
            "axisColor": "#B0DE09",
            "axisThickness": 2,
            "gridAlpha": 0,
            "offset": 50,
            "axisAlpha": 1,
            "position": "left"
        }],
        "graphs": [{
            "valueAxis": "v1",
            "lineColor": "#FF6600",
            "bullet": "round",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "red line",
            "valueField": "visits",
            "fillAlphas": 0
        }, {
            "valueAxis": "v2",
            "lineColor": "#FCD202",
            "bullet": "square",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "yellow line",
            "valueField": "hits",
            "fillAlphas": 0
        }, {
            "valueAxis": "v3",
            "lineColor": "#B0DE09",
            "bullet": "triangleUp",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "green line",
            "valueField": "views",
            "fillAlphas": 0
        }],
        "chartScrollbar": {},
        "chartCursor": {
            "cursorPosition": "mouse"
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "axisColor": "#DADADA",
            "minorGridEnabled": true
        },
        "export": {
            "enabled": true,
            "position": "bottom-right"
        }
    });

    chart1.addListener("dataUpdated", zoomChart1);
    zoomChart1();


    // generate some random data, quite different range
    function generateChartData1() {
        var chartData = [];
        var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 100);

        var visits = 1600;
        var hits = 2900;
        var views = 8700;


        for (var i = 0; i < 100; i++) {
            // we create date objects here. In your data, you can have date strings
            // and then set format of your dates using chart.dataDateFormat property,
            // however when possible, use date objects, as this will speed up chart rendering.
            var newDate = new Date(firstDate);
            newDate.setDate(newDate.getDate() + i);

            visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            hits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            views += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

            chartData.push({
                date: newDate,
                visits: visits,
                hits: hits,
                views: views
            });
        }
        return chartData;
    }

    function zoomChart1() {
        chart1.zoomToIndexes(chart1.dataProvider.length - 20, chart1.dataProvider.length - 1);
    }

    //CHART 2
    var chartData2 = generateChartData2();

    var chart2 = AmCharts.makeChart("chartdiv2", {
        "type": "serial",
        "theme": "light",
        "legend": {
            "useGraphSettings": true
        },
        "dataProvider": chartData2,
        "synchronizeGrid": true,
        "valueAxes": [{
            "id": "v1",
            "axisColor": "#FF6600",
            "axisThickness": 2,
            "axisAlpha": 1,
            "position": "left"
        }, {
            "id": "v2",
            "axisColor": "#FCD202",
            "axisThickness": 2,
            "axisAlpha": 1,
            "position": "right"
        }, {
            "id": "v3",
            "axisColor": "#B0DE09",
            "axisThickness": 2,
            "gridAlpha": 0,
            "offset": 50,
            "axisAlpha": 1,
            "position": "left"
        }],
        "graphs": [{
            "valueAxis": "v1",
            "lineColor": "#FF6600",
            "bullet": "round",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "red line",
            "valueField": "visits",
            "fillAlphas": 0
        }, {
            "valueAxis": "v2",
            "lineColor": "#FCD202",
            "bullet": "square",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "yellow line",
            "valueField": "hits",
            "fillAlphas": 0
        }, {
            "valueAxis": "v3",
            "lineColor": "#B0DE09",
            "bullet": "triangleUp",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "green line",
            "valueField": "views",
            "fillAlphas": 0
        }],
        "chartScrollbar": {},
        "chartCursor": {
            "cursorPosition": "mouse"
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "axisColor": "#DADADA",
            "minorGridEnabled": true
        },
        "export": {
            "enabled": true,
            "position": "bottom-right"
        }
    });

    chart2.addListener("dataUpdated", zoomChart2);
    zoomChart2();


    // generate some random data, quite different range
    function generateChartData2() {
        var chartData = [];
        var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 100);

        var visits = 1600;
        var hits = 2900;
        var views = 8700;


        for (var i = 0; i < 100; i++) {
            // we create date objects here. In your data, you can have date strings
            // and then set format of your dates using chart.dataDateFormat property,
            // however when possible, use date objects, as this will speed up chart rendering.
            var newDate = new Date(firstDate);
            newDate.setDate(newDate.getDate() + i);

            visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            hits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            views += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

            chartData.push({
                date: newDate,
                visits: visits,
                hits: hits,
                views: views
            });
        }
        return chartData;
    }

    function zoomChart2() {
        chart2.zoomToIndexes(chart2.dataProvider.length - 20, chart2.dataProvider.length - 1);
    }


    //CHART 3
    var chartData3 = generateChartData3();

    var chart3 = AmCharts.makeChart("chartdiv3", {
        "type": "serial",
        "theme": "light",
        "legend": {
            "useGraphSettings": true
        },
        "dataProvider": chartData3,
        "synchronizeGrid": true,
        "valueAxes": [{
            "id": "v1",
            "axisColor": "#FF6600",
            "axisThickness": 2,
            "axisAlpha": 1,
            "position": "left"
        }, {
            "id": "v2",
            "axisColor": "#FCD202",
            "axisThickness": 2,
            "axisAlpha": 1,
            "position": "right"
        }, {
            "id": "v3",
            "axisColor": "#B0DE09",
            "axisThickness": 2,
            "gridAlpha": 0,
            "offset": 50,
            "axisAlpha": 1,
            "position": "left"
        }],
        "graphs": [{
            "valueAxis": "v1",
            "lineColor": "#FF6600",
            "bullet": "round",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "red line",
            "valueField": "visits",
            "fillAlphas": 0
        }, {
            "valueAxis": "v2",
            "lineColor": "#FCD202",
            "bullet": "square",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "yellow line",
            "valueField": "hits",
            "fillAlphas": 0
        }, {
            "valueAxis": "v3",
            "lineColor": "#B0DE09",
            "bullet": "triangleUp",
            "bulletBorderThickness": 1,
            "hideBulletsCount": 30,
            "title": "green line",
            "valueField": "views",
            "fillAlphas": 0
        }],
        "chartScrollbar": {},
        "chartCursor": {
            "cursorPosition": "mouse"
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "axisColor": "#DADADA",
            "minorGridEnabled": true
        },
        "export": {
            "enabled": true,
            "position": "bottom-right"
        }
    });

    chart3.addListener("dataUpdated", zoomChart3);
    zoomChart3();


    // generate some random data, quite different range
    function generateChartData3() {
        var chartData = [];
        var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 100);

        var visits = 1600;
        var hits = 2900;
        var views = 8700;


        for (var i = 0; i < 100; i++) {
            // we create date objects here. In your data, you can have date strings
            // and then set format of your dates using chart.dataDateFormat property,
            // however when possible, use date objects, as this will speed up chart rendering.
            var newDate = new Date(firstDate);
            newDate.setDate(newDate.getDate() + i);

            visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            hits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            views += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

            chartData.push({
                date: newDate,
                visits: visits,
                hits: hits,
                views: views
            });
        }
        return chartData;
    }

    function zoomChart3() {
        chart3.zoomToIndexes(chart3.dataProvider.length - 20, chart3.dataProvider.length - 1);
    }
    //END CHART


    $('.ntab').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
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
                    <div class="masonry-item  w-100">
                        <div class="row gap-20">
                            <!-- #At Risk ==================== -->
                            <div class='col-md-3'>
                                <div class="layers bd bgc-red-300 p-20">
                                    <div class="layer w-100 mB-10">
                                        <span class="lh-1" style="color: #ffffff">Angkatan 2015</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">
                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500"><i
                                                            class="ti ti-arrow-down"></i> 10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- #On Time ==================== -->
                            <div class='col-md-3'>
                                <div class="layers bd bgc-green-300 p-20">
                                    <div class="layer w-100 mB-10">
                                        <span class="lh-1" style="color: #ffffff">Angkatan 2016</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">

                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><i
                                                            class="ti ti-arrow-up"></i> 6%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- #Mahasiswa Mengulang==================== -->
                            <div class='col-md-3'>
                                <div class="layers bd bgc-green-300 p-20">
                                    <div class="layer w-100 mB-10">
                                        <span class="lh-1" style="color: #ffffff">Angkatan 2017</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">

                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><i
                                                            class="ti ti-arrow-up"></i> 2%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- #Matkul Paling Banyak Diulang ==================== -->
                            <div class='col-md-3'>
                                <div class="layers bd bgc-green-300 p-20">
                                    <div class="layer w-100 mB-10">
                                        <span class="lh-1" style="color: #ffffff">Angkatan 2018</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">

                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><i
                                                            class="ti ti-arrow-up"></i> 9%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="masonry-item col-12">
                        <!-- #Site Visits ==================== -->
                        <div class="bd bgc-white">
                            <div class="peers fxw-nw@lg+ ai-s">
                                <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                                    <div class="layers">
                                        <b>PERFORMA MAHASISWA</b>
                                        <div class="layer w-100 mB-10">
                                            <ul class="nav nav-tabs layer w-100 mB-10">
                                                <a data-toggle="tab" href="#home" class="ntab active">
                                                    <li>Angkatan 2015</li>
                                                </a>
                                                <a data-toggle="tab" href="#menu1" class="ntab">
                                                    <li>Angkatan 2016</li>
                                                </a>
                                                <a data-toggle="tab" href="#menu2" class="ntab">
                                                    <li>Angkatan 2017</li>
                                                </a>
                                            </ul>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="tab-content">
                                                <div id="home" class="tab-pane in active">
                                                    <div id="chartdiv1"></div>
                                                </div>
                                                <div id="menu1" class="tab-pane fade">
                                                    <div id="chartdiv2"></div>
                                                </div>
                                                <div id="menu2" class="tab-pane fade">
                                                    <div id="chartdiv3"></div>
                                                </div>
                                            </div>
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
