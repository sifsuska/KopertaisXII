<?php 
$title = "Sistem Informasi Geografis KOPERTAIS WILAYAH XII";
include_once "header.php"; ?>
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Input Data</strong></h2>
            </div>
            <div class="panel-body">
              <div class="tile-body">
                                    <form method="POST" class="form-horizontal" name="form1" role="form" id="form1" action="add_proses.php"
                                    data-parsley-validate>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Institusi</label>
                                            <div class="col-sm-10">
                                                <input type="textbook" name="nama_ptais" class="form-control" placeholder="Nama Institusi"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Kab/Kota</label>
                                            <div class="col-sm-10">
                                                <input type="textbook" name="kabupaten" class="form-control" placeholder="Kabupaten/kota"
                                                       required>
                                            </div>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Akreditasi Institusi</label>
                                            <div class="col-sm-10">
                                               
												<select type="text" name="akreditasi_ptais" required>
												<option value="Belum terakreditasi">- Pilih akreditasi - </option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												</select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jenjang</label>
                                            <div class="col-sm-10">
                                                <select type="text" name="jenjang" required>
												<option value="">- Pilih Jenjang - </option>
												<option value="D3">D3</option>
												<option value="S1">S1</option>
												<option value="S2">S2</option>
												</select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input id="address" type="texbox" name="alamat_ptais" class="form-control" placeholder="Alamat"
                                                       required>
                                                  <input id="submit" type="button" value="Geocode">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Latitude</label>
                                            <div class="col-sm-10">
                                                <input id="lat" value= "" type="textbook" name="latitude" class="form-control" placeholder="Latitude">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Longtitude</label>
                                            <div class="col-sm-10">
                                                <input id="lng" value="" type="textbook" name="longitude" class="form-control" placeholder="Longtitude"       >
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