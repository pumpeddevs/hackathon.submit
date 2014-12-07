<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImScore extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function insertScore($userId,$levelId,$score,$lineCount) {
		$sql = "INSERT INTO im_score (user_id,level_id,score,line_count) "
				. "VALUES (?,?,?,?)";
		return $this->db->query($sql, array($userId,$levelId,$score,$lineCount));
	}
}
