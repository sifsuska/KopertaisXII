<?php 
include('akses.php'); 
$id = $_GET['id'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$nptais="";
$idptais="";
$kab="";
$ap="";
$jenjang="";
$alamat="";
$lat="";
$long="";
foreach($obj->results as $item){
  $nptais.=$item->nama_ptais;
  $idptais.=$item->id_ptais;
  $kab.=$item->kabupaten;
  $ap.=$item->akreditasi_ptais;
  $jenjang.=$item->jenjang;
  $alamat.=$item->alamat_ptais;
  $lat.=$item->latitude;
  $long.=$item->longitude;
}

// $id_ps = $_GET['id_ps'];
// $obj = json_decode($dataps);
// $program_studi="";
// $akreditasi="";
// foreach($obj->results as $item){
//   $program_studi.=$item->program_studi;
//   $akreditasi.=$item->akreditasi;
// }

$title = "Detail dan Lokasi : ".$nptais;
include_once "header.php"; ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAFDLPCiMy-Q0pp1ZzV62NOeSTUEWmsu5Y"></script>

<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $lat ?>,<?php echo $long ?>);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"><?php echo $nptais ?></h1>'+
      '<div id="bodyContent">'+
      '<p><?php echo $ap ?></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon:'img/marker.png'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
      <div class="row">
      <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Lokasi - </strong></h4>
            </div>
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:380px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Detail Institusi - </strong></h4>
            </div>
            <div class="panel-body">
             <table id="detail" class="table">
                 <td>Nama Institusi</td>
                 <td><h4><?php echo $nptais ?></h4></td>
               </tr>
               <tr>
                 <td>Jenjang</td>
                 <td><h4><?php echo $jenjang ?></h4></td>
               </tr>
               <tr>
                 <td>Alamat</td>
                 <td><h4><?php echo $alamat ?></h4></td>
               </tr>
               <tr>
                 <td>Akreditasi Institusi</td>
                 <td><h4><?php echo $ap ?></h4></td>
               </tr>
               <tr>
			   
			   
</table>        
		<div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Detail Program Studi - </strong></h4>
            </div>
            <div class="panel-body">
             <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>  
                                            <th>Program Studi</th>  
                                            <th>Akreditasi</th>    
                                            <th>Aksi</th>  
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $id = $_GET['id'];
                                    $show = mysql_query("SELECT * FROM data_ps WHERE id_ptais = '$id'");
                                    if(mysql_num_rows($show) == 0){
                                        echo '<tr><td colspan="6">Tidak ada data gan!</td></tr>';
                                    }else{
                                        $no = 1;    
                                            while ($data=mysql_fetch_array($show)) {
                                            echo '<tr>';
                                                echo '<td>'.$no.'</td>';    
                                                echo '<td>'.$data['program_studi'].'</td>';
                                                echo '<td>'.$data['akreditasi'].'</td>';    
                                                echo '<td>
                                                <a href=edit_studi.php?id='.$data['id_ps'].'>Edit</a> /
                                                <a href="delete_studi.php?id='.$data['id_ps'].'" onclick="return confirm(\'Anda ingin menghapus data?\')">Hapus</a></td>';   
                                            echo '</tr>';
                                            $no++;  
                                        }
                                    }
                                    ?>                
           
                                    </tbody>
                                </table>
<td class="ctr">		
		<div class="btn-group">
				<a target="_blank" class="btn btn-info btn-sm" href="add_studi.php?id=<?php echo $id ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn btn-primary">
					  <i class="fa fa-plus" aria-hidden="true"></i> </a>&nbsp;
                  </div>
                  </div>
                </td>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	

    <?php include_once "footer.php"; ?>