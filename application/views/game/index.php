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
		<?php $this->load->view('game/tutorial'); ?>
	
		<?php 
		 	$session = $this->session->userdata('im_user')[1];

			if (!isset($session['disclaimer_on'])
					|| $session['disclaimer_on'] == 1) {
				$this->load->view('game/disclaimer');
			}
		?>
		<?php $this->load->view('template/navbar'); ?>
		<!--div class="game-content-holder">
			<div class="timer">
				<span id="timer">00:00:00</span>
			</div>
		
			
			<div id="stage-wrapper">
				<div class="row rel">
					<span class="dotted"></span>
					<div class="col-xs-4">
						<div class="stage pull-left line-down">Stage 3</div>
					</div>
					<div class="col-xs-4 text-center">
						<div class="stage">Stage 2</div>
					</div>
					<div class="col-xs-4">
						<div class="stage pull-right">
							<div class="pin">
								<img src="<?php echo base_url('images/cat.jpg') ?>" alt="Cat">
							</div>
							<div class="pulse"></div>
						</div>
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
		</div> <!-- // game-content-holder -->
		<div class="game-content-holder">
			<?php for($i=0;$i<20; $i++) : ?>
			<div class="stage-holder">
				<a href="#">
					<div class="stage">
						<!--h1><?php echo $i; ?></h1-->
						<img class="locked-stage" src="<?php echo base_url('images/lock.png'); ?>" alt="lock">
					</div>
					<div class="stage-name">
						Divide and Conquer
					</div>
				</a>
			</div>
		<?php endfor; ?>
		</div><!-- // game-content-holder -->
		<div class="console">
			<div class="title"><p>Console</p></div>
			<div id="console" class="console-output"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('js/vendor/jquery.timer.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/game.js') ?>"></script>
