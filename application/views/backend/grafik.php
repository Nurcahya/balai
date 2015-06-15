<?php
$this->load->view('backend/tema/header');

?>
	

    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/main')?>">Home</a> <span class="divider">/</span></li>
                <li class="active">Tinggi Muka Air</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Tinggi Muka Air</h1> <span>Halaman monitoring grafik tinggi muka air</span>
        </div><!--pagetitle-->
        
            <div class="maincontent">
        	<div class="contentinner">       
                <div class="row-fluid">
                	<div class="span8">
                       <h4 class="widgettitle">Grafik TMA</h4>
                        <div class="widgetcontent">
						 
						 <IFRAME SRC="<?php echo base_url('admin/grafik/grafiktma');?>/<?php echo $this->uri->segment(4); ?>" WIDTH=100% height=300 style"position: relative; overflow-y: hidden;"></IFRAME> 
		                        	          
                        </div><!--widgetcontent-->
                        
                     <!--widgetcontent-->
                      
                    </div><!--span8-->

                      <?php if ($this->session->userdata('hak_akses')==0){ ?>
                    <div class="span4">
                    	<h4 class="widgettitle nomargin">Daftar Pos</h4>
                        <div class="widgetcontent bordered">
            	           <table class="table table-bordered">
										<thead>
                                            <tr>
                                                <th>Nama Pos</th>
                                                <th>Update Terakhir</th>
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
                    <div class="span12" style="margin:0">
                        <h4 class="widgettitle">Detail </h4>

                        <form action="<?php echo site_url();?>admin/grafik/tangkapgridsearch/<?php echo $this->uri->segment(4); ?>" method="post" id="moodleform" target="iframe">
                            <table border="0" width="50%">
                                <tr>
                                <td><p>Tanggal Mulai: <input type="text" name="tglmulai" id="datepicker"></p></td>
                                <td><p>Tanggal Berakhir: <input type="text" name="tglakhir" id="datepicker2"></p></td>
                                <td><input type="submit" value="Filter"></td>
                                <td><a href="<?php echo site_url();?>admin/grafik/grid/<?php echo $this->uri->segment(4); ?>" target="iframe"><input type="button" value="Reset Filter"></a></td>
                            </table>
                        </form>
                    </div>

                        <IFRAME name="iframe" SRC=<?php echo base_url('admin/grafik/grid/'.$this->uri->segment(4));?> WIDTH=100% Height=800></IFRAME>

                   
                </div><!--row-fluid-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
	

<?php
$this->load->view('backend/tema/footer');

?>