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
                    
                    <thead>
                            <tr>
                                <th width="50%">Nama File</th>
                                <th>Tanggal</th>
                                <th class="center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
                        foreach ($ekspor->result() as $ekspor) { 
                        $tanggal = substr($ekspor->log,0,10);
                        ?>
                            <tr>
                                <td>data_pos_<?php echo $ekspor->id_pos;?>_<?php echo $tanggal;?></td>
                                <td><?php echo $tanggal;?></td>
                                <td class="center"><a href="<?php echo base_url('admin/grafik/exporttabelpos');?>/<?php echo $this->uri->segment(4)."/".$tanggal ; ?>" class="btn"><span class="icon-edit"></span> Ekspor</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>


</body>
</html>
