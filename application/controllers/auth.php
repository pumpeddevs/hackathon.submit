<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of auth
 *
 * @author Pumpeddevs <pumpeddevs@gmail.com>
 */
class Auth extends FrontController{
	public function index() {
		$this->render('auth/index');
	}
}
