<?php

/*
  + Neregistrirani korisnik može pristupiti stranicama: prijava.php, registracija.php, index.php
  + Registrirani korisnik može pristupiti svemu kao i neregistrirani korisnik plus: popis.php
  + Voditelj može pristupiti svemu kao i registrirani korisnik plus:multimedija.php
  + Administrator može pristupiti svim stranicama.
 */

echo "<nav class=\"stupac_1\"><ul>
        <li><a href=\"/index.php\">Početna stranica</a></li>    
        <li><a href=\"/obrasci/prijava.php\">Prijava</a></li> 
   ";
if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] <= 3) {
    echo "<li><a href=\"/popis.php\">Popis</a></li>"
               ."<li><a href=\"/odjava.php?odjava=true\">Odjava</a></li>";
}
if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] <= 2) {
    echo "<li><a href=\"/multimedija.php\">Multimedija</a></li>";
}
if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] === "1") {
    echo "<li><a href=\"/obrasci/obrazac.php\">Obrazac</a></li>"
            ."<li><a href=\"/postavi_vrijeme_aplikacije.php\">Promijeni vrijeme</a></li>";
}
echo "</ul></nav>";
