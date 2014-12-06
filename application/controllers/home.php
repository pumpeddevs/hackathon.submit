<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends FrontController {
	public function __construct() {
		parent::__construct();
		$this->title = 'Instruct Me';
	}

	public function index() {
		$this->render('home/index');
	}
}
