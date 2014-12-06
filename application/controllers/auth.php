<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends FrontController{
	public function index() {
		$this->render('auth/index');
	}
}
