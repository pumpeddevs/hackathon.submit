<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of FrontController
 *
 * @author Pumpeddevs <pumpeddevs@gmail.com>
 */
class FrontController extends BaseController{
	public function __construct() {
		parent::__construct();
		$this->redirectIfAuthenticated();
	}

	private function redirectIfAuthenticated() {
		if($this->router->class == 'home' && $this->router->method == 'index'
				&& $this->session->userdata('im_uid') !== false) {
			// redirect('game');
		} else if($this->router->class != 'home' &&
				$this->session->userdata('im_uid') === false) {
			redirect('home');
		}
	}
}
