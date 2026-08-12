<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Skrining_TBC extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Poli');
		$this->load->model('M_Erm');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->helper('bhce_helper');
	}

	public function form($id_pel, $id_his, $poli)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$poli = base64_decode(urldecode($poli));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');
		$page_data['pasien'] = $selectPasien;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['jenis_pelayanan'] = $selectPasien->jenis_pelayanan;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['poli'] = $selectPasien->nama_poli;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $poli;


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_skrining';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function index_post()
	{
		header('Content-Type: application/json');

		// Mendapatkan data mentah dari body permintaan
		$raw_data = $this->input->raw_input_stream;

		// Merubah data mentah menjadi array
		$json_data = json_decode($raw_data, true);

		$data = array(
			'no_rm' => isset($json_data['no_rm']) ? $json_data['no_rm'] : '',
			'id_history' => isset($json_data['history']) ? $json_data['history'] : '',
			'id_poli' => isset($json_data['poli']) ? $json_data['poli'] : '',
			'nama' => isset($json_data['nama']) ? $json_data['nama'] : '',
			'tgl_lahir' => isset($json_data['tgl_lahir']) ? $json_data['tgl_lahir'] : '',
			'jenis_kelamin' => isset($json_data['jenis_kelamin']) ? $json_data['jenis_kelamin'] : '',
			'id_pelayanan' => isset($json_data['id_pel']) ? $json_data['id_pel'] : '',
			'tgl_dinyatakan' => date('Y-m-d H:i:s'),
			'keterangan' => isset($json_data['keterangan']) ? $json_data['keterangan'] : '',
			'pasien_tbc' => isset($json_data['jawaban']) ? $json_data['jawaban'] : ''
		);
		$insert = $this->db->insert('pasien_TBC', $data);
		if ($insert) {
			$json_response = json_encode(array('status' => 'success'));

			$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output($json_response);
		} else {
			$json_error_response = json_encode(array('status' => 'fail'));

			$this->output
				->set_content_type('application/json')
				->set_status_header(502)
				->set_output($json_error_response);
		}
	}

	public function bhce_send()
    {
        date_default_timezone_set('Asia/Jakarta');
        $faskes_prov = "Kepulauan Bangka";
        $faskes_prov_kode = "19";
        $faskes_kab = "Kab. Bangka";
        $faskes_kab_kode = "1901";
        $faskes = "RS Bakti Timah Pangkalpinang";
        $faskes_kode = "1971043";
        $chain = "Pertamedika IHC";
        $chain_kode = "CH0005";
        $poli = array("paru", "anak", "dalam", "umum", "obgyn");
        $jenis_kelamin_list = array("LAKI-LAKI", "PEREMPUAN");

        $bulan_list = array(4); // April dan Mei
        $tahun = date('Y');

        for ($jk = 0; $jk < count($jenis_kelamin_list); $jk++) {
            for ($i = 0; $i < count($poli); $i++) {
                for ($j = 0; $j < count($bulan_list); $j++) {
                    // Menghitung tanggal terakhir dari bulan saat ini
                    $tanggal_akhir_bulan = $this->M_Pencarian_Pasien->getTanggalMax($bulan_list[$j], $tahun);

                    $jumlah_kunjungan = $this->jumlah_pasien_per_poli_bulan($poli[$i], $jenis_kelamin_list[$jk], $bulan_list[$j], $tahun);
                    $jumlah_skrining = $this->jumlah_skrining_per_poli_bulan($poli[$i], $jenis_kelamin_list[$jk], $bulan_list[$j], $tahun);
                    $jumlah_terduga = $this->jumlah_terduga_per_poli_bulan($poli[$i], $jenis_kelamin_list[$jk], $bulan_list[$j], $tahun);

                    $data_faskes = array(
                        'faskes_prov' => $faskes_prov,
                        'faskes_prov_kode' => $faskes_prov_kode,
                        'faskes_kab' => $faskes_kab,
                        'faskes_kab_kode' => $faskes_kab_kode,
                        'faskes' => $faskes,
                        'faskes_kode' => $faskes_kode,
                        'chain' => $chain,
                        'chain_kode' => $chain_kode,
                        'jenis_kelamin' => $jenis_kelamin_list[$jk],
                        'tanggal' => $tanggal_akhir_bulan,
                        'poli' => $poli[$i],
                        'bulan' => $bulan_list[$j],
                        'jumlah_kunjungan' => $jumlah_kunjungan,
                        'jumlah_skrining' => $jumlah_skrining,
                        'jumlah_terduga' => $jumlah_terduga,
                    );

                    echo '<h1>Response pengiriman Bundle untuk bulan ' . date('F', strtotime("$tahun-$bulan_list[$j]-01")) . '</h1>';
                    $response_bundle = bhcePost($data_faskes, 'skrining', 'POST');
                    echo '<pre>';
                    print_r($response_bundle);
                    echo '</pre>';
                }
            }
        }
    }

	public function jumlah_pasien_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$jumlah_pasien = $this->M_Pencarian_Pasien->jumlah_pasien_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun);
		// echo json_encode($jumlah_pasien);
		return $jumlah_pasien;
	}
	public function jumlah_skrining_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$jumlah_skrining = $this->M_Pencarian_Pasien->jumlah_skrining($id_poli, $jenis_kelamin, $bulan, $tahun); // Gantilah NamaModel dengan nama model yang Anda gunakan
		// echo json_encode($jumlah_skrining);
		return $jumlah_skrining;
	}
	public function jumlah_terduga_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun)
	{
		//$id_poli = 'dalam';
		$result = $this->M_Pencarian_Pasien->jumlah_terduga_per_poli($id_poli, $jenis_kelamin, $bulan, $tahun);

		// Output dalam format JSON
		// echo json_encode($result);

		return $result;
	}

	public function semua_terduga()
	{
		$total_terduga = $this->M_Pencarian_Pasien->jumlah_skrining(); // Gantilah NamaModel dengan nama model yang Anda gunakan
		echo json_encode($total_terduga);
		return $total_terduga;
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Skrining_TBC extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_Erm_poli');
		$this->load->model('M_Poli');
		$this->load->model('M_Erm');
		$this->load->model('M_Pencarian_Pasien');
		$this->load->helper('bhce_helper');
	}

	public function form($id_pel, $id_his, $poli)
	{
		$id_pelayanan = base64_decode(urldecode($id_pel));
		$id_history = base64_decode(urldecode($id_his));
		$poli = base64_decode(urldecode($poli));
		$selectPasien = $this->M_Erm_poli->selectDataPasienIGDby_id($id_pelayanan, $id_history);
		// $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
		$staff = $this->session->userdata('data_auth');
		$page_data['pasien'] = $selectPasien;
		$page_data['nama'] = $selectPasien->nama;
		$page_data['no_hp'] = $selectPasien->no_hp;
		$page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
		$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
		$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
		$page_data['cara_bayar'] = $selectPasien->cara_bayar;
		$page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
		$page_data['staff'] = $staff->id_staff;
		$page_data['no_rm'] = $selectPasien->no_rm;
		$page_data['jenis_pelayanan'] = $selectPasien->jenis_pelayanan;
		$page_data['id_pelayanan'] = $id_pelayanan;
		$page_data['id_history'] = $id_history;
		$page_data['agama'] = $selectPasien->agama;
		$page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
		$page_data['poli'] = $selectPasien->nama_poli;
		$page_data['url'] = base_url('Erm_poli/form/') . $id_pel . '/' . $id_his . '/' . $poli;


		// $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
		// $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'erm_form/view_skrining';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
	public function index_post()
	{
		header('Content-Type: application/json');

		// Mendapatkan data mentah dari body permintaan
		$raw_data = $this->input->raw_input_stream;

		// Merubah data mentah menjadi array
		$json_data = json_decode($raw_data, true);

		$data = array(
			'no_rm' => isset($json_data['no_rm']) ? $json_data['no_rm'] : '',
			'id_history' => isset($json_data['history']) ? $json_data['history'] : '',
			'id_poli' => isset($json_data['poli']) ? $json_data['poli'] : '',
			'nama' => isset($json_data['nama']) ? $json_data['nama'] : '',
			'tgl_lahir' => isset($json_data['tgl_lahir']) ? $json_data['tgl_lahir'] : '',
			'jenis_kelamin' => isset($json_data['jenis_kelamin']) ? $json_data['jenis_kelamin'] : '',
			'id_pelayanan' => isset($json_data['id_pel']) ? $json_data['id_pel'] : '',
			'tgl_dinyatakan' => date('Y-m-d H:i:s'),
			'keterangan' => isset($json_data['keterangan']) ? $json_data['keterangan'] : '',
			'pasien_tbc' => isset($json_data['jawaban']) ? $json_data['jawaban'] : ''
		);
		$insert = $this->db->insert('pasien_TBC', $data);
		if ($insert) {
			$json_response = json_encode(array('status' => 'success'));

			$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output($json_response);
		} else {
			$json_error_response = json_encode(array('status' => 'fail'));

			$this->output
				->set_content_type('application/json')
				->set_status_header(502)
				->set_output($json_error_response);
		}
	}

	public function bhce_send()
    {
        date_default_timezone_set('Asia/Jakarta');
        $faskes_prov = "Kepulauan Bangka";
        $faskes_prov_kode = "19";
        $faskes_kab = "Kab. Bangka";
        $faskes_kab_kode = "1901";
        $faskes = "RS Bakti Timah Pangkalpinang";
        $faskes_kode = "1971043";
        $chain = "Pertamedika IHC";
        $chain_kode = "CH0005";
        $poli = array("paru", "anak", "dalam", "umum", "obgyn");
        $jenis_kelamin_list = array("LAKI-LAKI", "PEREMPUAN");

        $bulan_list = array(4); // April dan Mei
        $tahun = date('Y');

        for ($jk = 0; $jk < count($jenis_kelamin_list); $jk++) {
            for ($i = 0; $i < count($poli); $i++) {
                for ($j = 0; $j < count($bulan_list); $j++) {
                    // Menghitung tanggal terakhir dari bulan saat ini
                    $tanggal_akhir_bulan = $this->M_Pencarian_Pasien->getTanggalMax($bulan_list[$j], $tahun);

                    $jumlah_kunjungan = $this->jumlah_pasien_per_poli_bulan($poli[$i], $jenis_kelamin_list[$jk], $bulan_list[$j], $tahun);
                    $jumlah_skrining = $this->jumlah_skrining_per_poli_bulan($poli[$i], $jenis_kelamin_list[$jk], $bulan_list[$j], $tahun);
                    $jumlah_terduga = $this->jumlah_terduga_per_poli_bulan($poli[$i], $jenis_kelamin_list[$jk], $bulan_list[$j], $tahun);

                    $data_faskes = array(
                        'faskes_prov' => $faskes_prov,
                        'faskes_prov_kode' => $faskes_prov_kode,
                        'faskes_kab' => $faskes_kab,
                        'faskes_kab_kode' => $faskes_kab_kode,
                        'faskes' => $faskes,
                        'faskes_kode' => $faskes_kode,
                        'chain' => $chain,
                        'chain_kode' => $chain_kode,
                        'jenis_kelamin' => $jenis_kelamin_list[$jk],
                        'tanggal' => $tanggal_akhir_bulan,
                        'poli' => $poli[$i],
                        'bulan' => $bulan_list[$j],
                        'jumlah_kunjungan' => $jumlah_kunjungan,
                        'jumlah_skrining' => $jumlah_skrining,
                        'jumlah_terduga' => $jumlah_terduga,
                    );

                    echo '<h1>Response pengiriman Bundle untuk bulan ' . date('F', strtotime("$tahun-$bulan_list[$j]-01")) . '</h1>';
                    $response_bundle = bhcePost($data_faskes, 'skrining', 'POST');
                    echo '<pre>';
                    print_r($response_bundle);
                    echo '</pre>';
                }
            }
        }
    }

	public function jumlah_pasien_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$jumlah_pasien = $this->M_Pencarian_Pasien->jumlah_pasien_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun);
		// echo json_encode($jumlah_pasien);
		return $jumlah_pasien;
	}
	public function jumlah_skrining_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun)
	{
		$jumlah_skrining = $this->M_Pencarian_Pasien->jumlah_skrining($id_poli, $jenis_kelamin, $bulan, $tahun); // Gantilah NamaModel dengan nama model yang Anda gunakan
		// echo json_encode($jumlah_skrining);
		return $jumlah_skrining;
	}
	public function jumlah_terduga_per_poli_bulan($id_poli, $jenis_kelamin, $bulan, $tahun)
	{
		//$id_poli = 'dalam';
		$result = $this->M_Pencarian_Pasien->jumlah_terduga_per_poli($id_poli, $jenis_kelamin, $bulan, $tahun);

		// Output dalam format JSON
		// echo json_encode($result);

		return $result;
	}

	public function semua_terduga()
	{
		$total_terduga = $this->M_Pencarian_Pasien->jumlah_skrining(); // Gantilah NamaModel dengan nama model yang Anda gunakan
		echo json_encode($total_terduga);
		return $total_terduga;
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
