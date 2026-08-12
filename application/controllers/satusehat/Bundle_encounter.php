<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bundle_encounter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('satusehat');
        $this->load->model('M_Satusehat');
    }

    public function send()
    {
        $tgl = date('Y-m-d');
        $db_pasien = $this->db->query("SELECT f.id_pelayanan, f.id_history, p.no_ktp, p.nama, h.dpjp, b.tgl_keluar,f.tanggal
        from form_assesmen_awal_rajal f , pasien p, pelayanan b, history_pelayanan h
        where p.no_rm=b.id_pasien and b.id_pelayanan =f.id_pelayanan
        and p.no_ktp !='' and length(no_ktp)=16 and h.id_history =f.id_history
        and b.tgl_masuk like '$tgl%'
        ORDER BY `b`.`tgl_masuk` ASC
        ")->result();

        foreach ($db_pasien as $row) {
            $this->create_encounter1($row->id_pelayanan, $row->id_history);
        }
    }

    public function send_by_tgl($tgl)
    {
        $db_pasien = $this->db->query("SELECT f.id_pelayanan, f.id_history, p.no_ktp, p.nama, h.dpjp, b.tgl_keluar,h.tgl_masuk,f.tanggal, d.nama, d.nik, du.kode kode_diagnosa, du.nama_diagnosa, s.id_satusehat, s.nama nama_klinik
        from form_assesmen_awal_rajal f , pasien p, pelayanan b, history_pelayanan h,dokter d,diagnosa_utama du, satusehat_suborganisasi s
        where p.no_rm=b.id_pasien and b.id_pelayanan =f.id_pelayanan and h.dpjp = d.id_dokter and b.id_pelayanan = du.id_pelayanan and h.nama_poli = s.id_list_poli
        and length(no_ktp)=16 and h.id_history =f.id_history and length(d.nik)=16
        -- and b.id_pelayanan not in (select id_pelayanan from satusehat_encounter)
        and b.tgl_masuk like '2025-08-11%'
        ORDER BY `b`.`tgl_masuk` ASC
        limit 5
        ")->result();

        foreach ($db_pasien as $row) {
            $this->create_encounter($row);
        }
    }

    public function create_encounter($db_pasien)
    {
        $this->load->library('uuid');
        $id_pelayanan = $db_pasien->id_pelayanan;
        $id_history = $db_pasien->id_history;

        $satusehat_encounter = $this->db->get_where('satusehat_encounter', ['id_pelayanan' => $id_pelayanan])->row();
        if (empty($satusehat_encounter)) {

            $nik = $db_pasien->no_ktp;
            $nik_nakes = $db_pasien->nik;
            // echo $nik_nakes;

            // echo '<h1>Respon Header</h1>';
            // echo '<pre>';
            // $header = generateHeaderFHIR();
            // print_r($header);
            // echo '</pre>';

            $data = fhirPasienByNIK(array('nik' => $nik));
            $data_nakes = fhirNakesByNIK(array('nik' => $nik_nakes));
            if ($data['status'] == 1 && isset($data['data']->entry[0]->resource->id)) {
                $id_patient = $data['data']->entry[0]->resource->id;
                $name_patient = $data['data']->entry[0]->resource->name[0]->text;
            } else {
                $out['status'] = $data['msg'];
            }
            if ($data_nakes['status'] == 1 && isset($data['data']->entry[0]->resource->name[0]->text)) {
                $id_nakes = $data_nakes['data']->entry[0]->resource->id;
                $name_nakes = $data_nakes['data']->entry[0]->resource->name[0]->text;
            } else {
                $out['status'] = $data_nakes['msg'];
            }

            if (isset($id_patient) && isset($id_nakes)) {


                $uuid = $this->uuid->v4();
                $uuid_1 = $this->uuid->v4();



                // echo '<h1>JSON Bundle yang dikirim</h1>';
                // echo '<pre>';
                // echo json_encode($array_bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                // echo '</pre>';

                // echo '<h1>Response pengiriman Bundle</h1>';
                $db_pasien->id_nakes = $id_nakes;
                $db_pasien->name_nakes = $name_nakes;
                $db_pasien->id_patient = $id_patient;

                $array_bundle = encounter($db_pasien);
                $response_bundle = fhirPost($array_bundle, 'Encounter', 'POST');
                // echo '<pre>';
                print_arr($response_bundle);




                // echo '</pre>';
                if ($response_bundle['status'] == 1 && isset($response_bundle['data']->id)) {

                    // $uuid = $response_bundle['data']->id;
                    // $array_diagnosa = [
                    //     "resourceType" => "Condition",
                    //     "clinicalStatus" => [
                    //         "coding" => [
                    //             [
                    //                 "system" => "http://terminology.hl7.org/CodeSystem/condition-clinical",
                    //                 "code" => "active",
                    //                 "display" => "Active"
                    //             ]
                    //         ]
                    //     ],
                    //     "category" => [
                    //         [
                    //             "coding" => [
                    //                 [
                    //                     "system" => "http://terminology.hl7.org/CodeSystem/condition-category",
                    //                     "code" => "encounter-diagnosis",
                    //                     "display" => "Encounter Diagnosis"
                    //                 ]
                    //             ]
                    //         ]
                    //     ],
                    //     "code" => [
                    //         "coding" => [
                    //             [
                    //                 "system" => "http://hl7.org/fhir/sid/icd-10",
                    //                 "code" => $this->formatAngka($kode_diagnosa),
                    //                 "display" => $diagnosa
                    //             ]
                    //         ]
                    //     ],
                    //     "subject" => [
                    //         "reference" => "Patient/$id_patient",
                    //         "display" => $name_patient
                    //     ],
                    //     "encounter" => [
                    //         "reference" => "Encounter/$uuid",
                    //         "display" => "Kunjungan " . $name_patient . " pada " . date('Y-m-d', strtotime($tgl_masuk)) . "T" . date('H:i:s', strtotime($tgl_masuk)) . "+07:00"
                    //     ]
                    // ];
                    // $response_condition = fhirPost($array_diagnosa, 'Condition', 'POST');
                    // print_arr($response_condition);

                    $inpud_data = [
                        'id_pelayanan' => $id_pelayanan,
                        'uuid' => $uuid,
                        'id_encounter' => $response_bundle['data']->id,
                        // 'uuid_condition' => $uuid_1,
                        // 'id_condition' => $response_condition['data']->id,
                    ];
                    $this->M_Satusehat->insert_data($inpud_data, 'satusehat_encounter');
                    $out['status'] = 'success';
                } else {
                    $out['status'] = "Data tidak berhasil disimpan";
                }
            } else {
                $out['status'] = 'Data Nakes dan Data Pasien Tidak Ditemukan';
            }
        } else {
            $out['status'] = 'Data sudah terkirim';
        }

        echo json_encode($out);
    }


    function formatAngka($angka)
    {
        // Cek jika angka lebih dari 3 digit
        if (strlen($angka) == 4) {
            // Ambil bagian depan angka (sebelum titik)
            $depan = substr($angka, 0, 3);
            // Ambil bagian belakang angka (setelah titik)
            $belakang = substr($angka, -1);
            // Gabungkan dengan titik sebagai pemisah
            return $depan . '.' . $belakang;
        } else {
            // Jika kurang dari 4 digit, kembalikan angka aslinya
            return $angka;
        }
    }

    public function create_encounter1($id_pelayanan, $id_history)
    {
        $this->load->library('uuid');
        $db_erm = $this->db->get_where('form_assesmen_awal_rajal', ['id_pelayanan' => $id_pelayanan])->row();
        if (!empty($db_erm)) {

            $satusehat_encounter = $this->db->get_where('satusehat_encounter', ['id_pelayanan' => $id_pelayanan])->row();
            if (empty($satusehat_encounter)) {

                $db_pasien = $this->db->get_where('v_kunjungan', ['id_pelayanan' => $id_pelayanan, 'id_history' => $id_history])->row();
                $db_dokter = $this->db->get_where('dokter', ['id_dokter' => $db_pasien->dpjp])->row();

                $nik = $db_pasien->no_ktp;
                $nik_nakes = $db_dokter->nik;
                // echo $nik_nakes;

                // echo '<h1>Respon Header</h1>';
                // echo '<pre>';
                // $header = generateHeaderFHIR();
                // print_r($header);
                // echo '</pre>';

                $data = fhirPasienByNIK(array('nik' => $nik));
                $data_nakes = fhirNakesByNIK(array('nik' => $nik_nakes));
                if ($data['status'] == 1 && isset($data['data']->entry[0]->resource->id)) {
                    $id_patient = $data['data']->entry[0]->resource->id;
                    $name_patient = $data['data']->entry[0]->resource->name[0]->text;
                } else {
                    $out['status'] = $data['msg'];
                }
                if ($data_nakes['status'] == 1 && isset($data['data']->entry[0]->resource->name[0]->text)) {
                    $id_nakes = $data_nakes['data']->entry[0]->resource->id;
                    $name_nakes = $data_nakes['data']->entry[0]->resource->name[0]->text;
                } else {
                    $out['status'] = $data_nakes['msg'];
                }

                if (isset($id_patient) && isset($id_nakes)) {
                    $tgl_masuk = $db_pasien->tgl_masuk;
                    $tgl_keluar = isset($db_pasien->tgl_keluar) ? $db_pasien->tgl_keluar : date('Y-m-d', strtotime($tgl_masuk)) . " 20:00:00";

                    // $db_erm = $this->db->get_where('erm', ['id_pelayanan' => $id_pelayanan])->row();

                    $tgl_dilayani = $db_erm->tanggal;

                    $poli = $this->db->get_where('satusehat_suborganisasi', ['id_list_poli' => $db_pasien->nama_poli])->row();

                    $id_klinik = $poli->id_satusehat;
                    $nama_klinik = $poli->nama;

                    $db_diagnosa = $this->db->get_where('diagnosa_utama', ['id_pelayanan' => $id_pelayanan, 'id_history' => $id_history])->row();

                    $kode_diagnosa = $db_diagnosa->kode;
                    $diagnosa = $db_diagnosa->nama_diagnosa;

                    $uuid = $this->uuid->v4();
                    $uuid_1 = $this->uuid->v4();

                    $array_bundle = [
                        "resourceType" => "Encounter",
                        "status" => "finished",
                        "class" => [
                            "system" =>
                            "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                            "code" => "AMB",
                            "display" => "ambulatory",
                        ],
                        "subject" => [
                            "reference" => "Patient/$id_patient",
                            "display" => $name_patient,
                        ],
                        "participant" => [
                            [
                                "type" => [
                                    [
                                        "coding" => [
                                            [
                                                "system" => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                                                "code" => "ATND",
                                                "display" => "attender",
                                            ],
                                        ],
                                    ],
                                ],
                                "individual" => [
                                    "reference" => "Practitioner/$id_nakes",
                                    "display" => $name_nakes,
                                ],
                            ],
                        ],
                        "period" => [
                            "start" => date('Y-m-d', strtotime($tgl_masuk)) . "T" . date('H:i:s', strtotime($tgl_masuk)) . "+07:00",
                            "end" => date('Y-m-d', strtotime($tgl_keluar)) . "T" . date('H:i:s', strtotime($tgl_keluar)) . "+07:00"

                        ],
                        "location" => [
                            [
                                "location" => [
                                    "reference" => "Location/$id_klinik",
                                    "display" => $nama_klinik,
                                ],
                            ],
                        ],
                        "statusHistory" => [
                            [
                                "status" => "arrived",
                                "period" => [
                                    "start" => date('Y-m-d', strtotime($tgl_masuk)) . "T" . date('H:i:s', strtotime($tgl_masuk)) . "+07:00",
                                    "end" => date('Y-m-d', strtotime($tgl_dilayani)) . "T" . date('H:i:s', strtotime($tgl_dilayani)) . "+07:00"
                                ],
                            ],
                            [
                                "status" => "in-progress",
                                "period" => [
                                    "start" => date('Y-m-d', strtotime($tgl_dilayani)) . "T" . date('H:i:s', strtotime($tgl_dilayani)) . "+07:00",
                                    "end" => date('Y-m-d', strtotime($tgl_keluar)) . "T" . date('H:i:s', strtotime($tgl_keluar)) . "+07:00"
                                ],
                            ],
                            [
                                "status" => "finished",
                                "period" => [
                                    "start" => date('Y-m-d', strtotime($tgl_keluar)) . "T" . date('H:i:s', strtotime($tgl_keluar)) . "+07:00",
                                    "end" => date('Y-m-d', strtotime($tgl_keluar)) . "T" . date('H:i:s', strtotime($tgl_keluar)) . "+07:00"
                                ],
                            ],
                        ],
                        "serviceProvider" => [
                            "reference" =>
                            "Organization/" . WS_FHIR_ORG_ID,
                        ],
                        "identifier" => [
                            [
                                "system" =>
                                "http://sys-ids.kemkes.go.id/encounter/" . WS_FHIR_ORG_ID,
                                "value" => $id_pelayanan,
                            ],
                        ],
                        "diagnosis" => [
                            [
                                "condition" => [
                                    "reference" =>
                                    "urn:uuid:$uuid_1",
                                    "display" => $diagnosa,
                                ],
                                "use" => [
                                    "coding" => [
                                        [
                                            "system" =>
                                            "http://terminology.hl7.org/CodeSystem/diagnosis-role",
                                            "code" => 'DD',
                                            "display" => 'Discharge diagnosis',
                                        ],
                                    ],
                                ],
                                "rank" => 1,
                            ],
                        ],

                    ];

                    // echo '<h1>JSON Bundle yang dikirim</h1>';
                    // echo '<pre>';
                    // echo json_encode($array_bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    // echo '</pre>';

                    // echo '<h1>Response pengiriman Bundle</h1>';
                    $response_bundle = fhirPost($array_bundle, 'Encounter', 'POST');
                    // echo '<pre>';
                    print_arr($response_bundle);




                    // echo '</pre>';
                    if ($response_bundle['status'] == 1 && isset($response_bundle['data']->id)) {

                        $uuid = $response_bundle['data']->id;
                        $array_diagnosa = [
                            "resourceType" => "Condition",
                            "clinicalStatus" => [
                                "coding" => [
                                    [
                                        "system" => "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                        "code" => "active",
                                        "display" => "Active"
                                    ]
                                ]
                            ],
                            "category" => [
                                [
                                    "coding" => [
                                        [
                                            "system" => "http://terminology.hl7.org/CodeSystem/condition-category",
                                            "code" => "encounter-diagnosis",
                                            "display" => "Encounter Diagnosis"
                                        ]
                                    ]
                                ]
                            ],
                            "code" => [
                                "coding" => [
                                    [
                                        "system" => "http://hl7.org/fhir/sid/icd-10",
                                        "code" => $kode_diagnosa,
                                        "display" => $diagnosa
                                    ]
                                ]
                            ],
                            "subject" => [
                                "reference" => "Patient/$id_patient",
                                "display" => $name_patient
                            ],
                            "encounter" => [
                                "reference" => "Encounter/$uuid",
                                "display" => "Kunjungan " . $name_patient . " pada " . date('Y-m-d', strtotime($tgl_masuk)) . "T" . date('H:i:s', strtotime($tgl_masuk)) . "+07:00"
                            ]
                        ];
                        $response_condition = fhirPost($array_diagnosa, 'Condition', 'POST');
                        print_arr($response_condition);

                        $inpud_data = [
                            'id_pelayanan' => $id_pelayanan,
                            'uuid' => $uuid,
                            'id_encounter' => $response_bundle['data']->id,
                            'uuid_condition' => $uuid_1,
                            'id_condition' => $response_condition['data']->id,
                        ];
                        $this->M_Satusehat->insert_data($inpud_data, 'satusehat_encounter');
                        $out['status'] = 'success';
                    } else {
                        $out['status'] = "Data tidak berhasil disimpan";
                    }
                } else {
                    $out['status'] = 'Data Nakes dan Data Pasien Tidak Ditemukan';
                }
            } else {
                $out['status'] = 'Data sudah terkirim';
            }
        } else {
            $out['status'] = 'Asesmen Rawat Jalan Masih Kosong, silahkan diisi terlebih dahulu';
        }
        echo json_encode($out);
    }
}
