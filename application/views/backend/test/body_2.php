<?php 
        $arraytma = array();
        $n = 0;
        foreach ($log->result() as $log){ 
      
            $n = $n +1;
            $time = strtotime($log->log) * 1000;
            $arraytma[$n] = "[$time,$log->TMA]";
    } ?>
    <?php 
        $arrayhujan = array();
        $n = 0;
        foreach ($curah->result() as $log){ 
      
            $n = $n +1;
            $time = strtotime($log->log) * 1000;
            $nilai = floatval($log->nilai);
            $arrayhujan[$n] = "[$time,$nilai]";
    } ?>
  	<?php 
		$arraydata = array();
		$n = 0;
		foreach ($vw1->result() as $log1){ 
		    $n = $n +1;
			$time = strtotime($log1->log) * 1000;
	        $nilai = floatval($log1->tap);
	        $arraydata[$n] = "[$time,$nilai]";
	} ?>
	<?php 
		$arraydata2 = array();
		$n = 0;
		foreach ($vw2->result() as $log2){ 	  
			$n = $n +1;
			$time = strtotime($log2->log) * 1000;
	        $nilai = floatval($log2->tap);
	        $arraydata2[$n] = "[$time,$nilai]";
	 } ?>
	 <?php 
		$arraydata3 = array();
		$n = 0;
		foreach ($vw3->result() as $log3){ 
      		$n = $n +1;
			$time = strtotime($log3->log) * 1000;
	        $nilai = floatval($log3->tap);
	        $arraydata3[$n] = "[$time,$nilai]";
	 } ?>
	 <?php 
		$arraydata4 = array();
		$n = 0;
		foreach ($vw4->result() as $log4){ 
      		$n = $n +1;
			$time = strtotime($log4->log) * 1000;
	        $nilai = floatval($log4->tap);
	        $arraydata4[$n] = "[$time,$nilai]";
	 } ?>
	 <?php 
		$arraydata5 = array();
		$n = 0;
		foreach ($vw5->result() as $log5){ 
      		$n = $n +1;
			$time = strtotime($log5->log) * 1000;
	        $nilai = floatval($log5->tap);
	        $arraydata5[$n] = "[$time,$nilai]";
	 } ?>
<script type="text/javascript">

$(function () {
    $("<?php echo '#'.$kode; ?>").highcharts({
        chart: {
            backgroundColor: '#000000',
            zoomType: 'x'
        },
        title: {
            text: '-------',
          
        },
        xAxis: {
            type: 'datetime',
            maxRange: 24 * 3600000 // fourteen days
        },
        yAxis:[{ // Primary yAxis
	            labels: {
	                format: '{value} cm',
	                style: {
	                    color: Highcharts.getOptions().colors[0]
	                }
	            },
            	min : 0,
	            title: {
	                text: 'Tinggi Muka Air',
	                style: {
	                    color: Highcharts.getOptions().colors[0]
	                }
	            }

	        }, { // Secondary yAxis
	            gridLineWidth: 1,
            	min : 0,
            	max : 10000,
	            title: {
	                text: 'Vibrating Wire',
	                style: {
	                    color: Highcharts.getOptions().colors[2]
	                }
	            },
	            labels: {
	                format: '{value} mm',
	                style: {
	                    color: Highcharts.getOptions().colors[2]
	                }
	            }

	        }, { // Tertiary yAxis
	            gridLineWidth: 1,
	            title: {
	                text: 'Curah Hujan',
	                style: {
	                    color: Highcharts.getOptions().colors[6]
	                }
	            },
	            labels: {
	                format: '{value} mm',
	                style: {
	                    color: Highcharts.getOptions().colors[6]
	                }
	            },
        		reversed: true,
	            opposite: true
	        }],
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
        exporting: { 
        	enabled: false 
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
            name: 'Tinggi Muka Air',
            lineWidth: 2,
            data: [<?php echo join($arraytma, ',') ?>]
        },{
            name: 'VW 1',
            lineWidth: 2,
            yAxis: 1,
            data: [<?php echo join($arraydata, ',') ?>]
        }, {
            name: 'VW 2',
            lineWidth: 2,
            yAxis: 1,
            data: [<?php echo join($arraydata2, ',') ?>]
        }, {
            name: 'VW 3',
            lineWidth: 2,
            yAxis: 1,
            data: [<?php echo join($arraydata3, ',') ?>]
        }, {
            name: 'VW 4',
            lineWidth: 2,
            yAxis: 1,
            data: [<?php echo join($arraydata4, ',') ?>]
        }, {
            name: 'VW 5',
            lineWidth: 2,
            yAxis: 1,
            data: [<?php echo join($arraydata5, ',') ?>]
        },{
        	 type: 'column',
            name: 'Curah Hujan',
            lineWidth: 2,
            yAxis: 2,
            data: [<?php echo join($arrayhujan, ',') ?>]
        }
        ]
    });
});
        </script>
        <script src="<?php echo base_url();?>assets/highchart/js/highcharts.js"></script>
        <script src="<?php echo base_url();?>assets/highchart/js/modules/exporting.js"></script>

        <div id="<?php echo $kode; ?>" style="min-width: 310px; height: 410px; margin: 0 auto"></div>