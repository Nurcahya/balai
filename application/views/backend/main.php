<?php
$this->load->view('backend/tema/header');

?>
	

            
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	
        	<ul class="breadcrumb">
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active">Halaman Utama</li>
            </ul>
        </div><!--breadcrumbwidget-->
      <div class="pagetitle">
        	<h1>Beranda</h1> <span>Halaman utama aplikasi</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
            	               
                <div class="row-fluid">
                	<div class="span8">
                       <h4 class="widgettitle">Peta Lokasi Pos</h4>
                        <div class="widgetcontent">
                        	<div id="chartplace2" style="height:1px;"></div>
							<IFRAME SRC=<?php echo base_url('admin/main/peta');?> WIDTH=100% Height=450></IFRAME>
                        </div><!--widgetcontent-->
                        
                        <h4 class="widgettitle">Tabel Monitoring Bendungan</h4>
                        <div class="widgetcontent">
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1"><span class="icon-forward"></span> Tinggi Muka Air</a></li>
                                    <li><a href="#tabs-2"><span class="icon-eye-open"></span> Curah Hujan</a></li>
                                    <li><a href="#tabs-3"><span class="icon-leaf"></span> Seepage</a></li>
                                </ul>
                                <div id="tabs-1">
								
                                    <table class="table table-bordered">
                                       <thead>
                                            <tr>
                                                <th class="center">Nama Bendungan</th>
                                                <th class="center">Lokasi</th>
                                                <th class="center">Tinggi Muka Air</th>
                                                <th class="center">Tanggal Log</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($tabel_main1->result() as $tm1){ ?>
                                            <tr>									
                                                <td><strong><?php echo $tm1->nama_pos; ?></strong></td>
                                                <td><?php echo $tm1->alamat; ?></td>
                                                <td><?php echo $tm1->TMA; ?> Meter</td>
                                                <td><?php echo $tm1->log; ?></td>
												
											
                                            </tr><?php } ?>
                                        </tbody>
                                    </table>
								
									
                                </div>
                                <div id="tabs-2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Bendungan</th>
                                                <th>Lokasi</th>
                                                <th>Nilai</th>
                                                <th class="center">Tanggal Log</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($tabel_main2->result() as $tm2){ ?>
                                            <tr>									
                                                <td><strong><?php echo $tm2->nama_pos; ?></strong></td>
                                                <td><?php echo $tm2->alamat; ?></td>
                                                <td><?php echo $tm2->nilai; ?> mm</td>
                                                <td><?php echo $tm2->log; ?></td>
											
                                            </tr><?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="tabs-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Bendungan</th>
                                                <th>Lokasi</th>
                                                <th>Seepage</th>
                                                <th>Nilai</th>
                                                <th class="center">Tanggal Log</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($tabel_main3->result() as $tm3){ ?>
                                            <tr>									
                                                <td><strong><?php echo $tm3->nama_pos; ?></strong></td>
                                                <td><?php echo $tm3->alamat; ?></td>
                                                <td><?php echo $tm3->nama_vnotch; ?></td>
                                                <td><?php echo $tm3->nilai; ?> Meter</td>
                                                <td><?php echo $tm3->log; ?></td>
											
                                            </tr><?php } ?>
                                        </tbody>
                                    </table> 
                                </div>
                            </div><!--#tabs-->
                        </div><!--widgetcontent-->
                        
                        
                    </div><!--span8-->
                    <div class="span4">
                    	<h4 class="widgettitle nomargin">Tentang Aplikasi Monitoring</h4>
                        <div class="widgetcontent bordered">
                        Aplikasi monitoring keamanan balai bendungan merupakan sebuah perangkat lunak yang bertujuan untuk menjaga kestabilan kondisi bendungan melalui pantauan secara real-time terhadap ketinggian muka air, curah hujan, seepage, accelerometer, dan tekanan air pori bendungan. Aplikasi ini dilengkapi pula dengan kamera cctv untuk memantau kondisi langsung di lapangan.	
                        </div><!--widgetcontent-->
                        
                        <h4 class="widgettitle nomargin">Kalender</h4>
                        <div class="widgetcontent">
                        	<div id="calendar" class="widgetcalendar"></div>
                        </div><!--widgetcontent-->
                        
                        <h4 class="widgettitle">Perbandingan Tinggi Muka Air</h4>
                        <div class="widgetcontent">
                        	<div id="bargraph2" style="height:200px;"></div>
                        </div><!--widgetcontent-->
                        
                        <!--widgetcontent-->
                    </div><!--span4-->
                </div><!--row-fluid-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
	
	
<?php 
$arraygrafside = array();
$n = 0;
foreach ($tabel_main1->result() as $js){ 
  $arraygrafside[$n][0] = $js->nama_pos ;
  $arraygrafside[$n][1] = $js->TMA; 
  $n = $n+1;
} ?>	
	

<?php
$arrayjam = array(); 
$hour = 0; 
$length = 5; 
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


<script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#tableHolder').load('main.php', function(){
           setTimeout(refreshTable, 5000);
        });
    }
</script>
	
	
	
<script>
var jam = <?php echo json_encode($arrayjam); ?>;  
var grafside = <?php echo json_encode($arraygrafside); ?>;  

jQuery(document).ready(function(){	
				
			
		var stack = 0, bars = true, lines = false, steps = false;
		jQuery.plot(jQuery("#bargraph2"), [ grafside ], {
			series: {
				stack: stack,
				lines: { show: lines, fill: true, steps: steps },
				bars: { show: bars, barWidth: 0.6 }
			},
			grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10,   show: true,  aboveData: true },
			colors: ["#06c"],
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
			
		});
		
		// calendar
		jQuery('#calendar').datepicker();


});
</script>
<?php
$this->load->view('backend/tema/footer');

?>