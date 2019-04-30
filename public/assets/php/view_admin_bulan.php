<?php

if ($_GET['cari']=='Cari') {
							$ANNbulan = array(
									'01'=>'Januari',
									'02'=>'Februari',
									'03'=>'Maret',
									'04'=>'April',
									'05'=>'Mei',
									'06'=>'Juni',
									'07'=>'Juli',
									'08'=>'Agustus',
									'09'=>'September',
									'10'=>'Oktober',
									'11'=>'November',
									'12'=>'Desember' );
							$tahun = $_GET['tahun'];
							$bulan = $_GET['bulan'];

							echo "<h3><b>Hasil Record Bulan ".$ANNbulan[$bulan]." Tahun ".$tahun."</b></h3>";
					$sql = mysqli_query($con, "SELECT harian.*,jabatan.*,users.* FROM harian INNER JOIN users ON harian.nip=users.nip JOIN jabatan ON users.kd= jabatan.kd WHERE LEFT(harian.tgl,4)='$tahun' AND MID(harian.tgl,6,2) ='$bulan'");
					if(mysqli_num_rows($sql)==0){
						echo "Data tidak ada";
						$smp='disabled';
												}
					else{
						$smp='';
						$no=1;
						$link="https://www.google.co.id/maps/place/";
						while($row = mysqli_fetch_array($sql)){
						echo "
						<tr>
							<td>".$no.".</td>
							<td>".$row['nama']."</td>
							<td>".$row['jabatan']."</td>
							<td>".$row['in']."</td>
					 		<td>".$row['out']."</td>
						</tr>";
						$no++;
						}
						echo "<tr>
							<td colspan='5' align='center'><a href='../assets/php/report_record.php?tahun=".$tahun."&bulan=".$bulan."&cari=Cari'>Export</a></td>
						</tr>";
			}

		}

?>
