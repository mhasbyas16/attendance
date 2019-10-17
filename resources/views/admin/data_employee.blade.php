<style type="text/css">
    #status{
        color:{{$status}};
    }
</style>
<link rel="stylesheet" href="{{url('assets/css/materializes.css')}}">

@extends('template')
@section('isi')

        <div class="container text-center">
            <h1>EMPLOYEE DATA</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="color: white"><strong>About All Data Employee</strong></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->
    @include('admin.awan.gaya_awan')

    <!-- Container -->
    <div class="container z-depth-3" style="min-height: 500px">
     @if(\Session::has('success_alert'))
   		<div class="alert alert-success">
   			<strong>{{Session::get('success_alert')}}</strong>
   		</div>
   	@endif
        <form method="post">
        <input class="form-control" id="myInput" type="text" style="font-size: 20px; margin-top: 50px" placeholder="Search..">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" style="text-align: center;">
            <thead>
                <tr style="background-color: #000051; color: white;">
                    <th class="text-center">No.</th>
					<th class="text-center">NIP</th>
					<th class="text-center">Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Position</th>
					<th class="text-center">Action</th>
				</tr>
            </thead>
            <tbody id="myTable">
			<?php $no=1;?>
			@foreach($isi as $isi)
				<tr>
					<td class="text-center">{{$no}}.</td>
					<td>{{$isi->nip}}</td>
					<td>{{$isi->nama}}</td>
					<td>{{$isi->email}}</td>
					<td>{{$isi->jabatan}}</td>
			@if ($hakakses=='admin')
					<td>
						<a class="btn-floating waves-effect waves-light orange" href="{{url('/edit')}}/{{$isi->nip}}"><i class="mdi-editor-mode-edit"></i></a>
                        <a href="{{url('/deletedata')}}/{{$isi->nip}}" onclick="return confirm('Are You Sure Delete {{$isi->nama}} ?')" class="btn-floating waves-effect waves-light red" ><i class="mdi-action-delete"></i></a>
					</td>
			@else
					<td></td>
			@endif
				</tr>
			<?php $no++;?>
			@endforeach
		</tbody>
        </table>
        </div>
        </form>
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
</br>
</br>
</br>
@endsection
