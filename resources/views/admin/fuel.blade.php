@extends('.admin.master')
@section('title','Mileage')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <form class="form-inline w-100 pt-3 pb-3 justify-content-center" action="{{ route('show.user.track') }}" method="POST">
                            {{csrf_field()}}
                            <select id="userName" name="user_id" class="form-control m-2">
                                <option value="">Select User</option>
                                @foreach ($data as $index => $name)
                                    <option value="{{ $name["user_id"]}}" >{{  $name["name"] }}</option>
                                @endforeach
                            </select>
                            <input required type="text" name="start_time_stamp" class="form-control m-2" id="StartTimeStamp" placeholder="Start Time">
                            <input  required type="text" name="end_time_stamp" class="form-control m-2" id="EndtTimeStamp" placeholder="End Time">
{{--                            <select id="mileage" class="form-control m-2">--}}
{{--                                <option>Select Mileage</option>--}}
{{--                                @for($i = 40; $i<= 80; $i+= 10)--}}
{{--                                <option value="{{$i}}" >{{$i}} m/l</option>--}}
{{--                                @endfor--}}
{{--                            </select>--}}
                            <div class="container">
                                <div class="row  m-1">
                                    <div class="input-group pr-2 pl-8">
                                        <input type="text" class="form-control" id="mileage" placeholder="mileage">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Km/L</span>
                                        </div>
                                    </div>
                                    <div class="input-group pr-2">
                                        <input type="text" id="stall_fuel_usage" name="stall_fuel_usage" class="form-control" placeholder="stall fuel usage" >
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ml/h</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container">
                                <div class="row m-1">
                                    <div class="input-group pr-2">
                                        <input type="text" class="form-control" id="mileage_below_20" placeholder="mileage below 20">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Km/L</span>
                                        </div>
                                    </div>
                                    <div class="input-group pr-2">
                                        <input type="text" id="mileage_below_40" name="stall_fuel_usage" class="form-control" placeholder="mileage below 40">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Km/L</span>
                                        </div>
                                    </div>
                                    <div class="input-group pr-2">
                                        <input type="text" id="mileage_over_40" name="stall_fuel_usage" class="form-control" placeholder="mileage over 40">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Km/L</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

{{--                            <select id="change_chart" class="form-control m-2">--}}
{{--                                <option>Select Stall Fuel Usage</option>--}}
{{--                                @for($i = 40; $i<= 80; $i+= 10)--}}
{{--                                    <option value="{{$i}}" >{{$i}} m/l</option>--}}
{{--                                @endfor--}}
{{--                            </select>--}}
                            <button type="submit" class="btn btn-primary" id="submit">Get Track</button>

                        </form>

                        <div class="row w-100 justify-content-center d-flex" id="result">

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4 border border-primary pt-2" id="stall">
                        </div>
                        <div class="col-md-8">
                            <div id="length"></div>

                            <div id="map" style="height: 105vh;border: 2px solid gray;width: 80vw"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#stall').hide();
        let map;
        jQuery('#StartTimeStamp').datetimepicker({
            format:'Y-m-d H:i:s',
        });
        jQuery('#EndtTimeStamp').datetimepicker({
            format:'Y-m-d H:i:s',
        });
        $(function (){
            loadMap();
            $('#submit').click(function (event){
                event.preventDefault();
                let data = {
                    'user_id' : $('#userName').val(),
                    // 'user_id' : 1,
                    'start_time_stamp' : $('#StartTimeStamp').val(),
                    'end_time_stamp' : $('#EndtTimeStamp').val(),
                    'mileage' : $('#mileage').val(),
                    'stall_fuel_usage' : $('#stall_fuel_usage').val(),
                    'mileage_below_20' : $('#mileage_below_20').val(),
                    'mileage_below_40' : $('#mileage_below_40').val(),
                    'mileage_over_40' : $('#mileage_over_40').val(),
                };

                $.ajax({
                    method : 'GET',
                    url : "https://backend.barikoi.com:8888/api/v1/fuel-consumption",
                    //url : "http://localhost:81/api/v1/fuel-consumption",
                    data : data
                }).done(function (response){
                    setLineString(response);
                        console.log(response)
                });

            });
            function setSpeedInfoTable(response){
                // let flag = false;
                // if(!response.trip_info){
                //     flag = true;
                //     let f = flag?"hihihi": response.trip_info.speed_wise_info.speed_wise_total_fuel_usage;
                //     console.log(f);
                //     //console.log('hi1'+ flag?'':response.trip_info.speed_wise_info.speed_wise_total_fuel_usage +'h2');
                // }
                $('#stall').show();
                $('#stall').empty();
                $('#map').css({"width" : "53vw"});
                // try {
                    let fuel_speed = '<table class="table table-success table-striped">' +
                    '<thead>' +
                    '<h5 class="text-center">Fuel useage based on speed</h5>' +
                    '</thead>' +
                    '<tbody>' +
                    '<tr>' +
                    '<th scope="row">Total Fuel usage</th>' +
                    '<td>' + response.trip_info.speed_wise_info.speed_wise_total_fuel_usage + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th scope="row">Fuel usage below 20</th>' +
                    '<td>' +  response.trip_info.speed_wise_info.speed_wise_fuel_usage.fuel_usage_below_20 + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th scope="row">Fuel usage below 40</th>' +
                    '<td>' + response.trip_info.speed_wise_info.speed_wise_fuel_usage.fuel_usage_below_40 + 'L' + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th scope="row">Fuel usage over 40</th>' +
                    '<td>' + response.trip_info.speed_wise_info.speed_wise_fuel_usage.fuel_usage_over_40 + 'L' + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th scope="row">Distance Travelled below 20</th>' +
                    '<td>' +  response.trip_info.speed_wise_info.speed_wise_distances.distance_below_20 + 'Km' + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th scope="row">Distance Travelled below 40</th>' +
                    '<td>' + response.trip_info.speed_wise_info.speed_wise_distances.distance_below_40 + 'Km' + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th scope="row">Distance Travelled over 40</th>' +
                    '<td>' + response.trip_info.speed_wise_info.speed_wise_distances.distance_over_40 + 'Km' + '</td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>';
                    console.log(fuel_speed);
                // }catch(err){
                //     console.log(err.message)
                //     console.log("catch")
                // }
                console.log(fuel_speed);
                $('#stall').append(fuel_speed);
            }

            function setLineString(response)
            {
                // let flag = false;
                // if(!response.trip_info){
                //      flag = true;
                // }

                let lines = response.trip_info.rdp_track;
                let fuel_time =  '<table class="table table-success table-striped">'+
                    '<thead>' +
                    '<h5 class="text-center">Fuel useage based on stall time</h5>'+
                    '</thead>' +
                    '<tbody>'+
                    '<tr>'+
                        '<th scope="row">Total Travelled</th>'+
                        '<td>'+response.trip_info.total_distance+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<th scope="row">Total Fuel Usage</th>'+
                        '<td>'+response.trip_info.total_fuel_usage+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<th scope="row">Total Stall Time</th>'+
                        '<td>'+response.trip_info.total_stall_time+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<th scope="row">Stall Fuel Usage</th>'+
                        '<td>'+response.trip_info.stall_fuel_usage+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<th scope="row">Total Trip Time</th>'+
                        '<td>'+response.trip_info.trip_time+'</td>'+
                    '</tr>'+
                    '</tbody>' +
                '</table>';
                // let result = '<table>'+
                //     '<tr>'+
                //         '<td style="padding: 10px">Total Travelled :'+response.trip_info.total_distance+'</td>'+
                //         '<td style="padding: 10px">Total Fuel Usage :'+response.trip_info.total_fuel_usage+ '</>'+
                //         '<td style="padding: 10px">Total Stall Time :'+response.trip_info.total_stall_time+'</td>'+
                //         '<td style="padding: 10px">Stall Fuel Usage :'+response.trip_info.stall_fuel_usage+'</td>'+
                //         '<td style="padding: 10px">Total Trip Time :'+response.trip_info.trip_time+' </td>'+
                //     '</tr>'+
                //     // '<tr>'+
                //     //
                //     // '</tr>'+
                //     // '<tr>'+
                //     //
                //     // '<td></td>'+
                //     // '</tr>'+
                //     '</table>';
                //$('#stall').append(fuel_time);
                setSpeedInfoTable(response);
                $('#stall').append(fuel_time);
                //$('#result').append(result);
                L.geoJSON(lines,{
                    onEachFeature: function (feature, layer) {
                        layer.bindPopup('<div>'+
                                            '<div>' +
                                                '<ul>'+
                                                    // '<li>'+ 'Total Travelled: '+response.trip_info.total_distance+'</li>'+
                                                    // '<li>'+ 'Total Fuel Usage: '+response.trip_info.total_fuel_usage+'</li>'+
                                                    // '<li>'+ 'Total Stall Time: '+response.trip_info.total_stall_time+'</li>'+
                                                    // '<li>'+ 'Trip Time: '+response.trip_info.trip_time+'</li>'+
                                                    '<li>'+ 'Info based on speed : '+'</li>'+
                                                    '<li>'+ 'Fuel usage: '+response.trip_info.speed_wise_info.speed_wise_total_fuel_usage+'</li>'+
                                                    '<li>'+ 'Fuel usage below 20: '+response.trip_info.speed_wise_info.speed_wise_fuel_usage.fuel_usage_below_20+'L'+'</li>'+
                                                    '<li>'+ 'Fuel usage below 40: '+response.trip_info.speed_wise_info.speed_wise_fuel_usage.fuel_usage_below_40+'L'+'</li>'+
                                                    '<li>'+ 'Fuel usage over 40: '+response.trip_info.speed_wise_info.speed_wise_fuel_usage.fuel_usage_over_40+'L'+'</li>'+
                                                    '<li>'+ 'Distance travelled below 20: '+response.trip_info.speed_wise_info.speed_wise_distances.distance_below_20+'Km'+'</li>'+
                                                    '<li>'+ 'Distance travelled below 40: '+response.trip_info.speed_wise_info.speed_wise_distances.distance_below_40+'Km'+'</li>'+
                                                    '<li>'+ 'Distance travelled over 40: '+response.trip_info.speed_wise_info.speed_wise_distances.distance_over_40+'Km'+'</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</div>');
                    }
                }).addTo(map);
            }
        });
        function loadMap()
        {
            map = L.map('map',{
            }).setView(new L.LatLng(23.8103,90.4125), 13);

            L.tileLayer('https://map.barikoi.com/styles/barikoi-dark/{z}/{x}/{y}.png',{
                attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
            }).addTo(map);
        }
    </script>
@endsection

