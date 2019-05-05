<script>
    var locked = true;
	var observer = <?= $observer ? "true" : "false"; ?>
</script>

<script src="<?= $baseurl; ?>/js/ritual.js"></script>

<script>
	$(document).ready(function() {
		$('.ritual-step-<?= $activeStep; ?>').show();
		$('.ritual-switch').on('click', function(e) {
			e.preventDefault();
			ritualStepSwitch($(this).data('step'));
		});
		if (<?= $activeStep; ?> === "1") {
			// do nothing
		} else {
			if (locked==true) {
				$('.ritual-step').hide();
				$('.ritual-step-1').show();
			}
		}

		$('#next_Step05_Step06').on('click', function(e) {
			if (locked === false) {
				getRitualResult();
			}
		});
	});

	var ritualStepSwitch = function(stepNo) {

		if (stepNo === 3) {
			$(".warrior1_text").text($("select[name=spieler1_rang] option:selected").text() + ' ' + $("#spieler1_name").val());
			$(".warrior2_text").text($("select[name=spieler2_rang] option:selected").text() + ' ' + $("#spieler2_name").val());
		}

		if (stepNo === 8) {
			$(".winner").text($("select[name=sieger] option:selected").text());

			var unSelected = $("#sieger").find('option').not(':selected');
			for (var i = 0; i < unSelected.length; i++) {
				if (unSelected[i].text.substring(0, 4) != '--- ') {
					$(".loser").text(unSelected[i].text);
				}
			}
		}

		$('.ritual-step').hide();
		$('.ritual-step-' + stepNo).show();
		var uri = observer ? 'observer' : 'oathmaster';
		window.history.pushState(
			'obj',
			'Clan Wolf - Trial of Bloodright',
			'/' + uri + '/step/' + stepNo
		);
	};

	var changesDone = false;

	var page1_complete = false;
	var page2_complete = false;

	var m_lme = document.getElementById('lme').value;
	var m_lmec = 'herhjkhs39392dfjkl';

	var m_turnier_name = document.getElementById('turnier_name').value;
	var m_kampf_name = document.getElementById('kampf_name').value;
	var m_twitchchannel_name = document.getElementById('twitchchannel_name').value;
	var m_eidmeister_name = document.getElementById('eidmeister_name').value;
	var m_spieler1_name = document.getElementById('spieler1_name').value;
	var m_spieler1_alter = document.getElementById('spieler1_alter').value;
	var m_spieler1_sponsor = document.getElementById('spieler1_sponsor').value;
	var m_spieler1_rang = document.getElementById('spieler1_rang').value;
	var m_spieler1_bluthaus = document.getElementById('spieler1_bluthaus').value;
	var m_spieler1_einheit = document.getElementById('spieler1_einheit').value;
	var m_spieler2_name = document.getElementById('spieler2_name').value;
	var m_spieler2_alter = document.getElementById('spieler2_alter').value;
	var m_spieler2_sponsor = document.getElementById('spieler2_sponsor').value;
	var m_spieler2_rang = document.getElementById('spieler2_rang').value;
	var m_spieler2_bluthaus = document.getElementById('spieler2_bluthaus').value;
	var m_spieler2_einheit = document.getElementById('spieler2_einheit').value;

	var m_tonnage = document.getElementById('tonnage').value;
	var m_karte = document.getElementById('karte').value;
	var m_termin = document.getElementById('termin').value;
	var m_spieler1_config = document.getElementById('spieler1_config').value;
	var m_spieler2_config = document.getElementById('spieler2_config').value;

	var m_sieger = document.getElementById('sieger').value;
	var m_video = document.getElementById('video').value;

	function getObjectValues() {
		m_lme = document.getElementById('lme').value;
		m_lmec = document.getElementById('spieler1_name').value;

		m_turnier_name = document.getElementById('turnier_name').value.trim();
		m_kampf_name = document.getElementById('kampf_name').value.trim();
		m_twitchchannel_name = document.getElementById('twitchchannel_name').value.trim();
		m_eidmeister_name = document.getElementById('eidmeister_name').value.trim();
		m_spieler1_name = document.getElementById('spieler1_name').value.trim();
		m_spieler1_alter = document.getElementById('spieler1_alter').value.trim();
		m_spieler1_sponsor = document.getElementById('spieler1_sponsor').value.trim();
		m_spieler1_rang = document.getElementById('spieler1_rang').value.trim();
		m_spieler1_bluthaus = document.getElementById('spieler1_bluthaus').value.trim();
		m_spieler1_einheit = document.getElementById('spieler1_einheit').value;
		m_spieler2_name = document.getElementById('spieler2_name').value.trim();
		m_spieler2_alter = document.getElementById('spieler2_alter').value.trim();
		m_spieler2_sponsor = document.getElementById('spieler2_sponsor').value.trim();
		m_spieler2_rang = document.getElementById('spieler2_rang').value.trim();
		m_spieler2_bluthaus = document.getElementById('spieler2_bluthaus').value.trim();
		m_spieler2_einheit = document.getElementById('spieler2_einheit').value;

		m_tonnage = document.getElementById('tonnage').value.trim();
		m_karte = document.getElementById('karte').value.trim();
		m_termin = document.getElementById('termin').value.trim();
		m_spieler1_config = document.getElementById('spieler1_config').value.trim();
		m_spieler2_config = document.getElementById('spieler2_config').value.trim();

		m_sieger = document.getElementById('sieger').value.trim();
		m_video = document.getElementById('video').value.trim();
	}

	function hashCode(str) {
		var hash = 0;
		if (str.length == 0) return hash;
		for (i = 0; i < str.length; i++) {
			char = str.charCodeAt(i);
			hash = ((hash<<5)-hash)+char;
			hash = hash & hash;
		}
		return hash;
	}

	function setWarning() {
		if (!changesDone) {
			jQuery(document).ready(function() {
				$(window).bind('beforeunload', function() {
					return 'Seite schließen?';
				});  
				$('form').submit(function() {
					$(window).unbind('beforeunload');
				});
			});
			changesDone = true;
		}
	}
	
	function valueChanged() {
		setWarning();
		getObjectValues();

		if (hashCode(m_lme) == '-816227352') {
			// indicate Loremaster access
			document.getElementById('access').style.backgroundColor = '#38571a';
			document.getElementById('access').style.borderColor = '#c3d117';
			document.getElementById('lme').style.color = '#ffa500';
			document.getElementById('lme').style.backgroundColor = '#38571a';
			document.getElementById('lme').style.borderColor = '#38571a';
			document.getElementById('next_Step01_Step02').className = 'ritual-switch';
			document.getElementById('next_Step03_Step04').className = 'ritual-switch';
			document.getElementById('next_Step04_Step05').className = 'ritual-switch';
			document.getElementById('next_Step07_Step08').className = 'ritual-switch';
			locked = false;
		} else {
			document.getElementById('access').style.backgroundColor = '#831100';
			document.getElementById('access').style.borderColor = '#e32400';
			document.getElementById('lme').style.color = '#ffa500';
			document.getElementById('lme').style.backgroundColor = '#5c0700';
			document.getElementById('lme').style.borderColor = '#e32400';
			document.getElementById('next_Step01_Step02').className = 'ritual-switch not-active';
			document.getElementById('next_Step03_Step04').className = 'ritual-switch not-active';
			document.getElementById('next_Step04_Step05').className = 'ritual-switch not-active';
			document.getElementById('next_Step07_Step08').className = 'ritual-switch not-active';
		}

		if ((m_turnier_name.substring(0, 4) != '--- ')
			&& (m_turnier_name != '')
			&& (m_kampf_name != '')
			&& (m_twitchchannel_name != '')
			&& (m_eidmeister_name != '')
			&& (hashCode(m_lme) == '-816227352')) {
			document.getElementById('next_Step01_Step02').className = 'ritual-switch';
			page1_complete = true;
		} else {
			document.getElementById('next_Step01_Step02').className = 'ritual-switch not-active';
			page1_complete = false;
		}

		if ((m_spieler1_name != '')
			&& (m_spieler1_alter != '')
			&& (m_spieler1_sponsor != '')
			&& (m_spieler1_rang.substring(0, 4) != '--- ')
			&& (m_spieler1_bluthaus.substring(0, 4) != '--- ')
			&& (m_spieler2_name != '')
			&& (m_spieler2_alter != '')
			&& (m_spieler2_sponsor != '')
			&& (m_spieler2_rang.substring(0, 4) != '--- ')
			&& (m_spieler2_bluthaus.substring(0, 4) != '--- ')
			&& (hashCode(m_lme) == '-816227352')) {
			document.getElementById('next_Step02_Step03').className = 'ritual-switch';
			page2_complete = true;
		} else {
			document.getElementById('next_Step02_Step03').className = 'ritual-switch not-active';
			page2_complete = false;
		}

		if (page1_complete && page2_complete) {
			document.getElementById('next_Step05_Step06').className = 'ritual-switch';
		} else {
			document.getElementById('next_Step05_Step06').className = 'ritual-switch not-active';
		}

		if((m_tonnage.substring(0, 4) != '--- ')
			&& (m_karte.substring(0, 4) != '--- ')
			&& (m_termin != '')
			&& (m_spieler1_config != '')
			&& (m_spieler2_config != '')) {
			document.getElementById('next_Step06_Step07').className = 'ritual-switch';
		} else {
			document.getElementById('next_Step06_Step07').className = 'ritual-switch not-active';
		}

		if((m_sieger != '')
			&& (m_sieger.substring(0, 4) != '--- ')) {
			document.getElementById('next_Step07_Step08').className = 'ritual-switch';
			document.getElementById('next_Step08_Store').className = 'ritual-switch submit';
		} else {
			document.getElementById('next_Step07_Step08').className = 'ritual-switch not-active';
			document.getElementById('next_Step08_Store').className = 'ritual-switch not-active';
		}
	}
</script>
