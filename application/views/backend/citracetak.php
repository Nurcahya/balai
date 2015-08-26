<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ADMINISTRATOR MONITORING BALAI BENDUNGAN</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/prettify/prettify.css" type="text/css" />
</head>

<body>

<div class="mainwrapper fullwrapper">
                
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel" style="margin-left: 0px !important;">
        <div class="pagetitle">
        	<h1>Citra CCTV Monitoring Bendungan <?php echo $bendungan." ". $tanggal; ?></h1> 
            <button onclick="myFunction()">Cetak halaman</button>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
		        <table width="100%">
                    <tr>
                        <?php
                        $i = 1;
                        foreach ($citra->result() as $cetak){
                            if ($i%4==4) echo '<tr>';
                            echo "<td><center><img style='width:100%; max-width:300px;' src='http://36.78.163.102/balai/assets/upload/citra/".$cetak->nama_citra."'/></center><center>".$cetak->log."</center><center>".$cetak->nama_citra."</center><br></td>";
                            if ($i%4==0) echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tr>
                </table>

            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->

<script>
function myFunction() {
    window.print();
}
</script>


    
    <div class="footer">
        <div class="footerleft">Aplikasi Administrator Monitoring Bendungan</div>
        <div class="footerright">&copy; NPTP 2014 - Balai Bendungan</a></div>
    </div><!--footer-->

    
</div><!--mainwrapper-->


</body>
</html>
