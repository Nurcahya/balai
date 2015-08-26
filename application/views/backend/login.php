<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/star.png">
	<title>ADMINISTRATOR MONITORING BALAI BENDUNGAN</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.default.css" />  
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-migrate-1.1.1.min.js"></script>
</head>

<body class="loginbody">

<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-pu"><img src="<?php echo base_url();?>assets/img/pu.jpg"></span> Log In <span class="subtitle">Selamat Datang di Halaman Administator</span></h1>
        <div class="loginwrapperinner">
            <form id="loginform" action="login/ceklogin" method="post">
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Submit</button></p>
                <p class="animate7 fadeIn"><span class="icon-question-sign icon-white"></span> Adminitrator Monitoring Balai Bendungan @ 2014</p>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.loginwrap').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	
	jQuery('#username,#password').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	jQuery('#loginform button').click(function(){
		if(!jQuery.browser.msie) {
			if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
				if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
				if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
				jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
					jQuery(this).removeClass('animate0 wobble');
				});
			} else {
				jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
					jQuery('#loginform').submit();
				});
			}
			return false;
		}
	});
});
</script>
</body>
</html>



<?php $sesi = array(	'flag' 	=> '0');
			$this->session->set_userdata($sesi);
			?>

