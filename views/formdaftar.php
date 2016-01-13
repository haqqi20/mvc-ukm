<!DOCTYPE html>
<html lang="en">
<head>

	<title>Form Pendaftaran</title>
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
	margin-bottom: 650px;
	background-color: #eee;
	padding-top: 70px; 
	padding-bottom : 150px;
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
		




		
		
				<div class="col-md-6 col-md-offset-3 ">
		
					 <form class="well" action="/mvc-ukm/?go=daftar" method="post">
					 <h3 >Isi data diri anda</h3>
					 
						<label>Pilih UKM</label>
																								<!--akan menggunakan php-->
						<select class="form-control" name="ukm"  >


                        <?php 
                        $dbh = Database::getInstance();
                        $rs = $dbh->query("SELECT * FROM ukmlist WHERE statuskuota='0'");    //where status='0'
//
                            foreach ($rs as $pendaftar => $list)
                            {
                                echo '
                            
                               <option>'.$list['namaukm'].'</td></option>
                                
                                ';
                            }

                        ?>
                  
                         </select>
											  
											  
											 
											<br>
											<div class="form-group">
											  <label >Nama:</label>
											  <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
											</div>
											<div class="form-group">
											  <label >NIM:</label>
											  <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" required>
											</div>
											<div >
											<label>Jenis Kelamin :</label>
											<select class="form-control"name="jk"  >
												<option >Laki-Laki</option>
												<option>Perempuan</option>
											</select>
											</div>
											  
											  <br>
											<div class="form-group">
											  <label>Nomor HP:</label>
											  <input type="text" class="form-control" placeholder="Nomor yg dapat dihubungi" name="nope" required>
											</div>

									<button type="submit" class="btn btn-default">Daftar</button>
												
							</form>
					 

					
				
				</div>
				<div class="col-md-6 col-md-offset-3 well">
					<div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                         
                                            
                                            <th>TABEL UKM YANG TELAH PENUH</th>
                                           
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                            $dbh = Database::getInstance();
                            $rs = $dbh->query("SELECT * FROM ukmlist WHERE statuskuota='1' ");    //where status='0'
    //
                            foreach ($rs as $ukmlist => $list)
                            {
                                echo '<tr class="even gradeC">
                               
                                <td>'.$list['namaukm'].'</td>
                                
                               
                                </tr>';
                            }

                        ?>       




                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
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
	

<script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
    $(document).ready(function() {
        $('#dataTables-semua').DataTable({
                responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-terima').DataTable({
                responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-tolak').DataTable({
                responsive: true
        });
    });
    </script>

</body>
</html>