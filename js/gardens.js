$(document).ready(function () {
	
	var locations = [];
	
	var gmapOptions = {
		center : new google.maps.LatLng(45.423494,-75.697933)
		, zoom : 13
		, mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	
	var map = new google.maps.Map(document.getElementById('map'), gmapOptions);

	
	var infoWindow;

	$('.gardens > li').each(function (i, elem) {
		var garden = $(this).find('a').html();

		var info = '<div class="info-window">'
			+ '<strong>' + garden + '</strong>'
			+ '<a href="single.php?id=' + $(this).attr('data-id') + '">Rate or Comment!</a>'
			+ '</div>'
		;

		
		var lat = $(this).find('meta[itemprop="latitude"]').attr('content');
		var lng = $(this).find('meta[itemprop="longitude"]').attr('content');
		var pos = new google.maps.LatLng(lat, lng);

		
		var marker = new google.maps.Marker({
			position : pos
			, map : map
			, title : garden
			, icon : 'images/wee_carrot.png'
			, animation: google.maps.Animation.DROP
		});


		function showInfoWindow (ev) {
			if (ev.preventDefault) {
				ev.preventDefault();
			}

			
			if (infoWindow) {
				infoWindow.close();
			}

			infoWindow = new google.maps.InfoWindow({
				content : info
			});

			infoWindow.open(map, marker);
		}

	
		google.maps.event.addListener(marker, 'click', showInfoWindow);
		
		google.maps.event.addDomListener($(this).children('a').get(0), 'click', showInfoWindow);
	});
	
	/****************************************************/
	/***** Rating Stars *********************************/
	/****************************************************/

	var $raterLi = $('.rater-usable li');

	// Makes all the lower ratings highlight when hovering over a star
	$raterLi
		.on('mouseenter', function (ev) {
			var current = $(this).index();

			for (var i = 0; i < current; i++) {
				$raterLi.eq(i).addClass('is-rated-hover');
			}
		})
		.on('mouseleave', function (ev) {
			$raterLi.removeClass('is-rated-hover');
		})
	;

	/****************************************************/
	/***** Geolocation **********************************/
	/****************************************************/

	var userMarker;

	// A function to display the user on the Google Map
	//  and display the list of closest locations
	function displayUserLoc (lat, lng) {
		var locDistances = []
			, totalLocs = locations.length
			, userLoc = new google.maps.LatLng(lat, lng);
		;

		// Create a new marker on the Google Map for the user
		//  or just reposition the already existent one
		if (userMarker) {
			userMarker.setPosition(userLoc);
		} else {
			userMarker = new google.maps.Marker({
				position : userLoc
				, map : map
				, title : 'You are here.'
				, icon : 'images/bunnyuser.png'
				, animation: google.maps.Animation.DROP
			});
		}

		// Center the map on the user's location
		map.setCenter(userLoc);

		// Create a new LatLon object for using with latlng.min.js
		var current = new LatLon(lat, lng);

		// Loop through all the locations and calculate their distances
		for (var i = 0; i < totalLocs; i++) {
			locDistances.push({
				id : locations[i].id
				, distance : parseFloat(current.distanceTo(new LatLon(locations[i].lat, locations[i].lng)))
			});
		}

		// Sort the distances with the smallest first
		locDistances.sort(function (a, b) {
			return a.distance - b.distance;
		});

		var $gardenList = $('.gardens');

		// We can use the resorted locations to reorder the list in place
		// You may want to do something different like clone() the list and display it in a new tab
		for (var j = 0; j < totalLocs; j++) {
			// Find the <li> element that matches the current location
			var $li = $gardenList.find('[data-id="' + locDistances[j].id + '"]');

			// Add the distance to the start
			// `toFixed()` makes the distance only have 1 decimal place
			$li.find('.distance').html(locDistances[j].distance.toFixed(1) + ' km');

			$gardenList.append($li);
		}
	}

	// Check if the browser supports geolocation
	// It would be best to hide the geolocation button if the browser doesn't support it
	if (navigator.geolocation) {
		$('#geo').click(function () {
			// Request access for the current position and wait for the user to grant it
			navigator.geolocation.getCurrentPosition(function (pos) {
				displayUserLoc(pos.coords.latitude, pos.coords.longitude);
			});
		});
	}

	$('#geo-form').on('submit', function (ev) {
		ev.preventDefault();

		// Google Maps Geo-coder will take an address and convert it to lat/lng
		var geocoder = new google.maps.Geocoder();

		geocoder.geocode({
			// Append 'Ottawa, ON' so our users don't have to
			address : $('#adr').val() + ', Ottawa, ON'
			, region : 'CA'
		}, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					displayUserLoc(results[0].geometry.location.lat(), results[0].geometry.location.lng());
				}
			}
		);
	});
});
