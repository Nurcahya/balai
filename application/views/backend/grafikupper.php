
<html>
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.axislabel.js"></script>
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
                                          
												$arraylog[$n][0] = $n;
												$arraylog[$n][1] = $log->TMA;
												$n = $n +1;
												 } ?>

											<?php 
											$arraylog2 = array();
											$n = 0;
											foreach ($curah->result() as $curah){ 
                                          
												$arraylog2[$n][0] = $n;
												$arraylog2[$n][1] = $curah->nilai;
												$n = $n +1;
												 } ?>
                                      		
                                            <?php 
											$arraylogvw = array();
											$n = 0;
											foreach ($vw1->result() as $log1){ 
                                          
												$arraylogvw[$n][0] = $n;
												$arraylogvw[$n][1] = $log1->tap;
												$n = $n +1;
												 } ?>
                                            <?php 
											$arraylog2vw = array();
											$n = 0;
											foreach ($vw2->result() as $log2){ 
                                          
												$arraylog2vw[$n][0] = $n;
												$arraylog2vw[$n][1] = $log2->tap;
												$n = $n +1;
												 } ?>
                                            <?php 
											$arraylog3 = array();
											$n = 0;
											foreach ($vw3->result() as $log3){ 
                                          
												$arraylog3vw[$n][0] = $n;
												$arraylog3vw[$n][1] = $log3->tap;
												$n = $n +1;
												 } ?>
                                            <?php 
											$arraylog4vw = array();
											$n = 0;
											foreach ($vw4->result() as $log4){ 
                                          
												$arraylog4vw[$n][0] = $n;
												$arraylog4vw[$n][1] = $log4->tap;
												$n = $n +1;
												 } ?>
                                            <?php 
											$arraylog5vw = array();
											$n = 0;
											foreach ($vw5->result() as $log5){ 
                                          
												$arraylog5vw[$n][0] = $n;
												$arraylog5vw[$n][1] = $log5->tap;
												$n = $n +1;
												 } ?>

		                        	<div id="chartplace2" style="height:410px;"></div>                 
                      

                    </div><!--span8-->
    <!-- END OF RIGHT PANEL -->
	

<script>
 
var log = <?php echo json_encode($arraylog); ?>; 
var log2 = <?php echo json_encode($arraylog2); ?>; 
var vwlog = <?php echo json_encode($arraylogvw); ?>; 
var vwlog2 = <?php echo json_encode($arraylog2vw); ?>; 
var vwlog3 = <?php echo json_encode($arraylog3vw); ?>; 
var vwlog4 = <?php echo json_encode($arraylog4vw); ?>; 
var vwlog5 = <?php echo json_encode($arraylog5vw); ?>; 	

document.write(vwlog);

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
			   [ { data: log, label: "Tinggi Muka Air", color: "#0000ff", lines: { show: true }, yaxis: 1},
			   	 { data: log2, label: "Curah Hujan", color: "#ff0000", bars: { show: true }, yaxis: 2 }, 
			   	 { data: vwlog, label: "VW1", color: "#00ff00", lines: { show: true }, yaxis: 3 }, 
			   	 { data: vwlog2, label: "VW2", color: "#ffff00", lines: { show: true }, yaxis: 3 }, 
			   	 { data: vwlog3, label: "VW3", color: "#00ffff", lines: { show: true }, yaxis: 3 }, 
			   	 { data: vwlog4, label: "VW4", color: "#ff00ff", lines: { show: true }, yaxis: 3, yaxis: 3 }, 
			   	 { data: vwlog5, label: "VW5", color: "#0f0f00", lines: { show: true }, yaxis: 3 } 
			   ],


			   	 { 
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10,   show: true,  aboveData: true },
				   //yaxis: { min: 0, max: 15 },
				      yaxes: [
				    //yaxis:1
				    {
				        position: "left",

				        axisLabel: "Tinggi Muka Air",
        				axisLabelUseCanvas: true,
				        axisLabelFontSizePixels: 12,
				        show: true,
				        axisLabelFontFamily: 'Verdana, Arial',
				        min: 0        
				    }, 
				    //yaxis:2
				    {
				        position: "right",
				        color: "black",
				        axisLabel: "Curah Hujan",
       					axisLabelUseCanvas: true,
				        axisLabelFontSizePixels: 12,
				        show: true,
				        axisLabelFontFamily: 'Verdana, Arial',
				        min: 0, max: 85,
				   	transform: function (v) { return -v; },  
        			inverseTransform: function (v) { return -v; }            
				    }, 
				    //yaxis:3
				    {
				        position: "left",
				      	color: "black",
				        axisLabel: "Piezometer",
				        axisLabelUseCanvas: true,
				        axisLabelFontSizePixels: 12,
				        axisLabelFontFamily: 'Verdana, Arial',
				        show: true,
				        min:0,
				        max:10000            
				    }
				],
				   xaxis: {
				   mode: "categories",
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
									"Nilai = "+y+" ");
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
