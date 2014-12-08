<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Score extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function insertScore($data)
	{
		$attempt = $this->attempt($data['stage_id'], $data['user_id']);

		$params = array(
			$data['user_id'],
			$data['stage_id'],
			$data['start'],
			$data['end'],
			$attempt++
		);

		$sql = "INSERT INTO im_score
							(user_id, stage_id, start_time, end_time, attempt)
						VALUES (?, ?, ?, ?, ?)";

		return $this->db->query($sql, $params);
	}

	public function attempt($stage_id, $user_id)
	{
		$sql = "SELECT count(*) WHERE stage_id = ? AND user_id = ?";

		$res = $this->db->query($sql, array($stage_id, $user_id));

		return $res->row()->count;
	}
}
