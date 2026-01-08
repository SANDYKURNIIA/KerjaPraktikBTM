<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_ulang_nyeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Erm_ranap');
        $this->load->model('M_Erm');
        $this->load->model('M_Pencarian_Pasien');

        // load model staff sebagai alias 'mstaff'
        $this->load->model('M_Staff', 'mstaff');
    }

    /* ==========================
       FORM VIEW
       ========================== */
    public function formulangnyeri($id_pelayanan, $id_history)
    {
        // ambil data pasien rawat inap
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $data_auth    = $this->session->userdata('data_auth');

        $page_data['nama']          = $selectPasien->nama ?? '';
        $page_data['tgl_lahir']     = $selectPasien->tgl_lahir ?? '';
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin ?? '';
        $page_data['no_rm']         = $selectPasien->no_rm ?? '';
        $page_data['id_pelayanan']  = $id_pelayanan;
        $page_data['id_history']    = $id_history;
        $page_data['staff']         = $data_auth->id_staff ?? null;

        // ruang rawat (jika ada)
        if (isset($selectPasien->id_ruangan)) {
            $page_data['ruang_rawat'] = $this->db
                ->get_where('master_ruangan', ['id_ruangan' => $selectPasien->id_ruangan])
                ->row();
        } else {
            $page_data['ruang_rawat'] = (object)['nama_ruangan' => ''];
        }

        // ambil daftar perawat (staff) dengan tipe 'rawatinap' dan status 'aktif'
        $page_data['list_perawat'] = $this->db
            ->select('id_staff, nama')
            ->get_where('staff', ['tipe' => 'rawatinap', 'status' => 'aktif'])
            ->result();

        // ambil daftar obat aktif dari list_logistik (kolom id_logistik, nama)
        $page_data['list_obat'] = $this->db
            ->distinct()
            ->select('
                ll.id_logistik,
                ll.nama AS nama_obat
            ')
            ->from('tindakan_farmasi tf')

            // 🔗 ke resep_obat (filter status resep)
            ->join(
                'resep_obat r',
                'r.id_resep = tf.id_resep',
                'inner'
            )

            // 🔗 ke list_logistik (nama obat sebenarnya)
            ->join(
                'list_logistik ll',
                'll.id_logistik = tf.id_list_tindakan',
                'inner'
            )

            // 🔎 FILTER UTAMA
            ->where('r.status', 2)
            ->where('tf.id_pelayanan', $id_pelayanan)
            ->where('tf.frek >', 0)          // frek 1.00 tampil
            ->where('tf.frek_req >', 0)      // frek_req 1.00 tampil
            ->where('tf.tgl_hapus IS NULL', null, false)
            ->where("tf.id_resep REGEXP '^[0-9]+$'", null, false)

            ->order_by('ll.nama', 'ASC')
            ->get()
            ->result();




        // load view
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_ulang_nyeri';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    /* ==========================
       INSERT ASESMEN ULANG NYERI
       ========================== */
    public function insert_asesmen()
    {
        $data_auth = $this->session->userdata('data_auth');
        $staff     = $data_auth->id_staff ?? null;

        // validasi minimal
        $this->form_validation->set_rules('tgl_jam', 'Tgl / Pukul', 'required');
        $this->form_validation->set_rules('skor_nyeri', 'Skor Nyeri', 'required');
        $this->form_validation->set_rules('poss', 'POSS', 'required');

        if ($this->form_validation->run()) {

            // pastikan menyimpan id_logistik (integer) dan id_staff untuk perawat
            $nama_obat_post = $this->input->post('nama_obat');
            $perawat_post   = $this->input->post('perawat');

           $data = [
                'no_rm'        => $this->input->post('no_rm'),
                'tgl_jam'      => $this->input->post('tgl_jam'),
                'skor_nyeri'   => $this->input->post('skor_nyeri'),
                'poss'         => $this->input->post('poss'),
                'td'           => $this->input->post('td'),
                'nadi'         => $this->input->post('nadi'),
                'suhu'         => $this->input->post('suhu'),
                'rr'           => $this->input->post('rr'),
                'berat_badan'  => $this->input->post('berat_badan'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'nama_obat'    => $this->input->post('nama_obat') ?: null,
                'dosis'        => $this->input->post('dosis'),
                'rute'         => $this->input->post('rute'),
                'nonfarmak'    => $this->input->post('nonfarmak'),
                'waktu_ulang'  => $this->input->post('waktu_ulang'),
                'tanggal'      => date('Y-m-d H:i:s'),
                'staff'        => $staff
            ];


            $this->M_Erm->insert($data, 'form_asesmen_ulang_nyeri');
            $out['status'] = 'success';

        } else {
            $out = [
                'error'       => true,
                'tgl_jam'     => form_error('tgl_jam'),
                'skor_nyeri'  => form_error('skor_nyeri'),
                'poss'        => form_error('poss'),
            ];
        }

        echo json_encode($out);
    }

    /* ==========================
       UPDATE ASESMEN
       ========================== */
    public function update_asesmen()
        {
            $data_auth = $this->session->userdata('data_auth');
            $staff     = $data_auth->id_staff ?? null;

            $id = $this->input->post('id');

            $this->form_validation->set_rules('tgl_jam', 'Tgl / Pukul', 'required');
            $this->form_validation->set_rules('skor_nyeri', 'Skor Nyeri', 'required');
            $this->form_validation->set_rules('poss', 'POSS', 'required');

            if ($this->form_validation->run()) {

                $nama_obat_post = $this->input->post('nama_obat');

                $data = [
                    'tgl_jam'       => $this->input->post('tgl_jam'),
                    'skor_nyeri'    => $this->input->post('skor_nyeri'),
                    'poss'          => $this->input->post('poss'),
                    'td'            => $this->input->post('td'),
                    'nadi'          => $this->input->post('nadi'),
                    'suhu'          => $this->input->post('suhu'),
                    'rr'            => $this->input->post('rr'),
                    'berat_badan'   => $this->input->post('berat_badan') !== '' 
                                        ? $this->input->post('berat_badan') 
                                        : null,
                    'tinggi_badan'  => $this->input->post('tinggi_badan') !== '' 
                                        ? $this->input->post('tinggi_badan') 
                                        : null,
                    'nama_obat'     => $nama_obat_post !== '' ? (int)$nama_obat_post : null,
                    'dosis'         => $this->input->post('dosis'),
                    'rute'          => $this->input->post('rute'),
                    'nonfarmak'     => $this->input->post('nonfarmak'),
                    'waktu_ulang'   => $this->input->post('waktu_ulang'),
                    'tanggal'       => date('Y-m-d H:i:s'),
                    'staff'         => $staff,
                ];

                $this->db->where('id', $id);
                $this->db->update('form_asesmen_ulang_nyeri', $data);

                if ($this->db->affected_rows() >= 0) {
                    $out['status'] = 'success';
                } else {
                    $out['status'] = 'failed';
                }

            } else {
                $out = [
                    'status'      => 'error',
                    'tgl_jam'     => form_error('tgl_jam'),
                    'skor_nyeri'  => form_error('skor_nyeri'),
                    'poss'        => form_error('poss'),
                ];
            }

            echo json_encode($out);
        }


    /* ==========================
       GET SATU ASESMEN (UNTUK PILIH)
       ========================== */
    public function get_asesmen()
    {
        $id = $this->input->post('id');
        $row = $this->db->get_where('form_asesmen_ulang_nyeri', ['id' => $id])->row_array();

        if ($row) {
            $row['status_dt'] = 'found';
            // pastikan field nama_obat berisi id_logistik (int) dan perawat berisi id_staff
            echo json_encode($row);
        } else {
            echo json_encode(['status_dt' => 'empty']);
        }
    }

    /* ==========================
       LIST UNTUK DATATABLE (JOIN supaya tampil nama obat & perawat)
       ========================== */
 public function tampil_list_asesmen()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // ⬅️ PAKAI NO_RM, BUKAN ID_PELAYANAN
    $no_rm = $this->input->post('no_rm');

    if (empty($no_rm)) {
        echo json_encode(['data' => []]);
        return;
    }

    $this->db->select('
        f.*,
        r.nama_resep AS nama_obat_name,
        s.nama AS perawat_name
    ');
    $this->db->from('form_asesmen_ulang_nyeri f');

    // ❌ HAPUS JOIN PELAYANAN (INI SUMBER ERROR)
    // $this->db->join('pelayanan p', 'p.no_rm = f.no_rm');

    $this->db->join('resep_obat r', 'r.id_resep = f.nama_obat', 'left');
    $this->db->join('staff s', 's.id_staff = f.staff', 'left');

    // ⬅️ FILTER LANGSUNG DARI NO_RM
    $this->db->where('f.no_rm', $no_rm);
    $this->db->order_by('f.tgl_jam', 'DESC');

    $list = $this->db->get()->result();

    $data = [];
    $no = 1;

    $map_poss = [
        'S' => 'S - Tidur, mudah dibangunkan',
        '1' => '1 - Bangun dan sadar',
        '2' => '2 - Agak mengantuk, mudah dibangunkan',
        '3' => '3 - Sering mengantuk, mudah tertidur saat bicara',
        '4' => '4 - Somnolen, minimal/tidak respon'
    ];

    foreach ($list as $row) {
        $data[] = [
            $no++,
            '<button class="btn btn-xs btn-primary" onclick="pilihNyeri('.$row->id.')">Pilih</button>',
            '<button class="btn btn-xs btn-danger" onclick="hapusNyeri('.$row->id.')">Hapus</button>',
            $row->tgl_jam,
            $row->skor_nyeri,
            $map_poss[$row->poss] ?? $row->poss,
            $row->td,
            $row->nadi,
            $row->suhu,
            $row->rr,
            $row->berat_badan ?? '-',
            $row->tinggi_badan ?? '-',
            $row->nama_obat_name ?? '-',
            $row->nonfarmak ?? '-',
            $row->waktu_ulang ?? '-'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode(['data' => $data]);
    exit;
}





    /* ==========================
       HAPUS ASESMEN
       ========================== */
    public function hapus_asesmen()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $ok = $this->db->delete('form_asesmen_ulang_nyeri');

        if ($ok) {
            $out['status'] = 'success';
        } else {
            $out['status'] = 'failed';
        }

        echo json_encode($out);
    }

    /* ==========================
       CETAK (OPSIONAL)
       ========================== */
    public function cetak_asesmen($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);

        $page_data['pasien']  = $selectPasien;
        // ambil seluruh daftar nyeri untuk pasien (JOIN supaya mudah tampil nama obat & perawat)
        $this->db->select('f.*, l.nama AS nama_obat_name, s.nama AS perawat_name');
        $this->db->from('form_asesmen_ulang_nyeri f');
        $this->db->join('list_logistik l', 'l.id_logistik = f.nama_obat', 'left');
        $this->db->join('staff s', 's.id_staff = f.perawat', 'left');
        $this->db->where([
            'f.id_pelayanan' => $id_pelayanan,
            'f.id_history'   => $id_history
        ]);
        $this->db->order_by('f.tgl_jam', 'ASC');

        $page_data['nyeri'] = $this->db->get()->result();

        $this->load->view('erm_form/Ranap/print_asses_ulang_nyeri', $page_data);
    }
}