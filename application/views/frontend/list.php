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

    $sql="SELECT * FROM `view_logger` inner join pos USING (id_pos) inner join logger USING (id_logger) order by id_logger asc"; 

    $result=mysql_query($sql); 
    $no=0;

    ?><center>

    <h2>LIST UPDATE DATALOGGER BALAI BENDUNGAN</h2>
    <table border="1" style="width:50%;">
         <thead>
              <tr>
                  <th class="center">ID Logger</th>
                  <th class="center">Nama Logger</th>
                  <th class="center">Lokasi</th>
                  <th class="center">Tanggal Update</th>
              </tr>
          </thead>
          <tbody>
     <?php

    while($rows=mysql_fetch_array($result)){ 
?>
    <tr>
   <td><?php echo $rows['id_logger']; ?></td>
   <td>
        <a href="<?php echo base_url();?>home/sublisting/<?php echo $rows['id_logger']; ?>"><strong><?php echo $rows['nama_logger']; ?></strong></a>
   </td>
   <td><?php echo $rows['nama_pos']; ?></td>
   <td><?php echo $rows['log']; ?></td>
   </tr>

  <?php
    } 
  ?>

   </tbody>
</table>
</center>
  </body>
</html>