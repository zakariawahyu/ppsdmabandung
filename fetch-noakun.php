<?php
include "koneksi.php";
$output =' ';
if (isset($_POST['query'])) {
  $search = mysqli_real_escape_string($koneksi, $_POST['query']);
  $query = "SELECT * FROM akun where nama_lengkap LIKE '%".$search."%'";

  $pelatihan = mysqli_query($koneksi, "SELECT * from pelatihan");

  $result = mysqli_query($koneksi, $query);
  while ($rowcari = mysqli_fetch_array($result)) {

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
        <td width="160">NIP</td>
        <td width="10">:</td>
        <td><?php echo $rowcari['nip'] ?></td>
      </tr>
      <tr>
        <td width="160">Agama</td>
        <td width="10">:</td>
        <td><?php echo $rowcari['agama'] ?></td>
      </tr>
      <tr>
        <td width="180">Tempat, Tangal Lahir</td>
        <td width="10">:</td>
        <td><?php echo $rowcari['ttl'] ?></td>
      </tr>
      <tr>
        <td width="160">Jenis Kelamin</td>
        <td width="10">:</td>
        <td><?php echo $rowcari['jenis_kelamin'] ?></td>
      </tr>
      <tr>
        <td width="160">Pekerjan</td>
        <td width="10">:</td>
        <td><?php echo $rowcari['pekerjaan'] ?></td>
      </tr>
    </table>
<form class="form-horizontal" method="post" action="test.php?akun=<?php echo $rowcari['no_akun'] ?>">

      <?php

  }

    ?>

      <div class="col-sm-12">
        <div class="alert alert-info">
          <strong>Data Akun Sudah Benar ?</strong>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="pendidikanterakhir">Pilih Sekali lagi pelatihan</label>
        <div class="col-sm-7">

          <select name="pelatihan" data-show-subtext="true" class="selectpicker form-control" data-live-search="true">
            <option value="" selected disabled>Pilih Pelatihan</option>
            <?php while ($rowpelatihan = mysqli_fetch_array($pelatihan)) { ?>

            <option value="<?php echo $rowpelatihan['id_pelatihan'] ?>"><?php echo $rowpelatihan['judul_pelatihan'] ?></option>
              <?php   } ?>
          </select>

        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-7">
          <button type="submit" name="regisdiklat" class="btn btn-success btn-lg">Registrasi</button>
        </div>
      </div>
    </form>

    <?php



}


 ?>
