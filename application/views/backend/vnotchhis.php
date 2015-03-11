<?php
$this->load->view('backend/tema/header');

?>
	

    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed"><a href="" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/main')?>">Home</a> <span class="divider">/</span></li>
                <li class="active">History Seepage</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Seepage</h1> <span>Halaman history seepage</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
                  <div class="row-fluid">
                     <div class="span8" style="margin:10">
			          <form action="<?php echo site_url();?>admin/vnotchhis/tangkapgridsearch/<?php echo $_GET['id']; ?>" method="post" id="moodleform" target="iframe">
                            <table border="0" width="50%">
                                <tr>
                                <td><p>Tanggal Mulai: <input type="text" name="tglmulai" id="datepicker"></p></td>
                                <td><p>Tanggal Berakhir: <input type="text" name="tglakhir" id="datepicker2"></p></td>
                                <td><input type="submit" value="Filter"></td>
                                <td><a href="<?php echo site_url();?>admin/vnotchhis/grid/<?php echo $_GET['id']; ?>" target="iframe"><input type="button" value="Reset Filter"></a></td>
                            </table>
                        </form>
			
			<IFRAME name="iframe" SRC=<?php echo base_url('admin/vnotchhis/grid?id='.$_GET['id']);?> WIDTH=100% Height=800></IFRAME>
            </div>

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
                                                <td><a href="<?php echo site_url();?>admin/vnotchhis?id=<?php echo $lp->id_pos; ?>"><strong><?php echo $lp->nama_pos; ?></strong></a></td>
                                                <td><?php echo $lp->log; ?></td>
                                                <!--<td><a href="<?php echo site_url();?>admin/grafik/req/<?php echo $lp->id_pos; ?>">Request</a></td>-->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                        </div><!--widgetcontent-->
                    </div><!--span4-->
                     <?php } ?>
            </div>
        </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    

<?php
$this->load->view('backend/tema/footer');

?>