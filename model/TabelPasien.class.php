<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienSpesifik($id){
		// Query mysql select data pasien berdasarkan id
		$query = "SELECT * FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasien($data)
	{
		// Simpan data pasien
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telepon'];

		// Query mysql insert data pasien
		$query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp)
					VALUES ('$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telepon')";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function updatePasien($data)
	{
		// Simpan data pasien
		$id = $data['id'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telepon'];

		// Query mysql update data pasien
		$query = "UPDATE pasien SET
					nik = '$nik',
					nama = '$nama',
					tempat = '$tempat',
					tl = '$tl',
					gender = '$gender',
					email = '$email',
					telp = '$telepon'
					WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql delete data pasien
		$query = "DELETE FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}
}
