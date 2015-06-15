
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
												$arraylog[$n][1] = $log->tap;
												$n = $n +1;
												 } ?>
                                       		<?php 
											$arraylog2 = array();
											$n = 0;
											foreach ($log2->result() as $log2){ 
                                          
												$arraylog2[$n][0] = $log2->log;
												$arraylog2[$n][1] = $log2->tap;
												$n = $n +1;
												 } ?>
                                       		<?php 
											$arraylog3 = array();
											$n = 0;
											foreach ($log3->result() as $log3){ 
                                          
												$arraylog3[$n][0] = $log3->log;
												$arraylog3[$n][1] = $log3->tap;
												$n = $n +1;
												 } ?>
                                       		<?php 
											$arraylog4 = array();
											$n = 0;
											foreach ($log4->result() as $log4){ 
                                          
												$arraylog4[$n][0] = $log4->log;
												$arraylog4[$n][1] = $log4->tap;
												$n = $n +1;
												 } ?>
                                       		<?php 
											$arraylog5 = array();
											$n = 0;
											foreach ($log5->result() as $log5){ 
                                          
												$arraylog5[$n][0] = $log5->log;
												$arraylog5[$n][1] = $log5->tap;
												$n = $n +1;
												 } ?>
												
                                       
		                        	<div id="chartplace2" style="height:160px;"></div>                 
                      

                    </div><!--span8-->
    <!-- END OF RIGHT PANEL -->
	

<script>
 
var log = <?php echo json_encode($arraylog); ?>; 
var log2 = <?php echo json_encode($arraylog2); ?>; 
var log3 = <?php echo json_encode($arraylog3); ?>; 
var log4 = <?php echo json_encode($arraylog4); ?>; 
var log5 = <?php echo json_encode($arraylog5); ?>; 
	
	

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
			   [ { data: log, label: "vw1", color: "#0000C7"}, { data: log2, label: "vw2", color: "#31C5C7"}, { data: log3, label: "vw3", color: "#31C50C"} , { data: log4, label: "vw4", color: "#ff0000"}, { data: log5, label: "vw5", color: "#00ff00"}   ], {
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
									"VW = "+y+" mPA");
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		});
		
});
</script>


</body>
</html>
