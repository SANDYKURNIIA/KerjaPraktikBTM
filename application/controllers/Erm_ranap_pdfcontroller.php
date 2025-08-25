<?php

use Dompdf\Dompdf;
use Dompdf\Options;

class Erm_ranap_pdfcontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_Resume_medis');
    }

    public function generate_pdf($id)
    {
        // Mengambil data dari database berdasarkan ID
        $data['records'] = $this->M_Resume_medis->getDataMedisById($id);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Get HTML content (e.g., from a view)
        $html = $this->load->view('erm_print/view_data_resume_medis', $data, true);


        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and rendering options (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (generate PDF content)
        $dompdf->render();

        // Output or download the PDF
        $dompdf->stream('your_filename.pdf', ['Attachment' => 0]);
    }
}

//     public function generate_pdf2()
//     {
//         // Ambil ID data yang baru saja diinputkan
//         $id = $this->db->insert_id(); // Sesuaikan dengan nama field ID yang digunakan

//         // Ambil data dari database berdasarkan ID yang baru saja diinputkan
//         $data['record'] = $this->M_Resume_medis->getDataById($id); // Gantilah 'getDataById' dengan method yang sesuai di model Anda

//         // Load Dompdf
//         $options = new Options();
//         $options->set('isHtml5ParserEnabled', true);
//         $dompdf = new Dompdf($options);

//         // Get HTML content (e.g., from a view)
//         $html = $this->load->view('erm_form/Ranap/view_data_resume_medis', $data, true);

//         // Load HTML content into Dompdf
//         $dompdf->loadHtml($html);

//         // Set paper size and rendering options (optional)
//         $dompdf->setPaper('A4', 'portrait');

//         // Render PDF (generate PDF content)
//         $dompdf->render();

//         // Output or download the PDF
//         $dompdf->stream('your_filename.pdf', ['Attachment' => 0]);
//     }
// }
