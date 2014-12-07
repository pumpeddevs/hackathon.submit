<div id="appHolder">
	<div class="sidebar pull-right">
		<div class="title"><p>History</p></div>
		<div class="history">
			
		</div>
		<div class="title"><p>Text Editor</p></div>
		<div class="text-editor-holder">
			<textarea id="text-editor" class="text-editor prettyprint" autocapitalize="off" autocorrect="off" autocomplete="off" spellcheck="false"></textarea>
		</div>
		<div class="text-editor-buttons-holder">
			<div class="buttons-holder">
				<button>Run</button>
				<button>Stop</button>
				<button>Clear</button>
			</div>
		</div>
	</div>
	<div class="game-holder pull-right">
		<div id="tip1" class="alert alert-success" role="alert">Welcome to Instruct.Me. </div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var textarea = $('#text-editor');
		var myCodeMirror = CodeMirror.fromTextArea(textarea.get(0), {
				lineNumbers: true,
		    styleActiveLine: true,
		    matchBrackets: true,
		    theme: 'monokai',
		    mode: "javascript",
		    // gutters: ["CodeMirror-lint-markers"],
		    lint: false
		});
		// Tutorial 
		setTimeout(function(){
			$('#tip1').addClass('animated fadeOutDown');
		}, 2000);

	});
</script>