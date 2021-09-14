<?php
class Data_model extends CI_model
{
	public function save_menu($post)
	{
		return	$this->db->insert('menu', $post);
	}
	public function get_menu()
	{

		// $this->db->select('*')
		// 	->from('menu');
		$parentMenu = $this->db->select('*')
			->from("menu")
			->get();

		$menu = $parentMenu->result();
		$i = 0;
		foreach ($menu as $mainMenu) {

			$menu[$i]->submenu = $this->sub_menu($mainMenu->id);
			$i++;
		}

		return $menu;
	}
	public function sub_menu($id)
	{
		$this->db->select('*');
		$this->db->from('sub_menu');
		$this->db->where('menu_id', $id);
		// echo $id;
		$child = $this->db->get();
		$submenu = $child->result();
		// $i = 0;
		// foreach ($submenu as $submenuitem) {
		// 	$submenu[$i]->submenu = $this->sub_menu($submenuitem->id);
		// 	$i++;
		// }
		// echo "<pre>";
		// print_r($submenu);
		// echo "</pre>";
		// exit;
		return $submenu;
	}
	public function load_menu()
	{

		$query = $this->db->select('id')
			->select('menu_name')
			->get('menu');
		return $query->result();
	}
	public function add_submenu($post)
	{
		return	$this->db->insert('sub_menu', $post);
	}
	public function get_submenu($id)
	{

		$query = $this->db->select('*')
			->from('sub_menu')
			->where('id', $id)
			->get();
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		// exit;
		return $query->result();
	}
}