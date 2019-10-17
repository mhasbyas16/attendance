<?php
				$tgls=date('Y-m');
					$sql = mysqli_query($con, "SELECT users.nama_karyawan, users.kd_karyawan, users.kd_jabatan, jabatan.kd_jabatan, jabatan.jabatan, record_absensi.jam_masuk, record_absensi.tanggal, record_absensi.koordinat_masuk, record_absensi.kd_karyawan, record_absensi.keterangan_masuk, record_absensi.jam_keluar, record_absensi.keterangan_keluar FROM record_absensi INNER JOIN users ON record_absensi.kd_karyawan=users.kd_karyawan JOIN jabatan ON users.kd_jabatan= jabatan.kd_jabatan WHERE LEFT(record_absensi.tanggal,7) ='$tgls' AND record_absensi.kd_karyawan='$username' OR users.email_karyawan='$username'");
					if(mysqli_num_rows($sql)==0){
						echo "Data tidak ada";
												}
					else{
						$no=1;
						while($row = mysqli_fetch_array($sql)){
						echo "
						<tr>
							<td>".$no."</td>
							<td>".$row['nama_karyawan']."</td>
							<td>".$row['jabatan']."</td>
							<td>".$row['tanggal']."</td>
							<td>".$row['jam_masuk']."</td>
							<td>".$row['keterangan_masuk']."</td>
					 		<td>".$row['jam_keluar']."</td>
					 		<td>".$row['keterangan_keluar']."</td>
						</tr>";
						$no++;
						}
			}

?>