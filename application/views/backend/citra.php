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
                <li class="active">Citra</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Citra</h1> <span>Halaman history citra</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
			<form action="<?php echo site_url();?>admin/citra/tangkapgridsearch/<?php echo $_GET['id']; ?>" method="post" id="moodleform" target="iframe">
                            <table border="0" width="50%">
                                <tr>
                                <td><p>Tanggal Mulai: <input type="text" name="tglmulai" id="datepicker"></p></td>
                                <td><p>Tanggal Berakhir: <input type="text" name="tglakhir" id="datepicker2"></p></td>
                                <td><input type="submit" value="Filter"></td>
                                <td><a href="<?php echo site_url();?>admin/citra/grid/<?php echo $_GET['id']; ?>" target="iframe"><input type="button" value="Reset Filter"></a></td>
                            </table>
                        </form>
			
			<IFRAME name="iframe" SRC=<?php echo base_url('admin/citra/grid?id='.$_GET['id']);?> WIDTH=100% Height=800></IFRAME>
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    

<?php
$this->load->view('backend/tema/footer');

?>