<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pelatihan E-Learning</h3>

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
            <th>Judul Pelatihan</th>
            <th>Deskirpsi</th>
            <th>Narasumber</th>
            <th>Rentang Waktu</th>
            <th>Foto Pelatihan</th>
            <th>Action</th>
          </tr>
          <?php
          include '../koneksi.php';
          $query = "SELECT * FROM pelatihan where jenis_pelatihan='e-learning'";
          $hasil = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_array($hasil)) {


           ?>
          <tr>
            <td><?php echo $row['id_pelatihan'] ?></td>
            <td><?php echo $row['judul_pelatihan'] ?></td>
            <td><?php echo $row['deskripsi'] ?></td>
            <td><?php echo $row['narasumber'] ?></td>
            <td><?php echo $row['tgl_pelatihan'] ?></td>
            <td><a href="<?php echo $row['foto_pelatihan'] ?>"><?php echo $row['foto_pelatihan'] ?></a></td>
            <td><button type="submit" class="btn btn-default" name="hapus"><a href="#">Hapus
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
