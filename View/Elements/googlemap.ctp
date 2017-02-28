<div class="col-md-8">
    <div class="box box-info">
        <div class="box-header">            
            <h3 class="box-title"><i class="fa fa-map-marker"></i> Location Maps</h3>
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
echo $this->Html->script('http://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing,places');
//echo $this->Html->script('http://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing');

echo $this->GoogleMapV3->map(array('map'=>array(
            'defaultLat' => 3.0833, # only last fallback, use Configure::write('Google.lat', ...); to define own one
            'defaultLng' => 101.6500, # only last fallback, use Configure::write('Google.lng', ...); to define own one
            'defaultZoom' => 16,
        ),'div'=>array('id'=>'map', 'height'=>'400', 'width'=>'100%', 'display'=>'block')));
?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
<style type="text/css">
      #map, html, body {
        padding: 0;
        margin: 0;
        height: 100%;
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
      var myLatlng = new google.maps.LatLng(3.0833, 101.6500);
      var drawingManager;
      var selectedShape;
      var colors = ['#FF0000', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
      // var colors = ['#FF0000'];
      var selectedColor;
      var colorButtons = {};
      var poly = [];

      var map, places, iw;
      var markers = [];
      var autocomplete;

      function clearSelection() {
        if (selectedShape) {
          selectedShape.setEditable(false);
          selectedShape = null;
        }
      }

      function stopPoly() {
        drawingManager.setDrawingMode(null);
        showCoordinates();
        document.getElementById("submit").style.display = "block";
        document.getElementById("submit-button").style.display = "none";
      }

      function setSelection(shape) {
        clearSelection();
        selectedShape = shape;
        shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
      }

      function deleteSelectedShape() {
        if (selectedShape) {
          selectedShape.setMap(null);
          // document.getElementById("savedata").value = "";
        }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
            selectedShape.set('strokeColor', color);
          } else {
            selectedShape.set('fillColor', color);
          }
        }
      }

      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

       function buildColorPalette() {
         var colorPalette = document.getElementById('color-palette');
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
           colorPalette.appendChild(colorButton);
           colorButtons[currColor] = colorButton;
         }
         selectColor(colors[0]);
       }

      function overlayClickListener(overlay) {
          google.maps.event.addListener(overlay, "mouseup", function(event){
              $('#vertices').val(overlay.getPath().getArray());
          });
      }

      function showCoordinates() {
        // document.getElementById("savedata").value = "";
        document.getElementById("RouteDetailSavedata").value = "";
        document.getElementById("RouteDetailCenterCoordinate").value = "";
        document.getElementById("RouteDetailZoom").value = "";
          var polyPoint = poly[0].overlay.getPath().getArray();
          for (var i = 0; i < polyPoint.length; i++) {
            var lat = polyPoint[i].lat();
            var lng = polyPoint[i].lng();
            var str = lat+","+lng+"|";
            // document.getElementById('savedata').value += str;
			      document.getElementById('RouteDetailSavedata').value += str;
			
          }
        document.getElementById("RouteDetailCenterCoordinate").value = map.getCenter().lat() + "," + map.getCenter().lng();
        document.getElementById("RouteDetailZoom").value = map.zoom;
      }

      //--search
      function tilesLoaded() {
        //alert('masuk');
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

      function cancel() {
        document.getElementById("submit").style.display = "none";
        document.getElementById("submit-button").style.display = "block";
        // document.getElementById("savedata").value = "";
        document.getElementById("RouteDetailSavedata").value = "";
        document.getElementById("RouteDetailCenterCoordinate").value = "";
        document.getElementById("RouteDetailZoom").value = "";
        return false;
      }
      
      function getIWContent(place) {
        var content = "";
        content += '<table><tr><td>';
        content += '<img class="placeIcon" src="' + place.icon + '"/></td>';
        content += '<td><b><a href="' + place.url + '">' + place.name + '</a></b>';
        content += '</td></tr></table>';
        return content;
      }
      //--search

      function initialize() {

          map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true,
          zoomControl: true
        });

        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.POLYLINE,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [google.maps.drawing.OverlayType.POLYLINE]
          },
          // markerOptions: {
          //   draggable: true
          // },
          polylineOptions: {
            editable: true
          },
          // rectangleOptions: polyOptions,
          // circleOptions: polyOptions,
          // polygonOptions: polyOptions,
          map: map
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title:"Hello World!"
        });
        marker.setMap(map);

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
            if (e.type != google.maps.drawing.OverlayType.MARKER) {
            drawingManager.setDrawingMode(null);

            poly.push(e);
            //console.log(e);

            var newShape = e.overlay;
            newShape.type = e.type;
            //console.log(newShape.getPath());
            google.maps.event.addListener(newShape, 'click', function() {
              setSelection(newShape);
            });
            setSelection(newShape);
          }
        });

        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
        google.maps.event.addListener(map, 'rightclick', stopPoly);
		    //google.maps.event.addListener(document.getElementById('submit-button'), 'click', stopPoly);
        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
        //google.maps.event.addDomListener(savebutton, 'click', showCoordinates);

        places = new google.maps.places.PlacesService(map);
        google.maps.event.addListener(map, 'tilesloaded', tilesLoaded);
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
          showSelectedPlace();
        });

        buildColorPalette();
      }
      
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<?php echo $this->Form->create('RouteDetail'); ?>
  <?php if ($this->Session->read('Auth.User.Role.alias') != Configure::read('AMS.role_pride_advertiser') ) { ?>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-map-marker"></i>
        <h3 class="box-title">Configuration</h3>
      </div><!-- /.box-header -->
    <div class="box-body clearfix">
      <div id="color-palette"></div>
        <br>
        <button id="delete-button" class="btn btn-danger btn-block" onclick="return cancel();">Delete Polyline</button>
        <input type="button" name="Aidid" value="Confirm Route Polyline" id="submit-button" class="btn btn-warning btn-block" onclick="stopPoly();">
        <input type="submit" value="Submit" class="btn btn-primary btn-block" style="display:none" id="submit">
        </div>
    <?php } ?>
  </div>
  </div>
  <?php 
          echo $this->Form->input('savedata', array('label' => false, 'style' => 'width:0px;height:0px;border:0px;color:#ffffff;')); 
          echo $this->Form->input('center_coordinate', array('label' => false, 'style' => 'width:0px;height:0px;border:0px;color:#ffffff;')); 
          echo $this->Form->input('zoom', array('label' => false, 'style' => 'width:0px;height:0px;border:0px;color:#ffffff;')); 
        ?>
  <?php echo $this->Form->end(); ?>