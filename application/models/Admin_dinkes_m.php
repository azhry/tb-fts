<?php 

class Admin_dinkes_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'admin_dinkes';
		$this->data['primary_key']	= 'id_admin';
	}
}