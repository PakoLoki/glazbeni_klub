<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());

include "$direktorij/plovrek_php/header.php";

Sesija::kreirajSesiju();

var_dump($_SESSION);

//cookie provjera je li prijavljen-->odjava
//ako stisne odjavu --> odjavi ga!
//href=zaglavlje.php?odjava=true


if(!isset($_SESSION["korisnik"]) || 
        !isset($_SESSION["uloga"]) ){
    header("Location: obrasci/prijava.php");
    exit();
}


if(isset($_GET["submit"])) {
    if (isset($_SESSION["korisnik"]) || isset($_SESSION["uloga"])) {
        unset($_SESSION["korisnik"]);
        unset($_SESSION["uloga"]);
        echo "Uspješna odjava";
        header("Location: $putanja/index.php");
    }
}else{
        echo "Neuspješna odjava";
        header("Location: $putanja/index.php");
    
}

Sesija::obrisiSesiju();
header("Location: $putanja/index.php");
?>