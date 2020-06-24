<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'Halaman Pimpinan',
				
			
				
						'isi' => 'pimpinan/beranda/list' );
		$this->load->view('pimpinan/layout/wrapper', $data, FALSE);
	}

}

/* End of file Pimpinan.php */
/* Location: ./application/controllers/pimpinan/Pimpinan.php */