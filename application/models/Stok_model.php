<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('stok');
		$this->db->order_by('id_stok','desc');
		$query = $this->db->get();
		return $query->result();

	}
	public function tambah($data)
	{
		$this->db->insert('stok', $data);


	}
		
	
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('stok');
		$this->db->where('id_stok', $id_user);
		$this->db->order_by('id_stok', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function edit($data){

		$this->db->where('id_stok',$data['id_stok']);
		$this->db->update('stok',$data);
	}
	public function delete($data)
	{

		$this->db->where('id_stok', $data['id_stok']);
		$this->db->delete('stok',$data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
