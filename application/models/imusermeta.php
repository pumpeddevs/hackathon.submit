<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImUserMeta extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function insertSingleRow($userid,$metakey,$metavalue) {
		$sql = "INSERT INTO im_user_meta (user_id, meta_key, meta_value) "
				. "VALUES (?, ?, ?)";

		return $this->db->query($sql, array($userid, $metakey, $metavalue));
	}

	public function insertMultipleRow($data) {

		foreach($data as $key => $value) {

		}
	}
}
