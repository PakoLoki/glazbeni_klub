<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());

include "$direktorij/Izvorne_datoteke/baza.class.php";
include "$direktorij/plovrek_php/sesija.class.php";

$baza=new Baza();
$baza->spojiDB();

?>