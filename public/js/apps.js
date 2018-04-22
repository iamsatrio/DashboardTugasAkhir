var mychart = document.getElementById('chart');
gChart = echarts.init(mychart);
var option = {
    tooltip : {
        formatter: "{a} <br/>{b} : {c}%"
    },
    toolbox: {
        show : true,
        feature : {
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    series : [
        {
            title:{
                show:true,
                offsetCenter:[0,-230],
                color:'#888',
                fontWeight:'bold',
                fontSize:24
            },
            clockwise:true,
            startAngle:180,
            endAngle:0,
            pointer:{show:true},
            axisTick:{show:true},
            splitLine:{show:false},
            name:'Business Indicators',
            type:'gauge',
            detail : {
                offsetCenter:[5,-40],
                formatter:'{value}%'
            },
            data:[{value: 75, name: ''}]
        }]
};

//Add this to have the data changed every two seconds
setInterval(function () {
    option.series[0].data[0].value = (Math.random() * 100).toFixed(2) - 0;
    gChart.setOption(option, true);
},2000);