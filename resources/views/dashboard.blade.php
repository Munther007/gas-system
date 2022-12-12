<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- <link rel="stylesheet" href="sidebar.css">  -->
<!-- <link rel="stylesheet" href="{{ url('css/sidebar.css')}}"> -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--<title>Admin Dashboard Panel</title>-->

</head>
<body>
<nav>
    <div class="logo-name">
        <span class="logo_name ">OPDC</span>
        <div class="logo-image">
            <img src="logo.png" alt="">
        </div>


    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="/">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">الصفحة الرئيسية</span>
                </a></li>
            @if (Auth::user()->role_id==1)
            <li><a href="/admin/user">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">المستخدمين</span>
                </a></li>
            <li><a href="/admin/role">
                    <i class="fas fa-user-cog"></i>
                    <span class="link-name">الصلاحيات</span>
                </a></li>
                <li>
                    <ul>
                        <a href="/log-viewer">
                            <i class="fa-sharp fa-solid fa-chart-line"></i>
                            <span class="link-name">سجل النشاطات</span>
                        </a>
{{--                        <li class="submenu-item">--}}
{{--                            <a href="{{ route('userManagement') }}">لوحة تحكم المستخدم</a>--}}
{{--                        </li>--}}
{{--                        <li class="submenu-item">--}}
{{--                            <a href="{{ route('activity/log') }}">سجل نشاط المستخدم</a>--}}
{{--                        </li>--}}
{{--                        <li class="submenu-item">--}}
{{--                            <a href="{{ route('activity/login/logout') }}">سجل النشاطات</a>--}}
{{--                        </li>--}}
                    </ul>

                </li>
            @endif

            <li><a href="{{route('cars.index')}}">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">جميع البطاقات</span>
                </a></li>
            <li><a href="">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">البطاقات المفعلة</span>
                </a>
            </li>
            <li><a href="{{route('scan')}}">
                    <i class="fa-regular fa-address-card"></i>
                    <span class="link-name">تفعيل بطاقة جديدة</span>
                </a>
            </li>
        </ul>

        <ul class="logout-mode">
            <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">تسجيل خروج
                        <!-- Authentication -->
                         <form class="link-name" method="POST" action="{{ route('logout') }}">
                          @csrf
                           <x-jet-dropdown-link
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               this.closest('form').submit();" role="button">
                            تسجيل خروج
                            </x-jet-dropdown-link>
                           </form>
                    </span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">الوضع المظلم </span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

<main class="dashboard" >
    <div class="top">
        <!-- <i class="uil uil-bars sidebar-toggle"></i> -->
        <i class="fa-solid fa-arrow-right sidebar-toggle"></i>

        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="أبحث هنا...">
        </div>

{{--        <img src="images/profile.jpg" alt="">--}}
    </div>
<!-- @yield('content') -->
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">لوحة التحكم</span>
            </div>

            <div class="boxes">
                <div class="box box1">
                    <!-- <i class="uil uil-thumbs-up"></i> -->
                    <i class="fa-solid fa-address-card"></i>
                    <span class="text">عدد البطائق المفعلة </span>
                    <span class="number">0</span>
                </div>
                <div class="box box2">
                    <!-- <i class="uil uil-comments"></i> -->
                    <i class="fa-solid fa-address-card"></i>
                    <span class="text">عدد البطائق غير المفعلة</span>
                    <span class="number">{{\App\Models\Car::all()->count()}}</span>
                </div>
                <div class="box box3">
                    <!-- <i class="uil uil-share"></i> -->
                    <i class="fa-solid fa-users-rectangle"></i>
                    <span class="text">عدد الزائرين </span>
                    <span class="number">0</span>
                </div>
                <div class="box box4">
                    <!-- <i class="uil uil-share"></i> -->
                    <i class="fa-solid fa-users"></i>
                    <span class="text">عدد المستخدمين </span>
                    <span class="number">{{\App\Models\User::all()->count()}}</span>
                </div>
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">النشاطات الاخيرة</span>
            </div>
            <div class="charts">



                <div class="charts-card">
                    <p class="chart-title"> حالات البطــــاقات </p>
                    <div id="area-chart"></div>
                </div>

                <div class="charts-card">
                    <p class="chart-title">البطـــاقات المفعلة</p>
                    <div id="bar-chart"></div>
                </div>
                <text id="SvgjsText1644" font-family="Helvetica, Arial, sans-serif" x="171.5" y="161.5" text-anchor="middle" dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">المجموع الكلي</text>
            </div>
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="content-data">--}}
{{--                        <div class="chart">--}}
{{--                            <div id="chart">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div id="map" style="height: 300px;width: 600px;"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</main>
<!-- {{-- <script src="sidebar.js"> --}} -->

<!-- ApexCharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<script>
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').val('');
    $('#longitude').val('');
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.740691, lng: 46.6528521 },
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pos),
                    map: map,
                    title: 'موقعك الحالي'
                });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow,marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            console.log('dsdsdsdsddsd');
            handleLocationError(false, infoWindow, map.getCenter());
        }
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log( results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });
        function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
            var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitude').val(markerCurrent.position.lat());
            $('#longitude').val(markerCurrent.position.lng());
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(8);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
        }
        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("أبحث هنا ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    function splitLatLng(latLng){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitude").val(lat);
        $("#longitude").val(Lng);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
         async defer"></script>
<script>

    // pie charts
    var barChartOptions = {
        series: [44, 55, 41, 'hkomi'],
        chart: {
            type: 'donut',
            height: 350,

            toolbar: {
                show: false
            },
            colors: [
                "#246dec",
                "#cc3c43",
                "#367952",
                "#f5b74f"
            ],
        },
// stroke: {
//   width: 0,
// },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        total: {
                            showAlways: true,
                            show: true,
                            fontSize: '1.2rem',
                            color: '#337ab7',

                        }
                    }
                }
            }
        },
// dataLabels:{
//   enabled:true,
// },
        labels: ["الحمل", "الخصوصي", "الاجرة", "الحكومي"],
        dataLabels: {
            // dropShadow: {
            //   blur: 3,
            //   opacity: 0.8
            // }
        },

// fill: {
//   type: 'pattern',
//     opacity: 1,
//     pattern: {
//       enabled: true,
//       style: ['verticalLines', 'squares', 'horizontalLines', 'circles','slantedLines'],
//     },
//   },
        states: {
            hover: {
                filter: 'none'
            }
        },
        // theme: {
        //   palette: 'palette2'
        // },
        // title: {
        //   text: "Favourite Movie Type"
        // },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
    barChart.render();

    // // the second pie
    // var barChartOptions = {
    //   series: [44, 55, 41, 17],
    //   chart: {
    //   height: 380,
    //   type: 'donut',
    //   dropShadow: {
    //     enabled: true,
    //     color: '#111',
    //     top: -1,
    //     left: 3,
    //     blur: 3,
    //     opacity: 0.2
    //   }
    // },
    // stroke: {
    //   width: 0,
    // },
    // plotOptions: {
    //   pie: {
    //     donut: {
    //       labels: {
    //         show: true,
    //         total: {
    //           showAlways: true,
    //           show: true
    //         }
    //       }
    //     }
    //   }
    // },
    // labels: ["Comedy", "Action", "SciFi", "Drama", "Horror"],
    // dataLabels: {
    //   dropShadow: {
    //     blur: 3,
    //     opacity: 0.8
    //   }
    // },
    // fill: {
    // type: 'pattern',
    //   opacity: 1,
    //   pattern: {
    //     enabled: true,
    //     style: ['verticalLines', 'squares', 'horizontalLines', 'circles','slantedLines'],
    //   },
    // },
    // states: {
    //   hover: {
    //     filter: 'none'
    //   }
    // },
    // theme: {
    //   palette: 'palette2'
    // },
    // title: {
    //   text: "Favourite Movie Type"
    // },
    // responsive: [{
    //   breakpoint: 480,
    //   options: {
    //     chart: {
    //       width: 200
    //     },
    //     legend: {
    //       position: 'bottom'
    //     }
    //   }
    // }]
    // };

    // var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
    // barChart.render();
    // //

    // AREA CHART
    var areaChartOptions = {
        series: [{
            name: 'البطاقات المفعلة ',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'جميع البطاقات',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false,
            },
        },
        colors: ["#4f35a1", "#246dec"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth'
        },
        labels: ["كانون الثاني", "شباط", "اذار", "نيسان", "مايو", "ايار", "حزيران"],
        markers: {
            size: 0
        },
        yaxis: [
            {
                title: {
                    // text: 'Purchase Orders',
                },
            },
            {
                opposite: true,
                title: {
                    text: ' البطاقات المفعلة',
                },
            },
        ],
        tooltip: {
            shared: true,
            intersect: false,
        }
    };

    var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
    areaChart.render();

    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if(getMode && getMode ==="dark"){
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if(getStatus && getStatus ==="close"){
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () =>{
        body.classList.toggle("dark");
        if(body.classList.contains("dark")){
            localStorage.setItem("mode", "dark");
        }else{
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if(sidebar.classList.contains("close")){
            localStorage.setItem("status", "close");
        }else{
            localStorage.setItem("status", "open");
        }
    })

</script>
</body>
</html>

{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <x-jet-welcome />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

