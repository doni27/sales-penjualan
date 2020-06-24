<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('user_model');


	 
}

	public function index()
	{
			
		$user = $this->user_model->listing();
		$data = array('title' => 'Data Pengguna',
						'user' => $user,
						'isi'	=> 'admin/user/list'
		 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah user

	public function tambah(){

		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama Lengkap','required',
			 array('required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' => '$s harus di isi',
					'valid_email' => '$s tidak valid'));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
			array('required' => '%s harus diisi',
					'min_length' => '%s minimal 6',
					'max_length' => '%s maksimal 32 karakter',
					'is_unique'  => '$s sudah ada. buat username yang baru'	)); 				  

		$valid->set_rules('password', 'Password ','required',
			 array('required' => '%s harus diisi'));



		if($valid->run()===FALSE){

		$data = array('title' => 'Tambah Pengguna',
							'isi' => 'admin/user/tambah' );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array('nama'    => $i->post('nama'),
						'email'    => $i->post('email'),
						'username'    => $i->post('username'),
						'password'    =>SHA1($i->post('password')),
						'akses_level'    => $i->post('akses_level')	
		);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');



		}}





		//tambah edit

	public function edit($id_user){

		$user= $this->user_model->detail($id_user);

		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama Lengkap','required',
			 array('required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' => '$s harus di isi',
					'valid_email' => '$s tidak valid'));
			  

		$valid->set_rules('password', 'Password ','required',
			 array('required' => '%s harus diisi'));



		if($valid->run()===FALSE){

		$data = array('title' => 'Edit Pengguna',
						'user' => $user,
							'isi' => 'admin/user/edit' );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(
								'id_user' => $id_user,
						'nama'    => $i->post('nama')	
		);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah edit');
			redirect(base_url('admin/user'),'refresh');		}}








			// masuk database
		public function delete($id_user)
		{
			
			$data = array('id_user' => $id_user);

			$this->user_model->delete($data);
			$this->session->set_flashdata('sukses','Data telah dihapus');
			redirect(base_url('admin/user'),'refresh');
	
		}

		
public function cetak(){
	$user = $this->user_model->listing();

   // $tgl_awal = $this->input->post('tgl_awal');
   // $tgl_akhir = $this->input->post('tgl_akhir');
   
   $data = array('title' => 'Data Laporan', 
       
   
               'user' =>  $user 
                            );
                            $mpdf = new \Mpdf\Mpdf();
                            $mpdf->SetHTMLHeader('
                <div style="text-align: left; font-weight: bold;">
                   <img src="'.base_url('assets/upload/image/').'" style="height:50px; width=auto;">
                </div>');
                $mpdf->SetHTMLFooter('
                    <div style=" 10px 20px; background-color: black; color: white; font-size: 12px; ">
                   
                        
                    </div>
                ');
                // Wr
   // Write some HTML code:
           $html = $this->load->view('admin/user/cetak', $data, true);
   
   
   $mpdf->WriteHTML($html);
   
   // Outputtampil dengan nama baru
   $nama_file_pdf = url_title(cetak, 'dash', 'true').'.pdf';
   $mpdf->Output($nama_file_pdf, 'I');
       }


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */
