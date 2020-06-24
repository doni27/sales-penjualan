<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by('id_barang','desc');
		$query = $this->db->get();
		return $query->result();

	}

	public function ambildata($table){

return $this->db->get($table);

	}
	public function tambah($data)
	{
		$this->db->insert('barang', $data);


	}
		
	
	public function detail($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('id_barang', $id_barang);
		$this->db->order_by('id_barang', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function edit($data){

		$this->db->where('id_barang',$data['id_barang']);
		$this->db->update('barang',$data);
	}
	public function delete($data)
	{

		$this->db->where('id_barang', $data['id_barang']);
		$this->db->delete('barang',$data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
