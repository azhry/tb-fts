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

	public function akurasi_peramalan()
	{
		$this->load->model('record_peramalan_m');
		$this->load->model('kota_kabupaten_m');
		$this->data['record']	= $this->record_peramalan_m->get();
		$this->data['title']	= 'Akurasi Peramalan';
		$this->data['content']	= 'akurasi_peramalan';
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

	public function daftar_penderita($id_kota="",$id_hapus=""){
		$this->load->model('penderita_tb_m');
		$this->load->model('kota_kabupaten_m');
		$this->data['penderita']	= $this->penderita_tb_m->get(['id_kota_kabupaten' => $id_kota]);
		$this->data['id_kota']      = $id_kota;
		$this->data['nama_kota']	= $this->kota_kabupaten_m->get_row(["id_kota_kabupaten" => $id_kota]);
		if(empty($this->data['nama_kota'])){
            $this->data['nama_kota'] = "Pilih Kota penderita TB";
		}else{
			$this->data['nama_kota'] = "Data penderita TB ".$this->data['nama_kota']->kota_kabupaten;
		}
		if(!empty($id_hapus)){
             $this->penderita_tb_m->delete($id_hapus);
             $this->flashmsg('Data penderita tb'.$this->data['nama_kota'].' berhasil dihapus');
             redirect('admin/daftar_penderita/'.$id_kota);
		}

		$this->data['kota']		= $this->kota_kabupaten_m->get();
		$this->data['title']	= 'Daftar Penderita';
		$this->data['content']	= 'daftar_penderita';
		$this->template($this->data, $this->module);
	}

	public function tambah_data_penderita($id_kota="")
	{
		$this->load->model('kota_kabupaten_m');
		if(!empty($id_kota)){
           if($this->POST("submit")){
			   $this->load->model('Penderita_tb_m');
	           $this->data['penderita'] = [
	                 "id_kota_kabupaten" => $id_kota,
	                 "jumlah"=>$this->POST("jumlah"),
	                 "tahun"=>$this->POST("tahun"),
	                 "triwulan"=>$this->POST("triwulan")
	           ];
	           $this->Penderita_tb_m->insert($this->data['penderita']);
	           $this->flashmsg('Penderita TB Berhasil Ditambahkan');
	           redirect('admin/daftar_penderita/'.$id_kota);    
    	   }
    	   $this->data['wilayah']	= $this->kota_kabupaten_m->get_row(["id_kota_kabupaten" => $id_kota])->kota_kabupaten;
    	   $this->data['id_kota'] = $id_kota;
 		   $this->data['title'] = 'Form penambahan jumlah penderita TB';
		   $this->data['content'] = 'tambah_penderita';
		   $this->template($this->data, $this->module);
		}else{
           $this->flashmsg('Kota belum dipilih','danger');
           redirect('admin/daftar_penderita/');
		}
	}

	public function hapus_penderita_tb($id,$id_kota){
        $this->load->model('penderita_tb_m');
        $this->load->model('kota_kabupaten_m');
		$this->data['id'] = $this->uri->segment(3);
		$this->data['nama_kota']	= $this->kota_kabupaten_m->get_row(["id_kota_kabupaten" => $id_kota])->kota_kabupaten;
		if (isset($this->data['id']))
		{
			$this->penderita_tb_m->delete($this->data['id']);
			$this->flashmsg('Data penderita tb'.$this->data['nama_kota'].' berhasil dihapus');
			redirect('admin/daftar_penderita/'.$id_kota);
		}
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
		$this->load->model('kota_kabupaten_m');
		$this->data['kota']		= $this->kota_kabupaten_m->get();
		$this->data['title']	= 'Fuzzy Times Series';
		$this->data['content']	= 'dashboard_fts';
		$this->template($this->data, $this->module);
	}

	public function hasil_peramalan_fts(){
		$this->load->model('kota_kabupaten_m');
		if($this->POST('submit')){
		   $tahun = array();  
           $jumlah_penderita = array();
           $hasil_peramlan = array();

           $this->load->library('FuzzyTimeSeries');
           $this->load->model('penderita_tb_m');   
           $result = $this->penderita_tb_m->get_by_double_order("tahun","asc",'triwulan','asc',["id_kota_kabupaten"=>$this->POST('id_kota_kabupaten')]);
           foreach ($result as $row) {
           	  array_push($jumlah_penderita, $row->jumlah);
           	  array_push($tahun, $row->tahun);
           }
           array_push($tahun, ($tahun[sizeof($tahun)-1]+1));
   
           $konfigurasi["D1"] = 0; //TIDAK DIGUNAKAN
	       $konfigurasi["D2"] = 0; //TIDAK DIGUNAKAN
	       $log_hasil_pelatihan = $this->fuzzytimeseries->pelatihan($jumlah_penderita,$konfigurasi);
	     
           array_push($hasil_peramlan, 0);
           for($i=0;$i<sizeof($jumlah_penderita);$i++){
              array_push($hasil_peramlan, $this->fuzzytimeseries->forecast($jumlah_penderita[$i]));
           }

           $this->data['mse'] = $this->setMSE($jumlah_penderita,$hasil_peramlan,$tahun);
           $this->data['mape'] = $this->setMAPE($jumlah_penderita,$hasil_peramlan,$tahun);
           $this->load->model('record_peramalan_m');

           foreach ($this->data['mse'] as $i => $mse)
           {
           		if ((string)$i == 'hasil')
           		{
           			break;
           		}

           		$check_record = $this->record_peramalan_m->get_row(['tahun'	=> $mse['tahun'], 'id_kota_kabupaten' => $this->POST('id_kota_kabupaten')]);
           		$record = [
       				'tahun'				=> $mse['tahun'],
       				'id_kota_kabupaten'	=> $this->POST('id_kota_kabupaten'),
       				'd1'				=> $konfigurasi['D1'],
       				'd2'				=> $konfigurasi['D2'],
       				'aktual'			=> $mse['aktual'],
       				'ramal'				=> $mse['output'],
       				'mse'				=> $mse['selisih'],
       				'mape'				=> $this->data['mape'][$i]['selisih']
       			];
           		if (isset($check_record))
           		{
           			$this->record_peramalan_m->update($check_record->id_peramalan, $record);
           		}
           		else
           		{
           			$this->record_peramalan_m->insert($record);
           		}
           }

           $this->data['peramalan_fts'] = [
              "tahun" => $tahun,
              "data_real" => $jumlah_penderita,
              "data_peramalan" => $hasil_peramlan,
              "wilayah" => $this->kota_kabupaten_m->get(["id_kota_kabupaten"=>$this->POST('id_kota_kabupaten')])[0]->kota_kabupaten,
              "log_pelatihan" => [
                                    "fuzzy_set"        => $log_hasil_pelatihan["fuzzy"],
                                    "jumlah_fuzzy_set" => $log_hasil_pelatihan["counting"],
                                    // "re-divide"        => $log_hasil_pelatihan["redivide"],
                                    "himpunan_fuzzy"   => $log_hasil_pelatihan["himpunan_fuzzy"],
                                    "flr"              => $log_hasil_pelatihan["fuzzy_logical_relationship"],
                                    "flrg"             => $log_hasil_pelatihan["fuzzy_logical_relationship_group"]
              ]
           ];

           // $this->flashmsg('Hasil Peramalan daerah '.$this->data['peramalan_fts']['wilayah']." tahun ".$tahun[0]." sampai ".$tahun[sizeof($tahun)-1]);
		}
		$this->data['kota']		= $this->kota_kabupaten_m->get();
		$this->data['title']	= 'Fuzzy Times Series';
		$this->data['content']	= 'hasil_peramalan_fts';
		$this->data['data_penderita']	= $this->penderita_tb_m->get_by_double_order("tahun","asc","triwulan","asc",["id_kota_kabupaten"=>$this->POST('id_kota_kabupaten')]);
		$this->data['data_kota']	= $this->kota_kabupaten_m->get(["id_kota_kabupaten"=>$this->POST('id_kota_kabupaten')]);
		$this->template($this->data, $this->module);
	}

	public function aksi(){
		var_dump($this->data);
		exit();
	}

	private function setMSE($aktual,$ramal,$tahun){
		$mse = [];
		array_splice($tahun,0,1);
        array_splice($tahun,sizeof($tahun)-1,sizeof($tahun)-1);
	
		array_splice($aktual,0,1);
      
        array_splice($ramal,0,1);
        array_splice($ramal,sizeof($ramal)-1,sizeof($ramal)-1);
     
         
        $sum = 0;
        for($i=0;$i<sizeof($tahun);$i++){
           $mse[$i]["tahun"] = $tahun[$i];
           $mse[$i]["aktual"] = $aktual[$i];
           $mse[$i]["output"] = $ramal[$i];
           $mse[$i]["selisih"] = pow($aktual[$i] - $ramal[$i], 2); 
           $sum = $sum + pow($aktual[$i] - $ramal[$i], 2);
        }

        $mse["hasil"] = $sum / sizeof($tahun);

        return $mse;
	}

	private function setMAPE($aktual,$ramal,$tahun){
		$mape= [];
		array_splice($tahun,0,1);
        array_splice($tahun,sizeof($tahun)-1,sizeof($tahun)-1);
	
		array_splice($aktual,0,1);
      
        array_splice($ramal,0,1);
        array_splice($ramal,sizeof($ramal)-1,sizeof($ramal)-1);
     	
        $sum = 0;
        for($i=0;$i<sizeof($tahun);$i++){
           $mape[$i]["tahun"] = $tahun[$i];
           $mape[$i]["aktual"] = $aktual[$i];
           $mape[$i]["output"] = $ramal[$i];
           $mape[$i]["selisih"] = abs((($aktual[$i] - $ramal[$i])/$aktual[$i])*100) . " %"; 
           $sum = $sum + abs((($aktual[$i] - $ramal[$i])/$aktual[$i])*100);
        }
        $mape["hasil"] = $sum / sizeof($tahun);

        return $mape;
	}
}