<html>
	<head>
		<title>Edit Data</title>
		<link rel="stylesheet" href="/mvc-ukm/assets/css/bootstrap.css" />
		<script type="text/javascript" src="/mvc-ukm/assets/js/bootstrap.js"></script>
	</head>


<body>
		
			<div class="col-md-12">
				<div class="col-md-4">&nbsp;</div>
				
				<div class="col-md-4"><h3>Edit Data Pendaftar</h3>



					<?php 
					echo '<form  action="/mvc-ukm/?go=update-data&i=' . $rs['idpendaftar'] . ' " method="post">';
						
						

						echo '<div class="form-group">
								<label >NIM:</label>
								<input type="text" class="form-control"  name="nim" value="' . $rs['nim'] . '">
								</div>';
						echo '<div class="form-group">
								<label >Nama:</label>
								<input type="text" class="form-control" name="nama" value="' . $rs['nama'] . '">
								</div>';
						echo '<div >
							 <label>Jenis Kelamin :</label>
								<select class="form-control"name="jk"  >
											<option >' . $rs['gender'] . '</option>
											<option >Laki-Laki</option>
											<option>Perempuan</option>
								</select>
								</div><br>';

						echo '<div class="form-group">
								<label >NO HP:</label>
								<input type="text" class="form-control"  name="nope" value="' . $rs['phone'] . '">
								</div>';

						echo '<button type="submit" class="btn btn-default">Update</button>';
						
	
						
					?>
					</div>
					</div>
				
				
			
	


</body>
</html>