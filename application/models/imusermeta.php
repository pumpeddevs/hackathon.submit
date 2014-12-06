<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * How to use in controller
 * $this->load->model('ImUserMeta');
 * $this->ImUserMeta->insertSingleRow('1','asdsa','dasfd');
 *
 */
class ImUserMeta extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function insertSingleRow($userid,$metakey,$metavalue) {
		$sql = "INSERT INTO im_user_meta (user_id, meta_key, meta_value) "
				. "VALUES (?, ?, ?)";

		return $this->db->query($sql, array($userid, $metakey, $metavalue));
	}

	/**
	 * $data = array(array('userid'=>'1','metakey'=>'aaa','metavalue'=>'bbb'),
	 *      array('userid'=>'1','metakey'=>'ccc','metavalue'=>'ddd'));
	 * @param array $data
	 * @return boolean TRUE if no error but use === possible return of 0
	 */
	public function insertMultipleRow($data) {
		$this->db->trans_start();
		foreach($data as $value) {
			$this->insertSingleRow($value['userid'], $value['metakey'],
					$value['metavalue']);
		}
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}
