<?php
$this->load->view('backend/tema/header');

?>
	

    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/main')?>">Home</a> <span class="divider">/</span></li>
                <li class="active">Pesan</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Pesan</h1> <span>Halaman pesan</span>
        </div><!--pagetitle-->
        
            <div class="maincontent">
        	<div class="contentinner">       
                <div class="row-fluid">
                	<div class="span8">
                       <h4 class="widgettitle">Halaman pesan</h4>
                        <div class="widgetcontent">
						 
						  <div class="span12" style="margin:0">

                        <form action="<?php echo site_url();?>admin/pesan/tangkapgridsearch/<?php echo$_GET['id']; ?>" method="post" id="moodleform" target="iframe">
                            <table border="0" width="50%">
                                <tr>
                                <td><p>Tanggal Mulai: <input type="text" name="tglmulai" id="datepicker"></p></td>
                                <td><p>Tanggal Berakhir: <input type="text" name="tglakhir" id="datepicker2"></p></td>
                                <td><input type="submit" value="Filter"></td>
                                <td><a href="<?php echo site_url();?>admin/pesan/grid/<?php echo $_GET['id']; ?>" target="iframe"><input type="button" value="Reset Filter"></a></td>
                            </table>
                        </form>
                    </div>

                        <IFRAME name="iframe" SRC=<?php echo base_url('admin/pesan/grid/'.$_GET['id']);?> WIDTH=100% Height=800></IFRAME>

                   
		                        	          
                        </div><!--widgetcontent-->
                        
                        <!--<div class="widgetcontent">

                           
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1"><span class="icon-forward"></span> Riwayat</a></li>
                                    <li><a href="#tabs-2"><span class="icon-eye-open"></span> Ekspor data</a></li>
                                </ul>
                                <div id="tabs-1">
                                  
                                       
									     <IFRAME SRC="<?php echo base_url('admin/grafik/tabelposframe');?>/<?php echo $this->uri->segment(4); ?>" WIDTH=100% height=498 ></IFRAME> 
									   
                                </div>
                              <div id="tabs-2">
                                     <IFRAME SRC="<?php echo base_url('admin/grafik/tabelexport');?>/<?php echo $this->uri->segment(4); ?>" WIDTH=100% height=498 ></IFRAME> 
                                       
                                </div>
                                
                            </div>
                        </div><!--widgetcontent-->
                      
                    </div><!--span8-->

                      <?php if ($this->session->userdata('hak_akses')==0){ ?>
                    <div class="span4">
                    	<h4 class="widgettitle nomargin">Daftar Pos</h4>
                        <div class="widgetcontent bordered">
            	           <table class="table table-bordered">
										<thead>
                                            <tr>
                                                <th>Nama Pos</th>
                                                <th>Status</th>
                                                <!--<th>Request Data</th>-->
                                            </tr>
                                        </thead>						
		                               <tbody>
										 <?php foreach ($list_pos->result() as $lp){ ?>
                                            <tr>
                                                <td><a href="<?php echo site_url();?>admin/grafik/pos/<?php echo $lp->id_pos; ?>"><strong><?php echo $lp->nama_pos; ?></strong></a></td>
												<td><?php echo $lp->log; ?></td>
												<!--<td><a href="<?php echo site_url();?>admin/grafik/req/<?php echo $lp->id_pos; ?>">Request</a></td>-->
                                            </tr>
											<?php } ?>
                                        </tbody>
                                    </table>
                        </div><!--widgetcontent-->
                    </div><!--span4-->
                     <?php } ?>
                   
                </div><!--row-fluid-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
	

<?php
$this->load->view('backend/tema/footer');

?>