<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Time Interval Page Element Refresh using JQuery and a sprinkle of Ajax</title>
<script language="javascript" src="<?php echo base_url();?>assets/frontend/js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(15000,function(i){
			j.ajax({
			  url: "<?php echo site_url();?>admin/grafik/grafikpos/<?php echo $id; ?>",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			  }
			})
		})
	});
});



</script>
</head>
<body>
<div class="refresh"></div>
</body>
</html>
