<?php 

class Record_peramalan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'record_peramalan';
		$this->data['primary_key']	= 'id_peramalan';
	}
}