
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

<body style="overflow-x:hidden; overflow-y:hidden; background:white;">
	
    <!-- START OF RIGHT PANEL -->
                	<div style="background:white;">
                    
						
                                            <?php 
											$arraylog = array();
											$n = 0;
											foreach ($log->result() as $log){ 
                                          		$waktu = substr($log->log, 11, 5);
												$arraylog[$n][0] = $waktu;
												$arraylog[$n][1] = "0";
												$n = $n +1;
												 } ?>
                                       
		                        	<div id="chartplace2" style="height:40px; margin-left:62px !important; margin-right:30px !important;"></div>                 
                      

                    </div><!--span8-->
    <!-- END OF RIGHT PANEL -->
	
<script>
var log = <?php echo json_encode($arraylog); ?>; 


	var d = (new Date()).getTime();
//document.write(d);


	var e = (new Date("2015/02/02")).getTime();
//document.write(e);

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
			   [ { data: log, label: "Curah Hujan", color: "#31C5C7"} ], {
				   series: {
					     lines: { show: true },
					   points: { show: false }
				   },
				    bars: {
		                align: "center",
		                barWidth: 0.5
		            },
				   legend: { position: 'nw', show:false},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10,   show: true,  aboveData: true },
				   yaxis: { min: 0, show: true },
				   xaxis: { mode: "time", 
				   timeformat:"%H:%M",
				   tickSize: [1, "hour"],
                min: (new Date()).getTime() - 61200000,
                max: (new Date()).getTime() + 25200000
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
									"Curah Hujan = "+y+" mm");
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
