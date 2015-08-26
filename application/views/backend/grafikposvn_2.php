
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.categories.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.time.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.axislabel.js"></script>
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
                	<div style="background:black;">
                    
						
                                            <?php 
											$arraylog = array();
											$n = 0;
											foreach ($log1->result() as $log){ 
                                          
												$arraylog[$n][0] = strtotime($log->log)* 1000;
												$arraylog[$n][1] = $log->nilai;
												$n = $n +1;
												 } ?>
                                       		<?php 
											$arraylog2 = array();
											$n = 0;
											foreach ($log2->result() as $log2){ 
                                          
												$arraylog2[$n][0] = strtotime($log2->log)* 1000;
												$arraylog2[$n][1] = $log2->nilai;
												$n = $n +1;
												 } ?>
		                        	<div id="chartplace2" style="height:260px; margin-left:45px !important; margin-right:25px !important;"></div>                 
                      

                    </div><!--span8-->
    <!-- END OF RIGHT PANEL -->
	
<script>
var log = <?php echo json_encode($arraylog); ?>; 
var log2 = <?php echo json_encode($arraylog2); ?>; 
	
	document.write('log 1 = '+log);

	document.write('log 2 =' +log2);

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
			   [ { data: log, label: "Seepage", color: "#0000C7"}, { data: log2, label: "Seepage2", color: "#31C5C7"}  ], {
				   series: {
				   	   stack: false,
					   lines: { show: true, fill: true },
					   points: { show: false }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10,   show: true,  aboveData: true },
				    yaxis: 				    //yaxis:1
				    {
				        position: "left",
				        axisLabel: "Seepage",
        				axisLabelUseCanvas: true,
				        axisLabelFontSizePixels: 12,
				        show: true,
				        axisLabelFontFamily: 'Verdana, Arial',
				        min: 0        
				    }, 
				   xaxis: {
				   mode: "time",
				   show:false
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
									"Nilai Seepage = "+y+" mm");
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
