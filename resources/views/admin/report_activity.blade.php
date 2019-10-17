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
							<th>Subject</th>
							<th>Customer</th>
							<th>Check in</th>
							<th>Check Out</th>
							<th>Duration</th>
							<th>Description</th>

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
							<td>{{$isitbl->subject}}</td>
							<td>{{$isitbl->customer}}</td>										
							<td>{{$isitbl->intime}}</td>
					 		<td>{{$isitbl->outtime}}</td>
					 		<td>{{$isitbl->duration}}</td>
					 		<td>{{$isitbl->description}}</td>
						</tr>					
					<?php $no++; ?>
					@endforeach
					<tr><td colspan="11" height="30px" align="center"> SUM Activity</td></tr>
					@foreach ($sum as $sum)
					<tr>
						<td colspan="8"></td>
						<td>{{$sum->nip}}</td>
						<td>{{$sum->nama}}</td>
						<td>{{$sum->total}}</td>
					</tr>
					@endforeach
	</tbody>
</table>
</center>
<script src="{{url('assets/js/export_csv.js')}}"></script>
<?php
echo $export;
echo $exportN;
?>
