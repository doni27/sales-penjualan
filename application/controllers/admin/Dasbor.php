<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function index()
	{
	
	

		$data = array('title' => 'Halaman Admin',
				
			
				
						'isi' => 'admin/dasbor/list' );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */