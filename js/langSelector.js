// Trial of Bloodright
// Standalone page for
//
// Coin Ritual
//
// Copyright 2017 CWG
// Clan Wolf Gamma
// http://www.clanwolf.net

var typing = 0;

$(window).on('load', function() {
    showLangSelector();
});

$(document).ready(function() {
    $('.lang_selector').on('click', function(e) {
        e.preventDefault();
        var lang = $(this).data('langstring');
        hideLangSelector(lang);
        $('.fastforwardbutton a').attr('href', '/' + lang)
        showContentWindow(lang);
    });
});

var hideContentWindow = function() {
    $('#contentwindow').fadeOut('slow', function() {
        typing = 0;
        typewriter_interrupt();
    });
}

var showLangSelector = function() {
    // hide the previously selected language
    $('#flag').fadeOut('slow');

    var topBackground = $('#1000'),
        fire = $('#1010'),
        languageSelector = $('#1020'),
        headStructure = $('#headstructure');

    headStructure.css('z-index', 60);

    topBackground.animate({'top': 21}, 1000);
    fire.animate({'top': 21}, 1000);
    languageSelector.animate({'top': 181}, 1000, function() {
        headStructure.css('z-index', 4).css('pointer-events', 'none');
    });
}

var showContentWindow = function(languageString) {
    $("#contentwindow").fadeIn(1600, function() {
        if (typing == 0) {
            typing = 1;
        }
        typewriter_setLanguage(languageString);
        typewriter_reset();
        typewriter_continue();
        typewriter(function() {
            $('#typedtext').fadeOut(1000, function() {
                window.location = '/' + languageString;
            });
        });
    });
}

var hideLangSelector = function(languageString) {
    var topBackground = $('#1000'),
        fire = $('#1010'),
        languageSelector = $('#1020'),
        headStructure = $('#headstructure');

    headStructure.css('z-index', 50).css('pointer-events', 'auto');

    topBackground.animate({'top': -161}, 1000);
    fire.animate({'top': -161}, 1000);
    languageSelector.animate({'top': -1}, 1000, function() {
        var languageImage = $("#flag");
        languageImage.attr('src', 'img/flag/' + languageString + '.png').fadeIn('slow');
    });
}
