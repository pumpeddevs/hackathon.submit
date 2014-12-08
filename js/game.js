(function() {

	var textarea = $('#text_editor');
	var myCodeMirror = CodeMirror.fromTextArea(textarea.get(0), {
		lineNumbers: true,
		styleActiveLine: true,
		matchBrackets: true,
		theme: 'monokai',
		extraKeys: {"Ctrl-Space": "autocomplete"},
        mode: {name: "javascript", globalVars: true},
		// gutters: ["CodeMirror-lint-markers"],
		lint: true
	});

	$('#clear_codes').click(function() {
		$('#history').append(myCodeMirror.getValue()+'<br/>')
					.removeClass('prettyprinted');
		PR.prettyPrint();
		myCodeMirror.setValue('');
	});

	$('.stage').on('click', function(event) {
		event.preventDefault();

		var disclaimer = $('#dis-wrapper');

		if (!disclaimer.length) {
			return timerStart();
		}

		disclaimer.fadeIn('slow');
	});

	// timer
	var timer = new (function() {

		var me = this,
				$stopwatch, // Stopwatch element on the page
				incrementTime = 70; // Timer speed in milliseconds

		this.currentTime = 0; // Current time in hundredths of a second
		this.started = false;

		this.updateTimer = function() {
			$stopwatch.html(formatTime(me.currentTime));
			me.currentTime += incrementTime / 10;
		};

		this.init = function(currentTime) {
			if (!me.started) {
				me.started = true;

				if (currentTime) {
					me.currentTime = currentTime;
				}

				$stopwatch = $('#timer');
				timer.Timer = $.timer(me.updateTimer, incrementTime, true);
			}
		};
		
		this.resetStopwatch = function() {
			me.currentTime = 0;
			me.Timer.stop().once();
		};
	})();

	// Common functions
	function pad(number, length) {
		var str = '' + number;
		
		while (str.length < length) {
			str = '0' + str;
		}
		
		return str;
	}
	function formatTime(time) {

		var min = parseInt(time / 6000),
				sec = parseInt(time / 100) - (min * 60),
				hundredths = pad(time - (sec * 100) - (min * 6000), 2);

		return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + ":" + hundredths;
	}

	$('.start-stage').on('click', function(event) {
		event.preventDefault();
		
		var disOff = $('#disclaimer-off'),
				disclaimer = $('#dis-wrapper');

		if (disclaimer) {
			disclaimer.fadeOut('slow');
			
			if (disOff && disOff.is(':checked')) {

				$.post(baseUrl + 'game/update_disclaimer',
					{'disclaimer_off' : disOff.val()},
					function(data, textStatus, xhr) {
						if(data.status == true) {
							// Start this shit
							disclaimer.remove();
						} else {
							// Do not start and show a warning
						}
					}, 'json'
				);
			}
		}

		timerStart();
	});

	function timerStart() {
		console.log(timer);
		console.log(timer.init());
	}

	$('#run_codes').click(function(){
		try{
			eval(myCodeMirror.getValue());
		} catch(err) {
			alert(err);
		}
	});
})();