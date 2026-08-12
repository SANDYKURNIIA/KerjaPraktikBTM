<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penunjang_lain extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		setlocale(LC_ALL, 'id_ID');
		$this->load->model('M_Poli');
	}


	public function getListLain()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$cara_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->cara_bayar;

		if ($cara_bayar == '333' ||  $cara_bayar == '31') {
			$data = $this->db->get_where('list_tindakan_apelkes', ['tipe_kamar' => 'KELAS III', 'kelompok' => 'PENUNJANG', 'status' => 'LAMA'])->result();
		} else {
			$data = $this->db->get_where('list_tindakan_apelkes', ['tipe_kamar' => 'KELAS III', 'kelompok' => 'PENUNJANG', 'status' => 'AKTIF'])->result();
		}


		echo json_encode($data);
	}
	public function insert()
	{
		$staff = $this->session->userdata('data_auth');

		$harga = $this->input->post('harga');
		$id_list_tindakan = $this->input->post('id_list_tindakan');
		$frek = $this->input->post('frek');
		$total = $this->input->post('total');
		$dokter = $this->input->post('dokter');

		$id_pelayanan = $this->input->post('id_pel_rad');
		$id_history = $this->input->post('id_his_rad');

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
			'id_tindakan' => uniqid(),
			'harga' => $harga,
			'frek' => $frek,
			'id_pelayanan' => $id_pelayanan,
			'poli' => $id_history,
			'jenis_pelayanan' => $pel,
			'tipe' => $tipe,
			'id_list_tindakan' => $id_list_tindakan,
			'total' => $total,
			'tanggal' => date("Y-m-d H:i:s"),
			'id_dokter' => $dokter,
			'id_staff' => $staff->id_staff,
			'status_pembayaran' => $this->input->post('status_pembayaran'),
		);

		$this->M_Poli->insert_tindakan($data, 'tindakan_penunjang_lain');
		$out['status'] = "success";


		echo json_encode($out);
	}

	public function hapus()
	{
		$id_tindakan_radiologi = $this->input->post('id_tindakan');
		$this->M_Poli->delete_tindakan($id_tindakan_radiologi, 'tindakan_penunjang_lain', 'id_tindakan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function tampil_list_tindakan()
	{
		$data = $this->session->userdata('data_auth');

		$id_pelayanan = $this->input->post('id');
		$page_data = $this->db->query("SELECT t.*,l.nama,s.nama nama_staff from
		list_tindakan_apelkes l, tindakan_penunjang_lain t,staff s
		where l.id_list_tindakan_apelkes = t.id_list_tindakan and s.id_staff = t.id_staff and t.id_pelayanan = '$id_pelayanan'")->result();

		$out = null;

		for ($i = 0; $i < count($page_data); $i++) {

			$tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_lain(\"" . $page_data[$i]->id_tindakan . "\",\"" . $id_pelayanan . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";

			$no = $i + 1;
			$nama_tindakan = $page_data[$i]->nama;
			$harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
			$frek = $page_data[$i]->frek;
			$total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
			$nama_staff = $page_data[$i]->nama_staff;
			$tanggal_pel = $page_data[$i]->tanggal;
			// $status = $page_data[$i]->status_pembayaran=='tidak'?'TIDAK DITANGGUNG':strtoupper($page_data[$i]->status_pembayaran);

			$out[$i] = array($no, $tombol, $nama_tindakan, $harga, $frek, $total, $tanggal_pel, $nama_staff);
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
		list_tindakan_apelkes l, tindakan_penunjang_lain t
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

class Penunjang_lain extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		setlocale(LC_ALL, 'id_ID');
		$this->load->model('M_Poli');
	}


	public function getListLain()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$cara_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->cara_bayar;

		if ($cara_bayar == '333' ||  $cara_bayar == '31') {
			$data = $this->db->get_where('list_tindakan_apelkes', ['tipe_kamar' => 'KELAS III', 'kelompok' => 'PENUNJANG', 'status' => 'LAMA'])->result();
		} else {
			$data = $this->db->get_where('list_tindakan_apelkes', ['tipe_kamar' => 'KELAS III', 'kelompok' => 'PENUNJANG', 'status' => 'AKTIF'])->result();
		}


		echo json_encode($data);
	}
	public function insert()
	{
		$staff = $this->session->userdata('data_auth');

		$harga = $this->input->post('harga');
		$id_list_tindakan = $this->input->post('id_list_tindakan');
		$frek = $this->input->post('frek');
		$total = $this->input->post('total');
		$dokter = $this->input->post('dokter');

		$id_pelayanan = $this->input->post('id_pel_rad');
		$id_history = $this->input->post('id_his_rad');

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
			'id_tindakan' => uniqid(),
			'harga' => $harga,
			'frek' => $frek,
			'id_pelayanan' => $id_pelayanan,
			'poli' => $id_history,
			'jenis_pelayanan' => $pel,
			'tipe' => $tipe,
			'id_list_tindakan' => $id_list_tindakan,
			'total' => $total,
			'tanggal' => date("Y-m-d H:i:s"),
			'id_dokter' => $dokter,
			'id_staff' => $staff->id_staff,
			'status_pembayaran' => $this->input->post('status_pembayaran'),
		);

		$this->M_Poli->insert_tindakan($data, 'tindakan_penunjang_lain');
		$out['status'] = "success";


		echo json_encode($out);
	}

	public function hapus()
	{
		$id_tindakan_radiologi = $this->input->post('id_tindakan');
		$this->M_Poli->delete_tindakan($id_tindakan_radiologi, 'tindakan_penunjang_lain', 'id_tindakan');
		$out['status'] = "success";
		echo json_encode($out);
	}
	public function tampil_list_tindakan()
	{
		$data = $this->session->userdata('data_auth');

		$id_pelayanan = $this->input->post('id');
		$page_data = $this->db->query("SELECT t.*,l.nama,s.nama nama_staff from
		list_tindakan_apelkes l, tindakan_penunjang_lain t,staff s
		where l.id_list_tindakan_apelkes = t.id_list_tindakan and s.id_staff = t.id_staff and t.id_pelayanan = '$id_pelayanan'")->result();

		$out = null;

		for ($i = 0; $i < count($page_data); $i++) {

			$tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_lain(\"" . $page_data[$i]->id_tindakan . "\",\"" . $id_pelayanan . "\",\"" . $page_data[$i]->nama .  "\")' '><i class='fa fa-trash '></i></button>";

			$no = $i + 1;
			$nama_tindakan = $page_data[$i]->nama;
			$harga = "Rp " . number_format($page_data[$i]->harga, 0, ',', '.');
			$frek = $page_data[$i]->frek;
			$total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
			$nama_staff = $page_data[$i]->nama_staff;
			$tanggal_pel = $page_data[$i]->tanggal;
			// $status = $page_data[$i]->status_pembayaran=='tidak'?'TIDAK DITANGGUNG':strtoupper($page_data[$i]->status_pembayaran);

			$out[$i] = array($no, $tombol, $nama_tindakan, $harga, $frek, $total, $tanggal_pel, $nama_staff);
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
		list_tindakan_apelkes l, tindakan_penunjang_lain t
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
