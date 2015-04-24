<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/frontend/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />

	<style>
	tr:nth-child(even) {
	  background-color: #DADADA;
	}


	tr:nth-child(odd) {
	  background-color: white;
	}	
	</style>
  <!-- Custom styles for this template -->
	<script src="<?php echo base_url();?>assets/frontend/js/jquery1.7.1.js"></script>
	<script type="text/javascript">
	$.fn.infiniteScrollUp=function(){
		var self=this,kids=self.children()
		kids.slice(5).hide()
		setInterval(function(){
			kids.filter(':hidden').eq(0).slideDown()
			kids.eq(0).slideUp(function(){
				$(this).appendTo(self)
				kids=self.children()
			})
		},1500)
		return this
	}
	function cvt(s){
		return function(){
			return $(s).html( $(this).html())
		}
	}
	$(function(){
		$('tbody').infiniteScrollUp()
	})
	</script>
	
	<title>infiniteScrollUp2</title>

</head>
<body style="overflow-x:hidden;overflow-y:hidden;">
	<div class="table-responsive">
								<!-- <table class="table table-bordered" id="datatable" > -->
								<table class="table table-bordered">
<colgroup><col /><col /><col /><col /><col /><col /></colgroup>
	<thead>
		<tr>
			<th><strong>No</strong></th>
			<th><strong>Tekanan Air</strong></th>
			<th><strong>Waktu</strong></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach($list->result() as $list) { 
	if ($list->file_vw==""){
	?>
		<tr class="odd gradeX">
			<td>1</td>
			<td>0 MPa</td>
			<td>0000-00-00 00:00:00</td>	
		</tr>	
		<tr class="odd gradeX">
			<td>2</td>
			<td>0 MPa</td>
			<td>0000-00-00 00:00:00</td>	
		</tr>	
		<tr class="odd gradeX">
			<td>3</td>
			<td>0 MPa</td>
			<td>0000-00-00 00:00:00</td>	
		</tr>	
		<tr class="odd gradeX">
			<td>4</td>
			<td>0 MPa</td>
			<td>0000-00-00 00:00:00</td>	
		</tr>	
		<tr class="odd gradeX">
			<td>5</td>
			<td>0 MPa</td>
			<td>0000-00-00 00:00:00</td>	
		</tr>	
		<tr class="odd gradeX">
			<td>6</td>
			<td>0 MPa</td>
			<td>0000-00-00 00:00:00</td>	
		</tr>	
	<?php
	}
	else{
	
		$file = fopen("http://36.78.163.102/balai/assets/upload/vr/".$list->file_vw,"r");
			
		$row = 1;
		if (($handle = $file) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row == 1){ $row++; continue; }
		    $num = count($data);
		           $row++;
		    for ($c=0; $c < $num-1; $c++) {
		    $c++;
		 ?>
		 
		<tr class="odd gradeX">
			<td><?php echo $data[0]; ?></td>
			<td><?php echo $data[1]; ?> MPa</td>
			<td><?php echo $list->log; ?></td>	
		</tr>	
		  <?php 

		    }
		}
		fclose($handle);


		}

	 } } ?>
	
	</tbody>
</table>
</div>
</body>
</html>
