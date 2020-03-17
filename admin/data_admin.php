<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Akun Admin</h3>

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
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>No Telephone</th>
            <th>Email</th>
            <th>Hak Akses</th>
            <th>Action</th>
          </tr>
          <?php
          include '../koneksi.php';
          $query = "SELECT * FROM admin";
          $hasil = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_array($hasil)) {


           ?>
          <tr>
            <td><?php echo $row['id_admin']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['nama_admin']; ?></td>
            <td><?php echo $row['notelp_admin']; ?></td>
            <td><?php echo $row['email_admin']; ?></td>
            <td><?php echo $row['hak_akses']; ?></td>
            <td><button type="submit" class="btn btn-default" name="hapus"><a href="#">Hapus
                            </a></button></td>
          </tr>
          <?php

        } ?>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
