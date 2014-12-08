<div class="stage-holder">
	<a href="#">
		<div class="stage">
			<h1>1</h1>
		</div>
		<div class="stage-name">
			Divide and Conquer
		</div>
	</a>
</div>
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