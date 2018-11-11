<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

		$this->data['id_pengguna']	= $this->session->userdata('id_pengguna');
		$this->data['email']		= $this->session->userdata('email');
		$this->data['id_role']		= $this->session->userdata('id_role');

		if (!isset($this->data['id_pengguna'], $this->data['email'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 1)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai admin untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('pengguna_m');
		$this->load->model('kota_kabupaten_m');
		$this->data['pengguna']	= $this->pengguna_m->get(['id_role' => 2]);
		$this->data['kota']		= $this->kota_kabupaten_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function daftar_pengguna()
	{
		$this->load->model('pengguna_m');
		$this->data['id_pengguna'] = $this->uri->segment(3);
		if (isset($this->data['id_pengguna']))
		{
			$this->pengguna_m->delete($this->data['id_pengguna']);
			$this->flashmsg('Data pengguna berhasil dihapus');
			redirect('admin/daftar-pengguna');
		}
		$this->data['pengguna']	= $this->pengguna_m->get_admin_dinkes();
		$this->data['title']	= 'Daftar Pengguna';
		$this->data['content']	= 'daftar_pengguna';
		$this->template($this->data, $this->module);
	}

	public function daftar_kota()
	{
		$this->load->model('kota_kabupaten_m');
		$this->data['id_kota_kabupaten'] = $this->uri->segment(3);
		if (isset($this->data['id_kota_kabupaten']))
		{
			$this->kota_kabupaten_m->delete($this->data['id_kota_kabupaten']);
			$this->flashmsg('Data kota kabupaten berhasil dihapus');
			redirect('admin/daftar-kota');
		}

		$this->data['kota']	= $this->kota_kabupaten_m->get();
		$this->data['title']	= 'Daftar Kota / Kabupaten';
		$this->data['content']	= 'daftar_kota';
		$this->template($this->data, $this->module);
	}

	public function tambah_kota()
	{
		if ($this->POST('submit'))
		{
			$this->load->model('kota_kabupaten_m');
			$this->data['kota'] = [
				'kota_kabupaten'	=> $this->POST('kota_kabupaten'),
				'latitude'			=> $this->POST('latitude'),
				'longitude'			=> $this->POST('longitude')
			];
			$this->kota_kabupaten_m->insert($this->data['kota']);
			$this->flashmsg('Data kota/kabupaten berhasil ditambah');
			redirect('admin/tambah-kota');
		}

		$this->data['title']	= 'Form Penambahan Data Kota';
		$this->data['content']	= 'tambah_kota';
		$this->template($this->data, $this->module);
	}

	public function tambah_pengguna()
	{
		if ($this->POST('submit'))
		{
			$password 	= $this->POST('password');
			$rpassword	= $this->POST('rpassword');
			if ($password !== $rpassword)
			{
				$this->flashmsg('Kolom password dan password lagi harus sama', 'danger');
				redirect('admin/tambah-pengguna');
			}

			$this->load->model('pengguna_m');
			$this->load->model('admin_dinkes_m');

			$this->data['pengguna'] = [
				'nama'		=> $this->POST('nama'),
				'kontak'	=> $this->POST('kontak'),
				'email'		=> $this->POST('email'),
				'password'	=> md5($password),
				'id_role'	=> 2
			];
			$this->pengguna_m->insert($this->data['pengguna']);
			$id_pengguna = $this->db->insert_id();

			$this->admin_dinkes_m->insert([
				'id_pengguna'		=> $id_pengguna,
				'id_kota_kabupaten'	=> $this->POST('id_kota_kabupaten')
			]);

			$this->flashmsg('Data pengguna berhasil ditambah');
			redirect('admin/tambah-pengguna');
		}

		$this->load->model('kota_kabupaten_m');
		$this->data['kota']		= $this->kota_kabupaten_m->get();
		$this->data['title']	= 'Form Penambahan Pengguna';
		$this->data['content']	= 'tambah_pengguna';
		$this->template($this->data, $this->module);
	}

	public function dashboard_fts()
	{
		echo 'dashboard fts';
	}
}