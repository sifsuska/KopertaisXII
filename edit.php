<?php 
$title = "Sistem Informasi Geografis Kopertais XII";
include_once "header.php"; ?>
<?php 
	include("koneksi.php");
	$id = $_GET['id'];
	$show = mysql_query("SELECT * FROM data_ptais WHERE id_ptais = '$id'");
	if(mysql_num_rows($show) == 0){
		echo "<script>window.history.back()</script>";
	}
	else{
		$data = mysql_fetch_assoc($show);
	}
	
	?>
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> Perubahan Data</strong></h2>
            </div>
            <div class="panel-body">
              <div class="tile-body">

                                    <form method="POST" class="form-horizontal" name="form1" role="form" id="form1" action="edit-new-proses.php"
                                    data-parsley-validate>
											<input type="hidden" name="id" value="<?php echo $id; ?>">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama PTAIS</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_ptais" class="form-control" value="<?php echo $data['nama_ptais']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Kabupaten</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kabupaten" class="form-control" value="<?php echo $data['kabupaten']; ?>">
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Akreditasi Institusi</label>
                                            <div class="col-sm-10">
                                               
												<select type="text" name="akreditasi_ptais" required="">
												<option value="">- Pilih akreditasi - </option>
												<option value="A" <?php if($data['akreditasi_ptais'] == 'A'){ echo 'selected';}?>>A</option>
												<option value="B" <?php if($data['akreditasi_ptais'] == 'B'){ echo 'selected';}?>>B</option>
												<option value="C" <?php if($data['akreditasi_ptais'] == 'C'){ echo 'selected';}?>>C</option>
												
												</select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jenjang</label>
                                            <div class="col-sm-10">
                                                <select type="text" name="jenjang" required="">
												<option value="">- Pilih Jenjang - </option>
												<option value="D3" <?php if($data['jenjang'] == 'D3'){ echo 'selected';}?>>D3</option>
												<option value="S1" <?php if($data['jenjang'] == 'S1'){ echo 'selected';}?>>S1</option>
												<option value="S2" <?php if($data['jenjang'] == 'S2'){ echo 'selected';}?>>S2</option>
												</select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input id="address" type="text" name="alamat_ptais" class="form-control" value="<?php echo $data['alamat_ptais']; ?>
                                                    ">
                                                  <input id="submit" type="button" value="Geocode">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Latitude</label>
                                            <div class="col-sm-10">
                                                <input id="lat" type="text" name="latitude" class="form-control" value="<?php echo $data['latitude']; ?>
                                                    ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Longtitude</label>
                                            <div class="col-sm-10">
                                                <input id="lng" type="text" name="longitude" class="form-control"value="<?php echo $data['longitude']; ?>
                                                    " >
                                            </div>
                                        </div>
                                       
                                        <hr class="line-dashed line-full" />
                                         </div> 

                                 <div class="tile-footer text-right bg-tr-black lter dvd dvd-top">
                                    <!-- SUBMIT BUTTON -->
                                    <button type="submit" class="btn btn-success" id="form1Submit" >Submit</button>
                                    <button type="reset" class="btn btn-danger"> Reset</button>
                                </div>
<br>

<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 500px;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
          display:none;
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
    <div id="map"></div>
    <script>
    
    var map;
    var geocoder;
    var _status;
    var _results;
	var marker;
	
	var lat = document.getElementById('lat');
	var lng = document.getElementById('lng');	
	
	
	// fungsi initMap ini dipanggil saat selesai meload kode Google Maps API 
      function initMap() {
	  
		console.log('initMap() dipanggil');
		
        //var map = new google.maps.Map(document.getElementById('map'), {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          //              ""lat"" : 0.4642980999999999, ""lng"" : 101.4085203
          //center: {lat: -34.397, lng: 150.644}
          center: {lat: 0.4642980999999999, lng:  101.4085203}
        });
        //var geocoder = new google.maps.Geocoder();
        geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
		
		
		marker = new google.maps.Marker({
              draggable: true,
			  map: map//,
			  //position: new google.maps.LatLng(lat.value,lng.value);
		});
		
		marker.setPosition(new google.maps.LatLng(lat.value,lng.value));

		
	  		//dragend
      google.maps.event.addListener(marker, 'drag', function(event) {
          console.log(event.latLng);
          console.log("Latitude=" + event.latLng.lat());
          console.log("Longitude=" + event.latLng.lng());
		  lat.value = event.latLng.lat();
		  lng.value = event.latLng.lng();
        });			


	
		
      }

      function geocodeAddress(geocoder, resultsMap) {
	  		console.log('geocodeAddress() dipanggil');

        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
            _results = results;
            _status = status;
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            document.getElementById('lat').value= results[0].geometry.location.lat();
            document.getElementById('lng').value= results[0].geometry.location.lng();
            
            //marker = new google.maps.Marker({
            //  draggable: true,
			//  map: resultsMap,
            //  position: results[0].geometry.location
            //});
			
			//pindahkan marker ke posisi hasil geocoding
			marker.setPosition(results[0].geometry.location);
			
			
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
	  
	  
	  

       
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfswesJkjAcixCfuhU42Ss6dHlFCG5JAk&callback=initMap">
    </script>
            </div>
            </div>
          </div>

        
        </div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>