  <?php
if (isset($_POST['submit'])) {
	$jammasuk =$_POST['jammasuk'];
	$koordinatmasuk = $_POST['koordinat'];
	$keteranganmasuk = $_POST['keteranganmasuk'];
	$tanggal =date("Y-m-d");

	$insertmasuk = mysqli_query($con,"INSERT INTO record_absensi (kd_karyawan,jam_masuk,koordinat_masuk,keterangan_masuk,tanggal) VALUES ('$username','$jammasuk','$koordinatmasuk','$keteranganmasuk','$tanggal')");
	if ($insertmasuk) {
		header("location:./home_k.php");
	}
}

?>