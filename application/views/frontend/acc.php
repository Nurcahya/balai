<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js" type='text/javascript'></script> 
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="http://static.pureexample.com/js/flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flot.time.js"></script>    
<script type="text/javascript" src="http://static.pureexample.com/js/flot/jquery.flot.axislabels.js"></script>
 
<!-- CSS -->
<style type="text/css">
#flotcontainer {
    overflow-x:hidden;
    overflow-y:hidden;
    width: 850px;
    height: 100px;
    text-align: center;
    margin: 0 auto;
float: left;
}
</style>
 
 
<!-- Javascript -->
<script>
var data = [];
var dataset;
var totalPoints = 50;
var updateInterval = 1000;
var now = new Date().getTime();
 
 
function GetData() {
    data.shift();
 
    while (data.length < totalPoints) {     
        var y = Math.random() * 50;
        var temp = [now += updateInterval, y];
 
        data.push(temp);
    }
}
 
var options = {
    series: {
        lines: {
            show: true,
            lineWidth: 2,
            fill: false
        }
    },
    xaxis: {
        mode: "time",
        tickSize: [2, "second"],
        tickFormatter: function (v, axis) {
            var date = new Date(v);
                if (date.getSeconds() % 20 == 0) {
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
        min: -50,
        max: 50,        
        tickSize: 0,
        tickFormatter: function (v, axis) {
            if (v % 50 == 0) {
                return v ;
            } else {
                return "";
            }
        },
        axisLabel: " ",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 6
    },
    legend: {        
        labelBoxBorderColor: "#fff"
    },
    grid: {
        hoverable: true,
        borderWidth: 2,        
        backgroundColor: { colors: ["#EDF5FF", "#ffffff"] }
    }
};
 
$(document).ready(function () {
    GetData();
 
    dataset = [
        { label: "data1", data: data, color: "blue" }
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
 </head>
<body style="overflow-x:hidden;overflow-y:hidden;">

<div id="flotcontainer"></div>

</body>
</html>