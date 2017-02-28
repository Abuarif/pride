
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>Drawing Tools</title>
    <?php
			echo $this->Html->script(array(
				'http://maps.google.com/maps/api/js?sensor=false&libraries=drawing',
				
			));
		?>
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
    </style>
    <script type="text/javascript">
      var myLatlng = new google.maps.LatLng(3.0833, 101.6500);
      var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
      var selectedColor;
      var colorButtons = {};
      var poly = [];

      function clearSelection() {
        if (selectedShape) {
          selectedShape.setEditable(false);
          selectedShape = null;
        }
      }

      function stopPoly() {
        drawingManager.setDrawingMode(null);
        showCoordinates();
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
          document.getElementById("savedata").value = "";
        }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);

        // var rectangleOptions = drawingManager.get('rectangleOptions');
        // rectangleOptions.fillColor = color;
        // drawingManager.set('rectangleOptions', rectangleOptions);

        // var circleOptions = drawingManager.get('circleOptions');
        // circleOptions.fillColor = color;
        // drawingManager.set('circleOptions', circleOptions);

        // var polygonOptions = drawingManager.get('polygonOptions');
        // polygonOptions.fillColor = color;
        // drawingManager.set('polygonOptions', polygonOptions);
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
        document.getElementById("savedata").value = "";
          var polyPoint = poly[0].overlay.getPath().getArray();
          for (var i = 0; i < polyPoint.length; i++) {
            var lat = polyPoint[i].lat();
            var lng = polyPoint[i].lng();
            var str = lat+","+lng+"|";
            document.getElementById('savedata').value += str;
          }
      }

      function initialize() {

        var map = new google.maps.Map(document.getElementById('map'), {
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
        // google.maps.event.addListener(map, 'click', function() {
        //   alert(map. .getPosition());
        // });
        // google.maps.event.addListener(drawingManager, 'click', function() {
        //     alert(event.latLng.lat());
        // });
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
        google.maps.event.addListener(map, 'rightclick', stopPoly);
        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
        //google.maps.event.addDomListener(savebutton, 'click', showCoordinates);

        buildColorPalette();
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <form method="POST" action="">
    <div id="panel">
      <div id="color-palette"></div>
      <div>
        <br>
        <textarea id="savedata" name="savedata" rows="8" cols="60"></textarea>
        <br>
        <button id="delete-button">Delete Polyline</button>
        
        <div class="field">Code: <input type="text" name="code" value=""></div>
        <div class="field">Origin: <input type="text" name="origin" value=""></div>
        <div class="field">Destination: <input type="text" name="destination" value=""></div>
        <input type="submit" name="Save" value="Save">
      </div>
    </div>
    </form>
    <div id="map"></div>
  </body>
</html>
