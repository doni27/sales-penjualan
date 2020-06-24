<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('user_model');
	$this->load->model('barang_model');
	$this->load->model('stok_model');
	 
}

	public function index()
	{
			
		$user = $this->barang_model->listing();
		$data = array('title' => 'Data Barang',
						'user' => $user,
						'isi'	=> 'admin/barang/list'
		 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function ambildata()
	{
			
		$user = $this->barang_model->ambildata('barang')->result();
		echo json_encode($user);
	}


	//tambah user

	public function tambah(){

		//validasi input
		$barang = $this->stok_model->listing();
	

		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama barang','required',
			 array('required' => '%s harus diisi'));

		


		if($valid->run()===FALSE){

		$data = array('title' => 'Tambah barang',
		'barang' => $barang,
							'isi' => 'admin/barang/tambah' );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			
			$data = array('nama'    => $i->post('nama'),
						'harga'    => $i->post('harga'),
						
						'stok'    => $i->post('stok')	
		);
			$this->barang_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/barang'),'refresh');



		}}





		//tambah edit

	public function edit($id_user){

		$user= $this->barang_model->detail($id_user);

		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama Lengkap','required',
			 array('required' => '%s harus diisi'));

	




		if($valid->run()===FALSE){

		$data = array('title' => 'Edit Barang',
						'user' => $user,
							'isi' => 'admin/barang/edit' );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(
				'id_barang' => $id_user,
			'nama'    => $i->post('nama'),
			'harga'    => $i->post('harga'),
			
			'stok'    => $i->post('stok')
		);
			$this->barang_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah edit');
			redirect(base_url('admin/barang'),'refresh');		}}
			// masuk database
		public function delete($id_barang)
		{	
			$data = array('id_barang' => $id_barang);

			$this->barang_model->delete($data);
			$this->session->set_flashdata('sukses','Data telah dihapus');
			redirect(base_url('admin/barang'),'refresh');
	
		}


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */
