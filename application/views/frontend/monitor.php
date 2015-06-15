  <?php
$this->load->view('frontend/tema/headermon');

?>

		<div class="container-fluid" id="pcont">
		<div class="cl-mcont" style="background-image: url('<?php echo base_url();?>assets/frontend/images/bg2.jpg') !important;">	
			<div class="row dash-cols">
				<div class="row dash-cols">
				<div class="col-sm-6 col-md-6 col-lg-4" style="width: 55% !important;">
					<div class="block">
						<div class="header no-border">
							<h2>Grafik Keamanan Bendungan</h2>


						</div> 
							<?php if ($nama=="Jatiluhur") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/1" WIDTH=100% height=410 style="border:0 !important;"></IFRAME>
							<?php } else if ($nama=="Sempor") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/2" WIDTH=100% height=410 style="border:0 !important;"></IFRAME>	
							<?php } else if ($nama=="Kedung Ombo") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/3" WIDTH=100% height=410 style="border:0 !important;"></IFRAME>	
							<?php } else if ($nama=="Sermo") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/4" WIDTH=100% height=410 style="border:0 !important;"></IFRAME>	
							<?php } else if ($nama=="Batutegi") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/5" WIDTH=100% height=410 style="border:0 !important;"></IFRAME>
							<?php } else if ($nama=="Bili-bili") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/6" WIDTH=100% height=450 style="border:0 !important;"></IFRAME>
							<?php } else if ($nama=="Selorejo") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/7" WIDTH=100% height=450 style="border:0 !important;"></IFRAME>
							<?php } else if ($nama=="Wonogiri") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/8" WIDTH=100% height=450 style="border:0 !important;"></IFRAME>
							<?php } else if ($nama=="Situ Gintung") { ?>
									 <IFRAME SRC="<?php echo base_url('admin/grafik/grafikpos');?>/9" WIDTH=100% height=450 style="border:0 !important;"></IFRAME>	
							<?php } ?>  
					</div>
			
					<div class="block">
							  <IFRAME SRC="<?php echo base_url('admin/grafik/grafikaxis');?>/3" WIDTH=100% height=40 style="border:0 !important; background-color:000000 !important;"></IFRAME> 
					</div>
				</div>	
				
				<div class="col-sm-6 col-md-6 col-lg-4" style="width: 44% !important;">
					<div class="widget-block">
						<div class="header no-border">
							<h2>Screenshot CCTV</h2>
						</div>
							<div class="content">
							<IFRAME SRC="<?php echo base_url('monitor/scrollCCTV');?>" WIDTH=762px height=460px></IFRAME>

						</div>
					</div>
				</div>	
			</div>
			
			<div class="row dash-cols">	
				<div class="col-sm-6 col-md-4" style="width: 55% !important;">

					<div class="block">
						<div class="header no-border">
							<h2>Grafik Seepage</h2>
						</div>
							<?php if ($nama=="Jatiluhur") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikfront');?>/1" WIDTH=100% height=260></IFRAME>  
							<?php } else if ($nama=="Sempor") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikfront');?>/2" WIDTH=100% height=260></IFRAME>  	
							<?php } else if ($nama=="Kedung Ombo") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikfront');?>/3" WIDTH=100% height=260></IFRAME>  		
							<?php } else if ($nama=="Sermo") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikfront');?>/4" WIDTH=100% height=260></IFRAME>  	
							<?php } else if ($nama=="Batutegi") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikfront');?>/5" WIDTH=100% height=260></IFRAME>   	
							<?php } else if ($nama=="Bili-bili") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/6" WIDTH=100% height=300></IFRAME>   	
							<?php } else if ($nama=="Selorejo") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/7" WIDTH=100% height=300></IFRAME>   	
							<?php } else if ($nama=="Wonogiri") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/8" WIDTH=100% height=300></IFRAME>   	
							<?php } else if ($nama=="Situ Gintung") { ?>
							  <IFRAME SRC="<?php echo base_url('admin/vnotchhis/grafikpos');?>/9" WIDTH=100% height=300></IFRAME>  	
							<?php } ?> 	
					</div>

					<div class="block">
							  <IFRAME SRC="<?php echo base_url('admin/grafik/grafikaxis');?>/3" WIDTH=100% height=40 style="border:0 !important; background-color:000000 !important;"></IFRAME> 
					</div>
				</div>	
				
				<div class="col-sm-6 col-md-4" style="width: 19% !important;">
					<div class="widget-block" style="background: white !important;  ">
						<div class="white-box padding" style="height: 367px !important;">
							<div class="row info">
								<div class="header no-border">
									<h2>Informasi</h2>
								</div>
									<table border="0" align="left"><tr><td>
									<div class="content red-chart" style="width: 260px !important;">
									Curah Hujan / Jam :  <?php foreach ($cj->result() as $cj) { if ($cj->rata1==""){ echo "0"; } else { echo $cj->rata1; } } ?> mm<br><br>
									Curah Hujan / Hari : <?php foreach ($ch->result() as $ch) { if ($ch->rata2==""){ echo "0"; } else { echo $ch->rata2; } } ?> mm <br><br>
									</div>
									</td>
									</tr><tr>
									<td>
									<div class="content red-chart" style="width: 260px !important;">

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
									</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				  </div>
				  <div class="col-sm-6 col-md-4" style="width: 25% !important;">
					<div class="widget-block" style="background: white !important; ">
						<div class="white-box padding">
								<center><h3 style="font-weight:bold">DAM WATER LEVEL :
								<?php 
								foreach ($tma->result() as $tma) { 
								$TMA =  $tma->TMA; }
								$TMA = number_format($TMA, 2, '.', '');

								echo $TMA; ?> m</h3></center>
								<?php if ($nama=="Jatiluhur") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma');?> width=380 Height=300 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Sempor") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma2');?> width=380 Height=300 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Kedung Ombo") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma3');?> width=380 Height=300 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Sermo") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma4');?> width=380 Height=300 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Batutegi") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma5');?> width=380 Height=300 frameborder=0></IFRAME> 	
								<?php } else if ($nama=="Bili-bili") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma6');?> width=380 Height=300 frameborder=0></IFRAME> 		
								<?php } else if ($nama=="Selorejo") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma7');?> width=380 Height=300 frameborder=0></IFRAME> 		
								<?php } else if ($nama=="Wonogiri") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma8');?> width=380 Height=300 frameborder=0></IFRAME> 		
								<?php } else if ($nama=="Situ Gintung") { ?>
									<IFRAME SRC=<?php echo site_url('home/tma9');?> width=380 Height=300 frameborder=0></IFRAME> 		
								<?php } ?>
						</div>
					</div>
				</div>
				</div>


				<div class="row dash-cols">	
					<div class="col-sm-6 col-md-4" style="width: 100% !important;">
							<div class="content red-chart" style="width: 99% !important; height: 100% !important; padding-top: 0.2% !important; padding-bottom: 0.2% !important;"><marquee><?php 
										$il = 1;
										foreach ($logger->result() as $logger) { 
										$middle = strtotime($logger->log);            
										$new_waktu = date('d-m H:i', $middle); 
										echo "Logger #".$logger->nama_logger." : ".$new_waktu." | ";
										$il++;
										}
										?></marquee></div>
					</div>
				</div>

			</div>
		  </div>  
		</div> 



  <?php
$this->load->view('frontend/tema/footer');

?>