<?php 

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());

$korisnik="pero";
$potrebnaUloga=1;

include "$direktorij/plovrek_php/header.php";
Sesija::kreirajSesiju();
var_dump($_SESSION);
if(!isset($_SESSION["uloga"])){
    Sesija::kreirajKorisnika("gost");
}

if($_SESSION["uloga"]<$potrebnaUloga){
    header("Location: $putanja/index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registracija</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Patrik Lovrek">
    <meta name="description" content="28.3.2022.">
    <meta name="date" content=>
    <link rel='stylesheet' type='text/css' media='screen' href='../plovrek_css/main.css'>
    <script src='main.js'></script>
</head>
<body id="registracija">
    <header>
        <nav>
        <div class="logoImenu">
            <a href="../index.php">
                <img id="logo" src="../Materijali/live-music.png" alt="logo">
            </a>
           
            <div class="dropdown">
                <a id="desno" href="#izbornik">
                    <img id="menu" src="../Materijali/menu.png" alt="Izbornik">
                    <div class="dropdown-linkovi">
                    <?php
            
                    
                    if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 3) {
                        echo '<a href="../Multimedija.php">Multimedija</a>';
                    }
                    if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 2) {
                        echo '<a href="../Obrasci/obrazac.php">Dodavanje</a>';
                        echo '<a href="../popis.php">Tablica</a>';
                    }
                    if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 1) {
                        echo '<a href="../index.php">Početna stranica</a>';
                        echo '<a href="../Obrasci/prijava.php">Prijava</a>';
                        echo '<a href="../plan.html">Plan</a>';
                        echo '<a href="testBrzine.html">Test Brzine</a>'; 
                    }
                    if (isset($_SESSION["uloga"])) {
                        echo '<a href="../odjava.php">Odjava</a>';
                    } else{
                        echo '<a href="../Obrasci/prijava.php">Odjava</a>';
                    }
                    echo "</ul></nav>";
                    ?>
                    </div>
                </div>
            </a>
        </div>
        </nav>
        <h2>Registracija</h2>
    </header>
    <div class="forma_reg">
        <form action="http://barka.foi.hr/WebDiP/2021/materijali/zadace/ispis_forme.php
        " method="post" id="forma">
        <fieldset>
            <legend class="legendreg">Podaci za registraciju</legend>
            <label class="reg" for="ime">Ime:</label><br>
            <input class="inputreg" type="text" id="ime" name="ime" required><br>
            <label class="reg" for="prezime">Prezime:</label><br>
            <input class="inputreg" type="text" id="prezime" name="prezime" required><br>
            <label class="reg" for="godinarodenja">Godina rođenja:</label> <br>
            <input class="inputreg" type="number" min="1900" max="2022" value="2000" id="godinarodenja" name="godinarodenja" required><br>
            <label class="reg" for="email">Email:</label><br>
			<input class="inputreg" type="email" id="email" name="email" required><br>
            <label class="reg" for="username">Korisničko ime:</label><br>
			<input class="inputreg" type="text" id="username" name="username" maxlength="25" required><br>
            <label class="reg" for="lozinka">Lozinka:</label><br>
			<input class="inputreg" type="password" id="lozinka" name="lozinka" maxlength="50" required><br>
			<label class="reg" for="potvrda">Potvrda lozinke:</label><br>
			<input class="inputreg" type="password" id="potvrda" name="potvrda" maxlength="50" required><br><br>
            <input type="radio" id="radio1" name="tip" value="Profesionalni glazbenik">
            <label class="radio1">Profesionalni glazbenik</label><br>
            <input type="radio" id="radio2" name="tip" value="Amaterski glazbenik">
            <label class="radio1">Amaterski glazbenik</label><br>
            <input type="radio" id="radio3" name="tip" value="Nisam glazbenik">
            <label class="radio1" >Nisam glazbenik</label><br>
              </form>
            </fieldset>
              <button type="submit" form="forma" value="Submit">Potvrdi</button>
    </div>
<?php


?>


    <footer>
        <p id="potpis">© 2022 <a href="mailto:plovrek@foi.hr">P. Lovrek</a></p> <br>
        <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FObrasci%2Fregistracija.html">
            <img src="../Materijali/HTML5.png" alt="HTML 5 icon" width="50">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FObrasci%2Fregistracija.html">
            <img src="../Materijali/CSS3.png" alt="CSS icon" width="50">
        </a>
        <div>
        </div>
    </footer>
</body>
</html>