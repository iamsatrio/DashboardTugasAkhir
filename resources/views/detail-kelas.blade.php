<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/gauge.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js" type="text/javascript"></script>


    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>

        body {
            font-family: Helvetica, Arial, sans-serif;
            /*margin: 32px;*/
        }

        #chartdiv {
            width: 100%;
            height: 500px;
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
    var gaugeChart = AmCharts.makeChart("chartdiv", {
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
                "color": "#cc4748",
                "endValue": 50,
                "innerRadius": "95%",
                "startValue": 0
            }, {
                "color": "#fdd400",
                "endValue": 70,
                "innerRadius": "95%",
                "startValue": 50
            }, {
                "color": "#84b761",
                "endValue": 100,
                "innerRadius": "95%",
                "startValue": 70
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
        if (gaugeChart) {
            if (gaugeChart.arrows) {
                if (gaugeChart.arrows[0]) {
                    if (gaugeChart.arrows[0].setValue) {
                        gaugeChart.arrows[0].setValue(value);
                        gaugeChart.axes[0].setBottomText(value + " %");
                    }
                }
            }
        }
    }

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
                    <div class="masonry-item col-md-6">
                        <h2>Class : SI 38 06</h2>
                        <!-- #Monthly Stats ==================== -->
                        <div class="bd bgc-white">
                            <div class="layers">
                                <div class="layer w-100 pX-20 pT-20">
                                    <h6 class="lh-1">Guardian Lecture</h6>
                                </div>
                                <div class="layer w-100 p-20">
                                    <img src="{{asset('assets/static/images/logo.png')}}" alt=""
                                         style="border-radius: 20px"/> Rachmadita Andreswari S.Kom., M.Kom.
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="masonry-item col-md-6">
                        <!-- #Todo ==================== -->
                        <div class="bd bgc-white p-20">
                            <div class="layers">
                                <div class="layer w-100 mB-10">
                                    <h6 class="lh-1">Graduate Prediction</h6>
                                </div>
                                <div class="layer w-100">
                                    <div id="chartdiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="masonry-item col-md-6">
                        <!-- #Sales Report ==================== -->
                        <div class="bd bgc-white">
                            <div class="layers">
                                <div class="layer w-100 p-20">
                                    <h6 class="lh-1">Students</h6>
                                </div>
                                <div class="layer w-100">
                                    <div class="bgc-light-blue-500 c-white p-20">
                                        <div class="peers ai-c jc-sb gap-40">
                                            <div class="peer peer-greed">
                                                <h5>#1 - Qalbinuril Setyani</h5>
                                            </div>
                                            <div class="peer">
                                                <h3 class="text-right">GPA : 3.79</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive p-20">
                                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr>
                                                <th class=" bdwT-0">Name</th>
                                                <th class=" bdwT-0">Status</th>
                                                <th class=" bdwT-0">GPA</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="fw-600">Ari Apridana</td>
                                                <td>
                                                    <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Pass</span>
                                                </td>
                                                <td>3.49</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Viqha Felayati</td>
                                                <td>
                                                    <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Pass</span>
                                                </td>
                                                <td>3.65</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Riffan Fauzia</td>
                                                <td>
                                                    <span class="badge bgc-orange-50 c-orange-700 p-10 lh-0 tt-c badge-pill">Warning</span>
                                                </td>
                                                <td>2.66</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Naufal Ismiyushar</td>
                                                <td>
                                                    <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Pass</span>
                                                </td>
                                                <td>3.28</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Ilham Akbar Siswanto</td>
                                                <td>
                                                    <span class="badge bgc-orange-50 c-orange-700 p-10 lh-0 tt-c badge-pill">Warning</span>
                                                </td>
                                                <td>2.56</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Fajri</td>
                                                <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">At Risk</span>
                                                </td>
                                                <td>1.62</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Arif Ramdhani</td>
                                                <td>
                                                    <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Pass</span>
                                                </td>
                                                <td>3.06</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Lingga Priyadi</td>
                                                <td>
                                                    <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Pass</span>
                                                </td>
                                                <td>2.76</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Nanditya Iman</td>
                                                <td>
                                                    <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Pass</span>
                                                </td>
                                                <td>3.20</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Herza Pramudiyanto</td>
                                                <td>
                                                    <span class="badge bgc-orange-50 c-orange-700 p-10 lh-0 tt-c badge-pill">Warning</span>
                                                </td>
                                                <td>2.40</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-600">Qalbinuril Setyani</td>
                                                <td>
                                                    <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Pass</span>
                                                </td>
                                                <td>3.79</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="ta-c bdT w-100 p-20">
                                <a href="#">See students page</a>
                            </div>
                        </div>
                    </div>
                    <div class="masonry-item col-md-6">
                        <!-- #Weather ==================== -->
                        <div class="bd bgc-white p-20">
                            <div class="layers">
                                <!-- Widget Title -->
                                <div class="layer w-100 mB-20">
                                    <h6 class="lh-1">Class Performance</h6>
                                </div>
                                <div class="layer w-100">
                                    <canvas id="line-chart" height="220"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </div>
</div>
</body>
<script src="{{asset('js/index.js')}}" charset="utf-8"></script>
</html>
