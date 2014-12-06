<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImLevel extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function insertLevel($levelName) {
		$sql = "INSERT INTO im_level (name) "
				. "VALUES (?)";
		return $this->db->query($sql, array($levelName));
	}
}
