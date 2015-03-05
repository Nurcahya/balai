<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Flot Examples: Categories</title>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.categories.js"></script>
	<script type="text/javascript">

	
	<?php
	
	$arrayjam = array(); 
$hour = 0; 
$length = 24; 
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
	

	$(function() {

		var data = [ ["wew", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9] ];

		var jam = <?php echo json_encode($arrayjam); ?>;  

		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				
				
			}).appendTo("body").fadeIn(200);
		}

		$.plot("#placeholder", [ jam ], {
			series: {
				//lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
				bars: { show: true, barWidth: 0.6 },
					   points: { show: true }
			},
			grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10,   show: true,  aboveData: true },
			xaxis: {
				mode: "categories", labelWidth :10
			}
		});

		
		var previousPoint = null;
		jQuery("#placeholder").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " Pukul " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		});
		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>

	<div id="header">
		<h2>Categories</h2>
	</div>

	<div id="content">

		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>

		<p>With the categories plugin you can plot categories/textual data easily.</p>

	</div>

	<div id="footer">
		Copyright &copy; 2007 - 2014 IOLA and Ole Laursen
	</div>

</body>
</html>





