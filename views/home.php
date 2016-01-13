<div class="text-center container marketing">

<h2 >Selamat Datang Calon Anggota Baru UKM UDINUS !</h2>
<h4>Silahkan Ikuti Langkah Pendaftaran Sebagai Berikut : </h4>


      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-sm-4">
          <img class="img-circle" src="image/index1.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Baca Info UKM</h2>
          <p>Visi Misi UKM dan info lainnya</p>
     
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <img class="img-circle" src="image/index2.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Daftarkan Diri Anda</h2>
          <p>Segera mendaftar pada UKM yang anda minati</p>
        
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <img class="img-circle" src="image/index3.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Tunggu Pengumuman</h2>
          <p>UKM akan segera menyeleksi pendaftar</p>
         
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

		
		<!-- Content -->

    <?php
$open=fopen("views/counter.php","r");
$lama=fgets($open,255);
$tutup=fclose($open);

$lama++;

$open=fopen("views/counter.php","w");
fputs($open,$lama);
$tutup=fclose($open);
?>

 </div>

