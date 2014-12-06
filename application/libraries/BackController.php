<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of BackController
 *
 * @author Pumpeddevs <pumpeddevs@gmail.com>
 */
class BackController extends BaseController{
	public function __construct() {
		parent::__construct();
		$this->layout='layout/back';
		$this->title = 'Back Title';
	}
}
