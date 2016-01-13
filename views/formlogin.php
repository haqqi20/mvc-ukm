<?php

require_once 'models/user.php';

if($user->super_is_loggedin()!="")
{
	$user->redirect('?go=dashboardsuperadmin');
}

if($user->ukm_is_loggedin()!="")
{
	$user->redirect('?go=dashboardukmadmin');
}


if(isset($_POST['btn-login']))
{
	$uname = $_POST['txt_uname_email'];
	$upass = $_POST['txt_password'];
	$admtype = $_POST['admtype'];

	if($admtype=='Admin Web')
	{
		if($user->login($uname,$upass,$admtype))
		{
			$user->redirect('?go=dashboardsuperadmin');
		}
		else
		{
			$error = "Username/Password/Tipe Admin Salah";
		}	
	}


	else
		{
		if($user->loginukm($uname,$upass,$admtype))
		{
			$user->redirect('?go=dashboardukmadmin');
		}
		else
		{
			$error = "Username/Password/Tipe Admin Salah";
		}	
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Login Admin</title>
	<meta charset ="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/tambahan.css">
	<link rel="stylesheet" href="assets/css/signin.css">

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
		
		<br><br>
		
<div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Administrator Only</h2>

        <?php
			if(isset($error))
			{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i><?php echo $error; ?> 
                     </div>
                     <?php
			}
			?>
       

        <input type="username" class="form-control" name="txt_uname_email"  placeholder="Username" required autofocus>
        <input type="password"  name="txt_password" class="form-control" placeholder="Password" required>
        <select type="select" class="form-control"  name="admtype"  >
												<option>Admin UKM</option>
												<option>Admin Web</option>																
		</select>
	
        <button type="login" class="btn btn-lg btn-primary btn-block" type="submit" name="btn-login">Sign in</button>
      </form>
</div>


	<footer class="footer" style="background-color:#004359">
      <div class="container ">
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