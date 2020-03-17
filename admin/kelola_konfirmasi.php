<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pelatihan</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>ID</th>
            <th>Nomor Registrasi</th>
            <th>Foto Bukti</th>
            <th>Nama Lengkap</th>
            <th>Pilihan Pelatihan </th>
            <th>Status Konfirmasi</th>
            <th>Action</th>
          </tr>
          <?php
          include '../koneksi.php';
          $query = "SELECT * from registrasi rg, akun ak, pelatihan pl, konfirmasi kf WHERE rg.id_konfirmasi = kf.id_konfirmasi and rg.no_akun = ak.no_akun and rg.id_pelatihan = pl.id_pelatihan";
          $hasil = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_array($hasil)) {


           ?>
          <tr>
            <td><?php echo $row['id_konfirmasi'] ?></td>
            <td><?php echo $row['no_registrasi'] ?></td>
            <td><a href="../<?php echo $row['foto_bukti'] ?>"><?php echo $row['foto_bukti'] ?></a></td>
            <td><?php echo $row['nama_lengkap'] ?></td>
            <td><?php echo $row['judul_pelatihan'] ?></td>
            <td><?php echo $row['status_pembayaran'] ?></td>
            <td><button type="submit" class="btn btn-block btn-outline-primary" name="hapus"><a href="konfirmasi_transfer.php?id=<?php echo $row['id_konfirmasi'] ?>">Konfirmasi
                            </a></button></td>
          </tr>
          <?php
        }
           ?>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
