function initMap() {
	var customMapType = new google.maps.StyledMapType(
	[{"featureType":"all","elementType":"geometry.stroke","stylers":[{"hue":"#176DAD"},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#b4d2df"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"color":"#1C2E36"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#1C2E36"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#E8EAEB"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"gamma":"4.40"},{"lightness":"-70"},{"saturation":"59"},{"weight":"1.39"},{"visibility":"on"},{"color":"#005072"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#1C2E36"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#1C2E36"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#1C2E36"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"saturation":"11"},{"lightness":"1"},{"gamma":"3.27"},{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#E8EAEB"}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#176DAD"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#176DAD"}]}],
    {
		name: 'Investing in Norway map'
	});

	var customMapTypeId = 'custom_style';

	var isDraggable = !('ontouchstart' in document.documentElement);

	var myLatLng = {lat: 59.91313, lng: 10.73632};

	var map = new google.maps.Map(document.getElementById('map'), {
		draggable: isDraggable,
		zoom: 18,
		scrollwheel: false,
		center: myLatLng,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
		}
	});

	//var iconBase = 'http://localhost:3000/invest_in_norway_prod/wp-content/themes/investinginnorway/dist/images/svg/';
	var iconBase = 'http://dev.push-media.no/investinginnorway/wp-content/themes/investinginnorway/dist/images/svg/';

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: 'Investing in Norway',
		icon: {
      url: iconBase + 'icon-map-marker.svg',
			size: new google.maps.Size(50, 50)
    }
	});

	google.maps.event.addDomListener(window, "resize", function() {
		var center = map.getCenter();

		google.maps.event.trigger(map, "resize");
		map.setCenter(center);
	});

	map.mapTypes.set(customMapTypeId, customMapType);
	map.setMapTypeId(customMapTypeId);
}
