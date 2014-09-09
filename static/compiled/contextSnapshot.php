

<html>
<head>
    <meta charset="utf-8">
    <title>New QoE</title>
    
<link rel="stylesheet" href="https://ssl.mail.163.com/mimg.127.net/xm/all/qa/css/iframe.css">
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="styl.css" type="text/css">
        
	
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="jquery.min.js"></script>

<script src="echartjs/esl.js"></script>







    <script type="text/javascript">
    
    
      $(document).ready(function(){
       


   seriesOptions = [],
    yAxisOptions = [],
    seriesCounter = 0,
    names = ['0~20%','20~40%','40~60%','60~80%','80~100%'],
    colors = Highcharts.getOptions().colors;

      $.ajax({
            type : "get",
            async:false,
            url : "service/userEngagementSnapshot.php?callback=?&type=2",
            dataType : "jsonp",
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            success : function(data){

      seriesOptions[0] = {
        name: "totalNumber",
        data: data
      };
     
    
     $.each(names, function(i, name) {

      nu=i+3;
    $.getJSON('service/userEngagementSnapshot.php?callback=?&type='+nu, function(data) {

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



      });
    
    
    </script>
		<script type="text/javascript">
      
$(function () {
    $('#device').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'device '
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Users Rate',
            data: [
            <?php echo $device; ?>
              
              ]
        }]
    });
});
    
		</script>
		
			<script type="text/javascript">

$(function () {
    $('#bitRate').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'bitRate'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'bitRate',
            data: [
              ['S7',   <?php echo $s7; ?>],
              ['S6',   <?php echo $s6; ?>],
              ['S5',   <?php echo $s5; ?>],
              ['S3',   <?php echo $s3; ?>],
            ['S2',       <?php echo $s2; ?>],
                {
                    name: 'S1',
                          y: <?php echo $s1; ?>,
                    sliced: true,
                    selected: true
                },
                ['S4',    <?php echo $s4; ?>]
               
            ]
        }]
    });
});

		</script>
    <script type="text/javascript">
$(function () {
        $('#typeOfVideo').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'type of video'
            },
            subtitle: {
                text: 'Source: BesTV'
            },
            xAxis: {
categories: [<?php echo $videoType; ?>],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'percentage',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'percentage of types',
                      data:[<?php echo $videoNum; ?>]
            }]
        });
    });

  </script>   




    <script type="text/javascript">

$(function () {
        $('#dashTransTime').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'dash Translation Time'
            },
            subtitle: {
                text: 'Source: BesTV'
            },
            xAxis: {
categories: [<?php echo $switchTime; ?>],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'percentage',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'percentage of types',
                      data: [<?php echo $switchNum; ?>]
            }]
        });
    });

  </script>   



  <script type="text/javascript">

  $(function () {
    $('#userISP').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'userISP',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'userISP',
            innerSize: '50%',
            data: [
           
        <?php echo $userISP; ?>
 ]
        }]
    });
});


  </script>


  <script type="text/javascript">

  $(function () {
    $('#serverISP').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'serverISP',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'serverISP',
            innerSize: '50%',
            data: [
          <?php echo $serverISP; ?>           


 ]
        }]
    });
});


  </script>

	


</head>

<body >
    
        
        

<div style="width:960px;margin:auto;">

	
		
		
       <div id="engagement" style="height: 500px; min-width: 310px"></div>

      
   
   <div style="width:450px;float:left">
		<div id="typeOfVideo" style="min-width: 110px; height: 400px; margin: 0 auto"></div>
		</div>
	
		<div style="width:450px;float:left">
		<div id="dashTransTime" style="min-width: 110px; height: 400px; margin: 0 auto"></div>
		</div>
		
<div style="width:450px;float:left">
		<div id="bitRate" style="min-width: 110px; height: 400px; margin: 0 auto"></div>
		</div>
	
		<div style="width:450px;float:left">
		<div id="device" style="min-width: 110px; height: 400px; margin: 0 auto"></div>
		</div>



<div style="width:450px;float:left">
		<div id="userISP" style="min-width: 110px; height: 400px; margin: 0 auto"></div>
		</div>
	
		<div style="width:450px;float:left">
		<div id="serverISP" style="min-width: 110px; height: 400px; margin: 0 auto"></div>
		</div>
    










    
  </div>


    











</div>
         

</body>





		
		<script src="hsjs/highstock.js"></script>
<script src="hsjs/modules/exporting.js"></script>
<script src="hcjs/highcharts.js"></script>
<script src="hcjs/modules/exporting.js"></script>



</html>
