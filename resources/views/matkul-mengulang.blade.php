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
    var chart1 = AmCharts.makeChart("chartdiv1", {
        "theme": "light",
        "type": "serial",
        "startDuration": 2,
        "dataProvider": [{
            "country": "USA",
            "visits": 4025,
            "color": "#FF0F00"
        }, {
            "country": "China",
            "visits": 1882,
            "color": "#FF6600"
        }, {
            "country": "Japan",
            "visits": 1809,
            "color": "#FF9E01"
        }, {
            "country": "Germany",
            "visits": 1322,
            "color": "#FCD202"
        }, {
            "country": "UK",
            "visits": 1122,
            "color": "#F8FF01"
        }, {
            "country": "France",
            "visits": 1114,
            "color": "#B0DE09"
        }, {
            "country": "India",
            "visits": 984,
            "color": "#04D215"
        }, {
            "country": "Spain",
            "visits": 711,
            "color": "#0D8ECF"
        }, {
            "country": "Netherlands",
            "visits": 665,
            "color": "#0D52D1"
        }, {
            "country": "Russia",
            "visits": 580,
            "color": "#2A0CD0"
        }, {
            "country": "South Korea",
            "visits": 443,
            "color": "#8A0CCF"
        }, {
            "country": "Canada",
            "visits": 441,
            "color": "#CD0D74"
        }, {
            "country": "Brazil",
            "visits": 395,
            "color": "#754DEB"
        }, {
            "country": "Italy",
            "visits": 386,
            "color": "#DDDDDD"
        }, {
            "country": "Australia",
            "visits": 384,
            "color": "#999999"
        }, {
            "country": "Taiwan",
            "visits": 338,
            "color": "#333333"
        }, {
            "country": "Poland",
            "visits": 328,
            "color": "#000000"
        }],
        "valueAxes": [{
            "position": "left",
            "title": "Visitors"
        }],
        "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 1,
            "lineAlpha": 0.1,
            "type": "column",
            "valueField": "visits"
        }],
        "depth3D": 20,
        "angle": 30,
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 90
        },
        "export": {
            "enabled": true
        }

    });
    //END CHART 1

    //CHART 2
    var chart2 = AmCharts.makeChart("chartdiv2", {
        "theme": "light",
        "type": "serial",
        "startDuration": 2,
        "dataProvider": [{
            "country": "USA",
            "visits": 4025,
            "color": "#FF0F00"
        }, {
            "country": "China",
            "visits": 1882,
            "color": "#FF6600"
        }, {
            "country": "Japan",
            "visits": 1809,
            "color": "#FF9E01"
        }, {
            "country": "Germany",
            "visits": 1322,
            "color": "#FCD202"
        }, {
            "country": "UK",
            "visits": 1122,
            "color": "#F8FF01"
        }, {
            "country": "France",
            "visits": 1114,
            "color": "#B0DE09"
        }, {
            "country": "India",
            "visits": 984,
            "color": "#04D215"
        }, {
            "country": "Spain",
            "visits": 711,
            "color": "#0D8ECF"
        }, {
            "country": "Netherlands",
            "visits": 665,
            "color": "#0D52D1"
        }, {
            "country": "Russia",
            "visits": 580,
            "color": "#2A0CD0"
        }, {
            "country": "South Korea",
            "visits": 443,
            "color": "#8A0CCF"
        }, {
            "country": "Canada",
            "visits": 441,
            "color": "#CD0D74"
        }, {
            "country": "Brazil",
            "visits": 395,
            "color": "#754DEB"
        }, {
            "country": "Italy",
            "visits": 386,
            "color": "#DDDDDD"
        }, {
            "country": "Australia",
            "visits": 384,
            "color": "#999999"
        }, {
            "country": "Taiwan",
            "visits": 338,
            "color": "#333333"
        }, {
            "country": "Poland",
            "visits": 328,
            "color": "#000000"
        }],
        "valueAxes": [{
            "position": "left",
            "title": "Visitors"
        }],
        "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 1,
            "lineAlpha": 0.1,
            "type": "column",
            "valueField": "visits"
        }],
        "depth3D": 20,
        "angle": 30,
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 90
        },
        "export": {
            "enabled": true
        }

    });
    //END CHART 2

    //CHART 3
    var chart3 = AmCharts.makeChart("chartdiv3", {
        "theme": "light",
        "type": "serial",
        "startDuration": 2,
        "dataProvider": [{
            "country": "USA",
            "visits": 4025,
            "color": "#FF0F00"
        }, {
            "country": "China",
            "visits": 1882,
            "color": "#FF6600"
        }, {
            "country": "Japan",
            "visits": 1809,
            "color": "#FF9E01"
        }, {
            "country": "Germany",
            "visits": 1322,
            "color": "#FCD202"
        }, {
            "country": "UK",
            "visits": 1122,
            "color": "#F8FF01"
        }, {
            "country": "France",
            "visits": 1114,
            "color": "#B0DE09"
        }, {
            "country": "India",
            "visits": 984,
            "color": "#04D215"
        }, {
            "country": "Spain",
            "visits": 711,
            "color": "#0D8ECF"
        }, {
            "country": "Netherlands",
            "visits": 665,
            "color": "#0D52D1"
        }, {
            "country": "Russia",
            "visits": 580,
            "color": "#2A0CD0"
        }, {
            "country": "South Korea",
            "visits": 443,
            "color": "#8A0CCF"
        }, {
            "country": "Canada",
            "visits": 441,
            "color": "#CD0D74"
        }, {
            "country": "Brazil",
            "visits": 395,
            "color": "#754DEB"
        }, {
            "country": "Italy",
            "visits": 386,
            "color": "#DDDDDD"
        }, {
            "country": "Australia",
            "visits": 384,
            "color": "#999999"
        }, {
            "country": "Taiwan",
            "visits": 338,
            "color": "#333333"
        }, {
            "country": "Poland",
            "visits": 328,
            "color": "#000000"
        }],
        "valueAxes": [{
            "position": "left",
            "title": "Visitors"
        }],
        "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 1,
            "lineAlpha": 0.1,
            "type": "column",
            "valueField": "visits"
        }],
        "depth3D": 20,
        "angle": 30,
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 90
        },
        "export": {
            "enabled": true
        }

    });
    //END CHART 3


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
                                        <b>MAHASISWA MENGULANG</b>
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
