<?php 

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());

$korisnik="pero";
//$potrebnaUloga=1;

include "$direktorij/plovrek_php/header.php";
Sesija::kreirajSesiju();
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
		<title>Obrazac</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta name="author" content="Patrik Lovrek">
		<meta name="description" content="28.3.2022.">
		<link rel='stylesheet' type='text/css' media='screen' href='../plovrek_css/main.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../plovrek_css/obrazac.css'>
	</head>
	<body id="obrazac">
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
                echo '<a href="Multimedija.php">Multimedija</a>';
            }
            if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 2) {
                echo '<a href="../Obrasci/obrazac.php">Dodavanje</a>';
                echo '<a href="popis.php">Tablica</a>';
            }
            if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 1) {
                
                echo '<a href="Obrasci/prijava.php">Prijava</a>';
                echo '<a href="plan.html">Plan</a>';
                
            }
            echo "</ul></nav>";
            ?>
							</div>
					</div>
					</a>
				</div>
			</nav>
			<h2>Obrazac</h2> 
		</header>
		<div id="Timer"></div>
		<div id="padajuci">
			<button onclick="funkcijaPadajuci()" class="padajuciBTN">Odabir formacije elemenata</button>
			<div id="padajuci2" class="sadrzaj">
				<button onclick="promjeniPrikaz('vodoravno')" class="format" value="vodoravno">Vodoravno</button>
				<button onclick="promjeniPrikaz('okomito')" class="format" value="okomito">Okomito</button>
				<p id="vodoravno"></p>
				<p id="okomito"></p>
			</div>
		</div>
		<div class="forma_obrazac" >
			<form id="forma_obrazacID" class="vodoravno" onsubmit="validirajObrazac()" action="http://barka.foi.hr/WebDiP/2021/materijali/zadace/ispis_forme.php" method="post">
				<fieldset id="fieldset1">
					<legend>Osnovne informacije</legend>
					<div>
						<label class="obr" for="id">ID:</label>
						<input type="number" name="id" size="15" value="1" disabled><br><br>
					</div>
					<div>
						<label class="obr naziv" for="naziv">Naziv:</label>
						<style type="text/css">
							label{ color:burlywood;}
						</style><!-- IMPLICITNO OBLIKOVANJE -->
						<input type="file" name="naziv" id="naziv"><br>
						<button class="skriveno" type="submit">Predaj</button><br>
					</div>
					<div>
					<br>
					<label id="label_odabir" for="odabir1">Za ovu stranicu sam čuo:</label><br>
					<select id="odabir" name="multiple_select" class="obr" multiple>
						<option id="izbor_1" value="Preko prijatelja">Preko prijatelja</option>
						<option id="izbor_2" value="Preko oglasa">Preko oglasa</option>
						<option id="izbor_3" value="Preko Facebooka">Preko Facebooka</option>
						<option id="izbor_4" value="Ostali izvor">Ostali izvor</option>
					</select><br>
					</div>
					<style type="text/css">
						#izbor:hover{color: darksalmon; background-color: black; transition: all 0.3s;}
					</style> <!-- JEDNOZNAČNO OBLIKOVANJE -->
					<div>
						<label id="label_datum_vrijeme" class="obr" for="datum">Datum i vrijeme ispunjavanja:</label><br><br>
						<input style="display:none" type="datetime-local" id="start" name="početak_datuma" min="2000-01-01" max="2100-12-31"><br><br>
						<input type="text" id="datum_vrijeme" name="pocetak_datuma"><br><br>
					</div>
					<div>
						<label id="label_opis" class="obr" for="opis">Opis (zašto ispunjavate obrazac?):</label><br><br>
						<textarea class="obr area" name="opis" id="area" cols="50" rows="6" ></textarea><br>
                        <div id="greske" style="color: aliceblue;"></div>
					</div>
					<style type="text/css">
						.area{color:black;}
					</style> <!-- EKSPLICITNO OBLIKOVANJE -->
					<input type="hidden" id="skriveno" name="skriveno" value="1000000">
				</fieldset>
				<fieldset id="fieldset1">
					<legend>Vaša glazbena iskustva</legend>
					<div>
						<label class="obr" for="zvuk">Kakvo je vaše glazbeno predznanje: Loše</label>
						<input type="range" min="1" max="10">
					</div>
					<div>
						<label for="zvuk">Dobro</label><br><br>
						<label for="boja">Ocjenite vaše znanje glazbene teorije (Crvena-loše,Zelena-Dobro): </label>
						<input type="color" value="#dc143c"><br><br>
					</div>
					<div>
						<label id="label_link" for="link">Unesite link vaše najdraže pjesme:</label>
						<input type="url" name="link" id="link" placeholder="Upišite link..." pattern="https://.*" size 30><br><br>
					</div>
					<div>
						<label id="label_instrument">Koje glazbene instrumente svirate (označite više ako svirate):</label><br><br>
						<input id="gitara" class="instrument" type="checkbox" name="instument[]" value="Gitara">
						<label for="gitara"> Gitara </label>
						<input id="bubnjevi" class="instrument" type="checkbox" name="instument[]" value="Bubnjevi">
						<label for="bubnjevi"> Bubnjevi </label>
						<input id="bas" class="instrument" type="checkbox" name="instument[]" value="Bas">
						<label for="bas"> Bas </label><br>
						<input id="vokal" class="instrument" type="checkbox" name="instument[]" value="Vokal">
						<label for="vokal"> Vokal </label>
						<input id="violina" class="instrument" type="checkbox" name="instument[]" value="Violina">
						<label for="violina"> Violina </label>
						<input id="klavir" class="instrument" type="checkbox" name="instument[]" value="Klavir">
						<label for="klavir"> Klavir </label><br>
						<input id="ostalo" class="instrument" type="checkbox" name="instument[]" value="Ostalo">
						<label for="ostalo"> Ostalo </label><br><br>
					</div>
				</fieldset>
				<br><button type="reset" class="button" value="Obriši">Obriši</button>
				<button class="subbut" type="submit" value="Potvrdi">Potvrdi</button>
			</form>
		</div>
		<footer>
			<p id="potpis">© 2022 <a href="mailto:plovrek@foi.hr">P. Lovrek</a></p> <br>
			<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FObrasci%2Fobrazac.html">
				<img src="../Materijali/HTML5.png" alt="HTML 5 icon" width="50">
			</a>
			<a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FObrasci%2Fobrazac.html">
				<img src="../Materijali/CSS3.png" alt="CSS icon" width="50">
			</a>
			<div>
			</div>
		</footer>
		<script src="../javascript/plovrek.js" ></script>
	</body>
</html>