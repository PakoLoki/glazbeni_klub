var sekunde=0;
var minute=0;
var vrijeme="";
var timer;


//Test samo da vidim dal se spojilo na log//
console.log('Spojilo se');

//1.
document.addEventListener("DOMContentLoaded", Loadanje);


function Loadanje(){
  MjeracVremena();
  traziEkstenziju();
  funkcijaPadajuci();
  pregledDatuma();
  greskeIviselinijski();
}

function MjeracVremena(){
    sekunde++;
    
    minute=(sekunde>59?minute++:minute);
    if(sekunde>59){
        sekunde=0;
        minute++;
    }
    if(minute<10){
        vrijeme="0"+minute+":";
    }else{
        
        minute=0;
        vrijeme="0"+minute+":";
        
    }
    if(sekunde<10){
        vrijeme+="0"+sekunde;
    }else{
        vrijeme+=sekunde;
    }
    document.getElementById("Timer").innerHTML=vrijeme;
    timer= setTimeout("MjeracVremena()",1000);
    
}

//2.
function funkcijaPadajuci() {
	document.getElementById("padajuci2").classList.toggle("show");


	window.onclick = function (event) {
		if (!event.target.matches('.padajuciBTN')) {
			var dropdowns = document.getElementsByClassName("sadrzaj");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
	}
	var vodoravno = document.getElementById('vodoravno');
	vodoravno.addEventListener('click', function (event) {
		var fieldset = document.getElementById('fieldset1').style.display = "inline-block";
		console.log(fieldset);

	})
}
// 2. 
function promjeniPrikaz(format)
{
	if (format == "okomito") {
		document.getElementById("forma_obrazacID").className = 'okomito';
	}
	if (format == "vodoravno") {
		document.getElementById("forma_obrazacID").className = 'vodoravno';
	}
}
  document.getElementsByClassName("format").onclick = function(e) {
	console.log(e);
};






//3.
var ekstenzije=["pdf","png","jpg","mp3","mp4"];

function traziEkstenziju(){
  var filename=document.getElementById('naziv');
  filename.addEventListener("change", function(event) {
      console.log(filename);
      var datoteka=filename.value;
      var file= datoteka.split('.')[1];
      for(var i=0;i<ekstenzije.length;i++){
        var provjera=false;
        var varijabla= dohvatiVelicinu();
        if(file.toLowerCase()==ekstenzije[i]){
          provjera=true;break;
        }
      }
      if(!provjera){
        alert("Ekstenzija nije dobra");
        filename.value="";
      }
      if(varijabla>1000000){
        alert("Prevelika slika");
        filename.value="";
      }
  });
}

function dohvatiVelicinu() {
  var velicina = document.getElementById("naziv").files[0];
  if(velicina) {
    return (velicina.size); 
  }
}

//4.


function pregledDatuma() {
	var dan;
	var mjesec;
	var godina;
	var datum_vrijeme = document.getElementById("datum_vrijeme");
	datum_vrijeme = document.addEventListener('keypress', function (event) {
		var datum = document.getElementById('datum_vrijeme').value;
		dan = datum.split('.')[0];
		mjesec = datum.split('.')[1];
		godina = datum.split('.')[2];

	})

}

document.getElementById("datum_vrijeme").addEventListener("blur", provjeriDatumVrijeme);

function provjeriDatumVrijeme() 
{
	var vrijednost = document.getElementById("datum_vrijeme").value;
	var datum_vrijeme = vrijednost.split(' ');
	if (datum_vrijeme.length != 2) { // provjerava da li je upisan datum i vrijeme (odvojen razmakom). ako je ispravno, u polju moraju biti točno 2 elementa
		alert('Format nije ispravan');
	} else {
		var datum = datum_vrijeme[0];
		var vrijeme = datum_vrijeme[1];
		var datum_arr = datum.split('.');
		var vrijeme_arr = vrijeme.split(':');
		if (datum_arr.length != 4 && vrijeme_arr.length != 2) {
			alert('Format nije ispravan');
		} else {
			if (parseInt(datum_arr[0]) > 31 || parseInt(datum_arr[0]) < 1) {
				alert('Format nije ispravan');
			}
			if (parseInt(datum_arr[1]) > 12 || parseInt(datum_arr[1]) < 1) {
				alert('Format nije ispravan');
			}
			if (parseInt(vrijeme_arr[0]) > 23 || parseInt(vrijeme_arr[0]) < 0) {
				alert('Format nije ispravan');
			}
			if (parseInt(vrijeme_arr[1]) > 59 || parseInt(vrijeme_arr[1]) < 0) {
				alert('Format nije ispravan');
			}
			if (parseInt(vrijeme_arr[2]) > 59 || parseInt(vrijeme_arr[2]) < 0) {
				alert('Format nije ispravan');
			}
		}
	}
}

//5.
function greskeIviselinijski(){
  var area=document.getElementById('area');
  area.addEventListener('focusout', function(event){
    var brojgresaka=0;
    var tekst=area.value;
    var duzina=tekst.length;
    for(var i=0;i<duzina;i++){

      var prethodni=trenutni;
      var trenutni=tekst[i];

      if(trenutni=="." && prethodni=="."){
        brojgresaka++;
      }
      if(trenutni.includes("<")==true){
        brojgresaka++;  
      }
      if(trenutni.includes(">")==true){
        brojgresaka++;  
      }
      if(trenutni=="'" && prethodni=="'"){
        brojgresaka++;  
      }
      if(trenutni.includes("'")==true){
        brojgresaka++;  
      }
      console.log(brojgresaka);
    }
    if(duzina>100){
      alert("Sadrži 100 znakova"); 
    }
    else{
      alert("Ne sadrži 100 znakova");
    }
    var greske=document.getElementById('greske');
    greske.innerHTML = "<div>Broj grešaka: " + brojgresaka + "</div>";
    console.log(brojgresaka);
  }) 
}

//6.

function validirajObrazac()
{
	var input = ['odabir', 'datum_vrijeme', 'area', 'link'];
	var input_label = ['Za ovu stranicu sam �uo', 'Datum i vrijeme', 'Opis', 'Link va�e najdra�e pjesme'];
	var checkbox = ['instrument'];
	var checkbox_label = ['Instrument'];
	var output = '';
	if (document.getElementById("datum_vrijeme").value == '' ){
		/*alert('Ispunite datum');
		return false;*/
	}
	
	for (var i = 0; i < input.length; i++) {
		if (document.getElementById(input[i]).value == '') {
			output += 'Polje '+input_label[i]+' je obavezno' + "\r\n";
			document.getElementById("label_"+input[i]).className = 'form_error';
      event.preventDefault();
		}
	}
	for (var i = 0; i < checkbox.length; i++) {
		var checkbox_item = document.getElementsByClassName(checkbox[i]);
		for (var n = 0; n < checkbox_item.length; n++) {
			if (checkbox_item[n].checked) {
				break;
			} else {
				output += 'Polje '+checkbox_label[i]+' je obavezno' + "\r\n";
				document.getElementById("label_"+checkbox[i]).className = 'form_error';
        event.preventDefault();
				break;
			}
		}
	}
	if (output != '') {
		alert(output);
		return false;
	}
}