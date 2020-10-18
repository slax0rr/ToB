// Trial of Bloodright
// Standalone page for
//
// Coin Ritual
//
// Copyright 2017 CWG
// Clan Wolf Gamma
// http://www.clanwolf.net

var typing = 0;

function move_languageselector_up(languageString) {

	setCookie("tob_language", languageString + "", 365);

	var headStructure = document.getElementById("headstructure");
	headStructure.style.zIndex = 50;
	headStructure.style.pointerEvents = "auto";

	$("#contentwindow").fadeIn(1600, function() {
		if (typing == 0) {
			typing = 1;
		}
	});
	typewriter_setLanguage(languageString);
	typewriter_reset();
	typewriter_continue();
	typewriter();

	var elem = document.getElementsByName("movable");
	var topBackground;
	var fire;
	var languageSelector;

	var i;
	for (i = 0; i < elem.length; i++) {
		var e = elem[i];

		if (e.getAttribute("id") == "1000") {
			topBackground = e;
		} else if (e.getAttribute("id") == "1010") {
			fire = e;
		} else if (e.getAttribute("id") == "1020") {
			languageSelector = e;
		}
	}

	var id = setInterval(frame, 1);
	var pos_topBackground = parseInt(getStyle(topBackground, "top"));
	var pos_fire = parseInt(getStyle(fire, "top"));
	var pos_languageSelector = parseInt(getStyle(languageSelector, "top"));

	function frame() {
		if (pos_languageSelector < 0) {
			clearInterval(id);
			var languageImage = document.getElementById("flag");
			languageImage.src = "img/flag/" + languageString + ".png";
			$("#flag").fadeIn("slow");
			
		} else {
			pos_topBackground--;
			pos_fire--;
			pos_languageSelector--;
			topBackground.style.top = pos_topBackground + 'px';
			fire.style.top = pos_fire + 'px'; 
			languageSelector.style.top = pos_languageSelector + 'px'; 
		}
	}
}

function move_languageselector_down() {
	var languageImage = document.getElementById("flag");
	$("#flag").fadeOut("slow");
	$("#contentwindow").fadeOut("slow", function() {
		typing = 0;
		typewriter_interrupt();
	});

	var elem = document.getElementsByName("movable");
	var topBackground;
	var fire;
	var languageSelector;

	var i;
	for (i = 0; i < elem.length; i++) {
		//console.log(e.getAttribute("class") + " : " + e.getAttribute("name") + " : " + e.getAttribute("id"));
		var e = elem[i];

		if (e.getAttribute("id") == "1000") {
			topBackground = e;
		} else if (e.getAttribute("id") == "1010") {
			fire = e;
		} else if (e.getAttribute("id") == "1020") {
			languageSelector = e;
		}
	}

	var headStructure = document.getElementById("headstructure");
	headStructure.style.zIndex = 60;

	var id = setInterval(frame, 1);
	var pos_topBackground = parseInt(getStyle(topBackground, "top"));
	var pos_fire = parseInt(getStyle(fire, "top"));
	var pos_languageSelector = parseInt(getStyle(languageSelector, "top"));

	function frame() {
		if (pos_languageSelector > 180) {
			clearInterval(id);
			var headStructure = document.getElementById("headstructure");
			headStructure.style.zIndex = 4;
			headStructure.style.pointerEvents = "none";
		} else {
			pos_topBackground++;
			pos_fire++;
			pos_languageSelector++;
			topBackground.style.top = pos_topBackground + 'px';
			fire.style.top = pos_fire + 'px'; 
			languageSelector.style.top = pos_languageSelector + 'px'; 
		}
	}
}
