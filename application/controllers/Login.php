<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();	
	    $id_pengguna	= $this->session->userdata('id_pengguna');
	    $email 			= $this->session->userdata('email');
	    $id_role		= $this->session->userdata('id_role');
		if (isset($id_pengguna, $email, $id_role))
		{
			switch ($id_role) 
			{
				case 1:
					redirect('admin');
					break;

				case 2:
					redirect('dinkes');
					break;
			}

		}
  	}


  	public function index()
  	{
  		if ($this->POST('login-submit'))
		{
			$this->load->model('pengguna_m');
			if (!$this->pengguna_m->required_input(['email','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
    			'email'		=> $this->POST('email'),
    			'password'	=> md5($this->POST('password'))
			];

			$result = $this->pengguna_m->login($this->data);
			if (!isset($result)) 
			{
				$this->flashmsg('Email atau password salah','danger');
			}
			redirect('login');
			exit;
		}
		$this->data['title'] 		= 'Login';
		$this->data['global_title'] = $this->title;
		$this->load->view('login',$this->data);
	}
}
