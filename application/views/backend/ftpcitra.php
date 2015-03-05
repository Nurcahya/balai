<?php
$this->load->view('backend/tema/header');

?>
	    <script>
        function newDoc(id) {
            //window.location.assign("<?php echo base_url();?>/read_messages/"+id);
            //var object = new ActiveXObject("Scripting.FileSystemObject");
            //var file = object.GetFile("C:\\xampp5.5\\htdocs\\balai\\assets\\upload\\citra\\1.jpg");
            //file.Move("C:\\xampp5.5\\htdocs\\balai\\assets\\upload\\citra\\backup");
           // rename('image1.jpg', 'del/image1.jpg')
            window.alert("File telah di-backup"); 
            }
    </script>


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
                <li class="active">FTP</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Manajemen FTP</h1> <span>Halaman manajemen FTP</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
			<table class="table table-bordered">
                <tr><th>No. </th><th>Nama File</th><th> Ukuran </th><th> Waktu </th><th> Aksi </th></tr>
			<?php
                date_default_timezone_set('Asia/Jakarta');
                $jum = 0;
               /* $dir = "<?php echo base_url();?>assets/upload/citra"; */
                $dir = "C:/xampp5.5/htdocs/balai/assets/upload/citra";
                $dh  = opendir($dir);
                while (false !== ($filename = readdir($dh))) {
                    $jum = $jum+1;
                    $fullpath = "C:/xampp5.5/htdocs/balai/assets/upload/citra/".$filename;
                    echo "<tr><td>".$jum."</td><td>";
                    echo $filename."</td><td>".filesize($fullpath)." byte</td><td>".date ("F d Y H:i:s.", filemtime($fullpath))."</td>";
                    echo "<td><a  href='".site_url()."admin/ftpcitra/pindah/".$filename."' onclick='newDoc(".$jum.")'>Backup</a></td></tr>";
                }

            ?>
			</table>
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
<?php
$this->load->view('backend/tema/footer');

?>