<!DOCTYPE html>
<html lang="en">
<head>

	<title>Home</title>
	<meta charset ="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/tambahan.css">

	<script type="text/javascript" src ="assets/js/jquery.min.js">  </script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>


	<style>

body {
  /* Margin bottom by footer height */
	margin-bottom: 150px;
	background-color: #eee;
	padding-top: 70px; 
	padding-bottom : 50px;
}
.footer {
  position: absolute;
  bottom: 0px;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 50px;
  background-color: #f5f5f5;
  color:#fff;
  
}

</style>


</head>


<body>


<div class="wrapper">
<!---	navigasi	-->
				

		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
		  
		  
				<!-- 	header 		-->
				
				
			<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="?go=home">UKM UDINUS</a>
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">
			  <ul class="nav navbar-nav  pull-left" id="myTab">
					
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Pilih UKM <b class="caret"></b></a>
							<ul class="dropdown-menu">
								
								<li><a href="?go=ukmkhusus" >UKM KHUSUS</a></li>
								<li><a href="?go=ukmkesenian" id="page2-link">UKM KESENIAN</a></li>
								<li><a href="?go=ukmolahraga" id="page3-link">UKM OLAHRAGA</a></li>
								<li><a href="?go=ukmpenalaran" id="page4-link">UKM PENALARAN</a></li>
								<li><a href="?go=ukmkerohanian" id="page5-link">UKM KEROHANIAN</a></li>
							
								
							</ul>
						</li>
								<li><a  href="?go=pendaftaran">Pendaftaran</a></li>
								<li><a  href="?go=pengumuman">Pengumuman</a></li>
					</ul>
					<ul class="nav navbar-nav  pull-right">
				
				<li><a  href="?go=login">Login</a></li>
				</ul>
			</div>
		  </div>
		</nav>
		
		<!-- end navigasi -->

	
				

	<?php
		$pages_dir = 'views';
		if(!empty($_GET['go'])){
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);
			
			$go = $_GET['go'];
			if(in_array($go.'.php', $pages)){
				include($pages_dir.'/'.$go.'.php');
			} else {
				include($pages_dir.'/404.php');
			}
		} else {
			include($pages_dir.'/home.php');
		}
	?>





</div>
 
  <footer class="footer" style="background-color:#004359">
      <div class="container">

        <h5><?php
$open=fopen("views/counter.php","r");
$lama=fgets($open,255);
$tutup=fclose($open);


$open=fopen("views/counter.php","w");
fputs($open,$lama);
$tutup=fclose($open);
?>
Pengunjung Website : <?php echo $lama;?>
</h5>

		
      </div>
    </footer>


</body>


</html>