<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinkes extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'dinkes';

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
		echo 'Form penambahan data penderita sesuai dengan id kota kabupaten';
	}
}