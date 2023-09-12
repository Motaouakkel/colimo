<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>leaflet.trackplayback</title>
  <link rel="stylesheet" href="examples/lib/leaflet/leaflet.css">
  <link rel="stylesheet" href="dist/control.playback.css">
  <script src="examples/lib/leaflet/leaflet.js"></script>
  <script src="dist/control.trackplayback.js"></script>
  <script src="dist/leaflet.trackplayback.js"></script>
</head>

<body>
    <div id='mapid' style=" position: absolute; left: 0; top: 0; right: 0; bottom: 0; width: 100%; height: 800px; overflow: hidden;"></div>
  <script>
    // create map and add baseLayer
    

    // get data from server
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'gps.php', false);
    xhr.onreadystatechange = xhrCallback;
    xhr.send();

    function xhrCallback() {
      if (xhr.readyState === 4 && xhr.status === 200) {
	
	// recuperation data
			
		var b = JSON.parse(this.response);
		
// init map
const	map = L.map('mapid').setView([b[1]["lat"], b[1]["lng"]], 14);
	//  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      //attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    //}).addTo(map);
L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}).addTo(map);


		// charger map
		

    const data = JSON.parse(this.response);

	
		
        const trackplayback = L.trackplayback(data, map, {
          targetOptions: {
            useImg: true,
            imgUrl: 'examples/ship.png'
          },
		
        });
        const trackplaybackControl = L.trackplaybackcontrol(trackplayback);
        trackplaybackControl.addTo(map);
      }
    }

  </script>
</body>

</html>
