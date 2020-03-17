
<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <link rel="icon" type="image/png" href="images/icons/logo.gif" />
   <title>Pusat Pengembangan Sumber Daya Manusia Aparatur</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap 4 -->

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">

   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 </head>
 <body onload="window.print()">
 <div class="wrapper">

   <?php
   include 'koneksi.php';
   $id = $_GET['id'];
   $query = mysqli_query($koneksi, "SELECT * from registrasi rg, akun ak, pelatihan pl WHERE rg.no_akun = ak.no_akun and rg.id_pelatihan = pl.id_pelatihan and no_registrasi='$id'");

   while ($row = mysqli_fetch_array($query)) {



    ?>
   <!-- Main content -->
   <section class="invoice">
     <!-- title row -->
     <div class="row">
       <div class="col-12">
         <h2 class="page-header">
           <br>
           <small class="float-left"><img width="45px" src="images/icons/logo.gif">&nbsp PPSDM Aparatur Bandung</small>

           <?php
             date_default_timezone_set('Asia/Jakarta');
           $date = date('d/m/Y');
            ?>
           <small class="float-right"><?php echo $date ?></small>
         </h2><br><br>
       </div>
       <!-- /.col -->
     </div>
     <!-- info row -->
     <div class="row invoice-info">
       <div class="col-sm-4 invoice-col">
         From
         <address>
           <strong>Admin, PPSDMA</strong><br>
           Jl. Cisitu Lama no.37 Bandung<br>
           Phone : 022 – 2502428<br>
          Email : info.ppsdma@esdm.go.id
         </address>
       </div>
       <!-- /.col -->
       <div class="col-sm-4 invoice-col">
         To
         <address>
           <strong><?php echo $row['nama_lengkap']?></strong><br>
           <?php echo $row['alamat_rumah'] ?><br>
           Phone: <?php echo $row['notelp_pribadi'] ?> <br>
           Email: <?php echo $row['alamat_email'] ?>
         </address>
       </div>
       <!-- /.col -->
       <div class="col-sm-4 invoice-col">
         <b>Registration : </b><br>
         <b>Nomor akun : <?php echo $row['no_akun'] ?></b><br>
         <b>Nomor Registrasi : <?php echo $row['no_registrasi'] ?></b><br>

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

     <!-- Table row -->

     <div class="row">
       <div class="col-12 table-responsive"><br><br>
         <table class="table table-striped">
           <thead>
           <tr>
             <th>ID</th>
             <th>Pelatihan</th>
             <th>Rentang Watu</th>
             <th>Description</th>
             <th>Subtotal</th>
           </tr>
           </thead>
           <tbody>
           <tr>
             <td><?php echo $row['id_pelatihan'] ?></td>
             <td><?php echo $row['judul_pelatihan'] ?></td>
             <td><?php echo $row['tgl_pelatihan'] ?></td>
             <td>Pembayaran Pelatihan</td>
             <td>Rp. 500.000</td>
           </tr>
           </tbody>
         </table><br><br>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

     <?php

   } ?>

     <div class="row">
       <!-- accepted payments column -->
       <div class="col-6">
         <p class="lead">Payment Methods:</p>
         <img src="img/mandiri.png" alt="">

         <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Silahkan transfer sesuai jumlah nominal yang tertera.
          <table class="table">
            <tr>
              <th>Nomor Rekening</th>
              <td>:</td>
              <td>013265478987</td>
            </tr>
            <tr>
              <th>Atas Nama</th>
              <td>:</td>
              <td>PPSDM Aparatur Bandung</td>
            </tr>
          </table>
         </p>
       </div>
       <!-- /.col -->
       <div class="col-6">
         <?php

         $besok = date('d/m/Y H:i:s', time() + (60 * 60 * 24)); ?>
         <p class="lead">Pembayaran Hingga : <?php echo $besok ?></p>

         <div class="table-responsive">
           <table class="table">
             <tr>
               <th style="width:50%">Subtotal:</th>
               <td>Rp. 500.000</td>
             </tr>
             <tr>
               <th>Kode Unik</th>
               <td>Rp. 895</td>
             </tr>
             <tr>
               <th>Total:</th>
               <td>Rp.500.895</td>
             </tr>
           </table>
         </div>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
   <!-- /.content -->
 </div>
 <!-- ./wrapper -->
 </body>
 </html>
