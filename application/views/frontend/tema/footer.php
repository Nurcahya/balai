		
	</div>
	<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/behaviour/general.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script src="<?php echo base_url();?>assets/frontend/js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url();?>assets/frontend/js/jquery.select2/select2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/frontend/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
  

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
	
	var App = function () {

  var config = {//Basic Config
    tooltip: true,
    popover: true,
    nanoScroller: true,
    nestableLists: true,
    hiddenElements: true,
    bootstrapSwitch:true,
    dateTime:true,
    select2:true,
    tags:true,
    slider:true
  }; 
  
  var voice_methods = [];
  

$(function() {

    //cache a reference to the tabs
    var tabs = $('#tabs li');	
    var cont = $('#cont div');


    //on click to tab, turn it on, and turn previously-on tab off
    tabs.click(function() { $(this).addClass('active').siblings('.active').removeClass('active'); });
	cont.click(function() { $(this).addClass('active').siblings('.active').removeClass('active'); });

    //auto-rotate every 5 seconds
    setInterval(function() {

            //get currently-on tab
        var onTab = tabs.filter('.active');
	
        var onCon = cont.filter('.active');
            //click either next tab, if exists, else first one
        var nextTab = onTab.index() < tabs.length-1 ? onTab.next() : tabs.first();
        nextTab.click();
		var nextCon = onCon.index() < cont.length-2 ? onCon.next() : cont.first();
		
        nextCon.click();
    }, 5500);
	
});


  /*DASHBOARD*/
  var dashboard = function(){
    var skycons = new Skycons({"color": "#FFFFFF"});
    skycons.add($("#sun-icon")[0], Skycons.PARTLY_CLOUDY_DAY);
    skycons.play();

  
    /*Sparklines*/
    $(".spk1").sparkline([2,4,3,6,7,5,8,9,4,2,6,8,8,9,10], { type: 'bar', width: '80px', barColor: '#4A8CF7'});
    $(".spk2").sparkline([4,6,7,7,4,3,2,1,4,4 ,5,6,5], { type: 'discrete', width: '80', lineColor: '#4A8CF7',thresholdValue: 4,thresholdColor: '#ff0000'});
    
    $(".spk3").sparkline([5,6,7,9,9,5,3,2,2,4,6,7], {
    type: 'line',
    lineColor: '#258FEC',
    fillColor: '#4A8CF7',
    spotColor: false,
    width: '80px',
    minSpotColor: false,
    maxSpotColor: false,  
    highlightSpotColor: '#1e7ac6',
    highlightLineColor: '#1e7ac6'});

    /*Dashboard Charts*/
    if (!jQuery.plot) {
      return;
    }
    var data = [];
    var totalPoints = 250;
    // random data generator for plot charts

    function getRandomData() {
      if (data.length > 0) data = data.slice(1);
      // do a random walk
      while (data.length < totalPoints) {
      var prev = data.length > 0 ? data[data.length - 1] : 50;
      var y = prev + Math.random() * 10 - 5;
      if (y < 0) y = 0;
      if (y > 100) y = 100;
      data.push(y);
      }
      // zip the generated y values with the x values
      var res = [];
      for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
      return res;
    }

    function showTooltip(x, y, contents) {
      $("<div id='tooltip'>" + contents + "</div>").css({
        position: "absolute",
        display: "none",
        top: y + 5,
        left: x + 5,
        border: "1px solid #000",
        padding: "5px",
        'color':'#fff',
        'border-radius':'2px',
        'font-size':'11px',
        "background-color": "#000",
        opacity: 0.80
      }).appendTo("body").fadeIn(200);
    } 

    function randValue() {
      return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
    }

    var pageviews = [
    ["a", randValue()],
    ["b", randValue()],
    ["c", 2 + randValue()],
    ["d", 3 + randValue()],
    ["e", 5 + randValue()],
    ["f", 10 + randValue()],
    ["g", 15 + randValue()],
    ["h", 20 + randValue()],
    ["i", 25 + randValue()],
    ["j", 30 + randValue()]
    ];
    var visitors = [ ["Pos 1", 10], ["Pos 2", 8], ["Pos 3", 4], ["Pos 4", 13], ["Pos 5", 17], ["Pos 6", 9] ];

    if ($('#site_statistics').size() != 0) {
      $('#site_statistics_loading').hide();
      $('#site_statistics_content').show();
      var plot_statistics = $.plot($("#site_statistics"), [{
        data: pageviews,
        label: "TMA"
      }
      ], {
        series: {
          lines: {
            show: true,
            lineWidth: 2, 
            fill: true,
            fillColor: {
              colors: [{
                opacity: 0.2
              }, {
                opacity: 0.01
              }
              ]
            } 
          },
          points: {
            show: true
          },
          shadowSize: 2
        },
        legend:{
          show: false
        },
        grid: {
        labelMargin: 10,
           axisMargin: 500,
          hoverable: true,
          clickable: true,
          tickColor: "rgba(255,255,255,0.22)",
          borderWidth: 0
        },
        colors: ["#FFFFFF", "#4A8CF7", "#52e136"],
        xaxis: {
          mode: "categories",
				tickLength: 0
        },
        yaxis: {
          ticks: 5,
          tickDecimals: 0
        }
      });
      
	  var plot_statistics = $.plot($("#site_statistics3"), [{
        data: pageviews,
        label: "TMA"
      }
      ], {
        series: {
          lines: {
            show: true,
            lineWidth: 2, 
            fill: true,
            fillColor: {
              colors: [{
                opacity: 0.2
              }, {
                opacity: 0.01
              }
              ]
            } 
          },
          points: {
            show: true
          },
          shadowSize: 2
        },
        legend:{
          show: false
        },
        grid: {
        labelMargin: 10,
           axisMargin: 500,
          hoverable: true,
          clickable: true,
          tickColor: "rgba(255,255,255,0.22)",
          borderWidth: 0
        },
        colors: ["#FFFFFF", "#4A8CF7", "#52e136"],
        xaxis: {
          mode: "categories",
				tickLength: 0
        },
        yaxis: {
          ticks: 5,
          tickDecimals: 0
        }
      });
	  
      
      
      /*Pie Chart*/
      var data = [
      { label: "Google", data: 50},
      { label: "Dribbble", data: 7},
      { label: "Twitter", data: 8},
      { label: "Youtube", data: 9},
      { label: "Microsoft", data: 14},
      { label: "Apple", data: 13},
      { label: "Amazon", data: 10},
      { label: "Facebook", data: 5}
      ]; 

      /*COM Chart*/
      var data_com = [
        [1, randValue() - 5],
        [2, randValue() - 5],
        [3, randValue() - 5],
        [4, 6 + randValue()],
        [5, 6 + randValue()],
        [6, 6 + randValue()],
        [7, 5 + randValue()],
        [8, 3 + randValue()],
        [9, 2 + randValue()]
      ];
       var names = [
                    "Alpha",
                    "Beta",
                    "Gamma",
                    "Delta",
                    "Epsilon",
                    "Zeta",
                    "Eta",
                    "Theta"
                ];
      
      /*Bar charts widget*/
        var data3 = [
        [1, randValue()],
        [2, randValue()],
        [3, 2 + randValue()],
        [4, 3 + randValue()],
        [5, 5 + randValue()],
        [6, 10 + randValue()],
        [7, 15 + randValue()],
        [8, 20 + randValue()],
        [9, 20 + randValue()],
        [10, 20 + randValue()],
        [11, 20 + randValue()],
        [12, 20 + randValue()],
        [13, 20 + randValue()],
        [14, 20 + randValue()],
        [15, 20 + randValue()],
        [16, 75 + randValue()]
        ];

      
      var previousPoint = null;
      $("#site_statistics").bind("plothover", function (event, pos, item) {
      
        var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";

        if (item) {
          if (previousPoint != item.dataIndex) {
            previousPoint = item.dataIndex;
            $("#tooltip").remove();
            var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2);
            showTooltip(item.pageX, item.pageY,
									//item.series.data[x]);
									"tinggi muka air = "+y);
				
          }
        } else {
          $("#tooltip").remove();
          previousPoint = null;
        }
      }); 
      
	  $("#site_statistics3").bind("plothover", function (event, pos, item) {
      
        var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";

        if (item) {
          if (previousPoint != item.dataIndex) {
            previousPoint = item.dataIndex;
            $("#tooltip").remove();
            var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2);
            showTooltip(item.pageX, item.pageY,
									//item.series.data[x]);
									"tinggi muka air = "+y);
				
          }
        } else {
          $("#tooltip").remove();
          previousPoint = null;
        }
      }); 
	  

    }

    /*Jquery Easy Pie Chart*/
      $('.epie-chart').easyPieChart({
        barColor: '#FD9C35',
        trackColor: '#EFEFEF',
        lineWidth: 7,
        animate: 600,
        size: 103,
        onStep: function(val){//Update current value while animation
          $("span", this.$el).html(parseInt(val) + "%");
        }
        });

 
  };
  /*END OF DASHBOARD*/
  
  /*Nestable Lists*/
  var nestable = function(){
    $('.dd').nestable();
    //Watch for list changes and show serialized output
    function update_out(selector, sel2){
      var out = $(selector).nestable('serialize');
      $(sel2).html(window.JSON.stringify(out));
    }
    
    update_out('#list1',"#out1");
    update_out('#list2',"#out2");
    
    $('#list1').on('change', function() {
      update_out('#list1',"#out1");
    });
    
    $('#list2').on('change', function() {
      update_out('#list2',"#out2");
    });
  };//End of Nestable Lists
  
  
  /*Form Wizard*/
  var wizard = function(){
    //Fuel UX
    $('.wizard-ux').wizard();

    $('.wizard-ux').on('changed',function(){
      //delete $.fn.slider;
      $('.bslider').slider();
    });
    
    $(".wizard-next").click(function(e){
      var id = $(this).data("wizard");
      $(id).wizard('next');
      e.preventDefault();
    });
    
    $(".wizard-previous").click(function(e){
      var id = $(this).data("wizard");
      $(id).wizard('previous');
      e.preventDefault();
    });
  };//End of wizard
  
  /*Form Masks*/
  var masks = function(){
    $("[data-mask='date']").mask("99/99/9999");
    $("[data-mask='phone']").mask("(999) 999-9999");
    $("[data-mask='phone-ext']").mask("(999) 999-9999? x99999");
    $("[data-mask='phone-int']").mask("+33 999 999 999");
    $("[data-mask='taxid']").mask("99-9999999");
    $("[data-mask='ssn']").mask("999-99-9999");
    $("[data-mask='product-key']").mask("a*-999-a999");
    $("[data-mask='percent']").mask("99%");
    $("[data-mask='currency']").mask("$999,999,999.99");
  };//End of masks
  
  /*Data Tables*/
  var dataTables = function(){
  	//Basic Instance
    $("#datatable").dataTable();
    
    //Search input style
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
    $('.dataTables_length select').addClass('form-control');    
  };//End of dataTables

  /*Maps*/
  var maps = function(){
    //Basic Map
    var map;

    var mapOptions = {
      zoom: 14,
      center: new google.maps.LatLng(-33.877827, 151.188598),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map_one'), mapOptions);

  //Hybrid Map
    var map2;

    var mapOptions = {
      zoom: 14,
      center: new google.maps.LatLng(-33.877827, 151.188598),
      mapTypeId: google.maps.MapTypeId.HYBRID
    };
    map2 = new google.maps.Map(document.getElementById('map_two'), mapOptions);

   
   //Terrain Map
    var map3;

    var mapOptions = {
      zoom: 14,
      center: new google.maps.LatLng(-33.877827, 151.188598),
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };
    map3 = new google.maps.Map(document.getElementById('map_three'), mapOptions);

  };//End of maps
  
  
  /*Charts*/
  var charts = function(){
    if (!jQuery.plot) {
      return;
    }
    var data = [];
    var totalPoints = 250;
    // random data generator for plot charts

    function getRandomData() {
      if (data.length > 0) data = data.slice(1);
      // do a random walk
      while (data.length < totalPoints) {
      var prev = data.length > 0 ? data[data.length - 1] : 50;
      var y = prev + Math.random() * 10 - 5;
      if (y < 0) y = 0;
      if (y > 100) y = 100;
      data.push(y);
      }
      // zip the generated y values with the x values
      var res = [];
      for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
      return res;
    }

    function showTooltip(x, y, contents) {
      $("<div id='tooltip'>" + contents + "</div>").css({
        position: "absolute",
        display: "none",
        top: y + 5,
        left: x + 5,
        border: "1px solid #000",
        padding: "5px",
        'color':'#fff',
        'border-radius':'2px',
        'font-size':'11px',
        "background-color": "#000",
        opacity: 0.80
      }).appendTo("body").fadeIn(200);
    } 

    function randValue() {
      return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
    }

    var pageviews = [
    [1, randValue()],
    [2, randValue()],
    [3, 2 + randValue()],
    [4, 3 + randValue()],
    [5, 5 + randValue()],
    [6, 10 + randValue()],
    [7, 15 + randValue()],
    [8, 20 + randValue()],
    [9, 25 + randValue()],
    [10, 30 + randValue()],
    [11, 35 + randValue()],
    [12, 25 + randValue()],
    [13, 15 + randValue()],
    [14, 20 + randValue()],
    [15, 45 + randValue()],
    [16, 50 + randValue()],
    [17, 65 + randValue()],
    [18, 70 + randValue()],
    [19, 85 + randValue()],
    [20, 80 + randValue()],
    [21, 75 + randValue()],
    [22, 80 + randValue()],
    [23, 75 + randValue()]
    ];
    var visitors = [
    [1, randValue() - 5],
    [2, randValue() - 5],
    [3, randValue() - 5],
    [4, 6 + randValue()],
    [5, 5 + randValue()],
    [6, 20 + randValue()],
    [7, 25 + randValue()],
    [8, 36 + randValue()],
    [9, 26 + randValue()],
    [10, 38 + randValue()],
    [11, 39 + randValue()],
    [12, 50 + randValue()],
    [13, 51 + randValue()],
    [14, 12 + randValue()],
    [15, 13 + randValue()],
    [16, 14 + randValue()],
    [17, 15 + randValue()],
    [18, 15 + randValue()],
    [19, 16 + randValue()],
    [20, 17 + randValue()],
    [21, 18 + randValue()],
    [22, 19 + randValue()],
    [23, 20 + randValue()],
    [24, 21 + randValue()],
    [25, 14 + randValue()],
    [26, 24 + randValue()],
    [27, 25 + randValue()],
    [28, 26 + randValue()],
    [29, 27 + randValue()],
    [30, 31 + randValue()]
    ];

  
    /*Jquery Easy Pie Chart*/
      $('.epie-chart').easyPieChart({
        lineWidth: 8,
        animate: 600,
        size: 150,
        onStep: function(val){//Update current value while animation
          $("span", this.$el).html(parseInt(val) + "%");
        }
        });
      
  };//End of charts
  
  /*Widgets*/
  var widgets = function(){
    var skycons = new Skycons({"color": "#FFFFFF"});
    skycons.add($("#sun-icon")[0], Skycons.PARTLY_CLOUDY_DAY);
    skycons.play();
    
  };//End of widgets
  
  
  /*Speech Recognition*/
  var speech_commands = [];
  if(('webkitSpeechRecognition' in window)){
    var rec = new webkitSpeechRecognition();  
  }
  
  var speech = function(options){
   
    if(('webkitSpeechRecognition' in window)){
    
      if(options=="start"){
        rec.start();
      }else if(options=="stop"){
        rec.stop();
      }else{
        var config = {
          continuous: true,
          interim: true,
          lang: false,
          onEnd: false,
          onResult: false,
          onNoMatch: false,
          onSpeechStart: false,
          onSpeechEnd: false
        };
        $.extend( config, options );
        
        if(config.continuous){rec.continuous = true;}
        if(config.interim){rec.interimResults = true;}
        if(config.lang){rec.lang = config.lang;}        
        var values = false;
        var val_command = "";
        
        rec.onresult = function(event){
          for (var i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
              var command = event.results[i][0].transcript;//Return the voice command
              command = command.toLowerCase();//Lowercase
              command = command.replace(/^\s+|\s+$/g,'');//Trim spaces
              console.log(command);
              if(config.onResult){
                config.onResult(command);
              }   
              
              $.each(speech_commands,function(i, v){
                if(values){//Second command
                  if(val_command == v.command){
                    if(v.dictation){
                      if(command == v.dictationEndCommand){
                        values = false;
                        v.dictationEnd(command);
                      }else{
                        v.listen(command);
                      }
                    }else{
                      values = false;
                      v.listen(command);
                    }
                  }
                }else{//Primary command
                  if(v.command == command){
                    v.action(command);
                    if(v.listen){
                      values = true;
                      val_command = v.command;
                    }
                  }
                }
              });
            }else{
              var res = event.results[i][0].transcript;//Return the interim results
              $.each(speech_commands,function(i, v){
                if(v.interim !== false){
                  if(values){                
                    if(val_command == v.command){
                      v.interim(res);
                    }
                  }
                }
              });
            }
          }
        };      
        
        
        if(config.onNoMatch){rec.onnomatch = function(){config.onNoMatch();};}
        if(config.onSpeechStart){rec.onspeechstart = function(){config.onSpeechStart();};}
        if(config.onSpeechEnd){rec.onspeechend = function(){config.onSpeechEnd();};}
        rec.onaudiostart = function(){ $(".speech-button i").addClass("blur"); }
        rec.onend = function(){
          $(".speech-button i").removeClass("blur");
          if(config.onEnd){config.onEnd();}
        };
        
        
      }    
      
    }else{ 
      alert("Only Chrome25+ browser support voice recognition.");
    }
   
    
  };
  
  var speechCommand = function(command, options){
    var config = {
      action: false,
      dictation: false,
      interim: false,
      dictationEnd: false,
      dictationEndCommand: 'final.',
      listen: false
    };
    
    $.extend( config, options );
    if(command){
      if(config.action){
        speech_commands.push({
          command: command, 
          dictation: config.dictation,
          dictationEnd: config.dictationEnd,
          dictationEndCommand: config.dictationEndCommand,
          interim: config.interim,
          action: config.action, 
          listen: config.listen 
        });
      }else{
        alert("Must have an action function");
      }
    }else{
      alert("Must have a command text");
    }
  };
  
      function toggleSideBar(_this){
        var b = $("#sidebar-collapse")[0];
        var w = $("#cl-wrapper");
        var s = $(".cl-sidebar");
        
        if(w.hasClass("sb-collapsed")){
          $(".fa",b).addClass("fa-angle-left").removeClass("fa-angle-right");
          w.removeClass("sb-collapsed");
        }else{
          $(".fa",b).removeClass("fa-angle-left").addClass("fa-angle-right");
          w.addClass("sb-collapsed");
        }
        //updateHeight();
      }
      
      function updateHeight(){
        if(!$("#cl-wrapper").hasClass("fixed-menu")){
          var button = $("#cl-wrapper .collapse-button").outerHeight();
          var navH = $("#head-nav").height();
          //var document = $(document).height();
          var cont = $("#pcont").height();
          var sidebar = ($(window).width() > 755 && $(window).width() < 963)?0:$("#cl-wrapper .menu-space .content").height();
          var windowH = $(window).height();
          
          if(sidebar < windowH && cont < windowH){
            if(($(window).width() > 755 && $(window).width() < 963)){
              var height = windowH;
            }else{
              var height = windowH - button - navH;
            }
          }else if((sidebar < cont && sidebar > windowH) || (sidebar < windowH && sidebar < cont)){
            var height = cont + button + navH;
          }else if(sidebar > windowH && sidebar > cont){
            var height = sidebar + button;
          }  
          
          // var height = ($("#pcont").height() < $(window).height())?$(window).height():$(document).height();
          $("#cl-wrapper .menu-space").css("min-height",height);
        }else{
          $("#cl-wrapper .nscroller").nanoScroller({ preventPageScrolling: true });
        }
      }
        
  return {
   
    init: function (options) {
      //Extends basic config with options
      $.extend( config, options );
      
      /*VERTICAL MENU*/
      $(".cl-vnavigation li ul").each(function(){
        $(this).parent().addClass("parent");
      });
      
      $(".cl-vnavigation li ul li.active").each(function(){
        $(this).parent().show().parent().addClass("open");
        //setTimeout(function(){updateHeight();},200);
      });
      
      $(".cl-vnavigation").delegate(".parent > a","click",function(e){
        $(".cl-vnavigation .parent.open > ul").not($(this).parent().find("ul")).slideUp(300, 'swing',function(){
           $(this).parent().removeClass("open");
        });
        
        var ul = $(this).parent().find("ul");
        ul.slideToggle(300, 'swing', function () {
          var p = $(this).parent();
          if(p.hasClass("open")){
            p.removeClass("open");
          }else{
            p.addClass("open");
          }
          //var menuH = $("#cl-wrapper .menu-space .content").height();
          // var height = ($(document).height() < $(window).height())?$(window).height():menuH;
          //updateHeight();
         $("#cl-wrapper .nscroller").nanoScroller({ preventPageScrolling: true });
        });
        e.preventDefault();
      });
      
      /*Small devices toggle*/
      $(".cl-toggle").click(function(e){
        var ul = $(".cl-vnavigation");
        ul.slideToggle(300, 'swing', function () {
        });
        e.preventDefault();
      });
      
      /*Collapse sidebar*/
      $("#sidebar-collapse").click(function(){
          toggleSideBar();
      });
      
      
      if($("#cl-wrapper").hasClass("fixed-menu")){
        var scroll =  $("#cl-wrapper .menu-space");
        scroll.addClass("nano nscroller");
 
        function update_height(){
          var button = $("#cl-wrapper .collapse-button");
          var collapseH = button.outerHeight();
          var navH = $("#head-nav").height();
          var height = $(window).height() - ((button.is(":visible"))?collapseH:0) - navH;
          scroll.css("height",height);
          $("#cl-wrapper .nscroller").nanoScroller({ preventPageScrolling: true });
        }
        
        $(window).resize(function() {
          update_height();
        });    
            
        update_height();
        $("#cl-wrapper .nscroller").nanoScroller({ preventPageScrolling: true });
        
      }else{
        $(window).resize(function(){
          //updateHeight();
        }); 
        //updateHeight();
      }

      
      /*SubMenu hover */
        var tool = $("<div id='sub-menu-nav' style='position:fixed;z-index:9999;'></div>");
        
        function showMenu(_this, e){
          if(($("#cl-wrapper").hasClass("sb-collapsed") || ($(window).width() > 755 && $(window).width() < 963)) && $("ul",_this).length > 0){   
            $(_this).removeClass("ocult");
            var menu = $("ul",_this);
            if(!$(".dropdown-header",_this).length){
              var head = '<li class="dropdown-header">' +  $(_this).children().html()  + "</li>" ;
              menu.prepend(head);
            }
            
            tool.appendTo("body");
            var top = ($(_this).offset().top + 8) - $(window).scrollTop();
            var left = $(_this).width();
            
            tool.css({
              'top': top,
              'left': left + 8
            });
            tool.html('<ul class="sub-menu">' + menu.html() + '</ul>');
            tool.show();
            
            menu.css('top', top);
          }else{
            tool.hide();
          }
        }

        $(".cl-vnavigation li").hover(function(e){
          showMenu(this, e);
        },function(e){
          tool.removeClass("over");
          setTimeout(function(){
            if(!tool.hasClass("over") && !$(".cl-vnavigation li:hover").length > 0){
              tool.hide();
            }
          },500);
        });
        
        tool.hover(function(e){
          $(this).addClass("over");
        },function(){
          $(this).removeClass("over");
          tool.fadeOut("fast");
        });
        
        
        $(document).click(function(){
          tool.hide();
        });
        $(document).on('touchstart click', function(e){
          tool.fadeOut("fast");
        });
        
        tool.click(function(e){
          e.stopPropagation();
        });
     
        $(".cl-vnavigation li").click(function(e){
          if((($("#cl-wrapper").hasClass("sb-collapsed") || ($(window).width() > 755 && $(window).width() < 963)) && $("ul",this).length > 0) && !($(window).width() < 755)){
            showMenu(this, e);
            e.stopPropagation();
          }
        });
        
        $(".cl-vnavigation li").on('touchstart click', function(){
          //alert($(window).width());
        });
        
      $(window).resize(function(){
        //updateHeight();
      });

      var domh = $("#pcont").height();
      $(document).bind('DOMSubtreeModified', function(){
        var h = $("#pcont").height();
        if(domh != h) {
          //updateHeight();
        }
      });
      
      /*Return to top*/
      var offset = 220;
      var duration = 500;
      var button = $('<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>');
      button.appendTo("body");
      
      jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
      });
    
      jQuery('.back-to-top').click(function(event) {
          event.preventDefault();
          jQuery('html, body').animate({scrollTop: 0}, duration);
          return false;
      });
      
      /*Datepicker UI*/
      $( ".ui-datepicker" ).datepicker();
      
      /*Tooltips*/
      if(config.tooltip){
        $('.ttip, [data-toggle="tooltip"]').tooltip();
      }
      
      /*Popover*/
      if(config.popover){
        $('[data-popover="popover"]').popover();
      }

      /*NanoScroller*/      
      if(config.nanoScroller){
        $(".nscroller").nanoScroller();     
      }
      
      /*Nestable Lists*/
      if(config.nestableLists){
        $('.dd').nestable();
      }
      
      /*Switch*/
      if(config.bootstrapSwitch){
        $('.switch').bootstrapSwitch();
      }
      
      /*DateTime Picker*/
      if(config.dateTime){
        $(".datetime").datetimepicker({autoclose: true});
      }
      
      /*Select2*/
      if(config.select2){
         $(".select2").select2({
          width: '100%'
         });
      }
      
       /*Tags*/
      if(config.tags){
        $(".tags").select2({tags: 0,width: '100%'});
      }
      
       /*Slider*/
      if(config.slider){
        $('.bslider').slider();     
      }
      
      /*Input & Radio Buttons*/
      if(jQuery().iCheck){
        $('.icheck').iCheck({
          checkboxClass: 'icheckbox_square-blue checkbox',
          radioClass: 'iradio_square-blue'
        });
      }
      
      /*Bind plugins on hidden elements*/
      if(config.hiddenElements){
      	/*Dropdown shown event*/
        $('.dropdown').on('shown.bs.dropdown', function () {
          $(".nscroller").nanoScroller();
        });
          
        /*Tabs refresh hidden elements*/
        $('.nav-tabs').on('shown.bs.tab', function (e) {
          $(".nscroller").nanoScroller();
        });
      }
      
    },
      
    /*Pages Javascript Methods*/
    dashBoard: function (){
      dashboard();
    },
    
    speech: function(options){
      speech(options);
    },
    
    speechCommand: function(com, options){
      speechCommand(com, options);
    },
    
    toggleSideBar: function(){
      toggleSideBar();
    },
    
    nestableLists: function(){
      nestable();
    },
 
    wizard: function(){
      wizard();
    },
    
    masks: function(){
      masks();
    },
    
    textEditor: function(){
      textEditor();
    },
    
    dataTables: function(){
      dataTables();
    },
    
    maps: function(){
      maps();
    },
    
    charts: function(){
      charts();
    },
    
    widgets: function(){
      widgets();
    }
    
  };
 
}();

$(function(){
  //$("body").animate({opacity:1,'margin-left':0},500);
  $("body").css({opacity:1,'margin-left':0});
});
	
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dashBoard();    

      });
    </script>
  <script src="<?php echo base_url();?>assets/frontend/js/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>