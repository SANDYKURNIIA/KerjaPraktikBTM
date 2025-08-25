<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Eklaim extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		setlocale(LC_ALL, 'id_ID');
		$this->load->model('M_Casemix');
		$this->load->model('M_Poli');
		$this->load->model('M_Pencarian_Pasien');
	}
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idPelayanan = $this->input->post('idPelayanan');
		//$idPelayanan="V2rR3a4z1pBBlsM3HtyfpOtRoiKhutP";
		// $kunci = "2b291c857964612339fe874508fc3e06d6377f09a358e66ae4fa51e40a4d2d60";
		$kunci = "2b291c857964612339fe874508fc3e06d6377f09a358e66ae4fa51e40a4d2d6013435";
		$urls = "http://casemix.ddns.net/eklaim/ws.php";
		// $urls="192.168.142.3/e-klaim/ws.php";
		$sep = $this->input->post('sep');
		$noBpjs = $this->input->post('noBpjs');
		$norm = sprintf('%06d', $this->input->post('norm'));
		$namaPasien = $this->input->post('namaPasien');
		$tgl_lahir = $this->input->post('tgl_lahir');
		//$tgl_lahir="1966-01-01";
		$gender = $this->input->post('gender');

		$coderNik = $this->session->userdata('data_auth')->nik_eklaim;
		// $coderNik="121212"; 
		$tglp = $this->input->post('tglPulang');

		$diagnosa = "";
		$query = $this->db->query(" SELECT * from diagnosa WHERE id_pelayanan='$idPelayanan' order by tanggal ")->result_array();

		$diagnosa = "#";
		foreach ($query as $row) {
			$tmpkode = preg_replace('/\s+/', '', $row['kode']);
			//   $tmpkode=$row['kode']."";
			//   $pjg= mb_strlen($tmpkode, 'utf8');
			//  echo $tmpkode;
			//   echo mb_strlen($tmpkode, 'utf8');
			if (mb_strlen($tmpkode, 'utf8') > 3) {
				$tmpkode = substr_replace($tmpkode, ".", 3, 0);
			}
			$diagnosa .= $tmpkode . "#";
		}
		// echo $diagnosa;

		$procedure = "#";
		$query1 = $this->db->query(" SELECT * from prosedur WHERE id_pelayanan='$idPelayanan' order by tanggal ")->result_array();

		foreach ($query1 as $row) {
			$tmpkode = $row['kode'];
			$procedure .= $tmpkode . "#";
		}
		////////////////////////////////////////
		$data_klaim = array(
			'jenisRawat' => $this->input->post('jenisRawat'),
			'tglMasuk' => $this->input->post('tglMasuk'),

			'tglPulang' => $tglp,
			'namaDokter' => $this->input->post('namaDokter'),
			'diagnosa' => $diagnosa,
			'procedure' => $procedure,
			'discharge_status' => $this->input->post('discharge_status'),
			'beratLahir' => $this->input->post('beratLahir'),
			'kelas_rawat' => $this->input->post('kelas_rawat'),
			'naikKelas' => $this->input->post('naikKelas'),
			'kelasNaik' => $this->input->post('kelasNaik'),
			'lamaNaik' => $this->input->post('lamaNaik'),
			'persentaseTambahan' => $this->input->post('persentaseTambahan'),
		);


		/////////////////////////////////////////  



		$tarif = array(
			'prosedur_non_bedah' => $this->input->post('prosedur_non_bedah'),
			'prosedur_bedah' => $this->input->post('prosedur_bedah'),
			'konsultasi' => $this->input->post('konsultasi'),
			'tenaga_ahli' => $this->input->post('tenaga_ahli'),
			'keperawatan' => $this->input->post('keperawatan'),
			'penunjang' => $this->input->post('penunjang'),
			'radiologi' => $this->input->post('radiologi'),
			'laboratorium' => $this->input->post('laboratorium'),
			'pelayanan_darah' => $this->input->post('pelayanan_darah'),
			'rehabilitasi' => $this->input->post('rehabilitasi'),
			'kamar' => $this->input->post('kamar'),
			'rawat_intensif' => $this->input->post('rawat_intensif'),
			'obat' => $this->input->post('obat'),
			'obat_kronis' => $this->input->post('obat_kronis'),
			'obat_kemoterapi' => $this->input->post('obat_kemoterapi'),
			'alkes' => $this->input->post('alkes'),
			'bmhp' => $this->input->post('bmhp'),
			'sewa_alat' => $this->input->post('sewa_alat'),

			'kode_tarif' => "CS",
			'payor_cd' => $this->input->post('payor_cd'),
			'payor_id' => $this->input->post('payor_id'),
		);

		$total = $this->input->post('total');


		$this->editPasien($tgl_lahir, $kunci, $urls, $gender, $namaPasien, $noBpjs);
		$this->newClaim($kunci, $noBpjs, $norm, $sep, $namaPasien, $tgl_lahir, $gender, $urls);
		$this->editClaim($sep, $kunci, $urls);
		$this->setClaim($kunci, $noBpjs, $sep, $coderNik, $urls, $data_klaim, $tarif);
		$this->grouper($sep, $kunci, $urls, $idPelayanan, $total);
		// $this->finalClaim($sep, $kunci, $coderNik, $urls); 
		$eklaim = $this->db->get_where('eklaim', ['id_pelayanan' => $idPelayanan])->row();
		$out['status'] = "success";
		$out['tarif'] = $eklaim->tarif;
		$out['total'] = $eklaim->total;
		$out['kode'] = $eklaim->kode;
		$out['norm'] = $norm;
		// $out['data_klaim'] = $data_klaim;
		echo json_encode($out);
	}
	public function coba()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idPelayanan = $this->input->post('idPelayanan');
		//$idPelayanan="V2rR3a4z1pBBlsM3HtyfpOtRoiKhutP";
		$kunci = "2b291c857964612339fe874508fc3e06d6377f09a358e66ae4fa51e40a4d2d602435345";
		$urls = "http://casemix.ddns.net/eklaim/ws.php";
		// $urls="192.168.142.3/e-klaim/ws.php";
		$sep = '0001R0016120507423';
		$noBpjs = '0000668870001';
		$norm = '123-45-67';
		$namaPasien = 'COBA PASIEN';
		$tgl_lahir = $this->input->post('tgl_lahir');
		//$tgl_lahir="1966-01-01";
		$gender = '2';


		$coderNik = $this->session->userdata('data_auth')->nik_eklaim;
		// $coderNik = "121212";
		$tgls = date("Y-m-d H:i:s") . "";

		$diagnosa = "";
		$query = $this->db->query(" SELECT * from diagnosa WHERE id_pelayanan='$idPelayanan' order by tanggal ")->result_array();

		$diagnosa = "#";
		foreach ($query as $row) {
			$tmpkode = preg_replace('/\s+/', '', $row['kode']);
			//   $tmpkode=$row['kode']."";
			//   $pjg= mb_strlen($tmpkode, 'utf8');
			//  echo $tmpkode;
			//   echo mb_strlen($tmpkode, 'utf8');
			if (mb_strlen($tmpkode, 'utf8') > 3) {
				$tmpkode = substr_replace($tmpkode, ".", 3, 0);
			}
			$diagnosa .= $tmpkode . "#";
		}
		// echo $diagnosa;

		$procedure = "#";
		$query1 = $this->db->query(" SELECT * from prosedur WHERE id_pelayanan='$idPelayanan' order by tanggal ")->result_array();

		foreach ($query1 as $row) {
			$tmpkode = $row['kode'];
			$procedure .= $tmpkode . "#";
		}
		////////////////////////////////////////
		$data_klaim = array(
			'jenisRawat' => '1',
			'tglMasuk' => $this->input->post('tglMasuk'),

			'tglPulang' => $tgls,
			'namaDokter' => $this->input->post('namaDokter'),
			'diagnosa' => $diagnosa,
			'procedure' => $procedure,
			'discharge_status' => "1",
			'beratLahir' => "2500",
			'kelas_rawat' => $this->input->post('kelas_rawat'),
			'naikKelas' => $this->input->post('naikKelas'),
			'kelasNaik' => $this->input->post('kelasNaik'),
			'lamaNaik' => $this->input->post('lamaNaik'),
			'persentaseTambahan' => $this->input->post('persentaseTambahan'),
		);
		// print_r($data_klaim);

		/////////////////////////////////////////  



		$tarif = array(
			'prosedur_non_bedah' => '0',
			'prosedur_bedah' => '0',
			'konsultasi' => '120000',
			'tenaga_ahli' => '0',
			'keperawatan' => '0',
			'penunjang' => '0',
			'radiologi' => '0',
			'laboratorium' => '0',
			'pelayanan_darah' => '0',
			'rehabilitasi' => '0',
			'kamar' => '25000',
			'rawat_intensif' => '0',
			'obat' => '0',
			'obat_kronis' => '0',
			'obat_kemoterapi' => '0',
			'alkes' => '0',
			'bmhp' => '0',
			'sewa_alat' => '0',

			'kode_tarif' => "CS",
			'payor_cd' => $this->input->post('payor_cd'),
			'payor_id' => $this->input->post('payor_id'),
		);
		$total = '145000';

		

		$this->editPasien($tgl_lahir, $kunci, $urls, $gender, $namaPasien, $noBpjs);
		$this->newClaim($kunci, $noBpjs, $norm, $sep, $namaPasien, $tgl_lahir, $gender, $urls);
		$this->editClaim($sep, $kunci, $urls);
		$this->setClaim($kunci, $noBpjs, $sep, $coderNik, $urls, $data_klaim, $tarif);
		$this->grouper($sep, $kunci, $urls, $idPelayanan, $total);

		$eklaim = $this->db->get_where('eklaim', ['id_pelayanan' => $idPelayanan])->row();
		$out['status'] = "success";
		$out['tarif'] = $eklaim->tarif;
		$out['total'] = $eklaim->total;
		$out['kode'] = $eklaim->kode;
		// $out['data_klaim'] = $data_klaim;
		echo json_encode($out);
	}
	function inacbg_encrypt($data, $key)
	{

		/// make binary representasion of $key
		$key = hex2bin($key);
		/// check key length, must be 256 bit or 32 bytes
		if (mb_strlen($key, "8bit") !== 32) {
			throw new Exception("Needs a 256-bit key!");
		}
		/// create initialization vector
		$iv_size = openssl_cipher_iv_length("aes-256-cbc");
		$iv = openssl_random_pseudo_bytes($iv_size); // dengan catatan dibawah
		/// encrypt
		$encrypted = openssl_encrypt(
			$data,
			"aes-256-cbc",
			$key,
			OPENSSL_RAW_DATA,
			$iv
		);
		/// create signature, against padding oracle attacks
		$signature = mb_substr(hash_hmac(
			"sha256",
			$encrypted,
			$key,
			true
		), 0, 10, "8bit");
		/// combine all, encode, and format
		$encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
		return $encoded;
	}

	// Decryption Function
	function inacbg_decrypt($str, $strkey)
	{
		/// make binary representation of $key
		$key = hex2bin($strkey);
		/// check key length, must be 256 bit or 32 bytes
		if (mb_strlen($key, "8bit") !== 32) {
			throw new Exception("Needs a 256-bit key!");
		}
		/// calculate iv size
		$iv_size = openssl_cipher_iv_length("aes-256-cbc");
		/// breakdown parts
		$decoded = base64_decode($str);
		$signature = mb_substr($decoded, 0, 10, "8bit");
		$iv = mb_substr($decoded, 10, $iv_size, "8bit");
		$encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");
		/// check signature, against padding oracle attack
		$calc_signature = mb_substr(hash_hmac(
			"sha256",
			$encrypted,
			$key,
			true
		), 0, 10, "8bit");
		if (!$this->inacbg_compare($signature, $calc_signature)) {
			return "SIGNATURE_NOT_MATCH"; /// signature doesn't match
		}
		$decrypted = openssl_decrypt(
			$encrypted,
			"aes-256-cbc",
			$key,
			OPENSSL_RAW_DATA,
			$iv
		);
		return $decrypted;
	}
	/// Compare Function
	function inacbg_compare($a, $b)
	{
		/// compare individually to prevent timing attacks

		/// compare length
		if (strlen($a) !== strlen($b)) return false;

		/// compare individual
		$result = 0;
		for ($i = 0; $i < strlen($a); $i++) {
			$result |= ord($a[$i]) ^ ord($b[$i]);
		}

		return $result == 0;
	}

	///////////////////////////////////////////////////////////////////////////////////////
	function newClaim($kunci, $noBpjs, $norm, $sep, $namaPasien, $tgl_lahir, $gender, $urls)
	{
		$key = $kunci;

		$ws_query["metadata"]["method"] = "new_claim";
		$ws_query["data"]["nomor_kartu"] = $noBpjs;
		$ws_query["data"]["nomor_rm"] = $norm;
		$ws_query["data"]["nomor_sep"] = $sep;
		$ws_query["data"]["nama_pasien"] = $namaPasien;
		$ws_query["data"]["tgl_lahir"] = $tgl_lahir;
		$ws_query["data"]["gender"] = $gender;
		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);

		// echo "newClaim: ".$response."<br>";
	}
	///////////////////////////////////////////////////////////////////////////////////////
	function setClaim($kunci, $noBpjs, $sep, $coderNik, $urls, $data_klaim, $tarif)
	{
		$jenisRawat = $data_klaim['jenisRawat'];
		$naikKelas = $data_klaim['naikKelas'];

		$key = $kunci;

		$ws_query["metadata"]["method"] = "set_claim_data";
		$ws_query["metadata"]["nomor_sep"] = $sep;
		$ws_query["data"]["nomor_kartu"] = $noBpjs;
		$ws_query["data"]["tgl_masuk"] = $data_klaim['tglMasuk'];
		$ws_query["data"]["tgl_pulang"] = $data_klaim['tglPulang'];
		$ws_query["data"]["coder_nik"] = $coderNik;
		$ws_query["data"]["jenis_rawat"] = $data_klaim['jenisRawat'];
		$ws_query["data"]["diagnosa"] = $data_klaim['diagnosa'];
		$ws_query["data"]["procedure"] = $data_klaim['procedure'];
		$ws_query["data"]["nama_dokter"] = $data_klaim['namaDokter'];
		$ws_query["data"]["discharge_status"] = $data_klaim['discharge_status'];
		$ws_query["data"]["birth_weight"] = $data_klaim['beratLahir'];


		$ws_query["data"]["jenis_rawat"] = $data_klaim['jenisRawat'];
		if ($jenisRawat == 1) {
			$ws_query["data"]["kelas_rawat"] = $data_klaim['kelas_rawat'];
			$ws_query["data"]["upgrade_class_ind"] = $data_klaim['naikKelas'];
			if ($naikKelas == 1) {
				$ws_query["data"]["upgrade_class_class"] = $data_klaim['kelasNaik'];
				$ws_query["data"]["upgrade_class_los"] = $data_klaim['lamaNaik'];
				$ws_query["data"]["add_payment_pct"] = $data_klaim['persentaseTambahan'];
			}
		}

		$ws_query["data"]["tarif_rs"]["prosedur_non_bedah"]  = $tarif['prosedur_non_bedah'];
		$ws_query["data"]["tarif_rs"]["prosedur_bedah"]  = $tarif['prosedur_bedah'];
		$ws_query["data"]["tarif_rs"]["konsultasi"]  = $tarif['konsultasi'];
		$ws_query["data"]["tarif_rs"]["tenaga_ahli"]  = $tarif['tenaga_ahli'];

		$ws_query["data"]["tarif_rs"]["keperawatan"]  = $tarif['keperawatan'];
		$ws_query["data"]["tarif_rs"]["penunjang"]  = $tarif['penunjang'];
		$ws_query["data"]["tarif_rs"]["radiologi"]  = $tarif['radiologi'];
		$ws_query["data"]["tarif_rs"]["laboratorium"]  = $tarif['laboratorium'];

		$ws_query["data"]["tarif_rs"]["pelayanan_darah"]  = $tarif['pelayanan_darah'];
		$ws_query["data"]["tarif_rs"]["rehabilitasi"]  = $tarif['rehabilitasi'];
		$ws_query["data"]["tarif_rs"]["kamar"]  = $tarif['kamar'];
		$ws_query["data"]["tarif_rs"]["rawat_intensif"]  = $tarif['rawat_intensif'];

		$ws_query["data"]["tarif_rs"]["obat"]  = $tarif['obat'];
		$ws_query["data"]["tarif_rs"]["obat_kronis"]  = $tarif['obat_kronis'];
		$ws_query["data"]["tarif_rs"]["obat_kemoterapi"]  = $tarif['obat_kemoterapi'];
		$ws_query["data"]["tarif_rs"]["alkes"]  = $tarif['alkes'];

		$ws_query["data"]["tarif_rs"]["bmhp"]  = $tarif['bmhp'];
		$ws_query["data"]["tarif_rs"]["sewa_alat"]  = $tarif['sewa_alat'];


		$ws_query["data"]["kode_tarif"] = $tarif['kode_tarif'];
		$ws_query["data"]["payor_cd"] = $tarif['payor_cd'];
		$ws_query["data"]["payor_id"] = $tarif['payor_id'];


		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);
		// echo "setClaim: ".$response;
		$msg = json_decode($response, true);
		// echo json_encode($msg);
	}
	///////////////////////////////////////////////////////////////////////////////////////
	function grouper($sep, $kunci, $urls, $idPelayanan, $total)
	{

		$key = $kunci;

		$ws_query["metadata"]["method"] = "grouper";
		$ws_query["metadata"]["stage"] = "1";
		$ws_query["data"]["nomor_sep"] = $sep;
		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);
		$msg = json_decode($response, true);

		// echo json_encode($msg);
		//     echo "<script>console.log( 'Debug Objects: " . $response . "' );</script>";
		if ($msg["metadata"]["code"] == "200") {
			//  echo $msg["response"]["cbg"]["code"] ."|".$msg["response"]["cbg"]["tariff"]   ; 

			$kode = $msg["response"]["cbg"]["code"];
			$tariff = $msg["response"]["cbg"]["tariff"];

			$sqlstr1 = "SELECT * FROM eklaim  where id_pelayanan='$idPelayanan' ";
			$query1 = $this->db->query($sqlstr1);


			$count = $query1->result();
			if (count($count) > 0) {
				$where = array(
					'id_pelayanan' => $idPelayanan
				);

				$eklaim = array(
					'kode' => $kode,
					'tarif' =>  $tariff,
					'total' => $total,
				);
				$this->M_Poli->update_tindakan($eklaim, $where, 'eklaim');
			} else {
				$page_data = array(
					'id_pelayanan' => $idPelayanan,
					'kode' => $kode,
					'tarif' => $tariff,
					'total' => $total,
				);
				$this->M_Poli->insert_tindakan($page_data, 'eklaim');
			}
		}
		// echo $response;
		// hasil decrypt adalah format json, ditranslate kedalam array
		

	}
	///////////////////////////////////////////////////////////////////////////////////////
	function finalClaim()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idPelayanan = $this->input->post('idPelayanan');
		//$idPelayanan="V2rR3a4z1pBBlsM3HtyfpOtRoiKhutP";
		$kunci = "2b291c857964612339fe874508fc3e06d6377f09a358e66ae4fa51e40a4d2d60142332535waa";
		$urls = "http://casemix.ddns.net/eklaim/ws.php";
		// $urls="192.168.142.3/e-klaim/ws.php";
		$sep = $this->input->post('sep');

		$key = $kunci;
		$coderNik = $this->session->userdata('data_auth')->nik_eklaim;

		$ws_query["metadata"]["method"] = "claim_final";
		$ws_query["data"]["nomor_sep"] = $sep;
		$ws_query["data"]["coder_nik"] = $coderNik;
		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);

		$response = $this->inacbg_decrypt($response, $key);

		$msg = json_decode($response, true);

		$out['status'] = "success";
		echo json_encode($out);
	}
	///////////////////////////////////////////////////////////////////////////////////////
	function onlineClaim()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idPelayanan = $this->input->post('idPelayanan');
		//$idPelayanan="V2rR3a4z1pBBlsM3HtyfpOtRoiKhutP";
		$kunci = "2b291c857964612339fe874508fc3e06d6377f09a358e66ae4fa51e40a4d2d604234resfd33252";
		$urls = "http://casemix.ddns.net/eklaim/ws.php";
		// $urls="192.168.142.3/e-klaim/ws.php";
		$sep = $this->input->post('sep');

		$key = $kunci;
		$coderNik = $this->session->userdata('data_auth')->nik_eklaim;

		$ws_query["metadata"]["method"] = "send_claim_individual";
		$ws_query["data"]["nomor_sep"] = $sep;
		// $ws_query["data"]["coder_nik"] = $coderNik;
		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);

		// echo $response;
		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);
		// variable data adalah base64 dari file pdf
		// 	$pdf = base64_decode($msg["data"]);

		// echo $response." final<br>";
		// echo $msg["response"]["cbg"]["code"];
		// echo $msg["response"]["tarif_alt"]["tariff"]; 
		$out['response'] = $msg;
		$out['status'] = "success";
		echo json_encode($out);
	}
	///////////////////////////////////////////////////////////////////////////////////////
	function editClaim($sep, $kunci, $urls)
	{
		$key = $kunci;

		$ws_query["metadata"]["method"] = "reedit_claim";
		$ws_query["data"]["nomor_sep"] = $sep;
		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);

		// echo "editClaim: ".$response;
		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);
		// variable data adalah base64 dari file pdf
		// 	$pdf = base64_decode($msg["data"]);

		// echo $response." edit klaim<br>";
		// echo $msg["response"]["cbg"]["code"];
		// echo $msg["response"]["tarif_alt"]["tariff"]; 
	}
	///////////////////////////////////////////////////////////////////////////////////////
	function editPasien($tgl_lahir, $kunci, $urls, $gender, $namaPasien, $noBpjs)
	{
		$key = $kunci;

		$ws_query["metadata"]["method"] = "update_patient";
		$ws_query["metadata"]["nomor_rm"] = "123-45-67";
		$ws_query["data"]["nomor_kartu"] = $noBpjs;
		$ws_query["data"]["nomor_rm"] = "123-45-67";
		$ws_query["data"]["nama_pasien"] = $namaPasien;
		$ws_query["data"]["tgl_lahir"] = $tgl_lahir;
		$ws_query["data"]["gender"] = $gender;

		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);

		// echo "editPasien: ".$response;
		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);
		// variable data adalah base64 dari file pdf
		// 	$pdf = base64_decode($msg["data"]);

		// echo $response." edit klaim<br>";
		// echo $msg["response"]["cbg"]["code"];
		// echo $msg["response"]["tarif_alt"]["tariff"]; 
	}
	///////////////////////////////////////////////////////////////////////////////////////
	function deleteClaim()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idPelayanan = $this->input->post('idPelayanan');
		//$idPelayanan="V2rR3a4z1pBBlsM3HtyfpOtRoiKhutP";
		$kunci = "2b291c857964612339fe874508fc3e06d6377f09a358e66ae4fa51e40a4d2d60242423rwrdsgrte4";
		$urls = "http://casemix.ddns.net/eklaim/ws.php";
		// $urls="192.168.142.3/e-klaim/ws.php";
		$sep = $this->input->post('sep');

		$key = $kunci;
		$coderNik = $this->session->userdata('data_auth')->nik_eklaim;

		$ws_query["metadata"]["method"] = "delete_claim";
		$ws_query["data"]["nomor_sep"] = $sep;
		$ws_query["data"]["coder_nik"] = $coderNik;
		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);

		// echo $response;
		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);


		$out['response'] = $msg;
		if ($msg["metadata"]["code"] == "200") {
			$out['status'] = "success";
		} else {
			$out['status'] = "error";
		}

		echo json_encode($out);
	}
	function printClaim($sep)
	{
		date_default_timezone_set('Asia/Jakarta');
		$idPelayanan = $this->input->post('idPelayanan');
		//$idPelayanan="V2rR3a4z1pBBlsM3HtyfpOtRoiKhutP";
		$kunci = "2b291c857964612339fe874508fc3e06d6377f09a358e66ae4fa51e40a4d2d60323rwreegdf64";
		$urls = "http://casemix.ddns.net/eklaim/ws.php";
		// $urls="192.168.142.3/e-klaim/ws.php";
		// $sep = $this->input->post('sep');

		$key = $kunci;
		$coderNik = $this->session->userdata('data_auth')->nik_eklaim;

		$ws_query["metadata"]["method"] = "claim_print";
		$ws_query["data"]["nomor_sep"] = $sep;
		// $ws_query["data"]["coder_nik"] = $coderNik;
		$json_request = json_encode($ws_query);
		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request, $key);
		// tentukan Content-Type pada http header
		$header = array("Content-Type: application/x-www-form-urlencoded");
		// url server aplikasi E-Klaim,
		// silakan disesuaikan instalasi masing-masing
		$url = $urls;
		// setup curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// request dengan curl
		$response = curl_exec($ch);
		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);
		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response, $key);

		// echo $response;
		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);


		// $out['response'] = $msg;
		if ($msg["metadata"]["code"] == "200") {
			$pdf = base64_decode($msg['data']);
			$file = "assets/file-upload/" . uniqid(time(), true) . ".pdf";
			$success = file_put_contents($file, $pdf);
			force_download($file, NULL);
		}
	}
	public function upload_file()
    {
        $inPelayanan = $this->input->post('inPelayanan');
        
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        $getDataImages = [
            'success' => [],
            'error' => []
        ];
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $getDataImages['success'][] = [
                    'response' => ['status' => 'success'],
                    'data' => $data['upload_data']['file_name'],
                ];
            } else {
                $getDataImages['error'][] = [
                    'response' => ['status' => 'failed'],
                    'data' => $_FILES['file']['name'],
                ];
            }
        }

        $success = $getDataImages['success'];
        $error = $getDataImages['error'];

		$query = $this->db->query("SELECT * FROM upload_sep  where id_pelayanan='$inPelayanan' ")->result();
		if(count($query)>0){
			foreach ($success as $successData) {
				$data =  [
					'file'  => implode(',', array_map(function ($val) {
						return $val['data'];
					}, $success)),
					'sep'  => '-',
					'tanggal'=> date('Y-m-d H:i:s')
				];
				$where = array(
					'id_pelayanan' => $inPelayanan
				);
				$this->M_Poli->update_tindakan($data, $where, 'upload_sep');
			}
		}else{
			foreach ($success as $successData) {
				$alldata =  [
					'id_upload' => uniqid(),
					'id_pelayanan' => $inPelayanan,
					'file'  => implode(',', array_map(function ($val) {
						return $val['data'];
					}, $success)),
					'sep'  => '-',
					'tanggal'=> date('Y-m-d H:i:s')
				];
				$this->M_Poli->insert_tindakan($alldata,'upload_sep');
			}
		}
		
		$tipe_masuk = $this->input->post('tipe_masuk');

	
		if ($tipe_masuk == 'RAWAT INAP') {
			$query1 = $this->db->query("SELECT * FROM history_pelayanan_ranap  where id_pelayanan='$inPelayanan' ")->result();
			if (count($query1) > 0) {
				$where = array(
					'id_pelayanan' => $inPelayanan
				);

				$eklaim = array(
					'status_eklaim' => 1,
				);
				$this->M_Poli->update_tindakan($eklaim, $where, 'history_pelayanan_ranap');
			}
		} else if ($tipe_masuk == 'UGD') {
			$query1 = $this->db->query("SELECT * FROM history_pelayanan_ugd  where id_pelayanan='$inPelayanan' ")->result();
			if (count($query1) > 0) {
				$where = array(
					'id_pelayanan' => $inPelayanan
				);

				$eklaim = array(
					'status_eklaim' => 1,
				);
				$this->M_Poli->update_tindakan($eklaim, $where, 'history_pelayanan_ugd');
			}
		} else if ($tipe_masuk == 'POLI') {
			$query1 = $this->db->query("SELECT * FROM history_pelayanan  where id_pelayanan='$inPelayanan' ")->result();
			if (count($query1) > 0) {
				$where = array(
					'id_pelayanan' => $inPelayanan
				);

				$eklaim = array(
					'status_eklaim' => 1,
				);
				$this->M_Poli->update_tindakan($eklaim, $where, 'history_pelayanan');
			}
		}

        echo json_encode(['status' => ['success' => count($success), 'error' => count($error)]]);
    }
	private function set_upload_options()
	{
		//upload an image options
		$config = array();
		$config['upload_path'] = "./assets/images";
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 5048000; //5 mb
		$config['overwrite']     = FALSE;

		return $config;
	}
}
