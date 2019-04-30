
<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

$username= $_SESSION['username'];
$nama= $_SESSION['namakaryawan'];
$email= $_SESSION['emailkaryawan'];
$jabatan= $_SESSION['jabatan'];
$hakakses= $_SESSION['hak_akses'];

if ($username=='') {
	header("Location: ../index.php");
}


	include("../assets/php/koneksi.php");

//validasi tombol 
$hariini=date("Y-m-d");
$vtombol=mysqli_query($con,"SELECT * FROM record_absensi WHERE tanggal='$hariini' AND kd_karyawan ='$username'");
if (mysqli_num_rows($vtombol)==0) {
	$btnmasuk="";
}else{
	$btnmasuk="disabled";
}

while ($isi=mysqli_fetch_array($vtombol)) {
	$jamkel=$isi['jam_keluar'];
}
if ($jamkel="00:00:00") {
	$btnkeluar="hkjhkhkj";
	echo $jamkel;
	echo $username;
}else{
	$btnkeluar="disabled";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="../assets/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="../assets/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="../assets/css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../assets/css/style.css" />

</head>

<body>

	<!-- Header -->
	<header>

		<!-- Nav -->
		<nav id="nav" class="navbar">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="../assets/img/u.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li class="has-dropdown"><a><i class="fa fa-user-circle"></i>&nbsp;Account</a>
					<ul class="dropdown">
						<li><a href="#">Settings</a></li>
						<li><a href="../assets/php/logout.php">Logout</a></li>
					</ul>
					</li>
					
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- header wrapper -->
		<div class="header-wrapper sm-padding bg-grey">
			<div class="container text-center">
				<h2>Your Profile</h2>
			</div>
		</div>
		<!-- /header wrapper -->

	</header>
	<!-- /Header -->

	<!-- Blog -->
	<div id="blog" class="section">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">


						<!-- blog author -->
						<div class="blog-author">
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="../assets/img/author.jpg" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h3><?php echo $nama; ?></h3>
									</div>
									<table>
									<tr>
										<td>Email</td><td>:</td><td><?php echo $email; ?></td>
									</tr>

									<?php
										include '../assets/php/cari_jabatan.php';
									?>
									<tr>
										<td>Position</td><td>:</td><td><?php echo $jab; ?></td>
									</tr>
									</table>
								</div>
							</div>
						</div>
						<!-- /blog author -->
						<?php
							$tgl= date('Y-m-d');
							$qq=mysqli_query($con,"SELECT * FROM record_absensi WHERE kd_karyawan='$username' AND tanggal='$tgl'");

							if ($isi=mysqli_fetch_array($qq)) {
								$kd=$isi['kd_record'];
							}
						?>
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" onclick="getLocation()" <?php echo $btnmasuk;?>>Masuk</button> 
<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2" onclick="getLocation()" <?php echo $btnkeluar;?>>Keluar</button> <?php echo $btnkeluar;?>

  <!-- The Modal -->
<div class="modal" id="myModal">
<?php
	include "../assets/php/absent_masuk.php";
?>
	<form method="post">
    	<div class="modal-dialog">
      	<div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Jam Masuk Kerja</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>        
        <!-- Modal body -->
        <div class="modal-body">
        <!--container-->
        <div class="container">
          <table width="47%">
          	<tr>
          		<td colspan="3" style="font-size: 60px;text-align: center;"><?php echo date("H:i"); ?>
          		<td><input type="text" name="jammasuk" value="<?php echo date("H:i:s"); ?>" hidden></input>
          	</tr>
          	<tr>
          		<td>Your Location</td><td>:</td><td><textarea id='tampilkan' name="koordinat" readonly></textarea></td>
          	</tr>
          	<tr>
          		<td>Keterangan</td><td>:</td><td><textarea name="keteranganmasuk"></textarea></td>
          	</tr>
          </table>
        </div>
        <!--/container-->
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn-btn-sucsess" value="Absent"></input>
        </div>        
      </div>
    </div>
    </form>
</div>

<div class="modal" id="myModal2">
<?php
	include "../assets/php/absent_keluar.php";
?>
  <form method="post">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Jam Keluar Kerja</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <!--container-->
        <div class="container">
          <table width="47%">
          	<tr>
          		<td colspan="3" style="font-size: 60px;text-align: center;"><?php echo date("H:i"); ?>
          		<td><input type="text" name="jamkeluar" value="<?php echo date("H:i:s"); ?>" hidden></input>
          	</tr>
          	<tr>
          		<td>Your Location</td><td>:</td><td><textarea id='tampilkan2' name="koordinatkeluar" readonly></textarea></td>
          	</tr>
          	<tr>
          		<td>Keterangan</td><td>:</td><td><textarea name="keterangankeluar"></textarea></td>
          	</tr>
          </table>
        </div>
        <!--/container-->
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" name="submit2" class="btn-btn-sucsess" value="Absent"></input>
        </div>        
      </div>
    </div>
    </form>
  </div>

</div>
</div>
					
<h3 align="center">Your Record This Month</h3>
<table class="table table-striped">
	<thead>
	<tr>
		<th>No.</th>
		<th>Nama Karyawan</th>
		<th>Jabatan</th>
		<th>Tanggal</th>
		<th>Jam Masuk</th>
		<th>Keterangan</th>
		<th>Jam Keluar</th>
		<th>Keterangan</th>
		</th>
	</tr>
	</thead>
	<tbody>
	<?php
		include "../assets/php/view_karyawan_home.php";	
	?>
	</tbody>
	</table>
</div>
			<!-- /Row -->
</div>
		<!-- /Container -->
</div>
	<!-- /Blog -->

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="index.html"><img src="../assets/img/u.png" alt="logo"></a>
					</div>
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script>
var view = document.getElementById("tampilkan");
var view2 = document.getElementById("tampilkan2");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
        view2.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}
 function showPosition(position) {
    view.innerHTML = position.coords.latitude + "," + position.coords.longitude;
    view2.innerHTML = position.coords.latitude + "," + position.coords.longitude; 
 }
</script>
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>

</body>

</html>
