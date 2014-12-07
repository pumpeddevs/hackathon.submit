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
		if($this->isAjax() && $this->session->userdata('im_user') !== false) {
			$this->load->model('ImUserMeta');
			$id = $this->session->userdata('im_user')[0]->id;
			echo json_encode(array('status'=>
				$this->ImUserMeta->updateIsNew($id)));
		}
	}

	public function update_disclaimer() {
		if($this->isAjax() && $this->session->userdata('im_user')!== false) {
			$this->load->model('ImUserMeta');
			$this->session->userdata('im_user')[1]['disclaimer_on'] = 0;
			$id = $this->session->userdata('im_user')[0]->id;
			echo json_encode(array('status'=>$this->ImUserMeta->updateMeta($id, 'disclaimer_on')));
		}
	}
}