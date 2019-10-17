<style type="text/css">
    #status{
        color:{{$status}};
    }
</style>
<link rel="stylesheet" href="{{url('assets/css/materializes.css')}}">
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('template')
@section('isi')

        <div class="container text-center">
            <h1>PRESENCE RECORDS</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="color: white"><strong>About Employee Attendance Record</strong></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->

   @include('admin.awan.gaya_awan')

    <!-- Container -->
    <div class="container z-depth-3" style="min-height: 500px">
        </br>
        </br>
        <div class="row">
            <div class="col s12">
        <div id="chart_div">
        </div>
        </div>
</div>
    <form method="post" action="{{url('/search')}}">
    {{csrf_field()}}
    <div class="row">
        <div class="col s12">
        <div class="input-field col s3 m3" style="font-size: 15px;">
           <input type="date" name="date1"></input>
        </div>

        <div class="input-field col s3 m3" style="font-size: 15px;">
             <input type="date" name="date2"></input>
        </div>
        <div class="input-field col s1 m3">
            <button class="waves-effect waves-light btn" style="background-color: #000051">Find</button>
        </div>
        <div class="input-field col s3 m3">
            <input class="form-control" id="myInput" type="text" style="font-size: 15px;" placeholder="Search..">
        </div>
    </div>
    </div>
    </form>

    <form method="post">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr style="background-color: #000051; color: white;">
					<th class="text-center">No.</th>
					<th class="text-center">Name Employee</th>
					<th class="text-center">Position</th>
					<th class="text-center">Date</th>
					<th class="text-center">Check in</th>
					<th class="text-center">Location In</th>
					<th class="text-center">Check Out</th>
					<th class="text-center">Location Out</th>
				</tr>
            </thead>
            <tbody id="myTable">
			@if ($tbl==0)
				<tr><tr>
			@else
			<?php $no=1; ?>
			@foreach($isitbl as $isitbl)
				<tr>
					    <td class="text-center">{{$no}}.</td>
						<td>{{$isitbl->nama}}</td>
						<td>{{$isitbl->jabatan}}</td>
						<td>{{$isitbl->date}}</td>
						<td>{{$isitbl->intime}}</td>
						<td><a href="https://www.google.co.id/maps/place/{{$isitbl->locin}}"> {{$isitbl->locin}}</a></td>
						<td>{{$isitbl->outtime}}</td>
						<td><a href="https://www.google.co.id/maps/place/{{$isitbl->locout}}">{{$isitbl->locout}}</a></td>
				</tr>
				<?php $no++?>
			@endforeach
			@endif

			@if ($hakakses=='admin' OR $hakakses=='super user')
                <tr>
					<td colspan='8' class="text-center">
                    <a href="{{url('/export')}}/{{$date1}}/{{$date2}}/excel"><strong>Export Excel</strong></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{url('/export')}}/{{$date1}}/{{$date2}}/pdf"><strong>Export PDF</strong></a>
                    </td>
                    <td>aadasda {{$O730}}{{$O8}}</td>
				</tr>
            @endif


		</tbody>
        </table>
        </div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

//nyoba bar charts
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Operational');
      data.addColumn('number', 'Sales and Marketing');
      data.addColumn('number', 'Technical');

      data.addRows([
        [{v: [7,0, 0], f: '< 7 am'}, {{$OF}},{{$SF}},{{$TF}}],
        [{v: [7, 30, 0], f: '7-7:30 am'}, {{$O730}},{{$S730}},{{$T730}}],
        [{v: [8, 0, 0], f: '7:30-8 am'}, {{$O8}},{{$S8}},{{$T8}}],
        [{v: [8, 30, 0], f: '8-8:30 am'}, {{$O830}},{{$S830}},{{$T830}}],
        [{v: [9, 0, 0], f: '8:30-9 am'}, {{$O9}},{{$S9}},{{$T9}}],
        [{v: [9, 30, 0], f: '9-9:30 am'}, {{$O930}},{{$S930}},{{$T930}}],
        [{v: [10, 0, 0], f: '9:30-10 am'}, {{$O10}},{{$S10}},{{$T10}}],
        [{v: [10, 30, 0], f: '10-10:30 am'}, {{$O1030}},{{$S1030}},{{$T1030}}],
        [{v: [11, 0, 0], f: '10:30-11 am'}, {{$O11}},{{$S11}},{{$T11}}],
        [{v: [11, 30, 0], f: '11-11:30 am'}, {{$O1130}},{{$S1130}},{{$T1130}}],
        [{v: [12, 0, 0], f: '11:30-12 pm'}, {{$O12}},{{$S12}},{{$T12}}],
        [{v: [12, 30, 0], f: '< 7 am'}, {{$OL}},{{$SL}},{{$TL}}],
      ]);

      var options = {
        title: 'Rekapitulasi Presensi Karyawan Bulan {{$date1}} - {{$date2}}',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [6, 30, 0],
            max: [13, 00, 0]
          }
        },
        vAxis: {
            title: 'Jumlah karyawan',
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
  }

</script>

        </form>
    </div>

</br>
</br>
</br>

<script type="text/javascript" src="{{url('assets/js/materialize.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/materialize.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('select').material_select();
  });
</script>
@endsection
