<?php
	if (isset($_POST['simpan'])) {
		$nip=$_POST['kd_karyawan'];
		$nama=$_POST['nama_karyawan'];
		$email=$_POST['email_karyawan'];
		$jabatan=$_POST['jabatan'];
		$password=md5($_POST['kata_sandi']);
		$password2=md5($_POST['kata_sandi2']);
		$hakakses='karyawan';

	if ($password==$password2) {
		$simpan=mysqli_query($con,"INSERT INTO users VALUES ('$nip','$nama','$email','$jabatan','$password','$hakakses')");
		if ($simpan) {
			echo "<div class='alert alert-success'>
    <strong>Success!</strong> Save Newa Data For New Employee</a>.
  </div>";
		}else{
			echo "<div class='alert alert-danger'>
    <strong>Can't Save!</strong> ID Employee Has Already Done</a>.
  </div>";	
		}
	}else{
		echo "<div class='alert alert-danger'>
    <strong>Can't Save!</strong> Password Not Same</a>.
  </div>";	
	}

		
	}
?>