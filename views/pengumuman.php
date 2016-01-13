

<div class="container tengah " >


<div class="row well">
<div class="well" style="background-color:#008AB8" >
	
	<div class=col-sm>
		<h4 class="text-center">Daftar Peserta Anggota Baru yang Telah Diterima</h4>
		<h6 class="text-center"></h6>
	</div>

</div>
 
   
	<div class="panel panel-default">
                        <div class="panel-heading">
                            DITERIMA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-semua">
                                    <thead>
                                        <tr>
                                         
                                            <th>DITERIMA DI UKM</th>
                                            <th>NAMA</th>
                                            <th>NIM</th>
                                            <th>GENDER</th>
                                           
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                            $dbh = Database::getInstance();
                            $rs = $dbh->query("SELECT * FROM pendaftar WHERE terima='1' and tolak='0'  ");    //where status='0'
    //
                            foreach ($rs as $pendaftar => $list)
                            {
                                echo '<tr class="even gradeC">
                               
                                <td>'.$list['nama_ukm'].'</td>
                                  <td>'.$list['nama'].'</td>
                                <td>'.$list['nim'].'</td>
                              
                                <td>'.$list['gender'].'</td>
                               
                               
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



</div>


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



</div>
  

