// Trial of Bloodright
// Standalone page for
//
// Coin Ritual
//
// Copyright 2017 CWG
// Clan Wolf Gamma
// http://www.clanwolf.net

var aText;

var iSpeed = 5;                    // time delay of print out
var iSpeedNewLine = 180;           // delay before carriage return
var iSpeedNewLineLong = 550;       // delay before carriage return if "..." is detected
var iIndex = 0;                    // start printing array at this posision
var iArrLength;                    // the length of the text array
var iScrollAt = 6;                 // start scrolling up at this many lines
var iTextPos = 0;                  // initialise text position
var sContents = '';                // initialise contents variable
var iRow;                          // initialise current row
var interrupted = 0;
var languageString;
var charnumber = 0;
var charcounter = 0;

function typewriter_reset() {
	iIndex = 0;
	iArrLength;
	iTextPos = 0;
	sContents = '';
	charcounter = 0;
	interrupted = 0;
}

function typewriter_interrupt() {
	interrupted = 1;
}

function typewriter_continue() {
	interrupted = 0;
}

function typewriter_setLanguage(ls) {
	languageString = ls;
	if (languageString === "en") {
		aText = new Array(
			"<span style='color:white';><b>Clan Wolf</b></span>",
			"<span style='color:white';>WolfNet Mainframe</span>",
			"<span style='color:lightblue';>Security Level H8-#77642</span>",
			"<span style='color:lightblue';>Accessing Mainframe</span>",
			"<span style='color:lightblue';>Downloading configuration data...</span>",
			" ",
			"<span style='color:lightblue';>Genetic archive database...</span>",
			"<span style='color:lightgreen';>Access granted</span>",
			" ",
			"<span style='color:lightblue';>...</span>",
			"<span style='color:lightblue';>...</span>",
			"<span style='color:lightblue';>...</span>",
			"",
			""
		);
	} else if (languageString === "de") {
		aText = new Array(
			"<span style='color:white';><b>Clan Wolf</b></span>",
			"<span style='color:white';>WolfNet Mainframe</span>",
			"<span style='color:lightblue';>Sicherheitsstufe H8-#77642</span>",
			"<span style='color:lightblue';>Zugriff auf Mainframe</span>",
			"<span style='color:lightblue';>Konfiguration wird heruntergeladen...</span>",
			" ",
			"<span style='color:lightblue';>Genarchiv Datenbank...</span>",
			"<span style='color:lightgreen';>Zugriff gestattet</span>",
			" ",
			"<span style='color:lightblue';>...</span>",
			"<span style='color:lightblue';>...</span>",
			"<span style='color:lightblue';>...</span>",
			"",
			""
		);
	} if (languageString === "ru") {
		aText = new Array(
			"<span style='color:white';><b>Клан Волка</b></span>",
			"<span style='color:white';>Сервер Вулфнет</span>",
			"<span style='color:lightblue';>Уровень доступа H8-#77642</span>",
			"<span style='color:lightblue';>Доступ к серверу</span>",
			"<span style='color:lightblue';>Скачивание данных конфигурации...</span>",
			" ",
			"<span style='color:lightblue';>Генетический архив...</span>",
			"<span style='color:lightgreen';>Доступ открыт</span>",
			" ",
			"<span style='color:lightblue';>...</span>",
			"<span style='color:lightblue';>...</span>",
			"<span style='color:lightblue';>...</span>",
			"",
			""
		);
	}
	iArrLength = aText[0].length;
	
	charnumber = 0;
	var i;
	for (i = 0; i < aText.length; i++) {
		charnumber = charnumber + aText[i].length;
	}
	/* console.log(charnumber); */
}

function typewriter(callback) {
	charcounter++;
	sContents=' ';
	iRow = Math.max(0, iIndex-iScrollAt);
	var destination = document.getElementById("typedtext");

	while (iRow < iIndex) {
		sContents += aText[iRow++] + '<br />';
	}

	if (charcounter == charnumber + aText.length) {
		/* Last char! Whatever comes after the typing, can be called here! */
        callback();
	}

	if (iRow == iIndex) {
		sContents += '>';
	}

	destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + "<span id='cursor' class='blink' style='color:yellow;'>_</span>";

	if (iTextPos++ == iArrLength) {
		iTextPos = 0;
		iIndex++;
		if (iIndex != aText.length) {
			iArrLength = aText[iIndex].length;
			if (endsWith(aText[iIndex-1], "...") || endsWith(aText[iIndex-1], "...</span>")) {
				if (interrupted == 0) {
					playKeySound();
					setTimeout(function() { typewriter(callback); }, iSpeedNewLineLong);
				}
			} else {
				if (interrupted == 0) {
					playKeySound();
					setTimeout(function() { typewriter(callback); }, iSpeedNewLine);
				}
			}
		}
	} else {
		if (interrupted == 0) {
			setTimeout(function() { typewriter(callback); }, iSpeed);
		}
	}
}
