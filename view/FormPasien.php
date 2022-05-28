<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");
include("presenter/TambahPasien.php");

class FormPasien implements KontrakView
{
	private $tpl;
	private $prosespasien;
	private $prosespasien2;

	function FormPasien()
	{
		$this->prosespasien = new TambahPasien();
		$this->prosespasien2 = new ProsesPasien();
	}

	function tampil()
	{	
		// Membaca template tambahdata.html
		$this->tpl = new Template("templates/tambahdata.html");

		// Memproses tambah data pasien jika tombol tambah diklik
		if(isset($_POST['tambah']))
		{
			$this->prosespasien->tambah($_POST);
			header("location:index.php");
		}

		// Memproses edit data pasien jika tombol edit di klik
		if(isset($_POST['edit']))
		{
			$this->prosespasien->edit($_POST);
			header("location:index.php");
			// echo "id: " . $_POST['id'] . "<br>";
			// echo "nik: " . $_POST['nik'] . "<br>";
			// echo "nama: " . $_POST['nama'] . "<br>";
			// echo "tempat: " . $_POST['tempat'] . "<br>";
			// echo "tl: " . $_POST['tl'] . "<br>";
			// echo "gender: " . $_POST['gender'] . "<br>";
			// echo "email: " . $_POST['email'] . "<br>";
			// echo "telepon: " . $_POST['telepon'] . "<br>";
		}

		// Memproses hapus data pasien jika tombol hapus diklik
		if(isset($_GET['id_hapus']))
		{
			$id = $_GET['id_hapus'];
			$this->prosespasien->hapus($id);
			header("location:index.php");
		}

		// Menampilkan form edit data pasien jika tombol edit diklik
		if(isset($_GET['id_edit']))
		{
			// ambil data pasien yang ingin diedit
			$id = $_GET['id_edit'];
			$this->prosespasien2->prosesAmbilPasien($id);

			$Nik = $this->prosespasien2->getNik(0);
			$Nama = $this->prosespasien2->getNama(0);
			$Tempat = $this->prosespasien2->getTempat(0);
			$Tl = $this->prosespasien2->getTl(0);
			$Gender = $this->prosespasien2->getGender(0);
			$Email = $this->prosespasien2->getEmail(0);
			$Telepon = $this->prosespasien2->getTelepon(0);

			// Menambah value pada setiap input dengan data yang sudah diproses
			$this->tpl->replace("VALUE_NIK", "$Nik");
			$this->tpl->replace("VALUE_NAMA", "$Nama");
			$this->tpl->replace("VALUE_TEMPAT", "$Tempat");
			$this->tpl->replace("VALUE_TL", "$Tl");
			$this->tpl->replace("VALUE_GENDER", "$Gender");
			$this->tpl->replace("VALUE_EMAIL", "$Email");
			$this->tpl->replace("VALUE_TELEPON", "$Telepon");
			$this->tpl->replace("VALUE_ID", "$id");

			// Mengganti name tombol submit menjadi edit
			$this->tpl->replace("VALUE_BUTTON", "edit");
		}
		// menampilkan form tambah pasien
		else{
			// Menambah value pada setiap input dengan data kosong
			$this->tpl->replace("VALUE_NIK", "");
			$this->tpl->replace("VALUE_NAMA", "");
			$this->tpl->replace("VALUE_TEMPAT", "");
			$this->tpl->replace("VALUE_TL", "");
			$this->tpl->replace("VALUE_GENDER", "");
			$this->tpl->replace("VALUE_EMAIL", "");
			$this->tpl->replace("VALUE_TELEPON", "");
			$this->tpl->replace("VALUE_ID", "");

			// Mengganti name tombol submit menjadi tambah
			$this->tpl->replace("VALUE_BUTTON", "tambah");
		}

		// Menampilkan ke layar
		$this->tpl->write();
	}


}

?>