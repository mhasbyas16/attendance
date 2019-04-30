<?php
if (isset($_POST['login'])) {
	$nip = $_POST['user'];
	$password = md5($_POST['pass']);

	$validasi=mysqli_query($con,"SELECT * FROM users WHERE nip='$nip' AND password='$password'");
	if (mysqli_num_rows($validasi)== 0) {
	echo "
	<div class='alert alert-warning'>
    	<strong>Username Or Password Wrong!</strong> Check Your Username Or Password Again</a>.
  	</div>
  		";
	}else{
		while ($array=mysqli_fetch_array($validasi)) {
			$NIP= $array['nip'];
			$nama= $array['nama'];
			$email= $array['email'];
			$jabatan= $array['kd'];
			$hakakses= $array['hakakses'];
		}
	$_SESSION['nip']=$nip;
	$_SESSION['nama']=$nama;
	$_SESSION['email']=$email;
	$_SESSION['kd']=$jabatan;
	$_SESSION['hakakses']=$hakakses;

	if ($hakakses=='karyawan') {
		header("Location: karyawan/home_K.php");
	}elseif ($hakakses=='admin') {
		header("Location: admin/home_A.php");
	}
	
			}
			}
?>