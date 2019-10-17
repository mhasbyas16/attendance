<style type="text/css">
    #status{
        color:{{$status}};
    }
</style>
<link rel="stylesheet" href="{{url('assets/css/materializes.css')}}">
@extends('template')
@section('isi')

        <div class="container text-center">
            <h1>HOME</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li><h4 style="color: white"><strong>About Attendance and Activity Record Today</strong></h4></li>
                    </ul>
                    <ul>
                    	<li></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->

   @include('admin.awan.gaya_awan')
    <!-- Container -->
    <div class="container z-depth-3" style="min-height: 500px">
    <br><br>
     <h1 style="text-align: center; color: #1a237e"><strong><?php echo date('D d F Y');?></strong></h1>
        </br>
        <h3 style="text-align: center; color: #1a237e;"><strong>PRESENCE RECORDS</strong></h3>
        <input class="form-control" id="myInput1" type="text" style="font-size: 20px; margin-top: 20px" placeholder="Search..">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr style="background-color: #000051; color: white;">
                    <th class="text-center">No.</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Check In</th>
                    <th class="text-center">Location In</th>
                    <th class="text-center">Check Out</th>
                    <th class="text-center">Location Out</th>
                </tr>
            </thead>
            <tbody id="myTable1">
            <?php $no=1;?>
            @foreach ($table as $table)
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$table -> nama}}</td>
                    <td>{{$table -> jabatan}}</td>
                    <td>{{$table -> intime}}</td>
                    <td><a href="https://www.google.co.id/maps/place/{{$table -> locin}}">{{$table -> locin}}</a></td>
                    <td>{{$table -> outtime}}</td>
                    <td><a href="https://www.google.co.id/maps/place/{{$table -> locout}}">{{$table -> locout}}</a></td>
                </tr>
            <?php $no++?>
            @endforeach
            </tbody>
        </table>
        </div>
        <script>
        $(document).ready(function(){
          $("#myInput1").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable1 tr").filter(function() {
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

<div class="container z-depth-3" style="min-height: 500px">
        <form method="post">
        </br>
        <h3 style="text-align: center; color: #1a237e;"><strong>ACTIVITY RECORDS</strong></h1>
        <input class="form-control" id="myInput" type="text" style="font-size: 20px; margin-top: 20px" placeholder="Search..">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr style="background-color: #000051; color: white;">
                    <th class="text-center">No.</th>
					<th class="text-center">Name Employee</th>
					<th class="text-center">Position</th>
					<th class="text-center">Subject</th>
                    <th class="text-center">Customer</th>
					<th class="text-center">Check in</th>
					<th class="text-center">Location In</th>
					<th class="text-center">Check Out</th>
					<th class="text-center">Location Out</th>
					<th class="text-center">Duration</th>
					<th class="text-center">Description</th>
					<th class="text-center">Picture</th>
				</tr>
            </thead>
            <tbody id="myTable">
							<?php $no=1; ?>
							@foreach($Atable as $Atable)
								<tr>
									<td class="text-center">{{$no}}.</td>
									<td>{{$Atable->nama}}</td>
									<td>{{$Atable->jabatan}}</td>
									<td>{{$Atable->subject}}</td>
                  <td>{{$Atable->customer}}</td>
									<td>{{$Atable->intime}}</td>
									<td><a href="https://www.google.co.id/maps/place/{{$Atable->locin}}"> {{$Atable->locin}}</a></td>
									<td>{{$Atable->outtime}}</td>
									<td><a href="https://www.google.co.id/maps/place/{{$Atable->locout}}">{{$Atable->locout}}</a></td>
									<td>{{$Atable -> duration}}</td>
									<td>{{$Atable->description}}</td>
									<td><img src="{{asset('/image')}}/{{$Atable->pic}}" width="150px" height="100px" ></td>
								</tr>
							<?php $no++?>
							@endforeach
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
@endsection
