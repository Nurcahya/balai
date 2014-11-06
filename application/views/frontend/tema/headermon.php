<!DOCTYPE html>
<html lang="en">
  <head>
    <!--header("Cache-Control: no-cache, must-revalidate");-->
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Content-Type: application/xml; charset=utf-8");
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="600">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nurcahya Pradana">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/frontend/images/favicon.png">

    <title>MONITORING BALAI BENDUNGAN</title>
    <link href="<?php echo base_url();?>assets/frontend/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/js/bootstrap.slider/css/slider.css" />
    <link href="<?php echo base_url();?>assets/frontend/css/style.css" rel="stylesheet" />

  <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
})
</script>

<style>
.loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('<?php echo base_url();?>assets/img/page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
}
</style>
</head>
<body style="overflow-x:hidden;">
<div class="loader"></div>
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
	<?php echo strtoupper(" MONITORING KEAMANAN BENDUNGAN  $nama"); ?>
       <!-- <ul class="nav navbar-nav">
          <li><a href="<?php echo site_url();?>">Beranda</a></li>
          <li><a href="<?php echo site_url();?>tabel">Tabel</a></li>
          <li><a href="<?php echo site_url();?>peta">Peta</a></li>
          <li><a href="<?php echo site_url();?>admin/login">Administrator</a></li>
        </ul> -->
    			 <ul class="nav navbar-nav navbar-right user-nav">
      <li>
			<IFRAME SRC=<?php echo site_url('home/time');?> width=207 Height=60 frameborder=0></IFRAME>  
      </li>
    </ul>
      </div><!--/.nav-collapse animate-collapse -->
    </div>
  </div>
  
  

	<div id="cl-wrapper" class="fixed-menu">
		