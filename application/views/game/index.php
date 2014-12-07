<div id="appHolder">
	<div class="sidebar pull-right">
		<div class="title"><p>History</p></div>
		<div class="history">
			<pre class="prettyprint">/** This is a comment <br/> just a sample code when cleared */<br/>this.hello();</pre>
		</div>
		<div class="title"><p>Text Editor</p></div>
		<div class="text-editor-holder">
			<textarea id="text_editor" class="text-editor prettyprint" autocapitalize="off" autocorrect="off" autocomplete="off" spellcheck="false"></textarea>
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
		<?php $this->load->view('game/first'); ?>
		<?php $this->load->view('template/navbar'); ?>
		<div class="game-content-holder">
			
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var textarea = $('#text_editor');
		var myCodeMirror = CodeMirror.fromTextArea(textarea.get(0), {
			lineNumbers: true,
		    styleActiveLine: true,
		    matchBrackets: true,
		    theme: 'monokai',
		    mode: "javascript",
		    gutters: ["CodeMirror-lint-markers"],
		    lint: false
		});
		// Tutorial 
		setTimeout(function(){
			$('#tip1').addClass('animated fadeOutDown');
		}, 2000);

	});
</script>