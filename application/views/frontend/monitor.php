  <?php
$this->load->view('frontend/tema/headermon');

?>

		<div class="container-fluid" id="pcont">

		<?php if ($nama=="Jatiluhur") { ?>
				  <div class="cl-mcont" style="background-image: url('<?php echo base_url();?>assets/frontend/images/bg2.jpg') !important;">	
		<?php } else if ($nama=="Sempor") { ?>
				  <div class="cl-mcont" style="background-image: url('<?php echo base_url();?>assets/frontend/images/bg2.jpg') !important;">	
		<?php } else if ($nama=="Kedung Ombo") { ?>
				  <div class="cl-mcont" style="background-image: url('<?php echo base_url();?>assets/frontend/images/bg2.jpg') !important;">	
		<?php } else if ($nama=="Sermo") { ?>
				  <div class="cl-mcont" style="background-image: url('<?php echo base_url();?>assets/frontend/images/bg2.jpg') !important;">	
		<?php } else if ($nama=="Batutegi") { ?>
				  <div class="cl-mcont" style="background-image: url('<?php echo base_url();?>assets/frontend/images/bg2.jpg') !important;">	
		<?php } ?>
 
			<div class="row dash-cols">
			
				<div class="row dash-cols">
				<div class="col-sm-6 col-md-6 col-lg-4" style="width: 30% !important;">
					<div class="block">
						<div class="header no-border">
							<h2>Grafik Tinggi Muka Air</h2>
						</div>
							  
							<?php if ($nama=="Jatiluhur") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/1" WIDTH=100% height=220></IFRAME>
							<?php } else if ($nama=="Sempor") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/2" WIDTH=100% height=220></IFRAME>	
							<?php } else if ($nama=="Kedung Ombo") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/3" WIDTH=100% height=220></IFRAME>	
							<?php } else if ($nama=="Sermo") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/4" WIDTH=100% height=220></IFRAME>	
							<?php } else if ($nama=="Batutegi") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/5" WIDTH=100% height=220></IFRAME>	
							<?php } ?>  
					</div>

					<div class="block">
						<div class="header no-border">
							<h2>Grafik Curah Hujan</h2>
						</div>
							<?php if ($nama=="Jatiluhur") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/curahhujan/grafikpos');?>/1" WIDTH=100% height=220></IFRAME>  
							<?php } else if ($nama=="Sempor") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/curahhujan/grafikpos');?>/2" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Kedung Ombo") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/curahhujan/grafikpos');?>/3" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Sermo") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/curahhujan/grafikpos');?>/4" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Batutegi") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/curahhujan/grafikpos');?>/5" WIDTH=100% height=220></IFRAME>  	
							<?php } ?> 		
						
					</div>
				</div>	
				<div class="col-sm-6 col-md-6 col-lg-4" style="width: 25% !important; height: 500px !important; ">
					<div class="widget-block" style="background: white !important; height: 540px !important; ">
						<div class="white-box padding">
							
								
									<div class="header no-border">
							<h2>Informasi Terkini</h2>
						</div>
								<br>
								<div class="content red-chart">
								Curah Hujan / Jam :  <?php foreach ($cj->result() as $cj) { if ($cj->rata1==""){ echo "0"; } else { echo $cj->rata1; } } ?> mm<br><br>
								Curah Hujan / Hari : <?php foreach ($ch->result() as $ch) { if ($ch->rata2==""){ echo "0"; } else { echo $ch->rata2; } } ?> mm <br><br>
								<br><br>
								</div>
								<br>
								<center><h3 style="font-weight:bold">DAM WATER LEVEL :
								<?php 
								foreach ($tma->result() as $tma) { 
								$TMA =  $tma->TMA; }
								$TMA = number_format($TMA, 2, '.', '');

								echo $TMA; ?> m</h3></center>
								<?php if ($nama=="Jatiluhur") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma');?> width=390 Height=330 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Sempor") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma2');?> width=390 Height=330 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Kedung Ombo") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma3');?> width=390 Height=330 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Sermo") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma4');?> width=390 Height=330 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Batutegi") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma5');?> width=390 Height=330 frameborder=0></IFRAME> 	
								<?php } ?>
						</div>
					</div>
				</div>	
				<div class="col-sm-6 col-md-6 col-lg-4" style="width: 44% !important;">
					<div class="widget-block">
						<div class="white-box padding">
						<div class="row info text-shadow">
						<div class="header no-border">
							<h2>Screenshot CCTV</h2>
						</div>
							<div class="content">
							<?php foreach ($citra->result() as $citra) { ?>
							<img src="http://36.78.163.102/balai/assets/upload/citra/<?php echo $citra->nama_citra;?>" width="100%" style="max-height:500px !important;">
							<?php } 	
							?>
						
						</div>
						</div>
						</div>
					</div>
				</div>	
			</div>
			
			<div class="row dash-cols">	
				<div class="col-sm-6 col-md-4" style="width: 30% !important;">

					<div class="block">
						<div class="header no-border">
							<h2>Grafik Seepage</h2>
						</div>
							<?php if ($nama=="Jatiluhur") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/1" WIDTH=100% height=220></IFRAME>  
							<?php } else if ($nama=="Sempor") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/2" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Kedung Ombo") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/3" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Sermo") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/4" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Batutegi") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/5" WIDTH=100% height=220></IFRAME>  	
							<?php } ?> 	
					</div>

					
				</div>	
				<div class="col-sm-6 col-md-4" style="width: 35% !important;">
					<div class="widget-block" style="background: white !important;  ">
						<div class="row info">
							<div class="header no-border">
						<h2>Tekanan Air Pori</h2>
							</div>
							<?php if ($nama=="Jatiluhur") { ?>
							  <IFRAME SRC="<?php echo base_url('monitor/vrscroll');?>/1" WIDTH=100% height=220></IFRAME>  
							<?php } else if ($nama=="Sempor") { ?>
							  <IFRAME SRC="<?php echo base_url('monitor/vrscroll');?>/2" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Kedung Ombo") { ?>
							  <IFRAME SRC="<?php echo base_url('monitor/vrscroll');?>/3" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Sermo") { ?>
							  <IFRAME SRC="<?php echo base_url('monitor/vrscroll');?>/4" WIDTH=100% height=220></IFRAME>  	
							<?php } else if ($nama=="Batutegi") { ?>
							  <IFRAME SRC="<?php echo base_url('monitor/vrscroll');?>/5" WIDTH=100% height=220></IFRAME>  	
							<?php } ?> 	
						</div>
					</div>
				</div>	
				<div class="col-sm-6 col-md-4">
					<div class="widget-block" style="background: white !important;  ">
						<div class="white-box padding">
							<div class="row info">
								<div class="header no-border">
									<h2>Monitor</h2>
								</div>
									<table border="0" align="left"><tr><td>
									<div class="content red-chart" style="height: 174px !important;">

									<?php if ($nama=="Sermo") { 
						
										foreach ($vnotch->result() as $vnotch) { 
										$seepage[] = $vnotch->nilai;
										}
										echo "Seepage : ".$seepage[0]." mm<br><br>";
										echo "Outlet : ".$seepage[1]." mm<br><br>";
			 						} else {
										$iv = 1;
										foreach ($vnotch->result() as $vnotch) { 
										echo "Seepage #".$iv." : ".$vnotch->nilai." mm<br><br>";
										$iv++;							}
									} ?>

									</div>
									</td><td>
									<div class="content red-chart" style="height: 174px !important;">
										<?php 
										$il = 1;
										foreach ($logger->result() as $logger) { 
										$middle = strtotime($logger->log);            
										$new_waktu = date('d-m H:i', $middle); 
										echo "Logger #".$logger->nama_logger." : ".$new_waktu." <br><br>";
										$il++;
										}
										?>
									</div>
									</td></tr>
								</table>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</div>
		  </div>  
		</div> 



  <?php
$this->load->view('frontend/tema/footer');

?>