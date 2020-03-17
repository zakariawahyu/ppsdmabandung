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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
				<li>
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

	<?php
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "SELECT * FROM pelatihan where id_pelatihan='$id'");
	$row = mysqli_fetch_array($query);
	$foto = $row['foto_pelatihan'];
	$img = substr($foto, 3);

	 ?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="registrasi.php" class="stext-109 cl8 hov-cl1 trans-04">
				Registrasi
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Bimtek
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</span>
			<span class="stext-109 cl4">
				<?php echo $row['judul_pelatihan'] ?>
			</span>
		</div>
	</div>

	<section class="bg0 p-t-35 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-pic-w pos-relative">
							<img src="<?php echo $img ?>" alt="IMG-PRODUCT">

							<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $img ?>">
								<i class="fa fa-expand"></i>
							</a>
						</div>

					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $row['judul_pelatihan'] ?>
						</h4>

						<span class="mtext-106 cl2">
							<?php echo $row['tgl_pelatihan'] ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							Training by <?php echo $row['narasumber'] ?>
						</p>
						<p class="stext-102 cl3 p-t-23">
							<?php echo $row['deskripsi'] ?>
						</p>
					</div>
				</div>
			</div>

			<div class="p-b-15 p-t-80">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Registrasi
				</h3>
			</div>

			<div class="tab01">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#noakun" role="tab">Sudah punya akun</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#withakun" role="tab">Belum punya akun </a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane fade show active bor10 m-t-50 p-t-40 p-b-40" id="noakun" role="tabpanel">
							<div class="col-sm-12">
								<div class="alert alert-info">
									<strong>Cari Data Akun anda</strong>
								</div>
							</div>
							<form class="form-horizontal" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="gelardepan">Alamat Email : </label>
									<div class="col-sm-12">
										<input type="email" class="form-control" name="emailcari" placeholder="Massukan Alamat Email Anda Dengan Benar">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-7">
										<button type="submit" name="cari" class="btn btn-success btn-lg">CARI</button>
									</div>
								</div>
							</form>
							<?php
							if (isset($_POST['cari'])) {
								$email = $_POST['emailcari'];

								$hasil = mysqli_query($koneksi, "SELECT * FROM akun WHERE alamat_email='$email'");
								$hasilku = mysqli_num_rows($hasil);
								if ($hasilku > 0) {
									$rowcari = mysqli_fetch_array($hasil);
									?>
									<table class="table table-condensed table-hover">
							    <tr>
							      <td width="160">Nomor Akun</td>
							      <td width="10">:</td>
							      <td><?php echo $rowcari['no_akun'] ?></td>
							    </tr>
							      <tr>
							        <td width="160">Nama Lengkap</td>
							        <td width="10">:</td>
							        <td><?php echo $rowcari['nama_lengkap'] ?></td>
							      </tr>
							      <tr>
							        <td width="160">Email</td>
							        <td width="10">:</td>
							        <td><?php echo $rowcari['alamat_email'] ?></td>
							      </tr>
							    </table>
								<?php

								$data = mysqli_query($koneksi, "SELECT * from registrasi rg, akun ak, pelatihan pl, konfirmasi kf WHERE rg.id_konfirmasi = kf.id_konfirmasi and rg.no_akun = ak.no_akun and rg.id_pelatihan = pl.id_pelatihan and alamat_email='$email'");
								$dataku = mysqli_num_rows($data);
								if ($dataku > 0) {
									?>
									<table class="table table-hover">

										<tr>
											<th>Nomor Registrasi</th>
											<th>Pelatihan</th>
											<th>Tanggal Pelatihan</th>
											<th>Status Pembayaran</th>
										</tr>
										<?php 	while ($rowdata = mysqli_fetch_array($data))  { ?>
										<tr>
											<td><?php echo $rowdata['no_registrasi'] ?></td>
											<td><?php echo $rowdata['judul_pelatihan'] ?></td>
											<td><?php echo $rowdata['tgl_pelatihan'] ?></td>
											<td><?php echo $rowdata['status_pembayaran'] ?></td>
										</tr>
										<?php

									} ?>
									</table>
									<?php
								} else {
									?>
									<div class="col-sm-12">
										<div class="alert alert-info">
											<strong>Anda belum pernah mengikuti pelatihan</strong>
										</div>
									</div>
									<?php
								}

								?>

							<form class="form-horizontal" method="post" action="test.php?akun=<?php echo $rowcari['no_akun'] ?>">
								<div class="col-sm-12">
									<div class="alert alert-info">
										<strong>Data Akun Sudah Benar ?</strong>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-7">
										<input type="hidden" name="idpel" value="<?php echo $id ?>">
										<button type="submit" name="regisdiklat" class="btn btn-success btn-lg">Registrasi</button>
									</div>
								</div>
							</form>
									<?php
								} else {
									?>
									<div class="col-sm-12">
										<div class="alert alert-info">
											<strong>Alamat email yang anda masukkan salah :( Data Not Found</strong>
										</div>
									</div>
									<?php
								}
							}

							 ?>
					</div>


					<div class="tab-pane fade bor10 m-t-50 p-t-40 p-b-40" id="withakun" role="tabpanel">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="col-sm-12">
								<strong>* Wajib diisi</strong>
								<div class="alert alert-info">
									<strong>Data Registrasi</strong>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="namalengkap">Gelar Depan</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="gelardepan">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="namalengkap">Nama Depan <font color="red">*</font></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namadepan">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="namalengkap">Nama Belakang <font color="red">*</font></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namabelakang">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="namalengkap">Gelar Belakang</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="gelarbelakang">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="nip">ID Number (NIP  / NIK / NIM)<font color="red">*</font></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nip">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="nip">Agama</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="agama">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="tempatlahir">Tempat, Tanggal Lahir</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir">
								</div>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="tanggallahir">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="jk">Jenis Kelamin</label>
								<div class="col-sm-7">
									<select name="jk" data-show-subtext="true" class="selectpicker form-control" data-live-search="true">
										<option value="" selected disabled>Pilih Jenis Kelamin</option>
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="jk">Status Perkawinan</label>
								<div class="col-sm-7">
									<select name="statusperkawinan" data-show-subtext="true" class="selectpicker form-control" data-live-search="true">
										<option value="" selected disabled>Pilih status perkawinan</option>
										<option value="nikah">Nikah</option>
										<option value="belum">Belum Menikah</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="jk"></label>
								<div class="col-sm-11">
									<div class="form-check form-check-inline col-sm-2">
										<input class="form-check-input" type="radio" name="nonpnsya" value="PNS KESDM">
										<label class="form-check-label">PNS KESDM</label>
									</div>
									<div class="form-check form-check-inline col-sm-2">
										<input class="form-check-input" type="radio" name="nonpnsya" value="NON PNS KESDM">
										<label class="form-check-label" >PNS NON KESDM</label>
									</div>
									<div class="form-check form-check-inline col-sm-2">
										<input class="form-check-input" type="radio" name="nonpnsya" value="NON PNS">
										<label class="form-check-label" >NON PNS</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="golongan">Pangkat/Golongan</label>
								<div class="col-sm-7">
									<input type="text" id="pangkat" class="form-control" name="golongan" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="pendidikanterakhir">Pendidikan terakhir</label>
								<div class="col-sm-7">
									<select name="pt" data-show-subtext="true" class="selectpicker form-control" data-live-search="true">
										<option value="" selected disabled>Pilih Pendidikan Terakhir</option>
										<option value="">SLTA Sederajat</option>
										<option value="">D1</option>
										<option value="">D2</option>
										<option value="">D3</option>
										<option value="">D4</option>
										<option value="">S1</option>
										<option value="">S2</option>
										<option value="">S3</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="bidangstudi">Bidang Studi</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="bidangstudi">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="jabatan">Jabatan</label>
								<div class="col-sm-7">
									<input type="text" id="jabatan" class="form-control" name="jabatan">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="unitkerja">Unit Kerja Eselon I</label>
								<div class="col-sm-7">
									<input type="text" name="unitkerja1" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="unitkerja">Unit Kerja Eselon II</label>
								<div class="col-sm-7">
									<input type="text" name="unitkerja1" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="alamatkantor">Alamat Kantor</label>
								<div class="col-sm-7">
									<textarea name="alamatkantor" class="form-control"> </textarea>
								</div>
							</div>

							<div class="form-group">

								<label class="control-label col-sm-3" for="teleponkantor">Telepon Kantor</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="teleponkantor">
								</div>

							</div>


							<div class="form-group">
								<label class="control-label col-sm-3" for="fax">Fax Kantor</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="fax">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="almaatrumah">Alamat rumah</label>
								<div class="col-sm-7">
									<textarea name="alamatrumah" class="form-control"> </textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="hp">Nomor Telephone / HP</label>
								<div class="col-sm-7">
									<input type="text" id="notelp" class="form-control" name="hp">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Alamat Email<font color="red">*</font></label>
								<div class="col-sm-7">
									<input type="email" class="form-control" name="email">
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-sm-7">
									<button type="reset" class="btn btn-primary btn-lg">Reset</button>
									<button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>

	<?php
	include "koneksi.php";

	if (isset($_POST['submit'])) {
		$gelardep = $_POST['gelardepan'];
		$namadep = $_POST['namadepan'];
		$namabel = $_POST['namabelakang'];
		$gelarbel = $_POST['gelarbelakang'];
		$nip = $_POST['nip'];
		$agama = $_POST['agama'];
		$tempat_lahir = $_POST['tempatlahir'];
		$tgl_lahir = $_POST['tanggallahir'];
		$jenis_kelamin = $_POST['jk'];
		$pekerjaan = $_POST['nonpnsya'];
		$status_perkawinan = $_POST['statusperkawinan'];
		$pangkat = $_POST['golongan'];
		$pendidikanterakhir = $_POST['pt'];
		$bidang_studi = $_POST['bidangstudi'];
		$jabatan = $_POST['jabatan'];
		$unit1 = $_POST['unitkerja1'];
		$unit2 = $_POST['unitkerja2'];
		$alamat_kantor = $_POST['alamatkantor'];
		$telp_kantor = $_POST['teleponkantor'];
		$fax_kantor = $_POST['fax'];
		$alamat_rumah = $_POST['alamatrumah'];
		$hp = $_POST['hp'];

		$akun  = mysqli_query($koneksi, "SELECT max(no_akun) as NoAkun from akun");
		$data = mysqli_fetch_array($akun);
		$noAkun = $data['NoAkun'];
		$noUrut = (int) substr($noAkun, 8, 4);
		$noUrut++;

		$char = date('dmY');
		$noAkun = $char . sprintf("%04s", $noUrut);
		$namalengkap = $gelardep." ".$namadep." ".$namabel." ".$gelarbel;
		$nice_date = date('d F Y', strtotime( $tgl_lahir ));
		$ttl = $tempat_lahir.", ".$nice_date;

		$query = mysqli_query($koneksi, "INSERT INTO akun VALUES ('$noAkun', '$namalengkap' ,'$nip', '$agama', '$ttl', '$jenis_kelamin', '$pekerjaan', '$status_perkawinan', '$pangkat',
			'$pendidikanterakhir','$bidang_studi','$jabatan','$unit1', '$unit2', '$alamat_kantor','$telp_kantor','$fax_kantor','$alamat_rumah','$hp','','','')");

			$regis  = mysqli_query($koneksi, "SELECT max(no_registrasi) as NoRegis from registrasi");
			$data = mysqli_fetch_array($regis);
			$noRegis = $data['NoRegis'];
			$noUrut = (int) substr($noRegis, 9, 8);
			$noUrut++;

			$char = "BMK302019";
			$noRegis = $char . sprintf("%07s", $noUrut);

			$konfirmasi  = mysqli_query($koneksi, "SELECT max(id_konfirmasi) as IDKonfirmasi from konfirmasi");
			$data = mysqli_fetch_array($konfirmasi);
			$idKon = $data['IDKonfirmasi'];
			$noUrut = (int) substr($idKon, 6, 5);
			$noUrut++;

			$cha = "TRFBMK";
			$idKon = $cha . sprintf("%04s", $noUrut);


			$kon = mysqli_query($koneksi,"INSERT INTO konfirmasi VALUES ('$idKon','Belum Transfer', 'Belum Transfer','Belum Transfer','Belum Lunas')");
			$insert = mysqli_query($koneksi,"INSERT INTO registrasi VALUES ('$noRegis','$noAkun', '$id','$idKon')");


			if ($query && $insert && $kon) {
				echo "<script>document.location='invoice-print.php?id=$noRegis';</script>";
			}else {
				echo "<script>alert('Data Gagal Ditambahkan')</script>";
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
