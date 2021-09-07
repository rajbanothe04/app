<?php
class Data_model extends CI_model
{
	public function save_menu($post)
	{
		return	$this->db->insert('menu', $post);
	}
	public function get_menu()
	{

		$this->db->select('*')
			->from('menu');

		if ($query = $this->db->get()) {
			return $query->result_array();
		} else {
			return false;
		}
	}
}