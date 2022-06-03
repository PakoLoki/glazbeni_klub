<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tablica</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Patrik Lovrek">
    <meta name="description" content="28.3.2022.">
    <link rel='stylesheet' type='text/css'  href='plovrek_css/main.css'>
    <link rel='stylesheet' type='text/css'  href='plovrek_css/obrazac.css'>
    <script src='main.js'></script>
</head>
<body id="popis">
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
                        <a href="index.php">Početna stranica</a>
                        <a href="Obrasci/prijava.php">Prijava</a>
                        <a href="Obrasci/registracija.php">Registracija</a>
                        <a href="Multimedija.php">Multimedija</a>
                        <a href="Obrasci/obrazac.php">Dodavanje</a>
                        <a href="era.php">ERA dijagram</a>
                        <a href="navigacijski.php">Navigacijski dijagram</a>
                    </div>
                </div>
            </a>
        </div>
    </nav>
    <h2>Tablica</h2>
    </header>
    <div>
        <h1 class="Naslov"> Popis dosadašnjih prijava </h1>
        <table class="tablica" id="popisT" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Uploadan file</th>
                <th>Osoba je za stranicu čula</th>
                <th>Datum i vrijeme ispunjavanja</th>
                <th>Razlog ispunjavanja obrasca</th>
                <th>Glazbeno predznanje (1-10)</th>
                <th>Znanje glazbene teorije <br>
                    (Crvena-zelena)</th>
                <th>Link najdraže pjesme</th>
                <th>Glazbeni instrumenti</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>slika1.jpg</td>
                <td>prijatelj</td>
                <td>2020-02-29  05:47 PM</td>
                <td>-</td>
                <td rowspan="3">3</td>
                <td rowspan="3">Crvena</td>
                <td>https://youtu.be/aJg4OJxp-co</td>
                <td>-</td>
                
            </tr>
            <tr>
                <td>2</td>
                <td>audio.mp3</td>
                <td rowspan="2">oglas</td>
                <td>2020-02-29  05:47 AM</td>
                <td>"Sviđa mi se stranica"</td>
                <td>https://youtu.be/aJg4OJxp-co</td>
                <td>Gitara</td>
                
            </tr>
            <tr>
                <td>3</td>
                <td>audio2.mp3</td>
                <td>2021-04-30  04:23 PM</td>
                <td>"Zanimljiva stranica"</td>
                <td>https://youtu.be/aJg4OJxp-co</td>
                <td>Bubnjevi</td>
                
            </tr>
            <tr>
                <td>4</td>
                <td>video1.mp4</td>
                <td>facebook</td>
                <td>2021-05-24  12:20 PM</td>
                <td>"Nemam razlog"</td>
                <td rowspan="2">7</td>
                <td>Zelena</td>
                <td>https://youtu.be/aJg4OJxp-co</td>
                <td>Klavir, Violina</td>
                
            </tr>
            <tr>
                <td>5</td>
                <td>-</td>
                <td rowspan="2">ostali izvor</td>
                <td>2020-07-12  08:10 AM</td>
                <td>"Tak malo radi dosade"</td>
                <td>Žuta</td>
                <td>https://youtu.be/aJg4OJxp-co</td>
                <td>Bas</td>
                
            </tr>
            <tr>
                <td>6</td>
                <td>video2.mp4</td>
                <td>2020-07-18  10:14 AM</td>
                <td rowspan="2">-</td>
                <td>10</td>
                <td>Zelena</td>
                <td>https://youtu.be/aJg4OJxp-co</td>
                <td>Ostalo</td>
                
            </tr>
            <tr>
                <td>7</td>
                <td>glavnicss.css</td>
                <td>prijatelj</td>
                <td>2019-09-23  00:00 AM</td>
                <td>5</td>
                <td>Žuta</td>
                <td>https://youtu.be/aJg4OJxp-co</td>
                <td>Vokal</td>
                
            </tr>
            <tr>
                <td colspan="1">Status prijava</td>
                <td colspan="8">OK</td>
            </tr>
        <tbody>	
        </table>
    </div>
    <footer>
        <p id="potpis">© 2022 <a href="mailto:plovrek@foi.hr">P. Lovrek</a></p> <br>
        <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2Fpopis.html">
            <img src="Materijali/HTML5.png" alt="HTML 5 icon" width="50">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%%2Fpopis.html">
            <img src="Materijali/CSS3.png" alt="CSS icon" width="50">
        </a>
        <div>
        </div>
    </footer>
</body>
</html>