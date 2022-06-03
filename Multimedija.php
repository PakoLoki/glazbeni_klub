<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Multimedija</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="author" content="Patrik Lovrek">
    <meta name="description" content="28.3.2022.">
    <link rel='stylesheet' type='text/css' media='screen' href='plovrek_css/main.css'>
    <script src='main.js'></script>
</head>
<body id="multimedija">
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
                
            }
            if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 2) {
                echo '<a href="Obrasci/obrazac.php">Dodavanje</a>';
                echo '<a href="popis.php">Tablica</a>';
            }
            if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] >= 1) {
                echo '<a href="Obrasci/registracija.php">Registracija</a>';
                
                echo '<a href="plan.html">Plan</a>';      
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
    <form method="get" action="http://barka.foi.hr/WebDiP/2021/materijali/zadace/ispis_forme.php">
        <input type="search" placeholder="Pretraživanje" name="pretraživanje">
        <input class="subbut" type="submit" value="Pretraži">
    </form>
    <div class="video_naslov">
        <p class="paragraf_video">Videozapisi</p>
    </div>
    <div class="grid">
        <div class="Video1">
            <p class="naslov_videa"><h1 class="heding1multimedija">The Haze - Gambler's Tune</h1></p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/y6zxPStup_s?rel=0&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="video2">
            <p class="naslov_videa"><h1 class="heding1multimedija">The Haze - Days</h1></p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/PX1U5oqXWmE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="video3">
            <p class="naslov_videa"><h1 class="heding1multimedija">The Haze - Curtains Up</h1></p>
            <video width="560" height="315" src="Materijali/CurtainsUp.mp4" controls></video>
        </div>
        <div class="video4">
            <p class="naslov_videa"><h1 class="heding1multimedija">The Haze - The Woodland Song</h1></p>
            <video width="560" height="315" src="Materijali/Woodland.mp4"  controls></video>
        </div>
    </div>
    <div class="video naslov">
        <p class="paragraf_video">Veći videozapis</p>
    </div>
    <div class="video5">
        <p class="naslov_videa"><h1 class="heding1multimedija">The Haze - Dreamcatcher</h1></p>
        <video id="background-video" controls>
            <source src="Materijali/Dreamcatcher.mp4" type="video/mp4">
          </video>
    </div>
    <div class="video naslov">
        <p class="paragraf_video">Audio zapisi</p>
    </div>
    <div class="grid">
        <div class="audio1">
            <p class="naslov_audia"><h1 class="heding1multimedija">The Haze - The Woodland Song</h1></p>
            <audio src="Materijali/Woodland.mp4" controls></audio>
        </div>
        <div class="audio2">
            <p class="naslov_audia"><h1 class="heding1multimedija">The Haze - Dreamcatcher</h1></p>
            <audio src="Materijali/Dreamcatcher.mp4" controls></audio>
        </div>
        <div class="audio3">
            <p class="naslov_audia"><h1 class="heding1multimedija">The Haze - Curtains Up</h1></p>
            <audio src="Materijali/CurtainsUp.mp4" controls></audio>
        </div>
    </div>
    <footer>
        <p id="potpis">© 2022 <a href="mailto:plovrek@foi.hr">P. Lovrek</a></p> <br>
        <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FMultimedija.html">
            <img src="Materijali/HTML5.png" alt="HTML 5 icon" width="50">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fbarka.foi.hr%2FWebDiP%2F2021%2Fzadaca_01%2Fplovrek%2FMultimedija.html">
            <img src="Materijali/CSS3.png" alt="CSS icon" width="50">
        </a>
        <div>
        </div>
    </footer>
</body>
</html>