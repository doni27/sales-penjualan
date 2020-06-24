<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_mitra
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
     
        // load data model user
        $this->CI->load->model('mitra_model');
	}
	// fungsi login
	public function login($email)
	{

$check = $this->CI->mitra_model->login($email);
	// jika ada data usernnya, maka create session login

	if($check){
		$email = $check->email;
		$id_perusahaan = $check->id_perusahaan;
		$nama_perusahaan = $check->nama_perusahaan;
		//create sesssion
		$this->CI->session->set_userdata('id_perusahaan',$id_perusahaan);
		$this->CI->session->set_userdata('nama_perusahaan',$nama_perusahaan);
		$this->CI->session->set_userdata('email',$email);
		
		// redirect ke halaman admin
		redirect(base_url('mitra/mitra'),'refresh');

	}else{
				$this->CI->session->set_flashdata('warning','email atau password salah');
				redirect(base_url('logmitra'),'refresh');
	}

	}
public function cek_login()
{
	// memeriksa apakah sesionya sudah ada?

	if($this->CI->session->userdata('email')==""){
		$this->CI->session->set_flashdata('warning','anda belum login');
				redirect(base_url('logmitra'),'refresh');
	}



}

// fungsi logout

public function logout()
{
	// MEMBUANG session
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		



$this->CI->session->set_flashdata('sukses','anda berhasil logout');
				redirect(base_url('masuk'),'refresh');
}

}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
