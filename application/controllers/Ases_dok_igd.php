<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ases_dok_igd extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Kasir');
	}

	public function index()
	{
		echo "Page is not accessible";
	}

	public function print_out()
	{
		$data['page_title'] = "Assesmen Dokter IGD";
		$this->load->view('print/ases_dok_igd', $data);
	}

	public function update()
	{
		$page_data = $this->db->query("SELECT v.* , l.nama
		FROM tindakan_poli_fisio v,pelayanan b, list_tindakan_poli_fisio l 
		where v.id_pelayanan = b.id_pelayanan and  v.id_list_tindakan = l.id_list_tindakan 
		and l.status = 'AKTIF' and v.id_pelayanan='pl_190666' and (b.cara_bayar ='333' or b.cara_bayar ='31')")->result();
		for ($i = 0; $i < count($page_data); $i++) {
			$master = $this->db->get_where('list_tindakan_poli_fisio',['status'=>'LAMA','nama'=>$page_data[$i]->nama,'tipe_kamar'=>'KELAS III'])->row();
			echo $master->harga_sarana + $master->harga_jasa.' ,'.$page_data[$i]->id_tindakan;
			if(isset($master->nama)){
				$harga = $master->harga_sarana + $master->harga_jasa;
				$data = array(

					'harga' => $harga,
					'total' => $harga * $page_data[$i]->frek,
				);
				$where = array(
					'id_tindakan' => $page_data[$i]->id_tindakan,
				);
				$this->M_Kasir->update_tindakan($data, $where, 'tindakan_poli_fisio');
			}else{
				echo $page_data[$i]->id_tindakan .'<br>';
			}
			
		}
		echo "selesai";
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ases_dok_igd extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Kasir');
	}

	public function index()
	{
		echo "Page is not accessible";
	}

	public function print_out()
	{
		$data['page_title'] = "Assesmen Dokter IGD";
		$this->load->view('print/ases_dok_igd', $data);
	}

	public function update()
	{
		$page_data = $this->db->query("SELECT v.* , l.nama
		FROM tindakan_poli_fisio v,pelayanan b, list_tindakan_poli_fisio l 
		where v.id_pelayanan = b.id_pelayanan and  v.id_list_tindakan = l.id_list_tindakan 
		and l.status = 'AKTIF' and v.id_pelayanan='pl_190666' and (b.cara_bayar ='333' or b.cara_bayar ='31')")->result();
		for ($i = 0; $i < count($page_data); $i++) {
			$master = $this->db->get_where('list_tindakan_poli_fisio',['status'=>'LAMA','nama'=>$page_data[$i]->nama,'tipe_kamar'=>'KELAS III'])->row();
			echo $master->harga_sarana + $master->harga_jasa.' ,'.$page_data[$i]->id_tindakan;
			if(isset($master->nama)){
				$harga = $master->harga_sarana + $master->harga_jasa;
				$data = array(

					'harga' => $harga,
					'total' => $harga * $page_data[$i]->frek,
				);
				$where = array(
					'id_tindakan' => $page_data[$i]->id_tindakan,
				);
				$this->M_Kasir->update_tindakan($data, $where, 'tindakan_poli_fisio');
			}else{
				echo $page_data[$i]->id_tindakan .'<br>';
			}
			
		}
		echo "selesai";
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
