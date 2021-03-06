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
            <p class="paragraf">  Queen je britanski rock sastav nastao 1970. godine raspadom grupe "Smile" koju su ??inili dvoje originalnih ??lanova Queena, Brian May i Roger Taylor. Nakon odlaska pjeva??a Tima Staffella, mjesto popunjava Freddie Mercury, a nakon nekoliko neuspje??nih basista, 1971. priklju??uje im se basist John Deacon. Prvi album Queen izdan je 1973., a drugi Queen II godinu dana poslije i sadr??avao je singl "Seven Seas of Rhye" koji je postao njihov prvi hit, te im otvorio put. Krajem iste 1974. godine izdaju tre??i album Sheer Heart Attack koji je donio potpuni komercijalni i artisti??ki proboj te afirmaciju sastava, a singl "Bohemian Rhapsody" s ??etvrtog albuma A Night at the Opera postaje njihov najve??i hit i za??titni znak, kao i sam album koji isto posti??e veliki uspjeh. Nakon toga sastav ulazi u svoje uspje??no razdoblje koje je trajalo u drugoj polovini sedamdesetih i tijekom osamdesetih sve do smrti pjeva??a Freddie Mercuryja 1991. godine. Sastav je poznat po svojim glazbeno raznovrsnim aran??manima, vokalnim harmonijama i jedinstvenom sudjelovanju publike na nastupima u??ivo.
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
			<p class="paragraf">  Led Zeppelin bio je engleski rock sastav osnovan 1968. godine u Londonu. Grupu su ??inili gitarist Jimmy Page, pjeva?? Robert Plant, basist i klavijaturist John Paul Jones i bubnjar John Bonham. S oko 300 milijuna prodanih albuma, jedan su od komercijalno najuspje??nijih i najpopularnijih rock sastava u povijesti. Te??ki zvuk gitara ukorijenjen na bluesu i psihodeliji na njihovim ranijim albumima priskrbio im je i status pionira heavy metala, iako je njihov jedinstveni stil proiza??ao iz ??irokog spektra glazbenih utjecaja, uklju??uju??i i folk. Od kraja 60-ih i tijekom 70-ih Led Zeppelin su bili najve??a svjetska koncertna atrakcija, izvode??i stotine rekordno rasprodanih koncerata na najve??im stadionima i dvoranama diljem svijeta.
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
			<p class="paragraf">  The Rolling Stones je britanska rock grupa osnovana u travnju 1962. godine. Iako osnovani po??etkom 1960-ih, sastav djeluje i danas s tri prvobitna ??lana. Osniva??i su bili: Brian Jones (gitara i usna harmonika), Ian Stewart (klavijature), Mick Jagger (vokal), Keith Richards (gitara), a po??etni sastav su upotpunili Bill Wyman (bas) i Charlie Watts (bubnjevi). Ime grupe su odabrali prema blues pjesmi koju je 1948.g. snimio Muddy Waters. Kao i druge britanske rock grupe tog doba nastali su pod utjecajem ameri??kog rhythm and bluesa i ranog rock'n'rolla. Nisu se previ??e optere??ivali te??njom da budu autenti??ni blues stilisti i od svojih po??etaka do sada oku??ali su se u raznim glazbenim ??anrovima.
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
        <p id="potpis">?? 2022 <a href="mailto:plovrek@foi.hr">P. Lovrek</a></p> <br>
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
