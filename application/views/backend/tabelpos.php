<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Katniss Premium Admin Template</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>
</head>

<body>

            	 <table class="table table-bordered" id="dyntable">
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


</body>
</html>
