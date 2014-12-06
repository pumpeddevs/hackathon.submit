<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author 
 */
class BaseController extends CI_Controller {
    
    public $layout='layout/mobile';
    public $title = "Page not found";    
    public $data = array();

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		
	}

    public function render($view, $param=array()) {
        $data['view'] = $view;
        $data['param'] = $param;
		$data['title'] = $this->title;
        $this->load->view($this->layout,$data);
    }
    
    public function renderPartial($view,$param=array()) {
        $this->load->view($view,$param);
    }

	/**
	 * return true if request type is ajax else false
	 * @return boolean
	 */
	public function isAjax() {
		return $this->input->is_ajax_request();
	}

	public function autoRender($view,$param=array()) {
		if($this->isAjax()) {
			$this->renderPartial($view,$param);	
		} else {
			$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

			// Browser
			$safari = strpos($userAgent, 'safari') ? true : false;
			$chrome = strpos($userAgent, 'chrome') ? true : false;

			//Mobile
			$iphone  = strpos($userAgent, 'iphone') ? true : false;
			$android = strpos($userAgent, 'android') ? true : false;

			// If iphone and safari
			if(($safari && !$chrome) && $iphone) $param['mobile'] = true;

			$this->render($view,$param);
		}

	}


	/**
	 * show call "return $this->show404();"
	 */
	public function show404() {
		if($this->isAjax()) {
			$this->renderPartial('errorpage/pagenotfound');
		} else {
			$this->render('errorpage/pagenotfound');
		}
	}
} 
