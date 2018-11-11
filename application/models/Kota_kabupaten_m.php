<?php 

class Kota_kabupaten_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'kota_kabupaten';
		$this->data['primary_key']	= 'id_kota_kabupaten';
	}
}