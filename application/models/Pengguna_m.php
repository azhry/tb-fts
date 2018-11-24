<?php 

class Pengguna_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'pengguna';
		$this->data['primary_key']	= 'id_pengguna';
	}

	public function login($data)
	{
		$pengguna = $this->get_row(['email' => $data['email'], 'password' => $data['password']]);
		if (isset($pengguna))
		{
			$this->session->set_userdata([
				'id_pengguna' 	=> $pengguna->id_pengguna,
				'email'			=> $pengguna->email,
				'id_role'		=> $pengguna->id_role
			]);
			return $pengguna;
		}

		return null;
	}

	public function get_admin_dinkes()
	{
		$this->db->select('*')
			->from($this->data['table_name'])
			->join('admin_dinkes', $this->data['table_name'] . '.id_pengguna = admin_dinkes.id_pengguna')
			->join('kota_kabupaten', 'admin_dinkes.id_kota_kabupaten = kota_kabupaten.id_kota_kabupaten')
			->where(['pengguna.id_role' => 2]);
		$query = $this->db->get();
		return $query->result();
	}
}