<?php

$strCoordinates = array();
$label = 'Draft';
//generate map from cakephp database
foreach ($routeDetail['Coordinates'] as $coordinate) {
  if (!empty($this->request->pass[2])) {
    if($this->request->pass[2] == strtotime($coordinate['created'])) {
        if ($coordinate['status'] == true) {
            $lat = $coordinate['lat'];
            $lng = $coordinate['long'];
            $strCoordinates[] = 'new google.maps.LatLng('.$lat.', '.$lng.')';
            $label = 'Published';
            $datestr = strtotime($coordinate['created']);
            $ctr_lat = $coordinate['ctr_lat'];
            $ctr_long = $coordinate['ctr_long'];
            $zoom = $coordinate['zoom'];
        } else {
            $lat = $coordinate['lat'];
            $lng = $coordinate['long'];
            $strCoordinates[] = 'new google.maps.LatLng('.$lat.', '.$lng.')'; 
            $ctr_lat = $coordinate['ctr_lat'];
            $ctr_long = $coordinate['ctr_long'];
            $zoom = $coordinate['zoom'];
        } 
    }

  } else if ($coordinate['status'] == true) {
     $lat = $coordinate['lat'];
     $lng = $coordinate['long'];
     $strCoordinates[] = 'new google.maps.LatLng('.$lat.', '.$lng.')';
     $label = 'Published';
     $datestr = strtotime($coordinate['created']);
     $ctr_lat = $coordinate['ctr_lat'];
     $ctr_long = $coordinate['ctr_long'];
     $zoom = $coordinate['zoom'];
  }
}

if(!empty($this->request->pass[2])) {
  $datestr = $this->request->pass[2];
}

?>
<div class="box box-primary">
<div>
		<div class="col">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-map-marker"></i> 
        Location Maps : <?php echo $this->Time->niceShort($datestr) . ' ('.$label.')'; ?>
        </h3>
			</div><!-- /.box-header -->
			<div class="box-body">
			<div id="locationField" style="margin-bottom:10px;">
			  <div class="input-group">
				  <div class="input-group-btn">
					  <button type="button" class="btn btn-warning">Search Location</button>
				  </div>
				  <input id="autocomplete" type="text" class="form-control">
			  </div>
			</div>
			<div id="listing"><table id="resultsTable"><tbody id="results"></tbody></table></div>
				<?php
					echo $this->Html->script('http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places');
					//echo $this->Html->script('http://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing');

					echo $this->GoogleMapV3->map(array('map'=>array(
						// 'defaultLat' => 3.0833, # only last fallback, use Configure::write('Google.lat', ...); to define own one
						// 'defaultLng' => 101.6500, # only last fallback, use Configure::write('Google.lng', ...); to define own one
						'defaultZoom' => $zoom,
					),'div'=>array('id'=>'map', 'height'=>'400', 'width'=>'100%', 'display'=>'block')));
				?>
			</div><!-- /.box-body -->
		</div>
		<style type="text/css">
		  #map, html, body {
			padding: 0;
			margin: 0;
			width: 100%;
		  }

		  #panel {
			width: 300px;
			font-family: Arial, sans-serif;
			font-size: 13px;
			float: right;
			margin: 10px;
		  }

		  #color-palette {
			clear: both;
		  }

		  .color-button {
			width: 14px;
			height: 14px;
			font-size: 0;
			margin: 2px;
			float: left;
			cursor: pointer;
		  }

		  .field {
			padding: 5px;
		  }

		  #delete-button {
			margin-top: 25px;
		  }

		  #listing {
			position: absolute;
			width: 200px;
			height: 360px;
			overflow: auto;
			left: 401px;
			top: 65px;
			cursor: pointer;
		  }
		</style>

		<script type="text/javascript">
        var map, places, iw;
        var markers = [];
        var autocomplete;
  				
        function tilesLoaded() {
          google.maps.event.clearListeners(map, 'tilesloaded');
          google.maps.event.addListener(map, 'zoom_changed', search);
          google.maps.event.addListener(map, 'dragend', search);
          search();
        }
        
        function showSelectedPlace() {
          clearResults();
          clearMarkers();
          var place = autocomplete.getPlace();
          map.panTo(place.geometry.location);
          markers[0] = new google.maps.Marker({
            position: place.geometry.location,
            map: map
          });
          iw = new google.maps.InfoWindow({
            content: getIWContent(place)
          });
          iw.open(map, markers[0]);
        }
        
        function search() {
          var type;
          for (var i = 0; i < document.controls.type.length; i++) {
            if (document.controls.type[i].checked) {
              type = document.controls.type[i].value;
            }
          }
          
          autocomplete.setBounds(map.getBounds());
          
          var search = {
            bounds: map.getBounds()
          };
          
          if (type != 'establishment') {
            search.types = [ type ];
          }
          
          places.search(search, function(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
              clearResults();
              clearMarkers();
              for (var i = 0; i < results.length; i++) {
                markers[i] = new google.maps.Marker({
                  position: results[i].geometry.location,
                  animation: google.maps.Animation.DROP
                });
                google.maps.event.addListener(markers[i], 'click', getDetails(results[i], i));
                setTimeout(dropMarker(i), i * 100);
                addResult(results[i], i);
              }
            }
          })
        }
        
        function clearMarkers() {
          for (var i = 0; i < markers.length; i++) {
            if (markers[i]) {
              markers[i].setMap(null);
              markers[i] == null;
            }
          }
        }
        
        function dropMarker(i) {
          return function() {
            markers[i].setMap(map);
          }
        }
        
        function addResult(result, i) {
          var results = document.getElementById("results");
          var tr = document.createElement('tr');
          tr.style.backgroundColor = (i% 2 == 0 ? '#F0F0F0' : '#FFFFFF');
          tr.onclick = function() {
            google.maps.event.trigger(markers[i], 'click');
          };
          
          var iconTd = document.createElement('td');
          var nameTd = document.createElement('td');
          var icon = document.createElement('img');
          icon.src = result.icon;
          icon.setAttribute("class", "placeIcon");
          var name = document.createTextNode(result.name);
          iconTd.appendChild(icon);
          nameTd.appendChild(name);
          tr.appendChild(iconTd);
          tr.appendChild(nameTd);
          results.appendChild(tr);
        }
        
        function clearResults() {
          var results = document.getElementById("results");
          while (results.childNodes[0]) {
            results.removeChild(results.childNodes[0]);
          }
        }
        
        function getDetails(result, i) {
          return function() {
            places.getDetails({
                reference: result.reference
            }, showInfoWindow(i));
          }
        }
        
        function showInfoWindow(i) {
          return function(place, status) {
            if (iw) {
              iw.close();
              iw = null;
            }
            
            if (status == google.maps.places.PlacesServiceStatus.OK) {
              iw = new google.maps.InfoWindow({
                content: getIWContent(place)
              });
              iw.open(map, markers[i]);        
            }
          }
        }
        
        function getIWContent(place) {
          var content = "";
          content += '<table><tr><td>';
          content += '<img class="placeIcon" src="' + place.icon + '"/></td>';
          content += '<td><b><a href="' + place.url + '">' + place.name + '</a></b>';
          content += '</td></tr></table>';
          return content;
        }

			  function initialize() {
  				var mapOptions = {
  				  zoom: <?=$zoom;?>,
  				  center: new google.maps.LatLng(<?=$ctr_lat;?>, <?=$ctr_long;?>),
  				  mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            zoomControl: true
  				};

  			  map = new google.maps.Map(document.getElementById('map'),
  				mapOptions);

          places = new google.maps.places.PlacesService(map);
          google.maps.event.addListener(map, 'tilesloaded', tilesLoaded);
          autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
          google.maps.event.addListener(autocomplete, 'place_changed', function() {
            showSelectedPlace();
          });
				var flightPlanCoordinates = [
  				  <?php 
				      echo implode(',', $strCoordinates); 
  				  ?>
  				];
  				var flightPath = new google.maps.Polyline({
  				  path: flightPlanCoordinates,
  				  geodesic: true,
  				  strokeColor: '#FF0000',
  				  strokeOpacity: 1.0,
  				  strokeWeight: 3.0
  				});

  				flightPath.setMap(map);

          console.log(map);
			  }

			  google.maps.event.addDomListener(window, 'load', initialize);
		</script>
  </div>
</div>

		