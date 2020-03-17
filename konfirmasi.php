<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pusat Pengembangan Sumber Daya Manusia Aparatur</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/logo.gif" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">


			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="index.php" class="logo">
						<img src="images/logo1.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="registrasi.php">Registrasi</a>
							</li>

							<li class="active-menu">
								<a href="konfirmasi.php">Konfirmasi</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.php"><img src="images/logo1.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Header Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li class="active-menu">
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="registrasi.php">Registrasi</a>
				</li>

				<li>
					<a href="konfirmasi.php">Konfirmasi</a>
				</li>

				<li>
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
	</header>

	<section class="bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="bor10 m-t-50 p-t-40 p-b-40">
				<form class="form-horizontal" method="post" enctype="multipart/form-data" name="regform">
					<div class="col-sm-12">
						<strong>* Wajib diisi</strong>
						<div class="alert alert-info">
							<strong>Data Konfirmasi</strong>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="namalengkap">Nomor Registrasi</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="noregis" value="" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="exampleFormControlFile1">Upload Bukti Transfer</label>
						<div class="col-sm-7">
							<input type="file" class="form-control-file" name="gambar">
						</div>
					</div><br>
					<div class="form-group">
						<div class="col-sm-7">
							<button type="reset" class="btn btn-primary btn-lg">Reset</button>
							<button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

	<?php
	include 'koneksi.php';
	if (isset($_POST['submit'])) {
		$nomorregistrasi = $_POST['noregis'];

		$nama_gambar = $_FILES['gambar']['name'];
		$size = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tipe = $_FILES['gambar']['type'];
		$folder = "images/buktitf/";
		$valid = array('jpg', 'jpeg', 'png', 'gif');

		$query = mysqli_query($koneksi, "SELECT * FROM registrasi rg, konfirmasi kf WHERE rg.id_konfirmasi = kf.id_konfirmasi and no_registrasi='$nomorregistrasi'");
		if (mysqli_num_rows($query) > 0) {

			if (strlen($nama_gambar)) {
				list($txt, $ext) = explode(".", $nama_gambar);
				if (in_array($ext, $valid)) {
					if ($size < 5000000) {
						$gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						$gmbr = $folder.$gambarnya;
						$tmp = $_FILES['gambar']['tmp_name'];
						if (move_uploaded_file($tmp, $folder.$gambarnya)) {
							$row = mysqli_fetch_array($query);
							$idkonfirm = $row['id_konfirmasi'];
							$update = mysqli_query($koneksi, "UPDATE konfirmasi SET foto_bukti='$gmbr' WHERE id_konfirmasi='$idkonfirm'");
							if ($update) {
								echo "<script>alert('Foto Berhasil Di upload'); document.location='index.php';</script>";
							} else {
								echo "<script>alert('Foto Gagal Di upload');</script>";
							}
						}
					} else {
						echo "<script>alert('Foto terlalu besar, max 5MB');</script>";
					}
				}else {
					echo "<script>alert('Format Gambar Tidak valid , Format Gambar Harus (JPG, Jpeg, gif, png) ');</script>";
				}
			} else {
				echo '<script>
							alert("Gambar Belum Di Pilih , Harap Memilih Gambar Dahulu");
					 </script>';
			}
		} else {
			echo "<script>alert('Nomor Registrasi Tidak Cocok');</script>";
		}

	}

	 ?>



	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="elementor-text-editor elementor-clearfix">
						<p style="text-align: center;"> KEMENTERIAN ENERGI DAN SUMBER DAYA MINERAL <br /> MILIK PPSDMA © 2017 PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA APARATUR<br /><br /><i class="fa fa-map-marker" aria-hidden="true"></i> Jl. Cisitu Lama no.37
							Bandung<br /><i class="fa fa-envelope"></i> Email : info.ppsdma@esdm.go.id<br /><i class="fa fa-phone"></i> Tlp. 022 – 2502428<br /><i class="fa fa-phone-square"></i> Fax. 022 – 2506224</p>
					</div>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>
