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

	public function insertSingleRow($userid, $metakey, $metavalue) {
		$sql = "INSERT INTO im_user_meta (user_id, meta_key, meta_value) "
				. "VALUES (?, ?, ?)";

		$q_meta = "SELECT * FROM im_user_meta
							 WHERE user_id = ? AND meta_key = ?";

	  $exists = $this->db->query($q_meta, array($userid, $metakey));

		if ($exists->num_rows() > 0) {

			return $this->update(array(
														'user_id' => $userid,
														'value'   => $metavalue,
														'key'     => $metakey)
													);
		}

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

	public function update($data)
	{
		$sql = "UPDATE im_user_meta
							SET meta_value = ?
							WHERE user_id = ?
										AND meta_key = ?";

		return $this->db->query($sql, array($data['value'], $data['user_id'], $data['key']));
	}

	public function getMeta($id)
	{
		$sql = "SELECT * FROM im_user_meta WHERE user_id = ?";

		$res = $this->db->query($sql, array($id));

		return $res->result_array();
	}

	/**
	 * Return true if affected row is more than 0
	 * Update is_new to 0
	 * @param int|string $id
	 * @return boolean
	 */
	public function updateIsNew($id) {
		$sql = 'UPDATE im_user_meta SET meta_value = ? WHERE user_id = ? '
			. ' AND meta_key = ?';
		$this->db->query($sql, array(0,$id,'is_new'));
		if($this->db->affected_rows() >= 1)
			return true;
		return false;
	}

	public function updateMeta($id, $meta_key) {
		$sql = 'UPDATE im_user_meta SET meta_value = ? WHERE user_id = ? '
			. ' AND meta_key = ?';

		$this->db->query($sql, array(0,$id,$meta_key));

		if($this->db->affected_rows() >= 1) return true;

		return false;
	}
}
