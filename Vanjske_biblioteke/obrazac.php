<?php 

    $putanja = dirname($_SERVER['REQUEST_URI'], 2);
    $direktorij = dirname(getcwd());
    
    include "../zaglavlje.php";

    if (!isset($_SESSION["uloga"])) {
        header("Location: ../obrasci/prijava.php");
        exit();
    } elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] !== "1") {
        header("Location: ../obrasci/prijava.php");
        exit();
    }

    if (isset($_POST["postavke"])) {

        $direktorij = dirname(getcwd());

        $vrste = array("E_ALL", "E_ERROR", "E_WARNING", "E_PARSE", "E_NOTICE");

        $razina = $vrste[$_POST["razina"]];
        //error_reporting($razina);


        $nacin = $_POST['nacin'];
        $url = "http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=$nacin";
        if (!($fp = fopen($url, 'r'))) {
            echo "Problem: nije moguće otvoriti url: " . $url;
            exit;
        }
        switch ($nacin) {
            case 'json':
                $string = fread($fp, 10000);
                $json = json_decode($string, false); //objekt
                $sati = $json->WebDiP->vrijeme->pomak->brojSati;
                $sati = (is_numeric($sati)) ? $sati : 0;

                //$json = json_decode($string, true); //ascpolje
                //$sati = $json["WebDiP"]["vrijeme"]["pomak"]["brojSati"];
                fclose($fp);

                $var->konfiguracija;
                $var->konfiguracija->pomak = $sati;
                $var->konfiguracija->razina = $razina;
                $string = json_encode($var);
                //var_dump($json);
                break;
            case 'xml':
                $string = fread($fp, 10000);
                fclose($fp);

                $domdoc = new DOMDocument;
                $domdoc->loadXML($string);
                $params = $domdoc->getElementsByTagName('brojSati');
                $sati = 0;
                if ($params != NULL) {
                    $sati = $params->item(0)->nodeValue;
                }

                $xml = new SimpleXMLElement('<xml/>');
                $elem = $xml->addChild('konfiguracija');
                $elem->addChild('pomak', $sati);
                $elem->addChild('razina', $razina)->addAttribute("naziv", "vrijednost_atributa");
                $string = $xml->asXML();
                break;
            default:
                $string = "";
                break;
        }

        $fp = fopen("$direktorij/$nacin/konfiguracija.$nacin", "w");
        fwrite($fp, $string);
        fclose($fp);
    }

    if (isset($_POST["posalji"])&& !empty($_FILES['cv'])) {
            $userfile = $_FILES['cv']['tmp_name'];
            $userfile_name = $_FILES['cv']['name'];
            $userfile_size = $_FILES['cv']['size'];
            $userfile_type = $_FILES['cv']['type'];
            $userfile_error = $_FILES['cv']['error'];
            if ($userfile_error > 0) {
               echo 'Problem: ';
               switch ($userfile_error) {
                   case 1: echo 'Veličina veća od ' . ini_get('upload_max_filesize');
                       break;
                   case 2: echo 'Veličina veća od ' . $_POST["MAX_FILE_SIZE"] . 'B';
                       break;
                   case 3: echo 'Datoteka djelomično prenesena';
                       break;
                   case 4: echo 'Datoteka nije prenesena';
                       break;
               }
               exit;
            }

            $upfile = '../multimedija/' . $userfile_name;

            if (is_uploaded_file($userfile)) {
               if (!move_uploaded_file($userfile, $upfile)) {
                   echo 'Problem: nije moguće prenijeti datoteku na odredište';
                   exit;
               }
            } else {
               echo 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
               exit;
           }
     }
    
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>Obrazac</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/makaniski.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <h1>Obrazac</h1>
            <!-- 
<img src="multimedija/foi-logo.jpg" alt="foi logo"
     width="300" height="80"/>
            -->
        </header>

        <?php 
            //var_dump($putanja);
            //var_dump($direktorij);
            include '../meni.php';
        ?>

        <section id="sadrzaj">
            <h2 class="tekst">Obrazac</h2>
            <form name="obrazac" id="obrazac" method="post" enctype="multipart/form-data"
                  action="<?php echo $_SERVER['PHP_SELF'];?>">
                <fieldset>
                    <legend>Djelatnik</legend>
                    <label for="boja">Boja oči:</label>
                    <input type="color" name="boja" /><br>
                    <label for="datum">Konzultacije:</label>
                    <input type="datetime-local" name="datum" /><br>
                    <label for="cv">CV: </label>
                    <input type="file" name="cv" />
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
                    <input type="submit" name="posalji" value="Prenesi obrazac"/>
                </fieldset>
            </form>

            <h2>Razina izvještavanja i virtualnog vremena</h2>
            <form method="POST" action="">
                <fieldset>
                    <legend>Razina izvještavanja</legend>
                    <label for="razina">Odaberi razinu izvještavanja o pogreškama:</label><br>
                    <input type="radio" name="razina" value="0" checked>E_ALL<br>
                    <input type="radio" name="razina" value="1">E_ERROR<br>
                    <input type="radio" name="razina" value="2">E_WARNING<br>
                    <input type="radio" name="razina" value="3">E_PARSE<br>
                    <input type="radio" name="razina" value="4">E_NOTICE<br>
                </fieldset> 
                <fieldset>
                    <legend><a href="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html" target="_blank">Postavi virtualno vrijeme</a></legend>
                    <label for="nacin">Odaberi način spremanja:</label><br>
                    <input type="radio" name="nacin" value="json" checked>JSON<br>
                    <input type="radio" name="nacin" value="xml">XML<br>
                </fieldset>
                <input type="submit" name="postavke" value="Postavi">
            </form>

        </section>
        <footer>
            <!-- css po potrebi -->
            <address style="font-weight: bold;">Kontakt: <a href="mailo:makaniski@foi.unizg.hr">Matija Kaniški</a></address>
            <br>
            <span>
                <?php 
                    $konfiguracija = ispis_konfiguracije($direktorij);
                    //error_reporting(E_ALL);
                    echo '<strong>Trenutna razina izvještavanja: </strong>'
                    . error_reporting()
                    . ' | '
                    . '<strong>Vrijeme sustava: </strong>'
                    . date("d.m.Y. H:i:s") 
                    . ' | '
                    . '<strong>Virtualno vrijeme sustava: </strong>' .  $konfiguracija 
                ?>
            </span>
            <br>
            <p><small>&copy; 2020 M. Kaniški</small></p>
        </footer>
    </body>
</html>
