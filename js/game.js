(function() {

	var textarea = $('#text_editor');
	var myCodeMirror = CodeMirror.fromTextArea(textarea.get(0), {
		lineNumbers: true,
		styleActiveLine: true,
		matchBrackets: true,
		theme: 'monokai',
		mode: "javascript",
		// gutters: ["CodeMirror-lint-markers"],
		lint: false
	});

	$('#clear_codes').click(function() {
		$('#history').append(myCodeMirror.getValue())
					.removeClass('prettyprinted');
		PR.prettyPrint();
	});

	$('.stage').on('click', function(event) {
		event.preventDefault();

		var disclaimer = $('#dis-wrapper');

		if (!disclaimer) {
			return timerStart();
		}

		disclaimer.fadeIn('slow');
	});

	$('.start-stage').on('click', function(event) {
		event.preventDefault();
		
		var disOff = $('#disclaimer-off'),
				disclaimer = $('#dis-wrapper');

		if (disclaimer) {
			if (disOff && disOff.is(':checked')) {

				$.post(baseUrl + 'game/update_disclaimer',
					{'disclaimer_off' : disOff.val()},
					function(data, textStatus, xhr) {
						if(data.status == true) {
							// Start this shit
						} else {
							// Do not start and show a warning
						}
					}, 'json'
				);
			}

			disclaimer.fadeOut('slow');
		}

		timerStart();

	});

	function timerStart() {

		console.log('timer starts now!');
	}

	$('#run_codes').click(function(){
		try{
			eval(myCodeMirror.getValue());
		} catch(err) {
			alert(err);
		}
	});
})();