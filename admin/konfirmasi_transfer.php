<?php
include '../koneksi.php';
$idkonfirm = $_GET['id'];

$konfirm = mysqli_query($koneksi, "UPDATE konfirmasi SET status_pembayaran='Terdaftar (Sudah Lunas)' WHERE id_konfirmasi='$idkonfirm'");

if ($konfirm) {
  echo "<script>alert('Data berhasil di konfirmasi'); document.location='index.php?page=kelola_konfirmasi';</script>";
} else {
  echo "<script>alert('Data gagal di konfirmasi')</script>";
}


 ?>
