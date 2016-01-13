<?php
include('session.php');
include('createukm.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Hasil Pengumuman</title>
<meta charset ="utf-8">
<meta name="viewport" content"width="device-width, intial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src ="js/jquery.min.js">  </script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/tambahan.css">

</head>
<body>
<nav  class="navbar navbar-default navbar-fixed-top" > 
	
		<div >
			<div class="navbar-header">
				<a  class="navbar-brand" href="http://localhost/proyek_pronet/">UKM UDINUS</a>	<!-- header -->
			</div>
			
				<ul class="nav navbar-nav  pull-left" id="myTab">
				
				 <li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Pilih UKM <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li><a href="/proyek_pronet/#page1" id="page1-link">UKM KHUSUS</a></li>
							<li><a href="/proyek_pronet/#page2" id="page2-link">UKM KESENIAN</a></li>
							<li><a href="/proyek_pronet/#page3 id="page3-link">UKM OLAHRAGA</a></li>
							<li><a href="/proyek_pronet/#page4 id="page4-link">UKM PENALARAN</a></li>
							<li><a href="/proyek_pronet/#page5 id="page5-link">UKM KEROHANIAN</a></li>
							<!--<li role="separator" class="divider"></li>
							<li class="dropdown-header">Nav header</li> -->
							
						</ul>
					</li>
					<li><a  href="http://localhost/proyek_pronet/registrasi.php">Pendaftaran</a></li>
					<li><a  href="http://localhost/proyek_pronet/pengumuman.php">Pengumuman</a></li>
					
				
				
					
					
					
				
				</ul>
				<ul class="nav navbar-nav  pull-right">
			
			<li><a ><?php echo $login_session; ?></a></li>
		<li><a  href="logout.php">Logout</a></li>
			</ul>
				
				
			

		</div>
	</nav>
<div>
		
	
</div>
</div>
</nav>
<body>
<br>
<div class="container tengah " >


<div class="row well">
<div class="well" style="background-color:#008AB8" >
	
	<div class=col-sm>
		<h4 class="text-center">Web Admin Tools</h4>
	</div>
	
	
</div>


<form action="hasil.php" method="post">
    
      <label >Nama UKM :</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Nama ukm yang ingin ditambahkan" required>
    
    
      <label >Password :</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
   
   <br>
    <input type="submit" name="submit" id="submit" value="Create UKM" class="btn btn-default">
  </form>

</div>
</div>
  <footer class="footer" style="background-color:#004359">
      <div class="container ">
      
      </div>
    </footer>
	  
 
</body>

</html>