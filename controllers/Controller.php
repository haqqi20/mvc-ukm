<?php
include_once("models/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    }
	
	public function index()
	{
		require_once('views/index.php');
	}
	
	public function formdaftar()
	{
		require_once('views/formdaftar.php');
	}
	
	public function formlogin()
	{
		require_once('views/formlogin.php');
	}
	

	public function ukmkhusus()
	{
		require_once('views/ukmkhusus.php');
	}
	
	public function ukmkesenian()
	{
		require_once('views/ukmkesenian.php');
	}
	public function ukmolahraga()
	{
		require_once('views/ukmolahraga.php');
	}
	public function ukmpenalaran()
	{
		require_once('views/ukmpenalaran.php');
	}
	public function ukmkerohanian()
	{
		require_once('views/ukmkerohanian.php');
	}
	
	public function ukmdashboard()
	{
		require_once('views/ukmdashboard.php');
	}
	
	public function pengumuman()
	{
		require_once('views/pengumuman.php');
	}


	public function dashboardsuperadmin()
	{
		require_once('views/dashboardsuperadmin.php');
	}

	public function dashboardsuperpendaftar()
	{
		require_once('views/dashboardsuperpendaftar.php');
	}

	public function dashboardsuperukm()
	{
		require_once('views/dashboardsuperukm.php');
	}

	public function dashboardukmadmin()
	{
		require_once('views/dashboardukmadmin.php');
	}
	
	
	public function dashboardukmapendaftar()
	{
		require_once('views/dashboardukmapendaftar.php');
	}

	public function dashboardukmpost()
	{
		require_once('views/dashboardukmpost.php');
	}

	public function logout()
	{
		require_once 'models/user.php';

		if(($_SESSION['ukm_session'])or($_SESSION['super_session']))
		{
			{
				$user->logout();
				$user->redirect('?go=login');
			}
		}
		
		
	}

	
	
	function update_data()
	{
		$nim 		=  $_POST['nim'];
		$nama 		= $_POST['nama'];
		$jk 		= $_POST['jk'];
		$nope 		=  $_POST['nope'];
		
		

		//penyimpanan data ke model
		$this->model->updateDataPendaftar($nim,$nama,$jk,$nope,$_GET['i']);
		$this->dashboardukmapendaftar(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

	function daftar()
	{
		$nim =  $_POST['nim'];
		$nama = $_POST['nama'];
		$ukm =  $_POST['ukm'];
		$jk = $_POST['jk'];
		$nope =  $_POST['nope'];
		

		//penyimpanan data ke model
		$this->model->simpanDataPendaftar($ukm,$nim,$nama,$jk,$nope);
		$this->formdaftar(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

	function createadmin()
	{	
		$namaukm 	=  	$_POST['ukmname'];
		$namaadmin 	=  	$_POST['username'];
		$pass 		= 	$_POST['password'];
		

		//penyimpanan data ke model
		$this->model->buatadmin($namaukm,$namaadmin,$pass);
		$this->dashboardsuperukm(); 
	}
	
	function createukm()
	{	
		$namaukm 	=  	$_POST['ukmname'];

		//penyimpanan data ke model
		$this->model->buatukm($namaukm);
		$this->dashboardsuperukm(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}


	function show_data()
	{
		if(!isset($_GET['i']))
		{
			//jika tidak ada parameter id yang dikirim, maka akan menampilkan semua data yang ada
			$rs = $this->model->lihatData();
			require_once('views/mhsList.php');
		}
		else
		{
			//ada parameter id yang dikirim, tampilkan detail dari salah satu data yang dipilih
			$rs = $this->model->lihatDataDetail($_GET['i']);
			require_once('views/mhsDetail.php');
		}
	}
	
	function menerima()
	{
		$rs = $this->model->terima($_GET['i']);
		 $this->dashboardukmapendaftar(); 
	}

	function menolak()
	{
		$rs = $this->model->tolak($_GET['i']);
		 $this->dashboardukmapendaftar(); 
	}

	function batal()
	{
		$rs = $this->model->batal($_GET['i']);
			 $this->dashboardukmapendaftar(); 
	}

	function hapusukm()
	{
		$rs = $this->model->HapusUkm($_GET['i']);
			 $this->dashboardsuperukm(); 
	}

	function hapusadminukm()
	{
		$rs = $this->model->HapusAdminUkm($_GET['i']);
			 $this->dashboardsuperukm(); 
	}
	function set_kuota()
	{
		$set =  $_POST['set'];
		
		

		//penyimpanan data ke model
		$this->model->setKuota($set,$_GET['i']);
		$this->dashboardukmpost(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}
	function post_info()
	{
		$postinfo =  $_POST['postinfo'];
		
		

		//penyimpanan data ke model
		$this->model->posting($postinfo,$_GET['i']);
		$this->dashboardukmpost(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

	function post_visimisi()
	{
		$post_visimisi =  $_POST['post_visimisi'];
		
		

		//penyimpanan data ke model
		$this->model->posting_visimisi($post_visimisi,$_GET['i']);
		$this->dashboardukmpost(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

	function post_ketua()
	{
		$post_ketua =  $_POST['post_ketua'];
		
		

		//penyimpanan data ke model
		$this->model->posting_ketua($post_ketua,$_GET['i']);
		$this->dashboardukmpost(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

	function post_nama()
	{
		$post_nama =  $_POST['post_nama'];
		
		

		//penyimpanan data ke model
		$this->model->posting_nama($post_nama,$_GET['i']);
		$this->dashboardukmpost(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

	function post_prestasi()
	{
		$post_prestasi =  $_POST['post_prestasi'];
		
		

		//penyimpanan data ke model
		$this->model->posting_prestasi($post_prestasi,$_GET['i']);
		$this->dashboardukmpost(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

	function hitung()
	{
		
		//penyimpanan data ke model
		$this->model->hitungMhs();
		//$this->dashboardukmapendaftar(); //controller dikembalikan ke method index setelah selesai mengakses method ini.
	}

}

?>