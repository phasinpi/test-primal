@extends('layout.default')

@section('content')

<style type="text/css">
    #mymap {
        border: 1px solid red;
        width: 100%;
        height: 100vh;
    }
</style>

<div class="container">
    <div class="row mb-5">
        <div class="col-12">
            <div id="mymap"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var mymap = new GMaps({
      el: '#mymap',
      lat: 16.542746235328945,
      lng: 0.006936576886640835,
      zoom:2
    });

    $.get("https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson", function(data){
        var locations = data.features;
        $.each( locations, function( index, value ){
            console.log(value.geometry.coordinates[0]);
            mymap.addMarker({
                lat: value.geometry.coordinates[0],
                lng: value.geometry.coordinates[0],
                title: value.properties.title,
                click: function(e) {
                  alert('This is '+value.properties.place);
                }
            });
        });
    });
    {{-- var locations = {{$response['features']}};
    console.log(locations); --}}

    {{-- var mymap = new GMaps({
      el: '#mymap',
      lat: 21.170240,
      lng: 72.831061,
      zoom:6
    }); --}}

{{--
    $.each( locations, function( index, value ){
        console.log(value['geometry']['coordinates'][0]);
	    mymap.addMarker({
	      lat: value['geometry']['coordinates'][0],
	      lng: value.lng,
	      title: value.city,
	      click: function(e) {
	        alert('This is '+value.city+', gujarat from India.');
	      }
	    });
   }); --}}
</script>
@endsection
