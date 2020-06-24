<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

		public function login($email)
	{
		$this->db->select('*');
		$this->db->from('mitra');
		$this->db->where('email', $email);
	
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
