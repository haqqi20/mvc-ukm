<?php
include('session.php');

//buat koneksi dengan MySQL
$link=mysql_connect('localhost','root','');
   
//jika koneksi gagal, langsung keluar dari PHP
if (!$link)
{
   die("Koneksi dengan MySQL gagal");
}

//gunakan database universitas
$result=mysql_query('USE ukm');
if (!$result)
{
   die("Database mahasiswa gagal digunakan");
}
 
//tampilkan tabel mahasiswa_ilkom
$result=mysql_query('SELECT * FROM pendaftar');


  //gunakan database universitas
$diterima=mysql_query('USE ukm');
if (!$diterima)
{
   die("Database UKM gagal digunakan");
}
 
//tampilkan tabel mahasiswa_ilkom
$diterima=mysql_query('SELECT * FROM diterima');

 

?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Pendaftaran Online UKM UDINUS </title>
<meta charset ="utf-8">
<meta name="viewport" content"width="device-width, intial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src ="js/jquery.min.js">  </script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/tambahan.css">
<style>

.navbar {
background-color :#008AB8;
}
 .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
}
.navbar-nav li a:hover, .navbar-nav li.active a {
      color: #008AB8 !important;
      background-color: #fff !important;
 }
 .jumbotron{
		background-color:#008AB8;
		color: #fff;
		padding: 50px 25px;
		
 }

.navbar-bottom {
  position: absolute;
  width:200px;
  height: 160px;
  background-color: #008AB8;
}
.col-sm
{
 color: #fff;
}


</style>

</head>
<body>
<nav  class="navbar navbar-default navbar-fixed-top" > 
<div class="container">
	<div class="navbar-header">
	<a class="navbar-brand" href="http://localhost/proyek_pronet/">UKM UDINUS</a> <!-- header -->
</div>

<div>
	<ul class="nav navbar-nav pull-right">
		<li><a  href="http://localhost/proyek_pronet/pengumuman.php">Pengumuman</a></li>
		<li><a  href=""><?php echo $login_session; ?></a></li>
		<li><a  href="logout.php">Logout</a></li>
	</ul>
</div>
</div>
</nav>
<body>
<div class="container tengah " >

<div class="row well">
<div class="well" style="background-color:#008AB8" >
	
	<div class=col-sm>
		<h4 class="text-center">UKM Admin Tools</h4>
	</div>
	
	
</div>


<form action="hasil.php" method="post">
    
      <label >Set KUOTA :</label>
      <input type="text" class="form-control" id="kuota" name="kuota" placeholder="Masukkan Bilangan">
    

   <br>
    <input  name="submit" id="submit" value="Set KUOTA" class="btn btn-default">
  </form>

</div>
<div class="row well">
<div class="well" style="background-color:#008AB8" >
	
	<div class=col-sm>
		<h4 class="text-center">Verifikasi Pendaftar</h4>
	</div>

</div>


<table class="table table-bordered">
 <thead>
      <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jenis Kelamin</th>
		<th>Nomor HP</th>
		<th>Aksi</th>
      </tr>
    </thead>
	   <?php $i=1; while ($row=mysql_fetch_array($result)){?>
   
 <tr>  
<td><?php echo $row['nama']; ?></td>
<td><?php echo $row['nim']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td>
 <a href="terima.php?id=<?php echo $row['nim'] ?>">terima</a>             |
 <a href="tolak.php?id=<?php echo $row['nim'] ?>" onclick="return confirm('Anda yakin menolak sekaligus menghapus data?')">tolak</a></td>

 
</tr>
    
<?php $i++; }?>
 </table>



</div>

<div class="row well">
<div class="well" style="background-color:#008AB8" >
	
	<div class=col-sm>
			<h4 class="text-center">Pendaftar Terverifikasi</h4>
		
	</div>

</div>
  <table class="table table-bordered">
   
	</table>

<table class="table table-bordered">
 <thead>
      <tr>
	   
        <th>Nama</th>
        <th>NIM</th>
        <th>Jenis Kelamin</th>
		<th>Nomor HP</th>
		
      </tr>
    </thead>
	  <?php 
	  while ($row=mysql_fetch_array($diterima))
	  {
   
   
echo "<tr>";
 
   echo "<td>".$row['nama']."</td>";
   echo "<td>".$row['nim']."</td>";
   echo "<td>".$row['gender']."</td>";
   echo "<td>".$row['phone']."</td>";

   echo "</tr>";
  
   
 } ?> </table>



</div>
</div>
  <footer class="footer" style="background-color:#004359">
      <div class="container ">
        <h6>&copy github.com/rezwira</h6>
		<h6>&copy github.com/alansa302</h6>
		
      </div>
    </footer>
	  
 
</body>

</html>