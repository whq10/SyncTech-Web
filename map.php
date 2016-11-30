<script src="https://maps.google.com/maps/api/js?sensor=true&key=AIzaSyD4TkohH5jLaOajSW0uHlkzTC49-nZWkFs" type="text/javascript"></script>

<!-- This css is to ensure that the google map contols (zoom bar etc) show and size correctly. -->
<style>
    #map_canvas img {
        max-width: none;
    }
</style>

<!-- This css is to give a nice big popup "info window" when a marker is clicked on the map -->
<style>
    .infoDiv {
        height: 200px;
        width: 300px;
        -webkit-user-select: none;
        background-color: white;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
    }

        #pac-input:focus {
            border-color: #4d90fe;
        }

    .pac-container {
        font-family: Roboto;
    }



</style>

<input id="pac-input" class="controls" type="text" placeholder="Search Box">

<!-- This is the div that will contain the Google Map -->
<div id="map_canvas" style="height: 600px;"></div>

<!-- Enclose the Javascript in a "section" so that it is rendered in the correct order after scripts have been loaded etc -->
@section scripts {
    <section class="scripts">

        <script type="text/javascript">
    $(document).ready(function () {
        Initialize();
    });

    // Where all the fun happens
    function Initialize() {

        // Google has tweaked their interface somewhat - this tells the api to use that new UI
        google.maps.visualRefresh = true;
        //var Liverpool = new google.maps.LatLng(53.408841, -2.981397);
        //var Liverpool = new google.maps.LatLng(49.93, -97.16);//winnipeg
        var Liverpool = new google.maps.LatLng(49.774393, -97.168071);//my house

        // These are options that set initial zoom level, where the map is centered globally to start, and the type of map to show
        var mapOptions = {
            zoom: 14,
            center: Liverpool,
            mapTypeId: google.maps.MapTypeId.G_NORMAL_MAP
        };


        





        // This makes the div with id "map_canvas" a google map
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        // This shows adding a simple pin "marker" - this happens to be the Tate Gallery in Liverpool!
        //var myLatlng = new google.maps.LatLng(53.40091, -2.994464);
        var myLatlng = new google.maps.LatLng(49.774393, -97.168071);//my house

        //var myLatlng = new google.maps.LatLng(49.93, -97.16);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: '3 Isleview Place'
        });

        // You can make markers different colors...  google it up!
        marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')

        // a sample list of JSON encoded data of places to visit in Liverpool, UK
        // you can either make up a JSON list server side, or call it from a controller using JSONResult
        var data = [
                  { "Id": 1, "PostalCode": "R3T5X1", "CustomerNumbers": "25", "GeoLong": "49.774393", "GeoLat": "-97.168071" }
                                  
        ];



        //bruce test for search box
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        //var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        //// Bias the SearchBox results towards current map's viewport.
        //map.addListener('bounds_changed', function () {
        //    searchBox.setBounds(map.getBounds());
        //});


        // Using the JQuery "each" selector to iterate through the JSON list and drop marker pins
        $.each(data, function (i, item) {
            var marker = new google.maps.Marker({
                'position': new google.maps.LatLng(item.GeoLong, item.GeoLat),
                'map': map,
                'title': item.PlaceName
            });

            // Make the marker-pin blue!
            marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png')

            // put in some information about each json object - in this case, the opening hours.
            var infowindow = new google.maps.InfoWindow({
                content: "<div class='infoDiv'><h2>" + item.PostalCode + "</h2>" + "<div><h4>Customer Numbers: " + @ViewBag.Total + "</h4></div></div>"
            });


            //R3T 5X1
            var point1 = new google.maps.LatLng(49.775742, -97.166084);
            var point2 = new google.maps.LatLng(49.7755589, -97.166117);
            var point3 = new google.maps.LatLng(49.775187, -97.166020);
            var point4 = new google.maps.LatLng(49.774889, -97.165752);
            var point5 = new google.maps.LatLng(49.774314, -97.164679);
            var point6 = new google.maps.LatLng(49.773178, -97.167930);
            var point7 = new google.maps.LatLng(49.774002, -97.168638);
            var point8 = new google.maps.LatLng(49.773919, -97.168895);
            var point9 = new google.maps.LatLng(49.774058, -97.168981);
            var point10 = new google.maps.LatLng(49.774245, -97.169110);
            var point11 = new google.maps.LatLng(49.774584, -97.169389);
            var myTrip = [point1, point2, point3, point4, point5, point6, point7, point8, point9, point10, point11, point1];
            var flightPath=new google.maps.Polygon({
                path:myTrip,
                strokeColor:"#0000FF",
                strokeOpacity:0.8,
                strokeWeight:2,
                fillColor:"#0000FF",
                fillOpacity:0.1
            });

            flightPath.setMap(map);

            //R3T 2P6
            var r3t2p6_point1 = new google.maps.LatLng(49.797280, -97.165047);
            var r3t2p6_point2 = new google.maps.LatLng(49.796955, -97.164789);
            var r3t2p6_point3 = new google.maps.LatLng(49.796962, -97.164725);
            var r3t2p6_point4 = new google.maps.LatLng(49.796491, -97.164328);
            var r3t2p6_point5 = new google.maps.LatLng(49.796387, -97.164521);
            var r3t2p6_point6 = new google.maps.LatLng(49.796415, -97.164585);
            var r3t2p6_point7 = new google.maps.LatLng(49.796179, -97.165261);
            var r3t2p6_point8 = new google.maps.LatLng(49.795764, -97.165004);
            var r3t2p6_point9 = new google.maps.LatLng(49.795653, -97.165250);
            var r3t2p6_point10 = new google.maps.LatLng(49.795951, -97.165465);
            var r3t2p6_point11 = new google.maps.LatLng(49.795840, -97.166227);
            var r3t2p6_point12 = new google.maps.LatLng(49.796477, -97.166559);
            var r3t2p6_point13 = new google.maps.LatLng(49.796138, -97.167514);
            var r3t2p6_point14 = new google.maps.LatLng(49.796595, -97.167922);
            var r3t2p6_point15 = new google.maps.LatLng(49.796955, -97.166817);
            var r3t2p6_point16 = new google.maps.LatLng(49.797170, -97.166946);
            var r3t2p6_myTrip = [r3t2p6_point1, r3t2p6_point2, r3t2p6_point3, r3t2p6_point4, r3t2p6_point5, r3t2p6_point6, r3t2p6_point7, r3t2p6_point8, r3t2p6_point9, r3t2p6_point10, r3t2p6_point11, r3t2p6_point12, r3t2p6_point13, r3t2p6_point14, r3t2p6_point15, r3t2p6_point16, r3t2p6_point1];

            var r3t2p6_flightPath = new google.maps.Polygon({
                path: r3t2p6_myTrip,
                strokeColor: "#00FF00",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#00FF00",
                fillOpacity: 0.1
            });

            r3t2p6_flightPath.setMap(map);



            // finally hook up an "OnClick" listener to the map so it pops up out info-window when the marker-pin is clicked!
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });

        })
    }


        </script>
    </section>
}
