<?php
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=laporan_TMA_".$tgl.".xls");
if ($id==1) $nama="WADUK JATI BARANG";
else if ($id==2) $nama="WADUK SEMPOR";
else if ($id==3) $nama="WADUK WADAS LINTANG";
else if ($id==4) $nama="WADUK SERMO";
else if ($id==5) $nama="WADUK BATU TEGI";
$title="LAPORAN TINGGI MUKA AIR BENDUNGAN ".$nama." ".$tgl;
?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th colspan="4">
            <?php echo $title;?>
        </th>
    </table>
			<table border="1">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>Tinggi Muka Air</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Update</th>
                                            </tr>
                                        </thead>
                    <tbody>
                       <?php 
											//$arraylog = array();
											//$n = 0;
											$tmanow = 0;
											foreach ($log->result() as $log){ ?>
                                            <tr >
                                                <td><?php echo $log->id_log; ?></a></td>
												<td><?php echo $log->TMA; ?> Meter</td>
												<td><?php 
														$selisih = $log->TMA - $tmanow; 
														echo $selisih;
														?> Meter</td>
												<td><?php echo $log->log; ?></td>
												<?php
												//$arraylog[$n][0] = $log->log;
												//$arraylog[$n][1] = $log->TMA;
												//$n = $n +1;
												$tmanow = $log->TMA;
												?>
                                            </tr>
											<?php } ?>
											
                    </tbody>
                </table>
