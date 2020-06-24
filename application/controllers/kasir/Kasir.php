<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'Halaman Kasir',
				
			
				
						'isi' => 'kasir/beranda/list' );
		$this->load->view('kasir/layout/wrapper', $data, FALSE);
	}

}

/* End of file Mitra.php */
/* Location: ./application/controllers/admin/Mitra.php */
