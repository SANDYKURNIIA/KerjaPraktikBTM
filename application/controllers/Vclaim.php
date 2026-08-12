<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Vclaim extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_SEP');
        $this->load->model('M_Kasir');
    }
    public function Peserta()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Modal_cek_kepesertaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Monitoring()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Monitoring';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Monitoring_klaim()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Monitoring_klaim';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Prb()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/cari_prb';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form_PRB($id, $sep, $id_his, $id_pel)
    {
        // $kartu = base64_decode(urldecode($id));

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        if ($sep == 'kosong') {
            $page_data['sep'] = '';
        } else {
            $page_data['sep'] = $sep;
        }
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $page_data['id_pel'] = $id_pel;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        // var_dump($page_data['dokter']);
        $page_data['form_prb'] = $this->M_SEP->getFormPRB($sep);
        $page_data['signa'] = $this->db->get('signa_obat')->result_array();
        $selectPasien = $this->M_SEP->getPasien($id_his);
        $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
        // $page_data['action'] = base_url('Vclaim_bpjs/insert_prb');
        // $page_data['action1'] = base_url('Vclaim_bpjs/update_prb');
        // $page_data['judul'] = "PRB";

        $page_data['page_content'] = 'form_vclaim/form_prb';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insert_obat()
    {
        $db = [
            'noSep' => $this->input->post('noSep'),
            'id_his' => $this->input->post('id_his'),
            'id_pel' => $this->input->post('id_pel'),
            'kdObat' => $this->input->post('kdObat'),
            'nama' => $this->input->post('nama'),
            'signa1' => $this->input->post('signa1'),
            'signa2' => $this->input->post('signa2'),
            'jumlah' => $this->input->post('jumlah'),
        ];
        $this->M_SEP->insert_tindakan($db, 'obat_prb');
        echo json_encode(array("status" => "success"));
    }


    public function tampil_list_obat()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pel = $this->input->post('id_pel');
        $id_his = $this->input->post('id_his');
        $sep = $this->input->post('sep');
        $page_data = $this->db->query("SELECT o.id_obat, o.kdObat,o.nama, s.tindakan signa1, so.tindakan signa2, o.jumlah
        FROM obat_prb o, signa_obat s, signa_obat so where o.signa1 = s.id_signa and o.signa2 = so.id_signa and noSep = '$sep'")->result();

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_obat . "\")' '><i class='icon-rocket'></i></button>";
            $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_obat  . "\")' '><i class='fa fa-trash'></i></button>";
            $kdObat = $page_data[$i]->nama;
            $signa1 = $page_data[$i]->signa1;
            $signa2 = $page_data[$i]->signa2;
            $jumlah = $page_data[$i]->jumlah;
            $out[$i] = array($tombol, $hapus, $kdObat, $signa1, $signa2, $jumlah);
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

    public function get_obat_obatPrb()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('obat_prb', ['id_obat' => $id])->row_array();
        if ($db == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data = $db;
            echo json_encode($page_data);
            exit;
        }
    }

    function edit_obat()
    {
        $data = $this->session->userdata('data_auth');

        $data = array(
            'kdObat' => $this->input->post('kdObat'),
            'nama' => $this->input->post('nama'),
            'signa1' => $this->input->post('signa1'),
            'signa2' => $this->input->post('signa2'),
            'jumlah' => $this->input->post('jumlah'),
        );
        $where = array(
            'id_obat' => $this->input->post('id_form'),
        );
        $this->M_SEP->update_tindakan($data, $where, 'obat_prb');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_obat()
    {
        $id = $this->input->post('id');
        $where = array(
            'id_obat' => $id,
        );
        $this->M_SEP->delete($where, 'obat_prb');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Cari_Sep_Internal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Pencarian_SepInternal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Rujukan_khusus($id, $id_pel, $id_his)
    {
        $this->load->view('assets/_header');
        $data = $this->M_SEP->getPasien($id_his);

        $page_data['no_rm'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row()->id_pasien;
        //$page_data['noRujukan'] = "";
        $page_data['id_pel'] = $id_pel;
        $page_data['history'] = $id_his;
        $page_data['kartu'] = $id;
        $page_data['no_surat'] = "";
        $page_data['jenis_pelayanan'] = $data->jenis_pelayanan;
        $page_data['dpjp'] = $data->dpjp;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        //$page_data['action'] = 'input-form';
        $page_data['page_content'] = 'form_vclaim/Rujukan_Khusus';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function update_no_timah()
    {
        $db = $this->db->query("SELECT * from `TABLE 618` limit 100")->result();
        foreach ($db as $row) {
            $this->M_Kasir->update_tindakan(['no_id_lain' => $row->no_timah], ['no_rm' => $row->no_rm], 'pasien');
            echo  $row->no_rm ."<br>";
        }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Vclaim extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_SEP');
        $this->load->model('M_Kasir');
    }
    public function Peserta()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Modal_cek_kepesertaan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Monitoring()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Monitoring';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Monitoring_klaim()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Monitoring_klaim';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Prb()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/cari_prb';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form_PRB($id, $sep, $id_his, $id_pel)
    {
        // $kartu = base64_decode(urldecode($id));

        $this->load->view('assets/_header');
        $page_data['kartu'] = $id;
        if ($sep == 'kosong') {
            $page_data['sep'] = '';
        } else {
            $page_data['sep'] = $sep;
        }
        $page_data['id_his'] = $id_his;
        $page_data['history'] = $id_his;
        $page_data['id_pel'] = $id_pel;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        // var_dump($page_data['dokter']);
        $page_data['form_prb'] = $this->M_SEP->getFormPRB($sep);
        $page_data['signa'] = $this->db->get('signa_obat')->result_array();
        $selectPasien = $this->M_SEP->getPasien($id_his);
        $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
        // $page_data['action'] = base_url('Vclaim_bpjs/insert_prb');
        // $page_data['action1'] = base_url('Vclaim_bpjs/update_prb');
        // $page_data['judul'] = "PRB";

        $page_data['page_content'] = 'form_vclaim/form_prb';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function insert_obat()
    {
        $db = [
            'noSep' => $this->input->post('noSep'),
            'id_his' => $this->input->post('id_his'),
            'id_pel' => $this->input->post('id_pel'),
            'kdObat' => $this->input->post('kdObat'),
            'nama' => $this->input->post('nama'),
            'signa1' => $this->input->post('signa1'),
            'signa2' => $this->input->post('signa2'),
            'jumlah' => $this->input->post('jumlah'),
        ];
        $this->M_SEP->insert_tindakan($db, 'obat_prb');
        echo json_encode(array("status" => "success"));
    }


    public function tampil_list_obat()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pel = $this->input->post('id_pel');
        $id_his = $this->input->post('id_his');
        $sep = $this->input->post('sep');
        $page_data = $this->db->query("SELECT o.id_obat, o.kdObat,o.nama, s.tindakan signa1, so.tindakan signa2, o.jumlah
        FROM obat_prb o, signa_obat s, signa_obat so where o.signa1 = s.id_signa and o.signa2 = so.id_signa and noSep = '$sep'")->result();

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' onclick='pilih(\"" . $page_data[$i]->id_obat . "\")' '><i class='icon-rocket'></i></button>";
            $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_tindakan(\"" . $page_data[$i]->id_obat  . "\")' '><i class='fa fa-trash'></i></button>";
            $kdObat = $page_data[$i]->nama;
            $signa1 = $page_data[$i]->signa1;
            $signa2 = $page_data[$i]->signa2;
            $jumlah = $page_data[$i]->jumlah;
            $out[$i] = array($tombol, $hapus, $kdObat, $signa1, $signa2, $jumlah);
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

    public function get_obat_obatPrb()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('obat_prb', ['id_obat' => $id])->row_array();
        if ($db == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data = $db;
            echo json_encode($page_data);
            exit;
        }
    }

    function edit_obat()
    {
        $data = $this->session->userdata('data_auth');

        $data = array(
            'kdObat' => $this->input->post('kdObat'),
            'nama' => $this->input->post('nama'),
            'signa1' => $this->input->post('signa1'),
            'signa2' => $this->input->post('signa2'),
            'jumlah' => $this->input->post('jumlah'),
        );
        $where = array(
            'id_obat' => $this->input->post('id_form'),
        );
        $this->M_SEP->update_tindakan($data, $where, 'obat_prb');
        $out['status'] = "success";
        echo json_encode($out);
    }

    function hapus_obat()
    {
        $id = $this->input->post('id');
        $where = array(
            'id_obat' => $id,
        );
        $this->M_SEP->delete($where, 'obat_prb');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Cari_Sep_Internal()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_vclaim/Pencarian_SepInternal';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function Rujukan_khusus($id, $id_pel, $id_his)
    {
        $this->load->view('assets/_header');
        $data = $this->M_SEP->getPasien($id_his);

        $page_data['no_rm'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row()->id_pasien;
        //$page_data['noRujukan'] = "";
        $page_data['id_pel'] = $id_pel;
        $page_data['history'] = $id_his;
        $page_data['kartu'] = $id;
        $page_data['no_surat'] = "";
        $page_data['jenis_pelayanan'] = $data->jenis_pelayanan;
        $page_data['dpjp'] = $data->dpjp;
        $page_data['dokter'] = $this->M_SEP->getNamaDPJP();
        //$page_data['action'] = 'input-form';
        $page_data['page_content'] = 'form_vclaim/Rujukan_Khusus';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function update_no_timah()
    {
        $db = $this->db->query("SELECT * from `TABLE 618` limit 100")->result();
        foreach ($db as $row) {
            $this->M_Kasir->update_tindakan(['no_id_lain' => $row->no_timah], ['no_rm' => $row->no_rm], 'pasien');
            echo  $row->no_rm ."<br>";
        }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
