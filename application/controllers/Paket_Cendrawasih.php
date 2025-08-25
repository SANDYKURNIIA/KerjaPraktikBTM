<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Paket_Cendrawasih extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
        $this->load->model('M_Poli');
        $this->load->model('M_Apotik');
        $this->load->model('M_Rawatinap');
    }

    public function index()
    {
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Paket_cendrawasih';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function getNamaObat()
    {
        $depo = $this->input->post('depo');
        // $data = $this->M_Poli->getNamaObatByDepo($depo);

        $query =  $this->input->post('query');
        $cari = $query['term'];
        $db = $this->M_Rawatinap->getObat($cari);
        foreach ($db as $row) {
            
            $data[] = array(
                'id' => "" . $row['nama'] . "",
                'value' => "" . $row['nama'] . "",
                'id_logistik' => $row['id_logistik'],
                'harga_cost' => $row['harga_cost'],
                'margin' => $row['margin'],
                'ppn' => $row['ppn'],
            );
        }
        echo json_encode($data);
    }
    public function insertDetail()
    {
        $data = $this->session->userdata('data_auth');
        $id = $this->input->post('id');


        $data = array(
            'id_detail_paket' => uniqid(),
            'id_paket' => $this->input->post('id'),
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'nama' => $this->input->post('nama'),
            'frek' => $this->input->post('frek'),
            'tipe' => $this->input->post('tipe'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'id_signa' => $this->input->post('signa'),
            'id_cara_pakai' => $this->input->post('cara_pakai'),
            'tgl' => date('Y-m-d H:i:s'),
        );
        $id_paket = $this->M_mcu->insert_labor($data, 'detail_paket_obat');

        $paket = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $this->input->post('id')]);
        if (count($paket->result()) > 0) {
            $harga = $this->db->query("SELECT sum(total) harga from detail_paket_obat where id_paket ='$id'")->row()->harga;

            $this->M_mcu->update(['harga' => $harga], ['id_paket_mcu' => $id], 'list_paket_mcu');
        }
        $out['status'] = "success";
        $out['id'] = $id_paket;
        echo json_encode($out);
    }
    public function tampil_list_paket()
    {
        $id = $this->input->post('id');

        $page_data = $this->db->query("SELECT d.*, s.tindakan signa,c.cara_pemakaian cara_pakai
        from detail_paket_obat d,signa_obat s,cara_pemakaian_obat c
        where d.id_signa = s.id_signa and d.id_cara_pakai = c.id_cara_pemakaian
        and d.id_paket ='$id'")->result();

        echo json_encode($page_data);
    }
    public function tampil_list_paket1()
    {
        $id = $this->input->post('id');

        $page_data = $this->db->query("SELECT d.*, s.tindakan signa,c.cara_pemakaian cara_pakai
        from detail_paket_obat d,signa_obat s,cara_pemakaian_obat c
        where d.id_signa = s.id_signa and d.id_cara_pakai = c.id_cara_pemakaian
        and d.id_paket ='$id'")->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $tombol = '<button class="btn btn-danger btn-icon-anim btn-square delete" type="button" name="delete" id="' . $page_data[$i]->id_detail_paket . '" ><i class="fa fa-trash"></i></button>';

            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $frek = $page_data[$i]->frek;
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $total = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            $signa = $page_data[$i]->signa;
            $cara_pakai = $page_data[$i]->cara_pakai;

            $out[$i] = array($no,  $nama, $harga, $frek, $total, $signa, $cara_pakai, $tombol);
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
    public function hapus_list_paket()
    {
        $id = $this->input->post('id');
        $id_paket = $this->input->post('id_paket1');
        $this->M_mcu->delete_tindakan($id, 'detail_paket_obat', 'id_detail_paket');

        $paket = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $id_paket]);
        if (count($paket->result()) > 0) {
            $harga = $this->db->query("SELECT sum(total) harga from detail_paket_obat where id_paket ='$id_paket'")->row()->harga;

            $this->M_mcu->update(['harga' => $harga], ['id_paket_mcu' => $id_paket], 'list_paket_mcu');
        }

        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_total_paket()
    {
        $id_paket = $this->input->post('id_paket');
        $data = $this->db->get_where('list_paket_mcu', ['id_paket_mcu' => $id_paket])->result();
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->harga, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }


    public function insert_paket()
    {
        $data = $this->session->userdata('data_auth');
        $id = $this->input->post('id');
        $tindakan = $this->input->post('upTindakan');


        $harga = $this->db->query("SELECT sum(total) harga from detail_paket_obat where id_paket ='$id'")->row()->harga;

        $data = array(
            'id_paket_mcu' => $this->input->post('id'),
            'nama_paket' => $tindakan,
            'harga' => $harga,
            'tgl' => date('Y-m-d H:i:s'),
            'id_staff' => $data->id_staff,
            'status' => 'AKTIF',
            'jenis' => 'Cendrawasih',
        );
        $id_paket = $this->M_mcu->insert_labor($data, 'list_paket_mcu');
        $out['status'] = "success";

        echo json_encode($out);
    }

    public function tampil_paket()
    {
        $page_data = $this->M_Rawatinap->selectPaketCendrawasih();
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $edit =  "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='edit_tindakan_mcu(\"" . $page_data[$i]->id_paket_mcu . "\",\"" . $page_data[$i]->nama_paket .   "\")'><i class='icon-pencil'></i></a>";
            $tombol = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus_paket(\"" . $page_data[$i]->id_paket_mcu . "\",\"" . $page_data[$i]->nama_paket . "\")' '><i class='fa fa-trash'></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_paket;
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            $status = $page_data[$i]->status;

            $out[$i] = array($no, $edit, $tombol,   $nama, $harga, $status);
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

    public function hapus_paket()
    {
        $id = $this->input->post('id');
        $this->M_mcu->delete_tindakan($id, 'detail_paket_obat', 'id_paket');
        $this->M_mcu->delete_tindakan($id, 'list_paket_mcu', 'id_paket_mcu');

        $out['status'] = "success";
        echo json_encode($out);
    }

    //PAKET-------------------------------------------------------------------
    public function get_paket()
    {
        $id_mcu = $this->input->post('id_mcu');
        $db = $this->M_mcu->selectDataPasienMCUby_id($id_mcu);
        if (count($db) > 0) {
            $data = $db[0];
            $db = array(
                'status_dt' => 'found',
                'data' => $data,
            );
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function tampil_list_paket_pasien()
    {
        $id = $this->input->post('id');

        $page_data = $this->M_Rawatinap->selectPaketObatById($id);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            if ($page_data[$i]->status == 0) {
                $request =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='request_paket(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\")' '><i class='fa fa-thumbs-up '></i></button>";

                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_list_paket(\"" . $page_data[$i]->id_resep .  "\")' '><i class='fa fa-trash '></i></button>";
            } elseif ($page_data[$i]->status == 1) {
                $request = "<span class='label label-warning capitalize-font inline-block'>DIPROSES</span>";
                $hapus = "";
            } else {
                $request = "<span class='label label-success capitalize-font inline-block'>SELESAI</span>";
                $hapus = "";
            }
            // $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat1(\"" . $page_data[$i]->id_resep . "\",\"" . $page_data[$i]->jenis_resep . "\",\"" . $page_data[$i]->cara_bayar  .  "\",\"" . $page_data[$i]->depo .  "\",\"" . $id . "\")' '><i class='fa fa-rocket '></i></button>";

            $no = $i + 1;
            $nama = $page_data[$i]->nama_paket;
            // $frek = $page_data[$i]->frek;
            $harga = "Rp. " . number_format($page_data[$i]->harga, 0, ',', '.');
            // $total = "Rp. " . number_format($page_data[$i]->total, 0, ',', '.');
            // $signa = $page_data[$i]->signa;
            // $cara_pakai = $page_data[$i]->cara_pakai;
            $staff = $page_data[$i]->nama;

            $out[$i] = array($no,$request, $nama, $harga, $staff, $hapus);
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
    function insert_paket_pasien()
    {
        $staff = $this->session->userdata('data_auth');
        $id_paket = $this->input->post('id_paket');
        $tgl = date("Y-m-d H:i:s");

        $page_data = array(
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'id_history' => $this->input->post('id_history'),
            'jenis_resep' => 1,
            'nama_resep' => $this->input->post('nama_resep'),
            'depo' => 'RANAP',
            'tanggal' => $tgl,
            'status' => 0,
            'id_staff' => $staff->id_staff,
            'id_paket' => $id_paket,
        );
        $id_resep = $this->M_Poli->insert_tindakan($page_data, 'resep_obat');

        $id_pelayanan = $this->input->post('id_pelayanan');
        $id_history = $this->input->post('id_history');
        //////////////  antrol ///////////////////////

        $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        if (count($antrian->result()) > 0) {
            $data_antrol = [
                'kodebooking' => $antrian->row()->id_antrian,
                'taskid' => 5,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        }
        ////end

        $jenis_pelayanan = $this->input->post('jenis_pelayanan');

        $paket = $this->db->get_where('detail_paket_obat', ['id_paket' => $id_paket])->result();
        if ($jenis_pelayanan == "RAWAT INAP" ||  $jenis_pelayanan == "RANAP") {
            $kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_history])->row()->id_kamar;
            $tipe = $kamar;
        } else {
            $tipe = "NON";
        }
        for ($i = 0; $i < count($paket); $i++) {
            $id_tindakan = uniqid();
            $page_data = array(
                'id_tindakan_farmasi' =>  $id_tindakan,
                'harga' => $paket[$i]->harga,
                'frek' => 0,
                'frek_req' => $paket[$i]->frek,
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'poli' => $this->input->post('id_history'),
                'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
                'id_resep' => $id_resep,
                'id_list_tindakan' => $paket[$i]->id_list_tindakan,
                'total' => $paket[$i]->total,
                'tipe' => $tipe,
                'jumlah_racikan' => 0,
                'kadaluarsa' => "0000-00-00",
                'tanggal' => $tgl,
                'id_staff' => $staff->id_staff,
                'id_signa' => $paket[$i]->id_signa,
                'id_cara_pakai' => $paket[$i]->id_cara_pakai,
                'depo' => $paket[$i]->tipe,
                'hna' => $paket[$i]->harga,
                'margin' => 1.3,
                'disc' => 0,
                'keterangan' => '-',
            );
            $page_data1 = array(
                'id_tindakan_farmasi' =>  $id_tindakan,
                'harga' => $paket[$i]->harga,
                'frek' => $paket[$i]->frek,
                'frek_req' => $paket[$i]->frek,
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'poli' => $this->input->post('id_history'),
                'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
                'id_resep' => $id_resep,
                'id_list_tindakan' => $paket[$i]->id_list_tindakan,
                'total' => $paket[$i]->total,
                'tipe' => $tipe,
                'jumlah_racikan' => 0,
                'kadaluarsa' => "0000-00-00",
                'tanggal' => $tgl,
                'id_staff' => $staff->id_staff,
                'id_signa' => $paket[$i]->id_signa,
                'id_cara_pakai' => $paket[$i]->id_cara_pakai,
                'depo' => $paket[$i]->tipe,
                'hna' => $paket[$i]->harga,
                'margin' => 1.3,
                'disc' => 0,
                'keterangan' => '-',
            );
            $this->M_Poli->insert_tindakan($page_data1, 'tindakan_farmasi_kronis');
            $this->M_Poli->insert_tindakan($page_data, 'tindakan_farmasi');
        }
        // $out['status_resep'] = $this->request_resep($id_resep);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function request_resep($id_resep)
    {
        // $id_resep = $this->input->post('id_resep');
        $tgl =  date("Y-m-d H:i:s");

        $query = $this->db->query("SELECT * from tindakan_farmasi where id_resep='$id_resep'")->result();

        if (count($query) > 0) {
            $data = array(
                'status' => 1,
                'tgl_req' => $tgl,
            );
            $this->M_Poli->request_resep($id_resep, $data);

            $out = "success";
        } else {
            $out = "error";
        }

        //////////////  antrol ///////////////////////
        $id_pelayanan = $this->db->get_where('resep_obat', ['id_resep' => $id_resep])->row()->id_pelayanan;
        $antrian = $this->db->get_where('antrian_poli', ['id_pelayanan' => $id_pelayanan]);
        if (count($antrian->result()) > 0) {
            $data_antrol = [
                'kodebooking' => $antrian->row()->id_antrian,
                'taskid' => 6,
                'waktu' => strtotime('now') * 1000
            ];
            update_antrian($data_antrol);
        }

        ///end

        return $out;
    }
    public function hapus_tindakan()
    {
        $id_tindakan = $this->input->post('id_tindakan');
        $tabel = $this->input->post('tabel');

        if ($tabel == 'mcu') {
            $this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_mcu', 'id_tindakan_mcu');
        }
        if ($tabel == 'radiologi') {
            $this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_radiologi_mcu', 'id_tindakan_radiologi');
        }
        if ($tabel == 'labor') {
            $this->M_mcu->delete_tindakan($id_tindakan, 'tindakan_labor_mcu', 'id_tindakan_labor');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }
}
