<link rel="stylesheet" href="{{url('assets/css/materializes.css')}}">

@extends('template')
@section('isi')
        <div class="container text-center">
            <h1>UPDATE EMPLOYEE</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="color: white"><strong>About Editing or Updating Employee Data</strong></li>
                    </ul>
            </div>
        </div>
        <!--End Page-->
    </div><!-- end section -->

    @include('admin.awan.gaya_awan')

    <div class="container z-depth-3" style="min-height: 300px">
    </br>

    @if(\Session::has('alert'))
	   <div class="alert alert-danger">
	   		<strong>{{Session::get('alert')}}</strong>
	   </div>
    @elseif(\Session::has('success_alert'))
    <div class="alert alert-success">
   		<strong>{{Session::get('success_alert')}}</strong>
    </div>
    @endif

<form method="post" action="{{url('/saveedit')}}">
{{csrf_field()}}
    <table>
        <thead>
            <tr>
                <td width="200px">NIP</td>
                <td>:</td>
                <td><input type="text" name="nip" maxlength="13" value="{{$view->nip}}" readonly style="font-size: 16px"/></td>
            </tr>
            <tr>
				<td>Employee Name</td>
				<td>:</td>
				<td><input type="text" name="nama" maxlength="35" value="{{$view->nama}}" style="font-size: 16px"/></td>
			</tr>
			<tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                    <div class="col s12">
                    <div class="input-field col s3 m3" style="font-size: 20px;">
                    <select name="gender">
                    	<option selected hidden value="{{$view->gender}}">{{$view->gender}}</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    </div>
                    </div>
                </td>
            </tr>
			<tr>
				<td>E-mail</td>
				<td>:</td>
				<td><input type="email" name="email" maxlength="50" value="{{$view->email}}" style="font-size: 16px"/></td>
			</tr>
			<tr>
				<td>Position</td>
				<td>:</td>
				<td style="font-size: 16px"><select name="jabatan" style="font-size: 16px">
					<option selected hidden value="{{$view->kd}}" style="font-size: 16px">{{$view->jabatan}}</option>
				@foreach ($jabatan as $jabatan)
						<option value="{{$jabatan->kd}}" style="font-size: 16px">{{$jabatan->jabatan}}</option>
				@endforeach
				</select></td>
			</tr>
			<tr>
				<td>New Password</td>
				<td>:</td>
				<td><input type="password" name="password" maxlength="35" style="font-size: 16px"/></td>
			</tr>
			<tr>
				<td>Repeat Password</td>
				<td>:</td>
				<td><input type="password" name="password2" maxlength="35" style="font-size: 16px"/></td>
			</tr>
			<tr>
				<td colspan="3" align="center" style="padding-top: 15px"><button type="submit" class="btn btn-success btn-block" name="update" style="background-color: #000051; font-size: 20px"/>UPDATE</button>
                </td>
				</td>
			</tr>
		</thead>
	</table>
	</br>
	</div>

</form>
</br>
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
			