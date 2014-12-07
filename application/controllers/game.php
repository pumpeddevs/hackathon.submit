<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends FrontController {

	public function __construct() {
		parent::__construct();
		$this->title = 'Instruct Me';
	}

	public function index() {
		var_dump($this->session->userdata('user'));
		$this->render('game/index');
	}

}