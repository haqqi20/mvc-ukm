 <?php
include_once 'models/user.php';
if(!$user->ukm_is_loggedin())
{
    $user->redirect('?go=login');
}
$user_id = $_SESSION['ukm_session'];
$stmt = $DB_con->prepare("SELECT * FROM adminukm WHERE id=:id");
$stmt->execute(array(":id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php print($userRow['ukmname']); ?> - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Dashboard - UKM <?php print($userRow['ukmname']); ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="fa fa-user fa-fw"></i> <?php print($userRow['username']); ?> <i class="fa fa-caret-down"></i></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                         <li><a href="?go=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="?go=dashboardukmadmin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="?go=dashboardukmapendaftar"><i class="fa fa-table fa-fw"></i> Pendaftar</a>
                        </li>
                        <li>
                            <a href="?go=dashboardukmpost"><i class="fa fa-edit fa-fw"></i> Post</a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">

 <div class="panel panel-default">
                        <div class="panel-heading">
                            Set Kuota  
                        </div>

                                                   
                    <?php 

                    $dbh = Database::getInstance();
                    $rs = $dbh->query("SELECT * FROM ukmlist WHERE namaukm='$userRow[ukmname]'");  
                    foreach ($rs as $ukm => $list)
                                    

                    echo '<form  action="/mvc-ukm/?go=set-kuota&i=' .$userRow['ukmname'] . ' "           method="post">';
                       
                                             echo '<div class="form-group">


                                           
                                            <input type="text" class="form-control" placeholder="Input Value" value="'.$list['kuota'].'" name="set" required>
                                            </div>';
                                           

                    echo ' <button type="set" class="btn btn-default">Set</button>';

                    echo ' </form>';
                    ?>


                       </div>


                <div class="panel panel-default">
                        <div class="panel-heading">
                            Nama Resmi
                        </div>
                                                   
                    <?php
                    $dbh = Database::getInstance();
                    $rs = $dbh->query("SELECT * FROM ukmlist WHERE namaukm='$userRow[ukmname]'");  
                    foreach ($rs as $ukm => $list)

                    echo '<form  action="/mvc-ukm/?go=post-nama&i=' .$userRow['ukmname'] . ' "  method="post">';


                     
                       
                                             echo '<div class="form-group">
                                           
                                            <input type="text" class="form-control" placeholder="Input Post" value="'.$list['nama_resmi'].'" name="post_nama" required>
                                            </div>';
                                           

                                   echo ' <button type="set" class="btn btn-default">Post</button>';
                                                
                    echo ' </form>';
                    ?>


                </div>
                    
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Ketua
                        </div>
                                                   
                    <?php
                    $dbh = Database::getInstance();
                    $rs = $dbh->query("SELECT * FROM ukmlist WHERE namaukm='$userRow[ukmname]'");  
                    foreach ($rs as $ukm => $list)

                    echo '<form  action="/mvc-ukm/?go=post-ketua&i=' .$userRow['ukmname'] . ' "  method="post">';


                     
                       
                                             echo '<div class="form-group">
                                           
                                            <input type="text" class="form-control" placeholder="Input Post" value="'.$list['ketua'].'" name="post_ketua" required>
                                            </div>';
                                           

                                   echo ' <button type="set" class="btn btn-default">Post</button>';
                                                
                    echo ' </form>';
                    ?>


                </div>




                 <div class="panel panel-default">
                        <div class="panel-heading">
                            Visi dan Misi
                        </div>
                                                   
                    <?php 
                    $dbh = Database::getInstance();
                    $rs = $dbh->query("SELECT * FROM ukmlist WHERE namaukm='$userRow[ukmname]'");  
                    foreach ($rs as $ukm => $list)
                    echo '<form  action="/mvc-ukm/?go=post-visimisi&i=' .$userRow['ukmname'] . ' " method="post">';


                     
                       
                                             echo '<div class="form-group">
                                                  <textarea class="form-control" rows="5"  name="post_visimisi" >'.$list['visimisi'].'</textarea>
                                                </div>';
                                           

                                   echo ' <button type="set" class="btn btn-default">Post</button>';
                                                
                    echo ' </form>';
                    ?>


                </div>

                
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Prestasi
                        </div>
                                                   
                    <?php 

                    $dbh = Database::getInstance();
                    $rs = $dbh->query("SELECT * FROM ukmlist WHERE namaukm='$userRow[ukmname]'");  
                    foreach ($rs as $ukm => $list)
                    echo '<form  action="/mvc-ukm/?go=post-prestasi&i=' .$userRow['ukmname'] . ' "  method="post">';


                     
                       
                                             echo '<div class="form-group">
                                                  <textarea class="form-control" rows="5"  name="post_prestasi" >'.$list['prestasi'].'</textarea>
                                                </div>';
                                           

                                   echo ' <button type="set" class="btn btn-default">Post</button>';
                                                
                    echo ' </form>';
                    ?>


                </div>




                
                    <!-- /.panel -->

                    
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
                </div>
            
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
