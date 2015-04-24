  <?php
$this->load->view('frontend/tema/header');

?>

		<div class="container-fluid" id="pcont">
		  <div class="cl-mcont">
		  
			<div class="stats_bar">
				<a href="monitor/JL" class="butpro butstyle" >
				<div class="sub"><h2>JATI LUHUR</h2></div>
				</a>
				<a href="monitor/SM" class="butpro butstyle">
					<div class="sub"><h2>SEMPOR</h2></div>
				</a>
				<a href="monitor/KO" class="butpro butstyle">
					<div class="sub"><h2>KEDUNG OMBO</h2></div>
				</a>
				<a href="monitor/SR" class="butpro butstyle">
					<div class="sub"><h2>SERMO</h2></div>
				</a>	
				<a href="monitor/BT" class="butpro butstyle">
					<div class="sub"><h2>BATU TEGI</h2></div>
				</a>
			</div>
			

			<div class="row dash-cols">
			
				<div class="row dash-cols">
				<div class="col-sm-6 col-md-6 col-lg-4" style="width:37% !important">
					<div class="widget-block">
						<div class="white-box padding">
							<div class="row info">
								<div class="header no-border">
							<h2>Tekanan Air Pori</h2>
						</div>
								<div>
																
							
							<div class="tab-container">
						<ul class="nav nav-tabs" id='tabs'>
						  <li class="active"><a href="#1" data-toggle="tab">Jatiluhur</a></li>
						  <li><a href="#2" data-toggle="tab">Sempor</a></li>
						  <li><a href="#3" data-toggle="tab">Kedung Ombo</a></li>
						  <li><a href="#4" data-toggle="tab">Sermo</a></li>
						  <li><a href="#5" data-toggle="tab">Batu Tegi</a></li>
						</ul>
						<div class="tab-content" id='cont'>
						  <div class="tab-pane active " id="1">
						<div class="table-responsive">
								<table class="table table-bordered" >
									<thead>
										<tr>
											<th><strong>VR</strong></th>
											<th><strong>Tekanan Air</strong></th>
											<th><strong>Waktu</strong></th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$i = 1;
									foreach($list->result() as $list) { ?>
									
										<tr class="odd gradeX">
											<td>Vr #<?php echo $i; ?></td>
											<td><?php echo $list->TMA; ?> MPa</td>
											<td><?php echo $list->log; ?></td>	
										</tr>	
									
									<?php $i++; } ?>
									</tbody>
								</table>							
							</div>	
							
						</div><div class="tab-pane" id="2"> Belum Ada Data</div>
						  <div class="tab-pane" id="3"> Belum Ada Data </div>
						  <div class="tab-pane" id="4"> Belum Ada Data </div>
						  <div class="tab-pane" id="5"> Belum Ada Data </div>
						</div>
					</div>
							
								</div>
							</div>
						</div>
					</div>
				</div>	
				<div class="col-sm-6 col-md-6 col-lg-4" style="width:28% !important">
					<div class="block">
						<div class="header no-border">
							<h2>Monitor</h2>
						</div>
						
						<div class="content">
							<div class="stat-data">
								<div class="stat-blue">
									<h2><?php echo $total; ?></h2>
									<span>Total Data</span>
								</div>
							</div>
							<div class="stat-data">
								<div class="stat-number">
									<div><h2>83</h2></div>
									<div>Total hits<br /><span>(Daily)</span></div>
								</div>
								<div class="stat-number">
									<div><h2>57</h2></div>
									<div>Views<br /><span>(Daily)</span></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						
					
					</div>
				</div>	
				<div class="col-sm-6 col-md-6 col-lg-4" style="width:33% !important">
					<div class="widget-block">
						<div class="white-box padding">
						<div class="row info text-shadow">
						<div class="header no-border">
							<h2>Screenshot CCTV</h2>
						</div>
							<div class="content">
							<iframe src=<?php echo base_url('home/citra');?> width="100%" height="260"></iframe>
						</div>
						</div>
						</div>
					</div>
				</div>	
			</div>
			</div>
				
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> Hidden Sign : Nurcahya Pradana
		  </div>


	
		</div> 

  <?php
$this->load->view('frontend/tema/footer');

?>