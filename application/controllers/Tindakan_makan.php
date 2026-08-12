<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan_makan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		setlocale(LC_ALL, 'id_ID');
		$this->load->model('M_Poli');
	}


	public function getListMakan()
	{
/* 		$data = $this->db->get_where('list_tindakan_poli_kia', ['status' => 'AKTIF'])->result();

 */
		$data = $this->db->get_where('list_tindakan_apelkes', ['nama' => 'Biaya Makan Pendamping'])->result();
/* 		$data = $this->M_Poli->getListMakan();
 */
		echo json_encode($data);
	}

	public function insert()
	{
		$staff = $this->session->userdata('data_auth');

		$harga = $this->input->post('harga');
		$id_list_tindakan = $this->input->post('id_list_tindakan');
		$frek = $this->input->post('frek');
		$total = $this->input->post('total');
		

		$id_pelayanan = $this->input->post('id_pel_rad');
		$id_history = $this->input->post('id_his_rad');
		$dokter = $this->db->get_where('list_dokter', ['id_pelayanan' => $id_pelayanan])->row();
		$id_dokter = null; 
		if (empty($dokter)){
			$id_dokter = "-";
		}else{
			$id_dokter = $dokter['id_dokter'];

		}


		$poli = $this->db->query("SELECT l.nama_panjang from history_pelayanan h, list_poli l where h.nama_poli = l.id_list_poli and h.nama_poli ='$id_history'")->row();

		$jenis_pelayanan = explode('_', $id_history);
		if ($jenis_pelayanan[0] == "ranap") {
			$kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
			$tipe = $kamar;
			$pel = 'RAWAT INAP';
			// $depo=''
		} else if ($jenis_pelayanan[0] == "his") {
			$tipe = "NON";
			$pel = 'POLI';
		} else {
			$tipe = "NON";
			$pel = 'IGD';
		}


		$data = array(
			'id_tindakan_apelkes' => uniqid(),
			'harga' => $harga,
			'frek' => $frek,
			'id_pelayanan' => $id_pelayanan,
			'tipe' => $tipe,
			'id_dokter' => $id_dokter,
			'id_list_tindakan' => $id_list_tindakan,
			'total' => $total,
			'tanggal' => date("Y-m-d H:i:s"),
			'id_staff' => $staff->id_staff,
		);

		$this->M_Poli->insert_tindakan($data, 'tindakan_apelkes');
		$out['status'] = "success";


		echo json_encode($out);
	}

	public function hapus()
	{
		$id_tindakan = $this->input->post('id_tindakan_apelkes');
		$this->M_Poli->delete_tindakan($id_tindakan, 'tindakan_apelkes', 'id_tindakan_apelkes');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function tampil_list_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        
        $id_pelayanan = $this->input->post('id');
        $page_data = $this->db->query("SELECT t.*,l.nama,s.nama nama_staff from
		list_tindakan_apelkes l, tindakan_apelkes t,staff s
		where l.id_list_tindakan_apelkes = t.id_list_tindakan and s.id_staff = t.id_staff and t.id_pelayanan = '$id_pelayanan'")->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_makan(\"" . $page_data[$i]->id_tindakan_apelkes . "\",\"" . $id_pelayanan . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama_tindakan = $page_data[$i]->nama;
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $nama_staff = $page_data[$i]->nama_staff;
            $tanggal_pel = $page_data[$i]->tanggal;
            // $status = $page_data[$i]->status_pembayaran=='tidak'?'TIDAK DITANGGUNG':strtoupper($page_data[$i]->status_pembayaran);

            $out[$i] = array($no, $tombol , $nama_tindakan,$harga, $frek, $total,$tanggal_pel, $nama_staff);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
	public function tampil_total_harga()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->db->query("SELECT sum(t.total) total from
		list_tindakan_apelkes l, tindakan_apelkes t
		where l.id_list_tindakan_apelkes = t.id_list_tindakan and t.id_pelayanan = '$id_pelayanan'")->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $total  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($total);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan_makan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		setlocale(LC_ALL, 'id_ID');
		$this->load->model('M_Poli');
	}


	public function getListMakan()
	{
/* 		$data = $this->db->get_where('list_tindakan_poli_kia', ['status' => 'AKTIF'])->result();

 */
		$data = $this->db->get_where('list_tindakan_apelkes', ['nama' => 'Biaya Makan Pendamping'])->result();
/* 		$data = $this->M_Poli->getListMakan();
 */
		echo json_encode($data);
	}

	public function insert()
	{
		$staff = $this->session->userdata('data_auth');

		$harga = $this->input->post('harga');
		$id_list_tindakan = $this->input->post('id_list_tindakan');
		$frek = $this->input->post('frek');
		$total = $this->input->post('total');
		

		$id_pelayanan = $this->input->post('id_pel_rad');
		$id_history = $this->input->post('id_his_rad');
		$dokter = $this->db->get_where('list_dokter', ['id_pelayanan' => $id_pelayanan])->row();
		$id_dokter = null; 
		if (empty($dokter)){
			$id_dokter = "-";
		}else{
			$id_dokter = $dokter['id_dokter'];

		}


		$poli = $this->db->query("SELECT l.nama_panjang from history_pelayanan h, list_poli l where h.nama_poli = l.id_list_poli and h.nama_poli ='$id_history'")->row();

		$jenis_pelayanan = explode('_', $id_history);
		if ($jenis_pelayanan[0] == "ranap") {
			$kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
			$tipe = $kamar;
			$pel = 'RAWAT INAP';
			// $depo=''
		} else if ($jenis_pelayanan[0] == "his") {
			$tipe = "NON";
			$pel = 'POLI';
		} else {
			$tipe = "NON";
			$pel = 'IGD';
		}


		$data = array(
			'id_tindakan_apelkes' => uniqid(),
			'harga' => $harga,
			'frek' => $frek,
			'id_pelayanan' => $id_pelayanan,
			'tipe' => $tipe,
			'id_dokter' => $id_dokter,
			'id_list_tindakan' => $id_list_tindakan,
			'total' => $total,
			'tanggal' => date("Y-m-d H:i:s"),
			'id_staff' => $staff->id_staff,
		);

		$this->M_Poli->insert_tindakan($data, 'tindakan_apelkes');
		$out['status'] = "success";


		echo json_encode($out);
	}

	public function hapus()
	{
		$id_tindakan = $this->input->post('id_tindakan_apelkes');
		$this->M_Poli->delete_tindakan($id_tindakan, 'tindakan_apelkes', 'id_tindakan_apelkes');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function tampil_list_tindakan()
    {
        $data = $this->session->userdata('data_auth');
        
        $id_pelayanan = $this->input->post('id');
        $page_data = $this->db->query("SELECT t.*,l.nama,s.nama nama_staff from
		list_tindakan_apelkes l, tindakan_apelkes t,staff s
		where l.id_list_tindakan_apelkes = t.id_list_tindakan and s.id_staff = t.id_staff and t.id_pelayanan = '$id_pelayanan'")->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {

            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_makan(\"" . $page_data[$i]->id_tindakan_apelkes . "\",\"" . $id_pelayanan . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";

            $no = $i + 1;
            $nama_tindakan = $page_data[$i]->nama;
            $harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
            $frek = $page_data[$i]->frek;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $nama_staff = $page_data[$i]->nama_staff;
            $tanggal_pel = $page_data[$i]->tanggal;
            // $status = $page_data[$i]->status_pembayaran=='tidak'?'TIDAK DITANGGUNG':strtoupper($page_data[$i]->status_pembayaran);

            $out[$i] = array($no, $tombol , $nama_tindakan,$harga, $frek, $total,$tanggal_pel, $nama_staff);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
	public function tampil_total_harga()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->db->query("SELECT sum(t.total) total from
		list_tindakan_apelkes l, tindakan_apelkes t
		where l.id_list_tindakan_apelkes = t.id_list_tindakan and t.id_pelayanan = '$id_pelayanan'")->result();

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $total  = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $out[$i] = array($total);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
