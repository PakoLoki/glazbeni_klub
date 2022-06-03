<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());

include "$direktorij/Vanjske_biblioteke/baza.class.php";
include "$direktorij/Vanjske_biblioteke/sesija.class.php";
include "$direktorij/Vanjske_biblioteke/dnevnik.class.php";

?>