
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Admin</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" method="POST">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Ulangi Password</label>
            <input type="password" class="form-control" name="repassword" placeholder="Ulangi Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap"  placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Nomor Telephone</label>
            <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Alamat Email</label>
            <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
          </div>
          <div class="from-group">
            <label >Hak Akses</label>
            <select name="hak_akses" data-show-subtext="true" class="selectpicker form-control" data-live-search="true">
              <option value="" selected disabled>Pilih Hak Akses</option>
              <option value="Admin Diklat">Diklat</option>
              <option value="Admin E-Learning">E-Learning</option>
              <option value="Admin BIMTEK">BIMTEK</option>
            </select>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include'../koneksi.php';

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];
    $nalengkap = $_POST['nama_lengkap'];
    $telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $hak_akses = $_POST['hak_akses'];
    $passmd = md5($pass);

    $cekuser = mysqli_query($koneksi, "SELECT * FROM admin WHERE username ='$user'");

    if (mysqli_num_rows($cekuser) > 0) {
      echo "<script>alert('Username Sudah Terdaftar !')</script>";
    } else {
      if (!$user || !$pass || !$nalengkap || !$telp || !$email) {
        echo "<script>alert('Masih Ada Data Yang Kosong !')</script>";
      } elseif ($pass == $repass) {
        $akses  = mysqli_query($koneksi, "SELECT max(id_admin) as MaxAdmin from admin where hak_akses='$hak_akses'");
        $data = mysqli_fetch_array($akses);
        $idAdmin = $data['MaxAdmin'];
        $noUrut = (int) substr($idAdmin, 3, 3);
        $noUrut++;
        if ($hak_akses == "Admin Diklat") {
          $char = "DK";
        } elseif ($hak_akses == "Admin E-Learning") {
          $char = "EL";
        } elseif ($hak_akses == "Admin BIMTEK") {
          $char = "BT";
        }
        $idAdmin = $char . sprintf("%03s", $noUrut);

        $query = "INSERT INTO admin VALUES('$idAdmin', '$user', '$passmd', '$nalengkap', '$telp' , '$email','$hak_akses')";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
          echo "<script>alert('Data Berhasil Ditambahkan Ditambahkan')</script>";
        }else {
          echo "<script>alert('Data Gagal Ditambahkan')</script>";
        }
      } else {
          echo "<script>alert('Password tidak sama !')</script>";
      }
    }
}
?>
