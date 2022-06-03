<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 1);
$direktorij = dirname(getcwd());

$korisnik="pero";
//$potrebnaUloga=1;

include "Vanjske_biblioteke/baza.class.php";
include "Vanjske_biblioteke/sesija.class.php";
include "Vanjske_biblioteke/dnevnik.class.php";
Sesija::kreirajSesiju();
var_dump($_SESSION);


if(!isset($_SESSION["uloga"])){
    Sesija::kreirajKorisnika("gost");
}

if($_SESSION["uloga"]<$potrebnaUloga){
    header("Location: $putanja/index.php");
}



/*if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
    header("Location: {$putanja}/index/index.php");
}
*/
//Zakomentirano, radi normalno prilikom upisa httpsa na stranici
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Glazbeni Klub</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Patrik Lovrek">
    <meta name="description" content="28.3.2022.">
    <link rel='stylesheet' type='text/css' media='screen' href='plovrek_css/main.css'>
    <script src='main.js'></script>
</head>
<body id="pocetna">
    <header>
        <nav>
        <div class="logoImenu">
            <a href="index.php">
                <img id="logo" src="Materijali/live-music.png" alt="logo">
            </a>
            <div class="dropdown">
                <a id="desno" href="#izbornik">
                    <img id="menu" src="Materijali/menu.png" alt="Izbornik">
                    <div class="dropdown-linkovi">
                    <?php
            
                    
            if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 3) {
                echo '<a href="Multimedija.php">Multimedija</a>';
            }
            if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 2) {
                echo '<a href="Obrasci/obrazac.php">Dodavanje</a>';
                echo '<a href="popis.php">Tablica</a>';
            }
            if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 1) {
                echo '<a href="Obrasci/registracija.php">Registracija</a>';
                echo '<a href="plan.html">Plan</a>';    
                echo '<a href="testBrzine.html">Test Brzine</a>';  
            }
            if ($_SESSION["korisnik"] !="gost") {
                echo '<a href="plovrek_php/odjava.php">Odjava</a>';
                
            } else{
                echo '<a href="Obrasci/prijava.php">Prijava</a>';
            }
            echo "</ul></nav>";
            ?>
                    </div>
                </div>
            </a>
        </div>
    </nav>
    <h2>Glazbeni Klub</h2>
    </header>
    <main>
    <div class="animacija">
        <figure class="slika" id="slika1">
            <img src="Materijali/zeppelin.jpg" alt="Led Zeppelin">
            <figcaption>Led Zeppelin</figcaption>
        </figure>
        <figure class="slika" id="slika2">
            <img src="Materijali/stonesi.jpg" alt="Rolling Stones">
            <figcaption>The Rolling Stones</figcaption>
        </figure>
        <figure class="slika" id="slika3">
            <img src="Materijali/thedoors.jpg" alt="The Doors">
            <figcaption>The Doors</figcaption>
        </figure>
        <figure class="slika" id="slika4">
            <img src="Materijali/queen.jpg" alt="Queen">
            <figcaption>Queen</figcaption>
        </figure>
    </div>

    <div class="sekcija">
        <div class="pozadina"> 
            <h3><a class="stilNaslova gridarea" href="https://hr.wikipedia.org/wiki/The_Rolling_Stones">The Rolling Stones</a></h3>
            <p class="paragraf">  Queen je britanski rock sastav nastao 1970. godine raspadom grupe "Smile" koju su činili dvoje originalnih članova Queena, Brian May i Roger Taylor. Nakon odlaska pjevača Tima Staffella, mjesto popunjava Freddie Mercury, a nakon nekoliko neuspješnih basista, 1971. priključuje im se basist John Deacon. Prvi album Queen izdan je 1973., a drugi Queen II godinu dana poslije i sadržavao je singl "Seven Seas of Rhye" koji je postao njihov prvi hit, te im otvorio put. Krajem iste 1974. godine izdaju treći album Sheer Heart Attack koji je donio potpuni komercijalni i artistički proboj te afirmaciju sastava, a singl "Bohemian Rhapsody" s četvrtog albuma A Night at the Opera postaje njihov najveći hit i zaštitni znak, kao i sam album koji isto postiže veliki uspjeh. Nakon toga sastav ulazi u svoje uspješno razdoblje koje je trajalo u drugoj polovini sedamdesetih i tijekom osamdesetih sve do smrti pjevača Freddie Mercuryja 1991. godine. Sastav je poznat po svojim glazbeno raznovrsnim aranžmanima, vokalnim harmonijama i jedinstvenom sudjelovanju publike na nastupima uživo.
			</p>
            <p>
               <i>Datum: 28.3.2022. Vrijeme: 14:20:00</i> 

            </p>
            <p>
                <a href="https://hr.wikipedia.org/wiki/The_Rolling_Stones">Link na izvor</a>
            </p>
        </div>
        <div class="pozadina">
            <h3> <a class="stilNaslova gridarea" href="https://hr.wikipedia.org/wiki/Led_Zeppelin">Led Zeppelin</a> </h3>
			<p class="paragraf">  Led Zeppelin bio je engleski rock sastav osnovan 1968. godine u Londonu. Grupu su činili gitarist Jimmy Page, pjevač Robert Plant, basist i klavijaturist John Paul Jones i bubnjar John Bonham. S oko 300 milijuna prodanih albuma, jedan su od komercijalno najuspješnijih i najpopularnijih rock sastava u povijesti. Teški zvuk gitara ukorijenjen na bluesu i psihodeliji na njihovim ranijim albumima priskrbio im je i status pionira heavy metala, iako je njihov jedinstveni stil proizašao iz širokog spektra glazbenih utjecaja, uključujući i folk. Od kraja 60-ih i tijekom 70-ih Led Zeppelin su bili najveća svjetska koncertna atrakcija, izvodeći stotine rekordno rasprodanih koncerata na najvećim stadionima i dvoranama diljem svijeta.
			</p>
            <p>
                <i>Datum: 28.3.2022. Vrijeme: 14:20:00</i> 
 
             </p>
             <p>
                <a href="https://hr.wikipedia.org/wiki/Led_Zeppelin">Link na izvor</a>
            </p>
        </div>
        <div class="pozadina">
            <h3> <a class="stilNaslova gridarea2" href="https://hr.wikipedia.org/wiki/Queen">Queen </a></h3>
			<p class="paragraf">  The Rolling Stones je britanska rock grupa osnovana u travnju 1962. godine. Iako osnovani početkom 1960-ih, sastav djeluje i danas s tri prvobitna člana. Osnivači su bili: Brian Jones (gitara i usna harmonika), Ian Stewart (klavijature), Mick Jagger (vokal), Keith Richards (gitara), a početni sastav su upotpunili Bill Wyman (bas) i Charlie Watts (bubnjevi). Ime grupe su odabrali prema blues pjesmi koju je 1948.g. snimio Muddy Waters. Kao i druge britanske rock grupe tog doba nastali su pod utjecajem američkog rhythm and bluesa i ranog rock'n'rolla. Nisu se previše opterećivali težnjom da budu autentični blues stilisti i od svojih početaka do sada okušali su se u raznim glazbenim žanrovima.
		    </p>
            <p>
                <i>Datum: 28.3.2022. Vrijeme: 14:20:00</i> 
 
             </p>
             <p>
                 <a href="https://hr.wikipedia.org/wiki/Queen">Link na izvor</a>
             </p>
        </div>
        
    </div>
    <div class="sekcija3">
        <div class="pozadina2">
            <ul>
                <li>Ime: Patrik</li>  <br>
                   <li>Prezime: Lovrek</li>  <br>
                  <li>E-mail: patriklovrek007@gmail.com</li>   <br>
                   <li>Broj iksice: 601983 11 0016142513 4 </li>   <br>   
                    <li><img id="mojaslika" src="Materijali/slika za webdip.jpg" alt="Ja"> </li>    
                
            </ul>
            
        </div>
        
    </div>
</main>
    <footer>
        <p id="potpis">© 2022 <a href="mailto:plovrek@foi.hr">P. Lovrek</a></p> <br>
        <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2F">
            <img src="Materijali/HTML5.png" alt="HTML 5 icon" width="50">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek">
            <img src="Materijali/CSS3.png" alt="CSS icon" width="50">
        </a>
        <div>
        </div>
    </footer>
</body>
</html>
