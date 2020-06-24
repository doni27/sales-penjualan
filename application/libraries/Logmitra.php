<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logmitra extends CI_Controller {

	public function index()
	{
		//validation
		$this->form_validation->set_rules('email','Email', 'required',
			 array('required' => '%s harus di isi' ));

		

		$this->form_validation->set_rules('password','Password', 'required',
			 array('required' => '%s harus di isi' ));


		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//proses ke simple login

			$this->simple_mitra->login($email);		
		}
// end validasi
		$data = array('title' =>'Login Administrator' , );
		 $this->load->view('logmitra/list', $data, FALSE);
	}
		public function logout(){
		// ambil fungdlogout
		$this->simple_login->logout();

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
