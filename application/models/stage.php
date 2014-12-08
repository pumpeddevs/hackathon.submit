<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stage extends CI_Model{

	public function __construct() 
	{
		parent::__construct();
	}

	public function all($user_id) 
	{
		$sql = "SELECT *,
							(
								SELECT count(*) 
								FROM im_score WHERE user_id = ?
							) AS attempt
						FROM im_stages";

		$res = $this->db->query($sql, array($user_id));

		return $res->result();
	}
}
