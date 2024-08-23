/**
 * Logistic Fleet
 */
('use strict');

(function () {
  function getCurrentLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        geojson.features[0].geometry.coordinates = [longitude, latitude];
        dd();
      });
    }
  }
  const style = {
    version: 8,
    sources: {
      osm: {
        type: 'raster',
        tiles: ['https://a.tile.openstreetmap.org/{z}/{x}/{y}.png'],
        tileSize: 256,
        attribution: '&copy; OpenStreetMap Contributors',
        maxzoom: 19
      }
    },
    layers: [
      {
        id: 'osm',
        type: 'raster',
        source: 'osm' // This must match the source key above
      }
    ]
  };
  getCurrentLocation();
  const geojson = {
    type: 'FeatureCollection',
    features: [
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '1'
        },
        geometry: {
          type: 'Point',

          coordinates: [45, 45]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '2'
        },
        geometry: {
          type: 'Point',
          coordinates: [35.903, 35.507]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '3'
        },
        geometry: {
          type: 'Point',
          coordinates: [38.298, 35.792]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '4'
        },
        geometry: {
          type: 'Point',
          coordinates: [36.694, 34.699]
        }
      }
    ]
  };
  const basemapEnum = 'arcgis/navigation';
  const apiKey = 'AAPKde9c5ee069774b31a687c2e2bcaa6bb0B_EHlQRj771VE6MqLLCIGeM0BtPJPZSI5hRNzZDHz-DwsqdoYTiWzDjwkWiqFGHm';
  const map = new maplibregl.Map({
    container: 'map',
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: style,
    center: [37.1329, 35.4],
    zoom: 6
  });
  map.addControl(
    new maplibregl.GeolocateControl({
      positionOptions: {
        enableHighAccuracy: true
      },
      trackUserLocation: true
    })
  );
  // Add markers to the map and thier functionality
  function dd() {
    for (const marker of geojson.features) {
      // Create a DOM element for each marker.
      const el = document.createElement('div');
      const width = marker.properties.iconSize[0];
      const height = marker.properties.iconSize[1];
      el.className = 'marker';
      el.insertAdjacentHTML(
        'afterbegin',
        '<img src="' +
          assetsPath +
          'img/illustrations/fleet-car.png" alt="Fleet Car" width="20" class="rounded-3" id="carFleet-' +
          marker.properties.message +
          '">'
      );

      el.style.width = `${width}px`;
      el.style.height = `${height}px`;
      el.style.cursor = 'pointer';

      // Add markers to the map.
      new maplibregl.Marker({ element: el }).setLngLat(marker.geometry.coordinates).addTo(map);

      // Select Accordion for respective Marker
      const element = document.getElementById('fl-' + marker.properties.message);
      // Select Car for respective Marker
      const car = document.getElementById('carFleet-' + marker.properties.message);

      element.addEventListener('click', function () {
        const focusedElement = document.querySelector('.marker-focus');

        if (Helpers._hasClass('active', element)) {
          //fly to location
          map.flyTo({
            center: geojson.features[marker.properties.message - 1].geometry.coordinates,
            zoom: 16
          });
          // Remove marker-focus from other marked cars
          focusedElement && Helpers._removeClass('marker-focus', focusedElement);
          Helpers._addClass('marker-focus', car);
        } else {
          //remove marker-focus if not active
          Helpers._removeClass('marker-focus', car);
        }
      });
    }
  }
  dd();
  //For selecting default car location
  const defCar = document.getElementById('carFleet-1');

  Helpers._addClass('marker-focus', defCar);

  //hide mapbox controls
  document.querySelector('.maplibregl-control-container').classList.add('d-none');

  //Selecting Sidebar Accordion for perfect scroll
  var sidebarAccordionBody = $('.logistics-fleet-sidebar-body');

  //Perfect Scrollbar for Sidebar Accordion
  if (sidebarAccordionBody.length) {
    new PerfectScrollbar(sidebarAccordionBody[0], {
      wheelPropagation: false,
      suppressScrollX: true
    });
  }

  function addCircleLayers() {
    map.addSource('start', {
      type: 'geojson',
      data: {
        type: 'FeatureCollection',
        features: [-74.03, 40.75699842]
      }
    });
    map.addSource('end', {
      type: 'geojson',
      data: {
        type: 'FeatureCollection',
        features: [-74.0325, 40.742992]
      }
    });

    map.addLayer({
      id: 'start-circle',
      type: 'circle',
      source: 'start',
      paint: {
        'circle-radius': 6,
        'circle-color': 'white',
        'circle-stroke-color': 'black',
        'circle-stroke-width': 2
      }
    });

    map.addLayer({
      id: 'end-circle',
      type: 'circle',
      source: 'end',
      paint: {
        'circle-radius': 7,
        'circle-color': 'black'
      }
    });
  }
  function addRouteLayer() {
    map.addSource('route', {
      type: 'geojson',
      data: {
        type: 'FeatureCollection',
        features: []
      }
    });
    map.addLayer({
      id: 'route-line',
      type: 'line',
      source: 'route',

      paint: {
        'line-color': '#A020F0',
        'line-width': 6,
        'line-opacity': 0.8
      }
    });
  }
  let currentStep = 'start';
  let startCoords, endCoords;
  map.on('click', e => {
    const coordinates = e.lngLat.toArray();
    const point = {
      type: 'Point',
      coordinates
    };

    if (currentStep === 'start') {
      map.getSource('start').setData(point);
      startCoords = coordinates;
      const empty = {
        type: 'FeatureCollection',
        features: []
      };
      map.getSource('end').setData(empty);
      map.getSource('route').setData(empty);
      endCoords = null;
      currentStep = 'end';
    } else {
      map.getSource('end').setData(point);
      endCoords = coordinates;
      currentStep = 'start';
    }
    if (startCoords && endCoords) {
      updateRoute(startCoords, endCoords);
    }
  });
  map.on('load', () => {
    addCircleLayers();
    addRouteLayer();
  });

  function updateRoute() {
    const authentication = arcgisRest.ApiKeyManager.fromKey(apiKey);

    arcgisRest
      .solveRoute({
        stops: [startCoords, endCoords],
        endpoint: 'https://route-api.arcgis.com/arcgis/rest/services/World/Route/NAServer/Route_World/solve',
        authentication
      })
      .then(response => {
        map.getSource('route').setData(response.routes.geoJson);
      })
      .catch(error => {
        console.error(error);
        alert('There was a problem using the route service. See the console for details.');
      });
  }
  console.log(navigator.geolocation);
})();
