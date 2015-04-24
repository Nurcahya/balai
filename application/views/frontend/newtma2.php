
 <?php foreach ($tma->result() as $tma) { $TMA =  $tma->TMA; } ?>
 <script src="http://www.flotcharts.org/flot/jquery.js" type='text/javascript'></script> 
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="http://static.pureexample.com/js/flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.time.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.threshold.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.threshold.min.js"></script>
<script type="text/javascript" src="http://static.pureexample.com/js/flot/jquery.flot.axislabels.js"></script>

<!-- CSS -->
<style type="text/css">
#flotcontainer {
width: 700px;
height: 257px;
text-align: center;
margin: 0 0 0 0px;
float: left;
}
img {
    margin: 10px 0 0 61px;
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: 1;
}
</style>

<!-- Javascript -->
<script>
var data = [];
var dataset;
var totalPoints = 1;
var updateInterval = 300000;
var now = new Date().getTime();
var options = {
    series: {
        bars: {
            show: true,
            lineWidth: 1.2,
            fill: true,
        }
    },
        xaxis: {
        mode: "time",
        tickSize: [2, "second"],
        tickFormatter: function (v, axis) {
            var date = new Date(v);

            if (date.getSeconds() % 60 == 0) {
                var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                return hours + ":" + minutes + ":" + seconds;
            } else {
                return "";
            }
        },
        axisLabel: "",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10
    },
    yaxis: {
        min: <?php echo $LWL;?>,
        max: <?php echo $crest;?>,        
        tickSize: (<?php echo $HWL;?> - <?php echo $LWL;?>)/10,
        tickFormatter: function (v, axis) {
           
                return parseFloat(v).toFixed(2) + "m";
          
        },
        axisLabel: " ",
        tickLength: 0,
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 6
    },
    legend: {        
        labelBoxBorderColor: "#fff"
    },
    grid: {
        borderWidth: 0
    },
};

$(document).ready(function () {

    function GetData() {
    data.shift();

    while (data.length < totalPoints) {     
        var y = <?php echo $TMA; ?>;
        var temp = [now += updateInterval, y];

        data.push(temp);
    }
}

    GetData();

    dataset = [
        { label: "", data: data,  color: "#ff0000",  threshold: {below: <?php echo $HWL;?>, color: "#5482FF"} }
    ];

    $.plot($("#flotcontainer"), dataset, options);

    function update() {
        GetData();

        $.plot($("#flotcontainer"), dataset, options)
        setTimeout(update, updateInterval);
    }

    update();
});



</script>
<!-- HTML -->
<?php if ($id_pos == '1') { ?>
<div >

<img src ="<?php echo base_url();?>assets/frontend/images/TMA.png">

<?php } else if ($id_pos == '2') { ?>
<div style="background:url('<?php echo base_url();?>assets/frontend/images/btma2.png'); z-index: 5; width:360; height:350;" >
<?php } else if ($id_pos == '3') { ?>
<div style="background:url('<?php echo base_url();?>assets/frontend/images/btma3.png'); z-index: 5; width:360; height:350;" >
<?php } else if ($id_pos == '4') { ?>
<div style="background:url('<?php echo base_url();?>assets/frontend/images/btma4.png'); z-index: 5; width:360; height:350;" >
<?php } else if ($id_pos == '5') { ?>
<div style="background:url('<?php echo base_url();?>assets/frontend/images/btma5.png'); z-index: 5; width:360; height:350;" >
<?php } ?>




<div id="flotcontainer" ></div>
</div>