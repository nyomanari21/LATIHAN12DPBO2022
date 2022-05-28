<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");
include("presenter/TambahPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	// private $crudpasien;
	private $tpl;

	function TampilPasien()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
		// $this->crudpasien = new TambahPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelepon($i) . "</td>
			<td>
				<a href='tambah.php?id_edit=" . $this->prosespasien->getId($i) . "' class='btn btn-secondary' '>Edit</a>
            	<a href='tambah.php?id_hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' '>Hapus</a>
            </td>
			";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();

	}
}
