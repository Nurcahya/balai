
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

foreach($list->result() as $list) { 
	
		$file = fopen("http://36.78.163.102/balai/assets/upload/acc/".$list->file_acc,"r");
		$arraylog = array();
		$arraylog2 = array();
		$arraylog3 = array();
		$n = 0;	
		$row = 1;
		if (($handle = $file) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row == 1){ $row++; continue; }
		    $num = count($data);
		           $row++;
		    for ($c=0; $c < $num-1; $c++) {
		    $c++;
	
		  		$arraylog[$n][0] =  $data[0].":".$n;
				$arraylog[$n][1] =  $data[1]+50;


				$arraylog2[$n][0] = $data[0].":".$n;
				$arraylog2[$n][1] = $data[2]+50;


				$arraylog3[$n][0] = $data[0].":".$n;
				$arraylog3[$n][1] = $data[3]+50;
				$n = $n +1;
											
		    }
		}
		fclose($handle);


		}
	  }

											?>
		                        	<div id="chartplace2" style="height:220px;"></div>                 
                      

                    </div><!--span8-->
    <!-- END OF RIGHT PANEL -->
	
<script>
var log = <?php echo json_encode($arraylog); ?>; 
var log2 = <?php echo json_encode($arraylog2); ?>; 
var log3 = <?php echo json_encode($arraylog3); ?>; 
	
	document.write('log 1 = '+log);

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
			   [ { data: log, label: "vw1", color: "#0000FF"}, { data: log2, label: "vw2", color: "#FF0000"}, { data: log3, label: "vw3", color: "#00FF00"}, { data: log3, label: "vw4", color: "#ff00ff"} , { data: log3, label: "vw5", color: "#00FFff"}    ], {
				   series: {
				   	   stack: false,
					   lines: { show: true, fill: true },
					   points: { show: false }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10,   show: true,  aboveData: true },
				   yaxis: { min: 49, max: 51 },
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
									"Nilai pada "+x+"= "+y+" ");
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
