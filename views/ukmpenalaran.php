<section id="page4">






<div class="container">
  <h2>UKM PENALARAN</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">DNCC</a></li>
    <li><a href="#menu1">WARTADINUS</a></li>


  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
					<?php 
			$dbh = Database::getInstance();
			$rs = $dbh->query("SELECT * FROM ukmlist WHERE namaukm='DNCC'");  
			foreach ($rs as $ukm => $list)
			{
			 echo '   
			<div class="well">
							<div class="well" style="background-color:#008AB8" >
								<div class=col-sm>
									<h2><img  src="image/logo/dncc.png" width="150" height="150">

										 
													'.$list['nama_resmi'].'
													
													</h2>
												</div>
											</div>
				                                <p>Nama Resmi :</p>
												<pre>'.$list['nama_resmi'].'</pre>
				                                <p>Visi dan Misi :</p>
												<pre>'.$list['visimisi'].'</pre>
												<p>Ketua :</p>
												<pre>'.$list['ketua'].'</pre>
												<p>Prestasi :</p>
												<pre>'.$list['prestasi'].'</pre>
												<p>Kuota :</p>
												<pre>'.$list['kuota'].' </pre>
												</div>
												';
						                            }
						                   ?>
    </div>
    <div id="menu1" class="tab-pane fade">
     
	
					<?php 
			$dbh = Database::getInstance();
			$rs = $dbh->query("SELECT * FROM ukmlist WHERE namaukm='WARTADINUS'");  
			foreach ($rs as $ukm => $list)
			{
			 echo '   
			<div class="well">
							<div class="well" style="background-color:#008AB8" >
								<div class=col-sm>
									<h2><img  src="image/logo/pers.png" width="150" height="150">

										 
													'.$list['nama_resmi'].'
													
													</h2>
												</div>
											</div>
				                                <p>Nama Resmi :</p>
												<pre>'.$list['nama_resmi'].'</pre>
				                                <p>Visi dan Misi :</p>
												<pre>'.$list['visimisi'].'</pre>
												<p>Ketua :</p>
												<pre>'.$list['ketua'].'</pre>
												<p>Prestasi :</p>
												<pre>'.$list['prestasi'].'</pre>
												<p>Kuota :</p>
												<pre>'.$list['kuota'].' </pre>
												</div>
												';
						                            }
						                   ?>
	 
    </div>
    
    
  </div>
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>






		</section>