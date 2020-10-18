$(function() {
	if (observer) {
		// code for observer page
		$('.ritual-step input, .ritual-step select').attr('readonly', 'readonly');
		$('.ritual-step a').attr('href', '');

		openSocket(function(e) {
			var wsHello = {
				method: 'hello',
				params: {
					type: 'visitor',
					matchId: 1234 // prepared for multiple running rituals, but seems that it wont be in use, at least not for this ToB
				}
			};
			window.sock.send(JSON.stringify(wsHello));
		}, function(e) {
			var data = JSON.parse(e.data);
			switch (data.method) {
				case 'updateField':
					$('input[name=' + data.params.field + '], select[name=' + data.params.field + ']')
						.val(data.params.value);
					break;

				case 'moveToStep':
					ritualStepSwitch(data.params.step);
					break;

				case 'setResultImg':
					setRitualResult(data.params.img.hunter, data.params.img.hunted);
					break;
			}
		})
	} else {
		// code for oathmaster page

		openSocket(function(e) {
			var wsHello = {
				method: 'hello',
				params: {
					type: 'oathmaster',
					matchId: 1234 // prepared for multiple running rituals
				}
			};
			window.sock.send(JSON.stringify(wsHello));
		});

		$('.ritual-step input[name!="lme"], .ritual-step select').on('change', function() {
			if (locked === true) {
				return;
			}

			var updateField = {
				method: 'updateField',
				params: {
					matchId: 1234, // has to be the same as above
					field: $(this).attr('name'),
					value: $(this).val()
				}
			};
			window.sock.send(JSON.stringify(updateField));
		});

		$('.ritual-step .buttons .ritual-switch').on('click', function(e) {
			if ($(this).hasClass('not-active')) {
				return;
			}

			var moveToStep = {
				method: 'moveToStep',
				params: {
					matchId: 1234, // same as above
					step: $(this).data('step')
				}
			};
			window.sock.send(JSON.stringify(moveToStep));
		});

		$('.buttons').on('click', '#next_Step08_Store.submit', function(e) {
			var form = $('.ritual-form'),
				data = form.serialize(),
				url = form.attr('action');

			data += '&tournamentid=' + $("#turnier_name option:selected").val();

			$.post(url, data).done(function(response) {
				new Noty({
					text: 'Ritual successfully saved',
					type: 'success',
					timeout: 5000,
					killer: true
				}).show();
			}).fail(function() {
				new Noty({
					text: 'Error trying to save ritual to Database. Try again later.',
					type: 'error',
					modal: true,
					layout: 'center',
					timeout: 5000
				}).show();
			});
		});
	}
});

Noty.overrideDefaults({
	theme: 'metroui',
	animation: {
		open : null,
		close: null
	}
});

var openSocket = function(onOpen, onMessage) {
	window.sock = new WebSocket('ws://178.62.89.193:9341');

	// register listener handler
	window.sock.onmessage = function(e) {
		console.debug(e);
		if (typeof onMessage !== 'undefined') {
			onMessage(e);
		}
	};

	// register on open handler
	window.sock.onopen = function(e) {
		new Noty({
			text: 'Connected to ritual systems.',
			type: 'success',
			timeout: 5000,
			killer: true
		}).show();

		// close handler
		window.sock.onclose = function(e) {
			console.debug(e);

			new Noty({
				text: 'Connection to ritual systems lost. Attempting to re-establich connection in 3 seconds',
				type: 'error',
				modal: true,
				layout: 'center',
				timeout: 3000
			}).show();
			// reconnect in a second
			setTimeout(function() { openSocket(onOpen, onMessage); }, 3000);
		}
		onOpen(e);
	};

	checkConnection();
}

var checkConnection = function(interval) {
	if (typeof interval === 'undefined') {
		interval = 1000;
	}

	setTimeout(function() {
		if (window.sock.readyState === 0) {
			Noty.closeAll();
			if (interval <= 8000) {
				new Noty({
					text: 'Connection to ritual systems not established. Re-check in '
						+ (interval / 1000)
						+ ' seconds. Stand by...',
					type: 'warning',
					modal: true,
					layout: 'center'
				}).show();
				checkConnection(interval + interval);
				return;
			}

			new Noty({
				text: 'Unable to connect to ritual systems. Oathmaster may proceed with ritual without observers.',
				type: 'error',
				modal: true,
				layout: 'center',
				timeout: 5000
			}).show();
		}
	}, interval);
};

var getRitualResult = function() {
	var bloodname1 = $('select[name=spieler1_bluthaus]').val()
	var bloodname2 = $('select[name=spieler2_bluthaus]').val()
	var data = 'p1[rank]=' + $('select[name=spieler1_rang]').val()
		+ '&p1[name]=' + $('input[name=spieler1_name]').val()
		+ '&p1[bloodname]=' + bloodname1.split(' ')[0]
		+ '&p2[rank]=' + $('select[name=spieler2_rang]').val()
		+ '&p2[name]=' + $('input[name=spieler2_name]').val()
		+ '&p2[bloodname]=' + bloodname2.split(' ')[0];

	$.get(appData.baseurl + '/index.php/coinMachine/getResult', data, function(result) {
		console.debug(result);
		var setResultImage = {
			method: 'setResultImage',
			params: {
			matchId: 1234,
				results: result.data
			}
		};
		window.sock.send(JSON.stringify(setResultImage));

		setRitualResult(result.data.hunter, result.data.hunted);
	});
}

var setRitualResult = function(hunter, hunted) {
	var hunterRankImg = $('.hunter .rank-image');
	hunterRankImg.attr('src', hunterRankImg.attr('src').substring(0, hunterRankImg.attr('src').lastIndexOf("/") + 1) + hunter.rank + '.png');
	$('.hunter .rank').text(hunter.rank);
	$('.hunter .name').text(hunter.name);
	$('.hunter .bloodname').text(hunter.bloodname);
	$('.hunter .date').text(hunter.date);
	$('.hunter .rank-name').text(hunter.rank + ' ' + hunter.name);

	var huntedRankImg = $('.hunted .rank-image');
	huntedRankImg.attr('src', huntedRankImg.attr('src').substring(0, hunterRankImg.attr('src').lastIndexOf("/") + 1) + hunted.rank + '.png');
	$('.hunted .rank').text(hunted.rank);
	$('.hunted .name').text(hunted.name);
	$('.hunted .bloodname').text(hunted.bloodname);
	$('.hunted .date').text(hunted.date);
	$('.hunted .rank-name').text(hunted.rank + ' ' + hunted.name);
}
