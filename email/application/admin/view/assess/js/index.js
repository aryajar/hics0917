// JavaScript Document
// echarts
// create for AgnesXu at 20161115


//环状图
var ring = echarts.init(document.getElementById('ring'));
var labelTop = {
    normal : {
        label : {
            show : true,
            position : 'center',
            formatter : '{b}',
            textStyle: {
                baseline : 'bottom'
            }
        },
        labelLine : {
            show : false
        }
    }
};

var labelFromatter = {
    normal : {
        label : {
            formatter : function (params){
                return 100 - params.value + '%'
            },
            textStyle: {
                baseline : 'top'
            }
        }
    },
}
var labelBottom = {
    normal : {
        color: '#ccc',
        label : {
            show : true,
            position : 'center'
        },
        labelLine : {
            show : false
        }
    },
    emphasis: {
        color: 'rgba(0,0,0,0)'
    }
};
var radius = [40, 55];
ring.setOption({
    color:["#33bb9f","#ffa259","#4cbbe6"],
    series : [
        {
            type : 'pie',
            center : ['15%', '58%'],
            radius : radius,
            x: '0%', // for funnel
            itemStyle : labelFromatter,
            data : [
                {name:'other', value:5.24, itemStyle : labelBottom},
                {name:'护理', value:94.76,itemStyle : labelTop}
            ]
        },
        {
            type : 'pie',
            center : ['45%', '58%'],
            radius : radius,
            x:'20%', // for funnel
            itemStyle : labelFromatter,
            data : [
                {name:'other', value:5.92, itemStyle : labelBottom},
                {name:'医疗', value:94.08,itemStyle : labelTop}
            ]
        },
        {
            type : 'pie',
            center : ['75%', '58%'],
            radius : radius,
            x:'40%', // for funnel
            itemStyle : labelFromatter,
            data : [
                {name:'other', value:0, itemStyle : labelBottom},
                {name:'医技', value:100,itemStyle : labelTop}
            ]
        }
    ]
}) ;





//折线图
var line = echarts.init(document.getElementById('line'));
line.setOption({
    color:["#2ec7c9","#b6a2de"],
    title: {
        x: 'left',
        text: '百分比',
        textStyle: {
            fontSize: '18',
            color: '#2ec7c9',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis'
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['2019.10','2019.11','2019.12','2020.1','2020.2',
            '2020.3','2020.4','2020.5','2020.6','2020.7','2020.8','2020.9','2020.10'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'正确率',
            type:'line',
            data:[96.15, 96.49, 96.30, 97.15, 96.94,98.32,96.84,95.55,95.92,96.38,96.32,95.42,0],
            markLine: {data: [{type: 'average', name: '平均值'}]}
        },
        {
            name:'依从率',
            type:'line',
            data:[92.32, 94.95, 95.18, 97.12, 97.49,92.43,93.27,93.62,92.46,94.39,97.71,93.57,0],
            markLine: {data: [{type: 'average', name: '平均值'}]}
        }
    ]
}) ;



//柱状图
var pillar1 = echarts.init(document.getElementById('pillar1'));
pillar1.setOption({
    color:["#5AB1EF","#ffb980","#d87a80","#8d98b3"],
    title : {
        subtext: '数量'
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        x: 'right',
        data:['观察人数','时机数','手卫生次数','正确数']
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : ['2019年10月','2019年11月','2019年12月','2020年1月','2020年2月',
            '2020年3月','2020年4月','2020年5月','2020年6月','2020年7月','2020年8月','2020年9月','2020年10月']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'观察人数',
            type:'bar',
            data:[622, 703, 645, 594, 630, 872, 856, 881, 826, 884, 868,933,0]
        },
        {
            name:'时机数',
            type:'bar',
            data:[872, 930, 851, 868, 837, 1096, 1085, 1176, 1087, 1140, 1038,1119,0]
        },
        {
            name:'手卫生次数',
            type:'bar',
            data:[805, 883, 810, 843, 816, 1013, 1012, 1101, 1005, 1076, 952,1047,0]
        }
        ,
        {
            name:'正确数',
            type:'bar',
            data:[774, 852, 780, 819, 791, 996, 980, 1052, 964, 1037, 917,999,0]
        }
    ]
}) ;
