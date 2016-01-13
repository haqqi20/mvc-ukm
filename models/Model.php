<?php
//sebelum query, load dulu library database-nya
include_once("libraries/Database.php");

class Model {

	
	function simpanDataPendaftar($ukm,$nim,$nama,$jk,$nope)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query

		$hitung   = $dbh->query("SELECT * FROM pendaftar WHERE nim='$nim'  ");

		$kali = $hitung -> rowCount(); //menghitung jumlah data yang di select
		if($kali < 2)					//jika mendaftar kurang dari 2 maka akan disimpan kedatabase
			{	
				$rs = $dbh->query("INSERT INTO pendaftar(nama_ukm, nim,nama,gender,phone) VALUES('$ukm','$nim','$nama','$jk','$nope')");
				

			}

		else
		{
			return false;		//jika tidak maka data tidak tersimpan
		}

		


		$jml   = $dbh->query("SELECT * FROM pendaftar WHERE nama_ukm='$ukm'  ");
		$kuota = $dbh->query("SELECT kuota FROM ukmlist WHERE namaukm='$ukm'  ");
		$jmlpendaf = $jml -> rowCount();
		
		$result = $kuota->fetch();
		$count = $result[0];		//menghitung jumlah data yang di select


			if($jmlpendaf == $count) 
			{
				$full = $dbh->query("UPDATE ukmlist SET statuskuota=1 WHERE namaukm='$ukm' ");
			}

	}

	
	function updateDataPendaftar($nim,$nama,$jk,$nope,$i)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query

		$rs = $dbh->query("UPDATE pendaftar SET nim='$nim',nama='$nama',gender='$jk',phone='$nope' WHERE idpendaftar=('$i')");
	}

	function buatadmin($namaukm,$namaadmin,$pass)
	{	
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
		$new_password = MD5($pass); //enkripsi password
		$rs = $dbh->query("INSERT INTO adminukm (ukmname,username,password) VALUES('$namaukm','$namaadmin','$new_password')");
	}
	
	function buatukm($namaukm)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
		$rs = $dbh->query("INSERT INTO ukmlist (namaukm) VALUES('$namaukm')");
		$rs = $dbh->query("UPDATE ukmdefault SET status_terdaftar=1 WHERE namaukm=('$namaukm')");
	}


	

	function lihatData()
	{
		$dbh = Database::getInstance();
		$rs = $dbh->query("SELECT * FROM pendaftar");
		return $rs;
	}

	function lihatDataDetail($id)
	{
		$dbh = Database::getInstance();
		$rs = $dbh->query("SELECT * FROM pendaftar WHERE idpendaftar=".$id);
		return $rs->fetch();// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
	}
	

	function login($uname,$pwd)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM superadmin WHERE username=:uname AND password=:pwd ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if(password_verify($pwd, $superadminRow['password']))
				{
					$_SESSION['user_session'] = $superadminRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		
	
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	

	function terima($id)
	{
		$dbh = Database::getInstance();
		$rs = $dbh->query("UPDATE pendaftar SET terima=1 WHERE idpendaftar=('$id')");
		//return $rs->fetch();// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
	}

	function tolak($id)
	{
		$dbh = Database::getInstance();
		$rs = $dbh->query("UPDATE pendaftar SET tolak=1 WHERE idpendaftar=('$id')");
		//return $rs->fetch();// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
	}

	function batal($id)
	{
		$dbh = Database::getInstance();
		$rs = $dbh->query("UPDATE pendaftar SET tolak=0,terima=0 WHERE idpendaftar=('$id')");
		return $rs;// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
	}
	
	function HapusUkm($NamaUkm)
	{
		$dbh = Database::getInstance();
		$rs = $dbh->query("DELETE FROM ukmlist WHERE namaukm=('$NamaUkm')");
		$rs =$dbh->query("UPDATE ukmdefault SET status_terdaftar=0 WHERE namaukm=('$NamaUkm')");
		$rs = $dbh->query("DELETE FROM adminukm WHERE ukmname=('$NamaUkm')");
		return $rs;// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
	}

	function HapusAdminUkm($UsernameAdmin)
	{
		$dbh = Database::getInstance();
		$rs = $dbh->query("DELETE FROM adminukm WHERE username=('$UsernameAdmin')");
		
		return $rs;// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
	}
	function posting_visimisi($post_visimisi,$i)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
			$rs = $dbh->query("UPDATE ukmlist SET visimisi='$post_visimisi' WHERE namaukm=('$i')");
	}

	function posting_ketua($post_ketua,$i)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
			$rs = $dbh->query("UPDATE ukmlist SET ketua='$post_ketua' WHERE namaukm=('$i')");
	}

	function posting_nama($post_nama,$i)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
			$rs = $dbh->query("UPDATE ukmlist SET nama_resmi='$post_nama' WHERE namaukm=('$i')");
	}

	function posting_prestasi($post_prestasi,$i)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
			$rs = $dbh->query("UPDATE ukmlist SET prestasi='$post_prestasi' WHERE namaukm=('$i')");
	}



	function posting($postinfo,$i)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
			$rs = $dbh->query("UPDATE ukmlist SET info='$postinfo' WHERE namaukm=('$i')");
	}







	function setKuota($set,$i)
	{
		$dbh = Database::getInstance(); //digunakan setiap mau melakukan query
			

			$kuota = $dbh->query("SELECT kuota FROM ukmlist WHERE namaukm='$i'  ");
			$result = $kuota->fetch();
			$count = $result[0];

			$status = $dbh->query("SELECT statuskuota FROM ukmlist WHERE namaukm='$i'  ");
			$hasil = $status->fetch();
			

			$jml   = $dbh->query("SELECT * FROM pendaftar WHERE nama_ukm='$i'  ");
			$jmlpendaf = $jml -> rowCount();

			if($hasil==1)

						if($set > $count)
						{
							$full = $dbh->query("UPDATE ukmlist SET statuskuota=0 WHERE namaukm='$i' ");
							$rs = $dbh->query("UPDATE ukmlist SET kuota='$set' WHERE namaukm=('$i')");
						}
						else if ($jmlpendaf==$set)
						{
						$full = $dbh->query("UPDATE ukmlist SET statuskuota=1 WHERE namaukm='$i' ");
						$rs = $dbh->query("UPDATE ukmlist SET kuota='$set' WHERE namaukm=('$i')");
						}
						else
						{
							return false;
						}

			else
				{
					if($set > $jmlpendaf)
						{
							$full = $dbh->query("UPDATE ukmlist SET statuskuota=0 WHERE namaukm='$i' ");
							$rs = $dbh->query("UPDATE ukmlist SET kuota='$set' WHERE namaukm=('$i')");
						}
						else if ($jmlpendaf==$set)
						{
						$full = $dbh->query("UPDATE ukmlist SET statuskuota=1 WHERE namaukm='$i' ");
						$rs = $dbh->query("UPDATE ukmlist SET kuota='$set' WHERE namaukm=('$i')");
						}
						else
						{
							return false;
						}
				}


	}
	
	function hitungMhs()
	{	
		$dbh = Database::getInstance();
		$rs = $dbh -> query("SELECT * FROM pendaftar");
		$rs = execute();
		$count = $rs -> rowCount();
		return print("jumlah mahasiswa $count ");
	}

}


?>