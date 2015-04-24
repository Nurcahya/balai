<!DOCTYPE html>
<html>
  <head>
    <title>LIST SENSOR AKTIF</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="<?php echo base_url();?>assets/frontend/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/fonts/font-awesome-4/css/font-awesome.min.css">
    <style>
      html, body, #map-canvas {
        font-family: "Arial" !important;
        font-size: 14px !important;
        height: 100%;
        margin: 0px;
        padding: 0px
      }

      table{
        text-align: "center";
      }
    </style>

  </head>
  <body>
    <?php
    $hostname = "36.78.163.102";
    $db = "balaibendungan";
    $username = "rep";
    $password = "";

    $dbhandle = mysql_connect($hostname, $username, $password) 
     or die("Unable to connect to MySQL");

    
  //select a database to work with
  $selected = mysql_select_db($db,$dbhandle) 
  or die("Could not select examples");

    $sql="SELECT * FROM `sensor` WHERE id_logger = ".$id; 

    $result=mysql_query($sql); 
    $no=0;

    ?><center>

    <h2>DETAIL SENSOR DATALOGGER BALAI BENDUNGAN</h2>
    <table border="1" style="width:50%;">
         <thead>
              <tr>
                  <th class="center">ID Sensor</th>
                  <th class="center">Nama Sensor</th>
                  <th class="center">Tipe Sensor</th>
              </tr>
          </thead>
          <tbody>
     <?php

    while($rows=mysql_fetch_array($result)){ 
?>
    <tr>
   <td><?php echo $rows['id_sensor']; ?></td>
   <td><?php echo $rows['nama_sensor']; ?></td>
   <td><?php echo $rows['tipe_sensor']; ?></td>
   </tr>

  <?php
    } 
  ?>

   </tbody>
</table>

<a href="<?php echo base_url();?>home/listing/">kembali ke list logger</a>

</center>
  </body>
</html>