<?php
defined('BASEPATH') or exit('No direct script access allowed');




class SEP extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_SEP');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/SEP';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form($id, $id_pel, $id_his)
    {
        // $kartu = base64_decode(urldecode($id));
        $cek_kartu = cek_peserta_by_kartu($id);
        if ($cek_kartu['status'] == 'success') {
            $dbpel = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row();
            $a = explode('_', $id_his);
            if ($a[0] == 'his') {
                $dokter_1 = $this->db->query("SELECT d.kode_dokter,l.kdpoli_bpjs from dokter d, list_poli l,history_pelayanan h where d.dokter_spes=l.kdpoli_bpjs and h.dpjp = d.id_dokter and h.id_history='$id_his'")->row();
                $jadwal = list_jadwal_1($dokter_1->kdpoli_bpjs, date('Y-m-d', strtotime($dbpel->tgl_masuk)), $dokter_1->kode_dokter);
                if ($jadwal != 'no_data') {
                    $jam_praktek = $jadwal->jadwal;
                    $arr = explode('-', $jam_praktek);
                    $jam1 = strtotime($arr[0] . ':00');
                    $jam2 = strtotime($arr[1]);

                    // $jam_praktek = $jam1;
                    // echo $arr[0].':00' . '<br>';

                    $jam_praktek = date('H:i:s', strtotime('-1 hour', $jam1));
                    // echo $jam_praktek . '<br>';
                    date_default_timezone_set('Asia/Jakarta');
                    $hourMin = date('H:i:s');
                    // echo $hourMin . '<br>';

                    if ($hourMin >= $jam_praktek) {
                        $status = true;
                    } else {
                        $status = 'Pembuatan SEP hanya bisa pada Jam' . $jam_praktek;
                    }
                } else {
                    if ($dokter_1->kdpoli_bpjs == 'IRM') {
                        $status = true;
                    } else {
                        $status = 'Jadwal Dokter Tidak Ada';
                    }
                }
            } else {
                $status = true;
            }
            if ($status == true) {
                $this->load->view('assets/_header');
                $page_data['noRujukan'] = "";
                $page_data['kartu'] = $id;
                $page_data['history'] = $id_his;
                $page_data['id_pel'] = $id_pel;
                $page_data['no_rm'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row()->id_pasien;

                $page_data['page_content'] = 'form_vclaim/Form_SEP';

                $this->load->view('Main', $page_data);
                $this->load->view('assets/_footer');
            } else {
                echo "<script type='text/javascript'>alert('" . $status . "');window.history.go(-1);</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('" . $cek_kartu['status'] . "');window.history.go(-1);</script>";
        }
    }

    public function getdata_pelayanan()
    {
        $id_pelayanan = $this->input->post('pelayanan');
        $db = $this->M_SEP->selectDataPelayananby_id($id_pelayanan);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }


    public function getRujukan()
    {
        $headers = generate_headers();
        $kartu = $this->input->post('kartu');
        $history = $this->input->post('history');
        $id_pel = $this->input->post('id_pel');

        $key = generate_key();

        //$kartu = "0000022706054";

        $url = base_vclaim() . "Rujukan/List/Peserta/" . $kartu;


        $data = get($url, $headers);

        //print_arr($data['metaData']);
        $decript = stringDecrypt($key, $data['response']);

        $response = json_decode(decompress($decript), true);
        // $response = json_encode($response);
        // $response=json_decode($response,true);
        //print_arr($response);

        $status = $data['metaData']['code'];
        if ($status == 200) {
            $response = $response['rujukan'];
            for ($i = 0; $i < count($response); $i++) {
                $no = $i + 1;
                $edit = "<a class='btn btn-success btn-icon-anim btn-square'  href='" . base_url('SEP/getDataRujukan/Pcare/') . $response[$i]['noKunjungan'] . "/" . $id_pel . "/" . $history . "'><i class='icon-rocket'></i></a>";

                $noKunjungan = $response[$i]['noKunjungan'];
                $jenis_rawat = $response[$i]['pelayanan']['nama'];
                $perujuk = $response[$i]['provPerujuk']['nama'];
                $poliRujukan = $response[$i]['poliRujukan']['nama'];
                $tglKunjungan = $response[$i]['tglKunjungan'];


                $out[$i] = array($no, $edit, $noKunjungan, $jenis_rawat, $perujuk, $poliRujukan, $tglKunjungan);
            }
        } else {
            $out = null;
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
    public function getRujukanRs()
    {
        $headers = generate_headers();
        $key = generate_key();
        $kartu = $this->input->post('kartu');
        $history = $this->input->post('history');
        $id_pel = $this->input->post('id_pel');

        // Rujukan PCare
        $url = base_vclaim() . "Rujukan/RS/List/Peserta/" . $kartu;
        $data = get($url, $headers);

        // print_arr($data);
        $status = $data['metaData']['code'];
        if ($status == 200) {
            $decript = stringDecrypt($key, $data['response']);
            $response = json_decode(decompress($decript), true);

            // print_arr($response);

            $response = $response['rujukan'];
            for ($i = 0; $i < count($response); $i++) {
                $no = $i + 1;
                $edit = "<a class='btn btn-success btn-icon-anim btn-square'  href='" . base_url('SEP/getDataRujukan/RS/') . $response[$i]['noKunjungan'] . "/" . $id_pel . "/" . $history . "'><i class='icon-rocket'></i></a>";

                $noKunjungan = $response[$i]['noKunjungan'];
                $jenis_rawat = $response[$i]['pelayanan']['nama'];
                $perujuk = $response[$i]['provPerujuk']['nama'];
                $poliRujukan = $response[$i]['poliRujukan']['nama'];
                $tglKunjungan = $response[$i]['tglKunjungan'];


                $out[$i] = array($no, $edit, $noKunjungan, $jenis_rawat, $perujuk, $poliRujukan, $tglKunjungan);
            }
        } else {
            $out = null;
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

    public function SEP_offline($id, $id_pel, $id_his)
    {
        $this->load->view('assets/_header');
        $data = $this->M_SEP->getPasien($id_his);

        $page_data['no_rm'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row()->id_pasien;
        //$page_data['noRujukan'] = "";
        $page_data['id_pel'] = $id_pel;
        $page_data['history'] = $id_his;
        $page_data['kartu'] = $id;
        $page_data['no_surat'] = "";
        $page_data['jenis_surat'] = "";

        $page_data['jenis_pelayanan'] = $data->jenis_pelayanan;
        $page_data['dpjp'] = $data->dpjp;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        //$page_data['action'] = 'input-form';
        $page_data['page_content'] = 'form_vclaim/Modal_sep_offline';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function SEP_kontrol($id, $id_pel, $id_his, $no_surat, $jenis)
    {
        $this->load->view('assets/_header');
        $data = $this->M_SEP->getPasien($id_his);

        $page_data['no_rm'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row()->id_pasien;
        //$page_data['noRujukan'] = "";
        $page_data['id_pel'] = $id_pel;
        $page_data['history'] = $id_his;
        $page_data['jenis_surat'] = $jenis;
        $page_data['kartu'] = $id;
        $page_data['no_surat'] = $no_surat;
        $page_data['jenis_pelayanan'] = $data->jenis_pelayanan;
        $page_data['dpjp'] = $data->dpjp;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        //$page_data['action'] = 'input-form';
        $page_data['page_content'] = 'form_vclaim/Modal_sep_offline';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function getDataRujukan($tipe, $id, $id_pel, $id_his)
    {
        $headers = generate_headers();
        $key = generate_key();

        $tgl_sep = "2020-02-27";
        $sep = "0067R0030220V003197";

        if ($tipe == 'Pcare') {
            $url = base_vclaim() . "Rujukan/" . $id;
            $page_data['jenis_sep'] = '1'; //Rujukan FKTP

        } else {
            $url = base_vclaim() . "Rujukan/RS/" . $id;
            $page_data['jenis_sep'] = '4'; //Rujukan Antar RS

        }
        $data = get($url, $headers);
        //print_arr($data);

        $decript = stringDecrypt($key, $data['response']);

        $response = json_decode(decompress($decript), true);
        //print_arr($response);

        $status = $data['metaData']['code'];
        if ($status == 200) {
            $page_data['asal'] = $response['asalFaskes'];
            $page_data['rujukan'] = $response['rujukan'];
            $page_data['diagnosa'] = $response['rujukan']['diagnosa'];
            $page_data['pelayanan'] = $response['rujukan']['pelayanan'];
            $page_data['ppk_asal'] = $response['rujukan']['provPerujuk'];
            $page_data['tglKunjungan'] = $response['rujukan']['tglKunjungan'];
            $page_data['noKunjungan'] = $response['rujukan']['noKunjungan'];
            $page_data['poliRujukan'] = $response['rujukan']['poliRujukan'];


            $data = $this->M_SEP->getPasien($id_his);
            $dbpasien = $this->db->get_where('pasien', ['no_bpjs' => $response['rujukan']['peserta']['noKartu']])->row_array();
            $page_data['pasien'] = $dbpasien;

            $page_data['peserta'] = $response['rujukan']['peserta'];
            $page_data['dpjp'] = $data->dpjp;
            $page_data['id_pel'] = $id_pel;
            $page_data['history'] = $id_his;
            $page_data['no_rm'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row()->id_pasien;
            $page_data['noRujukan'] = $response['rujukan']['noKunjungan'];
            $page_data['kartu'] = $response['rujukan']['peserta']['noKartu'];

            $page_data['dokter'] = $this->M_SEP->getNamaDPJP();

            $this->load->view('assets/_header');

            $page_data['page_content'] = 'form_vclaim/Modal_sep';
            // $page_data['jumlahSEP'] = $jumlahSEP;
            $this->load->view('Main', $page_data);
            $this->load->view('assets/_footer');
        } else {
            echo "<script type='text/javascript'>alert('" . $data['metaData']['message'] . "');window.history.go(-1);</script>";
        }

        // echo json_encode($data);


    }

    public function cetak_sep($id)
    {
        $this->load->view('assets/_header');

        $headers = generate_headers();
        $key = generate_key();
        $url = base_vclaim() . "SEP/" . $id;
        $data = get($url, $headers);
        //print_arr($data['metaData']);
        if ($data['metaData']['code'] == 200) {
            $decript = stringDecrypt($key, $data['response']);
            //print_arr($decript);

            $response = json_decode(decompress($decript), true);

            if (($response['noRujukan'] != null || $response['noRujukan'] != "") && $response['jnsPelayanan'] != "Rawat Inap") {
                $url1 = base_vclaim() . "Rujukan/" . $response['noRujukan'];
                $url3 = base_vclaim() . "Rujukan/RS/" . $response['noRujukan'];
                $data1 = get($url1, $headers);
                $data3 = get($url3, $headers);
                // print_arr($data1['metaData']);
                if ($data1['metaData']['code'] == 200) {
                    $decript1 = stringDecrypt($key, $data1['response']);
                    // print_arr($decript);

                    $response1 = json_decode(decompress($decript1), true);
                    $page_data['rujukan'] = $response1['rujukan']['provPerujuk']['nama'];
                } else if ($data3['metaData']['code'] == 200) {

                    $decript3 = stringDecrypt($key, $data3['response']);
                    $response3 = json_decode(decompress($decript3), true);
                    $page_data['rujukan'] = $response3['rujukan']['provPerujuk']['nama'];
                } else {
                    $page_data['rujukan'] = "RS BAKTI TIMAH - KOTA PANGKAL PINANG";
                }
            } else {
                $page_data['rujukan'] = "RS BAKTI TIMAH - KOTA PANGKAL PINANG";
            }
            $dbpasien = $this->db->get_where('pasien', ['no_bpjs' => $response['peserta']['noKartu']])->row_array();

            $url2 = base_vclaim() . "/Peserta/nokartu/" . $response['peserta']['noKartu'] . "/tglSEP/" . $response['tglSep'];
            $data2 = get($url2, $headers);

            if ($data2['metaData']['code'] == 200) {
                $decript2 = stringDecrypt($key, $data2['response']);
                $response2 = json_decode(decompress($decript2), true);

                if ($response2['peserta']['mr']['noTelepon'] == '12345678910') {
                    $page_data['noTelepon'] = $dbpasien['no_hp'];
                } else {
                    $page_data['noTelepon'] = $response2['peserta']['mr']['noTelepon'];
                }

                $page_data['hakKelas'] = $response2['peserta']['hakKelas']['keterangan'];
                $page_data['prb'] = $response2['peserta']['informasi']['prolanisPRB'];
            }
            $page_data['data'] = $response;
            $this->M_SEP->update(['no_sep' => $id], ['id_pasien' => $dbpasien['no_rm'], 'date(tgl_masuk)' => $response['tglSep'], 'no_sep' => ''], 'pelayanan');

            $this->load->view('print/cetak_sep_bpjs', $page_data);
        } else {
            echo "<script type='text/javascript'>alert('" . $data['metaData']['message'] . "');window.history.go(-1);</script>";
        }
    }


    public function coba($id)
    {
        $this->load->library('pdf');
        $this->load->view('assets/_header');
        $this->load->library('pdf');
        $headers = generate_headers();
        $key = generate_key();
        $url = base_vclaim() . "SEP/" . $id;
        $data = get($url, $headers);
        //print_arr($data['metaData']);
        if ($data['metaData']['code'] == 200) {
            $decript = stringDecrypt($key, $data['response']);
            //print_arr($decript);

            $response = json_decode(decompress($decript), true);

            if (($response['noRujukan'] != null || $response['noRujukan'] != "") && $response['jnsPelayanan'] != "Rawat Inap") {
                $url1 = base_vclaim() . "Rujukan/" . $response['noRujukan'];
                $url3 = base_vclaim() . "Rujukan/RS/" . $response['noRujukan'];
                $data1 = get($url1, $headers);
                $data3 = get($url3, $headers);
                // print_arr($data1['metaData']);
                if ($data1['metaData']['code'] == 200) {
                    $decript1 = stringDecrypt($key, $data1['response']);
                    // print_arr($decript);

                    $response1 = json_decode(decompress($decript1), true);
                    $page_data['rujukan'] = $response1['rujukan']['provPerujuk']['nama'];
                } else if ($data3['metaData']['code'] == 200) {

                    $decript3 = stringDecrypt($key, $data3['response']);
                    $response3 = json_decode(decompress($decript3), true);
                    $page_data['rujukan'] = $response3['rujukan']['provPerujuk']['nama'];
                } else {
                    $page_data['rujukan'] = "RS BAKTI TIMAH - KOTA PANGKAL PINANG";
                }
            } else {
                $page_data['rujukan'] = "RS BAKTI TIMAH - KOTA PANGKAL PINANG";
            }

            $url2 = base_vclaim() . "/Peserta/nokartu/" . $response['peserta']['noKartu'] . "/tglSEP/" . $response['tglSep'];
            $data2 = get($url2, $headers);
            if ($data2['metaData']['code'] == 200) {
                $decript2 = stringDecrypt($key, $data2['response']);
                $response2 = json_decode(decompress($decript2), true);
                $page_data['noTelepon'] = $response2['peserta']['mr']['noTelepon'];
                $page_data['hakKelas'] = $response2['peserta']['hakKelas']['keterangan'];
                $page_data['prb'] = $response2['peserta']['informasi']['prolanisPRB'];
            }
            $page_data['data'] = $response;
            $this->load->view('print/cetak_sep_bpjs_pdf', $page_data);
            // $this->pdf->createPDF($html, 'Cetak SEP', false);
        } else {
            echo "<script type='text/javascript'>alert('" . $data['metaData']['message'] . "');window.history.go(-1);</script>";
        }
    }

    public function akil()
    {
    }

    public function Rencana_kontrol($id, $sep, $id_his, $id_pel)
    {
        // $kartu = base64_decode(urldecode($id));

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        if ($sep == 'kosong') {
            $page_data['sep'] = "";
        } else {
            $page_data['sep'] = $sep;
        }
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $page_data['id_pel'] = $id_pel;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        $page_data['action'] = base_url('Vclaim_bpjs/insert_kontrol');
        $page_data['action1'] = base_url('Vclaim_bpjs/update_kontrol');
        $page_data['judul'] = "RENCANA KONTROL";



        $page_data['page_content'] = 'form_vclaim/Modal_rencana_kontrol';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Spri($id, $id_his, $id_pel)
    {
        // $kartu = base64_decode(urldecode($id));

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        $page_data['sep'] = "";
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $page_data['id_pel'] = $id_pel;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        $page_data['action'] = base_url('Vclaim_bpjs/insert_spri');
        $page_data['action1'] = base_url('Vclaim_bpjs/update_spri');
        $page_data['judul'] = "SPRI";

        $page_data['page_content'] = 'form_vclaim/Modal_rencana_kontrol';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function getDataKontrol($id, $id_pel, $id_his)
    {
        $headers = generate_headers();
        $key = generate_key();

        $tgl_sep = "2020-02-27";
        $sep = "0067R0030220V003197";

        $url = base_vclaim() . "Rujukan/" . $id;
        $data = get($url, $headers);
        //print_arr($data);

        $decript = stringDecrypt($key, $data['response']);

        $response = json_decode(decompress($decript), true);
        //print_arr($response);

        $status = $data['metaData']['code'];
        if ($status == 200) {
            $page_data['asal'] = $response['asalFaskes'];
            $page_data['rujukan'] = $response['rujukan'];
            $page_data['diagnosa'] = $response['rujukan']['diagnosa'];
            $page_data['pelayanan'] = $response['rujukan']['pelayanan'];
            $page_data['ppk_asal'] = $response['rujukan']['provPerujuk'];
            $page_data['tglKunjungan'] = $response['rujukan']['tglKunjungan'];
            $page_data['noKunjungan'] = $response['rujukan']['noKunjungan'];
            $page_data['poliRujukan'] = $response['rujukan']['poliRujukan'];


            $data = $this->M_SEP->getPasien($id_his);

            $page_data['peserta'] = $response['rujukan']['peserta'];
            $page_data['dpjp'] = $data->dpjp;
            $page_data['id_pel'] = $id_pel;
            $page_data['noRujukan'] = $response['rujukan']['noKunjungan'];
            $page_data['kartu'] = $response['rujukan']['peserta']['noKartu'];
        }

        // echo json_encode($data);
        $dbpasien = $this->db->get_where('pasien', ['no_bpjs' => $response['rujukan']['peserta']['noKartu']])->row_array();
        $page_data['pasien'] = $dbpasien;

        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();

        $this->load->view('assets/_header');
        $page_data['jenis_sep'] = '';
        $page_data['page_content'] = 'form_vclaim/Modal_sep';
        // $page_data['jumlahSEP'] = $jumlahSEP;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function cetak_sprikontrol($id, $kartu)
    {
        $this->load->view('assets/_header');
        $tgl_sep = date("Y-m-d");

        $headers = generate_headers();
        $key = generate_key();
        $url = base_vclaim() . "/RencanaKontrol/noSuratKontrol/" . $id;
        $data = get($url, $headers);
        //print_arr($data['metaData']);
        $decript = stringDecrypt($key, $data['response']);
        //print_arr($decript);

        $url1 = base_vclaim() . "/Peserta/nokartu/$kartu/tglSEP/$tgl_sep";
        $data1 = get($url1, $headers);
        //print_arr($data['metaData']);
        $decript1 = stringDecrypt($key, $data1['response']);


        if ($data['metaData']['code'] == 200) {
            $response = json_decode(decompress($decript), true);
            $response1 = json_decode(decompress($decript1), true);
            $page_data['data'] = $response;
            $page_data['kartu'] = $response1;

            $this->load->view('print/cetak_sprikontrol_bpjs', $page_data);
        } else {
            echo "<script type='text/javascript'>alert('" . $data['metaData']['message'] . "');window.history.go(-1);</script>";
        }
    }

    public function list_sep()
    {
        $headers = generate_headers();
        $key = generate_key();


        $kartu = $this->input->post('kartu');
        $page_data = $this->M_SEP->list_sep($kartu);

        $out = null;
        //print_arr($data['metaData']);
        for ($i = 0; $i < count($page_data); $i++) {


            $no_sep = $page_data[$i]['no_sep'];
            if (strlen($no_sep) == 19) {
                $url = base_vclaim() . "SEP/" . $no_sep;
                $data = get($url, $headers);


                //print_r($data);

                if ($data['metaData']['code'] == 200) {
                    $decript = stringDecrypt($key, $data['response']);
                    $response = json_decode(decompress($decript), true);
                    $diagnosa = $response['diagnosa'];
                    if ($response['jnsPelayanan'] == 'Rawat Inap') {
                        $poli = "RAWAT INAP";
                    } else {
                        $poli = $response['poli'];
                    }
                    $tgl = $response['tglSep'];
                } else {
                    $diagnosa = "";
                    $poli = "";
                    $tgl = "";
                }
            } else {
                $diagnosa = "";
                $poli = "";
                $tgl = "";
            }



            // $edit = "";
            $edit = "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_sep(\"" . $no_sep . "\")' ><i class='icon-rocket'></i></button>
            <button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='delete_sep(\"" . $no_sep . "\")' '><i class='fa fa-trash'></i></button>";

            $cetak =  "<a class='btn btn-primary btn-icon-anim btn-square' href='" . base_url('SEP/cetak_sep/') . $no_sep . "'><i class='icon-printer'></i></a>";

            $out[$i] = array($cetak, $edit, $no_sep, $diagnosa, $poli, $tgl);
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
    public function getDokterById()
    {
        $dpjp = $this->input->post('kode_dokter');
        $id_dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row()->kode_dokter;
        echo json_encode($id_dokter);
    }
    public function getDokter()
    {
        $dpjp = $this->input->post('kode_dokter');
        $id_dokter = $this->db->get_where('dokter', ['kode_dokter' => $dpjp])->row()->id_dokter;
        echo json_encode($id_dokter);
    }
    public function getPoli()
    {
        $poli = $this->input->post('poli');
        $kdpoli_bpjs = $this->db->get_where('list_poli', ['nmpoli_bpjs' => $poli])->row()->kdpoli_bpjs;
        echo json_encode($kdpoli_bpjs);
    }
    public function getDiagnosa()
    {
        $diagnosa = $this->input->post('diagnosa');
        $kode = $this->db->get_where('list_diagnosa', ['nama_diagnosa' => $diagnosa])->row()->id_diagnosa;
        if (strlen($kode) > 3) {
            $kode = str_split($kode, 3);
            $kode = $kode[0] . '.' . $kode[1];
        } else {
            $kode = $kode;
        }


        echo json_encode($kode);
    }
    public function Get_SEP($id, $id_pel, $id_his)
    {
        // $kartu = base64_decode(urldecode($id));

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        $page_data['id_pel'] = $id_pel;
        $page_data['history'] = $id_his;

        $page_data['page_content'] = 'form_vclaim/Modal_edit_sep';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Rujukan($id, $sep, $id_his, $id_pel)
    {
        // $kartu = base64_decode(urldecode($id));
        $data = $this->M_SEP->getPasien($id_his);

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        if ($sep == 'kosong') {
            $page_data['sep'] = '';
        } else {
            $page_data['sep'] = $sep;
        }
        $page_data['history'] = $id_his;
        $page_data['id_pel'] = $id_pel;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        $page_data['jenis_pelayanan'] = $data->jenis_pelayanan;
        $page_data['action'] = base_url('Vclaim_bpjs/insert_rujukan');
        $page_data['action1'] = base_url('Vclaim_bpjs/update_rujukan');
        $page_data['judul'] = "RUJUKAN";

        $page_data['page_content'] = 'form_vclaim/Modal_rujukan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function List_rujukan()
    {
        // $kartu = base64_decode(urldecode($id));


        $this->load->view('assets/_header');

        $page_data['page_content'] = 'form_vclaim/List_rujukan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function cetak_rujukan($no)
    {
        $this->load->view('assets/_header');
        $tgl_sep = date("Y-m-d");

        $headers = generate_headers();
        $key = generate_key();
        $url = base_vclaim() . "Rujukan/Keluar/$no";
        $data = get($url, $headers);
        //print_arr($data['metaData']);
        $decript = stringDecrypt($key, $data['response']);
        //print_arr($decript);

        // $url1 = base_vclaim() . "/Peserta/nokartu/$kartu/tglSEP/$tgl_sep";
        // $data1 = get($url1, $headers);
        // //print_arr($data['metaData']);
        // $decript1 = stringDecrypt($key, $data1['response']);


        if ($data['metaData']['code'] == 200) {
            $response = json_decode(decompress($decript), true);
            // $response1 = json_decode(decompress($decript1), true);
            $page_data['data'] = $response;
            // $page_data['kartu'] = $response1;

            $this->load->view('print/cetak_rujukan_bpjs', $page_data);
        } else {
            echo "<script type='text/javascript'>alert('" . $data['metaData']['message'] . "');window.history.go(-1);</script>";
        }
    }
    public function List_rujukan_khusus()
    {
        // $kartu = base64_decode(urldecode($id));


        $this->load->view('assets/_header');

        $page_data['page_content'] = 'form_vclaim/List_rujukan_khusus';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Pengajuan_backdate($id, $id_his, $id_pel)
    {
        // $kartu = base64_decode(urldecode($id));

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        $page_data['id_pel'] = $id_pel;
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $jns = explode('_', $id_his);
        $page_data['jenis_pelayanan'] = ($jns == 'ranap') ? '1' : '2';


        $page_data['page_content'] = 'form_vclaim/Pengajuan_backdate';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function List_pengajuan_sep()
    {
        // $kartu = base64_decode(urldecode($id));


        $this->load->view('assets/_header');

        $page_data['page_content'] = 'form_vclaim/List_pengajuan_aproval';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Data_icare($id, $id_his, $id_pel)
    {
        // $kartu = base64_decode(urldecode($id));

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        $dokter = $this->db->query("SELECT d.kode_dokter, d.nama from v_kunjungan v, dokter d where v.dpjp = d.id_dokter and v.id_history='$id_his'")->row();
        $pasien = $this->db->query("SELECT p.no_ktp from pelayanan b, pasien p where b.id_pasien = p.no_rm and b.id_pelayanan='$id_pel'")->row();

        $page_data['no_ktp'] = $pasien->no_ktp;
        $page_data['kodedokter'] = $dokter->kode_dokter;
        $page_data['dokter'] = $dokter->nama;

        $page_data['id_pel'] = $id_pel;
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $jns = explode('_', $id_his);
        $page_data['jenis_pelayanan'] = ($jns == 'ranap') ? '1' : '2';


        $page_data['page_content'] = 'form_vclaim/Data_Icare';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function icare_dok($id_pel, $id_his)
    {
        $id_pelayanan = base64_decode(urldecode($id_pel));
        $id_histori = base64_decode(urldecode($id_his));
        $dokter = $this->db->query("SELECT d.kode_dokter, d.nama from v_kunjungan v, dokter d where v.dpjp = d.id_dokter and v.id_history='$id_his'")->row();
        $pasien = $this->db->query("SELECT p.no_bpjs no_bpjs from pelayanan b, pasien p where b.id_pasien = p.no_rm and b.id_pelayanan='$id_pel'")->row();

        $noka = $pasien->no_bpjs;
        $data['param'] = $noka;


        $data['kodedokter'] = intval($dokter->kode_dokter);


        $json = json_encode($data);
        // print_r($json);

        $headers = generate_headers_icare();
        $key = generate_key_icare();
        $url = "https://apijkn.bpjs-kesehatan.go.id/wsihs/api/rs/validate";


        $response = post($url, $headers, $json);

        // echo json_encode($response);
        // print_arr($response['response']);

        if ($response['metaData']['code'] == 200) {
            $decript = stringDecrypt($key, $response['response']);
            // print_arr($decript);

            $response = json_decode(decompress($decript), true);

            // $out['status'] = 'success';
            // $out['url'] = $response['url'];
            header("Location:" . $response['url']);
            // echo '<script>window.onload = function() { window.open("' . $url . '", "_blank"); }</script>';
        } else {
            echo "<script type='text/javascript'>alert('" . $response['metaData']['message'] . "');window.history.go(-1);</script>";
        }
    }
}
