<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}




	public function totaltransaksi(){
		$this->db->select('COUNT(id_transaksi) AS transaksi');
		$this->db->from('transaksi');	
		$query = $this->db->get();
		return $query->row();
	}



	public function totalkeranjang(){
		$this->db->select('COUNT(id_keranjang) AS keranjang');
		$this->db->from('keranjang');	
		$query = $this->db->get();
		return $query->row();
	}
	public function totalbarang(){
		$this->db->select('COUNT(id_barang) AS barang');
		$this->db->from('barang');	
		$query = $this->db->get();
		return $query->row();
	}

	public function totalstok(){
		$this->db->select('COUNT(id_stok) AS stok');
		$this->db->from('stok');	
		$query = $this->db->get();
		return $query->row();
	}

	public function total_jumlah()
	{
	$this->db->select('SUM(total) AS totaljumlah' );
		$this->db->from('penjualan');
		
		
		$query = $this->db->get();
		return $query->row();
	}


	
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('transaksi');

		// $this->db->select('produk.*,users.nama, kategori.nama_kategori, kategori.slug_kategori, COUNT(gambar.id_gambar) AS total_gambar');
		// $this->db->from('produk');
		// // join
		$this->db->join('barang', 'barang.id_barang = transaksi.id_barang', 'left');





		$this->db->order_by('id_transaksi','desc');
		$query = $this->db->get();
		return $query->result();

		
	}

	public function laporan()
	{
		$tanggal=date('m');
	$this->db->select('*');
		$this->db->from('transaksi');
		
		$this->db->where('month(tanggal)', $tanggal);
		$query = $this->db->get();
		return $query->result();
	}
	public function detail($id_barang)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_barang);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function tambah($data)
	{
		$this->db->insert('transaksi', $data);


	}
	public function keranjang($data)
	{
		$this->db->insert('keranjang', $data);


	}
	
	
	public function keranjang_listing($id_barang)
	{
		$this->db->select('*');
		$this->db->from('keranjang');
		$this->db->where('no_transaksi', $id_barang);
		$this->db->order_by('id_keranjang', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function edit($data){

		$this->db->where('id_transaksi',$data['id_transaksi']);
		$this->db->update('transaksi',$data);
	}
	public function delete($data)
	{

		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('transaksi',$data);
	}
	public function delete_keranjang($data)
	{

		$this->db->where('id_keranjang', $data['id_keranjang']);
		$this->db->delete('keranjang',$data);
	}

	public function total_keranjang($id)
	{
		$tanggal=date('Y');
	$this->db->select('SUM(total) AS berat' );
		$this->db->from('keranjang');
		
		$this->db->where('no_transaksi', $id);
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
