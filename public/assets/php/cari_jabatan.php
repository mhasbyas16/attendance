<?php

$jabatan=mysqli_query($con,"SELECT jabatan.jabatan,jabatan.kd, users.kd, users.nip FROM users INNER JOIN jabatan ON users.kd = jabatan.kd WHERE users.nip ='$nip'");
										while ($isijabatan=mysqli_fetch_array($jabatan)) {
											$jab=$isijabatan['jabatan'];
										}
?>