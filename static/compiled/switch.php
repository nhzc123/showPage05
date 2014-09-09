
<html>
<head>
    <meta charset="utf-8">
    <title>New QoE</title>
    
<link rel="stylesheet" href="https://ssl.mail.163.com/mimg.127.net/xm/all/qa/css/iframe.css">
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="styl.css" type="text/css">
        
	
	<script type="text/javascript" src="jquery.min.js"></script>

<script src="echartjs/esl.js"></script>

		

<script>
selectResult = "";
userResult ="";
serverResult="";
scopeTop="";
scopeEnd="";
</script>

<script>

  $(document).ready(function(){
        require.config({
            paths:{ 
                'echarts' : './echartjs/echarts',
                'echarts/chart/line' : './echartjs/echarts-map'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
            ],
            function(ec) {
                // 基于准备好的dom，初始化echarts图表
                 myChart2 = ec.init(document.getElementById('afterRemain')); 
                 myChart3 = ec.init(document.getElementById('afterSwitch')); 
                
               })


  });

</script>
	

<script>
function show(tag){
 var light=document.getElementById(tag);
 var fade=document.getElementById('fade');
 light.style.display='block';
 fade.style.display='block';


    // Step:3 conifg ECharts's path, link to echarts.js from current page.
    // Step:3 为模块加载器配置echarts的路径，从当前页面链接到echarts.js，定义所需图表路径
    require.config({
        paths:{ 
            echarts:'./echartjs/echarts',
            'echarts/chart/bar' : './echartjs/echarts-map',
            'echarts/chart/line': './echartjs/echarts-map',
            'echarts/chart/map' : './echartjs/echarts-map',
            'echarts/config':     './echartjs/config'
        }
    });
    
    // Step:4 require echarts and use it in the callback.
    // Step:4 动态加载echarts然后在回调函数中开始使用，注意保持按需加载结构定义图表路径
    require(
        [
            'echarts',
            'echarts/chart/bar',
            'echarts/chart/line',
            'echarts/chart/map'
        ],
        function(ec) {
            
            // --- 地图 ---

      if(tag =="light")
      {
            var myChartt = ec.init(document.getElementById('userAreas'));
            myChartt.setOption({
                title:{
                    text:'userAreas'

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
                        selectedMode : 'multiple',
                        itemStyle:{
                            normal:{label:{show:true}},
                            emphasis:{label:{show:true}}
                        },
                        data:[
                            
                        ]
                    }
                ]
            });
            
            var ecConfig = require('echarts/config');
            myChartt.on(ecConfig.EVENT.MAP_SELECTED, function(param){
                var selected = param.selected;
                var str = ' ';
               for (var p in selected) {
                   if (selected[p]) {
                     str += p + ' ';
                     }
                   }
                   userResult = str;
                 document.getElementById('userCount').innerHTML = str;
                })

        }

        else if(tag == "light2")
      {
            var myChartl = ec.init(document.getElementById('serverAreas'));
            myChartl.setOption({

                title:{
                    text:'serverAreas'
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
                        selectedMode : 'multiple',
                        itemStyle:{
                            normal:{label:{show:true}},
                            emphasis:{label:{show:true}}
                        },
                        data:[
                          
                        ]
                    }
                ]
            });

            
            var ecConfig = require('echarts/config');
            myChartl.on(ecConfig.EVENT.MAP_SELECTED, function(param){
                var selected = param.selected;
                var str = ' ';
               for (var p in selected) {
                   if (selected[p]) {
                     str += p + ' ';
                     }
                   }
                   serverResult = str;
                 document.getElementById('serverCount').innerHTML = str;
                })
        }

         
        }
    );



 }
function hide(tag){
 var light=document.getElementById(tag);
 var fade=document.getElementById('fade');


if(tag =="light2")
{
  if(document.getElementById('serverCount').innerHTML ==null)
        document.getElementById('serverCount').innerHTML = "";

       serverResult =   document.getElementById('serverCount').innerHTML ;
        document.getElementById('serverPlaces').innerHTML = document.getElementById('serverCount').innerHTML;

        
        document.getElementById('serverCount').innerHTML = "";
}
if( tag =="light")
{

  if(document.getElementById('userCount').innerHTML ==null)
  document.getElementById('userCount').innerHTML = "";

  
       userResult= document.getElementById('userCount').innerHTML;
document.getElementById('userPlaces').innerHTML = document.getElementById('userCount').innerHTML ;

document.getElementById('userCount').innerHTML = "";
}
 light.style.display='none';
 fade.style.display='none';
}
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
            <li><a href="load.php">Load</a></li>            
            <li><a href="user.php">User</a></li>            
            <li><a href="switch.php" class="active">Switch</a></li>
            <li><a href="bitRateType.php">BitRate</a></li>            
         </ul>
        </div>
        
        </div>
    </div>
    
    <!-- *********  Main part – headline ********** -->
    
        
        <div id="main_part_inner">
            <div id="main_part_inner_in">
        
            <h2>Switch</h2>
            
            
            
            </div>
            
        </div>
        
        
        <!-- *********  Content  ********** -->
        <div style="width:16%;float:left;margin:10px 5px 15px 20px">


	</div>

<div style="width:960px;margin:auto;">
<div id="filter" class="filter">
        <dl>
            <dt>device:</dt>
            <dd><div><a>all</a></div></dd>
            <dd><div><a>iPad</a></div></dd>
            <dd><div><a>Android Pad 7</a></div></dd>
            <dd><div><a>Android Phone</a></div></dd>
            <dd><div><a>iPhone</a></div></dd>
            <dd><div><a>Ctv</a></div></dd>
            <dd><div><a>Ott Stb</a></div></dd>
            <dd style="margin-left:150px"><div><a>PC</a></div></dd>
            <dd><div><a>Tbd</a></div></dd>
            <dd><div><a>TV Cloud</a></div></dd>
            <dd><div><a>other</a></div></dd>
        </dl>
       
        <dl>
            <dt>video types:</dt>
            <dd><div><a>all</a></div></dd>
            <dd><div><a>movie</a></div></dd>
            <dd><div><a>children</a></div></dd>
            <dd><div><a>documentary</a></div></dd>
            <dd><div><a>fun</a></div></dd>
            <dd><div><a>music</a></div></dd>
            <dd><div><a>news</a></div></dd>
            <dd><div><a>series</a></div></dd>
            <dd style="margin-left:150px"><div><a>sports</a></div></dd>
            <dd><div><a>others</a></div></dd>
          </dl>
       
        <dl>
            <dt>userISP:</dt>
            <dd><div><a>all</a></div></dd>
            <dd><div><a>电信</a></div></dd>
            <dd><div><a>联通</a></div></dd>
            <dd><div><a>移动</a></div></dd>
            <dd><div><a>铁通</a></div></dd>
            <dd><div><a>其他</a></div></dd>
          </dl>
        <dl>
            <dt>serverISP:</dt>
            <dd><div><a>all</a></div></dd>
            <dd><div><a>电信</a></div></dd>
            <dd><div><a>联通</a></div></dd>
            <dd><div><a>移动</a></div></dd>
            <dd><div><a>其他</a></div></dd>
          </dl>
        <dl>
            <dt>switchType:</dt>
            <dd><div><a>all</a></div></dd>
            <dd><div><a>up</a></div></dd>
            <dd><div><a>down</a></div></dd>
          </dl>
      <dl>

        <dt>switchTimeScope:</dt>
          <dd><div><input style="width:100px" value="0" id="scopeTop"type="text"> -</div></dd>
          <dd><div><input style="width:100px" value="100" id="scopeEnd"type="text"></div></dd>(between 0~100%)
        </dl>
      </div>

      </br>
      </br>
      <div style="width:620px;height:auto;margin-left:auto;margin-right:auto;font-size:18px;">
      
<a style="font-weight:bold;color:#333333;float:left;width:150px" href="javascript:void(0)" onclick="show('light')">user areas:</a>
<div id="userPlaces" style="float:left;width:470px;"> </div>
</div>
</br>
</br>
	
      <div style="width:620px;height:auto;margin-left:auto;margin-right:auto;font-size:18px;">
      
<a style="font-weight:bold;color:#333333;width:150px;float:left;" href="javascript:void(0)" onclick="show('light2')">server areas:</a>
<div id="serverPlaces" style="float:left;width:470px;"></div>
</div>


<div id="light" class="white_content">
      <div class="close"><a href="javascript:void(0)" onclick="hide('light')"> 关闭</a></div>
      <div class="con"> 
      <div id="userCount"></div>   
       <div id="userAreas" style="height:500px;min-width:310px"></div>
        
    

   </div>
</div>
<div id="light2" class="white_content">
      <div class="close"><a href="javascript:void(0)" onclick="hide('light2')"> 关闭</a></div>
      <div class="con"> 

        <div id="serverCount"></div>
        <div id="serverAreas" style="height:500px;min-width:310px"></div> 
      </div>
</div>
<div id="fade" class="black_overlay"></div>

</br>
</br>
</br>

<div style=" text-align:center;">
    <input id ="selectResult" name="selectResult"  style="display:none"></input>
    <input id ="userResult" name="userResult"  style="display:none"></input>
    <input id = "serverResult" name="serverResult"  style = "display:none"></input>


    <input type="submit" class="button_snapshot" onclick="getOK()"  value ="submit"/>
    </br>
    <div>
      <input type="submit" class="button_snapshot" onclick="snapshot()" value="snapshot"></input>
      </div>
    <div>此页面加载时间较长，请耐心等待...
      </div>
</div>

	
		
		
       <div id="engagement" style="height: 500px; min-width: 310px"></div>

      
       <div id="afterSwitch" style="height: 500px; min-width: 310px"></div>
   

       <div id="afterRemain" style="height: 500px; min-width: 310px"></div>



    
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














<script type="text/javascript">
    $(function () {
        //选中filter下的所有a标签，为其添加hover方法，该方法有两个参数，分别是鼠标移上和移开所执行的函数。
        $("#filter a").hover(
            function () {
                $(this).addClass("seling");
            },
            function () {
                $(this).removeClass("seling");
            }
        );


        //选中filter下所有的dt标签，并且为dt标签后面的第一个dd标签下的a标签添加样式seled。(感叹jquery的强大)
        $("#filter dt+dd a").attr("class", "seled"); /*注意：这儿应该是设置(attr)样式，而不是添加样式(addClass)，
                                                    不然后面通过$("#filter a[class='seled']")访问不到class样式为seled的a标签。*/       
        //为filter下的所有a标签添加单击事件
        $("#filter a").click(function () {
            $(this).parents("dl").children("dd").each(function () {
        //下面三种方式效果相同（第三种写法的内部就是调用了find()函数，所以，第二、三种方法是等价的。）
                //$(this).children("div").children("a").removeClass("seled");
        //$(this).find("a").removeClass("seled");
        $('a',this).removeClass("seled");
            });

            $(this).attr("class", "seled");

            RetSelecteds(); //返回选中结果   弹出
        });
      //  alert(RetSelecteds()); //返回选中结果   弹出
    });

    function RetSelecteds() {

      result =""; 
        $("#filter a[class='seled']").each(function () {
            result += $(this).html()+",";
        });
        selectResult = result;
    }
</script>

		
		<script src="hsjs/highstock.js"></script>
<script src="hsjs/modules/exporting.js"></script>
<script src="hcjs/highcharts.js"></script>
<script src="hcjs/modules/exporting.js"></script>


<script>
  function snapshot(){

    window.open("static/template/switchSnapshot.htm");
  }

</script>

<script>
  function getOK(){

    if(selectResult=="")
      selectResult="all,all,all,all,all";

    if(userResult=="")
      userResult="all";

    if(serverResult=="")
      serverResult="all";

    scopeTop= parseInt($("#scopeTop").val());
    scopeEnd=parseInt($("#scopeEnd").val());

    if(scopeTop<0 || scopeTop>100 ||scopeEnd<0 ||scopeEnd>100 ||scopeTop>scopeEnd){
      alert("input is not allowed");
      return ;
    }
    //alert(serverResult);
//    window.open("switchSnapshot.php");

    myChart2.clear();
    myChart3.clear();
    myChart2.showLoading();
    myChart3.showLoading();
    //drawCdf-----------

    afterRemain="";


    
      $.ajax({
            type : "post",
            url : "service/switch/afterRemainCdf.php?callback=?",
            data:{
              selectResult:selectResult,
              userResult:userResult,
              serverResult:serverResult,
              scopeTop:scopeTop,
              scopeEnd:scopeEnd

            },
            dataType : "jsonp",
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            success : function(data){

        //alert(data);
      afterRemain=data;


                      option = {
    title : {
        text: 'afterRemainCdf',
        subtext: 'BesTV'
    },
    tooltip : {
        trigger: 'axis'
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['0%','10%','20%','30%','40%','50%','60%','70%','80%','90%','100%']
        }
    ],
    yAxis : [
        {
            type : 'value',
            axisLabel : {
                show:true,
                interval: 'auto',    // {number}
                formatter: '{value} %',    // Template formatter!
            }
        }
    ],
    series : [
        {
            name:'成交',
            type:'line',
            smooth:true,
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data:afterRemain
        }
    ]
};
                    


                
                myChart2.hideLoading();
                myChart2.setOption(option); 


            }
          });




    afterCdf="";


      $.ajax({
            type : "post",
            url : "service/switch/afterSwitchCdf.php?callback=?",
            data:{
              selectResult:selectResult,
              userResult:userResult,
              serverResult:serverResult,
              scopeTop:scopeTop,
              scopeEnd:scopeEnd

            },
            dataType : "jsonp",
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            success : function(data){

        //alert(data);
      afterCdf=data;

        

                      option = {
    title : {
        text: 'afterSwitchCdf',
        subtext: 'BesTV'
    },
    tooltip : {
        trigger: 'axis'
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['0%','10%','20%','30%','40%','50%','60%','70%','80%','90%','100%']
        }
    ],
    yAxis : [
        {
            type : 'value',
            axisLabel : {
                show:true,
                interval: 'auto',    // {number}
                formatter: '{value} %',    // Template formatter!
            }
        }
    ],
    series : [
        {
            name:'成交',
            type:'line',
            smooth:true,
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data:afterCdf
        }
    ]
};
                    


                
                myChart3.hideLoading()
                myChart3.setOption(option); 


            }
          });





    //-----------------






   seriesOptions = [],
    yAxisOptions = [],
    seriesCounter = 0,
    names = ['0~20%','20~40%','40~60%','60~80%','80~100%'],
    colors = Highcharts.getOptions().colors;

    var chart = new Highcharts.Chart({chart: {
              renderTo: 'engagement',
                      defaultSeriesType: 'column'
                      },});
    chart.showLoading();

      $.ajax({
            type : "post",
            url : "service/switch/switchEngagement.php?callback=?&type=2",
            data:{
              selectResult:selectResult,
              userResult:userResult,
              serverResult:serverResult,
              scopeTop:scopeTop,
              scopeEnd:scopeEnd

            },
            dataType : "jsonp",
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            success : function(data){

      seriesOptions[0] = {
        name: "totalNumber",
        data: data
      };
     
    
     $.each(names, function(i, name) {

      nu=i+3;
    $.getJSON('service/switch/switchEngagement.php?callback=?&type='+nu, function(data) {

      seriesOptions[i+1] = {
        name: name,
        data: data
      };

      // As we're loading the data asynchronously, we don't know what order it will arrive. So
      // we keep a counter and create the chart when all the data is loaded.
      seriesCounter++;

      if (seriesCounter == names.length) {
        createChart();
      }
    });
  }); 
 

            }});
//开始查询其他三条曲线，已经由第一个ajax请求完毕



function createChart(){



    $('#engagement').highcharts('StockChart', {
        chart: {
        },

        rangeSelector: {
        inputEnabled: $('#engagement').width() > 480,
            selected: 4
        },

        title:{
          text:'engagement',
      },

        yAxis: {
          labels: {
            formatter: function() {
              return this.value ;
            }
          },
          plotLines: [{
            value: 0,
            width: 2,
            color: 'silver'
          }]
        },
        
        
        tooltip: {
          pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
          valueDecimals: 2
        },
        
        series: seriesOptions

    });
  }



}

</script>
</html>
