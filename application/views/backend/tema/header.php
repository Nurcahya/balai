
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ADMINISTRATOR MONITORING BALAI BENDUNGAN</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/prettify/prettify.css" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/star.png">
<script type="text/javascript" src="<?php echo base_url();?>assets/prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.categories.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.time.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/chart.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<div class="mainwrapper fullwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="<?php echo site_url();?>admin/main"><span class="iconfa-logo"><img src="<?php echo base_url();?>assets/img/pu.jpg" width="110%"></span>Administrator Balai Bendungan<span></span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget"><?php  echo date('l', strtotime(date("d M y"))); echo ", ". date("d M y"); ?></div>
    
    	<div class="searchwidget">
        	<font color="WHITE"><marquee direction="left" style="border:#235688 2px SOLID; background:#3B6998">
			 <?php foreach ($runtext->result() as $rt){
			$text = str_replace('<p>','',$rt->runtext);
			$textbaru = str_replace('</p>','  -  ',$text);
			echo $textbaru;
			}
			?>
			</marquee></font>
             
        </div><!--searchwidget-->

        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigasi</li>
                <li <?php if ($current =="main"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/main"><span class="icon-align-justify"></span> Beranda</a></li>
                

                <!-- grafik TMA -->
                <?php if ($this->session->userdata('username_operator')=='jatiluhur'){ ?>
                <li <?php if ($current == "grafik"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/grafik/pos/1"><span class="icon-signal"></span> History Tinggi Muka Air</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sempor'){ ?>
                <li <?php if ($current == "grafik"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/grafik/pos/2"><span class="icon-signal"></span> History Tinggi Muka Air</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='kedungombo'){ ?>
                <li <?php if ($current == "grafik"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/grafik/pos/3"><span class="icon-signal"></span> History Tinggi Muka Air</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sermo'){ ?>
                <li <?php if ($current == "grafik"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/grafik/pos/4"><span class="icon-signal"></span> History Tinggi Muka Air</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='batutegi'){ ?>
                <li <?php if ($current == "grafik"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/grafik/pos/5"><span class="icon-signal"></span> History Tinggi Muka Air</a></li>
                <?php } else { ?>
                <li <?php if ($current == "grafik"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/grafik/pos/1"><span class="icon-signal"></span> History Tinggi Muka Air</a></li>
                <?php } ?>

                <!-- history curah hujan -->
                <?php if ($this->session->userdata('username_operator')=='jatiluhur'){ ?>
                <li <?php if ($current == "curahhujan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/curahhujan?id=1"><span class="icon-signal"></span> History Curah Hujan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sempor'){ ?>
                <li <?php if ($current == "curahhujan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/curahhujan?id=2"><span class="icon-signal"></span> History Curah Hujan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='kedungombo'){ ?>
                <li <?php if ($current == "curahhujan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/curahhujan?id=3"><span class="icon-signal"></span> History Curah Hujan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sermo'){ ?>
                <li <?php if ($current == "curahhujan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/curahhujan?id=4"><span class="icon-signal"></span> History Curah Hujan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='batutegi'){ ?>
                <li <?php if ($current == "curahhujan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/curahhujan?id=5"><span class="icon-signal"></span> History Curah Hujan</a></li>
                <?php } else { ?>
                <li <?php if ($current == "curahhujan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/curahhujan?id=1"><span class="icon-signal"></span> History Curah Hujan</a></li>
                <?php } ?>

                <!-- history vnotch -->
                <?php if ($this->session->userdata('username_operator')=='jatiluhur'){ ?>
                <li <?php if ($current == "vnotchhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/vnotchhis?id=1"><span class="icon-signal"></span> History Seepage</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sempor'){ ?>
                <li <?php if ($current == "vnotchhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/vnotchhis?id=2"><span class="icon-signal"></span> History Seepage</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='kedungombo'){ ?>
                <li <?php if ($current == "vnotchhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/vnotchhis?id=3"><span class="icon-signal"></span> History Seepage</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sermo'){ ?>
                <li <?php if ($current == "vnotchhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/vnotchhis?id=4"><span class="icon-signal"></span> History Seepage</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='batutegi'){ ?>
                <li <?php if ($current == "vnotchhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/vnotchhis?id=5"><span class="icon-signal"></span> History Seepage</a></li>
                <?php } else { ?>
                <li <?php if ($current == "vnotchhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/vnotchhis?id=1"><span class="icon-signal"></span> History Seepage</a></li>
                <?php } ?>
                <!-- history TAP -->
                <?php if ($this->session->userdata('username_operator')=='jatiluhur'){ ?>
                <li <?php if ($current == "tap"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/tap?id=1"><span class="icon-signal"></span> History Vibrating Wire</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sempor'){ ?>
                <li <?php if ($current == "tap"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/tap?id=2"><span class="icon-signal"></span> History Vibrating Wire</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='kedungombo'){ ?>
                <li <?php if ($current == "tap"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/tap?id=3"><span class="icon-signal"></span> History Vibrating Wire</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sermo'){ ?>
                <li <?php if ($current == "tap"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/tap?id=4"><span class="icon-signal"></span> History Vibrating Wire</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='batutegi'){ ?>
                <li <?php if ($current == "tap"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/tap?id=5"><span class="icon-signal"></span> History Vibrating Wire<a></li>
                <?php } else { ?>
                <li <?php if ($current == "tap"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/tap?id=0"><span class="icon-signal"></span> History Vibrating Wire</a></li>
                <?php } ?>

                <!-- citra -->
                <?php if ($this->session->userdata('username_operator')=='jatiluhur'){ ?>
                <li <?php if ($current == "citra"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/citra?id=1"><span class="icon-signal"></span> History Citra CCTV</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sempor'){ ?>
                <li <?php if ($current == "citra"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/citra?id=2"><span class="icon-signal"></span> History Citra CCTV</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='kedungombo'){ ?>
                <li <?php if ($current == "citra"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/citra?id=3"><span class="icon-signal"></span> History Citra CCTV</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sermo'){ ?>
                <li <?php if ($current == "citra"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/citra?id=4"><span class="icon-signal"></span> History Citra CCTV</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='batutegi'){ ?>
                <li <?php if ($current == "citra"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/citra?id=5"><span class="icon-signal"></span> History Citra CCTV</a></li>
                <?php } else { ?>
                <li <?php if ($current == "citra"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/citra?id=0"><span class="icon-signal"></span> History Citra CCTV</a></li>
                <?php } ?>

                <!-- history sensor -->
                <?php if ($this->session->userdata('username_operator')=='jatiluhur'){ ?>
                <li <?php if ($current == "sensorhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/sensorhis?id=1"><span class="icon-signal"></span> History Sensor</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sempor'){ ?>
                <li <?php if ($current == "sensorhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/sensorhis?id=2"><span class="icon-signal"></span> History Sensor</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='kedungombo'){ ?>
                <li <?php if ($current == "sensorhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/sensorhis?id=3"><span class="icon-signal"></span> History Sensor</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sermo'){ ?>
                <li <?php if ($current == "sensorhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/sensorhis?id=4"><span class="icon-signal"></span> History Sensor</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='batutegi'){ ?>
                <li <?php if ($current == "sensorhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/sensorhis?id=5"><span class="icon-signal"></span> History Sensor</a></li>
                <?php } else { ?>
                <li <?php if ($current == "sensorhis"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/sensorhis?id=0"><span class="icon-signal"></span> History Sensor</a></li>
                <?php } ?>

                <!-- pesan  -->
                <?php if ($this->session->userdata('username_operator')=='jatiluhur'){ ?>
                <li <?php if ($current == "pesan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/pesan?id=1"><span class="icon-envelope"></span> Pesan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sempor'){ ?>
                <li <?php if ($current == "pesan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/pesan?id=2"><span class="icon-envelope"></span> Pesan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='kedungombo'){ ?>
                <li <?php if ($current == "pesan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/pesan?id=3"><span class="icon-envelope"></span> Pesan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='sermo'){ ?>
                <li <?php if ($current == "pesan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/pesan?id=4"><span class="icon-envelope"></span> Pesan</a></li>
                <?php } else if ($this->session->userdata('username_operator')=='batutegi'){ ?>
                <li <?php if ($current == "pesan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/pesan?id=5"><span class="icon-envelope"></span> Pesanr</a></li>
                <?php } else { ?>
                <li <?php if ($current == "pesan"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/pesan?id=1"><span class="icon-envelope"></span> Pesan</a></li>
                <?php } ?>

                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current =="pos"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/pos"><span class="icon-home"></span> Pos </a></li>
                <?php } ?>
                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current == "logger"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/logger"><span class="icon-tasks"></span> Logger</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current == "sensor"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/sensor"><span class="icon-tasks"></span> Sensor</a></li>
                <?php } ?>
                 <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current == "ftpcitra"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/ftpcitra"><span class="icon-tasks"></span> Backup FTP Citra</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current == "ftvwp"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/ftpvw"><span class="icon-tasks"></span> Backup FTP Vibrating Wire</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current == "rumus"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/rumus"><span class="icon-tasks"></span> Olah Rumus</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current == "user"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/user"><span class="icon-user"></span> User</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current == "agen"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/agen"><span class="icon-envelope"></span> Agen</a></li>
                 <?php } ?>
                <?php if ($this->session->userdata('hak_akses')==0){ ?>
                <li <?php if ($current =="runtext"){ ?>class="active" <?php } ?>><a href="<?php echo site_url();?>admin/runtext"><span class="icon-share"></span> Running Text</a></li>
                 <?php } ?>
             </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
		    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
            
            <div class="headerright">
                           
    			<div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Selamat datang, <?php echo $this->session->userdata('username_operator'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="editprofile.html"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href=""><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href=""><span class="icon-eye-open"></span> Privacy Settings</a></li>
                        <li class="divider"></li>-->
                        <li><a href="<?php echo site_url();?>admin/login/logout"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->