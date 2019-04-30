<style type="text/css">
    #status{
        color:{{$status}};
    }
</style>
<link rel="stylesheet" href="{{url('assets/css/materializes.css')}}">
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

	
				