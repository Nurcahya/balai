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
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active">User</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>User</h1> <span>Halaman konfigurasi user</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
			
			
			<IFRAME SRC=<?php echo base_url('admin/user/grid');?> WIDTH=100% Height=800></IFRAME>
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    

<?php
$this->load->view('backend/tema/footer');

?>