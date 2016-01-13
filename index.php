<?php 
	//bootstrap page
	//load class controller terlebih dahulu
	include_once("controllers/Controller.php");
	
	//buat objek dari class controller
	$controller = new Controller();

	//tentukan bagaimana halaman akan di-load
	if(!isset($_GET['go']))
	{
		//pemanggilan method yang akan di-run
		$controller->index();
	}
	else
	{
		switch($_GET['go'])
		{
			case 'home' : 
				$controller->index();
				break;

			case 'pendaftaran' : 
				$controller->formdaftar();
				break;

			case 'createadmin' : 
				$controller->createadmin();
				break;
			case 'createukm' : 
				$controller->createukm();
				break;
				
			case 'login' : 
				$controller->formlogin();
				break;
			
			case 'simpan' :
				$controller->save();
				break;

			case 'tampil-data' :
				$controller->show_data();
				break;

			case 'update-data' :
				$controller->update_data();
				break;

			case 'daftar' :
				$controller->daftar();
				break;
			
			
			
			case 'dashboardsuperadmin' :
				$controller->dashboardsuperadmin();
				break;

			case 'dashboardsuperpendaftar' :
				$controller->dashboardsuperpendaftar();
				break;

			case 'dashboardsuperukm' :
				$controller->dashboardsuperukm();
				break;

			case 'dashboardukmadmin' :
				$controller->dashboardukmadmin();
				break;

			case 'dashboardukmapendaftar' :
				$controller->dashboardukmapendaftar();
				break;

			case 'dashboardukmpost' :
				$controller->dashboardukmpost();
				break;
				

			case 'logout' : 
				$controller->logout();
				break;

			case 'dashboardukmapendaftar-terima' : 
				$controller->menerima();
				break;

			case 'dashboardukmapendaftar-tolak' : 
				$controller->menolak();
				break;

			case 'dashboardukmapendaftar-batal' : 
				$controller->batal();
				break;

			case 'editmhs' : 
				$controller->mengeditmhs();
				break;


			case 'hapusukm' : 
				$controller->hapusukm();
				break;

			case 'hapusadminukm' : 
				$controller->hapusadminukm();
				break;

			

			case 'set-kuota' : 
				$controller->set_kuota();
				break;
			
			case 'post-info' : 
				$controller->post_info();
				break;


			case 'post-visimisi' : 
				$controller->post_visimisi();
				break;
			case 'post-ketua' : 
				$controller->post_ketua();
				break;
			case 'post-nama' : 
				$controller->post_nama();
				break;
			case 'post-prestasi' : 
				$controller->post_prestasi();
				break;
			case 'hitung' : 
				$controller->hitung();
				break;


			default : 
				$controller->index();
				break;
				
			
		}
	}

?>