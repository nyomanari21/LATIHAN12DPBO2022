<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/FormPasien.php");


$tp = new FormPasien();
$tp->tampil();

?>