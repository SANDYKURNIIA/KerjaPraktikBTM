<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Location extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('satusehat');
        $this->load->model('M_Satusehat');
        $this->load->model('M_Pasien');
    }

    public function create_location()
    {
        $nama = $this->input->post('nama');
        $kode = $this->input->post('kode');
        $id_poli = $this->input->post('id_poli');

        $array_bundle = array(
            "resourceType" => "Location",
            "identifier" => [
                [
                    "system" => "http://sys-ids.kemkes.go.id/location/" . WS_FHIR_ORG_ID,
                    "value" => $kode
                ]
            ],
            "status" => "active",
            "name" => $nama,
            "description" => "Optional",
            "mode" => "instance",
            "telecom" => [
                [
                    "system" => "phone",
                    "value" => "8123456",
                    "use" => "work"
                ],
                [
                    "system" => "fax",
                    "value" => "8123456",
                    "use" => "work"
                ],
                [
                    "system" => "email",
                    "value" => "kfc@gmail.com"
                ],
                [
                    "system" => "url",
                    "value" => "www.rs.com",
                    "use" => "work"
                ]
            ],
            "address" => [
                "use" => "work",
                "line" => [
                    "Gd.=>Prof. Dr. Sujudi Lt.5, Jl. H.R. Rasuna Said Blok X5 Kav. 4-9 Kuningan"
                ],
                "city" => "Jakarta",
                "postalCode" => "12950",
                "country" => "ID",
                "extension" => [
                    [
                        "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode",
                        "extension" => [
                            [
                                "url" => "province",
                                "valueCode" => "10"
                            ],
                            [
                                "url" => "city",
                                "valueCode" => "1010"
                            ],
                            [
                                "url" => "district",
                                "valueCode" => "1010101"
                            ],
                            [
                                "url" => "village",
                                "valueCode" => "1010101101"
                            ],
                            [
                                "url" => "rt",
                                "valueCode" => "1"
                            ],
                            [
                                "url" => "rw",
                                "valueCode" => "2"
                            ]
                        ]
                    ]
                ]
            ],
            "physicalType" => [
                "coding" => [
                    [
                        "system" => "http://terminology.hl7.org/CodeSystem/location-physical-type",
                        "code" => "ro",
                        "display" => "Room"
                    ]
                ]
            ],
            "position" => [
                "longitude" => -6.23115426275766,
                "latitude" => 106.83239885393944,
                "altitude" => 0
            ],
            "managingOrganization" => [
                "reference" => "Organization/" . WS_FHIR_ORG_ID
            ]
        );

        echo '<h1>JSON Bundle yang dikirim</h1>';
        echo '<pre>';
        echo json_encode($array_bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        echo '</pre>';

        echo '<h1>Respon Header</h1>';
        echo '<pre>';
        $header = generateHeaderFHIR();
        print_r($header);
        echo '</pre>';

        echo '<h1>Response pengiriman Bundle</h1>';
        $response_bundle = fhirPost($array_bundle, 'Location', 'POST');
        echo '<pre>';
        print_r($response_bundle);
        echo '</pre>';

        $inpud_data = [
            'nama' => $response_bundle['data']->name,
            'id_satusehat' => $response_bundle['data']->id,
            'kode' => $kode,
            'id_list_poli' => $id_poli,
            'jenis' => 'Location',
        ];
        $this->M_Satusehat->insert_data($inpud_data, 'satusehat_suborganisasi');
    }
    // Konfirmasi permintaan unit
    public function update_location()
    {
        $nama = $this->input->post('nama');
        $kode = $this->input->post('kode');
        $id = $this->input->post('id');
        $id_poli = $this->input->post('id_poli');

        $array_bundle = [
            "resourceType" => "Location",
            "id" => $id,
            "identifier" => [
                [
                    "system" => "http://sys-ids.kemkes.go.id/location/" . WS_FHIR_ORG_ID,
                    "value" => $kode,
                ],
            ],
            "status" => "inactive",
            "name" => $nama,
            "description" =>
            "Ruang 1A, Poliklinik Bedah Rawat Jalan Terpadu, Lantai 2, Gedung G",
            "mode" => "instance",
            "telecom" => [
                ["system" => "phone", "value" => "8123456", "use" => "work"],
                ["system" => "fax", "value" => "8123456", "use" => "work"],
                ["system" => "email", "value" => "kfc@gmail.com"],
                [
                    "system" => "url",
                    "value" => "www.baktitimah.com",
                    "use" => "work",
                ],
            ],
            "address" => [
                "use" => "work",
                "line" => [
                    "Gd. Prof. Dr. Sujudi Lt.5, Jl. H.R. Rasuna Said Blok X5 Kav. 4-9 Kuningan",
                ],
                "city" => "Jakarta",
                "postalCode" => "12950",
                "country" => "ID",
                "extension" => [
                    [
                        "url" =>
                        "https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode",
                        "extension" => [
                            ["url" => "province", "valueCode" => "10"],
                            ["url" => "city", "valueCode" => "1010"],
                            ["url" => "district", "valueCode" => "1010101"],
                            ["url" => "village", "valueCode" => "1010101101"],
                            ["url" => "rt", "valueCode" => "1"],
                            ["url" => "rw", "valueCode" => "2"],
                        ],
                    ],
                ],
            ],
            "physicalType" => [
                "coding" => [
                    [
                        "system" =>
                        "http://terminology.hl7.org/CodeSystem/location-physical-type",
                        "code" => "ro",
                        "display" => "Room",
                    ],
                ],
            ],
            "position" => [
                "longitude" => -6.23115426275766,
                "latitude" => 106.83239885393944,
                "altitude" => 0,
            ],
            "managingOrganization" => ["reference" => "Organization/" . WS_FHIR_ORG_ID],
        ];


        echo '<h1>JSON Bundle yang dikirim</h1>';
        echo '<pre>';
        echo json_encode($array_bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        echo '</pre>';

        echo '<h1>Respon Header</h1>';
        echo '<pre>';
        $header = generateHeaderFHIR();
        print_r($header);
        echo '</pre>';

        echo '<h1>Response pengiriman Bundle</h1>';
        $response_bundle = fhirPost($array_bundle, 'Location', 'PUT');
        echo '<pre>';
        print_r($response_bundle);
        echo '</pre>';

        $inpud_data = [
            'nama' => $response_bundle['data']->name,
            'kode' => $kode,
            'id_list_poli' => $id_poli,
        ];
        $this->M_Satusehat->update_data(['id_satusehat' => $id], $inpud_data, 'satusehat_suborganisasi');
    }

    public function get_ktp()
    {
        $rows = $this->M_Pasien->get_no_ktp();
        $regtype = "KTP";

        if (!empty($rows) && is_array($rows)) {
            foreach ($rows as $row) {
                if (is_object($row) && property_exists($row, 'no_ktp')) {
                    if (is_numeric($row->no_ktp)) {
                        $response = array(
                            "regType" => $regtype,
                            "value" => $row->no_ktp,
                            "isBlurred" => "false"
                        );

                        echo '<h1>Response pengiriman Bundle</h1>';
                        $response_bundle = fhirPostID($response, 'user-registration', 'POST');
                        $this->M_Pasien->update_status_satusehat($row->no_ktp, $response_bundle['status']);
                        echo '<pre>';
                        print_r($response_bundle);
                        echo '</pre>';
                        echo json_encode($response);
                    } else {
                        $response = array(
                            'status' => false,
                            'message' => 'Property no_ktp not found in the data',
                            'data' => null,
                            'status_satusehat' => 2
                        );

                        echo json_encode($response);
                    }
                } else {
                    // Handle if 'no_ktp' property is not found in the object
                    $response = array(
                        'status' => false,
                        'message' => 'Property no_ktp not found in the data',
                        'data' => null,
                        'status_satusehat' => 2
                    );

                    echo json_encode($response);
                }
            }
        } else {
            // Handle if no data is found or the data is not an array
            $response = array(
                'status' => false,
                'message' => 'Data tidak ditemukan atau format tidak sesuai',
                'data' => null,
                'status_satusehat' => 2
            );

            echo json_encode($response);
        }



        // echo '<h1>JSON Bundle yang dikirim</h1>';
        // echo '<pre>';
        // echo json_encode($array_bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        // echo '</pre>';

        // // echo '<h1>Respon Header</h1>';
        // // echo '<pre>';
        // // $header = generateHeaderFHIR();
        // // print_r($header);
        // // echo '</pre>';

        // echo '<h1>Response pengiriman Bundle</h1>';  
        // $response_bundle = fhirPost($data_params, 'user-registration', 'POST');  // Mengirimkan data langsung sebagai objek


        // echo '<h1>Response pengiriman Bundle</h1>';
        // $response_bundle = fhirPost($array_bundle, 'user-registration', 'POST');
        // echo '<pre>';
        // print_r($response_bundle);
        // echo '</pre>';
    }
}
