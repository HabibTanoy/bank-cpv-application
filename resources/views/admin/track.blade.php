@extends('.admin.master')
@section('title','track')
@section('content')

{{--            <head>--}}
{{--                <meta charset="utf-8" />--}}
{{--                <style>--}}
{{--                    body { margin: 0; padding: 0; }--}}
{{--                    #map { position: absolute; top: 30%; bottom: 0; width: 100%; margin: 20px; }--}}
{{--                </style>--}}
{{--            </head>--}}
{{--            <body>--}}
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

{{--            <div class="container-fluid">--}}

                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form class="form-inline w-100 pt-3 pb-3 justify-content-center" action="{{ route('show.user.track') }}" method="POST">
                                        {{csrf_field()}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="userName">Users</label>--}}
                                            <select id="userName" name="user_id" class="form-control m-2">
                                                <option value="">Select User</option>
                                                @foreach ($data as $index => $name)
                                                    <option value="{{ $name["user_id"]}}" >{{  $name["name"] }}</option>
                                                @endforeach
                                            </select>

{{--                                            <div class="form-group">--}}
{{--                                                <label for="stratTimeStamp" class="sr-only">Start Time</label>--}}
                                                <input required type="text" name="start_time_stamp" class="form-control m-2" id="StartTimeStamp" placeholder="Start Time">
{{--                                            </div>--}}

{{--                                            <div class="form-group">--}}
{{--                                                <label for="EndTimeStamp" class="sr-only">End Time</label>--}}
                                                <input  required type="text" name="end_time_stamp" class="form-control m-2" id="EndtTimeStamp" placeholder="End Time">
{{--                                            </div>--}}

{{--                                        </div>--}}
                                        <select id="change_chart" class="form-control m-2">
{{--                                            <option value="0" selected>Select Route</option>--}}
                                            <option value="1" >Raw Gps Route</option>
                                            <option value="2">Rdp Route</option>
                                            <option value="3">Improved Route</option>
                                            <option value="4">Points route</option>
{{--                                            <option value="3">Rdp Map Matched</option>--}}
{{--                                            <option value="4--}}
{{--">Clear</option>--}}
                                        </select>

                                        <button type="submit" class="btn btn-primary">Get Track</button>

                                    </form>


                                </div>
                                <div class="row">
                                    <div id="length"></div>
                                    <div id="map" style="height: 75vh;border: 2px solid gray;width: 100vw"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--            </body>--}}
<script>
    jQuery('#StartTimeStamp').datetimepicker({
        format:'Y-m-d H:i:s',
    });
    jQuery('#EndtTimeStamp').datetimepicker({
        format:'Y-m-d H:i:s',
    });
    var data ={!! json_encode($line) !!};
    var points =  {!! json_encode($points) !!};
    //console.log(JSON.parse(data));

    //console.log(JSON.parse(points).features.geometry);

    var map = L.map('map',{
    }).setView(new L.LatLng(23.8103,90.4125), 13);
    // var geojsonFeature = {
    //     "type": "Feature",
    //     "geometry": {
    //         "coordinates": [[90.401151, 23.78736], [90.400616, 23.787416], [90.400716, 23.787923], [90.400817, 23.788539], [90.401342, 23.788474], [90.400817, 23.788539], [90.400716, 23.787923], [90.400007, 23.788042], [90.399967, 23.788049], [90.399952, 23.78796], [90.399339, 23.784319], [90.39925, 23.783927], [90.398944, 23.782108], [90.398478, 23.779615], [90.398389, 23.779261], [90.398364, 23.779203], [90.398254, 23.778943], [90.398025, 23.778638], [90.39782, 23.77843], [90.397591, 23.778267], [90.397211, 23.778059], [90.39613, 23.777532], [90.395787, 23.777341], [90.393981, 23.776251], [90.393127, 23.77578], [90.393, 23.775727], [90.392787, 23.77566], [90.392471, 23.775602], [90.392175, 23.775553], [90.390947, 23.775376], [90.390511, 23.775314], [90.39025, 23.775277], [90.390015, 23.775257], [90.390007, 23.775203], [90.390013, 23.775088], [90.390136, 23.77409], [90.390187, 23.773656], [90.390192, 23.773617], [90.390205, 23.773405], [90.390171, 23.773083], [90.390119, 23.772769], [90.390037, 23.772243], [90.389796, 23.771011], [90.38978, 23.770925], [90.389765, 23.770853], [90.389662, 23.770382], [90.389623, 23.770179]], "type": "LineString"}
    // };
    L.tileLayer('https://map.barikoi.com/styles/barikoi-dark/{z}/{x}/{y}.png',{
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);
    console.log(data)

     var i;
     var lines = [];


    var menu = document.getElementById("change_chart");
    menu.addEventListener("change", generateData);
    // let layer = null;
    // if (layer != null){
    //     layer.clearLayers();
    // }
    function plotPoints(){
        var d = JSON.parse(points).features;
        var myRenderer = L.canvas({ padding: 0.5 });

        for (i =0;i<d.length;i++) {
            L.circleMarker([d[i].geometry.coordinates[1],d[i].geometry.coordinates[0]],{radius: .5},{
                renderer: myRenderer,
                weight: 1
            }).addTo(map);
        }

        // for(i =0;i<d.length;i++){
        //     console.log(d[i].geometry.coordinates[0])
        // }
    }
    function generateData(event) {
        if (menu.value == '1') {
            lines = []
            for (i = 0; i < data.length-1; i++) {
                lines.push(JSON.parse(data[i].geo_json));
            }
            $(".leaflet-interactive").remove();
            L.geoJSON(lines).addTo(map);
//console.log(data[i].length);
            var div = document.getElementById('length');
            div.innerHTML = '';
            div.innerHTML += '<strong>' + 'Raw Gps track length :' + data[0].length + ' km' + '</strong>';

        } else if (menu.value == '2') {
            lines = []
            for (i = 0; i < data.length-1; i++) {
                lines.push(JSON.parse(data[i].rdp));
            }
            $(".leaflet-interactive").remove();
            L.geoJSON(lines).addTo(map);
            var div = document.getElementById('length');
            div.innerHTML = '';
            div.innerHTML += '<strong>' + 'Rdp track length :' + data[0].rdp_length + ' km' + '</strong>';

        }
        else if (menu.value == '3') {
            //console.log(data[data.length-1].improved_routes[0].improved_route_json)
            lines = []


            for(i =0;i<data[data.length-1].improved_routes.length;i++){
               // console.log(data[data.length-1].improved_routes[i].improved_route_json);

                lines.push(JSON.parse(data[data.length-1].improved_routes[i].improved_route_json));

            }
            $(".leaflet-interactive").remove();
            L.geoJSON(lines).addTo(map);
            var div = document.getElementById('length');
            div.innerHTML = '';
            div.innerHTML += '<strong>' + 'Improved track length :' + data[data.length-1].improved_routes[0].improved_route_length + ' km' + '</strong>';
        }else if (menu.value == '4'){
            $(".leaflet-interactive").remove();
            plotPoints();
            //L.geoJSON(JSON.parse(points)).addTo(map);
        }
        else  {
            lines = []
            $(".leaflet-interactive").remove();
            var div = document.getElementById('length');
            div.innerHTML = '';
            //layer = L.geoJSON(lines);
            //L.geoJSON(lines).addTo(map);
        }
    }
    function showLength() {
        var x = document.getElementById("length");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    //layer.addTo(map)
    //L.geoJSON(lines).addTo(map);
</script>


@endsection
{{--@section('scripts')--}}
{{--    <script src="{{ asset('js/track.js') }}"></script>--}}
{{--@stop--}}
