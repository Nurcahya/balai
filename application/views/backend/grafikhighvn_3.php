<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>

	</head>
	<body style="overflow-x:hidden;overflow-y:hidden;">


  	<?php 
		$arraydata = array();
		$n = 0;
		foreach ($log1->result() as $log1){ 
		    $n = $n +1;
			$time = strtotime($log1->log) * 1000;
	        $nilai = floatval($log1->nilai);
	        $arraydata[$n] = "[$time,$nilai]";
	} ?>
	<?php 
		$arraydata2 = array();
		$n = 0;
		foreach ($log2->result() as $log2){ 	  
			$n = $n +1;
			$time = strtotime($log2->log) * 1000;
	        $nilai = floatval($log2->nilai);
	        $arraydata2[$n] = "[$time,$nilai]";
	 } ?>
	 <?php 
		$arraydata3 = array();
		$n = 0;
		foreach ($log3->result() as $log3){ 
      		$n = $n +1;
			$time = strtotime($log3->log) * 1000;
	        $nilai = floatval($log3->nilai);
	        $arraydata3[$n] = "[$time,$nilai]";
	 } ?>
<script type="text/javascript">

$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Grafik Seepage'
        },
        xAxis: {
            type: 'datetime',
            maxRange: 24 * 3600000 // fourteen days
        },
        yAxis: {
            title: {
                text: 'Nilai (mm)'
            },
            lineWidth : 2,
            min : 0
        },
        legend: {
                align: 'left',
                verticalAlign: 'top',
                y: 10,
                floating: true,
                borderWidth: 0
        },
        credits: {
            enabled: false
        },
        tooltip: {
            shared: true,
            crosshairs: true
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            name: 'Seepage 1',
            lineWidth: 2,
            data: [<?php echo join($arraydata, ',') ?>]
        }, {
            name: 'Seepage 2',
            lineWidth: 2,
            data: [<?php echo join($arraydata2, ',') ?>]
        }, {
            name: 'Seepage 3',
            lineWidth: 2,
            data: [<?php echo join($arraydata3, ',') ?>]
        }

        ]
    });
});
        </script>
        <script src="<?php echo base_url();?>assets/highchart/js/highcharts.js"></script>
        <script src="<?php echo base_url();?>assets/highchart/js/modules/exporting.js"></script>

        <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto"></div>

	</body>
</html>
