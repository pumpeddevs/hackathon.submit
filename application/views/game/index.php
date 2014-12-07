<div id="appHolder">
	<div class="sidebar pull-right">
		<div class="title"><p>History</p></div>
		<div class="history">
			<pre class="prettyprint">/** This is a comment <br/> just a sample code when cleared */<br/>this.hello();</pre>
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
		<?php $this->load->view('game/first'); ?>
		<?php $this->load->view('template/navbar'); ?>
		<div class="game-content-holder">
		
			<div class="row rel">
				<span class="dotted"></span>
				<div class="col-xs-4">
					<div class="stage pull-left line-down">Stage 3</div>
				</div>
				<div class="col-xs-4 text-center">
					<div class="stage">Stage 2</div>
				</div>
				<div class="col-xs-4">
					<div class="stage pull-right">START</div>
				</div>
			</div>

			<div class="row rel">
				<span class="dotted"></span>
				<div class="col-xs-4">
					<div class="stage pull-left">Stage 4</div>
				</div>
				<div class="col-xs-4 text-center">
					<div class="stage">Stage 5</div>
				</div>
				<div class="col-xs-4">
					<div class="stage line-down pull-right">Stage 6</div>
				</div>
			</div>

			<div class="row rel">
				<span class="dotted"></span>
				<div class="col-xs-4">
					<div class="stage pull-left line-down">Stage 9</div>
				</div>
				<div class="col-xs-4 text-center">
					<div class="stage">Stage 8</div>
				</div>
				<div class="col-xs-4">
					<div class="stage pull-right">Stage 7</div>
				</div>
			</div>
			
			<div class="row rel">
				<span class="dotted"></span>
				<div class="col-xs-4">
					<div class="stage pull-left">Stage 10</div>
				</div>
				<div class="col-xs-4 text-center">
					<div class="stage">Stage 11</div>
				</div>
				<div class="col-xs-4">
					<div class="stage pull-right">Stage 12</div>
				</div>
			</div>

		</div>
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
	});
</script>