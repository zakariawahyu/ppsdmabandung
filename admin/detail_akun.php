<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Info Akun</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-condensed table-hover">
          <?php
          include '../koneksi.php';
          $session = $_SESSION['username'];
          $query = "SELECT * FROM admin WHERE username='$session'";
          $hasil = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_array($hasil)) {

           ?>
           <tr>
             <td>ID</td>
             <td>:</td>
             <td><?php echo $row['id_admin'] ?></td>
           </tr>
          <tr>
            <td width="160">Username</td>
            <td width="10">:</td>
            <td><?php echo $row['username']; ?></td>
          </tr>
          <tr>
            <td width="160">Nama Admin</td>
            <td width="10">:</td>
            <td><?php echo $row['nama_admin']; ?></td>
          </tr>
          <tr>
            <td width="160">Nomor Telephone</td>
            <td width="10">:</td>
            <td><?php echo $row['notelp_admin']; ?></td>
          </tr>
          <tr>
            <td width="160">Email</td>
            <td width="10">:</td>
            <td><?php echo $row['email_admin']; ?></td>
          </tr>
        </table>
      </div>
    <?php } ?>
      <!-- /.card-body -->
    </div>
  </div>
</div>
