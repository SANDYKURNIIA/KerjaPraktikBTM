<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Layar_Poli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Layar_Poli');
    }

    public function poli($text)
    {

        $data['poli'] = $text;
        $this->load->view('assets/_header');

        $this->load->view('Layar_Poli', $data);
        $this->load->view('assets/_footer');
    }
    public function Get_antrian_Suara()
    {
        $text = $this->input->post('poli');
        // echo $text;
        $array = explode('-', $text);

        $play = $this->M_Layar_Poli->selectPlay($array);


        if (isset($play)) {
            $data['data'] = $play;
            $data['status'] = "ok";
        } else {
            $data['data'] = [
                'no' => '',
                'inisial' => '',
                'nama' => '',
            ];
            $data['status'] = "non";
        }
        echo json_encode($data);
    }

    public function getPoli()
    {
        $tgl = date('Y-m-d');

        $text = $this->input->post('poli');
        $array = explode('-', $text);
        $list = $this->M_Layar_Poli->getAntrianPoli($array);

        $data = array();
        foreach ($list as $data_temp) {

            $row = array();
            $row['inisial'] = $data_temp['inisial'];
            $row['nomor'] = $data_temp['no_antri'];
            $row['nama'] = $data_temp['nama'];
            $data[] = $row;
        }
        $output = array(
            "data"  => $data,
        );
        echo json_encode($output);
    }

    public function deleteSuara()
    {
        $this->M_Layar_Poli->deleteplaySuara('temp_panggil_antrian');
        $out['status'] = "ok";
        echo json_encode($out);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Layar_Poli extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Layar_Poli');
    }

    public function poli($text)
    {

        $data['poli'] = $text;
        $this->load->view('assets/_header');

        $this->load->view('Layar_Poli', $data);
        $this->load->view('assets/_footer');
    }
    public function Get_antrian_Suara()
    {
        $text = $this->input->post('poli');
        // echo $text;
        $array = explode('-', $text);

        $play = $this->M_Layar_Poli->selectPlay($array);


        if (isset($play)) {
            $data['data'] = $play;
            $data['status'] = "ok";
        } else {
            $data['data'] = [
                'no' => '',
                'inisial' => '',
                'nama' => '',
            ];
            $data['status'] = "non";
        }
        echo json_encode($data);
    }

    public function getPoli()
    {
        $tgl = date('Y-m-d');

        $text = $this->input->post('poli');
        $array = explode('-', $text);
        $list = $this->M_Layar_Poli->getAntrianPoli($array);

        $data = array();
        foreach ($list as $data_temp) {

            $row = array();
            $row['inisial'] = $data_temp['inisial'];
            $row['nomor'] = $data_temp['no_antri'];
            $row['nama'] = $data_temp['nama'];
            $data[] = $row;
        }
        $output = array(
            "data"  => $data,
        );
        echo json_encode($output);
    }

    public function deleteSuara()
    {
        $this->M_Layar_Poli->deleteplaySuara('temp_panggil_antrian');
        $out['status'] = "ok";
        echo json_encode($out);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
