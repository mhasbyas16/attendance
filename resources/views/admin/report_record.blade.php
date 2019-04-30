<center>
<table>
    <tr>
        <td><h3>Hasil Record Tanggal {{$date1}} Sampai Dengan {{$date2}}</h3></td>
    </tr>
</table>
<table border='1'>
					<thead>
						<tr>
							<th>No.</th>
							<th>NIP</th>
							<th>Name Employee</th>
							<th>Email Employee</th>
							<th>Position</th>
							<th>Date</th>
							<th>Check In</th>
							<th>Check Out</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1;?>
					@foreach($isitbl as $isitbl)		
						<tr>
							<td>{{$no}}.</td>
							<td>{{$isitbl->nip}}</td>
							<td>{{$isitbl->nama}}</td>
							<td>{{$isitbl->email}}</td>
							<td>{{$isitbl->jabatan}}</td>
							<td>{{$isitbl->date}}</td>
							<td>{{$isitbl->intime}}</td>
					 		<td>{{$isitbl->outtime}}</td>
						</tr>
					<?php $no++; ?>	
				@endforeach
					<tr><td colspan="9" height="30px" align="center"> SUM Presence</td></tr>
					@foreach ($sum as $sum)
					<tr>
						<td colspan="5"></td>
						<td>{{$sum->nip}}</td>
						<td>{{$sum->nama}}</td>
						<td>{{$sum->total}}</td>
					</tr>
					@endforeach
</table>
</center>
<script src="{{url('assets/js/export_csv.js')}}"></script>
<?php
echo $export;
echo $exportN;
?>


