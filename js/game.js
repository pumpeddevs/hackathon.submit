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
		
	});
})();