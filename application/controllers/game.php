<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends FrontController {

	public function index() {
		$this->render('game/index');
	}

}