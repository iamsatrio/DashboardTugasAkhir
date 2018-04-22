<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

    <script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">--}}

</head>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>

        body {
            font-family: Helvetica, Arial, sans-serif;
            /*margin: 32px;*/
        }

        #chartdiv {
            width: 100%;
            height: 350px;
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
        "dataLoader": {
            "url": "http://localhost:8000/chart"
        },

        "theme": "light",
        "depth3D": 20,
        "angle": 30,
        "legend": {
            "horizontalGap": 5,
            "useGraphSettings": true,
            "markerSize": 10
        },

        "graphs": [{
            "balloonText": "<b>[[category]]</b><br><span style='font-size:14px'>[[title]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "At Risk",
            "type": "column",
            "color": "#000000",
            "valueField": "jumlah_mahasiswa"
        },
//            {
//            "balloonText": "<b>[[category]]</b><br><span style='font-size:14px'>[[title]]: <b>[[value]]</b></span>",
//            "fillAlphas": 0.8,
//            "labelText": "[[value]]",
//            "lineAlpha": 0.3,
//            "title": "Warning",
//            "type": "column",
//            "color": "#000000",
//            "valueField": "warning"
//        }, {
//            "balloonText": "<b>[[category]]</b><br><span style='font-size:14px'>[[title]]: <b>[[value]]</b></span>",
//            "fillAlphas": 0.8,
//            "labelText": "[[value]]",
//            "lineAlpha": 0.3,
//            "title": "Pass",
//            "type": "column",
//            "color": "#000000",
//            "valueField": "pass"
//        },
        ],
        "categoryField": "kelas",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
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
                    <div class="masonry-item col-md-6">
                        <div class="bgc-white p-10 bd">
                            <h6 class="c-grey-900"># Mahasiswa Yang Menguang Struktur Data dan Pemrograman Lanjut</h6>
                            <div class="mT-10">
                                <div id="chartdiv"></div>
                                {{--<canvas id="canvas" height="280" width="600"></canvas>--}}
                            </div>
                        </div>
                    </div>
                    <div class="masonry-item col-md-6">
                        <div class="bgc-white p-10 bd">
                            <h6 class="c-grey-900">Mahasiswa Yang Mengulang</h6>
                            <div class="mT-10">
                                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Angkatan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>SI 38 01</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>SI 38 01</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>SI 38 03</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>SI 38 03</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>SI 38 05</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>SI 38 05</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>SI 38 05</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>SI 38 06</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>SI 38 06</td>
                                        <td>2014</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>SI 39 04</td>
                                        <td>2015</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>SI 39 04</td>
                                        <td>2015</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>SI 39 05</td>
                                        <td>2015</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>SI 39 01</td>
                                        <td>2015</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>SI 39 05</td>
                                        <td>2015</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>SI 39 06</td>
                                        <td>2015</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>SI 40 04</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>SI 40 04</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>SI 40 03/td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>SI 40 03</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>SI 40 09</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Jenette Caldwell</td>
                                        <td>SI 40 09</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Yuri Berry</td>
                                        <td>SI 40 09</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Caesar Vance</td>
                                        <td>SI 40 06</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Doris Wilder</td>
                                        <td>SI 40 06</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Angelica Ramos</td>
                                        <td>SI 40 09</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Joyce</td>
                                        <td>SI 40 07</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Chang</td>
                                        <td>SI 40 07</td>
                                        <td>2016</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="masonry-item col-md-6">
                        <div class="bgc-white p-20 bd">
                            <h6 class="c-grey-900" id="angkatan">% Mahasiswa Angkatan 2015 Yang Mengulang</h6>
                            <div class="mT-20">
                                <div class="peers jc-sb ta-c gap-10">
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="60"
                                             data-bar-color='#f44336'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 01</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="50"
                                             data-bar-color='#2196f3'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 02</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 03</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 04</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 05</h6>
                                    </div>
                                </div>
                                <div class="peers jc-sb ta-c gap-10">
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 06</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 07</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 08</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 09</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='70' data-percent="90"
                                             data-bar-color='#ff9800'>
                                            <span></span>
                                        </div>
                                        <h6 class="fsz-sm">SI 10</h6>
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
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>--}}
{{--<script>--}}
    {{--var url = "{{url('http://localhost:8000/chart')}}";--}}
    {{--var Kelas = new Array();--}}
    {{--var Mahasiswa = new Array();--}}
    {{--$(document).ready(function(){--}}
        {{--$.get(url, function(response){--}}
            {{--response.forEach(function(data){--}}
                {{--Kelas.push(data.kelas);--}}
                {{--Mahasiswa.push(data.jumlah_mahasiswa);--}}
            {{--});--}}
            {{--var ctx = document.getElementById("canvas").getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
                {{--type: 'bar',--}}
                {{--data: {--}}
                    {{--labels:Kelas,--}}
                    {{--datasets: [{--}}
                        {{--label: 'Jumlah Mahasiswa',--}}
                        {{--backgroundColor: "rgba(60,186,159,0.2)",--}}
                        {{--borderColor: "rgba(60,186,159,1)",--}}
                        {{--data: Mahasiswa,--}}
                        {{--borderWidth: 1,--}}
                    {{--}]--}}
                {{--},--}}
                {{--options: {--}}
                    {{--scales: {--}}
                        {{--yAxes: [{--}}
                            {{--ticks: {--}}
                                {{--beginAtZero:true--}}
                            {{--}--}}
                        {{--}]--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
</html>
