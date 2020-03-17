<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Semua Data Teregistrasi</h3>

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
        <?php
        include '../koneksi.php';
        $hasil = mysqli_query($koneksi, "SELECT * from akun");



         ?>
        <table class="table table-hover">

          <tr>
            <th>Nomor Akun</th>
            <th>Nama Lengkap</th>
            <th>NIP</th>
            <th>Agama</th>
            <th>TTL</th>
            <th>Jenis Kelamin</th>
            <th>Pekerjaan</th>
            <th>Status Perkawinan</th>
            <th>Pangkat</th>
            <th>Pendidikan Terakhir</th>
          </tr>
          <?php while ($row = mysqli_fetch_array($hasil)) { ?>
          <tr>
            <td><?php echo $row['no_akun'] ?></td>
            <td><?php echo $row['nama_lengkap'] ?></td>
            <td><?php echo $row['nip'] ?></td>
            <td><?php echo $row['agama'] ?></td>
            <td><?php echo $row['ttl'] ?></td>
            <td><?php echo $row['jenis_kelamin'] ?></td>
            <td><?php echo $row['pekerjaan'] ?></td>
            <td><?php echo $row['status_perkawinan'] ?></td>
            <td><?php echo $row['pangkat'] ?></td>
            <td><?php echo $row['pendidikan_terakhir'] ?></td>
          </tr>
          <?php

        } ?>
        </table>

      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
