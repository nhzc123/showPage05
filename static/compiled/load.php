

<html>
<head>
    <meta charset="utf-8">
    <title>New QoE</title>
    
<link rel="stylesheet" href="https://ssl.mail.163.com/mimg.127.net/xm/all/qa/css/iframe.css">
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="styl.css" type="text/css">
        
  
  <script type="text/javascript" src="jquery.min.js"></script>

<script src="./asset/js/esl/esl.js"></script>
<script language="javascript" type="text/javascript" src = "WdatePicker.js"></script>


<script >
//全局变量
areas ="";
allData="";
myChart4="";
</script>

  

<script>


    // Step:3 conifg ECharts's path, link to echarts.js from current page.
    // Step:3 为模块加载器配置echarts的路径，从当前页面链接到echarts.js，定义所需图表路径
    var fileLocation = './www/js/echarts-map';
    require.config({
        paths:{ 
            echarts: fileLocation,
            'echarts/chart/line': fileLocation,
            'echarts/chart/bar': fileLocation,
            'echarts/chart/scatter': fileLocation,
            'echarts/chart/k': fileLocation,
            'echarts/chart/pie': fileLocation,
            'echarts/chart/radar': fileLocation,
            'echarts/chart/map': fileLocation,
            'echarts/chart/chord': fileLocation,
            'echarts/chart/force': fileLocation
        }
    });

// 按需加载
require(
    [
        'echarts',
        'echarts/chart/line',
        'echarts/chart/bar',
        'echarts/chart/scatter',
        'echarts/chart/k',
        'echarts/chart/pie',
        'echarts/chart/radar',
        'echarts/chart/force',
        'echarts/chart/chord',
        'echarts/chart/map' 
    ],
        function(ec) {
            
            // --- 地图 ---

            var myChart3 = ec.init(document.getElementById('cdnAreas'));
            myChart3.setOption({
          title : {
        text: 'cdnAreas',
        subtext: 'source:BesTV',
        x:'center'
    },

    dataRange: {
        min: <?php echo $smin; ?>,
        max: <?php echo $smax; ?>,
        text:['max','min'],           // 文本，默认为数值文本
        calculable : true,
        textStyle: {
            color: 'orange'
        }
    },


                tooltip : {
                    trigger: 'item',
                    formatter: '{b}'
                },
                series : [
                    {
                        name: '中国',
                        type: 'map',
                        mapType: 'china',
                        selectedMode : 'single',
                        itemStyle:{
                            normal:{label:{show:true}},
                            emphasis:{label:{show:true}}
                        },
                        data:[
                        <?php echo $sLocation; ?> 
                        ]
                    }
                ]
            });
            
            var ecConfig = require('echarts/config');
            myChart3.on(ecConfig.EVENT.MAP_SELECTED, function(param){
                var selected = param.selected;
                var str = '';
               for (var p in selected) {
                   if (selected[p]) {
                     str += p;

                     }
                   }
                   areas = str;

      $.ajax({
            type : "post",
            dataType:'json',
            data:{
                  areas:str,
                  type:1,


            },   
            url : "service/load/getCdnState.php",
            success : function(data){
              allData=data; 
              ispCount="";
              $("#ispSelected").empty();
              $("#nameSelected").empty();
              flag = 0;
              //alert(data.dataList[0].cdnISP); 
              $.each(data.dataList,function(i,item){

                    if(ispCount.match(item.cdnISP)==null)
                      
                        {
             //             alert(item.cdnISP);
                          ispCount=ispCount+item.cdnISP;
                          $("#ispSelected").append("<option value=\'"+item.cdnISP+"\'>"+item.cdnISP+"</option>");
                          flag = 1;
                      }


                    //      $("#nameSelected").append("<option value=\'"+item.cdnName+"\'>"+item.cdnName+"</option>");

                    });

              if(flag ==1 )
              {
                 $("#ispSelected").append("<option value=\'all\' selected=\"selected\">all</option>");
                 $("#nameSelected").append("<option value=\'all\' selected=\"selected\">all</option>");
              }

            }});
                })

         
        }
    );



    var fileLocation = './www/js/echarts-map';
    require.config({
        paths:{ 
            echarts: fileLocation,
            'echarts/chart/line': fileLocation,
            'echarts/chart/bar': fileLocation,
            'echarts/chart/scatter': fileLocation,
            'echarts/chart/k': fileLocation,
            'echarts/chart/pie': fileLocation,
            'echarts/chart/radar': fileLocation,
            'echarts/chart/map': fileLocation,
            'echarts/chart/chord': fileLocation,
            'echarts/chart/force': fileLocation
        }
    });

// 按需加载
require(
    [
        'echarts',
        'echarts/chart/line',
        'echarts/chart/bar',
        'echarts/chart/scatter',
        'echarts/chart/k',
        'echarts/chart/pie',
        'echarts/chart/radar',
        'echarts/chart/force',
        'echarts/chart/chord',
        'echarts/chart/map' 
    ],
    function(ec){
       myChart4 = ec.init(document.getElementById("main2"));
       
    });

</script> 

</head>

<body >
    <!-- *********  Header  ********** -->
    
     <div id="header">
        <div id="header_in">
        
           <h1><a href="main.php"><b>New </b> QoE</a></h1>
        
         <div id="menu">
         <ul>
            <li><a href="main.php" >Home</a></li>
            <li><a href="context.php" >Context</a></li>
            <li><a href="load.php" class="active">Load</a></li>            
            <li><a href="user.php" >User</a></li>
         </ul>
        </div>
        
        </div>
    </div>
    
    <!-- *********  Main part – headline ********** -->
    
        
        <div id="main_part_inner">
            <div id="main_part_inner_in">
        
            <h2>Load</h2>
            
            
            
            </div>
            
        </div>
        
        
        <!-- *********  Content  ********** -->
        <div style="width:16%;float:left;margin:10px 5px 15px 20px">


  </div>

<div style="width:960px;margin:auto;">
      </br>



      <div id="cdnAreas" style="height:500px;mid-width:310px">
        </div>



<div class="filter block">
      <div class="filter-label">
        filter
      </div>
      <div  class="filter-item" >
        ISP：
        <select id="ispSelected" onchange="selectISP()">
        </select>
      </div>
      <div  class="filter-item">
        serverName：
        <select id="nameSelected">
        </select>
      </div>
      <div class="filter-item">
        time：
        <input class="Wdate" id="today" type="text" onclick="WdatePicker() ">
      </div>

      <div id="timeSelected">

        </div>
      <div class="filter-submit">
        <button onclick="getOK()">
          ok
        </button>
      </div>
      <div class="filter-submit">
        <button onclick="snapshot()">
          snapshot
        </button>
      </div>
    </div>



      
      <div id="main2" style="height:500px;mid-width:310px">
        </div>

      <div id="main" style="height:700px;mid-width:310px">
        </div>












    
  </div>


    











</div>



    
    
  
  
   <!-- *********  Footer  ********** -->
    
    <hr class="cleanit">
    
     <div id="footer">
        <div id="footer_in">
            
            <p><a href="www.tsinghua.edu.cn">Tsinghua University</a> Department of Computer Science and Technology</p>
            <span>Author: <a href="http://media.cs.tsinghua.edu.cn/~wangzhi/">Wang Zhi</a> - Zhou Chao </span>

        
        </div>
      </div>



         

</body>























    
    <script src="hsjs/highstock.js"></script>
<script src="hsjs/modules/exporting.js"></script>
<script src="hcjs/highcharts.js"></script>
<script src="hcjs/modules/exporting.js"></script>
<script >

function selectISP()
{
  
  var ispValue = $("#ispSelected").val();
  
  $("#nameSelected").empty();
  
  $.each(allData.dataList,function(i,item){

       // if(ispValue ==  "all")
        //  {
        //      $("#nameSelected").append("<option value=\'"+item.cdnName+"\'>"+item.cdnName+"</option>");
        //  }

        if(ispValue == item.cdnISP)
        {

              $("#nameSelected").append("<option value=\'"+item.cdnName+"\'>"+item.cdnName+"</option>");
        }

        })

  $("#nameSelected").append("<option value=\'all\' selected=\"selected\">all</option>");

}
</script>

<script>

function getOK(){

  var time = $("#today").val();
  
  if(time =="")
    {
        alert("you need to select timestamp.");
        return ;

      }

      var ispPost = $("#ispSelected").val();
      var namePost = $("#nameSelected").val();
  if(namePost==null)
  {
        alert("No cdn selected.");
        return ;
  }
      
    seriesOptions = [],
    yAxisOptions = [],
    seriesCounter = 0,
    names = ['0~20%','20~40%','40~60%','60~80%','80~100%','dash','no dash'],
    colors = Highcharts.getOptions().colors;
    var chart = new Highcharts.Chart({chart: {
              renderTo: 'main',
                      defaultSeriesType: 'column'
                      },});
    chart.showLoading();

    myChart4.clear();
    myChart4.showLoading();

      $.ajax({
            type : "post",
            data:{
              areas:areas,
              isp:ispPost,
              name:namePost,
              time:time,

            },
            url : "service/load/loadEngagement.php?callback=?&type=2",
            dataType : "jsonp",
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            success : function(data){

      seriesOptions[0] = {
        name: "totalNumber",
        data: data
      };
     
    
     $.each(names, function(i, name) {

      nu=i+3;
    $.getJSON('service/load/loadEngagement.php?callback=?&type='+nu, function(data) {

      if(i==5){
        seriesOptions[6]={

            type: 'column',
            name: 's1Dash',
            data: data.s1DashLoad,
            yAxis: 1,
          };
        seriesOptions[7]={

            type: 'column',
            name: 's2Dash',
            data: data.s2DashLoad,
            yAxis: 1,
          };
        seriesOptions[8]={

            type: 'column',
            name: 's3Dash',
            data: data.s3DashLoad,
            yAxis: 1,
          };
        seriesOptions[9]={

            type: 'column',
            name: 's4Dash',
            data: data.s4DashLoad,
            yAxis: 1,
          };
        seriesOptions[10]={

            type: 'column',
            name: 's5Dash',
            data: data.s5DashLoad,
            yAxis: 1,
          };
        seriesOptions[11]={

            type: 'column',
            name: 's6Dash',
            data: data.s6DashLoad,
            yAxis: 1,
          };
        seriesOptions[12]={

            type: 'column',
            name: 's7Dash',
            data: data.s7DashLoad,
            yAxis: 1,
          };
        seriesOptions[13]={

            type: 'column',
            name: 'otherDash',
            data: data.oDashLoad,
            yAxis: 1,
          };
        }
        else if (i==6){

          seriesOptions[14]={
          
            type: 'column',
            name: 's1NoDash',
            data: data.s1OtherLoad,
            yAxis: 2,
            }
          seriesOptions[15]={
          
            type: 'column',
            name: 's2NoDash',
            data: data.s2OtherLoad,
            yAxis: 2,
            }
          seriesOptions[16]={
          
            type: 'column',
            name: 's3NoDash',
            data: data.s3OtherLoad,
            yAxis: 2,
            }
          seriesOptions[17]={
          
            type: 'column',
            name: 's4NoDash',
            data: data.s4OtherLoad,
            yAxis: 2,
            }
          seriesOptions[18]={
          
            type: 'column',
            name: 's5NoDash',
            data: data.s5OtherLoad,
            yAxis: 2,
            }
          seriesOptions[19]={
          
            type: 'column',
            name: 's6NoDash',
            data: data.s6OtherLoad,
            yAxis: 2,
            }
          seriesOptions[20]={
          
            type: 'column',
            name: 's7NoDash',
            data: data.s7OtherLoad,
            yAxis: 2,
            }
          seriesOptions[21]={
          
            type: 'column',
            name: 'otherNoDash',
            data: data.oOtherLoad,
            yAxis: 2,
            }

        }
      
        else{
      seriesOptions[i+1] = {
        name: name,
        data: data
      };
    }

      // As we're loading the data asynchronously, we don't know what order it will arrive. So
      // we keep a counter and create the chart when all the data is loaded.
      seriesCounter++;

      if (seriesCounter == names.length) {
        createChart();
       // testwin=1;
      }
    });
  }); 
 

            }});
//开始查询其他三条曲线，已经由第一个ajax请求完毕


function createChart(){



    $('#main').highcharts('StockChart', {
        chart: {
        },

        
        rangeSelector: {
        inputEnabled: $('#main').width() > 480,
            selected: 1
        },

        title: {
            text: 'server load'
        },

        yAxis: [{
            title: {
                text: 'engagement'
            },
            height: 160,
            lineWidth: 2
        }, {
            title: {
                text: 'dash'
            },
            top: 248,
            height: 160,
            offset: 0,
            lineWidth: 2
        },{
            title:{
                text:'no dash'
            },
            top:418,
            height:160,
            offset:0,
            lineWidth:2
        
        }],
        plotOptions: {
                column: {
                    stacking: 'normal',
                }
            },  
        series: seriesOptions
    });


}
//------------------------------

distributionData="";
      $.ajax({
            type : "post",
            data:{
              areas:areas,
              isp:ispPost,
              name:namePost,
              time:time,

            },
            url : "service/load/userDistribution.php?callback=?&type=2",
            dataType : "jsonp",
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            success : function(data){
            distributionData=data;
option = {
    backgroundColor: '#1b1b1b',
    color: ['gold','aqua','lime'],
    title : {
        text: 'user distribution via selected CDN',
        subtext:'source:BesTV',
        x:'center',
        textStyle : {
            color: '#fff'
        }
    },
    tooltip : {
        trigger: 'item',
        formatter: function(v) {
            return v[1].replace(':', ' > ');
        }
    },
    toolbox: {
        show : true,
        orient : 'vertical',
        x: 'right',
        y: 'center',
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    dataRange: {
        min : 0,
        max : distributionData.MAXSIZE,
        calculable : true,
        color: ['red','orange','yellow','lightgreen'],
        textStyle:{
            color:'#fff'
        }
    },
    series : [
        {
            name: '全国',
            type: 'map',
            roam: true,
            hoverable: false,
            mapType: 'china',
            itemStyle:{
                normal:{
                    borderColor:'rgba(100,149,237,1)',
                    borderWidth:0.5,
                    areaStyle:{
                        color: '#1b1b1b'
                    }
                }
            },
            data:[],
            markLine : {
                smooth:true,
                symbol: ['none', 'circle'],  
                symbolSize : 1,
                itemStyle : {
                    normal: {
                        color:'#fff',
                        borderWidth:1,
                        borderColor:'rgba(30,144,255,0.5)'
                    }
                },
                data : distributionData.distribution
                ,
            },
            geoCoord: {
             '北京':[116.4666667,39.9],
'上海':[121.4833333,31.23333333],
'天津':[117.1833333,39.15],
'重庆':[106.5333333,29.53333333],
'黑龙江':[126.6833333,45.75],
'吉林':[125.3166667,43.86666667],
'辽宁':[123.4,41.83333333],
'内蒙古':[111.8,40.81666667],
'河北':[114.4666667,38.03333333],
'山西':[112.5666667,37.86666667],
'山东':[117,36.63333333],
'河南':[113.7,34.8],
'陕西':[108.9,34.26666667],
'甘肃':[103.8166667,36.05],
'宁夏':[106.2666667,38.33333333],
'青海':[101.75,36.63333333],
'新疆':[87.6,43.8],
'安徽':[117.3,31.85],
'江苏':[118.8333333,32.03333333],
'浙江':[120.15,30.23333333],
'湖南':[113,28.18333333],
'江西':[115.8666667,28.68333333],
'湖北':[114.35,30.61666667],
'四川':[104.0833333,30.65],
'贵州':[106.7,26.58333333],
'福建':[119.3,26.08333333],
'台湾':[121.5166667,25.05],
'广东':[113.25,23.13333333],
'海南':[110.3333333,20.03333333],
'广西':[108.3333333,22.8],
'云南':[102.6833333,25],
'西藏':[91.16666667,29.66666667],
'香港':[114.1666667,22.3],
'澳门':[113.5,22.2]
 
            }
        },
        {
            name: 'Top10',
            type: 'map',
            mapType: 'china',
            data:[],
            markLine : {
                smooth:true,
                effect : {
                    show: true,
                    size: 3,
                    period:30,
                    shadowColor: 'yellow'
                },
                itemStyle : {
                    normal: {
                        borderWidth:1
                    }
                },
                data : distributionData.top10Sum,
                 /*    [
                    [{name:'上海'},{name:'北京',value:95}],
                    ]
                  */
                
            },
            markPoint : {
                symbol:'emptyCircle',
                symbolSize : function(v){
                    return 10 + v/10000
                },
                effect : {
                    show: true,
                    shadowBlur : 0
                },
                itemStyle:{
                    normal:{
                        label:{show:false}
                    }
                },
                data : distributionData.top10Detail,
                 /*     [
                         {name:'北京',value:95},
                      ]
                  */
            }
        },
    ]
};

        //------------------------------

      myChart4.hideLoading();
      myChart4.setOption(option,true);
    }});

}

</script>


<script>

  function selectTime(){

  $("#timeSelected").html("HH");    

  }








</script>

<script>

  function snapshot(){
    
        window.open("static/template/loadSnapshot.htm"); 

  }

</script>

</html>
