<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends FrontController {

	public function __construct() {
		parent::__construct();
		$this->title = 'Instruct Me';
	}

	public function index() {
		$this->render('game/index');
	}

	public function updateisnew() {
		if($this->isAjax() && $this->session->userdata('im_uid') !== false) {
			$this->load->model('ImUserMeta');
			$id = $this->session->userdata('im_uid');
			echo json_encode(array('status'=>
				$this->ImUserMeta->updateIsNew($id)));

		}
	}
}