<!-- <div id="tutorial_holder" class="tutorial-holder" >
	<div class="tutorial-box">
		<div class="tutorial-box-content">
			<span id="welcome_content" class="welcome_tuts"></span>
		</div>
		<div class="tutorial-box-footer">
			<div style="height:100%; vertical-align:middle; width:0px; display:inline-block;"></div>
			<button id="skip" class="tuts-btn" onclick="closeFirstTutorial()">Skip</button>
			<button id="prev" class="tuts-btn">&lt; Prev</button>
			<button id="next" class="tuts-btn">Next &gt;</button>
		</div>
	</div>
</div> -->

<script type="text/javascript">
	var tut_page = 0,
	steps = [welcomeUser, firstPage, secondPage, thirdPage, fourthPage, fifthPage, sixthPage],
	ids   = ['welcome_content', 'tuts_basic1', 'tuts_basic2', 'tuts_basic3', 'tuts_basic4', 'tuts_basic5', 'tuts_basic6'],
	isClickable = false;

	$(document).ready(function() {


		// Tutorial 
		//$('#tip1').addClass('animated fadeOutDown');

		$('.welcome_tuts').hide();
		steps[tut_page]();

		$('#next').click(function(){

			if(tut_page+1>steps.length-1) {
				return;
			}

			if(!isClickable) {
				// print simple message
				return;
			}

			isClickable = false;
			tut_page++;
			clearTuts(tut_page, tut_page-1);
			steps[tut_page]();
		});

		$('#prev').click(function(){

			if(tut_page-1<0) {
				return;
			}

			if(!isClickable) {
				// print simple message
				return;
			}

			isClickable = false;
			tut_page--;
			clearTuts(tut_page, tut_page+1);
			steps[tut_page]();
		});

	});

	function clearTuts(tut_page, remove_page) {
		// $(ids[tut_page]).addClass('animated fadeOutUp');
		// $(ids[tut_page]).removeClass('animated fadeOutUp');
		// $(ids[tut_page]).html('');
		// $(ids[tut_page]).hide();
		$('#'+ids[remove_page]).remove();
		$('.typed-cursor').remove();
		$('.tutorial-box-content').append('<span id="'+ids[tut_page]+'" class="welcome_tuts"></span>');
	}

	function welcomeUser() {
		var strings = [
				'<h1>Welcome to Instruct Me!</h1> ^1500<br/> <br/> <br/> <h4>Instruct me is an app that teaches ' +
				'anyone about the basics of programming through games.</h4> ^1000 <br/> <br /> <h4>Let\' get started?</h4>'
		    ];
		doTyped('#welcome_content', strings);
	}

	function firstPage() {
		var strings = [
				'<h3>To learn programming, we must learn how to define programming. :) ^1000</h3>', 
				'<h1>Programming</h1> ^1000 <br/> <br/> <h4>It is a sequence of instructions that will automate ' +
				'performing a specific task or solving a given problem.</h4> ^500 <br/> <br/> <h4> <strong>Computer programming</strong> ' +
				'(often shortened to programming) is a process that leads from an original formulation of a computing ' +
				'problem to executable computer programs. ^1000 Programming involves activities such as analysis, developing ' +
				'understanding, generating algorithms, verification of requirements of algorithms including their ' +
				'correctness and resource consumption, and implementation (commonly referred to as coding) of algorithms '+
				'in a target programming language.</h4> ^1000 <br/> <br/> <h5> To learn more, click <a href="http://en.wikipedia.org/wiki/Computer_programming">here</a> </h5>'
			];
		doTyped('#tuts_basic1', strings);
	}

	function secondPage() {
		var strings = [
				'<h3>Let\'s get to know the app now. :) ^1000</h3>', 
				'<h1>Text Editor</h1> ^1000 <br/> <br/> <h4>The text editor is where all your codes should be written. The codes you write must be written</h4>'
			];
		doTyped('#tuts_basic2', strings);
	}

	function thirdPage() {
		var strings = [
				'<h1>Run Button</h1> ^1000 <br/> <br/> <h4>The Run button executes all the codes written in your text editor.</h4>'
			];
		doTyped('#tuts_basic2', strings);
	}

	function fourthPage() {
		var strings = [
				'<h1>Stop Button</h1> ^1000 <br/> <br/> <h4>The Stop button stops code which you ran.</h4>'
			];
		doTyped('#tuts_basic2', strings);
	}

	function fifthPage() {
		var strings = [
				'<h1>History</h1> ^1000 <br/> <br/> <h4>The History pane will serve as your reference while blablabla</h4>'
			];
		doTyped('#tuts_basic2', strings);
	}

	function sixthPage() {
		var strings = [
				'<h1>Clear Button</h1> ^1000 <br/> <br/> <h4>The Clear button clears your text editor and puts them to your history for your reference.</h4>'
			];
		doTyped('#tuts_basic2', strings);
	}

	function doTyped(id, strings_used) {
		$(id).show();
		$(id).typed({
			strings:strings_used,
			typeSpeed:1,
			startDelay:500,
			callback:function() {
				$(id).append('<br/><br/><div id="click_next" class="click-next" style="display:none;"><h5>(Click Next to continue)</h5></div>');
        		setTimeout(function(){
        			$('#click_next').show();
	        		$('#click_next').addClass('animated fadeInDown');
	        	}, 1000);
				isClickable = true;
			}
		});
	}

	function closeFirstTutorial() {
		$('#tutorial_holder').remove();
	}

</script>