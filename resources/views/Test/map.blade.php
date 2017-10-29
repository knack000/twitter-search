<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" type="text/css" href="/css/test.css"> -->
    <link rel="stylesheet" type="text/css" href="/css/googlemap.css">
    <link rel="stylesheet" type="text/css" href="/css/card.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
  <div class="page-header">
  <h1>Example page header <small>Subtext for header</small></h1>
</div>
  <div id="app" class="container-fluid" style="background-color:#ff6347;">
  <div class="row">
    <div  class="col-lg-8" >
   <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Search City
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text"placeholder="Enter a city" v-model="searchCity">
      </div>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
  </div>

  <div class ="col-lg-4">
  <ul class="list-group" style="width: 100%;margin-top: 15px;">
  <li class="list-group-item ">
    <img class="img-circle pull-left" src="http://pbs.twimg.com/profile_images/922829526563897344/wRNzXR2w_normal.jpg" />
        <div class="test" style="margin-left: 4pc">
        <p>Post title<span> @NjYg_</span></p>
        <p>post desc post desc post desc post desc post desc post desc post desc </p>
  </li>
  <li class="list-group-item">
    <!-- <img class="img-circle pull-left" src= @{{}} />
        <div class="test" style="margin-left: 4pc">
        <p>@{{items}}<span> @{{}} </span></p>
        <p>p@{{}}</p> -->
    <img class="img-circle pull-left" src="http://pbs.twimg.com/profile_images/922829526563897344/wRNzXR2w_normal.jpg" />
        <div class="test" style="margin-left: 4pc">
        <p>@{{items}}<span> @NjYg_</span></p>
        <p>post desc post desc post desc post desc post desc post desc post desc </p>
  </li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
</div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://unpkg.com/vue"></script>
  <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
  <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
  <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
  <!-- <script src="dist/vue.js"></script> -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDT0h00z9qiFOby4aEB1iugmpSu2daueyM&libraries=places&callback=initMap"
        async defer></script>
  <!-- <script src="/node_modules/vue-cookie/build/vue-cookie.js'"></script> -->
  <!-- <script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script> -->
  </body>
</html>

<script>

// const cors = require('cors');
// const gulp = require('gulp');
// const traceur = require('gulp-traceur');

// gulp.task('default', () => {
// 	return gulp.src('src/map.js')
// 		.pipe(traceur())
// 		.pipe(gulp.dest('dist'));
// });

// const Vue = require('vue');
// const VueLocalStorage = require('vue-local-storage');


// var Vue = require('vue');
// var VueLocalStorage = require('vue-local-storage')
// include 'vue-local-storage';
// var VueAsyncData = require('vue-local-storage');
// const VueLocalStorage = require('vue-local-storage.vue');

// Vue.localStorage.set('bar', 'baz');
// Vue.localStorage.remove('bar');
// new Vue({
//     el: '#app',
//     mounted: function() {
//         this.$localStorage.set('foo', 'boo');
//         // also, you can set expire for item
//         this.$localStorage.set('foo', 'boo', 60 * 60 * 1000); // set an expiry of item at 1 hour
//         this.$localStorage.set('foo', 'boo', 0); // endless item
//         this.$localStorage.get('foo'); // get foo value
//         this.$localStorage.remove('foo');
//     }
// });
// import Vue from 'vue';
// import VueLocalStorage from 'vue-local-storage';
// Vue.Use(VueLocalStorage);
  var app = new Vue({
    el: '#app',
    data: {
      searchCity: '',
      items: ''
    },
    methods: {
      getTweets: (function(){
        console.log("55")
        var app = this
        var config = 
        {
          headers: 
          {
          'Access-Control-Allow-Headers': 'origin x-requested-with, content-type',
          'Access-Control-Allow-Methods': 'GET, POST, OPTIONS',
          'Access-Control-Allow-Headers': 'Content-Type, Accept',
          'Content-Type': 'application/x-www-form-urlencoded',
          'Authorization': 'Bearer AAAAAAAAAAAAAAAAAAAAACiJ2wAAAAAAaixVPIc9iNSMwEXD8B7odbhjTZU%3DHyba6etQh0SpxlOzHAarWta1jKcDBwrpD8vD67ieiJYYXLYdjM'
          }
        };
        axios.get('https://api.twitter.com/1.1/search/tweets.json?q=' + this.searchCity +'&count=4' , config)
        // axios.get('http://ziptasticapi.com/76520')
                .then(function (response) {
                  app.items = response
                  
                  console.log(app.items.data)
                })
                .catch(function (error) {
                  app.items = "Invalid Tweets"
                })
        })
      }
  })

  var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 12.927608, lng: 100.877081},
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow;
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };
              map.setCenter(pos);
              marker.setPosition(pos);
              marker.setVisible(true);
            }, function() {
              handleLocationError(true, infoWindow, map.getCenter());
            });
          } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }
  


        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var options = {
         types: ['(cities)']
         };

        var autocomplete = new google.maps.places.Autocomplete(input, options);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);
        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
          app.getTweets();
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
          
          
        });

      }
</script>
<script>

      
    </script>
    <!-- $.ajax({
          type: "GET",
          url: "https://api.twitter.com/1.1/search/tweets.json?q=" 
          + place.name + "&geocode" 
          + place.geometry.location.lat() + "," 
          + place.geometry.location.lng() + "," 
          + "70 km",
          cache: false,

          success: function(html){
//$("#more").after(html);
          console.log(html);
          alert("Success!");
          }
          }); -->