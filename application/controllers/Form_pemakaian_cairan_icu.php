<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_pemakaian_cairan_icu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pemakaian_cairan_icu', 'pc');
        $this->load->helper(['url', 'form']);
    }

    private function san_num($v) {
        $v = trim((string)$v);
        if ($v === '') return '';
        $v = str_replace(',', '.', $v);
        return preg_match('/^[+-]?\d+(?:\.\d+)?$/', $v) ? $v : '';
    }

    // >>> Diperketat: kembalikan '' jika '/', 'a/', '/b', atau format tidak lengkap
// di controller Form_pemakaian_cairan_icu
private function san_per($v) {
    $v = trim((string)$v);
    if ($v === '') return '';
    $v = str_replace(',', '.', $v);
    $v = preg_replace('/\s+/', '', $v);

    // jika hanya slash atau kosong
    if ($v === '/') return '';

    // jika tidak ada slash -> terima sebagai angka tunggal
    if (strpos($v, '/') === false) {
        return preg_match('/^[+-]?\d+(?:\.\d+)?$/', $v) ? $v : '';
    }

    // ada slash -> pisah maksimal 2 bagian
    $parts = explode('/', $v, 2);
    $a = isset($parts[0]) ? $parts[0] : '';
    $b = isset($parts[1]) ? $parts[1] : '';

    // jika kedua kosong -> kosongkan
    if ($a === '' && $b === '') return '';

    // jika hanya a terisi -> simpan a
    if ($a !== '' && $b === '') {
        return preg_match('/^[+-]?\d+(?:\.\d+)?$/', $a) ? $a : '';
    }
    // jika hanya b terisi -> simpan b
    if ($a === '' && $b !== '') {
        return preg_match('/^[+-]?\d+(?:\.\d+)?$/', $b) ? $b : '';
    }
    // jika keduanya terisi -> validasi keduanya
    if (preg_match('/^[+-]?\d+(?:\.\d+)?$/', $a) && preg_match('/^[+-]?\d+(?:\.\d+)?$/', $b)) {
        return $a . '/' . $b;
    }
    return '';
}


    private function pick($source, $key) {
        if (is_array($source))  return $source[$key] ?? null;
        if (is_object($source)) return isset($source->$key) ? $source->$key : null;
        return null;
    }

    public function form($id_pelayanan, $id_history)
    {
        $data_staff = $this->session->userdata('data_auth');
        $page_data['sso_user_data'] = $data_staff;
        $page_data['page_content']  = 'erm_form/form_pemakaian_cairan_icu';

        $pelayanan = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row_array();
        if (!$pelayanan) show_error('Data pelayanan tidak ditemukan.');

        $history = $this->db->get_where('history_pelayanan_ranap', [
            'id_history'   => $id_history,
            'id_pelayanan' => $id_pelayanan
        ])->row_array();
        if (!$history) $history = ['id_history'=>$id_history,'tgl_masuk'=>null,'tgl_keluar'=>null,'jenis_pelayanan'=>null];

        $pasien = $this->db->get_where('pasien', ['no_rm' => $pelayanan['id_pasien']])->row_array();
        if (!$pasien) $pasien = ['no_rm'=>'-','nama'=>'-','tgl_lahir'=>null,'telp'=>'-','no_hp'=>'-','alamat'=>'-'];

        $row = $this->pc->get_by_keys($id_pelayanan, $id_history) ?: [];
        $decode = function($v){ return is_string($v) ? json_decode($v, true) : (is_array($v) ? $v : null); };

        $enteral  = $decode($row['enteral'] ?? null)    ?: array_fill(0,5, array_fill(0,25, ''));
        $parent   = $decode($row['parenteral'] ?? null) ?: array_fill(0,7, array_fill(0,25, ''));
        $keluar   = $decode($row['keluar'] ?? null)     ?: array_fill(0,7, array_fill(0,25, ''));
        for ($r=0;$r<5;$r++) if (!isset($enteral[$r])) $enteral[$r]=array_fill(0,25,'');
        for ($r=0;$r<7;$r++) if (!isset($parent[$r]))  $parent[$r]=array_fill(0,25,'');
        for ($r=0;$r<7;$r++) if (!isset($keluar[$r]))  $keluar[$r]=array_fill(0,25,'');

        $page_data['pelayanan']        = $pelayanan;
        $page_data['history']          = $history;
        $page_data['pasien']           = $pasien;
        $page_data['no_rm']            = $pasien['no_rm'];
        $page_data['id_history']       = $id_history;
        $page_data['id_pelayanan']     = $id_pelayanan;

        $page_data['enteral_jenis']    = $decode($row['enteral_jenis'] ?? null)    ?: array_fill(0,5,'');
        $page_data['parenteral_jenis'] = $decode($row['parenteral_jenis'] ?? null) ?: array_fill(0,7,'');

        $page_data['enteral']          = $enteral;
        $page_data['parenteral']       = $parent;
        $page_data['keluar']           = $keluar;

        $page_data['total_input']      = $decode($row['total_input'] ?? null)  ?: array_fill(0,25,'');
        $page_data['total_output']     = $decode($row['total_output'] ?? null) ?: array_fill(0,25,'');
        $page_data['total']            = $decode($row['total'] ?? null)        ?: array_fill(0,25,'');

        $this->load->view('assets/_header');
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function save()
    {
        if ($this->input->method() !== 'post') show_404();

        $id_pelayanan = trim($this->input->post('id_pelayanan'));
        $id_history   = trim($this->input->post('id_history'));

        $auth     = $this->session->userdata('data_auth');
        $id_staff = $this->pick($auth, 'id_staff') ?? $this->input->post('id_staff');

        $enteral_jenis    = [];
        $parenteral_jenis = [];
        for ($r=1;$r<=5;$r++) $enteral_jenis[]    = $this->input->post("enteral_jenis_$r", true) ?? '';
        for ($r=1;$r<=7;$r++) $parenteral_jenis[] = $this->input->post("parenteral_jenis_$r", true) ?? '';

        $enteral = array_fill(0,5, array_fill(0,25, ''));
        for ($r=1;$r<=5;$r++) for ($c=1;$c<=25;$c++)
            $enteral[$r-1][$c-1] = $this->san_num($this->input->post("enteral_{$r}_{$c}", true) ?? '');

        $parenteral = array_fill(0,7, array_fill(0,25, ''));
        for ($r=1;$r<=7;$r++) for ($c=1;$c<=25;$c++)
            $parenteral[$r-1][$c-1] = $this->san_per($this->input->post("parenteral_{$r}_{$c}", true) ?? '');

        $keluar = array_fill(0,7, array_fill(0,25,''));
        for ($r=0; $r<=6; $r++) for ($c=1; $c<=25; $c++)
            $keluar[$r][$c-1] = $this->san_num($this->input->post("keluar_{$r}_{$c}", true) ?? '');

        $total_input = [];
        for ($c=1; $c<=25; $c++) $total_input[] = $this->san_num($this->input->post("total_input_{$c}", true) ?? '');

        $total = [];
        for ($c=1; $c<=25; $c++) $total[] = $this->san_per($this->input->post("total_{$c}", true) ?? '');

        $total_output = $keluar[6];

        $payload = [
            'id_pelayanan'     => $id_pelayanan,
            'id_history'       => $id_history,
            'id_staff'         => $id_staff,
            'enteral_jenis'    => $enteral_jenis,
            'parenteral_jenis' => $parenteral_jenis,
            'enteral'          => $enteral,
            'parenteral'       => $parenteral,
            'keluar'           => $keluar,
            'total_input'      => $total_input,
            'total_output'     => $total_output,
            'total'            => $total,
        ];

        $res = $this->pc->upsert($payload);
        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }



 public function print_form($id_pelayanan, $id_history)
{
    $staff = $this->session->userdata('data_auth');

    // --- pelayanan ---
    $pelayanan = $this->db->get_where('pelayanan', [
        'id_pelayanan' => $id_pelayanan
    ])->row_array();
    if (!$pelayanan) show_404();

    // --- history ---
    $history = $this->db->get_where('history_pelayanan_ranap', [
        'id_pelayanan' => $id_pelayanan,
        'id_history'   => $id_history
    ])->row_array();
    if (!$history) {
        $history = [
            'id_history'  => $id_history,
            'tgl_masuk'   => null,
            'tgl_keluar'  => null,
            'jenis_rawat' => null
        ];
    }

    // --- pasien ---
    $pasien = $this->db->get_where('pasien', [
        'no_rm' => $pelayanan['id_pasien']
    ])->row_array();
    if (!$pasien) {
        $pasien = [
            'no_rm'      => '-',
            'nama'       => '-',
            'tgl_lahir'  => null,
            'no_hp'      => '-',
            'alamat'     => '-'
        ];
    }

    // --- data pemakaian cairan ---
    $row = $this->pc->get_by_keys($id_pelayanan, $id_history);

    // 👉 JIKA BELUM ADA DATA → BUAT DEFAULT KOSONG
    if (!$row) {
        $row = [
            'enteral_jenis'    => json_encode(array_fill(0, 5, '')),
            'parenteral_jenis' => json_encode(array_fill(0, 7, '')),
            'enteral'          => json_encode(array_fill(0, 5, array_fill(0, 25, ''))),
            'parenteral'       => json_encode(array_fill(0, 7, array_fill(0, 25, ''))),
            'keluar'           => json_encode(array_fill(0, 7, array_fill(0, 25, ''))),
            'total_input'      => json_encode(array_fill(0, 25, '')),
            'total_output'     => json_encode(array_fill(0, 25, '')),
            'total'            => json_encode(array_fill(0, 25, '')),
        ];
    }

    // decode json → array
    $decode = function ($v) {
        return is_string($v) ? json_decode($v, true) : [];
    };

    $page_data = [
        'pasien'           => $pasien,
        'pelayanan'        => $pelayanan,
        'history'          => $history,
        'sso_user_data'    => $staff,

        'enteral_jenis'    => $decode($row['enteral_jenis']),
        'parenteral_jenis' => $decode($row['parenteral_jenis']),
        'enteral'          => $decode($row['enteral']),
        'parenteral'       => $decode($row['parenteral']),
        'keluar'           => $decode($row['keluar']),
        'total_input'      => $decode($row['total_input']),
        'total_output'     => $decode($row['total_output']),
        'total'            => $decode($row['total']),
    ];

    // load view print
    $this->load->view('print/form_pemakaian_cairan_icu_print', $page_data);
}
}