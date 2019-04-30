<?php
	$NIP = $_GET['kdkaryawan'];
	$data = mysqli_query($con,"SELECT users.*, jabatan.* FROM users INNER JOIN jabatan ON users.kd = jabatan.kd WHERE users.nip='$NIP'");

	if (mysqli_num_rows($data)==0) {
		echo "<div class='alert alert-danger'>
    <strong>Data Tidak Ditemukan!</strong> Data Yang Dicari Tidak Ada</a>.
  </div>";	
	}else{
		while ($Disi=mysqli_fetch_assoc($data)) {
			$kdkar=$Disi['nip'];
			$nmkar=$Disi['nama'];
			$ekar=$Disi['email'];
			$jab=$Disi['jabatan'];
			$kdjab=$Disi['kd'];

		}
	}
	if (isset($_POST['simpan'])) {
		$nama=$_POST['nama_karyawan'];
		$email=$_POST['email_karyawan'];
		$jabatan=$_POST['jabatan'];
		$password=md5($_POST['password']);
		$password2=md5($_POST['password2']);
		
		if ($password=="") {
			$simpan=mysqli_query($con,"UPDATE users SET nama='$nama', email='$email',kd='$jabatan' WHERE nip='$NIP'");
		if ($simpan) {
			echo "<div class='alert alert-success'>
    		<strong>Success!</strong> Save Newa Data For New Employee</a>.
  			</div>";
  			header("Location:data_karyawan.php");
			}else{
			echo "<div class='alert alert-danger'>
    		<strong>Can't Save!</strong> ID Employee Has Already Done</a>.
  			</div>";	
			}
		}else {
			if ($password==$password2) {
				$simpan=mysqli_query($con,"UPDATE users SET nama='$nama', email='$email',kd='$jabatan', password='$password' WHERE nip='$NIP'");
		if ($simpan) {
			echo "<div class='alert alert-success'>
    		<strong>Success!</strong> Save Newa Data For New Employee</a>.
  			</div>";
  			header("Location:data_karyawan.php");
			}else{
			echo "<div class='alert alert-danger'>
    		<strong>Can't Save!</strong> ID Employee Has Already Done</a>.
  			</div>";	
			}
			}else{
				echo "<div class='alert alert-danger'>
    		<strong>Warning!</strong> Password Not Same</a>.
  			</div>";
			}
		}
	}
		
?>