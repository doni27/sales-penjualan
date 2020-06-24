<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
     
        // load data model user
        $this->CI->load->model('user_model');
	}
	// fungsi login
	public function login($username, $password)
	{

$check = $this->CI->user_model->login($username, $password);
	// jika ada data usernnya, maka create session login

	if($check){
		$id_user = $check->id_user;
		$nama = $check->nama;
		$akses_level = $check->akses_level;
		if ($akses_level=="Admin") {
		//create sesssion
		$this->CI->session->set_userdata('id_user',$id_user);
		$this->CI->session->set_userdata('nama',$nama);
		$this->CI->session->set_userdata('username',$username);
		$this->CI->session->set_userdata('akses_level',$akses_level);

		
			
		
		// redirect ke halaman admin
		redirect(base_url('admin/barang'),'refresh');
}else if($akses_level=="Kasir"){
	$this->CI->session->set_userdata('id_user',$id_user);
		$this->CI->session->set_userdata('nama',$nama);
		$this->CI->session->set_userdata('username',$username);
		$this->CI->session->set_userdata('akses_level',$akses_level);

		
			
		
		// redirect ke halaman admin
		redirect(base_url('kasir/kasir'),'refresh');
}else if($akses_level=="Pimpinan"){
	$this->CI->session->set_userdata('id_user',$id_user);
		$this->CI->session->set_userdata('nama',$nama);
		$this->CI->session->set_userdata('username',$username);
		$this->CI->session->set_userdata('akses_level',$akses_level);

		
			
		
		// redirect ke halaman admin
		redirect(base_url('pimpinan/pimpinan'),'refresh');
	}else if($akses_level=="Tenagakerja"){
	$this->CI->session->set_userdata('id_user',$id_user);
		$this->CI->session->set_userdata('nama',$nama);
		$this->CI->session->set_userdata('username',$username);
		$this->CI->session->set_userdata('akses_level',$akses_level);

		
			
		
		// redirect ke halaman admin
		redirect(base_url('mitra/berita'),'refresh');
}else{
	$this->CI->session->set_flashdata('warning','username atau password salah');
				redirect(base_url('login'),'refresh');
}
	}else{
				$this->CI->session->set_flashdata('warning','username atau password salah');
				redirect(base_url('login'),'refresh');
	}

	}
public function cek_login()
{
	// memeriksa apakah sesionya sudah ada?

	if($this->CI->session->userdata('username')==""){
		$this->CI->session->set_flashdata('warning','anda belum login');
				redirect(base_url('login'),'refresh');
	}



}

public function cek_login_kasir()
{
	// memeriksa apakah sesionya sudah ada?

	if($this->CI->session->userdata('akses_level')!="Kasir"){
		$this->CI->session->set_flashdata('warning','anda belum login');
				redirect(base_url('login'),'refresh');
	}



}
public function cek_login_admin()
{
	// memeriksa apakah sesionya sudah ada?

	if($this->CI->session->userdata('akses_level')!="Admin"){
		$this->CI->session->set_flashdata('warning','anda belum login');
				redirect(base_url('login'),'refresh');
	}



}
public function cek_login_pimpinan()
{
	// memeriksa apakah sesionya sudah ada?

	if($this->CI->session->userdata('akses_level')!="Pimpinan"){
		$this->CI->session->set_flashdata('warning','anda belum login');
				redirect(base_url('login'),'refresh');
	}



}
// fungsi logout

public function logout()
{
	// MEMBUANG session
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');



$this->CI->session->set_flashdata('sukses','anda berhasil logout');
				redirect(base_url('login'),'refresh');
}

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
