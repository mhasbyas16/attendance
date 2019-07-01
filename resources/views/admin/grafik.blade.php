<head>
    <link rel="stylesheet" href="{{url('assets/css/materializes.css')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{url('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- Select Plugin Js -->
    <script src="{{url('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('assets/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{url('assets/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{url('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{url('assets/plugins/morrisjs/morris.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{url('assets/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{url('assets/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{url('assets/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{url('assets/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{url('assets/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{url('assets/js/admin.js')}}"></script>
    <script src="{{url('assets/js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{url('assets/js/demo.js')}}"></script>
    <script src="{{url('assets/js/all.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script type="text/javascript" src="assets/Chart.js-master/src/chart.js"></script>
    <script>
$(document).ready(function(){
    $("#btn1").click(function(){
        $("#attendance").fadeToggle();
    });
    $("#btn2").click(function(){
         $("#activity").fadeToggle();
    });
    $("#cust").click(function(){
         $("#addcust").fadeToggle();
    });
});

</script>


</head>

@extends('templatee')
@section('isi')

    <div class="all-page-title" style="padding-top: 50px; padding-bottom: 150px; background-image:url('{{url('assets/img/pattern-4.png')}}');">
        <div class="container text-center">
            <ul class="nav navbar-nav navbar-right hidden-md hidden-sm" style="align-items: center;">
                <li><a href="{{url('/logout')}}" onclick="return confirm ('Are you Sure Want Logout {{Session::get('nama')}} ?')"><button type='button' class="btn-dark"><i class="fa fa-angle-double-left"></i>Log Out</button></a></li>
            </ul>
        </div>
        <div class="container text-center">
            <h1>DASHBOARD</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="font-size: 20; color: black"><strong>Smart Graphic For Your Information</strong></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->

@include('admin.awan.gaya_awan')

<body>
       <!-- Widgets -->
       <div class="container z-depth-3" style="padding-top: 30px; padding-bottom: 1px; min-height: 500px;">
            <div class="row clearfix">
                <a href="{{url('/homeA')}}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Record Presence Today<br><center><h2 style="color:white;">{{$table}}</h2></center></div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="{{url('/homeA')}}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Record Activity Today<br><center><h2 style="color:white;">{{$Atable}}</h2></center></div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                </a>
                 <a href="#btn1" id="btn1" onclick="getLocation()">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_pin</i>
                        </div>
                        <div class="content">
                            <div class="text">Attendance</div>

                        </div>
                    </div>
                </div>
                </a>
                <a href="#btn2" id="btn2" onclick="getLocation()">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">transfer_within_a_station</i>
                        </div>
                        <div class="content">
                            <div class="text">Activity</div>
                        </div>
                    </div>
                </div>
                </a>
                </div>
            <!-- #END# Widgets -->
            @if(\Session::has('alert'))
                        <div class="alert alert-danger" align-center>
                        <strong>{{Session::get('alert')}}</strong>
                        </div>
            @elseif(\Session::has('successalert'))
                <div class="alert alert-success" align-center>
                <strong>{{Session::get('successalert')}}</strong>
                </div>
            @endif


            <form method="post" action="{{url('/checkin')}}">
            {{csrf_field()}}
                <div class="card" id="attendance" style="display: none;">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h1 style="font-size: 40px;"><b>Attendance</b></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h2 style="font-size: 30px;"><b><?php echo date('d-m-Y'); ?></b></h2>
                                <b><h2 style="font-size: 30px;" id="timestamp"></h2></b>
                                <hr size="2px" style="width: 1000px;">
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <b><h3>Your Location</h3>
                                    <input type="text" name="Idate" value="{{$maxD->date}}"  hidden>
                                    <textarea style="border: none;" class="text-center" id="tampilkan" name="loc" readonly></textarea></b><br>
                                <input type="submit" class="btn btn-success" name="checkin" value="Check In" {{$tmbl}}></input>&nbsp;<input type="submit" class="btn btn-danger" name="checkout" value="Check Out"></input>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form method="post" action="{{url('/activityin')}}" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="card" id="activity" style="display:none;">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h1 style="font-size: 40px;"><b>Activity</b></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h2 style="font-size: 30px;"><b><?php echo date('d-m-Y'); ?></b></h2>
                                <b><h2 style="font-size: 30px;" id="timestamp2"></h2></b>
                                <hr style="width: 1000px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 col-md-2 col-lg-2">
                                <h3>Customer</h3>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                               <select class="form-control" name="customer" {{$tmbll}}>
                               @foreach($cust as $cust)
                                    <option value="{{$cust -> namapt}}">{{$cust -> namapt}}</option>
                               @endforeach
                              </select>
                            </div>
                            <div class="col-sm-1 col-md-1 col-lg-1">
                                <i class="material-icons"  id="cust" style="font-size: 30px; color: black;">add_circle</i>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-2 col-md-2 col-lg-2">
                                <h3>Description</h3>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10">
                                <textarea class="text-center col-sm-5 col-md-5 col-lg-5" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <b> <h3>Your Location</h3>
                                    <textarea style="border: none;" class="text-center" id="tampilkan2" name="loc" readonly></textarea></b><br>
                                    <input type="file" accept="image/*" name="image" {{$tmbll}} required><br>
                                <input type="submit" class="btn btn-success" name="activityin" value="Check In" {{$tmbll}}></input>&nbsp;
                                <input type="submit" class="btn btn-danger" name="activityout" value="Check Out"></input>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>

                <!-- add customer -->
                <form method="post" action="{{url('/addcust')}}">
                  {{csrf_field()}}
                  <div class="card" id="addcust" style="display:none;">
                    <div class="container text-center">
                      <div class="row">
                         <div class="col-sm-2 col-md-2 col-lg-2">
                             <h3>Add Customer</h3>
                         </div>
                         <div class="col-sm-10 col-md-10 col-lg-10">
                             <input type="text" class="col-sm-5 col-md-5 col-lg-5" style="font-size:20px;" name="addcust" required></input>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-sm-12 col-md-12 col-lg-12">
                             <input type="submit" class="btn btn-success" value="Add Customer"></input>
                    </div>
                    </div>
                    </div>
                  </div>
                </form>
                <!-- end add customer -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>DEPARTEMENT INFO</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Department</th>
                                            <th>Manager</th>
                                            <th>Employees</th>
                                            <th style="color: white">Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Operational and Support Services</td>
                                            <td>Riza Azhari</td>
                                            <td colspan="2">
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: {{$operasional}}%"></div>
                                                </div>
                                            </td>
                                            <td><span class="label bg-red">{{$jmlO}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Sales and Marketing</td>
                                            <td>Yerry Tualena</td>
                                            <td colspan="2">
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$sales}}%"></div>
                                                </div>
                                            </td><td>
                                            <span class="label bg-blue">{{$jmlS}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Technical</td>
                                            <td>Yustinus Mamik Julianto</td>
                                            <td colspan="2">
                                                <div class="progress">
                                                    <div class="progress-bar bg-light-green" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: {{$technical}}%"></div>
                                                </div>
                                            </td>
                                            <td><span class="label bg-light-green">{{$jmlT}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="chart_div">
                       </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>GENDER</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <br><br><br>
                         <div id="donut_single"></div>

                </div>
                <!-- #END# Browser Usage -->
        </div>
    </div>
</div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['Male', {{$genderL}}],
          ['Female',{{$genderP}}]
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none',
          'width':400,
          'height':300,
          'backgroundColor':'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }


// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});

//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: 'time.php',
success: function(data) {
$('#timestamp').html(data);
$('#timestamp2').html(data);
},
});
}

var view = document.getElementById("tampilkan");
var view2 = document.getElementById("tampilkan2");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
        view2.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}
 function showPosition(position) {
    view.innerHTML = position.coords.latitude + "," + position.coords.longitude;
    view2.innerHTML = position.coords.latitude + "," + position.coords.longitude;
 }

/* function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        view.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    view.innerHTML = position.coords.latitude + "," + position.coords.longitude;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            view.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            view.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            view.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            view.innerHTML = "An unknown error occurred."
            break;
    }
}
*/
</script>
@endsection
