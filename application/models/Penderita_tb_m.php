<?php 

class Penderita_tb_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'penderita_tb';
		$this->data['primary_key']	= 'id';
	}
}