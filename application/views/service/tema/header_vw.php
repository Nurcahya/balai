<!DOCTYPE html>
<html lang="en">
  <head>  
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="21600">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nurcahya Pradana">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/frontend/images/favicon.png">

    <title>MONITORING BALAI BENDUNGAN</title>
  <link href="<?php echo base_url();?>assets/frontend/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/fonts/font-awesome-4/css/font-awesome.min.css">
  <link href="<?php echo base_url();?>assets/frontend/css/style.css" rel="stylesheet" />

</head>
<body>

  <!-- Fixed navbar -->
   <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-gear"></span>
        </button>
        <a class="navbar-brand" href="#"><span>Balai Bendungan Ditjen SDA</span></a>
      </div>
      <div class="navbar-collapse collapse">
	  MONITORING KEAMANAN BALAI BENDUNGAN
    			 <ul class="nav navbar-nav navbar-right user-nav">
      <li>
			<IFRAME SRC=<?php echo base_url('home/time');?> width=157 Height=55 frameborder=0></IFRAME>  
      </li>
    </ul>
      </div><!--/.nav-collapse animate-collapse -->
    </div>
  </div>
  
  

	<div id="cl-wrapper" class="fixed-menu">
		