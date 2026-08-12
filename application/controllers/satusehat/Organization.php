<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organization extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('satusehat');
        $this->load->model('M_Satusehat');
    }

    public function create_suborganization()
    {
        $nama = $this->input->post('nama');
        $kode = $this->input->post('kode');
        $no_tlp = $this->input->post('no_tlp');
        $email = $this->input->post('email');
        $web = $this->input->post('web');

        $array_bundle = array(
            "resourceType" => "Organization",
            "active" => true,
            "identifier" => [
                [
                    "use" => "official",
                    "system" => "http://sys-ids.kemkes.go.id/organization/" . WS_FHIR_ORG_ID,
                    "value" => $kode
                ]

            ],
            "type" => [
                [

                    "coding" => [
                        [

                            "system" => "http://terminology.hl7.org/CodeSystem/organization-type",
                            "code" => "dept",
                            "display" => "Hospital Department"
                        ]
                    ]
                ]

            ],
            "name" => $nama,
            "telecom" => [
                [

                    "system" => "phone",
                    "value" => $no_tlp,
                    "use" => "work"
                ],
                [
                    "system" => "email",
                    "value" => $email,
                    "use" => "work"
                ],
                [
                    "system" => "url",
                    "value" => $web,
                    "use" => "work"
                ]
            ],
            "address" => [
                [
                    "use" => "work",
                    "type" => "both",
                    "line" => [
                        "Jalan Canggai Putri"
                    ],
                    "city" => "Jakarta",
                    "postalCode" => "55292",
                    "country" => "ID",
                    "extension" => [
                        [
                            "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode",
                            "extension" => [
                                [
                                    "url" => "province",
                                    "valueCode" => "31"
                                ],
                                [
                                    "url" => "city",
                                    "valueCode" => "3171"
                                ],
                                [
                                    "url" => "district",
                                    "valueCode" => "317101"
                                ],
                                [
                                    "url" => "village",
                                    "valueCode" => "31710101"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "partOf" => [
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
        $response_bundle = fhirPost($array_bundle,'Organization','POST');
        echo '<pre>';
        print_r($response_bundle);
        echo '</pre>';

        $inpud_data =[
            'nama'=>$response_bundle['data']->name,
            'id_satusehat'=>$response_bundle['data']->id,
            'kode' => $kode,
            'jenis'=>'Organization',
        ];
        $this->M_Satusehat->insert_data($inpud_data, 'satusehat_suborganisasi');
    }
    // Konfirmasi permintaan unit

}
