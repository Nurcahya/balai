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

            <form action="<?php echo site_url();?>admin/citra/history/<?php echo $_GET['id']; ?>" method="post" target="_blank">
                <table border="0" width="50%">
                    <tr>
                    <td><p>Lokasi: 
                    <select name="pos">
                        <option value="0">Semua Lokasi</option>
                        <option value="1">Bendungan Jati Luhur</option>
                        <option value="2">Bendungan Sempor</option>
                        <option value="3">Bendungan Kedung Ombo</option>
                        <option value="4">Bendungan Sermo</option>
                        <option value="5">Bendungan Batu Tegi</option>
                        <option value="6">Bendungan Bili Buku</option>
                        <option value="7">Bendungan Selorejo</option>
                        <option value="8">Bendungan Wonogiri</option>
                        <option value="9">Bendungan Situ Gintung</option>
                    </select></p></td>
                    <td><p>Tanggal: <input type="text" name="tglhis" id="datepicker3"></p></td>
                    <td><input type="submit" value="Cetak"></td>
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