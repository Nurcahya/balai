<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <?php foreach ($tma->result() as $tma) { $TMA =  $tma->TMA; } ?>
 <script src="<?php echo base_url();?>assets/js/jquery.js" type='text/javascript'></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.time.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.threshold.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.threshold.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.axislabel.js"></script>

<!-- CSS -->
<style type="text/css">
#flotcontainer {
width: 220px;
height: 196px;
text-align: center;
margin: -10px 0px 0px 58px;
float: left;
}
#flotcontainer2 {
width: 220px;
height: 30px;
text-align: center;
margin: 5px 0px 0px 58px;
float: left;
}
img {
    margin: 10px 0 0 0px;
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
        max: <?php echo $HWL;?>,        
        tickSize: (<?php echo $HWL;?> - <?php echo $LWL;?>)/10,
        tickFormatter: function (v, axis) {
           
                return "";
          
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
        { label: "", data: data,  color: "#5482FF"}
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
<script>
var data2 = [];
var dataset2;
var totalPoints = 1;
var updateInterval2 = 300000;
var now = new Date().getTime();
var options2 = {
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
        min: <?php echo $HWL;?>,
        max: <?php echo $crest;?>,        
        tickSize:<?php echo $crest;?>-<?php echo $HWL;?>,
        tickFormatter: function (v, axis) {
           
                return "";
          
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

    function GetData2() {
    data2.shift();

    while (data2.length < totalPoints) {     
        var y = <?php echo $TMA; ?>;
        var temp2 = [now += updateInterval2, y];

        data2.push(temp2);
    }
}

    GetData2();

    dataset2 = [
        { label: "", data: data2,  color: "#ff0000"}
    ];

    $.plot($("#flotcontainer2"), dataset2, options2);

    function update2() {
        GetData2();

        $.plot($("#flotcontainer2"), dataset2, options2)
        setTimeout(update2, updateInterval2);
    }

    update();
});



</script>
 </head>
<body style="overflow-x:hidden;">
<!-- HTML -->
<?php if ($id_pos == '1') { ?>
<img src ="<?php echo base_url();?>assets/frontend/images/TMA1.png">
<?php } else if ($id_pos == '2') { ?>
<img src ="<?php echo base_url();?>assets/frontend/images/TMA2.png">
<?php } else if ($id_pos == '3') { ?>
<img src ="<?php echo base_url();?>assets/frontend/images/TMA3.png">
<?php } else if ($id_pos == '4') { ?>
<img src ="<?php echo base_url();?>assets/frontend/images/TMA4.png">
<?php } else if ($id_pos == '5') { ?>
<img src ="<?php echo base_url();?>assets/frontend/images/TMA5.png">
<?php } ?>

<div id="flotcontainer2" ></div>
<div id="flotcontainer" ></div>
</div>

</body>
</html>