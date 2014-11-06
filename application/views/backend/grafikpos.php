
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Katniss Premium Admin Template</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.categories.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.time.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/chart.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>
<script type="text/javascript" src="date.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body style="overflow-x:hidden;overflow-y:hidden;">
	
    <!-- START OF RIGHT PANEL -->
                	<div style="background:white;">
                    
						
                                            <?php 
											$arraylog = array();
											$n = 0;
											foreach ($log->result() as $log){ 
                                          
												$arraylog[$n][0] = $log->log;
												$arraylog[$n][1] = $log->TMA;
												$n = $n +1;
												 } ?>
                                       
		                        	<div id="chartplace2" style="height:300px;"></div>                 
                      

                    </div><!--span8-->
    <!-- END OF RIGHT PANEL -->
	

<?php
        function dates_month($month,$year)
        {
            $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $dates_month=array();
            for($i=0;$i<$num;$i++)
            {
                $mktime=mktime(0,0,0,$month,$i+1,$year);
                $date=date("d-M-Y",$mktime);
                 $dates_month[$i][0]=$date;
				$dates_month[$i][1]=1;
            }
            return $dates_month;
        }
		
	$bulan = date("n");
	$tahun = date("Y");

    $arraydate= dates_month($bulan,$tahun); 	

$arrayjam = array(); 
$hour = 0; 
$length = 5; 
$skrg = "07-05-2014 14:00:00";
date_default_timezone_set('UTC');
for ($i=0;$i<$length;++$i) 
{ 
  //$arrayjam[$i][0] = strtotime(str_pad($hour, 2, "0", STR_PAD_LEFT) .':00:00'); 
  $arrayjam[$i][0] = $skrg ;
  $arrayjam[$i][1] = rand(0,30);  
  $skrg = strtotime($skrg);
  $skrg = strtotime("+1 hours", $skrg);
  date_default_timezone_set('UTC');
  $skrg = date("d-m-Y H:i:s", $skrg);
} 
	
    ?>	


<script>

var tanggal = <?php echo json_encode($arraydate); ?>;  
var jam = <?php echo json_encode($arrayjam); ?>;  
var log = <?php echo json_encode($arraylog); ?>; 
	

jQuery(document).ready(function(){	
			
		
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				
				
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace2"),
			   [ { data: log, label: "Tinggi Muka Air", color: "#31C5C7"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10,   show: true,  aboveData: true },
				   //yaxis: { min: 0, max: 15 },
				   xaxis: {
				   mode: "categories",
				   show:true
				   }				  
				 });
				 
		var previousPoint = null;
		jQuery("#chartplace2").bind("plothover", function pos (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0],
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									//item.series.data[x]);
									"tinggi muka air = "+y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		});
		
		//setInterval(pos, 1000);
		
});
</script>


</body>
</html>
