<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinkes extends MY_Controller
{
	private $wilayah;

	public function __construct()
	{
		parent::__construct();
		$this->module = 'dinkes';
        $this->load->model('Kota_kabupaten_m');
		$this->data['id_pengguna']	= $this->session->userdata('id_pengguna');
		$this->data['email']		= $this->session->userdata('email');
		$this->data['id_role']		= $this->session->userdata('id_role');

		if (!isset($this->data['id_pengguna'], $this->data['email'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 2)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai dinas kesehatan untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}

		$this->load->model('admin_dinkes_m');
		$this->data['admin'] = $this->admin_dinkes_m->get_row(['id_pengguna' => $this->data['id_pengguna']]);
		if (!isset($this->data['admin']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai dinas kesehatan untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
		$this->wilayah = $this->Kota_kabupaten_m->get_row(['id_kota_kabupaten'=>$this->data['admin']->id_kota_kabupaten]);
		$this->data['wilayah'] = $this->wilayah->kota_kabupaten;
	}

	public function index()
	{
		$this->load->model('penderita_tb_m');
		$this->data['penderita']	= $this->penderita_tb_m->get(['id_kota_kabupaten' => $this->data['admin']->id_kota_kabupaten]);
		$this->data['title']		= 'Dashboard';
		$this->data['content']		= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_penderita_tb()
	{
		$this->load->model('penderita_tb_m');
		$this->data['id'] = $this->uri->segment(3);
		if (isset($this->data['id']))
		{
			$this->penderita_tb_m->delete($this->data['id']);
			$this->flashmsg('Data penderita berhasil dihapus');
			redirect('dinkes/data-penderita-tb');
		}

		$this->data['penderita']	= $this->penderita_tb_m->get(['id_kota_kabupaten' => $this->data['admin']->id_kota_kabupaten]);
		$this->data['title']		= 'Data Penderita TB';
		$this->data['content']		= 'data_penderita_tb';
		$this->template($this->data, $this->module);
	}

	public function tambah_data_penderita()
	{
		if($this->POST("submit")){
			$this->load->model('Penderita_tb_m');
           $this->data['penderita'] = [
                 "id_kota_kabupaten" => $this->wilayah->id_kota_kabupaten,
                 "jumlah"=>$this->POST("jumlah"),
                 "tahun"=>$this->POST("tahun")
           ];
           $this->Penderita_tb_m->insert($this->data['penderita']);
           $this->flashmsg('Penderita TB Berhasil Ditambahkan');
		}
		$this->data['title'] = 'Form penambahan jumlah penderita TB';
		$this->data['content'] = 'tambah_penderita';
		$this->template($this->data, $this->module);

	}
}