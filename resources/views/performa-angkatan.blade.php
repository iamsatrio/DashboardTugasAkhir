<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>


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

        #chartdiv {
            width: 100%;
            height: 400px;
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

        #chartdiv4 {
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
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "light",
        "titles": [{
            "text": "Traffic incidents per year",
            "size": 15
        }],
        "legend": {
            "align": "center",
            "equalWidths": false,
            "periodValueText": "total: [[value.sum]]",
            "valueAlign": "left",
            "valueText": "[[value]] ([[percents]]%)",
            "valueWidth": 100
        },
        "dataProvider": [{
            "year": "2000",
            "cars": 1587,
            "motorcycles": 650,
            "bicycles": 121
        }, {
            "year": "1995",
            "cars": 1567,
            "motorcycles": 683,
            "bicycles": 146
        }, {
            "year": "1996",
            "cars": 1617,
            "motorcycles": 691,
            "bicycles": 138
        }, {
            "year": "1997",
            "cars": 1630,
            "motorcycles": 642,
            "bicycles": 127
        }, {
            "year": "1998",
            "cars": 1660,
            "motorcycles": 699,
            "bicycles": 105
        }, {
            "year": "1999",
            "cars": 1683,
            "motorcycles": 721,
            "bicycles": 109
        }, {
            "year": "2000",
            "cars": 1691,
            "motorcycles": 737,
            "bicycles": 112
        }, {
            "year": "2001",
            "cars": 1298,
            "motorcycles": 680,
            "bicycles": 101
        }, {
            "year": "2002",
            "cars": 1275,
            "motorcycles": 664,
            "bicycles": 97
        }, {
            "year": "2003",
            "cars": 1246,
            "motorcycles": 648,
            "bicycles": 93
        }, {
            "year": "2004",
            "cars": 1218,
            "motorcycles": 637,
            "bicycles": 101
        }, {
            "year": "2005",
            "cars": 1213,
            "motorcycles": 633,
            "bicycles": 87
        }, {
            "year": "2006",
            "cars": 1199,
            "motorcycles": 621,
            "bicycles": 79
        }, {
            "year": "2007",
            "cars": 1110,
            "motorcycles": 210,
            "bicycles": 81
        }, {
            "year": "2008",
            "cars": 1165,
            "motorcycles": 232,
            "bicycles": 75
        }, {
            "year": "2009",
            "cars": 1145,
            "motorcycles": 219,
            "bicycles": 88
        }, {
            "year": "2010",
            "cars": 1163,
            "motorcycles": 201,
            "bicycles": 82
        }, {
            "year": "2011",
            "cars": 1180,
            "motorcycles": 285,
            "bicycles": 87
        }, {
            "year": "2012",
            "cars": 1159,
            "motorcycles": 277,
            "bicycles": 71
        }],
        "valueAxes": [{
            "stackType": "100%",
            "gridAlpha": 0.07,
            "position": "left",
            "title": "percent"
        }],
        "graphs": [{
            "balloonText": "<img src='https://www.amcharts.com/lib/3/images/car.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>",
            "fillAlphas": 0.5,
            "lineAlpha": 0.5,
            "title": "Cars",
            "valueField": "cars"
        }, {
            "balloonText": "<img src='https://www.amcharts.com/lib/3/images/motorcycle.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>",
            "fillAlphas": 0.5,
            "lineAlpha": 0.5,
            "title": "Motorcycles",
            "valueField": "motorcycles"
        }, {
            "balloonText": "<img src='https://www.amcharts.com/lib/3/images/bicycle.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>",
            "fillAlphas": 0.5,
            "lineAlpha": 0.5,
            "title": "Bicycles",
            "valueField": "bicycles"
        }],
        "plotAreaBorderAlpha": 0,
        "marginLeft": 0,
        "marginBottom": 0,
        "chartCursor": {
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "year",
        "categoryAxis": {
            "startOnAxis": true,
            "axisColor": "#DADADA",
            "gridAlpha": 0.07
        },
        "export": {
            "enabled": true
        }
    });

    var chart1 = AmCharts.makeChart("chartdiv1", {
        "type": "gauge",
        "theme": "light",
        "axes": [{
            "axisThickness": 1,
            "axisAlpha": 0.2,
            "tickAlpha": 0.2,
            "valueInterval": 10,
            "fontSize": 20,
            "bottomTextFontSize": 28,
            "bands": [{
                "color": "#84b761",
                "endValue": 20,
                "innerRadius": "95%",
                "startValue": 0
            }, {
                "color": "#fdd400",
                "endValue": 50,
                "innerRadius": "95%",
                "startValue": 20
            }, {
                "color": "#cc4748",
                "endValue": 100,
                "innerRadius": "95%",
                "startValue": 50
            }],
            "bottomText": "0 %",
            "bottomTextYOffset": -20,
            "endValue": 100
        }],
        "arrows": [{}],
        "export": {
            "enabled": true
        }


    });

    var chart2 = AmCharts.makeChart("chartdiv2", {
        "type": "gauge",
        "theme": "light",
        "axes": [{
            "axisThickness": 1,
            "axisAlpha": 0.2,
            "tickAlpha": 0.2,
            "valueInterval": 10,
            "fontSize": 20,
            "bottomTextFontSize": 28,
            "bands": [{
                "color": "#84b761",
                "endValue": 20,
                "innerRadius": "95%",
                "startValue": 0
            }, {
                "color": "#fdd400",
                "endValue": 50,
                "innerRadius": "95%",
                "startValue": 20
            }, {
                "color": "#cc4748",
                "endValue": 100,
                "innerRadius": "95%",
                "startValue": 50
            }],
            "bottomText": "0 %",
            "bottomTextYOffset": -20,
            "endValue": 100
        }],
        "arrows": [{}],
        "export": {
            "enabled": true
        }
    });

    var chart3 = AmCharts.makeChart("chartdiv3", {
        "type": "gauge",
        "theme": "light",
        "axes": [{
            "axisThickness": 1,
            "axisAlpha": 0.2,
            "tickAlpha": 0.2,
            "valueInterval": 10,
            "fontSize": 20,
            "bottomTextFontSize": 28,
            "bands": [{
                "color": "#84b761",
                "endValue": 20,
                "innerRadius": "95%",
                "startValue": 0
            }, {
                "color": "#fdd400",
                "endValue": 50,
                "innerRadius": "95%",
                "startValue": 20
            }, {
                "color": "#cc4748",
                "endValue": 100,
                "innerRadius": "95%",
                "startValue": 50
            }],
            "bottomText": "0 %",
            "bottomTextYOffset": -20,
            "endValue": 100
        }],
        "arrows": [{}],
        "export": {
            "enabled": true
        }
    });

    var chart4 = AmCharts.makeChart("chartdiv4", {
        "type": "gauge",
        "theme": "light",
        "axes": [{
            "axisThickness": 1,
            "axisAlpha": 0.2,
            "tickAlpha": 0.2,
            "valueInterval": 10,
            "fontSize": 20,
            "bottomTextFontSize": 28,
            "bands": [{
                "color": "#84b761",
                "endValue": 20,
                "innerRadius": "95%",
                "startValue": 0
            }, {
                "color": "#fdd400",
                "endValue": 50,
                "innerRadius": "95%",
                "startValue": 20
            }, {
                "color": "#cc4748",
                "endValue": 100,
                "innerRadius": "95%",
                "startValue": 50
            }],
            "bottomText": "0 %",
            "bottomTextYOffset": -20,
            "endValue": 100
        }],
        "arrows": [{}],
        "export": {
            "enabled": true
        }
    });

    setInterval(randomValue, 2000);

    // set random value
    function randomValue() {
        var value = Math.round(Math.random() * 100);
        if (chart1) {
            if (chart1.arrows) {
                if (chart1.arrows[0]) {
                    if (chart1.arrows[0].setValue) {
                        chart1.arrows[0].setValue(value);
                        chart1.axes[0].setBottomText(value + " %");
                    }
                }
            }
        }
        var value2 = Math.round(Math.random() * 100);
        if (chart2) {
            if (chart2.arrows) {
                if (chart2.arrows[0]) {
                    if (chart2.arrows[0].setValue) {
                        chart2.arrows[0].setValue(value2);
                        chart2.axes[0].setBottomText(value2 + " %");
                    }
                }
            }
        }
        var value3 = Math.round(Math.random() * 100);
        if (chart3) {
            if (chart3.arrows) {
                if (chart3.arrows[0]) {
                    if (chart3.arrows[0].setValue) {
                        chart3.arrows[0].setValue(value3);
                        chart3.axes[0].setBottomText(value3 + " %");
                    }
                }
            }
        }
        var value4 = Math.round(Math.random() * 100);
        if (chart4) {
            if (chart4.arrows) {
                if (chart4.arrows[0]) {
                    if (chart4.arrows[0].setValue) {
                        chart4.arrows[0].setValue(value4);
                        chart4.axes[0].setBottomText(value4 + " %");
                    }
                }
            }
        }

    }

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
                                        <span class="lh-1" style="color: #ffffff">At Risk</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">
                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">100 Students</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- #On Time ==================== -->
                            <div class='col-md-3'>
                                <div class="layers bd bgc-green-300 p-20">
                                    <div class="layer w-100 mB-10">
                                        <span class="lh-1" style="color: #ffffff">On Time</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">

                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">370 Students</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- #Mahasiswa Mengulang==================== -->
                            <div class='col-md-3'>
                                <div class="layers bd bgc-white p-20">
                                    <div class="layer w-100 mB-10">
                                        <span class="lh-1">Mahasiswa Mengulang</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">
                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">15%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- #Matkul Paling Banyak Diulang ==================== -->
                            <div class='col-md-3'>
                                <div class="layers bd bgc-white p-20">
                                    <div class="layer w-100 mB-10">
                                        <span class="lh-1">Matkul Paling Banyak Diulang</span>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed">
                                            </div>
                                            <div class="peer">
                                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">Struktur Data</span>
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
                                        <b>PREDIKSI LULUS TIDAK TEPAT WAKTU</b>
                                        <div class="layer w-100 mB-10">
                                            <ul class="nav nav-tabs layer w-100 mB-10">
                                                {{--<a data-toggle="tab" href="#home" class="ntab active">--}}
                                                    {{--<li>Angkatan 2014</li>--}}
                                                {{--</a>--}}
                                                {{--<a data-toggle="tab" href="#menu1" class="ntab">--}}
                                                    {{--<li>Angkatan 2015</li>--}}
                                                {{--</a>--}}
                                                {{--<a data-toggle="tab" href="#menu2" class="ntab">--}}
                                                    {{--<li>Angkatan 2016</li>--}}
                                                {{--</a>--}}
                                                {{--<a data-toggle="tab" href="#menu3" class="ntab">--}}
                                                    {{--<li>Angkatan 2017</li>--}}
                                                {{--</a>--}}
                                            </ul>
                                        </div>
                                        <div class="layer w-100">
                                            <div id="chartdiv"></div>
                                            {{--<div class="tab-content">--}}
                                                {{--<div id="home" class="tab-pane in active">--}}
                                                    {{--<div id="chartdiv1"></div>--}}
                                                {{--</div>--}}
                                                {{--<div id="menu1" class="tab-pane fade">--}}
                                                    {{--<div id="chartdiv2"></div>--}}
                                                {{--</div>--}}
                                                {{--<div id="menu2" class="tab-pane fade">--}}
                                                    {{--<div id="chartdiv3"></div>--}}
                                                {{--</div>--}}
                                                {{--<div id="menu3" class="tab-pane fade">--}}
                                                    {{--<div id="chartdiv4"></div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                                    <div class="layers">
                                        <div class="layer w-100">
                                            <!-- Progress Bars -->
                                            <div class="layers">
                                                <span class="mB-5">10 Mata Kuliah Paling Banyak Diulang</span>
                                                <div class="layer w-100 mT-10">
                                                    <a href="{{route('matkulMengulang')}}">
                                                        <small class="fw-600 c-grey-700">Struktur Data dan Pemrograman
                                                            Lanjut
                                                        </small>
                                                    </a>
                                                    <span class="pull-right c-grey-600 fsz-sm">90%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:90%;"><span
                                                                    class="sr-only">90%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Kalkulus 1</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">80%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:80%;"><span
                                                                    class="sr-only">80%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Fisika 1</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">70%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:70%;"><span
                                                                    class="sr-only">70%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Probabilitas dan Statistika</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">60%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:60%;"><span
                                                                    class="sr-only">60%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Statistika Industri</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">50%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:50%;"><span
                                                                    class="sr-only">50%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Kalkulus 2</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">40%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:40%;"><span
                                                                    class="sr-only">40%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Matematika Diskrit</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">30%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:30%;"><span
                                                                    class="sr-only">30% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Fisika 2</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">25%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:25%;"><span
                                                                    class="sr-only">25%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Pemrograman Berorientasi Objek
                                                    </small>
                                                    <span class="pull-right c-grey-600 fsz-sm">20%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:20%;"><span
                                                                    class="sr-only">20%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="layer w-100 mT-5">
                                                    <small class="fw-600 c-grey-700">Sistem Operasi</small>
                                                    <span class="pull-right c-grey-600 fsz-sm">10%</span>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-red-500" role="progressbar"
                                                             aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:10%;"><span
                                                                    class="sr-only">10%</span>
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
