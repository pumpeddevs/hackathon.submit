<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImUser extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

	public function insertUser($email,$token) {
		$sql = "INSERT INTO im_user (email, token) "
				. "VALUES (?, ?)";

		return $this->db->query($sql, array($email, $token));
	}
}
