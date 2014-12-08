var tut_page = 0,
steps = [welcomeUser, firstPage, secondPage, thirdPage, fourthPage, fifthPage, sixthPage, exitTuts],
ids   = ['welcome_content', 'tuts_basic1', 'tuts_basic2', 'tuts_basic3', 'tuts_basic4', 'tuts_basic5', 'tuts_basic6', 'exit_tuts'],
isClickable = false;

$(document).ready(function() {

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

		//isClickable = false;
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
	$('#'+ids[remove_page]).remove();
	$('.typed-cursor').remove();
	$('#tutorial_holder .im-modal .im-modal-content').append('<span id="'+ids[tut_page]+'" class="welcome_tuts"></span>');
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
			'<h3>To learn programming, we must first learn how to define programming. :) ^1000</h3>',
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
			'<h1>Text Editor</h1> ^1000 <br/> <br/> <h4>The text editor is where you write all your codes. Get familiar with your text editor as much as possible.</h4>'
		];
	doTyped('#tuts_basic2', strings);
}

function thirdPage() {
	var strings = [
			'<h1>Run Button</h1> ^1000 <br/> <br/> <h4>The Run button executes all the codes written in your text editor.</h4>'
		];
	doTyped('#tuts_basic3', strings);
}

function fourthPage() {
	var strings = [
			'<h1>Stop Button</h1> ^1000 <br/> <br/> <h4>The Stop button stops the code execution if it is still running.</h4>'
		];
	doTyped('#tuts_basic4', strings);
}

function fifthPage() {
	var strings = [
			'<h1>History</h1> ^1000 <br/> <br/> <h4>The History pane will store all the previous codes that you have cleared during the session.</h4>'
		];
	doTyped('#tuts_basic5', strings);
}

function sixthPage() {
	var strings = [
			'<h1>Clear Button</h1> ^1000 <br/> <br/> <h4>The Clear button clears your text editor and puts them to your history for your reference.</h4>'
		];
	doTyped('#tuts_basic6', strings);
}

function exitTuts() {
	var strings = [
			'<h1>Tutorial has finished. It\'s time to play the game now. :)</h1>'
		];
	doTyped('#exit_tuts', strings, closeFirstTutorial);
}

function doTyped(id, strings_used, callback) {
	$(id).show();
	$(id).typed({
		strings:strings_used,
		typeSpeed:1,
		startDelay:500,
		callback:function() {
			$(id).append('<br/><br/><div id="click_next" class="click-next" style="display:none;"><h5>(Click Next to continue)</h5></div>');
					setTimeout(function(){
						$('#click_next').css('display', 'inline');
						$('#click_next').addClass('animated fadeInDown');
						if(callback) callback();
					}, 1000);
			isClickable = true;
		}
	});
}

function closeFirstTutorial(skipped) {
	$('#tutorial_holder .im-modal').addClass('animated fadeOutLeft');

	if (skipped) {
		
		setTimeout(function() {
			$('#tutorial_holder').remove();
		}, 1000);

		return;
	}

	setTimeout(function() {
		$.post(baseUrl + 'game/done_tutorial',
			{
				isNew: 0
			},
			function(data, textStatus, xhr) {
					$('#tutorial_holder').remove();
			}, 'json'
		);
		
	}, 1000);
}