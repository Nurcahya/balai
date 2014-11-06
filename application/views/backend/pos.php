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
                <li class="active">Calendar</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Pos</h1> <span>Halaman konfigurasi pos</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
			
			<IFRAME SRC=<?php echo base_url('admin/pos/grid');?> WIDTH=100% Height=800></IFRAME>          
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    

<?php
$this->load->view('backend/tema/footer');

?>