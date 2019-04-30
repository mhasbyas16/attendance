<style type="text/css">
    #status{
        color:;
    }
</style>
<link rel="stylesheet" href="{{url('assets/css/materializes.css')}}">
@extends('template')
@section('isi')

        <div class="container text-center">
            <h1>EMPLOYEE HELPDESK</h1>
        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                    <ul>
                        <li style="color: white"><strong>About Mssages and Suggestions for Better</strong></li>
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
    <form method="post">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            	<thead>
						<tr style="background-color: #000051; color: white;">
							<th class="text-center" >No.</th>
							<th class="text-center" >Subject</th>
							<th class="text-center" >Email</th>
              <th class="text-center" >Description</th>
              <th class="text-center" >Mark</th>
						</tr>
				</thead>
				<tbody>
                <?php $no=0;?>
                @foreach($service as $isi)
                <?php $no++?>
						<tr>
							<td class="text-center">{{$no}}.</td>
							<td>{{$isi ->subject}}</td>
							<td>{{$isi ->email}}</td>
                            <td>{{$isi ->description}}</td>
							<td><a href="{{url('/mark')}}/readed/{{$isi ->id}}">Mark As Read</a></td>
						</tr>
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
<!--
<script type="text/javascript" src="{{url('assets/js/materialize.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/materialize.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('select').material_select();
  });
</script>
-->
@endsection
