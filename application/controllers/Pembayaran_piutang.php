<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_pembayaran_utang');
        $this->load->model('M_Kasir');
    }
    public function insert_detail_jurnal_rupa()
    {
        $data_staff = $this->session->userdata('data_auth');
        $pelayanan = explode("|", $this->input->post('pelayanan'));
        $id_jenis = explode("|", $this->input->post('id_jenis'));
        $id_jurnal = $this->input->post('id_jurnal');
        $kode1 = $this->db->get_where('daftar_akun', ['id_akun' => $id_jenis[1]])->row();
        $kode2 = $this->db->get_where('detail_daftar_akun', ['id_detail' => $id_jenis[0]])->row();

        $jurnal = $this->db->get_where('jurnal_rupa', ['id_jurnal' => $id_jurnal])->row();
        $rek = $kode1->kode . '.' . $kode2->kode . '.' . $pelayanan[0];
        $kode1_split = str_split($kode1->kode);
        if ($kode1_split[0] == 7 || $kode1_split[0] == 8) {
            $desk =  $kode1->deskripsi . ' = ' . $kode2->deskripsi . ' = ' . $pelayanan[1];
        } else {
            $desk =  $kode1->deskripsi . ' = ' . $pelayanan[1];
        }
        $nilai = $this->input->post('nilai');
        $tipe = $this->input->post('tipe');

        $data = [
            'id_fk' => $id_jurnal,
            'akun' => $rek,
            'invoice' => '',
            'vendor' => '',
            'tipe' => '',
            'deskripsi' => $this->input->post('deskripsi'),
            'kredit' => ($tipe == 'KREDIT') ? $nilai : 0,
            'debet' => ($tipe == 'DEBIT') ? $nilai : 0,
           
            'pk' => $this->input->post('pk'),
            'tgl' => date('Y-m-d H:i:s'),
            'des_rek' => $desk,
            'staff' => $data_staff->nama,
        ];


        $this->M_Kasir->insert_tindakan($data, 'detail_pembayaran_piutang');


        $out['status'] = "success";
        echo json_encode($out);
    }

    public function tampil_detail_jurnal()
    {
        $out = null;
        $idFaktur = $this->input->post('idFaktur');

        $page_data = $this->db->query("SELECT * FROM detail_pembayaran_piutang where id_fk ='$idFaktur' and id_pelayanan is null")->result_array();

        for ($i = 0; $i < count($page_data); $i++) {
            // $tgl = indo_date($page_data[$i]->tgl_input);

            $no = $i + 1;
            $delete =
                "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal'  onclick='hapus_list_faktur(\"" . $page_data[$i]['id'] . "\")' '><i class='fa fa-trash '></i></button>";


            // $tgl = indo_date2($page_data[$i]->tanggal);

            $rek = $page_data[$i]['akun'];
            $deskripsi = $page_data[$i]['deskripsi'];
            $pk = $page_data[$i]['pk'];
            $debit = number_format($page_data[$i]['debet'], 0, ',', '.');
            $kredit = number_format($page_data[$i]['kredit'], 0, ',', '.');
            $des_rek = $page_data[$i]['des_rek'];


            $out[$i] = array($no, $rek, $deskripsi, $pk, $debit, $kredit, $des_rek, $delete);
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
