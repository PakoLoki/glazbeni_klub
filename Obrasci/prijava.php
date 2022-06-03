<?php 

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());

$potrebnaUloga=1;

include "$direktorij/plovrek_php/header.php";

Sesija::kreirajSesiju();
var_dump($_SESSION);

if(!isset($_SESSION["uloga"])){
    Sesija::kreirajKorisnika("gost");
}

if($_SESSION["uloga"]<$potrebnaUloga){
    header("Location: $putanja/Obrasci/prijava.php");
}

function prijava($putanja){
    if(isset($_POST["submit"])){
        $baza= new Baza();
        $baza->spojiDB();

        $username=$_POST["username"];
        $lozinka=$_POST["lozinka"];

        $upit= $baza->spojiDB()->prepare("SELECT * FROM dz4_korisnik k ,dz4_tip_korisnika t WHERE k.id_korisnik = t.id_korisnik AND k.korime = '?'");
        $upit->bind_param("s",$username);
        $upit->execute();
        $spremljeno=$upit->get_result();
        $user=$spremljeno->fetch_array();

        if($spremljeno->num_rows==0){
            echo "Nema korisnika";
        }
        else{
            Sesija::kreirajKorisnika($user['korime'], $user["id_tip"]);
            header("Location: $putanja/Obrasci/prijava.php");
        }
    }
}
if(isset($_COOKIE["username"])){
    $username = $_COOKIE['username'];
} else {
    $username = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Prijava</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Patrik Lovrek">
    <meta name="description" content="28.3.2022.">
    <link rel='stylesheet' type='text/css' media='screen' href='../plovrek_css/main.css'>
    <script src='main.js'></script>
</head>
<body id="prijava">
    <header>
        <nav>
        <div class="logoImenu">
            <a href="../index.php">
                <img id="logo" src="../Materijali/live-music.png" alt="logo">
            </a>
            <div class="dropdown">
                <a id="desno" href="#izbornik">
                    <img id="menu" src="../Materijali/menu.png" alt="Izbornik" width="55" height="55">
                    <div class="dropdown-linkovi">
                    <?php

                        if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 3) {
                            echo '<a href="../Multimedija.php">Multimedija</a>';
                        }
                        if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 2) {
                            echo '<a href="../Obrasci/obrazac.php">Dodavanje</a>';
                            echo '<a href="../popis.php">Tablica</a>';
                        }
                        if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] == 1) {
                            echo '<a href="../index.php">Početna stranica</a>';
                            echo '<a href="registracija.php">Registracija</a>';
                            echo '<a href="../plan.html">Plan</a>';
                            echo '<a href="testBrzine.html">Test Brzine</a>'; 
                        }
                        if ($_SESSION["korisnik"] !="gost") {
                            echo '<a href="../plovrek_php/odjava.php">Odjava</a>';
                            
                        } //else{
                            //echo '<a href="prijava.php">Prijava</a>';
                        //}
                        echo "</ul></nav>";
                        ?>
                    </div>
                </div>
            </a>
        </div>
    </nav>
    <h2>Prijava</h2> 
    </header>
    <div class="forma_prijava">
    <?php
            if(isset($_POST["username"])){
                $baza= new Baza();
                $baza->spojiDB();
        
                $username=$_POST["username"];
                $lozinka=$_POST["lozinka"];
        
                $upit= $baza->spojiDB()->prepare("SELECT * FROM dz4_korisnik k ,dz4_tip_korisnika t WHERE k.id_korisnik = t.id_korisnik AND k.korime = ?");
                $upit->bind_param("s",$username);
                $upit->execute();
                $spremljeno=$upit->get_result();
                $user=$spremljeno->fetch_array();
                echo $user;
                if($spremljeno->num_rows==0){
                    echo "Nema korisnika";
                }
                else{
                    Sesija::kreirajKorisnika($user['korime'], $user["id_tip"]);
                    if(isset($_POST["zapamtiMe"])){
                        setcookie("username",$username, time() + (86400*30), "/");
                    }
                    else{
                        setcookie("username",$username, time()-3600, "/");
                    }
                    header("Location: $putanja/index.php");
                }
                var_dump($_POST);
                
            }
            ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="forma2">
            <div class="imgcontainer">
               <img class="avatar" src="../Materijali/avatar.png" alt="">
            </div>
            <label class="prix" for="username">Korisničko ime:</label><br>
			<input class="pri" type="text" id="username" name="username" value="<?php echo $username ?>" maxlength="30" required><br>
            <label class="prix" for="lozinka">Lozinka:</label><br>
			<input class="pri" type="password" id="lozinka" name="lozinka" maxlength="50" required><br>
			<input type="checkbox" value="ZapamtiMe" id="zapamtiMe" name="zapamtiMe"> <label id="zapamtiMe" for="zapamtiMe">Zapamti me</label><br>
            <button type="submit" form="forma2" value="Submit" name="gumb">Prijavi se</button>
            </form>
            <p style="color: white;">Username=pperic lozinka=admin uloga=admin<br>
               Username=iivic lozinka=moderator uloga=moderator<br>
               Username=jjanic lozinka=korisnik uloga=korisnik<br>
            </p>
            <label  for="zaboravljenal">
                <a class="zab_loz" href="../index.php">Zaboravljena Lozinka</a>
            </label>
    </div>
    <footer>
        <p id="potpis">© 2022 <a href="mailto:plovrek@foi.hr">P. Lovrek</a></p> <br>
        <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FObrasci%2Fprijava.html">
            <img src="../Materijali/HTML5.png" alt="HTML 5 icon" width="50">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FObrasci%2Fprijava.html">
            <img src="../Materijali/CSS3.png" alt="CSS icon" width="50">
        </a>
        <div>
        </div>
    </footer>
</body>
</html>