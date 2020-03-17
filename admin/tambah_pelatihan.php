
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Pelatihan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Judul Pelatihan</label>
            <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Pelatihan">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deskirpsi Singkat</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskirpsi">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Narasumber</label>
            <input type="text" class="form-control" name="narasumber" placeholder="Masukkan Narasumber">
          </div>
          <div class="form-group">
            <label>Date range:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="text" name="daterange" class="form-control float-right" />
            </div>
          </div>
          <div class="from-group">
            <label >Pelatihan</label>
            <select name="pelatihan" data-show-subtext="true" class="selectpicker form-control" data-live-search="true">
              <option value="" selected disabled>Pilih Pelatihan</option>
              <option value="Diklat">Diklat</option>
              <option value="E-Learning">E-Learning</option>
              <option value="BIMTEK">BIMTEK</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
  date_default_timezone_set('Asia/Jakarta');
  $judulpelatihan = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $narasumber = $_POST['narasumber'];
  $date = $_POST['daterange'];
  $jenis_pelatihan = $_POST['pelatihan'];

  $name = $_FILES['gambar']['name'];
  $size = $_FILES['gambar']['size'];
  $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

  if (strlen($name)) {
    list($txt, $ext) = explode(".", $name);
    if (in_array($ext, $allowed_ext)) {
      if ($size < (5000*5000)) {
        $new_image = '';
        $new_name  = time().substr(str_replace(" ", "_", $txt), 5).".".$ext; //acak nama untuk gambar yang baru
        $path = '../images/pelatihan/' . $new_name;  //lokasi penyimpanan gambar yang baru
        list($width, $height) = getimagesize($_FILES["gambar"]["tmp_name"]);

        if ($ext == 'png') {
          $new_image = imagecreatefrompng($_FILES["gambar"]["tmp_name"]);
        } elseif ($ext == 'jpg' || $ext == 'jpeg') {
           $new_image = imagecreatefromjpeg($_FILES["gambar"]["tmp_name"]);
        }

              $new_width=($height/$width)*1280;   //ukuran lebar gambar yang baru
              $new_height = ($height/$width)*720;       //ukuran tinggi gambar yang baru
              $tmp_image = imagecreatetruecolor($new_width, $new_height);
              imagealphablending($tmp_image, false);
              imagesavealpha($tmp_image,true);
              $transparent = imagecolorallocatealpha($tmp_image, 255, 255, 255, 127);
              imagefilledrectangle($tmp_image, 0, 0, $new_width, $new_height, $transparent);
              imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
              imagejpeg($tmp_image, $path, 100);
              imagepng($tmp_image, $path);
              imagedestroy($new_image);
              imagedestroy($tmp_image);

              $pelatihan  = mysqli_query($koneksi, "SELECT max(id_pelatihan) as MaxPelatihan from pelatihan where jenis_pelatihan='$jenis_pelatihan'");
              $data = mysqli_fetch_array($pelatihan);
              $idPelatihan = $data['MaxPelatihan'];
              $noUrut = (int) substr($idPelatihan, 3, 3);
              $noUrut++;
              if ($jenis_pelatihan == "Diklat") {
                $char = "DK01";
              } elseif ($jenis_pelatihan == "E-Learning") {
                $char = "EL02";
              } elseif ($jenis_pelatihan == "BIMTEK") {
                $char = "BT03";
              }
              $idPelatihan = $char . sprintf("%04s", $noUrut);
                      $query = "INSERT INTO pelatihan VALUES ('$idPelatihan', '$judulpelatihan','$deskripsi','$narasumber', '$date', '$path', '$jenis_pelatihan')";
                      $hasil = mysqli_query($koneksi,$query);
                      if ($hasil) {
                        echo "<script>alert('Foto Berhasil Di upload');</script>";
                      } else {
                        echo "<script>alert('Foto Gagal Di upload');</script>";
                      }
      } else {
         echo "<script>alert('Foto terlalu besar, max 5MB');</script>";
      }
    } else {
      echo "<script>alert('Format Gambar Tidak valid , Format Gambar Harus (JPG, Jpeg, gif, png) ');</script>";
    }
  } else {
    echo '<script>alert("Gambar Belum Di Pilih , Harap Memilih Gambar Dahulu");</script>';
  }
}
 ?>
