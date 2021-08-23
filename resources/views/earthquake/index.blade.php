@extends('layout.default')

@section('content')

<style type="text/css"> //style map
    #mymap {
        border: 1px solid red;
        width: 100%;
        height: 100vh;
    }
</style>

<div class="container">
    <div class="row mb-5">
        <div class="col-12">
            <div id="mymap"></div> //google map
        </div>
    </div>
</div>

<script type="text/javascript">
    var mymap = new GMaps({ // setmap center
      el: '#mymap',
      lat: 16.542746235328945,
      lng: 0.006936576886640835,
      zoom:2
    });

    $.get("https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson", function(data){ //cal api earthquake
        var locations = data.features;
        $.each( locations, function( index, value ){ //loop location
            mymap.addMarker({ //marker pin location
                lat: value.geometry.coordinates[0],
                lng: value.geometry.coordinates[0],
                title: value.properties.title,
                click: function(e) { //popup location name when click
                  alert('This is '+value.properties.place);
                }
            });
        });
    });
</script>
@endsection
