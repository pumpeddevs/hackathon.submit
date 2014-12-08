<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scene extends CI_Model{

	public function __construct() 
	{
		parent::__construct();
	}

	public function all() 
	{
		$sql = "SELECT * FROM im_scenes ORDER BY ";

		$this->db->query($sql, array($user->email, $token));

		return $this->db->insert_id();
	}

	public function getUser($email)
	{
		$sql = "SELECT * FROM im_user WHERE email = ?";

		$res = $this->db->query($sql, array($email));

		return $res->row();
	}

	public function update($id, $user, $token) {
		$sql = "UPDATE im_user SET email = ?, token = ? WHERE id = ?";

		return $this->db->query($sql, array($user->email, $token, $id));
	}
}
