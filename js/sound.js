// Trial of Bloodright
// Standalone page for
//
// Coin Ritual
//
// Copyright 2017 CWG
// Clan Wolf Gamma
// http://www.clanwolf.net

// http://goldfirestudios.com/blog/104/howler.js-Modern-Web-Audio-Javascript-Library
 
var sound_key = new Howl({ src: ['http://tob.clanwolf.net/audio/key.mp3', 'http://tob.clanwolf.net/audio/key.ogg'] });

var sound = getCookie("tob_sound");
if ((sound !== null) && (typeof sound != 'undefined')) {
	
} else {
	sound = "on";
	setCookie("tob_sound", "on" + "", 365);
}

function setSoundOn() {
	sound = "on";
	setCookie("tob_sound", "on" + "", 365);

	var soundswitch = document.getElementById("soundswitch");
	soundswitch.innerHTML = "<span id='soundswitch'><a href='#' onclick='setSoundOff();'><i class='fa fa-volume-up fa-lg' aria-hidden='true'></i></span>";
}

function setSoundOff() {
	sound = "off";
	setCookie("tob_sound", "off" + "", 365);

	var soundswitch = document.getElementById("soundswitch");
	soundswitch.innerHTML = "<span id='soundswitch'><a href='#' onclick='setSoundOn();'><i class='fa fa-volume-off fa-lg' aria-hidden='true'></i></span>";
}

function playKeySound() {
	if (sound === "on") {
		sound_key.play();
	}
}
