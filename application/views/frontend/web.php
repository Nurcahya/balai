  <?php
$this->load->view('frontend/tema/headermon');

?>

		<div class="container-fluid" id="pcont">
		  <div class="cl-mcont">
		 
			
	
			
				<div class="row dash-cols">
				
				<div class="col-sm-6 col-md-6 col-lg-6" style="width: 60% !important;">
					<div class="widget-block">
						<div class="white-box padding">
							<div class="row info">
								<div class="header no-border">
							<h2>Tekanan Air Pori</h2>
						</div>
								<div>
																<div class="table-responsive">
								<!-- <table class="table table-bordered" id="datatable" > -->
								<table class="table table-bordered" >
									<thead>
										<tr>
											<th><strong>Stasiun</strong></th>
											<th><strong>Sungai</strong></th>
											<th><strong>Tekanan Air</strong></th>
											<th><strong>Waktu</strong></th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($list->result() as $list) { ?>
									
										<tr class="odd gradeX">
											<td><?php echo $list->nama_pos; ?></td>
											<td><?php echo $list->alamat; ?></td>
											<td><?php echo $list->TMA; ?> MPa</td>
											<td><?php echo $list->log; ?></td>	
										</tr>	
									
									<?php } ?>
									</tbody>
								</table>							
							</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				
				<div class="col-sm-6 col-md-6 col-lg-6" style="width: 40% !important;">
					<div class="widget-block">
						<div class="white-box padding">
						<div class="row info text-shadow">
						
							<div class="content">
							<center><?php foreach ($citra->result() as $citra) { ?>
							<img src="<?php echo base_url();?>assets/upload/<?php echo $citra->citra;?>" width="100%">
							<?php } ?></center>
						</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row dash-cols">
				<div class="col-sm-6 col-md-6">
					<div class="block">
						<div class="header no-border">
							<h2>Informasi Terkini</h2>
						</div>
								<div class="content red-chart">
								TMA Waduk : 167.24 m AMSL<br><br>
								Curah Hujan / Jam : 0000 mm<br><br>
								Curah Hujan / Hari : 0017 mm <br><br>
								
						</div>
						
						
					</div>
				</div>	
				
				<div class="col-sm-6 col-md-6">
					<div class="block">
						<div class="header no-border">
							<h2>Monitor</h2>
						</div>
						<div class="content red-chart">
							Seepage #1 : 1.5435345 Ltr/dtk<br><br>
							Seepage #2 : 2.5345435 Ltr/dtl
						</div>
				
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			
		
		  </div>
		</div> 



  <?php
$this->load->view('frontend/tema/footer');

?>