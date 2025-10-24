<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatusRespirasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Erm_ranap');
        $this->load->model('M_status_respirasi'); // ← tambahkan model baru
        $this->load->helper(['url']);
        $this->load->library(['user_agent']);
    }

    public function form($id_pelayanan, $id_history)
    {
        // Gunakan string apa adanya (misal: pl_9, ranap_10)
        $page_data['id_pelayanan'] = (string)$id_pelayanan;
        $page_data['id_history']   = (string)$id_history;

        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $page_data['pasien'] = $selectPasien;
        $page_data['nama']   = $selectPasien->nama ?? '';
        $page_data['no_rm']  = $selectPasien->no_rm ?? '';

        $page_data['hours']  = array_merge(range(7, 24), range(1, 6));
        $ranges = [];
        $h = $page_data['hours'];
        $n = count($h);
        for ($i = 0; $i < $n; $i++) $ranges[] = $h[$i] . '-' . $h[($i + 1) % $n];
        $page_data['ranges'] = $ranges;

        // Pola nafas per jam (checkbox)
        $page_data['patterns_hourly'] = [
            'kanula' => 'Kanula Nasal',
            'rm_nrm' => 'RM/NRM',
            'vc'     => 'VC',
            'pc'     => 'PC',
            'simv'   => 'SIMV',
            'psimv'  => 'PSIMV',
        ];

        // Pola nafas input angka (dropdown)
        $page_data['patterns_numeric'] = [
            'ps'   => 'PS',
            'cpap' => 'CPAP',
            'fio2' => 'FiO2',
            'rr'   => 'RR',
            'tv'   => 'TV',
            'mv'   => 'MV',
            'peep' => 'PEEP',
            'ipl'  => 'IPL',
        ];

        // Parameter per rentang (checkbox) — kecuali SEKR akan jadi dropdown
        $page_data['params_range'] = [
            'ph'    => 'pH',
            'paco2' => 'PaCO2',
            'pao2'  => 'PaO2',
            'be'    => 'BE',
            'hco3'  => 'HCO3',
            'sao2'  => 'SaO2',
            'svo2'  => 'SvO2',
        ];

        // Sekresi: dropdown dengan kode
        $page_data['sekr_options'] = [
            'K'  => 'Kotor',
            'P'  => 'Putih',
            'M'  => 'Merah',
            'E'  => 'Encer',
            'Kn' => 'Kental',
        ];

        // ← ambil dari model, bukan query langsung
        $saved = $this->M_status_respirasi->get_by_id($page_data['id_pelayanan'], $page_data['id_history']);
        $page_data['saved'] = $saved ?: [];

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_status_respirasi';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function simpan_ajax()
    {
        $this->output->set_content_type('application/json');

        $id_pelayanan = trim((string)$this->input->post('id_pelayanan', true));
        $id_history   = trim((string)$this->input->post('id_history', true));
        if ($id_pelayanan === '' || $id_history === '') {
            echo json_encode(['status' => 'error', 'message' => 'id_pelayanan dan id_history wajib.']);
            return;
        }

        // checkbox[] → CSV
        $to_csv = function (string $name) {
            $arr = $this->input->post($name);
            if (!is_array($arr)) return null;
            $arr = array_values(array_unique(array_filter(array_map('trim', $arr), fn($v) => $v !== '')));
            return $arr ? implode(',', $arr) : null;
        };

        $patterns_hourly = ['kanula', 'rm_nrm', 'vc', 'pc', 'simv', 'psimv'];
        $patterns_numeric = ['ps', 'cpap', 'fio2', 'rr', 'tv', 'mv', 'peep', 'ipl'];
        $params_range = ['ph', 'paco2', 'pao2', 'be', 'hco3', 'sao2', 'svo2'];

        $payload = [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history,
        ];

        foreach ($patterns_hourly as $c) {
            $payload[$c] = $to_csv($c);
        }

        foreach ($patterns_numeric as $c) {
            $val = trim((string)$this->input->post($c));
            $payload[$c] = ($val === '' ? null : (int)$val);
        }

        foreach ($params_range as $c) {
            $payload[$c] = $to_csv($c);
        }

        $sekr = trim((string)$this->input->post('sekr'));
        $payload['sekr'] = ($sekr === '') ? null : $sekr;

        // ← panggil upsert model, bukan query langsung
        $ok = $this->M_status_respirasi->save_or_update($payload);

        echo json_encode($ok ? ['status' => 'success'] : ['status' => 'error', 'message' => 'Gagal menyimpan ke database.']);
    }
}
