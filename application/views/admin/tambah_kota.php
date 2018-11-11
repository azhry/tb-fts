<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Tambah Data Kota/Kabupaten</h1>
		</div>
		<!-- END PAGE TITLE -->
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT INNER -->
	<div class="row margin-top-10">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Form Penambahan Data Kota / Kabupaten
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?= form_open_multipart('admin/tambah-kota', ['class' => 'form-horizontal']) ?>
						<div class="form-body">
							<?= $this->session->flashdata('msg') ?>
							<div class="form-group">
								<label class="col-md-3 control-label">Nama Kota / Kabupaten</label>
								<div class="col-md-4">
									<input type="text" name="kota_kabupaten" class="form-control input-circle">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Titik Kota Kabupaten</label>
								<div class="col-md-7">
									<input id="pac-input" class="form-control" type="text" placeholder="Cari Lokasi"/>
									<div id="map" style="height: 250px;"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Koordinat Kota Kabupaten</label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="input-group">
										<span class="input-group-addon input-circle-left">
											x
										</span>
										<input type="number" step="any" name="latitude" required class="form-control input-circle-right"/>
									</div>
									<div class="input-group">
										<span class="input-group-addon input-circle-left">
											y
										</span>
										<input type="number" step="any" name="longitude" required class="form-control input-circle-right"/>
									</div>
									
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" name="submit" value="Submit" class="btn btn-circle blue">Submit</button>
								</div>
							</div>
						</div>
					<?= form_close() ?>
					<!-- END FORM-->
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>

<script type="text/javascript">
	function initMap() {
		// koordinat palembang
		let lat = -2.990934;
		let lng = 104.7754;

		let map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: lat, lng: lng},
			zoom: 12
		});

		$('input[name=latitude]').val(lat);
		$('input[name=longitude]').val(lng);

		let input = document.getElementById('pac-input');
        let searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          let places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          let bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }

            $('input[name=latitude]').val(place.geometry.location.lat);
			$('input[name=longitude]').val(place.geometry.location.lng);
          });
          map.fitBounds(bounds);
        });

        function setMarker(latLng) {
        	// Clear out the old markers.
			markers.forEach(function(marker) {	
				marker.setMap(null);
			});
			markers = [];

			// Create a marker for each place.
            markers.push(new google.maps.Marker({
				map: map,
				position: latLng
            }));
        }

        function setJarak(latLng) {
        	let currentLocation = latLng;
			let unsriLocation = new google.maps.LatLng(-2.984833, 104.732662);
	        
	        let request = {
	        	origin: currentLocation,
	        	destination: unsriLocation,
	        	travelMode: google.maps.TravelMode.DRIVING
	        };

	        let directionService = new google.maps.DirectionsService();
	        directionService.route(request, function(response, status) {
	        	$('#jarak').val(response.routes[0].legs[0].distance.value);
	        });
        }

        map.addListener('click', function(e) {
        	let clickedLat = e.latLng.lat();
        	let clickedLng = e.latLng.lng();

        	setMarker({ lat: clickedLat, lng: clickedLng });

        	$('input[name=latitude]').val(clickedLat);
			$('input[name=longitude]').val(clickedLng);

			setJarak(new google.maps.LatLng(clickedLat, clickedLng));
        });


        $('input[name=latitude]').keyup(function() {
        	let latLng = new google.maps.LatLng($(this).val(), $('input[name=longitude]').val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        	setJarak(latLng);
        });
		$('input[name=longitude]').keyup(function() {
			let latLng = new google.maps.LatLng($('input[name=latitude]').val(), $(this).val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        	setJarak(latLng);
        });
	}

	$(function () {
	    $('#foto_ruko').fileupload({
	        dataType: 'json',
	        progressall: function (e, data) {
		        let progress = parseInt(data.loaded / data.total * 100, 10);
		        $('#progress .bar').css(
		            'width',
		            progress + '%'
		        ).text(progress + '%');

		        if (progress >= 100) {
		        	$('#progress .bar').removeClass('progress-bar-info')
		        		.addClass('progress-bar-success').text(progress + '% completed');
		        }
		    },
	        done: function (e, data) {
	        	let files = data.result['foto_ruko'];
	        	let file = files[0];
	        	$('#list-files').append('<li>' +
					'<a>' +
						'<span class="image"><img style="width: 50px; height: 50px;" src="' + file.thumbnailUrl + '" alt="Uploaded Image" /></span>' +
						'<span>' +
							'<span>' + file.name + '</span>' +
						'</span>' +
						'<span class="message">' +
							Math.round((file.size / 1024) * 100) / 100 + ' KB' +
						'</span>' +
					'</a>' +
					'<input type="hidden" value="' + file.name + '" name="uploaded_files[]"/>' +
				'</li>');
	        }
	    });
	});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap" async defer></script>