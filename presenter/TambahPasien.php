<?php

include("KontrakTambah.php");

class TambahPasien implements KontrakTambah
{
    private $tabelpasien;

	function TambahPasien()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "db_lp12_dpbo"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

    function tambah($data)
    {
        try{
            // memanggil fungsi tambah
            $this->tabelpasien->open();
            $this->tabelpasien->addPasien($data);
            $this->tabelpasien->close();
        }catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
    }

    function edit($data)
    {
        try{
            // memanggil fungsi edit
            $this->tabelpasien->open();
            $this->tabelpasien->updatePasien($data);
            $this->tabelpasien->close();
        }catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
    }

    function hapus($id)
    {
        try{
            // memanggil fungsi hapus
            $this->tabelpasien->open();
            $this->tabelpasien->deletePasien($id);
            $this->tabelpasien->close();
        }catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
    }
}

?>