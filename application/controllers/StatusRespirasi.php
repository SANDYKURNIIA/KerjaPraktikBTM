<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatusRespirasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Erm_ranap');
        $this->load->model('M_status_respirasi');
        $this->load->helper(['url']);
    }

    public function form($id_pelayanan, $id_history)
    {
        $page_data['id_pelayanan'] = (string)$id_pelayanan;
        $page_data['id_history']   = (string)$id_history;

        $pasien = $this->M_Erm_ranap
            ->selectDataPasienRanapby_id($id_pelayanan, $id_history);

        $page_data['pasien'] = $pasien;
        $page_data['nama']   = $pasien->nama ?? '';
        $page_data['no_rm']  = $pasien->no_rm ?? '';

        // JAM
        $page_data['hours'] = array_merge(range(7, 24), range(1, 6));

        // RENTANG JAM (untuk parameter range)
        $ranges = [];
        $h = $page_data['hours'];
        $n = count($h);
        for ($i = 0; $i < $n; $i++) {
            $ranges[] = $h[$i] . '-' . $h[($i + 1) % $n];
        }
        $page_data['ranges'] = $ranges;
        $page_data['colspanRanges'] = count($ranges);

        // POLA CHECKBOX PER JAM
        $page_data['patterns_hourly'] = [
            'kanula' => 'Kanula Nasal',
            'rm_nrm' => 'RM/NRM',
            'vc'     => 'VC',
            'pc'     => 'PC',
            'simv'   => 'SIMV',
            'psimv'  => 'PSIMV',
        ];

        // POLA ANGKA PER JAM (JSON)
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

        // PARAMETER RANGE
        $page_data['params_range'] = [
            'ph'    => 'pH',
            'paco2' => 'PaCO2',
            'pao2'  => 'PaO2',
            'be'    => 'BE',
            'hco3'  => 'HCO3',
            'sao2'  => 'SaO2',
            'svo2'  => 'SvO2',
        ];

        // SEKR
        $page_data['sekr_options'] = [
            'K'  => 'Kotor',
            'P'  => 'Putih',
            'M'  => 'Merah',
            'E'  => 'Encer',
            'Kn' => 'Kental',
        ];

        // DATA TERSIMPAN
        $saved = $this->M_status_respirasi
            ->get_by_id($id_pelayanan, $id_history);

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
            echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
            return;
        }

        $to_csv = function ($name) {
            $arr = $this->input->post($name);
            if (!is_array($arr)) return null;
            $arr = array_values(array_unique(array_filter(array_map('trim', $arr))));
            return $arr ? implode(',', $arr) : null;
        };

        $payload = [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history,
        ];

        foreach (['kanula','rm_nrm','vc','pc','simv','psimv'] as $c) {
            $payload[$c] = $to_csv($c);
        }

        foreach (['ph','paco2','pao2','be','hco3','sao2','svo2'] as $c) {
            $payload[$c] = $to_csv($c);
        }

        $payload['sekr'] = trim((string)$this->input->post('sekr')) ?: null;

        // POLA ANGKA PER JAM
        $pola_angka = [];
        $input = $this->input->post('pola_angka');

        if (is_array($input)) {
            foreach ($input as $param => $hours) {
                foreach ($hours as $jam => $val) {
                    $val = trim((string)$val);
                    if ($val !== '') {
                        $pola_angka[$param][$jam] = (int)$val;
                    }
                }
            }
        }

        $payload['json_pola_angka'] = empty($pola_angka)
            ? null
            : json_encode($pola_angka);

        $ok = $this->M_status_respirasi->save_or_update($payload);

        echo json_encode(
            $ok ? ['status' => 'success']
                : ['status' => 'error', 'message' => 'Gagal menyimpan']
        );
    }
}
