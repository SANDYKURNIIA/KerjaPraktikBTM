<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vclaim_bpjs extends CI_Controller
{


  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model("M_SEP");
    $this->load->model('M_Pelayanan_masuk');
    $this->load->model("M_Pasien");
  }
  public function index()
  {
    $this->load->view('assets/_header');
    $this->load->view('Data_SEP');
    $this->load->view('assets/_footer');
  }
  ///////////////////////////// PESERTA //////////////////////////////
  public function cek_peserta_by_kartu()
  {
    $headers = generate_headers();
    $key = generate_key();

    $kartu = $this->input->post('kartu');
    // $tgl_sep = $this->input->post('tgl');
    //$kartu = "0000022706054";
    $tgl_sep = date("Y-m-d");
    $url = base_vclaim() . "Peserta/nokartu/$kartu/tglSEP/$tgl_sep";


    $data = get($url, $headers);

    // print_arr($data['metaData']);
    if ($data['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);

      if ($response['peserta']['statusPeserta']['kode'] == 0) {
        $out['status'] = 'success';
        $out['data'] = $response['peserta'];
      } else {
        $out['status'] = $response['peserta']['statusPeserta']['keterangan'];
      }
    } else {
      $out['status'] = $data['metaData']['message'];
    }



    echo json_encode($out);
  }

  public function cek_peserta_by_nik()
  {
    $headers = generate_headers();
    $key = generate_key();

    $nik = $this->input->post('nik');
    //$kartu = "0000022706054";
    $tgl_sep = $this->input->post('tgl');
    $url = base_vclaim() . "Peserta/nik/$nik/tglSEP/$tgl_sep";


    $data = get($url, $headers);

    // print_arr($data['metaData']);
    if ($data['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);

      if ($response['peserta']['statusPeserta']['kode'] == 0) {
        $out['status'] = 'success';
        $out['data'] = $response['peserta'];
      } else {
        $out['status'] = $response['peserta']['statusPeserta']['keterangan'];
      }
    } else {
      $out['status'] = $data['metaData']['message'];
    }
    echo json_encode($out);
  }



  /////////////////////////// SEP //////////////////////////////


  public function cari_sep()
  {
    $headers = generate_headers();
    $key = generate_key();
    /**
    Getting record from API Aplicares
     */
    $sep = $this->input->post('sep');
    $url = base_vclaim() . "SEP/" . $sep;

    // if ($sep == "") {
    //   echo '{"data":""}';
    //   exit;
    // } else {
    $data = get($url, $headers);
    // curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");

    // print_arr($data);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);
    $response = [
      'metaData' => $data['metaData'],
      'data' => $response,
    ];
    echo json_encode($response);

    //}
  }
  public function insert_sep()
  {
    $staff = $this->session->userdata('data_auth');


    $jenis = $this->input->post('jnsPelayanan');
    $poli = $this->input->post('poliTuj');
    $kartu = $this->input->post('no_kartu');
    $tgl_sep = $this->input->post('tgl_sep');
    $pasien = $this->db->get_where('pasien', ['no_bpjs' => $kartu])->row();
    $no_tlp = $this->input->post('noTelp');
    $id_pel = $this->input->post('id_pel');

    if ($jenis == 2 && $poli != 'IGD') {
      if ($this->input->post('noSurat') != '' && $this->input->post('tujuanKunj') != 0 && $this->input->post('jenis_kunjungan') == '') {
        $jenis_kunjungan = '3'; //kontrol
        $no_referensi = $this->input->post('noSurat');
      } else if ($this->input->post('tujuanKunj') == 0 && $this->input->post('assesmentPel') != '' && $this->input->post('assesmentPel') != '5') {
        $jenis_kunjungan = '2'; //rujukan internal
        $no_referensi = ($this->input->post('noSurat') != '') ? $this->input->post('noSurat') : $this->input->post('noRujukan');
      } else  if ($this->input->post('noSurat') != '' && $this->input->post('tujuanKunj') == 2) {
        $jenis_kunjungan = '3'; //kontrol
        $no_referensi = $this->input->post('noSurat');
      } else  if ($this->input->post('noSurat') != '') {
        $jenis_kunjungan = '3'; //kontrol
        $no_referensi = $this->input->post('noSurat');
      } else {
        $jenis_kunjungan = $this->input->post('jenis_kunjungan'); //rujukan fktp atau rs
        $no_referensi = $this->input->post('noRujukan');
      }


      $data_antri = [
        'no_kartu' => $kartu,
        'tgl_sep' => $this->input->post('tgl_sep'),
        'id_pelayanan' => $id_pel,
        'poli' => $poli,
        'kodeDPJP' => $this->input->post('kodeDPJP'),
        'jeniskunjungan' => $jenis_kunjungan,
        'no_referensi' => $no_referensi,
        'no_hp' => trim($pasien->no_hp, "  "),
      ];
      $this->antrian_bpjs($data_antri);
    }

    $data['request']['t_sep']['noKartu'] = $this->input->post('no_kartu');
    $data['request']['t_sep']['tglSep'] = $this->input->post('tgl_sep');
    $data['request']['t_sep']['ppkPelayanan'] = '0110R005';
    $data['request']['t_sep']['jnsPelayanan'] = $jenis; //jenis pelayanan = 1. r.inap 2. r.jalan
    $data['request']['t_sep']['klsRawat']['klsRawatHak'] = $this->input->post('klsRawatHak');
    $data['request']['t_sep']['klsRawat']['klsRawatNaik'] = $this->input->post('klsRawatNaik');
    $data['request']['t_sep']['klsRawat']['pembiayaan'] = $this->input->post('pembiayaan');
    $data['request']['t_sep']['klsRawat']['penanggungJawab'] = $this->input->post('penanggungJawab');
    $data['request']['t_sep']['noMR'] = $this->input->post('noMr');
    $data['request']['t_sep']['rujukan']['asalRujukan'] = $this->input->post('asalRujukan');
    $data['request']['t_sep']['rujukan']['tglRujukan'] = $this->input->post('tglRujukan');
    $data['request']['t_sep']['rujukan']['noRujukan'] = $this->input->post('noRujukan'); //no rujukan atau no SPRI
    $data['request']['t_sep']['rujukan']['ppkRujukan'] = $this->input->post('ppkRujukan');
    $data['request']['t_sep']['catatan'] = $this->input->post('catatan');
    $data['request']['t_sep']['diagAwal'] = $this->input->post('diagAwal');
    $data['request']['t_sep']['poli']['tujuan'] = $this->input->post('poliTuj'); //jika igd, poli tujuannya IGD
    $data['request']['t_sep']['poli']['eksekutif'] = $this->input->post('eksekutif');
    $data['request']['t_sep']['cob']['cob'] = $this->input->post('cob');
    $data['request']['t_sep']['katarak']['katarak'] = $this->input->post('katarak');

    $data['request']['t_sep']['jaminan']['lakaLantas'] = $this->input->post('lakaLantas');
    $data['request']['t_sep']['jaminan']['noLP'] = $this->input->post('noLP');
    $data['request']['t_sep']['jaminan']['penjamin']['tglKejadian'] = $this->input->post('tglKejadian');
    $data['request']['t_sep']['jaminan']['penjamin']['keterangan'] = $this->input->post('keterangan');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['suplesi'] = $this->input->post('suplesi');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['noSepSuplesi'] = $this->input->post('noSepSuplesi');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdPropinsi'] = $this->input->post('kdPropinsi');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKabupaten'] = $this->input->post('kdKabupaten');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKecamatan'] = $this->input->post('kdKecamatan');
    $data['request']['t_sep']['tujuanKunj'] = $this->input->post('tujuanKunj');
    $data['request']['t_sep']['flagProcedure'] = $this->input->post('flagProcedure');
    $data['request']['t_sep']['kdPenunjang'] = $this->input->post('kdPenunjang');
    $data['request']['t_sep']['assesmentPel'] = $this->input->post('assesmentPel');

    $data['request']['t_sep']['skdp']['noSurat'] = $this->input->post('noSurat'); //no surat kontrol atau no SPRI
    $data['request']['t_sep']['skdp']['kodeDPJP'] = $this->input->post('kodeDPJP');
    $data['request']['t_sep']['dpjpLayan'] = ($jenis == 2) ? $this->input->post('kodeDPJP') : "";
    $data['request']['t_sep']['noTelp'] = trim($pasien->no_hp, "  ");
    // $data['request']['t_sep']['noTelp'] = (!isset($no_tlp) || $no_tlp== '12345678910' || strlen($no_tlp) < 14 || strlen($no_tlp) > 14) ? $pasien->no_hp: $no_tlp ;
    $data['request']['t_sep']['user'] = $staff->nama;

    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "SEP/2.0/insert";

    $finger = $this->getFingerPrint($kartu, $tgl_sep);
    // print_arr($finger);
    $date = new DateTime($pasien->tgl_lahir);
    $now = new DateTime();
    $umur = $now->diff($date);

    if ($finger['status'] == 'Ok') {
      if ($finger['data']->kode == 1 || $umur->y < 17 || $jenis == 1 || $poli == 'IGD') {

        $response = post($url, $headers, $json);

        //print_arr($response);
        if ($response['metaData']['code'] == 200) {
          $decript = stringDecrypt($key, $response['response']);
          //print_arr($decript);

          $response = json_decode(decompress($decript), true);
          //print_arr($response);
          $no_sep = $response['sep']['noSep'];
          $diagnosa_sep = $response['sep']['diagnosa'];
          $diagnosa = str_replace('-', '|', $diagnosa_sep);

          $id_pel = $this->input->post('id_pel');
          $this->M_SEP->update(['no_sep' => $no_sep, 'diagnosa' => $diagnosa], ['id_pelayanan' => $id_pel], 'pelayanan');
          $this->M_SEP->update(['json_vclaim' => $json], ['id_pelayanan' => $id_pel], 'schedule_antrol');


          $out['status'] = 'success';
          $out['data'] = $response;
        } else {
          $out['status'] = 'error';
          $out['data'] = $response['metaData'];
        }
      } else {
        $out['status'] = 'error';
        $out['data']['message'] = $finger['data']->status;
      }
    } else {
      $out['status'] = 'error';
      $out['data']['message'] = $finger['status'];
    }
    echo json_encode($out);
  }
  public function update_sep()
  {
    $staff = $this->session->userdata('data_auth');

    $dpjp = $this->input->post('dpjp');


    $no_tlp = $this->input->post('noTelp');
    $kodeDPJP = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row()->kode_dokter;
    $data['request']['t_sep']['noSep'] = $this->input->post('noSep');
    $data['request']['t_sep']['klsRawat']['klsRawatHak'] = $this->input->post('klsRawatHak');
    $data['request']['t_sep']['klsRawat']['klsRawatNaik'] = $this->input->post('klsRawatNaik');
    $data['request']['t_sep']['klsRawat']['pembiayaan'] = $this->input->post('pembiayaan');
    $data['request']['t_sep']['klsRawat']['penanggungJawab'] = $this->input->post('penanggungJawab');
    $data['request']['t_sep']['noMR'] = $this->input->post('noMr');
    $data['request']['t_sep']['catatan'] = $this->input->post('catatan');
    $data['request']['t_sep']['diagAwal'] = $this->input->post('diagAwal');
    $data['request']['t_sep']['poli']['tujuan'] = $this->input->post('poliTuj'); //jika igd, poli tujuannya IGD
    $data['request']['t_sep']['poli']['eksekutif'] = $this->input->post('eksekutif');
    $data['request']['t_sep']['cob']['cob'] = $this->input->post('cob');
    $data['request']['t_sep']['katarak']['katarak'] = $this->input->post('katarak');

    $data['request']['t_sep']['jaminan']['lakaLantas'] = $this->input->post('lakaLantas');
    $data['request']['t_sep']['jaminan']['penjamin']['tglKejadian'] = $this->input->post('tglKejadian');
    $data['request']['t_sep']['jaminan']['penjamin']['keterangan'] = $this->input->post('keterangan');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['suplesi'] = $this->input->post('suplesi');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['noSepSuplesi'] = $this->input->post('noSepSuplesi');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdPropinsi'] = $this->input->post('kdPropinsi');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKabupaten'] = $this->input->post('kdKabupaten');
    $data['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKecamatan'] = $this->input->post('kdKecamatan');
    $data['request']['t_sep']['dpjpLayan'] = $kodeDPJP;
    $data['request']['t_sep']['noTelp'] = (isset($no_tlp)) ? $no_tlp : '12345678910';
    $data['request']['t_sep']['user'] = $staff->nama;


    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "SEP/2.0/update";

    $response = put_api($url, $headers, $json);
    //print_arr($response['metaData']);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // .
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function hapus_sep()
  {
    $staff = $this->session->userdata('data_auth');

    $headers = generate_headers1();
    $key = generate_key();

    $sep = $this->input->post('sep');

    $data['request']['t_sep']['noSep'] = $sep;
    $data['request']['t_sep']['user'] = $staff->nama;
    // $data['request']['t_sep']['user'] = 'tes';
    $json = json_encode($data);
    $url = base_vclaim() . "SEP/2.0/delete";
    $response = delete_api($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      $this->M_SEP->update(['no_sep' => ''], ['no_sep' => $sep], 'pelayanan');
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $this->M_SEP->update(['no_sep' => ''], ['no_sep' => $sep], 'pelayanan');
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function hapus_sep_internal()
  {
    $headers = generate_headers1();
    $key = generate_key();

    $sep = $this->input->post('sep');
    $no_surat = $this->input->post('no_surat');
    $tgl = $this->input->post('tgl');
    $poli = $this->input->post('poli');

    $data['request']['t_sep']['noSep'] = $sep;
    $data['request']['t_sep']['noSurat'] = $no_surat;
    $data['request']['t_sep']['tglRujukanInternal'] = $tgl;
    $data['request']['t_sep']['kdPoliTuj'] = $poli;
    $data['request']['t_sep']['user'] = 'coba';
    $json = json_encode($data);
    $url = base_vclaim() . "SEP/Internal/delete";
    $response = delete_api($url, $headers, $json);
    print_arr($response['metaData']);

    $decript = stringDecrypt($key, $response['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function update_tgl_pulang()
  {
    $no_sep = $this->input->post('noSep');
    $data['request']['t_sep']['noSep'] = $this->input->post('noSep');
    $data['request']['t_sep']['statusPulang'] = $this->input->post('statusPulang'); //1:Atas Persetujuan Dokter, 3:Atas Permintaan Sendiri, 4:Meninggal, 5:Lain-lain}
    $data['request']['t_sep']['noSuratMeninggal'] = $this->input->post('noSuratMeninggal'); //diisi jika statusPulang 4
    $data['request']['t_sep']['tglMeninggal'] = $this->input->post('tglMeninggal'); //diisi jika statusPulang 4
    $data['request']['t_sep']['tglPulang'] = $this->input->post('tglPulang');
    $data['request']['t_sep']['noLPManual'] = $this->input->post('noLPManual');
    $data['request']['t_sep']['user'] = 'test1';

    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "SEP/2.0/updtglplg";

    $response = put_api($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);

      $datapel = array(
        'tgl_keluar' =>  date("Y-m-d H:i:s"),
        'status_rawat' => 'selesai'
      );
      $this->M_SEP->update($datapel, ['no_sep' => $no_sep], 'pelayanan');
      $out['status'] = 'success';
    } else {
      $out['status'] = $response['metaData']['message'];
    }
    echo json_encode($out);
  }

  public function pengajuan_sep()
  {
    $staff = $this->session->userdata('data_auth');


    $data['request']['t_sep']['noKartu'] = $this->input->post('noKartu');
    $data['request']['t_sep']['tglSep'] = $this->input->post('tglSep');
    $data['request']['t_sep']['jnsPelayanan'] = $this->input->post('jnsPelayanan');
    $data['request']['t_sep']['jnsPengajuan'] = $this->input->post('jnsPengajuan');
    $data['request']['t_sep']['keterangan'] = $this->input->post('keterangan');;
    $data['request']['t_sep']['user'] = $staff->nama;

    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "Sep/pengajuanSEP";

    $response = post($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // .
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = $response['metaData']['message'];
    }
    echo json_encode($out);
  }

  public function approval_sep()
  {
    $staff = $this->session->userdata('data_auth');
    $jenis = $this->input->post('jnsPengajuan'); //1->backdate

    if ($jenis == "1") {
      $data['request']['t_sep']['noKartu'] = $this->input->post('noKartu');
      $data['request']['t_sep']['tglSep'] = $this->input->post('tglSep');
      $data['request']['t_sep']['jnsPelayanan'] = $this->input->post('jnsPelayanan');
      $data['request']['t_sep']['keterangan'] = $this->input->post('keterangan');
      $data['request']['t_sep']['user'] = $staff->nama;
    } else {
      $data['request']['t_sep']['noKartu'] = $this->input->post('noKartu');
      $data['request']['t_sep']['tglSep'] = $this->input->post('tglSep');
      $data['request']['t_sep']['jnsPelayanan'] = $this->input->post('jnsPelayanan');
      $data['request']['t_sep']['jnsPengajuan'] = $this->input->post('jnsPengajuan');
      $data['request']['t_sep']['keterangan'] = $this->input->post('keterangan');
      $data['request']['t_sep']['user'] = $staff->nama;
    }


    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "Sep/aprovalSEP";

    $response = post($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // .
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = $response['metaData']['message'];
    }
    echo json_encode($out);
  }


  public function getListTglPulang()
  {
    $headers = generate_headers();
    $key = generate_key();


    $filter = $this->input->post('filter');
    $date = $this->input->post('bulan');
    $vbulan = date("m", $date); //format bulan 
    $vtahun = date('Y', $date); //format tahun 

    $url = base_vclaim() . "Sep/updtglplg/list/bulan/$vbulan/tahun/$vtahun/$filter";


    $data = get($url, $headers);

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    print_arr($response);

    echo json_encode($response);
  }
  public function getSEPInternal()
  {
    $headers = generate_headers();
    $key = generate_key();
    /**
    Getting record from API Aplicares
     */
    $sep = $this->input->post('sep');
    $url = base_vclaim() . "SEP/Internal/" . $sep;


    $data = get($url, $headers);
    // curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }

  public function get_sep_suplesi()
  {
    $headers = generate_headers();
    $key = generate_key();
    /**
    Getting record from API Aplicares
     */
    $kartu = $this->input->post('kartu');
    $tgl = $this->input->post('tgl');
    $url = base_vclaim() . "sep/JasaRaharja/Suplesi/$kartu/tglPelayanan/$tgl";


    $data = get($url, $headers);
    // curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }

  public function get_kll()
  {
    $headers = generate_headers();
    $key = generate_key();
    /**
    Getting record from API Aplicares
     */
    $kartu = $this->input->post('kartu');
    $tgl = $this->input->post('tgl');
    $url = base_vclaim() . "sep/KllInduk/List/$kartu";


    $data = get($url, $headers);
    // curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  /////////////////////////// RUJUKAN//////////////////////////////

  public function insert_rujukan()
  {
    $staff = $this->session->userdata('data_auth');

    $tgl = date("Y-m-d");

    $data['request']['t_rujukan']['noSep'] = $this->input->post('noSep');
    $data['request']['t_rujukan']['tglRujukan'] = $this->input->post('tglRujukan');
    $data['request']['t_rujukan']['tglRencanaKunjungan'] = $this->input->post('tglRencanaKunjungan');
    $data['request']['t_rujukan']['ppkDirujuk'] = $this->input->post('ppkDirujuk');
    $data['request']['t_rujukan']['jnsPelayanan'] = $this->input->post('jnsPelayanan'); //1-> rawat inap, 2-> rawat jalan
    $data['request']['t_rujukan']['catatan'] = $this->input->post('catatan');
    $data['request']['t_rujukan']['diagRujukan'] = $this->input->post('diagRujukan');
    $data['request']['t_rujukan']['tipeRujukan'] = $this->input->post('tipeRujukan'); //0->Penuh, 1->Partial, 2->balik PRB
    $data['request']['t_rujukan']['poliRujukan'] = $this->input->post('poliKontrol');
    $data['request']['t_rujukan']['user'] = $staff->nama;
    $json = json_encode($data);
    // print_r($json);
    $key = generate_key();
    $headers = generate_headers1();
    $url = base_vclaim() . "Rujukan/2.0/insert";

    $response = post($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // .
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function update_rujukan()
  {
    $staff = $this->session->userdata('data_auth');

    $data['request']['t_rujukan']['noRujukan'] = $this->input->post('noRujukan');
    $data['request']['t_rujukan']['tglRujukan'] = $this->input->post('tglRujukan');
    $data['request']['t_rujukan']['tglRencanaKunjungan'] = $this->input->post('tglRencanaKunjungan');
    $data['request']['t_rujukan']['ppkDirujuk'] = $this->input->post('ppkDirujuk');
    $data['request']['t_rujukan']['jnsPelayanan'] = $this->input->post('jnsPelayanan');
    $data['request']['t_rujukan']['catatan'] = $this->input->post('catatan');
    $data['request']['t_rujukan']['diagRujukan'] = $this->input->post('diagRujukan');
    $data['request']['t_rujukan']['tipeRujukan'] = $this->input->post('tipeRujukan');
    $data['request']['t_rujukan']['poliRujukan'] = $this->input->post('poliRujukan');
    $data['request']['t_rujukan']['user'] = $staff->nama;
    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "Rujukan/2.0/Update";

    $response = put_api($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // .
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function hapus_rujukan()
  {
    $staff = $this->session->userdata('data_auth');

    $headers = generate_headers1();
    $key = generate_key();

    $no = $this->input->post('no');

    $data['request']['t_rujukan']['noRujukan'] = $no;
    $data['request']['t_rujukan']['user'] = $staff->nama;
    $json = json_encode($data);
    $url = base_vclaim() . "Rujukan/delete";
    $response = delete_api($url, $headers, $json);
    //print_arr($response);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // .
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }

  public function insert_rujukan_khusus()
  {
    $data['noRujukan'] = $this->input->post('norujukan');
    $data['diagnosa'][0]['kode'] = 'P;' . $this->input->post('diagnosa1');
    $data['diagnosa'][1]['kode'] = 'S;' . $this->input->post('diagnosa2');
    $data['procedure'][0]['kode'] = $this->input->post('prosedur');
    $data['user'] = 'tes';
    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();

    $url = base_vclaim() . "Rujukan/Khusus/insert";

    $response = post($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      // print_arr($response);
      // .
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function hapus_rujukan_khusus()
  {
    $staff = $this->session->userdata('data_auth');
    $headers = generate_headers1();
    $key = generate_key();

    $id = $this->input->post('id');
    $no = $this->input->post('no');

    $data['request']['t_rujukan']['idRujukan'] = $id;
    $data['request']['t_rujukan']['noRujukan'] = $no;
    $data['request']['t_rujukan']['user'] = $staff->nama;
    $json = json_encode($data);
    $url = base_vclaim() . "Rujukan/Khusus/delete";
    $response = delete_api($url, $headers, $json);
    // print_arr($response);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      // print_arr($decript);

      $response = json_decode(decompress($decript), true);
      $out['status'] = 'success';
      $out['data'] = $response;
      // print_arr($response);
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($response);
  }


  public function cari_rujukan_by_kartu()
  {
    $headers = generate_headers();
    $key = generate_key();

    //$kartu = "0000022706054";
    $kartu = $this->input->post('kartu');
    $tgl_sep = "2020-02-27";
    $sep = "0067R0030220V003197";
    $url = base_vclaim() . "Rujukan/List/Peserta/" . $kartu;


    $data = get($url, $headers);

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response);
  }
  public function cari_rujukan_by_kartuRs()
  {
    $headers = generate_headers();
    $key = generate_key();

    $kartu = $this->input->post('kartu');
    $url = base_vclaim() . "Rujukan/RS/List/Peserta/" . $kartu;


    $data = get($url, $headers);

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    print_arr($response);

    echo json_encode($response);
  }
  public function cari_rujukan_by_no() //Pcare
  {
    $headers = generate_headers();
    $key = generate_key();

    //$kartu = "0000022706054";
    $no = $this->input->post('no');
    $tgl_sep = "2020-02-27";
    $sep = "0067R0030220V003197";
    $url = base_vclaim() . "Rujukan/" . $no;


    $response = get($url, $headers);

    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      // $this->M_SEP->update(['no_sep' => $no_sep], ['id_pelayanan' => $id_pel], 'pelayanan');
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function cari_rujukan()
  {
    $headers = generate_headers();
    $key = generate_key();

    //$kartu = "0000022706054";
    $no = $this->input->post('no');

    $url1 = base_vclaim() . "Rujukan/" . $no;
    $url2 = base_vclaim() . "Rujukan/RS/" . $no;
    $data1 = get($url1, $headers);
    $data2 = get($url2, $headers);


    if ($data1['metaData']['code'] == 200) {
      $decript1 = stringDecrypt($key, $data1['response']);
      //print_arr($decript);

      $response1 = json_decode(decompress($decript1), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      // $this->M_SEP->update(['no_sep' => $no_sep], ['id_pelayanan' => $id_pel], 'pelayanan');
      $out['status'] = 'success';
      $out['data'] = $response1;
    } else if ($data2['metaData']['code'] == 200) {

      $decript2 = stringDecrypt($key, $data2['response']);
      $response2 = json_decode(decompress($decript2), true);

      $out['status'] = 'success';
      $out['data'] = $response2;
    } else if ($data1['metaData']['code'] != 200) {
      $out['status'] = $data1['metaData']['message'];
    } else if ($data2['metaData']['code'] != 200) {
      $out['status'] = $data2['metaData']['message'];
    }
    echo json_encode($out);
  }
  public function cari_rujukanRS_by_no() //RS
  {
    $headers = generate_headers();
    $key = generate_key();

    //$kartu = "0000022706054";
    $no = $this->input->post('no');
    $url = base_vclaim() . "Rujukan/RS/" . $no;


    $data = get($url, $headers);

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    print_arr($response);

    echo json_encode($response);
  }
  public function listRujukanKeluar() //keluar rs
  {
    $headers = generate_headers();
    $key = generate_key();


    $tglMulai = $this->input->post('mulai');
    $tglAkhir = $this->input->post('akhir');

    $url = base_vclaim() . "Rujukan/Keluar/List/tglMulai/$tglMulai/tglAkhir/$tglAkhir";


    $data = get($url, $headers);
    // print_r($data);

    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);

      $response = $response['list'];
      //var_dump(count($response));

      for ($i = 0; $i < count($response); $i++) {

        $no = $i + 1;
        $noSurat = $response[$i]['noRujukan'];
        $nama = $response[$i]['nama'];
        if ($response[$i]['jnsPelayanan'] == 1) {
          $jenis = "Rawat Inap";
        } else {
          $jenis = "Rawat Jalan";
        }


        $ppk = $response[$i]['namaPpkDirujuk'];
        $tgl = $response[$i]['tglRujukan'];
        $noKartu = $response[$i]['noKartu'];

        $edit =
          "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_kontrol(\"" .  $noSurat . "\")' ><i class='icon-rocket'></i></button>
        <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_ranap(\"" .  $noSurat . "\")' '><i class='fa fa-trash'></i></button>";
        $cetak =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('SEP/cetak_rujukan/') . $noSurat . "'><i class='icon-printer'></i></a>";

        $out[$i] = array($no, $cetak, $edit, $nama,  $noSurat, $jenis, $ppk, $tgl);
      }
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
  public function getDataRujukanKeluar() //keluar rs berdasarkan no rujukan
  {
    $headers = generate_headers();
    $key = generate_key();

    $no = $this->input->post('no');
    $tgl_sep = "2020-02-27";
    $id = "0067U0030322P000841";

    $url = base_vclaim() . "Rujukan/Keluar/$no";
    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    print_arr($response);

    echo json_encode($response);
  }
  public function listRujukanKhusus()
  {
    $headers = generate_headers();
    $key = generate_key();


    $date = $this->input->post('bulan');
    $vbulan = date("m", strtotime($date)); //format bulan 
    $vtahun = date('Y', strtotime($date)); //format tahun 

    $url = base_vclaim() . "Rujukan/Khusus/List/Bulan/$vbulan/Tahun/$vtahun";


    $data = get($url, $headers);

    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      $response = $response['rujukan'];
      //var_dump(count($response));

      for ($i = 0; $i < count($response); $i++) {

        $no = $i + 1;
        $noSurat = $response[$i]['norujukan'];
        $nama = $response[$i]['nmpst'];


        $diagppk = $response[$i]['diagppk'];
        $tgl = $response[$i]['tglrujukan_awal'];
        $tglrujukan_berakhir = $response[$i]['tglrujukan_berakhir'];
        $noKartu = $response[$i]['nokapst'];
        $idrujukan = $response[$i]['idrujukan'];

        $edit =
          " <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_ranap(\"" .  $noSurat . "\",\"" . $idrujukan . "\")' '><i class='fa fa-trash'></i></button>";
        $cetak =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('SEP/cetak_rujukan/') . $noSurat . "'><i class='icon-printer'></i></a>";

        $out[$i] = array($no, $cetak, $edit, $noSurat, $noKartu, $nama, $diagppk, $tgl, $tglrujukan_berakhir);
      }
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
  public function listRujukanSpesialistik()
  {
    $headers = generate_headers();
    $key = generate_key();


    $tgl = $this->input->post('tgl');
    $ppk = $this->input->post('ppk');

    $url = base_vclaim() . "Rujukan/ListSpesialistik/PPKRujukan/$ppk/TglRujukan/$tgl";


    $data = get($url, $headers);

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function listRujukanSarana()
  {
    $headers = generate_headers();
    $key = generate_key();

    $ppk = $this->input->post('ppk');

    $url = base_vclaim() . "Rujukan/ListSarana/PPKRujukan/$ppk";


    $data = get($url, $headers);

    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function getJumlahSEPRujukan()
  {
    $headers = generate_headers();
    $key = generate_key();

    //$kartu = "0000022706054";
    $jenis = $this->input->post('jenis');
    $no = $this->input->post('no');

    ////////////// JUMLAH SEP RANAP///////////////////////////
    $url = base_vclaim() . "Rujukan/JumlahSEP/2/$no";
    $data = get($url, $headers);

    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    ////////////// JUMLAH SEP RAJAL///////////////////////////
    $url1 = base_vclaim() . "Rujukan/JumlahSEP/1/$no";
    $data1 = get($url1, $headers);

    //print_arr($data['metaData']);
    $decript1 = stringDecrypt($key, $data1['response']);
    //print_arr($decript);

    $response1 = json_decode(decompress($decript1), true);
    //print_arr($response);


    $response = [
      'metaData' => $data['metaData'],
      'metaData1' => $data1['metaData'],
      'data' => $response,
      'data1' => $response1
    ];
    echo json_encode($response);
  }
  public function getDataRujukan()
  {
    $headers = generate_headers();
    $key = generate_key();

    $kartu = $this->input->post('kartu');
    $tgl_sep = "2020-02-27";
    $id = "0067U0030322P000841";

    $url = base_vclaim() . "Rujukan/" . $id;
    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    print_arr($response);

    echo json_encode($response);
  }
  /////////////////////////// RENCANA KONTROL//////////////////////////////
  public function insert_kontrol()
  {
    $staff = $this->session->userdata('data_auth');
    $dpjp = $this->input->post('dpjp');
    $kode_dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row()->kode_dokter;
    // echo $kode_dokter;
    //0067R0030422V000010
    $data['request']['noSEP'] = $this->input->post('noSEP');
    $data['request']['kodeDokter'] = $kode_dokter;
    $data['request']['poliKontrol'] = $this->input->post('poliKontrol');
    $data['request']['tglRencanaKontrol'] = $this->input->post('tglRencanaKontrol');
    $data['request']['user'] = $staff->nama;
    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "/RencanaKontrol/insert";

    $response = post($url, $headers, $json);

    //print_arr($response);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      // $this->M_SEP->update(['no_sep' => $no_sep], ['id_pelayanan' => $id_pel], 'pelayanan');
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function update_kontrol()
  {
    $staff = $this->session->userdata('data_auth');
    $dpjp = $this->input->post('dpjp');
    $kode_dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row()->kode_dokter;
    $tgl_sep = $this->input->post('tgl');
    //$tgl_sep = date("Y-m-d");

    $data['request']['noSuratKontrol'] = $this->input->post('noSurat');
    $data['request']['noSEP'] = $this->input->post('noSEP');
    $data['request']['kodeDokter'] = $kode_dokter;
    $data['request']['poliKontrol'] = $this->input->post('poliKontrol');
    $data['request']['tglRencanaKontrol'] = $this->input->post('tglRencanaKontrol');
    $data['request']['user'] = $staff->nama;
    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "/RencanaKontrol/Update";

    $response = put_api($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      // $this->M_SEP->update(['no_sep' => $no_sep], ['id_pelayanan' => $id_pel], 'pelayanan');
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function hapus_kontrol()
  {
    $staff = $this->session->userdata('data_auth');
    $headers = generate_headers1();
    $key = generate_key();

    $no = $this->input->post('no');

    $data['request']['t_suratkontrol']['noSuratKontrol'] = $no;
    $data['request']['t_suratkontrol']['user'] = $staff->nama;
    $json = json_encode($data);
    $url = base_vclaim() . "RencanaKontrol/Delete";
    $response = delete_api($url, $headers, $json);
    //print_arr($response);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      // $this->M_SEP->update(['no_sep' => $no_sep], ['id_pelayanan' => $id_pel], 'pelayanan');
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function insert_spri()
  {

    $staff = $this->session->userdata('data_auth');
    $dpjp = $this->input->post('dpjp');
    $kode_dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row()->kode_dokter;
    //0067R0030422V000010
    $data['request']['noKartu'] = $this->input->post('noKartu');
    $data['request']['kodeDokter'] = $kode_dokter;
    $data['request']['poliKontrol'] = $this->input->post('poliKontrol');
    $data['request']['tglRencanaKontrol'] = $this->input->post('tglRencanaKontrol');
    $data['request']['user'] = $staff->nama;
    $json = json_encode($data);
    //print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "/RencanaKontrol/InsertSPRI";

    $response = post($url, $headers, $json);

    //print_arr($response);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      // $this->M_SEP->update(['no_sep' => $no_sep], ['id_pelayanan' => $id_pel], 'pelayanan');

      // $data_history_ranap = array(
      //   'id_history' => $this->M_Pelayanan_masuk->get_ai_tbl_history_ranap(),
      //   'jenis_pelayanan' => 'RAWAT INAP',
      //   'tgl_masuk' => $tgl_masuk,
      //   'dpjp' => $dpjp,
      //   'id_pelayanan' => $id_pelayanan,
      //   'id_kamar' => $id_kamar,
      //   'id_staff' => $id_staff->id_staff,
      // );
      // $data_kamar = array(
      //   'id_riwayat' => $this->M_Pelayanan_masuk->get_ai_tbl_idriway(),
      //   'id_pelayanan' => $id_pelayanan,
      //   'id_kamar' => $id_kamar,
      //   'tanggal_masuk' => $tgl_masuk,
      //   'tanggal_keluar' => NULL,
      //   'status' => $this->input->post('status'),
      //   'id_staff' => $id_staff->id_staff,
      // );

      // $this->M_Pelayanan_masuk->tambah_history_ranap($data_history_ranap);

      // $this->M_Pelayanan_masuk->tambah_kamar($data_kamar);

      // $data_status_kamar = array(
      //   'status' => "dipakai",
      // );
      // $this->M_Pelayanan_masuk->ubah_status_kamar($id_kamar, $data_status_kamar);
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function update_spri()
  {
    $staff = $this->session->userdata('data_auth');
    $tgl_sep = date("Y-m-d");
    $dpjp = $this->input->post('dpjp');
    $kode_dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row()->kode_dokter;

    $data['request']['noSPRI'] = $this->input->post('noSurat');
    $data['request']['kodeDokter'] = $kode_dokter;
    $data['request']['poliKontrol'] = $this->input->post('poliKontrol');
    $data['request']['tglRencanaKontrol'] = $this->input->post('tglRencanaKontrol');
    $data['request']['user'] = $staff->nama;
    $json = json_encode($data);
    //print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "/RencanaKontrol/UpdateSPRI";

    $response = put_api($url, $headers, $json);
    //print_arr($response['metaData']);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);

      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function getRencanaKontrol() //get rencana kontrol / SPRI
  {
    $headers = generate_headers();
    $key = generate_key();

    $no = $this->input->post('no');
    $url = base_vclaim() . "/RencanaKontrol/noSuratKontrol/" . $no;


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);
    $response = [
      'metaData' => $data['metaData'],
      'data' => $response,
    ];
    echo json_encode($response);
  }
  public function getSEPKontrol()
  {
    $headers = generate_headers();
    $key = generate_key();

    $sep = $this->input->post('sep');
    $url = base_vclaim() . "RencanaKontrol/nosep/" . $sep;


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    print_arr($response);

    echo json_encode($response);
  }
  public function getKontrolByKartu()
  {
    $headers = generate_headers();
    $key = generate_key();

    $date = $this->input->post('bulan');
    if ($date == 'now') {
      $vbulan = date("m"); //format bulan 
      $vtahun = date('Y'); //format tahun 
    } else {
      $vbulan = date("m", strtotime($date)); //format bulan 
      $vtahun = date('Y', strtotime($date)); //format tahun 
    }

    $filter = $this->input->post('filter'); //1: tanggal entri, 2: tanggal rencana kontrol
    $nomor = $this->input->post('nomor');
    $history = $this->input->post('history');
    $id_pel = $this->db->get_where('v_kunjungan', ['id_history' => $history])->row()->id_pelayanan;

    $url = base_vclaim() . "RencanaKontrol/ListRencanaKontrol/Bulan/$vbulan/Tahun/$vtahun/Nokartu/$nomor/filter/$filter";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $response = $response['list'];
      //var_dump(count($response));

      for ($i = 0; $i < count($response); $i++) {


        $noSurat = $response[$i]['noSuratKontrol'];
        $jenis = $response[$i]['namaJnsKontrol'];
        $dokter = $response[$i]['namaDokter'];
        $poli = $response[$i]['namaPoliTujuan'];
        $tgl = $response[$i]['tglRencanaKontrol'];
        $noKartu = $response[$i]['noKartu'];
        $jenis_surat = ($jenis == 'SPRI') ? $jenis : 'KONTROL';

        $sep = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('SEP/SEP_kontrol/') . $noKartu . '/' . $id_pel . '/' . $history . '/' . $noSurat . '/' . $jenis_surat . "'><i class='fa fa-pencil'></i></a>";
        $edit =
          "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_kontrol(\"" . $response[$i]['noSuratKontrol'] . "\")' ><i class='icon-rocket'></i></button>
        <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_ranap(\"" . $response[$i]['noSuratKontrol'] . "\")' '><i class='fa fa-trash'></i></button>";
        $cetak =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('SEP/cetak_sprikontrol/') . $noSurat . '/' . $noKartu . "'><i class='icon-printer'></i></a>";

        $out[$i] = array($sep, $edit, $cetak, $noSurat, $jenis, $dokter, $poli, $tgl);
      }
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

  public function getSPRIByKartu()
  {
    $headers = generate_headers();
    $key = generate_key();

    $date = $this->input->post('bulan');
    if ($date == 'now') {
      $vbulan = date("m"); //format bulan 
      $vtahun = date('Y'); //format tahun 
    } else {
      $vbulan = date("m", strtotime($date)); //format bulan 
      $vtahun = date('Y', strtotime($date)); //format tahun 
    }

    $filter = $this->input->post('filter'); //1: tanggal entri, 2: tanggal rencana kontrol
    $nomor = $this->input->post('nomor');
    $history = $this->input->post('history');
    $id_pel = $this->db->get_where('v_kunjungan', ['id_history' => $history])->row()->id_pelayanan;

    $url = base_vclaim() . "RencanaKontrol/ListRencanaKontrol/Bulan/$vbulan/Tahun/$vtahun/Nokartu/$nomor/filter/$filter";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $response = $response['list'];
      //var_dump(count($response));

      for ($i = 0; $i < count($response); $i++) {


        $noSurat = $response[$i]['noSuratKontrol'];
        $jenis = $response[$i]['namaJnsKontrol'];
        $dokter = $response[$i]['namaDokter'];
        $poli = $response[$i]['namaPoliTujuan'];
        $tgl = $response[$i]['tglRencanaKontrol'];
        $noKartu = $response[$i]['noKartu'];

        $sep = "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('SEP/SEP_kontrol/') . $noKartu . '/' . $id_pel . '/' . $history . '/' . $noSurat . "'><i class='fa fa-pencil'></i></a>";
        $edit =
          "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_kontrol(\"" . $response[$i]['noSuratKontrol'] . "\")' ><i class='icon-rocket'></i></button>
        <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_ranap(\"" . $response[$i]['noSuratKontrol'] . "\")' '><i class='fa fa-trash'></i></button>";
        $cetak =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('SEP/cetak_sprikontrol/') . $noSurat . '/' . $noKartu . "'><i class='icon-printer'></i></a>";

        $out[$i] = array($edit, $cetak, $noSurat, $jenis, $dokter, $poli, $tgl);
      }
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
  public function getListKontrol()
  {
    $headers = generate_headers();
    $key = generate_key();

    $mulai = $this->input->post('mulai');
    $akhir = $this->input->post('akhir');
    $filter = $this->input->post('filter'); //Format filter --> 1: tanggal entri, 2: tanggal rencana kontrol

    $url = base_vclaim() . "RencanaKontrol/ListRencanaKontrol/tglAwal/$mulai/tglAkhir/$akhir/filter/$filter";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function getJadwalSpesialistik()
  {
    $headers = generate_headers();
    $key = generate_key();

    $jenis = $this->input->post('jenis');
    $tgl = $this->input->post('tgl');
    $nomor = $this->input->post('nomor');

    $url = base_vclaim() . "RencanaKontrol/ListSpesialistik/JnsKontrol/$jenis/nomor/$nomor/TglRencanaKontrol/$tgl";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function getJadwalDokter()
  {
    $headers = generate_headers();
    $key = generate_key();

    $jenis = $this->input->post('jenis'); //1:ranap, 2:rajal
    $poli = $this->input->post('poli');
    $tgl = $this->input->post('tgl');

    $url = base_vclaim() . "RencanaKontrol/JadwalPraktekDokter/JnsKontrol/$jenis/KdPoli/$poli/TglRencanaKontrol/$tgl";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  /////////////////////////////////////// PRB //////////////////////////////////////////////
  public function insert_prb()
  {
    $sep = $this->input->post('sep');
    $tgl_sep = date("Y-m-d");
    $rows = $this->db->get_where('obat_prb', ['noSep' => $sep])->result();

    $data['request']['t_prb']['noSep'] = $sep;
    $data['request']['t_prb']['noKartu'] =  $this->input->post('noKartu');
    $data['request']['t_prb']['alamat'] = $this->input->post('alamat');
    $data['request']['t_prb']['email'] = $this->input->post('email');
    $data['request']['t_prb']['programPRB'] = $this->input->post('programPrb');
    $data['request']['t_prb']['kodeDPJP'] = $this->input->post('kodeDpjp');
    $data['request']['t_prb']['keterangan'] = $this->input->post('keterangan');
    $data['request']['t_prb']['saran'] = $this->input->post('saran');
    $data['request']['t_prb']['user'] = '123';


    for ($i = 0; $i < count($rows); $i++) {
      $data['request']['t_prb']['obat'][$i]['kdObat'] = $rows[$i]->kdObat;
      $data['request']['t_prb']['obat'][$i]['signa1'] = $rows[$i]->signa1;
      $data['request']['t_prb']['obat'][$i]['signa2'] = $rows[$i]->signa2;
      $data['request']['t_prb']['obat'][$i]['jmlObat'] = $rows[$i]->jumlah;
    }

    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "/PRB/insert";

    $response = post($url, $headers, $json);
    if ($response['metaData']['message'] == 'Sukses') {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $db = [
        'noSep' => $this->input->post('sep'),
        'noKartu' => $this->input->post('noKartu'),
        'alamat' => $this->input->post('alamat'),
        'email' => $this->input->post('email'),
        'programPrb' => $this->input->post('programPrb'),
        'kodeDpjp' => $this->input->post('kodeDpjp'),
        'keterangan' => $this->input->post('keterangan'),
        'saran' => $this->input->post('saran'),
        'id_his' => $this->input->post('id_his'),
        'id_pel' => $this->input->post('id_pel'),
        'noSRB' => $response['noSRB'],
      ];
      $this->M_SEP->insert_tindakan($db, 'form_prb');
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = $response['metaData']['message'];
    }
    echo json_encode($out);
  }
  public function update_prb()
  {
    $sep = $this->input->post('sep');
    $noSrb = $this->input->post('noSrb');
    $tgl_sep = date("Y-m-d");
    $rows = $this->db->get_where('obat_prb', ['noSep' => $sep])->result();

    $data['request']['t_prb']['noSrb'] = $noSrb;
    $data['request']['t_prb']['noSep'] = $sep;
    $data['request']['t_prb']['noKartu'] =  $this->input->post('noKartu');
    $data['request']['t_prb']['alamat'] = $this->input->post('alamat');
    $data['request']['t_prb']['email'] = $this->input->post('email');
    $data['request']['t_prb']['programPRB'] = $this->input->post('programPrb');
    $data['request']['t_prb']['kodeDPJP'] = $this->input->post('kodeDpjp');
    $data['request']['t_prb']['keterangan'] = $this->input->post('keterangan');
    $data['request']['t_prb']['saran'] = $this->input->post('saran');
    $data['request']['t_prb']['user'] = '123';


    for ($i = 0; $i < count($rows); $i++) {
      $data['request']['t_prb']['obat'][$i]['kdObat'] = $rows[$i]->kdObat;
      $data['request']['t_prb']['obat'][$i]['signa1'] = $rows[$i]->signa1;
      $data['request']['t_prb']['obat'][$i]['signa2'] = $rows[$i]->signa2;
      $data['request']['t_prb']['obat'][$i]['jmlObat'] = $rows[$i]->jumlah;
    }
    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "/PRB/Update";

    $response = put_api($url, $headers, $json);
    if ($response['metaData']['message'] == 'OK') {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $db = [

        'email' => $this->input->post('email'),
        'programPrb' => $this->input->post('programPrb'),
        'kodeDpjp' => $this->input->post('kodeDpjp'),
        'keterangan' => $this->input->post('keterangan'),
        'saran' => $this->input->post('saran'),
      ];
      $this->M_SEP->update($db, ['noSRB' => $noSrb], 'form_prb');

      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = $response['metaData']['message'];
    }
    echo json_encode($out);
  }
  public function hapus_prb()
  {
    $headers = generate_headers1();
    $key = generate_key();

    $no = $this->input->post('no');
    $no_sep = $this->input->post('no_sep');

    $data['request']['t_prb']['noSrb'] = $no;
    $data['request']['t_prb']['noSep'] = $no_sep;
    $data['request']['t_prb']['user'] = 'COBA';
    $json = json_encode($data);
    $url = base_vclaim() . "PRB/Delete";
    $response = delete_api($url, $headers, $json);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      // $no_sep = $response['sep']['noSep'];
      // $id_pel = $this->input->post('id_pel');
      // $this->M_SEP->update(['no_sep' => $no_sep], ['id_pelayanan' => $id_pel], 'pelayanan');
      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
  public function getPRB() //keluar rs
  {
    $headers = generate_headers();
    $key = generate_key();


    $tglMulai = $this->input->post('mulai');
    $tglAkhir = $this->input->post('akhir');

    $url = base_vclaim() . "prb/tglMulai/$tglMulai/tglAkhir/$tglAkhir";


    $data = get($url, $headers);
    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $response = $response['prb']['list'];
      //var_dump(count($response));

      for ($i = 0; $i < count($response); $i++) {

        $no = $response[$i]['noSRB'];
        $no_sep = $response[$i]['noSEP'];
        $edit =
          "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_kontrol(\"" .  $no . "\",\"" . $no_sep .  "\")' ><i class='icon-rocket'></i></button>
        <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_ranap(\"" .  $no . "\",\"" . $no_sep .  "\")' '><i class='fa fa-trash'></i></button>";

        $cetak =  "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('Vclaim_bpjs/cetak_prb/') . $no . '/' . $no_sep . "'><i class='icon-printer'></i></a>";

        $out[$i] = array(
          $i + 1,
          $cetak,
          $edit,
          $response[$i]['noSRB'],
          $response[$i]['noSEP'],
          $response[$i]['peserta']['nama'],
          $response[$i]['peserta']['noKartu'],
          $response[$i]['peserta']['email'],
          $response[$i]['peserta']['alamat'],
          $response[$i]['peserta']['noTelepon'],
          indo_date2($response[$i]['tglSRB']),
          $response[$i]['keterangan'],
          $response[$i]['saran'],
          $response[$i]['programPRB']['nama'],
          $response[$i]['DPJP']['nama'],
        );
      }
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
  /////////////////////////////////////// MONITORING ////////////////////////////////////////////////
  public function getMonitoring()
  {
    $headers = generate_headers();
    $key = generate_key();

    $jenis = $this->input->post('jenis'); //1:ranap, 2:rajal
    $tgl = $this->input->post('tgl'); //tgl SEP

    $url = base_vclaim() . "Monitoring/Kunjungan/Tanggal/$tgl/JnsPelayanan/$jenis";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $response = $response['sep'];
      //var_dump(count($response));

      for ($i = 0; $i < count($response); $i++) {
        $poli = ($response[$i]['poli'] != null) ? $this->db->get_where('list_poli', ['kdpoli_bpjs' => $response[$i]['poli']])->row()->nama_panjang : '';
        $out[$i] = array(
          $i + 1,
          $response[$i]['noKartu'],
          $response[$i]['nama'],
          $response[$i]['noSep'],
          $response[$i]['noRujukan'],
          $response[$i]['jnsPelayanan'],
          $poli,
          $response[$i]['kelasRawat'],
          indo_date2($response[$i]['tglSep']),
          indo_date2($response[$i]['tglPlgSep']),
        );
      }
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

  public function getMonitoringKlaim()
  {
    $headers = generate_headers();
    $key = generate_key();

    $jenis = $this->input->post('jenis'); //1:ranap, 2:rajal
    $tgl = $this->input->post('tgl'); //tgl SEP
    $status = $this->input->post('status'); //Status Klaim (1. Proses Verifikasi 2. Pending Verifikasi 3. Klaim)

    $url = base_vclaim() . "Monitoring/Klaim/Tanggal/$tgl/JnsPelayanan/$jenis/Status/$status";


    $data = get($url, $headers);
    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $response = $response['klaim'];
      //var_dump(count($response));

      for ($i = 0; $i < count($response); $i++) {
        // $poli = ($response[$i]['poli']!= null)?$this->db->get_where('list_poli',['kdpoli_bpjs'=>$response[$i]['poli']])->row()->nama_panjang:'';
        $out[$i] = array(
          $i + 1,
          $response[$i]['peserta']['noMR'],
          $response[$i]['peserta']['nama'],
          $response[$i]['peserta']['noKartu'],
          $response[$i]['noSEP'],
          $response[$i]['Inacbg']['kode'] . ' : ' . $response[$i]['Inacbg']['nama'],
          number_format($response[$i]['biaya']['byPengajuan'], 0, ',', '.'),
          number_format($response[$i]['biaya']['byTarifGruper'], 0, ',', '.'),
          number_format($response[$i]['biaya']['byTarifRS'], 0, ',', '.'),
          number_format($response[$i]['biaya']['byTopup'], 0, ',', '.'),
          number_format($response[$i]['biaya']['bySetujui'], 0, ',', '.'),
          $response[$i]['status'],
          $response[$i]['poli'],
          $response[$i]['kelasRawat'],
          indo_date2($response[$i]['tglSep']),
          indo_date2($response[$i]['tglPulang']),
        );
      }
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

  public function getMonitoringHistory()
  {
    $staff = $this->session->userdata('data_auth');

    $headers = generate_headers();
    $key = generate_key();

    $mulai = $this->input->post('mulai'); //tgl SEP
    $akhir = $this->input->post('akhir'); //tgl SEP
    $no = $this->input->post('no'); //no kartu
    // var_dump($no);

    // $mulai = (new DateTime())->modify('-30 day')->format('Y-m-d');;
    // $akhir = date('Y-m-d');

    $url = base_vclaim() . "monitoring/HistoriPelayanan/NoKartu/$no/tglMulai/$mulai/tglAkhir/$akhir";

    // echo $url;
    $data = get($url, $headers);
    // print_arr($data);
    if ($data['metaData']['code'] != 200) {
      $out = null;
    } else {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      // print_arr($response);
      $response = $response['histori'];
      for ($i = 0; $i < count($response); $i++) {


        $no_sep = $response[$i]['noSep'];

        $diagnosa = $response[$i]['diagnosa'];
        $poli = $response[$i]['poli'];
        $tgl = $response[$i]['tglSep'];
        $noRujukan = $response[$i]['noRujukan'];
        $jnsPelayanan = ($response[$i]['jnsPelayanan'] == 1) ? 'Rawat Inap' : 'Rawat Jalan';

        if ($staff->id_staff == '264') {
          $edit = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_sep(\"" . $no_sep . "\")' ><i class='icon-rocket'></i></button>
        <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_sep(\"" . $no_sep . "\")' '><i class='fa fa-trash'></i></button>";
        } else {
          $edit = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_sep(\"" . $no_sep . "\")' ><i class='icon-rocket'></i></button>";
        }

        $cetak =  "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/cetak_sep/') . $no_sep . "'><i class='icon-printer'></i></a>";

        $out[$i] = array($cetak, $edit, $no_sep, $jnsPelayanan, $noRujukan, $diagnosa, $poli, $tgl);
      }
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

  public function getMonitoringJasaRaharja()
  {
    $headers = generate_headers();
    $key = generate_key();

    $mulai = $this->input->post('mulai'); //tgl SEP
    $akhir = $this->input->post('akhir'); //tgl SEP
    $jenis = $this->input->post('jenis'); //1. Rawat Inap, 2. Rawat Jalan

    $url = base_vclaim() . "monitoring/JasaRaharja/JnsPelayanan/$jenis/tglMulai/$mulai/tglAkhir/$akhir";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  /////////////////////////////////////// REFERENSI //////////////////////////////////////////////////
  public function getDokterDpjp()
  {
    $headers = generate_headers();
    $key = generate_key();

    $jnsPelayanan = $this->input->post('jnsPelayanan');
    $tgl_pelayanan = $this->input->post('tgl');
    $spes = $this->input->post('poli');

    $url = base_vclaim() . "referensi/dokter/pelayanan/$jnsPelayanan/tglPelayanan/$tgl_pelayanan/Spesialis/$spes";


    $data = get($url, $headers);
    // print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    print_arr($response);

    echo json_encode($response);
  }
  public function getDokter()
  {
    $headers = generate_headers();
    $key = generate_key();

    $query =  $this->input->post('query');
    $cari = $query['term'];

    $url = base_vclaim() . "referensi/dokter/$cari";


    $data = get($url, $headers);
    print_arr($data);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function cari_poli()
  {
    $headers = generate_headers();
    $key = generate_key();


    $query =  $this->input->post('query');
    $cari = $query['term'];
    $url = base_vclaim() . "referensi/poli/$cari";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);
    $response = $response['poli'];

    echo json_encode($response);
  }
  public function cari_ppk() //faskes
  {
    $headers = generate_headers();
    $key = generate_key();

    $query =  $this->input->post('query');
    $cari = $query['term'];
    $jenis = $this->input->post('jenis');
    // var_dump($cari);

    $url = base_vclaim() . "referensi/faskes/$cari/$jenis";


    $data = get($url, $headers);
    //print_arr($data);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);
    $response = $response['faskes'];

    echo json_encode($response);
  }
  public function getDiagnosa()
  {
    $headers = generate_headers();
    $key = generate_key();

    $query =  $this->input->post('query');
    $cari = $query['term'];

    $url = base_vclaim() . "referensi/diagnosa/$cari";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response['diagnosa']);
  }
  public function getDiagnosaPRB()
  {
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "referensi/diagnosaprb";

    $data = get($url, $headers);
    // print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response['list']);
  }
  public function getObatPRB()
  {
    $headers = generate_headers();
    $key = generate_key();

    $query =  $this->input->post('query');
    $cari = $query['term'];

    $url = base_vclaim() . "referensi/obatprb/$cari";


    $data = get($url, $headers);
    // print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    // print_arr($response);

    echo json_encode($response['list']);
  }
  public function getProsedur()
  {
    $headers = generate_headers();
    $key = generate_key();

    $query =  $this->input->post('query');
    $cari = $query['term'];

    $url = base_vclaim() . "referensi/procedure/$cari";


    $data = get($url, $headers);
    // print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response['procedure']);
  }
  public function getKelasRawat()
  {
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "referensi/kelasrawat";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response['list']);
  }
  public function getRuangrawat()
  {
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "referensi/ruangrawat";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function getSpesialistik()
  {
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "referensi/spesialistik";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function getCaraKeluar()
  {
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "referensi/carakeluar";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function getPascaPulang()
  {
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "referensi/pascapulang";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }
  public function getProvinsi()
  {
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "referensi/propinsi";


    $data = get($url, $headers);
    // print_arr($data);
    // print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response['list']);
  }
  public function getKab()
  {
    $headers = generate_headers();
    $key = generate_key();


    $query =  $this->input->post('prov');
    // $cari = $query['term'];
    $url = base_vclaim() . "referensi/kabupaten/propinsi/$query";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response['list']);
  }
  public function getKec()
  {
    $headers = generate_headers();
    $key = generate_key();


    $query =  $this->input->post('kab');
    // $cari = $query['term'];
    $url = base_vclaim() . "referensi/kecamatan/kabupaten/$query";


    $data = get($url, $headers);
    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);

    echo json_encode($response['list']);
  }
  public function getFingerPrint($noka, $tgl)
  {
    $headers = generate_headers();
    $key = generate_key();


    // $noka =  $this->input->post('noka');
    // $tgl =  $this->input->post('tgl');
    // $cari = $query['term'];
    $url = base_vclaim() . "SEP/FingerPrint/Peserta/$noka/TglPelayanan/$tgl";


    $data = get($url, $headers);
    // print_arr($data['metaData']);
    if ($data['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript));
      //print_arr($response);
      $out = [
        'status' => $data['metaData']['message'],
        'data' => $response,
      ];
    } else {
      $out = [
        'status' => $data['metaData']['message'],

      ];
    }
    return $out;
  }
  public function getFingerPrint_1()
  {
    $headers = generate_headers();
    $key = generate_key();


    $noka =  $this->input->post('noka');
    $tgl =  $this->input->post('tgl');
    // $cari = $query['term'];
    $url = base_vclaim() . "SEP/FingerPrint/Peserta/$noka/TglPelayanan/$tgl";


    $data = get($url, $headers);
    print_arr($data);

    $decript = stringDecrypt($key, $data['response']);
    // print_arr($decript);

    $response = json_decode(decompress($decript));
    print_arr($response);
  }
  public function getListFingerPrint()
  {
    $headers = generate_headers();
    $key = generate_key();

    $tgl =  $this->input->post('tgl');
    // $cari = $query['term'];
    $url = base_vclaim() . "SEP/FingerPrint/List/Peserta/TglPelayanan/$tgl";


    $data = get($url, $headers);
    print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript));
    //print_arr($response);

    echo json_encode($response);
  }

  public function cetak_prb($no, $no_sep)
  {
    $this->load->view('assets/_header');

    $headers = generate_headers();
    $key = generate_key();
    $url = base_vclaim() . "prb/$no/nosep/$no_sep";
    $data = get($url, $headers);
    //print_arr($data['metaData']);
    if ($data['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $data['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);


      if ($response['prb']['noSEP'] != '' || $response['prb']['noSEP'] != NULL) {
        $url1 = base_vclaim() . "SEP/" . $response['prb']['noSEP'];
        $data1 = get($url1, $headers);
        //print_arr($data['metaData']);
        if ($data1['metaData']['code'] == 200) {
          $decript1 = stringDecrypt($key, $data1['response']);
          //print_arr($decript);

          $response1 = json_decode(decompress($decript1), true);
          $page_data['diagnosa'] = $response1['diagnosa'];

          $url2 = base_vclaim() . "Rujukan/" . $response1['noRujukan'];
          $data2 = get($url2, $headers);
          $decript2 = stringDecrypt($key, $data2['response']);
          $response2 = json_decode(decompress($decript2), true);

          $page_data['fktp'] = $response2['rujukan']['provPerujuk']['nama'];
        } else {
          $page_data['diagnosa'] = "";
          $page_data['fktp'] = "";
        }
      } else {
        $page_data['diagnosa'] = "";
        $page_data['fktp'] = "";
      }


      $page_data['data'] = $response;


      $this->load->view('print/cetak_prb_bpjs', $page_data);
    } else {
      echo "<script type='text/javascript'>alert('" . $data['metaData']['message'] . "');window.history.go(-1);</script>";
    }
  }

  public function getListRujukan() //get rencana kontrol / SPRI
  {
    $headers = generate_headers();
    $key = generate_key();

    $noSurat = $this->input->post('noSurat');

    $url = base_vclaim() . "Rujukan/Keluar/" . $noSurat;

    $data = get($url, $headers);
    //print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);
    //print_arr($decript);

    $response = json_decode(decompress($decript), true);
    //print_arr($response);
    $response = [
      'metaData' => $data['metaData'],
      'data' => $response['rujukan'],
    ];
    echo json_encode($response);
  }

  public function simpanPengajuan()
  {
    $staff = $this->session->userdata('data_auth');

    $data['request']['t_sep']['noKartu'] = $this->input->post('no_kartu');
    $data['request']['t_sep']['tglSep'] = $this->input->post('tgl_sep');
    $data['request']['t_sep']['jnsPelayanan'] = $this->input->post('jnsPelayanan');
    $data['request']['t_sep']['jnsPengajuan'] = $this->input->post('jnsPengajuan');
    $data['request']['t_sep']['keterangan'] = $this->input->post('keterangan');
    $data['request']['t_sep']['user'] = $staff->nama;

    $json = json_encode($data);
    //print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "SEP/2.0/pengajuanSEP";

    $response = post($url, $headers, $json);

    //print_arr($response);
    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      //print_arr($decript);

      $response = json_decode(decompress($decript), true);
      //print_arr($response);
      $no_sep = $response['sep']['noSep'];
      $diagnosa_sep = $response['sep']['diagnosa'];
      $diagnosa = str_replace('-', '|', $diagnosa_sep);

      $id_pel = $this->input->post('id_pel');
      $this->M_SEP->update(['no_sep' => $no_sep, 'diagnosa' => $diagnosa], ['id_pelayanan' => $id_pel], 'pelayanan');


      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }


  public function listPengajuanAproval()
  {
    $headers = generate_headers();
    $key = generate_key();


    $date = $this->input->post('bulan');
    $vbulan = date("m", strtotime($date)); //format bulan 
    $vtahun = date('Y', strtotime($date)); //format tahun 
    $vbulan = '02';
    $vtahun = '2024';

    $url = base_vclaim() . "Sep/persetujuanSEP/list/bulan/$vbulan/tahun/$vtahun";

    // echo $url;
    $data = get($url, $headers);
    print_arr($data);

    //   if ($data['metaData']['code'] != 200) {
    //     $out = null;
    //   } else {
    //     $decript = stringDecrypt($key, $data['response']);
    //     //print_arr($decript);

    //     $response = json_decode(decompress($decript), true);
    //     $response = $response['list'];
    //     //var_dump(count($response));

    //     for ($i = 0; $i < count($response); $i++) {

    //       $no = $i + 1;
    //       $nama = $response[$i]['nama'];
    //       if ($response[$i]['jnspelayanan'] != 'RJ') {
    //         $jenis = "Rawat Inap";
    //       } else {
    //         $jenis = "Rawat Jalan";
    //       }

    //       $persetujuan = $response[$i]['persetujuan'];
    //       $tgl = $response[$i]['tglsep'];
    //       $noKartu = $response[$i]['noKartu'];
    //       $status = $response[$i]['status'];


    //       $out[$i] = array($no, $noKartu, $nama, $tgl, $jenis, $persetujuan, $status);
    //     }
    //   }
    //   if ($out == null) {
    //     echo '{"data":""}';
    //     exit;
    //   } else {
    //     $page_data['data'] = $out;
    //     echo json_encode($page_data);
    //     exit;
    //   }
  }

  public function antrian_bpjs($data)
  {

    $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $data['id_pelayanan']]);
    $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $data['id_pelayanan']])->row();
    $peserta = cek_peserta_by_kartu($data['no_kartu']);


    if (count($antrian->result()) > 0) {

      $estimasi = strtotime('+1 minute') * 1000;
      $kuota = 100;
      $inisial = $antrian->row()->inisial;
      $dpjp = $antrian->row()->dpjp;
      $tgl = $data['tgl_sep'];
      $id_antrian = $antrian->row()->id_antrian;

      $antrianJkn = $this->M_SEP->get_antrian($inisial, $dpjp, $tgl);
      $antrianNonJkn = $this->M_SEP->get_antrianNonJkn($inisial, $dpjp, $tgl);

      $jadwal = list_jadwal($data['poli'], $data['tgl_sep']);
      // print_arr($jadwal);
      if ($jadwal != 'no_data') {
        foreach ($jadwal as $row) {
          if ($row->kodedokter == $data['kodeDPJP']) {
            $jam_praktek = $row->jadwal;
          } else {
            $jam_praktek = '08:00-14:00';
          }
        }
      } else {
        $jam_praktek = '08:00-17:00';
      }

      $data_antrol = array(
        "kodebooking" => $id_antrian,
        "jenispasien" => "JKN",
        "nomorkartu" => $data['no_kartu'],
        "nik" => $peserta['data']['peserta']['nik'],
        "nohp" => $data['no_hp'],
        "kodepoli" => $data['poli'],
        "norm" => $pelayanan->id_pasien,
        "tanggalperiksa" => $tgl,
        "kodedokter" => $data['kodeDPJP'],
        "jampraktek" => $jam_praktek,
        "jeniskunjungan" => $data['jeniskunjungan'],
        "nomorreferensi" => $data['no_referensi'],
        "inisial" => strtoupper($inisial),
        "angkaantrean" => $antrian->row()->no_antri,
        "estimasidilayani" => $estimasi,
        "kuota" => $kuota,
        "totaljkn" => $antrianJkn->total_antrian,
        "totalnonjkn" => $antrianNonJkn->total_antrian,
        'id_pelayanan' => $data['id_pelayanan']
      );
      tambah_antrian($data_antrol);

      $pasien1 = $this->M_Pasien->get_pasien_baru($pelayanan->id_pasien)->result();

      if (count($pasien1) > 0) {

        $data_antrol1 = [
          'kodebooking' => $id_antrian,
          'taskid' => 1,
          'waktu' => strtotime($pasien1[0]->tgl_daftar) * 1000
        ];
        update_antrian($data_antrol1);

        $random = strtotime("+" . rand(120, 300) . " seconds", strtotime($pasien1[0]->tgl_daftar));
        $tgl_task2 = date("Y-m-d H:i:s", $random);
        $data_antrol2 = [
          'kodebooking' => $id_antrian,
          'taskid' => 2,
          'waktu' => $random * 1000
        ];
        update_antrian($data_antrol2);

        $data_antrol3 = [
          'kodebooking' => $id_antrian,
          'taskid' => 3,
          // 'waktu' => strtotime("+" . rand(120, 300) . " seconds", strtotime($tgl_task2)) * 1000
          'waktu' => strtotime($pelayanan->tgl_masuk) * 1000
        ];
        update_antrian($data_antrol3);
      } else {
        $data_antrol = [
          'kodebooking' => $id_antrian,
          'taskid' => 3,
          'waktu' => strtotime($pelayanan->tgl_masuk) * 1000
        ];
        update_antrian($data_antrol);
      }
    }
  }

  public function icare()
  {

    $data['param'] = "0002046446919";
    $data['kodedokter'] = 1081;


    $json = json_encode($data);
    // print_r($json);
    $headers = generate_headers_icare();
    $key = generate_key_icare();
    $url = "https://apijkn-dev.bpjs-kesehatan.go.id/ihs_dev/api/rs/validate";


    $response = post($url, $headers, $json);

    echo json_encode($response);
    print_arr($response['response']);

    // if ($response['metaData']['code'] == 200) {
    $decript = stringDecrypt($key, $response['response']);
    print_arr($decript);

    $response = json_decode(decompress($decript), true);
    print_arr($response);
    //   $no_sep = $response['sep']['noSep'];
    //   $diagnosa_sep = $response['sep']['diagnosa'];
    //   $diagnosa = str_replace('-', '|', $diagnosa_sep);

    //   $id_pel = $this->input->post('id_pel');
    //   $this->M_SEP->update(['no_sep' => $no_sep, 'diagnosa' => $diagnosa], ['id_pelayanan' => $id_pel], 'pelayanan');


    //   $out['status'] = 'success';
    //   $out['data'] = $response;
    // } else {
    //   $out['status'] = 'error';
    //   $out['data'] = $response['metaData'];
    // }

    // echo json_encode($out);
  }
  public function get_random_question()
  {
    $headers = generate_headers1();
    $key = generate_key();


    $noka = $this->input->post('noka');
    $tgl = $this->input->post('tgl_sep');

    $url = base_vclaim() . "SEP/FingerPrint/randomquestion/faskesterdaftar/nokapst/$noka/tglsep/$tgl";

    // echo $url;
    $data = get($url, $headers);
    print_arr($data);
    if ($data['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $data['response']);
      print_arr($decript);

      $data = json_decode(decompress($decript), true);
      print_arr($data);

      $out['status'] = 'success';
      $out['data'] = $data;
    } else {
      $out['status'] = 'error';
      $out['data'] = $data['metaData'];
    }
    echo json_encode($out);
  }
  public function post_random_question()
  {
    $staff = $this->session->userdata('data_auth');

    $headers = generate_headers1();
    $key = generate_key();

    $id = $this->input->post('no_kartu');
    $data['request']['t_sep']['noKartu'] = $id;
    $data['request']['t_sep']['tglSep'] = $this->input->post('tgl_sep');
    $data['request']['t_sep']['jenPel'] = $this->input->post('jenPel');
    $data['request']['t_sep']['ppkPelSep'] = $this->input->post('jnsPengajuan');
    $data['request']['t_sep']['ppkPst'] = $this->input->post('tgl_lahir');
    // $data['request']['t_sep']['user'] = $staff->nama;
    $data['request']['t_sep']['user'] = 'tes';

    // $cek_kartu = cek_peserta_by_kartu($id);
    // print_r($cek_kartu);


    // $json = json_encode($data);
    $json = file_get_contents('php://input');
    // print_r($json);
    $headers = generate_headers1();
    $key = generate_key();
    $url = base_vclaim() . "SEP/FingerPrint/randomanswer";

    $response = post($url, $headers, $json);

    if ($response['metaData']['code'] == 200) {
      $decript = stringDecrypt($key, $response['response']);
      print_arr($decript);

      $response = json_decode(decompress($decript), true);
      print_arr($response);

      $out['status'] = 'success';
      $out['data'] = $response;
    } else {
      $out['status'] = 'error';
      $out['data'] = $response['metaData'];
    }
    echo json_encode($out);
  }
}
