<div id="appHolder">
	<div class="sidebar pull-right">
		<div class="title"><p>History</p></div>
		<div class="history">
			<pre id="history" class="prettyprint"></pre>
		</div>
		<div class="title"><p>Text Editor</p></div>
		<div class="text-editor-holder">
			<textarea id="text_editor" class="text-editor prettyprint" autocapitalize="off" autocorrect="off" autocomplete="off" spellcheck="false"></textarea>
		</div>
		<div class="text-editor-buttons-holder">
			<div class="buttons-holder">
				<button id="run_codes" >Run</button>
				<button id="stop_codes" >Stop</button>
				<button id="clear_codes" >Clear</button>
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
		    // gutters: ["CodeMirror-lint-markers"],
		    lint: false
		});

		$('#clear_codes').click(function() {
			$('#history').append(myCodeMirror.getValue())
						.removeClass('prettyprinted');
			PR.prettyPrint();
		});
	});
</script>