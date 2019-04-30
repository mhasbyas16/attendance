  <?php
if (isset($_POST['submit2'])) {
	$jamkeluar =$_POST['jamkeluar'];
	$koordinatkeluar = $_POST['koordinatkeluar'];
	$keterangankeluar = $_POST['keterangankeluar'];

	$insertmasuk = mysqli_query($con,"UPDATE record_absensi SET jam_keluar='$jamkeluar', koordinat_keluar='$koordinatkeluar', keterangan_keluar='$keterangankeluar' WHERE kd_record ='$kd'");
	if ($insertmasuk) {
		header("location:./home_k.php");
	}
}
?>