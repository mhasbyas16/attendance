<?php
				$tgls=date('Y-m-d');
					$sql = mysqli_query($con, "SELECT harian.*,jabatan.*,users.* FROM harian INNER JOIN users ON harian.nip=users.nip JOIN jabatan ON users.kd= jabatan.kd WHERE harian.tgl='$tgls'");
					if(mysqli_num_rows($sql)==0){
						echo "Data tidak ada";
												}
					else{
						$no=1;
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
			}

?>
