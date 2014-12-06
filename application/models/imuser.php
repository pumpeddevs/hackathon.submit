<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImUser
 *
 * @author Pumpeddevs <pumpeddevs@gmail.com>
 */
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
