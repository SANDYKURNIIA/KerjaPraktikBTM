<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ihs_api extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('satusehat');
        $this->load->model('M_Satusehat');
        $this->load->model('M_tbc');
        $this->load->helper('usaid');
        $this->api = "http://192.168.87.2:8181/";
        $this->load->library('curl');
    }
    // public function print_labor()
    // {
    //     $id_pel = "pl_435564";
    //     // $id = "102914";
    //     $id = "112662";
    //     $param = array('ono' => 'A' . $id);
    //     $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

    //     if ($labor != "") {
    //         $data['labor'] = $labor;
    //         return $data;
    //     } else {
    //         echo "gagal!";
    //     }
    // }



    public function print_labor_schedule($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_form = $this->M_tbc->get_form($id_pelayanan);
        $id = strval($id_form->id_form_labor);
        $param = array('ono' => 'A' . $id);
        $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

        if ($labor) {
            // Inisialisasi array untuk observasi
            $observations = [];
            $episodeCounter = 1; // Inisialisasi counter untuk episode_number

            // Variabel untuk menyimpan tanggal observasi sebelumnya
            $lastObservationDate = null;

            foreach ($labor as $observ) {
                // Cek apakah `RESULT` ada dan merupakan array
                if (!isset($observ->RESULT) || !is_array($observ->RESULT) || empty($observ->RESULT)) {
                    // Jika `RESULT` tidak ada atau kosong, lewati iterasi ini
                    continue;
                }

                foreach ($observ->RESULT as $result) {
                    // Cek apakah `GROUP` ada, jika tidak lanjut ke data berikutnya
                    if (!isset($result->GROUP)) {
                        continue;
                    }

                    $typeObservation = $result->GROUP;
                    $value = isset($result->VALUE) ? $result->VALUE : null;

                    if (!empty($observ->TGLORDER)) {
                        // Buat objek DateTime dari format 'd/m/Y H:i'
                        $date_obj = DateTime::createFromFormat('d/m/Y H:i', $observ->TGLORDER);

                        // Cek apakah DateTime berhasil diparsing
                        if ($date_obj) {
                            // Format ke 'Y-m-d H:i:s' untuk penyimpanan ke database
                            $formatted_date = $date_obj->format('Y-m-d H:i:s');
                        } else {
                            // Jika parsing gagal, tetapkan tanggal default
                            $formatted_date = date('Y-m-d H:i:s');
                        }
                    } else {
                        // Jika TGLORDER kosong, gunakan tanggal saat ini
                        $formatted_date = date('Y-m-d H:i:s');
                    }

                    // Logika untuk memeriksa periode berdasarkan bulan
                    if ($lastObservationDate) {
                        $currentMonth = $date_obj->format('m');
                        $lastMonth = $lastObservationDate->format('m');

                        // Jika bulan berbeda, increment episodeCounter
                        if ($currentMonth !== $lastMonth) {
                            $episodeCounter++;
                        }
                    }

                    // Set lastObservationDate sebagai tanggal observasi saat ini
                    $lastObservationDate = $date_obj;

                    // Tambahkan observasi ke array
                    $observation = array(
                        'id_pelayanan' => $id_pelayanan,
                        'local_id' => $observ->LABNO,
                        'type_observation' => $typeObservation,
                        'issued' => $formatted_date, // Format datetime
                        'hasil' => $value,
                        'episode_number' => $episodeCounter,
                        'cara_input' => "labor"
                    );
                    $observations[] = $observation;

                    // Insert ke database
                    $this->M_tbc->insert_observation($observation);
                }
            }

            return $observations;
        } else {
            echo "gagal!";
            return [];
        }
    }


    public function print_labor($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        // $id_pelayanan = "pl_424908";
        $id_form = $this->M_tbc->get_form($id_pelayanan);
        $id = strval($id_form->id_form_labor);
        $param = array('ono' => 'A' . $id);
        $labor = json_decode($this->curl->simple_get($this->api . 'RESULTS', $param));

        if ($labor) {
            // Inisialisasi array untuk observasi
            $observations = [];
            $episodeCounter = 1; // Inisialisasi counter untuk episode_number

            // Variabel untuk menyimpan tanggal observasi sebelumnya
            $lastObservationDate = null;

            foreach ($labor as $observ) {
                if (isset($observ->RESULT) && is_array($observ->RESULT) && !empty($observ->RESULT)) {
                    foreach ($observ->RESULT as $result) {
                        if (isset($result->GROUP)) {
                            $typeObservation = $result->GROUP;
                            $value = isset($result->VALUE) ? $result->VALUE : null;

                            if (!empty($observ->TGLORDER)) {
                                // Buat objek DateTime dari format 'd/m/Y H:i'
                                $date_obj = DateTime::createFromFormat('d/m/Y H:i', $observ->TGLORDER);

                                // Cek apakah DateTime berhasil diparsing
                                if ($date_obj) {
                                    // Format ke 'Y-m-d H:i:s' untuk penyimpanan ke database
                                    $formatted_date = $date_obj->format('Y-m-d H:i:s');
                                } else {
                                    // Jika parsing gagal, tetapkan tanggal default
                                    $formatted_date = date('Y-m-d H:i:s');
                                }
                            } else {
                                // Jika TGLORDER kosong, gunakan tanggal saat ini
                                $formatted_date = date('Y-m-d H:i:s');
                            }

                            // Logika untuk memeriksa periode berdasarkan bulan
                            if ($lastObservationDate) {
                                $currentMonth = $date_obj->format('m');
                                $lastMonth = $lastObservationDate->format('m');

                                // Jika bulan berbeda, increment episodeCounter
                                if ($currentMonth !== $lastMonth) {
                                    $episodeCounter++;
                                }
                            }

                            // Set lastObservationDate sebagai tanggal observasi saat ini
                            $lastObservationDate = $date_obj;

                            // Tambahkan observasi ke array
                            $observation = array(
                                'id_pelayanan' => $id_pelayanan,
                                'local_id' => $observ->LABNO,
                                'type_observation' => $typeObservation,
                                'issued' => $formatted_date, // Format datetime
                                'hasil' => $value,
                                'episode_number' => $episodeCounter,
                                'cara_input' => "labor"
                            );
                            $observations[] = $observation;

                            // Insert ke database
                            $this->M_tbc->insert_observation($observation);
                        }
                    }
                } else {
                    // Handle kasus di mana tidak ada hasil observasi
                    $observation = array(
                        'id_pelayanan' => $id_pelayanan,
                        'local_id' => null,
                        'type_observation' => null,
                        'issued' => null,
                        'value' => null,
                        'episode_number' => null,
                    );
                    $observations[] = $observation;

                    // Insert ke database
                    $this->M_tbc->insert_observation($observation);
                }
            }

            return $observations;
        } else {
            echo "gagal!";
            return [];
        }
    }

    public function collect_data($id_pel, $no_rm)
    {

        // Mendapatkan data mentah dari body permintaan
        // $raw_data = $this->input->raw_input_stream;
        header('Content-Type: application/json');

        $id_pelayanan = base64_decode(urldecode($id_pel));
        // $id_pelayanan = "pl_389278";
        // $no_rm = "8085";
        $pasien = $this->M_tbc->get_Pasien($id_pelayanan);
        $kode_icd = $this->kode_icd($id_pelayanan);
        $active = $this->active($id_pelayanan);
        $jk = $this->gender($id_pelayanan);
        $klasisfikasi = $this->clasification($id_pelayanan);
        $clasifi = $this->M_tbc->classifications($no_rm);
        $quitioner = $this->quitioners($id_pelayanan);
        $tgl_masuk = $clasifi->tgl_masuk;
        $tgl_prog = $clasifi->tanggal;
        $tgl_selesai = $clasifi->tgl_keluar;
        $id_tb = $this->id_tb($id_pelayanan);
        $fromat1 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_masuk));
        $fromat2 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_prog));
        $fromat3 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_selesai));
        // $fromat1 = date('Y-m-d\TH:i:s\Z', strtotime('now'));
        // $fromat2 = date('Y-m-d\TH:i:s\Z', strtotime('now'));
        // $fromat3 = date('Y-m-d\TH:i:s\Z', strtotime('now'));
        $observ = $this->print_labor($id_pelayanan);


        // $tgl = $this->M_tbc->get_tgl($no_rm);
        // var_dump($pasien);
        // $code = "93000147";
        // $kfa = $this->M_tbc->kfa_code($id_pelayanan);
        $kfa = $this->get_kfa_code($id_pelayanan);

        if ($pasien) {

            // $medication_data = [];
            // if ($kfa !== "-") {
            //     $medication_data = [
            //         [
            //             'kfa_code' => $kfa['kode'],
            //             'kfa_name' => $kfa['nama'],
            //             'form_code' => $kfa['id_logistik'],
            //         ]
            //     ];
            // } else {
            //     $medication_data = [
            //         [
            //             'kfa_code' => "93000147",
            //             'kfa_name' => "92000150",
            //             'form_code' => "BS077",
            //         ]
            //     ];
            // }

            $data = array(
                'middleware_id' => "",
                'organization_id' => "b348c55e-8c19-4890-ba73-6ec1d30c4c9c",
                'location_id' => $pasien->id_satusehat,
                'practitioner_nik' => $pasien->no_ktp,
                'patient' => array(
                    'nik' => $pasien->no_ktp,
                    'name' => $pasien->nama,
                    'gender' => $jk,
                    'dob' => $pasien->tgl_lahir,
                    'province' => "19",
                    'district' => "1901",
                    'address' => $pasien->alamat,
                ),
                'encounter' => array(
                    'local_id' => $id_pelayanan, //bisa menggunakan id_pelayanan
                    'classification' => $klasisfikasi,
                    'period_start' => $fromat1,
                    'period_in_progress' => $fromat2,
                    'period_end' => $fromat3,
                ),
                'questionnaire_response' => array(
                    'type_diagnosis' => $quitioner['tipe_diagnosis'],
                    'location_anatomi' => $quitioner['lokasi_anatomi'],
                    'treatment_history' => "new",
                    'end_result_treatment' => "",
                ),
                'condition' => array(
                    array(
                        'icd_x_code_tb' => $kode_icd,
                        'clinical_status_tb' => $active,
                        // 'others' => array(
                        //     'icd_x_code'=>'A20.0',
                        //     ' icd_x_code_name'=>'Bubonic plague',
                        //     'clinical_status_tb'=>'active'
                        //)
                    )
                ),
                'medication' => $kfa,
                // 'observation' => array(
                //     array(
                //         'local_id' => $observ['LABNO'],
                //         'type_observation' => $observ['RESULT']['GROUP'],
                //         'issued' => $observ['TGLORDER'],
                //         'value' => $observ['RESULT']['VALUE'],
                //         'episode_number' => "1",
                //     ),
                // ),
                'observation' => $observ,
                'episode_of_care' => array(
                    'ihs_id' => $id_tb['ihs_id'],
                    'id_tb_03' => $id_tb['id_tb'],
                    'status' => "active",
                    'type_code' => "TB-SO",
                    'period_start' => $fromat1,
                    // 'period_end' => "" //dilampirkan ketika sudah finish berdasarkan end result treatment
                )
            );


            $ekstraksi = array(
                'middleware_id' => $data['middleware_id'],
                'organization_id' => $data['organization_id'],
                'location_id' => $data['location_id'],
                'practitioner_nik' => $data['practitioner_nik'],
                'patient_nik' => $data['patient']['nik'],
                'patient_name' => $data['patient']['name'],
                'patient_gender' => $data['patient']['gender'],
                'patient_dob' => $data['patient']['dob'],
                'patient_province' => $data['patient']['province'],
                'patient_district' => $data['patient']['district'],
                'patient_address' => $data['patient']['address'],
                'encounter_local_id' => $data['encounter']['local_id'],
                'no_rm' => $pasien->no_rm,
                'encounter_classification' => $data['encounter']['classification'],
                'encounter_period_start' => $data['encounter']['period_start'],
                'encounter_period_in_progress' => $data['encounter']['period_in_progress'],
                'encounter_period_end' => $data['encounter']['period_end'],
                'diagnosis_type' => $data['questionnaire_response']['type_diagnosis'],
                'diagnosis_location_anatomi' => $data['questionnaire_response']['location_anatomi'],
                'treatment_history' => $data['questionnaire_response']['treatment_history'],
                'end_result_treatment' => $data['questionnaire_response']['end_result_treatment'],
                'condition_clinical_status_tb' => $data['condition'][0]['clinical_status_tb'],
                'condition_icd_x_code' => $data['condition'][0]['icd_x_code_tb'],
                // 'medication_kfa_code' => $data['medication'][0]['kfa_code'],
                // 'medication_kfa_name' => $data['medication'][0]['kfa_name'],
                // 'medication_form_code' => $data['medication'][0]['form_code'], // Make sure medication data is in the correct format
                'observation_local_id' => $data['observation'][0]['local_id'],
                'observation_type' => $data['observation'][0]['type_observation'],
                'observation_issued' => $data['observation'][0]['issued'],
                'observation_value' => $data['observation'][0]['value'],
                'observation_episode_number' => $data['observation'][0]['episode_number'],
                'episode_of_care_ihs_id' => $data['episode_of_care']['ihs_id'],
                'episode_of_care_id_tb_03' => $data['episode_of_care']['id_tb_03'],
                'episode_of_care_status' => $data['episode_of_care']['status'],
                'episode_of_care_type_code' => $data['episode_of_care']['type_code'],
                'episode_of_care_period_start' => $data['episode_of_care']['period_start'],
            );
        }

        $response = $this->M_tbc->insert_data($ekstraksi, 'tb_data');

        if ($response['status'] === false) {
            $output = array('status' => false, 'message' => $response['message']);
        } else {
            $output = array('status' => true, 'message' => 'Data berhasil dikirim');
        }

        // ob_clean();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function bundle_collect_data()
    {
        header('Content-Type: application/json');

        $data_pasien = $this->M_tbc->get_idpel();  // Ambil data seluruh pasien
        $result = array();  // Array untuk menampung hasil setiap iterasi
        $error_list = array();  // Array untuk menampung error

        foreach ($data_pasien as $row) {
            try {
                $id_pelayanan = $row->id_pelayanan;
                $no_rm = $row->no_rm;
                $pasien = $this->M_tbc->get_Pasien($id_pelayanan);
                $kode_icd = $this->kode_icd($id_pelayanan);
                $active = $this->active($id_pelayanan);
                $jk = $this->gender($id_pelayanan);
                $klasisfikasi = $this->clasification($id_pelayanan);
                $clasifi = $this->M_tbc->classifications($no_rm);
                $quitioner = $this->quitioners($id_pelayanan);
                $tgl_masuk = isset($clasifi->tgl_masuk) ? $clasifi->tgl_masuk : date('Y-m-d H:i:s');
                $tgl_prog = isset($clasifi->tanggal) ? $clasifi->tanggal : date('Y-m-d H:i:s');
                $tgl_selesai = isset($clasifi->tgl_keluar) ? $clasifi->tgl_keluar : date('Y-m-d H:i:s');
                $id_tb = $this->id_tb($id_pelayanan);
                $format1 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_masuk));
                $format2 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_prog));
                $format3 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_selesai));
                $kfa = $this->get_kfa_code($id_pelayanan);
                $cek_labor = $this->M_tbc->cek_labor($id_pelayanan);
                // $observ = $this->print_labor_schedule($id_pelayanan);
                if (!is_null($cek_labor)) {
                    $observ = $this->print_labor_schedule($id_pelayanan);
                } else {
                    $observ = null;  // Atau bisa diisi dengan nilai default jika diperlukan
                }

                if ($pasien) {
                    $data = array(
                        'middleware_id' => "",
                        'organization_id' => "b348c55e-8c19-4890-ba73-6ec1d30c4c9c",
                        'location_id' => $pasien->id_satusehat,
                        'practitioner_nik' => $pasien->no_ktp,
                        'patient' => array(
                            'nik' => $pasien->no_ktp,
                            'name' => $pasien->nama,
                            'gender' => $jk,
                            'dob' => $pasien->tgl_lahir,
                            'province' => "19",
                            'district' => "1901",
                            'address' => $pasien->alamat,
                        ),
                        'encounter' => array(
                            'local_id' => $id_pelayanan,
                            'classification' => $klasisfikasi,
                            'period_start' => $format1,
                            'period_in_progress' => $format1,
                            'period_end' => $format3,
                        ),
                        'questionnaire_response' => array(
                            'type_diagnosis' => $quitioner['tipe_diagnosis'],
                            'location_anatomi' => $quitioner['lokasi_anatomi'],
                            'treatment_history' => "new",
                            'end_result_treatment' => "",
                        ),
                        'condition' => array(
                            array(
                                'icd_x_code_tb' => $kode_icd,
                                'clinical_status_tb' => $active,
                            )
                        ),
                        'medication' => $kfa,
                        'observation' => $observ,
                        'episode_of_care' => array(
                            'ihs_id' => $id_tb['ihs_id'],
                            'id_tb_03' => $id_tb['id_tb'],
                            'status' => "active",
                            'type_code' => "TB-SO",
                            'period_start' => $format1,
                        )
                    );

                    $ekstraksi = array(
                        'middleware_id' => $data['middleware_id'],
                        'organization_id' => $data['organization_id'],
                        'location_id' => $data['location_id'],
                        'practitioner_nik' => $data['practitioner_nik'],
                        'patient_nik' => $data['patient']['nik'],
                        'patient_name' => $data['patient']['name'],
                        'patient_gender' => $data['patient']['gender'],
                        'patient_dob' => $data['patient']['dob'],
                        'patient_province' => $data['patient']['province'],
                        'patient_district' => $data['patient']['district'],
                        'patient_address' => $data['patient']['address'],
                        'encounter_local_id' => $data['encounter']['local_id'],
                        'no_rm' => $pasien->no_rm,
                        'encounter_classification' => $data['encounter']['classification'],
                        'encounter_period_start' => $data['encounter']['period_start'],
                        'encounter_period_in_progress' => $data['encounter']['period_in_progress'],
                        'encounter_period_end' => $data['encounter']['period_end'],
                        'diagnosis_type' => $data['questionnaire_response']['type_diagnosis'],
                        'diagnosis_location_anatomi' => $data['questionnaire_response']['location_anatomi'],
                        'treatment_history' => $data['questionnaire_response']['treatment_history'],
                        'end_result_treatment' => $data['questionnaire_response']['end_result_treatment'],
                        'condition_clinical_status_tb' => $data['condition'][0]['clinical_status_tb'],
                        // 'observation_local_id' => $data['observation']['local_id'],
                        // 'observation_type' => $data['observation']['type_observation'],
                        // 'observation_issued' => $data['observation']['issued'],
                        // 'observation_value' => $data['observation']['value'],
                        // 'observation_episode_number' => $data['observation']['episode_number'],
                        'condition_icd_x_code' => $data['condition'][0]['icd_x_code_tb'],
                        'episode_of_care_ihs_id' => $data['episode_of_care']['ihs_id'],
                        'episode_of_care_id_tb_03' => $data['episode_of_care']['id_tb_03'],
                        'episode_of_care_status' => $data['episode_of_care']['status'],
                        'episode_of_care_type_code' => $data['episode_of_care']['type_code'],
                        'episode_of_care_period_start' => $data['episode_of_care']['period_start'],
                    );

                    $response = $this->M_tbc->insert_data($ekstraksi, 'tb_data_schedule');

                    if ($response['status'] === false) {
                        // Tambahkan hasil error ke array
                        $result[] = array('status' => false, 'id_pelayanan' => $id_pelayanan, 'message' => $response['message']);
                    } else {
                        // Tambahkan hasil sukses ke array
                        $result[] = array('status' => true, 'id_pelayanan' => $id_pelayanan, 'message' => 'Data berhasil dikirim');
                    }
                }
            } catch (Exception $e) {
                // Simpan error ke tabel log_errors dan ke dalam array error_list
                $error_data = array(
                    'id_pelayanan' => $row->id_pelayanan,
                    'error_message' => $e->getMessage(),
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('log_errors', $error_data);

                $error_list[] = array(
                    'id_pelayanan' => $row->id_pelayanan,
                    'error_message' => $e->getMessage()
                );
            }
        }

        // Kirim hasil semua looping sebagai output JSON
        $output = array(
            'status' => true,
            'message' => 'Looping selesai',
            'results' => $result,
            'errors' => $error_list
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }





    // public function index_post()
    // {

    //     // Mendapatkan data mentah dari body permintaan
    //     // $raw_data = $this->input->raw_input_stream;
    //     header('Content-Type: application/json');

    //     $id_pelayanan = "pl_389278";
    //     $no_rm = "8085";
    //     $pasien = $this->M_tbc->get_Pasien($id_pelayanan);
    //     $kode_icd = $this->kode_icd($id_pelayanan);
    //     $active = $this->active($id_pelayanan);
    //     $jk = $this->gender($id_pelayanan);
    //     $klasisfikasi = $this->clasification($id_pelayanan);
    //     $clasifi = $this->M_tbc->classifications($no_rm);
    //     $quitioner = $this->quitioners($id_pelayanan);
    //     $tgl_masuk = $clasifi->tgl_masuk;
    //     $tgl_prog = $clasifi->tanggal;
    //     $tgl_selesai = $clasifi->tgl_keluar;
    //     $id_tb = $this->id_tb($id_pelayanan);
    //     $fromat1 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_masuk));
    //     $fromat2 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_prog));
    //     $fromat3 = date('Y-m-d\TH:i:s\Z', strtotime($tgl_selesai));
    //     $observ = $this->print_labor();


    //     // $tgl = $this->M_tbc->get_tgl($no_rm);
    //     // var_dump($pasien);
    //     // $code = "93000147";
    //     // $kfa = $this->M_tbc->kfa_code($id_pelayanan);
    //     $kfa = $this->get_kfa_code($id_pelayanan);

    //     if ($pasien) {
    //         $medication_data = [];
    //         if ($kfa !== "-") {
    //             $medication_data = [
    //                 [
    //                     'kfa_code' => $kfa['kode'],
    //                     'kfa_name' => $kfa['nama'],
    //                     'form_code' => $kfa['id_logistik'],
    //                 ]
    //             ];
    //         } else {
    //             $medication_data = [
    //                 [
    //                     'kfa_code' => "93000147",
    //                     'kfa_name' => "92000150",
    //                     'form_code' => "BS077",
    //                 ]
    //             ];
    //         }

    //         $data = array(
    //             'middleware_id' => "",
    //             'organization_id' => "b348c55e-8c19-4890-ba73-6ec1d30c4c9c",
    //             'location_id' => $pasien->id_satusehat,
    //             'practitioner_nik' => $pasien->no_ktp,
    //             'patient' => array(
    //                 'nik' => $pasien->no_ktp,
    //                 'name' => $pasien->nama,
    //                 'gender' => $jk,
    //                 'dob' => $pasien->tgl_lahir,
    //                 'province' => "19",
    //                 'district' => "1901",
    //                 'address' => $pasien->alamat,
    //             ),
    //             'encounter' => array(
    //                 'local_id' => $no_rm, //bisa menggunakan id_pelayanan
    //                 'classification' => $klasisfikasi,
    //                 'period_start' => $fromat1,
    //                 'period_in_progress' => $fromat2,
    //                 'period_end' => $fromat3,
    //             ),
    //             'questionnaire_response' => array(
    //                 'type_diagnosis' => $quitioner['tipe_diagnosis'],
    //                 'location_anatomi' => $quitioner['lokasi_anatomi'],
    //                 'treatment_history' => "new",
    //                 'end_result_treatment' => "",
    //             ),
    //             'condition' => array(
    //                 array(
    //                     'icd_x_code_tb' => $kode_icd,
    //                     'clinical_status_tb' => $active,
    //                     // 'others' => array(
    //                     //     'icd_x_code'=>'A20.0',
    //                     //     ' icd_x_code_name'=>'Bubonic plague',
    //                     //     'clinical_status_tb'=>'active'
    //                     //)
    //                 )
    //             ),
    //             'medication' => $medication_data,
    //             // 'observation' => array(
    //             //     array(
    //             //         'local_id' => $observ['LABNO'],
    //             //         'type_observation' => $observ['RESULT']['GROUP'],
    //             //         'issued' => $observ['TGLORDER'],
    //             //         'value' => $observ['RESULT']['VALUE'],
    //             //         'episode_number' => "1",
    //             //     ),
    //             // ),
    //             'observation' => $observ,
    //             'episode_of_care' => array(
    //                 'ihs_id' => $id_tb['ihs_id'],
    //                 'id_tb_03' => $id_tb['id_tb'],
    //                 'status' => "active",
    //                 'type_code' => "TB-SO",
    //                 'period_start' => $fromat1,
    //                 // 'period_end' => "" //dilampirkan ketika sudah finish berdasarkan end result treatment
    //             )
    //         );


    //         //     $this->output
    //         //         ->set_content_type('application/json')
    //         //         ->set_output(json_encode($data));
    //         // } else {
    //         //     // Mengembalikan respons JSON untuk kesalahan
    //         //     $error = array('error' => 'Data pasien tidak ditemukan');
    //         //     $this->output
    //         //         ->set_content_type('application/json')
    //         //         ->set_output(json_encode($error));
    //         // }
    //     }
    //     echo '<h1>Respon Header</h1>';
    //     echo '<pre>';
    //     $header = generateTokenUsaid();
    //     print_r($header);
    //     echo '</pre>';

    //     echo '<h1>Response pengiriman Bundle</h1>';
    //     $response_bundle = usaidPostData($data, 'data', 'POST');
    //     echo '<pre>';
    //     print_r($response_bundle);
    //     echo '</pre>';

    //     $id_tb_03 = $response_bundle['data']->details[0]->response_data->id_tb_03;
    //     $ihs_id = $response_bundle['data']->id;

    //     $db = array(
    //         'id_tb' => $id_tb_03,
    //         'ihs_id' => $ihs_id,
    //         'id_pelayanan' => $id_pelayanan,
    //     );

    //     $result = $this->M_tbc->insert_data($db, 'ihs_encounter');

    //     $response = array();

    //     if ($result) {
    //         $response['status'] = 'success';
    //         $response['message'] = 'Data berhasil dimasukkan.';
    //     } else {
    //         $response['status'] = 'error';
    //         $response['message'] = 'Terjadi kesalahan saat memasukkan data.';
    //         error_log("Gagal memasukkan data: " . print_r($db, true));
    //     }

    //     // Mengembalikan response sebagai JSON
    //     echo json_encode($response);

    //     // echo '<h1>Respon Header</h1>';
    //     // echo '<pre>';
    //     // $header = generateTokenUsaid();
    //     // print_r($header);
    //     // echo '</pre>';

    //     // echo '<h1>Response pengiriman Bundle</h1>';
    //     // $response_bundle = usaidPostData($data, 'data', 'POST');
    //     // echo '<pre>';
    //     // print_r($response_bundle);
    //     // echo '</pre>';

    //     // $data['patient'] = $patient;

    //     // $insert = $this->db->insert('testing_post', $data);
    //     // if ($insert) {
    //     //     // Jika penyisipan berhasil, ambil kembali data yang baru saja dimasukkan
    //     //     $inserted_id = $this->db->insert_id();
    //     //     $inserted_data = $this->db->get_where('testing_post', array('id' => $inserted_id))->row_array();

    //     //     // Mengembalikan data yang baru saja dimasukkan
    //     //     $json_response = json_encode(array('status' => 'success', 'data' => $inserted_data));

    //     //     $this->output
    //     //         ->set_content_type('application/json')
    //     //         ->set_status_header(200)
    //     //         ->set_output($json_response);
    //     // } else {
    //     //     $json_error_response = json_encode(array('status' => 'fail'));

    //     //     $this->output
    //     //         ->set_content_type('application/json')
    //     //         ->set_status_header(502)
    //     //         ->set_output($json_error_response);
    //     // }
    // }

    public function gender($id_pelayanan)
    {
        $pasien = $this->M_tbc->get_Pasien($id_pelayanan);
        if ($pasien->jenis_kelamin == "Laki-Laki" || $pasien->jenis_kelamin == "LAKI-LAKI") {
            return "L";
        } else if ($pasien->jenis_kelamin == "PEREMPUAN") {
            return "P";
        }
    }

    public function kode_icd($id_pelayanan)
    {
        // $id_pelayanan = "pl_3951";
        // $no_rm = "539057"; // Gantilah jika ini perlu dinamis
        $kode_icd = $this->M_tbc->get_kode_icd($id_pelayanan);

        return $kode_icd->kode;
        // echo json_encode($kode_icd);

        // if ($kode_icd && $kode_icd->pasien_tbc == "ya") { // Mengakses field pasien_tbc
        //     return "A15.0"; // Mengembalikan kode ICD yang sesuai
        // } else {
        //     return null; // Jika tidak sesuai
        // }
    }

    public function active($id_pelayanan)
    {
        // $id_pelayanan = "pl_3951";
        $kode_icd = $this->kode_icd($id_pelayanan);

        if ($kode_icd >= "A15" && $kode_icd <= "A19") {
            return "active";
        } else {
            return "inactive";
        }
    }



    public function clasification($id_pelayanan)
    {
        $class = $this->M_tbc->classifications2($id_pelayanan);
        if ($class->jenis_pelayanan == "RAWAT JALAN") {
            return "AMB";
        } else if ($class->jenis_pelayanan == "IGD") {
            return "EMER";
        } else if ($class->jenis_pelayanan == "RAWAT INAP") {
            return "IMP";
        } else if ($class->jenis_pelayanan == "POLI") {
            return "AMB";
        } else if ($class->jenis_pelayanan == "POLI PRIORITAS") {
            return "AMB";
        }
    }

    public function get_kfa_code($id_pelayanan)
    {
        // Ambil data dari model
        $kfa = $this->M_tbc->kfa_code($id_pelayanan);

        // Jika hasil query kosong, kembalikan "-"
        if (empty($kfa)) {
            return "-";
        }

        // Array untuk menyimpan data yang akan diinputkan
        $medication_data = [];

        // Iterasi seluruh data dan siapkan untuk input ke database
        foreach ($kfa as $item) {
            if (empty($item->kode_kfa) || empty($item->nama) || empty($item->kode_sediaan)) {
                continue;
            }
            // Tambahkan data yang valid ke dalam array
            $medication_data[] = [
                'id_pelayanan' => $id_pelayanan,
                'kfa_code' => $item->kode_kfa,
                'kfa_name' => $item->nama,
                'form_code' => $item->kode_sediaan,  // Sesuaikan dengan nama kolom yang benar
            ];
        }

        // Jika ada data yang valid, masukkan ke database
        if (!empty($medication_data)) {
            // Masukkan data ke dalam database menggunakan insert_batch
            $insert_result = $this->M_tbc->insert_medication($medication_data);

            // Cek apakah data berhasil dimasukkan
            if ($insert_result) {
                return $medication_data;  // Kembalikan data yang diinputkan
            } else {
                return "Gagal memasukkan data.";
            }
        }

        // Jika tidak ada data yang valid, kembalikan "-"
        return "-";
    }


    public function quitioners($id_pelayanan)
    {

        $array = array(
            'A15'   => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A150' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A151' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A152' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A153' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A154' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A155' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A156' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A157' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A158' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A159' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A16'   => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-bac'
            ),
            'A160' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A161' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A162' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A163' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A164' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A165' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A167' => array(
                'lokasi_anatomi' => 'PTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A168' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A169' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A17'   => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A170' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A171' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A178' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A179' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A18'   => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A180' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A181' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A182' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A183' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A184' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A185' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A186' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A187' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A188' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A189' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A19'   => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A190' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A191' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A192' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A193' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A198' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
            'A199' => array(
                'lokasi_anatomi' => 'EPTB',
                'tipe_diagnosis' => 'tb-clin'
            ),
        );
        // $id_pelayanan = "pl_389278";

        $kode_icd10 = $this->kode_icd($id_pelayanan);
        // var_dump($kode_icd10);

        // Mengecek apakah kode ICD10 ada di dalam array
        // Mengecek apakah kode ICD10 ada di dalam array
        if (isset($array[$kode_icd10])) {
            $result = $array[$kode_icd10];

            // Memeriksa apakah array mengandung 'lokasi_anatomi' dan 'tipe_diagnosis'
            if (isset($result['lokasi_anatomi']) && isset($result['tipe_diagnosis'])) {
                return array(
                    'lokasi_anatomi' => $result['lokasi_anatomi'],
                    'tipe_diagnosis' => $result['tipe_diagnosis']
                );
            }
        }


        // Jika tidak ditemukan atau kode tidak sesuai, kembalikan nilai default (misal: null)
        return null;
    }

    public function id_tb($id_pelayanan)
    {
        $cek = $this->M_tbc->cek_data($id_pelayanan);

        if ($cek !== null) { // Periksa jika $cek bukan null
            return array(
                'id_tb' => $cek->id_tb,
                'ihs_id' => $cek->ihs_id
            );
        } else {
            return array(
                'id_tb' => "",
                'ihs_id' => ""
            ); // Data tidak ditemukan
        }
    }
}
