<?php
include "koneksi.php";
$nomorakun = $_GET['akun'];
if (isset($_POST['regisdiklat'])) {
  $pelatihan = $_POST['idpel'];
  $regis  = mysqli_query($koneksi, "SELECT max(no_registrasi) as NoRegis from registrasi");
  $data = mysqli_fetch_array($regis);
  $noRegis = $data['NoRegis'];
  $noUrut = (int) substr($noRegis, 9, 8);
  $noUrut++;

  $pel = mysqli_query($koneksi, "SELECT * FROM pelatihan WHERE id_pelatihan='$pelatihan'");
  $row = mysqli_fetch_array($pel);
  $pelatihanku = $row['jenis_pelatihan'];


  if ($pelatihanku == "Diklat") {
      $char = "DKT102019";
      $cha = "TRFDKT";
  } elseif ($pelatihanku == "E-Learning") {
      $char = "ELN202019";
      $cha = "TRFELN";
  } elseif ($pelatihanku == "BIMTEK") {
      $char = "BMK302019";
      $cha = "TRFBMK";
  }


  $noRegis = $char . sprintf("%07s", $noUrut);

  $konfirmasi  = mysqli_query($koneksi, "SELECT max(id_konfirmasi) as IDKonfirmasi from konfirmasi");
  $data = mysqli_fetch_array($konfirmasi);
  $idKon = $data['IDKonfirmasi'];
  $noUrut = (int) substr($idKon, 6, 4);
  $noUrut++;

  $idKon = $cha . sprintf("%04s", $noUrut);

  $konfirmasi = mysqli_query($koneksi,"INSERT INTO konfirmasi VALUES ('$idKon','Belum upload','Terdaftar (Belum Lunas)')");
  $insertregis = mysqli_query($koneksi,"INSERT INTO registrasi VALUES ('$noRegis','$nomorakun', '$pelatihan','$idKon')");

  if ($konfirmasi && $insertregis) {
    echo "<script>document.location='invoice-print.php?id=$noRegis';</script>";
  }else {
    echo "<script>alert('Data Gagal Ditambahkan')</script>";
  }
} ?>
